<?php

class ProductController
{
    public function __construct()
    {
        include "backend/models/ProductType.php";
        include "backend/models/Product.php";
        include "backend/Database.php";
        foreach (glob("backend/models/products/*.php") as $filename) {
            include $filename;
        }
    }

    public function add()
    {
        $productType = Database::getConnection()->query('SELECT * FROM product_types where id =' . $_POST['product_type_id'])->fetchObject(ProductType::class);

        try {
            $product = new ($productType->getName())();
        } catch (Exception $ex) {
            echo "wrong product type provided";
            return;
        }

        if (!$product instanceof Product) {
            echo "Wrong product provided!";
            return;
        }

        $product->prepare($_POST);

        $productArr = $product->toArray();

        $fields = array_keys($productArr);
        $bindings = array_fill(0, count($productArr), '?');

        $sql = "INSERT INTO products (" . implode(",", $fields) . ") VALUES (" . implode(",", $bindings) . ")";

        $stmt = Database::getConnection()->prepare($sql);

        $i = 1;
        foreach ($productArr as $value) {
            $stmt->bindValue($i, $value);
            $i++;
        }

        $stmt->execute();

        header('Location: /', true, 303);
    }

    public function index(): array
    {
        $products = Database::getConnection()->query('SELECT *, pt.name as product_type FROM products INNER JOIN product_types pt on products.product_type_id = pt.id')->fetchAll();

        $resultArray = [];

        foreach ($products as $p) {
            $product = new $p['product_type'];
            $product->prepare($p);

            array_push($resultArray, $product);
        }

        return $resultArray;
    }

    public function getProducts(): array
    {
        $sql = 'SELECT * FROM product_types ORDER BY id';
        $products = Database::getConnection()->query($sql)->fetchAll(PDO::FETCH_CLASS, ProductType::class);

        return [
            'products' => $products,
        ];
    }

    public function ajaxDelete()
    {
        $ids = json_decode($_POST['ids']);

        $sql = sprintf("DELETE FROM products WHERE id IN (%s)", implode(',', $ids));
        $stmt = Database::getConnection()->prepare($sql);
        $stmt->bindValue('ids', $ids);

        $stmt->execute();

        header("HTTP/1.1 200 OK");
    }
}
<?php

abstract class Product
{
    protected $id;
    protected $sku;
    protected $name;
    protected $price;
    protected $product_type_id;

    public function getId()
    {
        return $this->id;
    }

    public function prepare(array $data)
    {
        $this->id = $data["id"];
        $this->sku = $data["sku"];
        $this->name = $data["name"];
        $this->price = $data["price"];
        $this->product_type_id = $data["product_type_id"];
    }

    public function toArray(): array
    {
        return [
            'sku' => $this->sku,
            'name' => $this->name,
            'price' => $this->price,
            'product_type_id' => $this->product_type_id,
            'id' => $this->id
        ];
    }

    public function toIndexArray(): array
    {
        return [
            'sku' => $this->sku,
            'name' => $this->name,
            'price' => $this->price . ' $'
        ];
    }
}

<?php

require_once("backend/controllers/ProductController.php");

$controller = new ProductController();
$controller->ajaxDelete();

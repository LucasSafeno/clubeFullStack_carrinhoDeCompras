<?php
require "Cart.php";
require 'Product.php';
session_start();


$products = [
  1 => ['id' => 1., 'name' => 'geladeira', 'price' => 1000, 'quantity' => 1],
  2 => ['id' => 2., 'name' => 'mouse', 'price' => 100, 'quantity' => 1],
  3 => ['id' => 1., 'name' => 'teclado', 'price' => 10, 'quantity' => 1],
  4 => ['id' => 1., 'name' => 'monitor', 'price' => 5000, 'quantity' => 1],
];

if (isset($_GET['id'])) {
  $id = strip_tags($_GET['id']);
  $productInfo = $products[$id];
  $product = new Product;
  $product->setId($productInfo['id']);
  $product->setName($productInfo['name']);
  $product->setPrice($productInfo['price']);
  $product->setQuantity($productInfo['quantity']);

  $cart = new Cart;

  $cart->add($product);
  var_dump($_SESSION['cart']) ?? [];
}

?>
<!DOCTYPE html>
<html lang="pt-BR">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">
  <meta content="IE=edge" http-equiv="X-UA-Compatible">

  <title>Clube FullStack - Carrinho</title>
</head>

<body>
  <a href="mycart.php">Go to Cart</a>
  <ul>
    <li>Geladeira <a href="?id=1">Add</a> R$ 1000,00</li>
    <li>Mouse <a href="?id=2">Add</a> R$ 100,00</li>
    <li>Teclado <a href="?id=3">Add</a> R$ 10,00</li>
    <li>Monitor <a href="?id=4">Add</a> R$ 5000,00</li>
  </ul>
</body>

</html>

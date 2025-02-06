<?php
session_start();

use App\Classes\Cart;
use App\Classes\CartProducts;

require "../vendor/autoload.php";

$cartProducts = new CartProducts(new Cart);


var_dump($cartProducts->products());
?>

<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="IE=edge" http-equiv="X-UA-Compatible">

    <title>Cart</title>
</head>

<body>

    <h2>Cart | <a href="/">Home</a></h2> 
    <hr>
    <div id="container">

    </div>

</body>

</html>
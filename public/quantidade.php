<?php

use App\Classes\Cart;
session_start();


require '../vendor/autoload.php';

$quantity = filter_input(INPUT_GET,'qty', FILTER_SANITIZE_NUMBER_INT);
$id = filter_input(INPUT_GET,'id', FILTER_SANITIZE_NUMBER_INT);

$cart = new Cart();
$cart->quantity($id, $quantity);

header('Location: cart.php');;

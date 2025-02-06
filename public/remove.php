<?php

use App\Classes\Cart;
session_start();


require '../vendor/autoload.php';


$id = filter_input(INPUT_GET,'id', FILTER_SANITIZE_NUMBER_INT); 

$cart = new Cart();

$cart->remove($id);

header('Location: cart.php');
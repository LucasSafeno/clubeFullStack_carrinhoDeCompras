<?php

use App\Classes\Cart;
session_start();


require '../vendor/autoload.php';


(new Cart)->clear();

header('Location: cart.php');
<?php
session_start();

require "../vendor/autoload.php";

use App\Classes\Cart;
use App\Database\Models\Read;


//$products = require "../App/Helpers/products.php";

//var_dump($products);

$cart = new Cart;

$productsInCart = $cart->cart();

$read = new Read;

$products = $read->all('products');


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cart</title>
    <link rel="stylesheet" href="assets/css/style.css">
</head>
<body>

    <div id="container">
        <h3>Cart :  <?=count($productsInCart)?> | <a href="cart.php">Go to Cart</a> </h3>
        <ul>
            <?php foreach($products as $product): ?>
                <li><?= $product->name; ?> | R$:<?= number_format($product->price, 2,',','.' ) ?> <a href="add.php?id=<?php echo $product->id ?>">add to cart</a></li> 
            <?php endforeach; ?>
        </ul>

    </div>
    
</body>
</html>
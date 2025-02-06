<?php
session_start();

require "../vendor/autoload.php";

use App\Classes\Cart;


$products = require "../App/Helpers/products.php";

//var_dump($products);

$cart = new Cart;
$cart->clear();

$cart->dump();


$productsInCart = $cart->cart();


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cart</title>
</head>
<body>

    <div id="container">
        <h3>Cart :  <?=count($productsInCart)?> | <a href="cart.php">Go to Cart</a> </h3>
        <ul>
            <?php foreach($products as $index => $product): ?>
                <li><?= $product['name']; ?> | R$:<?= number_format($product['price'], 2,',','.' ) ?></li> <a href="add.php?id=<?php echo $index ?>">add to cart</a>
            <?php endforeach; ?>
        </ul>

    </div>
    
</body>
</html>
<?php
session_start();

use App\Classes\Cart;
use App\Classes\CartProducts;
use App\Database\Models\Read;

require "../vendor/autoload.php";


$cartProducts = new CartProducts();

//(new Cart)->clear();
//var_dump($cartProducts->products());

$products = $cartProducts->products(new Cart);

?>

<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="IE=edge" http-equiv="X-UA-Compatible">
    <title>Cart</title>
    <link rel="stylesheet" href="assets/css/style.css">
</head>

<body>

    <h2>Cart | <a href="/">Home</a></h2> 
    <hr>
    <div id="container">
        <?php if(count(value: $products['products']) <= 0): ?>
            <h3>Nenhum Produto no Carrinho de compras</h3>
        <?php else: ?>
            <ul>
                <?php foreach($products['products'] as $product): ?>
                    <li class="cart-product">
                        <?= $product['product']?>
                        <form action="quantidade.php" method="GET">
                            <input type="text" name="qty" value="<?= $product['qty']?>" id="cart-input-quantity">
                            <input type="hidden" name="id" value="<?= $product['id']?>">
                        </form> x R$ <?= number_format($product['price'], 2, ',', '.')?> | <?= number_format($product['subtotal'], 2, ',', '.')?> |
                        <a href="remove.php?id=<?=$product['id']?>" id="cart-remove">Remove</a>
                    </li>
                 <?php endforeach; ?>
            </ul>
            <div id="cart-total-clear">
                <span id="cart-total">
                    Total : R$ <?= number_format($products['total'], 2, ',', '.') ?>
                </span>

                <span id="cart-clear">
                    <a href="clear.php">Clear Cart</a>
                </span>
            </div>
        <?php endif; ?>
    </div>

</body>

</html>
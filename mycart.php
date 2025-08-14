<?php
require 'Product.php';
require 'Cart.php';

session_start();

$cart = new Cart();
$productIncart = $cart->getCart();


if (isset($_GET['id'])) {
  $id = strip_tags($_GET['id']);
  $cart->remove($id);
  header('Location: mycart.php');
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>List Products in Cart</title>
</head>

<body>
  <a href="index.php">Go to Home</a>
  <ul>
    <?php if (count($productIncart) <= 0): ?>
      <h3>Nenhum produto...</h3>
    <?php endif; ?>
    <?php foreach ($productIncart as $product): ?>
      <li>
        <?= $product->getName() ?>
        <input type="text" value="<?= $product->getQuantity() ?>">
        Price R$ <?= number_format($product->getPrice(), 2, ',', '.') ?>
        Subtotal <?= number_format($product->getPrice() * $product->getQuantity(), 2, ',', '.') ?>
        <a href="?id=<?= $product->getId() ?>">Remove</a>

      </li>
    <?php endforeach; ?>
    <li>
      Total : <?= number_format($cart->getTotal(), 2, ',', '.') ?>
    </li>
  </ul>
</body>

</html>

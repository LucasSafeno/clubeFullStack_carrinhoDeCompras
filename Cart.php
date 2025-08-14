<?php
class Cart
{
  public function add(Product $product)
  {
    $inCart = false;
    $this->setTotal($product);
    if (count($this->getCart()) > 0) {
      foreach ($this->getCart() as $productInCart) {
        if ($productInCart->getId() == $product->getId()) {
          $quantity = $productInCart->getquantity() + $product->getQuantity();
          $productInCart->setQuantity($quantity);
          $inCart = true;
          break;
        }
      }
    }

    if (!$inCart) {
      $this->setProductsInCart($product);
    }
  } //? add

  private function setProductsInCart($product)
  {
    $_SESSION['cart']['products'][]  = $product;
  } //? setProductsInCart

  private function setTotal(Product $product)
  {
    $_SESSION['cart']['total'] += $product->getPrice() * $product->getQuantity();
  } //? setTotal
  public function remove(int $id)
  {
    if (isset($_SESSION['cart']['products'])) {
      foreach ($this->getCart() as $index => $product) {
        if ($product->getId() == $id) {
          unset($_SESSION['cart']['products'][$index]);
          $_SESSION['cart']['total']  -= $product->getPrice() * $product->getQuantity();
          break;
        }
      }
    }
  } //? remove

  public function getCart()
  {
    return $_SESSION['cart']['products'] ?? [];
  } //? getCart

  public function getTotal()
  {
    return $_SESSION['cart']['total'] ?? 0;
  } //? getTotal
} //! Cart

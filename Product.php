<?php
class Product
{
  private int $id;
  private string $name;
  private int $price;
  private int $quantity;
  public function setId(int $id)
  {
    $this->id = $id;
  } //?setId

  public function setName(string $name)
  {
    $this->name = $name;
  } //?SetName

  public function setPrice(int $price)
  {
    $this->price = $price;
  } //? setPrice

  public function setQuantity(int $qnt)
  {
    $this->quantity = $qnt;
  } //? quantity

  public function getId()
  {
    return $this->id;
  } //? getId
  public function getName()
  {
    return $this->name;
  } //?getName
  public function getPrice()
  {
    return $this->price;
  } //?getPrice
  public function getQuantity()
  {
    return $this->quantity;
  } //?getquantity
} //!Product

<?php

namespace App\Classes;

use App\Interfaces\CartInterface;

class Cart implements CartInterface
{

    public function add($product){
        if(!isset($_SESSION['cart'])){
            $_SESSION['cart'] = [];
        }

        (!isset($_SESSION['cart'][$product])) ??
            $_SESSION['cart'][$product] = 1;    
            $_SESSION['cart'][$product] += 1;
        
    }// add


    public function remove($product){

        if(isset($_SESSION['cart'][$product])){
            unset($_SESSION['cart'][$product]);
        }
    } // remove

    
    public function quantity($product, $quantity){
        if (isset($_SESSION['cart'][$product])) {
            if ($quantity === 0 || $quantity === '') {
                $this->remove($product);
                return;
            }
            $_SESSION['cart'][$product] = $quantity;
        }
    } // quantity
    public function clear(){
        if (isset($_SESSION['cart'])) {
            unset($_SESSION['cart']);
        }
    }// clear
    public function cart(){
        if(isset($_SESSION['cart'])){
            return $_SESSION['cart'];
        }

        return [];
    } // cart()


    public function dump(){
        if (isset($_SESSION['cart'])) {
            var_dump($_SESSION['cart']);
        }
    }


} // cart

<?php

namespace App\Classes;

use App\Interfaces\CartInterface;

class CartProducts
{
    
    public function __construct(private CartInterface $cartInterface){
        
        
    }

    public function products(){
        $productsIncart = $this->cartInterface->cart();
        $productsInDatabase = require("../App/Helpers/products.php");

        $products = [];
        $total = 0;

        foreach ($productsIncart as $productId => $quantity) {
            $product = $productsInDatabase[$productId];
;            $products[] = [
                "id" => $productId,
                'product' => $product['name'],
                'price' => $product['price'],
                'qty' => $quantity,
                'subtotal' => $quantity * $product['price'],
            ];

            $total += $quantity * $product['price'];
        }

        return [
            'products' => $products,
            'total' => $total
        ];
    }
}

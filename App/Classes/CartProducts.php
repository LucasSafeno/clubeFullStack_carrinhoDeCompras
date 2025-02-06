<?php

namespace App\Classes;

use App\Interfaces\CartInterface;

class CartProducts
{

    public function products(CartInterface $cartInterface){
        $productsIncart = $cartInterface->cart();
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

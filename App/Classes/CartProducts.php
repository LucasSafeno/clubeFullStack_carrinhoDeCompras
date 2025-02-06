<?php

namespace App\Classes;

use App\Database\Models\Read;
use App\Interfaces\CartInterface;

class CartProducts
{

    public function products(CartInterface $cartInterface){
        $productsIncart = $cartInterface->cart();
        //$productsInDatabase = require("../App/Helpers/products.php");

        $productsInDatabase = (new Read)->all('products');

        
        $products = [];
        $total = 0;

        foreach ($productsIncart as $productId => $quantity) {

            $product = [...array_filter($productsInDatabase, fn($product) => (int)$product->id === $productId)];
            

            //$product = $productsInDatabase[$productId];
            $products[] = [
                "id" => $productId,
                'product' => $product[0]->name,
                'price' => $product[0]->price,
                'qty' => $quantity,
                'subtotal' => $quantity * $product[0]->price,
            ];

            $total += $quantity * $product[0]->price;
        }

        return [
            'products' => $products,
            'total' => $total
        ];
    }
}

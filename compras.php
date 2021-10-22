<?php

$products = [
    [
        'name' => 'pan',
        'precio' => 2,
        'cantidad'=> 2
    ],

    [
        'name' => 'papas',
        'precio' => 1,
        'cantidad'=> 0
    ],
    [
        'name' => 'cocacola',
        'precio' => 3,
        'cantidad'=> 3
    ],

    [
        'name' => 'agua',
        'precio' => 4,
        'cantidad'=> 0
    ]
];

printProducts(compra(10,$products));

function compra($cartera,$productos) {
    $carrito = [];
    do {
        foreach ($productos as $key => $producto){
            if($producto['cantidad'] > 0 && $producto['precio'] <= $cartera ){
                $cartera = $cartera - $producto['precio'];

                $carrito = meteloDentro($producto,$carrito);
                // restar la cantidad
                $productos[$key]['cantidad']--;
            }
         }
         echo "Cartera: $cartera\n";
    } while (puedoComprar($productos,$cartera));
    return $carrito;
}

function meteloDentro($product,$cart){
    foreach ($cart as $key => $item) {
        if($product['name'] == $item['name']){
            $cart[$key]['cantidad']++;
            return $cart;
        }
    }
    $product['cantidad'] = 1;
    $cart[]=$product;
    return $cart;
}

function puedoComprar($products,$cartera){
    // cartera mayor que 0
    if($cartera <= 0)
        return false;
    // 
    foreach ($products as $key => $product) {
        if($product['cantidad'] > 0 && $product['precio'] <= $cartera){
            return true;
        }
    }

    return false;
}





function printProducts($products){
    if(count($products) == 0){
        echo "No hay productos";
        return;
    }

    foreach ($products as $product){
        echo "product: ".$product['name'].", precio: ".$product['precio']."€ ". $product['cantidad']. "\n";
    }
} 
#printProducts($products);


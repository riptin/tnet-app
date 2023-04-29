<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProjectController;

Route::get('/', function () {
  return view('welcome');
});

Route::controller(ProjectController::class)->group(function () {
  Route::post('/add-product/{productId}', 'addProductInCart');
  Route::post('/remove-product/{productId}', 'removeProductFromCart');
  Route::post('/set-product-quantity/{productId}/{quantity}', 'setCartProductQuantity');
  Route::get('/cart', 'getUserCart');
});
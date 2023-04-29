<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Cart;
use App\Models\User;
use Illuminate\Support\Facades\DB;

class ProjectController extends Controller
{

    private $user = null;
    
    public function __construct()
    {
        $this->user = User::findOrFail(15);
    }

    public function addProductInCart(Request $request)
    {
      $productId = $request->productId;

      if (!Product::find($productId)) {
        $response = 'Item not found';
      } else {
        $userCartItems = $this->user->cart_products(); 
        $userCartItem = $userCartItems->where('product_id', $productId);

        if ($userCartItem->exists()) {
          $userCartItems->updateExistingPivot($productId, ['quantity' => DB::raw('quantity + 1')]);
          $response = "Item $productId Quantity Increased to {$userCartItem->first()->cart->quantity}";
        } else {
          $userCartItems->attach($productId);
          $response = "Item $productId Added";
        }
      }

      return view('welcome', ['responseText' => $response]);
    }

    public function removeProductFromCart(Request $request)
    {
      $productId = $request->productId;

      if (!Product::find($productId)) {
        $response = 'Item not found';
      } else {
        $userCartItems = $this->user->cart_products(); 
        $userCartItem = $userCartItems->where('product_id', $productId);
        
        if ($userCartItem->exists()) {
          if($userCartItem->first()->cart->quantity > 1) {
            $userCartItems->updateExistingPivot($productId, ['quantity' => DB::raw('quantity - 1')]);
            $response = "Item $productId Quantity Decreased to {$userCartItem->first()->cart->quantity}";
          } else {
            $userCartItems->detach($productId);
            $response = "Item $productId Removed";
          }
        } else {
          $response = "Item not found in the cart";
        }
      }

      return view('welcome', ['responseText' => $response]);
    }

    public function setCartProductQuantity(Request $request)
    {
        $productId = $request->productId;
        $quantity = $request->quantity;
        
        if (!Product::find($productId)) {
          $response = 'Item not found';
        } else {
          $userCartItems = $this->user->cart_products();
          $userCartItem = $userCartItems->where('product_id', $productId);

          if ($quantity < 1) {
            $userCartItems->detach($productId);
            $response = "Item $productId Removed";
          } else {
            if ($userCartItem->exists()) {
              $userCartItems->updateExistingPivot($productId, ['quantity' => $quantity]);
            } else {
              $userCartItems->attach($productId, ['quantity' => $quantity]);
            }
            $response = "Item $productId Quantity Set to $quantity";
          }
        }

        return view('welcome', ['responseText' => $response]);
    }

    public function getUserCart(Request $request)
    {
        $totalDiscount = 0;
        $userCartItems = $this->user
          ->cart_products()
          ->with('user_product_groups')
          ->orderBy('id')
          ->get()
          ->toArray();
        $cartItemIds = array_column($userCartItems, 'id');

        foreach($userCartItems as $cartItem) {
          if(isset($cartItem['user_product_groups'])) {
            foreach ($cartItem['user_product_groups'] as $productGroup) {
              if (
                !array_diff($productGroup['product_ids'], $cartItemIds) && 
                $productGroup['discount'] > 0 && 
                $productGroup['discount'] <= 100
              ) {
                $filteredProducts = array_filter($userCartItems, function($item) use ($productGroup) {
                  return in_array($item['id'], $productGroup['product_ids']);
                });

                $lowestQuantity = min(array_map(function($product) {return $product['cart']['quantity'];}, $filteredProducts));
                $totalDiscount += $lowestQuantity*($cartItem['price']/100*$productGroup['discount']);
              }
            }
          }
        }

        return view('welcome', ['cartItems' => [
          'products' => $userCartItems,
          'discount' => $totalDiscount
        ]]);
    }
}
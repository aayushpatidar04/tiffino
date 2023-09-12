<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Cart;
use App\Models\Food;
use App\Models\User;
use Illuminate\Http\Request;

class CartController extends Controller
{
    public function add_to_cart(Request $request)
    {
        $food = Food::find($request->food_id);
        $user = User::find($request->user_id);
        $price = $food->price;
        $quantity = $request->quantity;
        $total = $request->total;
        $cart = new Cart();
        $cart->user_id = $user->id;
        $cart->food_id = $food->id;
        $cart->quantity = $quantity;
        $cart->price = $price;
        $cart->total = $total;
        $cart->save();
        return response()->json([
            'message' => 'Food added to cart successfully',
            'cart' => $cart
        ], 200);
    }
    public function cart(Request $request)
    {
        $user = User::find($request->user_id);
        $cart = Cart::where('user_id', $user->id)->get();
        if($cart->isEmpty()) {
            return response()->json([
                'message' => 'Cart is empty'
            ], 404);
        }
        else
        {
            foreach($cart as $c)
            {
                $food = Food::find($c->food_id);
                $c->food_name = $food->name;
                $c->food_image = $food->image;
            }
            return response()->json($cart, 200);
        }
    }
}

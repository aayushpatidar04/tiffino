<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Cart;
use App\Models\FastFoodSubCategory;
use App\Models\SubsProducts;
use App\Models\Food;
use App\Models\User;
use Illuminate\Http\Request;

class CartController extends Controller
{
    public function add_to_cart(Request $request)
    {   
        if($request->foodtype == "food"){
            $food = Food::find($request->food_id);  
        }else if($request->foodtype == "fastfood"){
            $food = FastFoodSubCategory::find($request->food_id);
        }else if($request->foodtype == "subscription"){
            $food = SubsProducts::find($request->food_id);
        }
        $user = User::where('email', $request->user_email)->first();
        $price = $food->price;
        $quantity = $request->quantity;
        $total = $price * $quantity;
        $cart = new Cart();
        $cart->user_id = $user->id;
        $cart->user_email = $user->email;
        $cart->food_id = $food->id;
        $cart->food_name = $food->name;
        $cart->food_image = $food->image;
        $cart->food_type = $request->foodtype;
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
        $user = User::where('email', $request->user_email)->first();
        if (!$user) {
            return response()->json(['error' => 'User not found'], 404);
        }

        $cart = Cart::where('user_email', $user->email)->get();
        if($cart->isEmpty()) {
            return response()->json([
                'message' => 'Cart is empty'
            ], 404);
        }
        else
        {
            $t = $cart->sum('total');
            $responseData = [
                'total' => $t,
                'cart' => $cart,
            ];
            
            return response()->json($responseData, 200);
        }
    }

    public function delete_from_cart(Request $request){
        $request->validate([
            'cart_id' => 'required',
            'user_email' => 'required',
        ]);

        $data=Cart::find($request->cart_id);
        if ($data) {
            if ($data->user_email != $request->user_email){
                return response()->json(['message' => 'Unauthorized'], 401);        
            }
            $data->delete();
            return response()->json(['message' => 'Cart deleted successfully'], 200);
        } else {
            return response()->json(['message' => 'Cart not found'], 404);
        }
    }
}

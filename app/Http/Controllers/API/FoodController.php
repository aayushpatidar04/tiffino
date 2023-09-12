<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Food;
use Illuminate\Http\Request;

class FoodController extends Controller
{
    public function allfooditems()
    {
        $data = Food::all();
        return response()->json($data);
    }
    public function fooddetails(Request $request)
    {
        $data = Food::find($request->id);
        return response()->json($data);
    }
}

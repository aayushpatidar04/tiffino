<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\FastFood;
use App\Models\FastFoodSubCategory;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;

class FastFoodController extends Controller
{
    public function getallfastfood(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'id' => 'required'
        ]);
        if($validator->fails()) 
        {
            return response()->json($validator->errors());
        }
        else
        {
            $data = FastFoodSubCategory::where('fastfood_id',$request->id)->get();
            foreach($data as $d)
            {
                $d->fastfood_type=FastFood::find($d->fastfood_id)->name;
            }
            return response()->json($data);
        }
    }
    public function getfastfooddetails(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'id' => 'required'
        ]);
        if($validator->fails()) 
        {
            return response()->json($validator->errors());
        }
        else
        {
            $data =FastFoodSubCategory::find($request->id);
            $data->fastfood_type = FastFood::find($data->fastfood_id)->name;
            return response()->json($data);
        }
    }
}

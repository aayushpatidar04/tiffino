<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Subs;
use App\Models\SubsCategory;
use App\Models\SubsProducts;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;

class SubsProductsController extends Controller
{
    public function getallproducts($id,$slug)
    {
        $subcategoryid = SubsCategory::where('subscription_category_id',$id)->where('name',$slug)->first()->id;
        $data = SubsProducts::where('subscription_category_id',$id)->where('subscription_sub_category_id',$subcategoryid)->get();
        $resdata = [
            "products" => $data
        ];
        return response()->json($resdata);
    }
    public function getproductdetails(Request $request)
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
            $data = SubsProducts::find($request->id);
            $data->category = Subs::find($data->subscription_category_id)->name;
            $data->sub_category = SubsCategory::find($data->subscription_sub_category_id)->name;
            return response()->json($data);
        }
    }
}

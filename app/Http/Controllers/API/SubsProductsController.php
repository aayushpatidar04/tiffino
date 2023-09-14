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
    public function getallproducts(Request $request)
    {
        // $request->validate([
        //     'id' => 'required'
        // ]);

        $validator = Validator::make($request->all(), [
            'id' => 'required'
        ]);
        if($validator->fails()) 
        {
            return response()->json($validator->errors());
        }
        else
        {
            $data = SubsProducts::where('subscription_category_id',$request->id)->get();
            foreach($data as $d)
            {
                $d->category = Subs::find($d->subscription_category_id)->name;
                $d->sub_category = SubsCategory::find($d->subscription_sub_category_id)->name;
            }
            return response()->json($data);
        }
    }
    
}

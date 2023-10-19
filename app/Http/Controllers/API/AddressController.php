<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Address;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;

class AddressController extends Controller
{
    public function getaddressdetails(Request $request)
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
            $data =Address::find($request->id);
            return response()->json($data);
        }
    }
}
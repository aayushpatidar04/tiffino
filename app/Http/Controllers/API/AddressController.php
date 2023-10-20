<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Address;
use App\Models\User;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;

class AddressController extends Controller
{
    public function getaddressdetails(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'user_email' => 'required'
        ]);
        if ($validator->fails()) {
            return response()->json($validator->errors());
        } else {
            $data = Address::where('user_email', $request->user_email)->first();
            return response()->json($data);
        }
    }

    public function saveaddressdetails(Request $request)
    {
        $request->validate([
            'user_email' => 'required',
            'home_address' => 'required_without_all:work_address,other_address_1,other_address_2',
            'work_address' => 'required_without_all:home_address,other_address_1,other_address_2',
            'other_address_1' => 'required_without_all:home_address,work_address,other_address_2',
            'other_address_2' => 'required_without_all:home_address,work_address,other_address_1'
        ]);
        $data = Address::firstOrNew(['user_email' => $request->user_email]);
        
        $user = User::where('email', $request->user_email)->first();
        if (!$user) {
            return response()->json(['error' => 'User not found'], 404);
        }
        
        $data->user_id = $user->id;
        $data->user_email = $request->user_email;
        if (isset($request->home_address) && $request->home_address != "") {
            $data->home_address = $request->home_address;
        }
        if (isset($request->work_address) && $request->work_address != "") {
            $data->work_address = $request->work_address;
        }
        if (isset($request->other_address_1) && $request->other_address_1 != "") {
            $data->other_address_1 = $request->other_address_1;
        }
        if (isset($request->other_address_2) && $request->other_address_2 != "") {
            $data->other_address_2 = $request->other_address_2;
        }
        $data->save();
        return response()->json([
            'message' => 'Address saved successfully',
            'address details' => $data
        ], 200);
    }
}

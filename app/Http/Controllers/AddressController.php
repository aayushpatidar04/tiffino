<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Address;
use Illuminate\Http\Request;

class AddressController extends Controller
{
    public function index()
    {
        $fastfoods = Address::all();
        return view('address.index', compact('fastfoods'));
    }

    public function create()
    {
        return view('address.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'user_id'=>'required',
            'user_email'=>'required',
            'home_address' => 'required_without_all:work_address,other_address_1,other_address_2',
            'work_address' => 'required_without_all:home_address,other_address_1,other_address_2',
            'other_address_1' => 'required_without_all:home_address,work_address,other_address_2',
            'other_address_2' => 'required_without_all:home_address,work_address,other_address_1'
        ]);
        $data=new Address();
        $data->user_id=$request->user_id;
        $data->user_email=$request->user_email;
        if(isset($request->home_address) && $request->home_address!=""){
            $data->home_address=$request->home_address;
        }
        if(isset($request->work_address) && $request->work_address!=""){
            $data->work_address=$request->work_address;
        }
        if(isset($request->other_address_1) && $request->other_address_1!=""){
            $data->other_address_1=$request->other_address_1;
        }
        if(isset($request->other_address_2) && $request->other_address_2!=""){
            $data->other_address_2=$request->other_address_2;
        }
        $data->save();
        return redirect()->route('address.index')->with('success','Address Added Successfully');
    }

    public function edit($id)
    {
        $data=Address::find($id);
        return view('address.edit', compact('data'));
    }

    public function update(Request $request)
    {
        $data = Address::find($request->id);
        if(isset($request->home_address) && $request->home_address!=""){
            $data->home_address=$request->home_address;
        }
        if(isset($request->work_address) && $request->work_address!=""){
            $data->work_address=$request->work_address;
        }
        if(isset($request->other_address_1) && $request->other_address_1!=""){
            $data->other_address_1=$request->other_address_1;
        }
        if(isset($request->other_address_2) && $request->other_address_2!=""){
            $data->other_address_2=$request->other_address_2;
        }
        $data->save();
        return redirect()->route('address.index')->with('success','Address Updated Successfully');
    }

    public function destroy($id)
    {
        $data=Address::find($id);
        $data->delete();
        return redirect()->route('address.index')->with('success','Address Deleted Successfully');
    }
}

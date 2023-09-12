<?php

namespace App\Http\Controllers;

use App\Models\DeliveryBoys;
use Yajra\DataTables\DataTables;
use Illuminate\Http\Request;

class DeliveryBoysController extends Controller
{
    public function index(Request $request){
        if($request->ajax())
        {
            $data=DeliveryBoys::all();
            return DataTables::of($data)
            ->addIndexColumn()
            ->addColumn('action',function($row){
                $btn='<a href="'.route('db.edit',$row->id).'" class="edit btn btn-lg"><i class="fa fa-pencil"></i></a>';
                $btn=$btn.' <a href="javascript:void(0);" id="'.$row->id.'" class="delete btn btn-lg"><i style="color:black" class="fa fa-trash"></i></a>';
                return $btn;
            })
            ->rawColumns(['action'])
            ->make(true);
        }
        return view('db.index');
    }
    public function create(){
        return view('db.create');
    }
    public function store(Request $request)
    {
        $request->validate([
            'name'=>'required',
            'phone'=>'required|unique:delivery_boys|min:10|max:10|digits:10',
            'email'=>'required|email|unique:delivery_boys'
        ]);
        $data=new DeliveryBoys();
        $data->name=$request->name;
        $data->phone=$request->phone;
        $data->email=$request->email;
        $data->save();
        return redirect()->route('db.index')->with('success','Delivery Boy Added Successfully');
    }
    public function edit($id)
    {
        $data=DeliveryBoys::find($id);
        return view('db.edit',compact('data'));
    }
    public function update(Request $request)
    {
        $request->validate([
            'name'=>'required',
            'phone'=>'required|min:10|max:10|digits:10',
            'email'=>'required|email'
        ]);
        $data = DeliveryBoys::find($request->id);
        $data->name=$request->name;
        $data->email=$request->email;
        $data->phone=$request->phone;
        $data->save();
        return redirect()->route('db.index')->with('success','Delivery Boy Updated Successfully');
    }
    public function delete($id)
    {
        $data=DeliveryBoys::find($id);
        $data->delete();
        return redirect()->route('db.index')->with('success','Delivery Boy Removed Successfully');
    }
}
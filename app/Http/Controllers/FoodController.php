<?php

namespace App\Http\Controllers;

use App\Models\Food;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;

class FoodController extends Controller
{
    public function index(Request $request){
        if($request->ajax())
        {
            $data=Food::all();
            return DataTables::of($data)
            ->addIndexColumn()
            ->addColumn('action',function($row){
                $btn='<a href="'.route('food.edit',$row->id).'" class="edit btn btn-lg"><i class="fa fa-pencil"></i></a>';
                $btn=$btn.' <a href="javascript:void(0);" id="'.$row->id.'" class="delete btn btn-lg"><i style="color:black" class="fa fa-trash"></i></a>';
                return $btn;
            })
            ->rawColumns(['action'])
            ->make(true);
        }
        return view('food.index');
    }
    public function create(){
        return view('food.create');
    }
    public function store(Request $request)
    {
        $request->validate([
            'name'=>'required',
            'price'=>'required',
            'image'=>'required',
            'description'=>'required'
        ]);
        $data=new Food();
        $data->name=$request->name;
        $data->price=$request->price;
        if($request->hasFile('image'))
        {
            $file=$request->file('image');
            $ext=$file->getClientOriginalExtension();
            $filename=time().'.'.$ext;
            $file->move('images/food',$filename);
            $data->image=$filename;
        }
        $data->description=$request->description;
        $data->save();
        return redirect()->route('food.index')->with('success','Food Added Successfully');
    }
    public function edit($id)
    {
        $data=Food::find($id);
        return view('food.edit',compact('data'));
    }
    public function update(Request $request)
    {
        $food = Food::find($request->id);
        $food->name=$request->name;
        $food->price=$request->price;
        if($request->hasFile('image'))
        {
            $file=$request->file('image');
            $ext=$file->getClientOriginalExtension();
            $filename=time().'.'.$ext;
            $file->move('images/food',$filename);
            $food->image=$filename;
        }
        $food->description=$request->description;
        $food->save();
        return redirect()->route('food.index')->with('success','Food Updated Successfully');
    }
    public function delete($id)
    {
        $data=Food::find($id);
        $data->delete();
        return redirect()->route('food.index')->with('success','Food Deleted Successfully');
    }
}

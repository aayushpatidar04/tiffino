<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\FastFoodSubCategory;
use Illuminate\Http\Request;

class FastFoodSubCategoryController extends Controller
{
    public function index()
    {
        $fastfoods = FastFoodSubCategory::all();
        return view('fastfoodsubcategory.index', compact('fastfoods'));
    }

    public function create()
    {
        return view('fastfoodsubcategory.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name'=>'required',
            'price'=>'required',
            'image'=>'required',
            'description'=>'required'
        ]);
        $data=new FastFoodSubCategory();
        $data->name=$request->name;
        $data->price=$request->price;
        if($request->hasFile('image'))
        {
            $file=$request->file('image');
            $ext=$file->getClientOriginalExtension();
            $filename=time().'.'.$ext;
            $file->move('images/fastfood',$filename);
            $data->image=$filename;
        }
        $data->description=$request->description;
        $data->save();
        return redirect()->route('fastfoodsubcategory.index')->with('success','FastFood SubCategory Added Successfully');
    }

    public function edit($id)
    {
        $data=FastFoodSubCategory::find($id);
        return view('fastfoodsubcategory.edit', compact('data'));
    }

    public function update(Request $request)
    {
        $fastfood = FastFoodSubCategory::find($request->id);
        $fastfood->name = $request->name;
        $fastfood->price=$request->price;
        if($request->hasFile('image'))
        {
            $file=$request->file('image');
            $ext=$file->getClientOriginalExtension();
            $filename=time().'.'.$ext;
            $file->move('images/fastfood',$filename);
            $fastfood->image=$filename;
        }
        $fastfood->description=$request->description;
        $fastfood->save();
        return redirect()->route('fastfoodsubcategory.index')->with('success','FastFood SubCategory Updated Successfully');
    }

    public function destroy($id)
    {
        $data=FastFoodSubCategory::find($id);
        $data->delete();
        return redirect()->route('fastfoodsubcategory.index')->with('success','FastFood SubCategory Deleted Successfully');
    }
}

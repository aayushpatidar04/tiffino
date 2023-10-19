<?php

namespace App\Http\Controllers;

use App\Models\FastFoodSubCategory;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;

class FastFoodSubCategoryController extends Controller
{
    public function index($id, Request $request)
    {
        if($request->ajax())
        {
            $data=FastFoodSubCategory::where('fastfood_id', $id)->get();
            return DataTables::of($data)
            ->addIndexColumn()
            ->addColumn('action',function($row){
                $btn='<a href="#" class="edit btn btn-lg btn-primary">View SubCategories</a>';
                return $btn;
            })
            ->rawColumns(['action'])
            ->make(true);
        }
        return view('fastfood.subproducts');
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
            'description'=>'required',
            'fastfood_id'=>'required'
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
        $data->fastfood_id=$request->fastfood_id;
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
        $fastfood->fastfood_id=$request->fastfood_id;
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

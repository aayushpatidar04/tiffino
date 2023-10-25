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
                $btn='<a href="'.route('fastfoodsubcategory.edit',$row->id).'" class="edit btn btn-lg"><i class="fa fa-pencil"></i></a>';
                $btn=$btn.' <a href="javascript:void(0);" id="'.$row->id.'" class="delete btn btn-lg"><i style="color:black" class="fa fa-trash"></i></a>';
                return $btn;
            })
            ->rawColumns(['action'])
            ->make(true);
        }
        return view('fastfood.subproducts', compact('id'));
    }

    public function create($id)
    {
        return view('fastfood.create', compact('id'));
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
        return redirect()->route('fastfood.index')->with('success','FastFood SubCategory Added Successfully');
    }

    public function edit($id)
    {
        $data=FastFoodSubCategory::find($id);
        return view('fastfood.subedit', compact('data', 'id'));
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
        return redirect()->route('fastfood.index')->with('success','FastFood SubCategory Updated Successfully');
    }

    public function delete($id)
    {
        $data=FastFoodSubCategory::find($id);
        $data->delete();
        return redirect()->back()->with('success','FastFood SubCategory Deleted Successfully');
    }
}

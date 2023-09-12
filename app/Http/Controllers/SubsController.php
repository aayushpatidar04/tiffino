<?php

namespace App\Http\Controllers;

use App\Models\Subs;
use App\Models\SubsCategory;
use App\Models\SubsProducts;
use Yajra\DataTables\DataTables;
use Illuminate\Http\Request;

class SubsController extends Controller
{
    public function index(Request $request)
    {
        if($request->ajax())
        {
            $data=Subs::all();
            return DataTables::of($data)
            ->addIndexColumn()
            ->addColumn('action',function($row){
                $btn='<a href="'.route('subs.categories',$row->id).'" class="edit btn btn-lg btn-primary">View SubCategories</a>';
                return $btn;
            })
            ->rawColumns(['action'])
            ->make(true);
        }
        return view('subs.index');
    }
    public function categories($id,Request $request)
    {
        if($request->ajax())
        {
            $data=SubsCategory::where('subscription_category_id',$id)->get();
            return DataTables::of($data)
            ->addIndexColumn()
            ->addColumn('action',function($row){
                $btn='<a href="'.route('subs.products',$row->id).'" class="edit btn btn-lg btn-primary">View Products</a>';
                return $btn;
            })
            ->editColumn('subscription_category_id',function($row){
                $name = Subs::find($row->subscription_category_id)->name;
                return $name;
            })
            ->rawColumns(['action'])
            ->make(true);
        }
        return view('subs.category');
    }
    public function products($id,Request $request)
    {
        if($request->ajax())
        {
            $data=SubsProducts::where('subscription_sub_category_id',$id)->get();
            return DataTables::of($data)
            ->addIndexColumn()
            ->addColumn('action',function($row){
                $btn='<a href="'.route('subproducts.edit',$row->id).'" class="edit mr-2"><i class="fa fa-edit"></i></a>';
                $btn = $btn.'<a href="javascript:void(0);" id="'.$row->id.'" class="delete"><i class="fa fa-trash"></i></a>';
                return $btn;
            })
            ->editColumn('subcategory_id',function($row){
                $name = SubsCategory::find($row->subscription_sub_category_id)->name;
                return $name;
            })
            ->editColumn('category_id',function($row){
                $name = Subs::find($row->subscription_category_id)->name;
                return $name;
            })
            ->editColumn('image',function($row){
                $img = '<img src="'.asset('images/products/'.$row->image).'" width="100">';
                return $img;
            })
            ->rawColumns(['image','action'])
            ->make(true);
        }
        return view('subs.products',compact('id'));
    }
    public function addproduct($id)
    {
        $subcategory_id = $id;
        $category_id = SubsCategory::find($id)->subscription_category_id;
        return view('subs.addproduct',compact('subcategory_id','category_id'));
    }
    public function store(Request $request)
    {
        $request->validate([
            'name'=>'required',
            'price'=>'required',
            'description'=>'required',
            'image'=>'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'subscription_category_id'=>'required',
            'subscription_sub_category_id'=>'required'
        ]);
        $product = new SubsProducts();
        $product->name = $request->name;
        $product->price = $request->price;
        $product->description = $request->description;
        if($request->hasFile('image')){
            $file = $request->file('image');
            $extension = $file->getClientOriginalExtension();
            $filename = time().'.'.$extension;
            $file->move('images/products',$filename);
            $product->image = $filename;
        }
        $product->subscription_category_id = $request->subscription_category_id;
        $product->subscription_sub_category_id = $request->subscription_sub_category_id;
        $product->rating = 0;
        $product->save();
        return redirect()->route('subs.products',$request->subscription_category_id)->with('success','Product added successfully');
    }
    public function editproduct($id)
    {
        $product = SubsProducts::find($id);
        return view('subs.editproduct',compact('product'));
    }
    public function updateproduct(Request $request)
    {
        $request->validate([
            'name'=>'required',
            'price'=>'required',
            'description'=>'required',
            'subscription_category_id'=>'required',
            'subscription_sub_category_id'=>'required',
            'id'=>'required',
        ]);
        $product = SubsProducts::find($request->id);
        $product->name = $request->name;
        $product->price = $request->price;
        $product->description = $request->description;
        $product->subscription_category_id = $request->subscription_category_id;
        $product->subscription_sub_category_id = $request->subscription_sub_category_id;
        if($request->hasFile('image'))
        {
            $file = $request->file('image');
            $extension = $file->getClientOriginalExtension();
            $filename = time().'.'.$extension;
            $file->move('images/products',$filename);
            $product->image = $filename;
        }
        $product->save();
        return redirect()->route('subs.products',$request->subscription_category_id)->with('success','Product updated successfully');
    }
    public function deleteproduct($id)
    {
        $product = SubsProducts::find($id);
        $product->delete();
        return redirect()->route('subs.products',$product->subscription_category_id)->with('success','Product deleted successfully');
    }
}

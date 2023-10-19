<?php

namespace App\Http\Controllers;

use App\Models\FastFood;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;


class FastFoodController extends Controller
{
    public function index(Request $request)
    {
        if($request->ajax())
        {
            $data=FastFood::all();
            return DataTables::of($data)
            ->addIndexColumn()
            ->addColumn('action',function($row){
                $btn='<a href="'.route('fastfood.subproducts', $row->id).'" class="edit btn btn-lg btn-primary">View Products</a>';
                $btn = $btn . '&nbsp;<a href="'. route('fastfood.edit', $row->id).'" class="btn btn-lg btn-primary">Edit</a>';
                return $btn;
            })
            ->rawColumns(['action'])
            ->make(true);
        }
        return view('fastfood.index');
    }

    public function create()
    {
        return view('fastfood.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name'=>'required'
        ]);
        $data=new FastFood();
        $data->name=$request->name;
        $data->save();
        return redirect()->route('fastfood.index')->with('success','FastFood Added Successfully');
    }

    public function edit($id)
    {
        $data=FastFood::find($id);
        return view('fastfood.edit', compact('data'));
    }

    public function update(Request $request)
    {
        $fastfood = FastFood::find($request->id);
        $fastfood->name = $request->name;
        $fastfood->save();
        return redirect()->route('fastfood.index')->with('success','FastFood Updated Successfully');
    }

    public function destroy($id)
    {
        $data=FastFood::find($id);
        $data->delete();
        return redirect()->route('fastfood.index')->with('success','FastFood Deleted Successfully');
    }
}

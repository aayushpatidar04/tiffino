<?php

namespace App\Http\Controllers;

use App\Models\FastFood;
use Illuminate\Http\Request;

class FastFoodController extends Controller
{
    public function index()
    {
        $fastfoods = FastFood::all();
        return view('fastfood.index', compact('fastfoods'));
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

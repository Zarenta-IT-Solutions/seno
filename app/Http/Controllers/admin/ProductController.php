<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Yajra\DataTables\DataTables;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if($request->has('datatable'))
        {
            $products = Product::select(['id','title','image','cost','quantity']);
            return DataTables::of($products)
                ->addIndexColumn()
                ->addColumn('action', function ($products) {
                    return '<a href="'.route('admin.products.edit',$products->id).'" class="btn btn-sm btn-primary"><i class="fa fa-edit"></i></a> </a> <a onclick="Delete('.$products->id.')" class="btn btn-sm btn-danger"><i class="fa fa-trash"></i></a>';
                })
                ->editColumn('image', '{{Storage::url($image)}}')
                ->make();
        }
        $stockists = User::role('Stockist')->get();
        return view('admin.products.index')->with('stockists',$stockists);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.products.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'title' => 'required|unique:gifts|max:255',
            'cost' => 'required',
            'quantity' => 'required',
            'image' => 'required|mimes:jpeg,bmp,png',
        ]);
        $data =  $request->except('_token','image');
        $data['user_id'] = Auth::id();
        $product = Product::firstOrCreate($data);
        $product->image = $request->file('image')->store('product/'.$product->id);
        $product->update();
        Session::flash('message', 'Product Added Successfully!');
        Session::flash('alert-class', 'alert-success');
        return redirect()->route('admin.products.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $product = Product::findOrFail($id);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $product = Product::findOrFail($id);
        return view('admin.products.edit')->with('product',$product);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $product = Product::findOrFail($id);
        $validatedData = $request->validate([
            'title' => 'required|unique:gifts|max:255',
            'cost' => 'required',
            'quantity' => 'required',
            'image' => 'mimes:jpeg,bmp,png',
        ]);
        $data =  $request->except('_token','image');

        if($request->hasFile('image')){
            $product->image = $request->file('image')->store('product/'.$product->id);
        }

        $product->update();
        Session::flash('message', 'Product Update Successfully!');
        Session::flash('alert-class', 'alert-success');
        return redirect()->route('admin.products.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}

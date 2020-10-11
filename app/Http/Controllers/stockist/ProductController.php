<?php

namespace App\Http\Controllers\stockist;

use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Models\User;
use Illuminate\Http\Request;
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
                    return '';
//                    return '<a href="'.route('admin.products.edit',$products->id).'" class="btn btn-sm btn-primary"><i class="fa fa-edit"></i></a> <a onclick="Assign('.$products->id.','.$products->quantity.')" class="btn btn-sm btn-success"><i class="fa fa-plus-circle"></i></a></a> <a onclick="Delete('.$products->id.')" class="btn btn-sm btn-danger"><i class="fa fa-trash"></i></a>';
                })
                ->editColumn('image', '{{Storage::url($image)}}')
                ->make();
        }
        $stockists = User::role('Stockist')->get();
        return view('stockist.products.index')->with('stockists',$stockists);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
        //
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

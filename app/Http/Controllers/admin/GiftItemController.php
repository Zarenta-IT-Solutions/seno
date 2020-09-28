<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\AssignGift;
use App\Models\Gift;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Yajra\DataTables\DataTables;

class GiftItemController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if($request->has('quantity'))
        {
            $gift = Gift::findOrFail($request->id);
            $assign = AssignGift::firstorCreate(['quantity'=>$request->quantity,'gift_id'=>$request->id,'user_id'=>$request->user_id]);
            $gift->quantity = $gift->quantity-$request->quantity;
            $gift->update();
            return 1;
        }
        if($request->has('datatable'))
        {
            $gifts = Gift::select(['id','title','image','cost','quantity']);
            return DataTables::of($gifts)
                ->addIndexColumn()
                ->addColumn('action', function ($gift) {
                    return '<a href="'.route('admin.gifts.edit',$gift->id).'" class="btn btn-sm btn-primary"><i class="fa fa-edit"></i></a> <a onclick="Assign('.$gift->id.','.$gift->quantity.')" class="btn btn-sm btn-success"><i class="fa fa-plus-circle"></i></a></a> <a onclick="Delete('.$gift->id.')" class="btn btn-sm btn-danger"><i class="fa fa-trash"></i></a>';
                })
                ->editColumn('image', '{{Storage::url($image)}}')
                ->make();
        }
        $stockists = User::role('Stockist')->get();
        return view('admin.gifts.index')->with('stockists',$stockists);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.gifts.create');
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
        $gift = Gift::firstOrCreate($data);
        $gift->image = $request->file('image')->store('gift/'.$gift->id);
        $gift->update();
        Session::flash('message', 'Gift Added Successfully!');
        Session::flash('alert-class', 'alert-success');
        return redirect()->route('admin.gifts.index');

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
        $gift  = Gift::findOrfail($id);
        return view('admin.gifts.edit')->with('gift',$gift);
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
        $gift  = Gift::findOrfail($id);
        $validatedData = $request->validate([
            'title' => 'required|unique:gifts|max:255',
            'cost' => 'required',
            'quantity' => 'required',
            'image' => 'mimes:jpeg,bmp,png',
        ]);
        $data =  $request->except('_token','image');

        if($request->has('iamge')) {
            $data['image'] = $request->file('image')->store('gift/' . $gift->id);
        }
        $gift->update($data);
        Session::flash('message', 'Gift Update Successfully!');
        Session::flash('alert-class', 'alert-success');
        return redirect()->route('admin.gifts.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $gift  = Gift::findOrfail($id);
        $gift->delete();
    }
}

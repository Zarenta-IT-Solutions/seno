<?php

namespace App\Http\Controllers\stockist;

use App\Http\Controllers\Controller;
use App\Models\AssignGift;
use App\Models\AssignGiftToMr;
use App\Models\Gift;
use App\Models\User;
use App\Notifications\AssignGiftNotification;
use App\Notifications\AssignGiftToMrNotification;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;

class GiftitemController extends Controller
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
            $user = User::find($request->user_id);
            $assign = AssignGiftToMr::firstorCreate(['quantity'=>$request->quantity,'gift_id'=>$request->id,'user_id'=>$request->user_id]);
            $gift->quantity = $gift->quantity-$request->quantity;
            $user->notify(new AssignGiftToMrNotification($assign));
            $gift->update();
            return 1;
        }
        if($request->has('datatable'))
        {
            $gifts = AssignGift::join('gifts','assign_gifts.gift_id','gifts.id')
                    ->select(['assign_gifts.id','gifts.title','gifts.image','gifts.cost','assign_gifts.quantity']);
            return DataTables::of($gifts)
                ->addIndexColumn()
                ->addColumn('action', function ($gift) {
                    return '<a onclick="Assign('.$gift->id.','.$gift->quantity.')" class="btn btn-sm btn-success"><i class="fa fa-plus-circle"></i></a> ';
                })
                ->editColumn('image', '{{Storage::url($image)}}')
                ->make();
        }
        $managers = User::role('MR')->get();
        return view('stockist.gifts.index')->with('managers',$managers);
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

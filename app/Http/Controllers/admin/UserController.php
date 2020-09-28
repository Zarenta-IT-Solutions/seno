<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\City;
use App\Models\Country;
use App\Models\State;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;
use Yajra\DataTables\DataTables;

class UserController extends Controller
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
            $users = User::select(['id','name','email','profile_photo_path','mobile']);

            return DataTables::of($users)
                ->addIndexColumn()
                ->addColumn('action', function ($user) {
                    return '<a href="'.route('admin.users.edit',$user->id).'" class="btn btn-sm btn-primary"><i class="fa fa-edit"></i></a>';
                })
                ->editColumn('profile_photo_path', '{{Storage::url($profile_photo_path)}}')
                ->make();
        }
        return view('admin.users.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $countries = Country::get();
        return view('admin.users.create')->with('countries',$countries);
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
            'name' => 'required|max:255',
            'email' => 'required|unique:users|max:255',
            'country_id' => 'required',
            'state_id' => 'required',
            'city_id' => 'required',
//            'address' => 'required',
            'mobile' => 'required',
            'password' => 'required|min:8',
            'image' => 'required|mimes:jpeg,bmp,png',
        ]);
        $data =  $request->except('_token','roles','image');
        $data['password'] = Hash::make($request->password);
        $user = User::firstOrCreate($data);
        $user->profile_photo_path = $request->file('image')->store('user/'.$user->id);
        foreach($request->roles as $role){
            $user->assignRole($role);
        }
        $user->update();
        Session::flash('message', 'User Added Successfully!');
        Session::flash('alert-class', 'alert-success');
        return redirect()->route('admin.users.index');
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
        $user = User::findorfail($id);
        $countries = Country::get();
        $states = State::where('country_id',$user->country_id)->get();
        $cities = City::where('state_id',$user->state_id)->get();
        return view('admin.users.edit')->with('user',$user)->with('countries',$countries)->with('states',$states)->with('cities',$cities);
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
        $user = User::findorfail($id);
        $data =  $request->except('_token','roles','image');
        $validatedData = $request->validate([
            'name' => 'required|max:255',
            'email' => 'required|unique:users,id,'.$id,
            'country_id' => 'required',
            'state_id' => 'required',
            'city_id' => 'required',
//            'address' => 'required',
            'mobile' => 'required',
//            'password' => 'required|min:8',
            'image' => 'mimes:jpeg,bmp,png',
        ]);
        if($request->hasFile('image')){
            $data['profile_photo_path'] = $request->file('image')->store('user/'.$user->id);
        }
        if($request->has('password')){
            $data['password'] = Hash::make($request->password);
        }
        foreach($request->roles as $role){
            $user->assignRole($role);
        }
        $user->update($data);
        Session::flash('message', 'User Update Successfully!');
        Session::flash('alert-class', 'alert-success');
        return redirect()->route('admin.users.index');
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

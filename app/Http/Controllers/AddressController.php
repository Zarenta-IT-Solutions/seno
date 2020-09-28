<?php

namespace App\Http\Controllers;

use App\Models\City;
use App\Models\State;
use Illuminate\Http\Request;

class AddressController extends Controller
{

    public function country($id)
    {
        $states = State::where('country_id',$id)->get();
        echo '<option selected disabled>Select State</option>';
        foreach ($states as $state){
            echo '<option value="'.$state->id.'">'.$state->name.'</option>';
        }
    }


    public function state($id)
    {
        $cities = City::where('state_id',$id)->get();
        echo '<option selected disabled>Select City</option>';
        foreach ($cities as $city){
            echo '<option value="'.$city->id.'">'.$city->name.'</option>';
        }
    }


}

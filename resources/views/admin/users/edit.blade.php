@extends('layouts.app')

@section('content')

    <div class="container">


        <div class="card o-hidden border-0 shadow-lg my-5">
            <div class="card-body p-0">
                <!-- Nested Row within Card Body -->
                <div class="p-5">
                    <div class="text-center">
                        <h1 class="h4 text-gray-900 mb-4">Edit User Account!</h1>
                    </div>


                    <form action="{{route('admin.users.update',$user->id)}}" method="POST" enctype="multipart/form-data">
                        @csrf @method('put')
                        <div class="form-group">
                            <input type="text" class="form-control form-control-user"  required name="name" placeholder="Full Name" value="{{old('name',$user->name)}}">
                        </div>

                        <div class="form-group">
                            <input type="email" class="form-control form-control-user" readonly name="email" value="{{old('email',$user->email)}}" placeholder="Email Address">
                        </div>
                        <div class="form-group row">
                            <div class="col-sm-4">
                                <select onchange="SelectCountry(this.value)" class="form-control form-control-user" name="country_id" required>
                                    <option selected disabled>Select Country</option>
                                    @foreach($countries as $country)
                                        <option {{old('country_id',$user->country_id)==$country->id?'selected':''}} value="{{$country->id}}">{{$country->name}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="col-sm-4">
                                <select id="State" onchange="SelectState(this.value)" class="form-control form-control-user" name="state_id" required>
                                    <option selected disabled>Select State</option>
                                    @foreach($states as $state)
                                        <option {{old('state_id',$user->state_id)==$state->id?'selected':''}} value="{{$state->id}}">{{$state->name}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="col-sm-4 mb-3 mb-sm-0">
                                <select id="City" class="form-control form-control-user" name="city_id" required>
                                    <option selected disabled>Select City</option>
                                    @foreach($cities as $city)
                                        <option {{old('city_id',$user->city_id)==$city->id?'selected':''}} value="{{$city->id}}">{{$city->name}}</option>
                                    @endforeach
                                </select>
                            </div>

                        </div>
                        <div class="form-group">
                            <input type="text" class="form-control form-control-user" required name="address" value="{{old('address',$user->address)}}" placeholder="Address">
                        </div>
                        <div class="form-group">
                            <div class="col-sm-6">
                                <input type="tel" class="form-control form-control-user" name="mobile" value="{{old('mobile',$user->mobile)}}" placeholder="Mobile Number">
                            </div>
                            <div class="col-sm-6">
                                <input type="text" class="form-control form-control-user" name="pin_code" value="{{old('pin_code',$user->pin_code)}}" placeholder="Pin Code">
                            </div>

                        </div>
                        <div class="form-group">
                            <select class="form-control form-control-user" name="roles[]" required multiple>

                                <option {{$user->hasRole('Admin')?'selected':''}} value="Admin">Admin</option>
                                <option {{$user->hasRole('MR')?'selected':''}} value="MR">MR</option>
                                <option {{$user->hasRole('Stockist')?'selected':''}} value="Stockist">Stockist</option>
                                <option {{$user->hasRole('Retailer')?'selected':''}} value="Retailer">Retailer</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <input type="password" class="form-control form-control-user" name="password" value="" placeholder="Password">
                        </div>

                        <div class="form-group">
                            <input type="file" class="form-control form-control-user" name="image" value="" >
                            <img src="{{Storage::url($user->profile_photo_path)}}" style="width: 50px" />
                        </div>
                        <input  type="submit" value="Save" class="btn btn-primary btn-user btn-block">

                    </form>
                </div>
            </div>
        </div>
    </div>

@endsection


@section('script')

    <script>
        function SelectCountry(id)
        {
            $.get('{{url('country')}}/'+id,function(resp){
                $('#State').html(resp);
            })
        }

        function SelectState(id)
        {
            $.get('{{url('state')}}/'+id,function(resp){
                $('#City').html(resp);
            })
        }


    </script>

@endsection

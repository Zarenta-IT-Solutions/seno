@extends('layouts.app')

@section('content')

    <div class="container">


        <div class="card o-hidden border-0 shadow-lg my-5">
            <div class="card-body p-0">
                <!-- Nested Row within Card Body -->
                <div class="p-5">
                    <div class="text-center">
                        <h1 class="h4 text-gray-900 mb-4">Add New User Account!</h1>
                    </div>


                    <form action="{{route('admin.users.store')}}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group">
                            <input type="text" class="form-control form-control-user"  required name="name" placeholder="Full Name" value="{{old('name')}}">
                        </div>

                        <div class="form-group">
                            <input type="email" class="form-control form-control-user" required name="email" value="{{old('email')}}" placeholder="Email Address">
                        </div>
                        <div class="form-group row">
                            <div class="col-sm-4">
                                <select onchange="SelectCountry(this.value)" class="form-control form-control-user" name="country_id" required>
                                    <option selected disabled>Select Country</option>
                                    @foreach($countries as $country)
                                        <option {{old('country_id')==$country->id?'selected':''}} value="{{$country->id}}">{{$country->name}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="col-sm-4">
                                <select id="State" onchange="SelectState(this.value)" class="form-control form-control-user" name="state_id" required>
                                    <option selected disabled>Select State</option>
                                </select>
                            </div>
                            <div class="col-sm-4 mb-3 mb-sm-0">
                                <select id="City" class="form-control form-control-user" name="city_id" required>
                                    <option selected disabled>Select City</option>
                                </select>
                            </div>

                        </div>
                        <div class="form-group">
                            <input type="text" class="form-control form-control-user"  name="address" value="{{old('address')}}" placeholder="Address">
                        </div>
                        <div class="form-group">
                            <input type="tel" class="form-control form-control-user" name="mobile" value="{{old('mobile')}}" placeholder="Mobile Number">
                        </div>
                        <div class="form-group">
                            <select class="form-control form-control-user" name="roles[]" required multiple>
                                <option selected disabled>Select Role</option>
                                <option {{old('Admin')==$country->id?'selected':''}} value="Admin">Admin</option>
                                <option {{old('MR')==$country->id?'selected':''}} value="MR">MR</option>
                                <option {{old('Stockist')==$country->id?'selected':''}} value="Stockist">Stockist</option>
                                <option {{old('Retailer')==$country->id?'selected':''}} value="Retailer">Retailer</option>
                            </select>
                        </div>

                        <div class="form-group">
                            <input type="password" class="form-control form-control-user" name="password" value="" placeholder="Password">
                        </div>
                        <div class="form-group">
                            <input type="file" class="form-control form-control-user" name="image" value="" >
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

@extends('layouts.app')

@section('content')

    <div class="container">


        <div class="card o-hidden border-0 shadow-lg my-5">
            <div class="card-body p-0">
                <!-- Nested Row within Card Body -->
                <div class="p-5">
                    <div class="text-center">
                        <h1 class="h4 text-gray-900 mb-4">Add New Gift Items!</h1>
                    </div>


                    <form action="{{route('admin.gifts.store')}}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group">
                            <input type="text" class="form-control form-control-user"  required name="title" placeholder="Title" value="{{old('title')}}">
                        </div>
                        <div class="form-group row">
                            <div class="col-sm-6">
                                <input type="number" class="form-control form-control-user"  required name="quantity" placeholder="Quantity" value="{{old('quantity')}}">
                            </div>
                            <div class="col-sm-6">
                                <input type="number" class="form-control form-control-user"  required name="cost" placeholder="Cost" value="{{old('cost')}}">
                            </div>
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


@endsection

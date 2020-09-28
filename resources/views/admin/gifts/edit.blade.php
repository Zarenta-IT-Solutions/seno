@extends('layouts.app')

@section('content')

    <div class="container">


        <div class="card o-hidden border-0 shadow-lg my-5">
            <div class="card-body p-0">
                <!-- Nested Row within Card Body -->
                <div class="p-5">
                    <div class="text-center">
                        <h1 class="h4 text-gray-900 mb-4">Edit Gift Items!</h1>
                    </div>


                    <form action="{{route('admin.gifts.update',$gift->id)}}" method="POST" enctype="multipart/form-data">
                        @csrf @method('put')
                        <div class="form-group">
                            <input type="text" class="form-control form-control-user"  required name="title" placeholder="Title" value="{{old('title',$gift->title)}}">
                        </div>
                        <div class="form-group row">
                            <div class="col-sm-6">
                                <input type="number" class="form-control form-control-user"  required name="quantity" placeholder="Quantity" value="{{old('quantity',$gift->quantity)}}">
                            </div>
                            <div class="col-sm-6">
                                <input type="number" class="form-control form-control-user"  required name="cost" placeholder="Cost" value="{{old('cost',$gift->cost)}}">
                            </div>
                        </div>

                        <div class="form-group">
                            <input type="file" class="form-control form-control-user" name="image" value="" >
                            <img src="{{Storage::url($gift->image)}}" height="50">
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

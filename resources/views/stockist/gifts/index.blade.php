@extends('layouts.app')

@section('content')

    <div class="container">
        <div class="card o-hidden border-0 shadow-lg my-5">
            <div class="card-body p-0">
                <!-- Nested Row within Card Body -->
                <div class="p-5">
                    <div class="text-center">
                        <h1 class="h4 text-gray-900 mb-4">Manage Gift Items</h1>
                    </div>
                    <div class="table-responsive">
                        <table class="table  dataTable">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Title</th>
                                    <th>Image</th>
                                    <th>Cost</th>
                                    <th>Quantity</th>
                                    <th>Options</th>
                                </tr>
                            </thead>
                            <tbody>

                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection

@section('style')

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jquery-confirm/3.3.2/jquery-confirm.min.css">

@endsection

@section('script')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-confirm/3.3.2/jquery-confirm.min.js"></script>
    <script>
        var table = $('.dataTable').DataTable({
            processing: true,
            serverSide: true,
            ajax: '{{route('stockist.gifts.index',['datatable'=>true])}}',
            columns: [
                { data: 'DT_RowIndex', name: 'Id' },
                {data: 'title', name: 'title'},
                {data: 'image', name: 'image',orderable: false, searchable: false, render: function( data, type, full, meta ) {
                        return "<img src=" + full.image + " height=\"50\"/>";
                    }},
                {data: 'cost', name: 'cost'},
                {data: 'quantity', name: 'quantity'},
                {data: 'action', name: 'action',orderable: false, searchable: false}
            ]
        });
        function Assign(id,q){
            $.confirm({
                title: 'Assign!',
                content: '' +
                    '<form action="" class="formName">' +
                    '<div class="form-group">' +
                    '<label>Select Medical Representative</label>' +
                    '<select  class="name form-control" required >@foreach ($managers as $manager) <option value="{{$manager->id}}">{{$manager->name}}</option> @endforeach</select>' +
                    '<label>Enter Quantity</label>' +
                    '<input type="number" max="'+q+'" value="'+q+'" placeholder="Enter Quantity" class="quantity form-control" required />' +
                    '</div>' +
                    '</form>',
                buttons: {
                    formSubmit: {
                        text: 'Submit',
                        btnClass: 'btn-blue',
                        action: function () {
                            var name = this.$content.find('.name').val();
                            var quantity = this.$content.find('.quantity').val();
                            $.get('{{route('stockist.gifts.index')}}?id='+id+'&user_id='+name+'&quantity='+quantity,function(resp){
                                $.alert('Assign Successfully!');
                                table.ajax.reload();
                            });

                        }
                    },
                    cancel: function () {
                        //close
                    },
                },
            });
        }
        function Delete(id){
            $.confirm({
                title: 'Confirm!',
                content: 'AreYou Sure To Delete This Gift',
                buttons: {
                    confirm: function () {
                      $.ajax({
                          url:'{{route('admin.gifts.index')}}/'+id,
                          type:'delete',
                          data:{_token:'{{csrf_token()}}'},
                          success:function(resp){
                              table.ajax.reload();
                          }
                      });
                    },
                    cancel: function () {
                        // $.alert('Canceled!');
                    },
                }
            });
        }
    </script>

@endsection

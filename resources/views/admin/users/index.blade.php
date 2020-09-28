@extends('layouts.app')

@section('content')

    <div class="container">
        <div class="card o-hidden border-0 shadow-lg my-5">
            <div class="card-body p-0">
                <!-- Nested Row within Card Body -->
                <div class="p-5">
                    <div class="text-center">
                        <h1 class="h4 text-gray-900 mb-4">Add New MR Account!</h1>
                    </div>
                    <div class="table-responsive">
                        <table class="table  dataTable">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Name</th>
                                    <th>Email</th>
                                    <th>Avatar</th>
                                    <th>Mobile</th>
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

@section('script')

    <script>
        $('.dataTable').DataTable({
            processing: true,
            serverSide: true,
            ajax: '{{route('admin.users.index',['datatable'=>true])}}',
            columns: [
                { data: 'DT_RowIndex', name: 'Id' },
                {data: 'name', name: 'name'},
                {data: 'email', name: 'email'},
                {data: 'profile_photo_url', name: 'avatar',orderable: false, searchable: false, render: function( data, type, full, meta ) {
                        return "<img src=" + full.profile_photo_path + " height=\"50\"/>";
                    }},
                {data: 'mobile', name: 'mobile'},
                {data: 'action', name: 'action',orderable: false, searchable: false}
            ]
        });
    </script>

@endsection

@extends('layouts.app')
@section('content')
    <div class="card">
        <div class="card-header">
            Users
        </div>
        <div class="card-body">
            <table id="myTable">
                <thead>
                <tr>
                    <th>
                        Id
                    </th>
                    <th>
                        Name
                    </th>
                    <th>
                        Role
                    </th>
                    <th>
                        BirthDay
                    </th>
                    <th>
                        Email
                    </th>
                    <th>
                        Action
                    </th>
                </tr>
                </thead>
            </table>
        </div>
    </div>
    <div>
{{--        {{$users->links()}}--}}
    </div>
@endsection
@section('js')
    <script src="https://cdn.datatables.net/1.10.25/js/jquery.dataTables.min.js"></script>
    <script>
        $(document).ready( function () {
            // $('#myTable').DataTable();
            $('#myTable').DataTable({
                processing: true,
                serverSide: true,
                ajax: '{!! route('datatables.data') !!}',
                columns: [
                    { data: 'id', name: 'id' },
                    { data: 'DT_RowData.data-name', name: 'name' },
                    { data: 'roles[0].name', name: 'role' },
                    // { data: 'role', name: 'role' },
                    { data: 'birthday', name: 'birthday' },
                    { data: 'email', name: 'email' },
                    { data: 'action', name: 'action' },
                ]
            });

        } );


    </script>

@endsection

@section('css')
    <link href="https://cdn.datatables.net/1.10.25/css/jquery.dataTables.min.css" rel="stylesheet">
@endsection

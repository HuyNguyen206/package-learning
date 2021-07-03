@extends('layouts.app')

@section('content')
{!! $dataTable->table([], true) !!}
@endsection

@section('js')
    <script src="https://cdn.datatables.net/1.10.25/js/jquery.dataTables.min.js"></script>

    {!! $dataTable->scripts() !!}
    <script>
        DataTable.ext.buttons.add = {
            className: 'buttons-add',

            text: function (dt) {
                return '<i class="fa fa-plus"></i> ' + dt.i18n('buttons.add', 'Create');
            },

            action: function (e, dt, button, config) {
                window.location = window.location.href.replace(/\/+$/, "") + '/create';
            }
        };
    </script>
@endsection

{{--@push('scripts')--}}
{{--    <script src="https://cdn.datatables.net/1.10.25/js/jquery.dataTables.min.js"></script>--}}
{{--    {!! $datatable->scripts() !!}--}}
{{--@endpush--}}


@section('css')
    <link href="https://cdn.datatables.net/1.10.25/css/jquery.dataTables.min.css" rel="stylesheet">
@endsection

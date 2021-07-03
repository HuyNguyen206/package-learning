@extends('layouts.app')

@section('content')
    {{$dataTable->table(['id' => 'category'])}}
@endsection

@section('js')


{{--    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>--}}
    <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.7/js/bootstrap.min.js"></script>
{{--    <script src="https://cdn.datatables.net/1.10.16/js/jquery.dataTables.min.js"></script>--}}
    <script src="https://cdn.datatables.net/buttons/1.5.0/js/dataTables.buttons.min.js"></script>
    <script src="https://cdn.datatables.net/select/1.2.4/js/dataTables.select.min.js"></script>
{{--    <script src="{{asset('plugins/editor/js/dataTables.editor.js')}}"></script>--}}

    <script src="https://cdn.datatables.net/1.10.16/js/dataTables.bootstrap.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/1.5.0/js/buttons.bootstrap.min.js"></script>
{{----}}
<script type="text/javascript" src="https://cdn.datatables.net/v/dt/jqc-1.12.4/dt-1.10.25/b-1.7.1/sl-1.3.3/datatables.min.js"></script>
<script type="text/javascript" src="{{asset('plugins/editor/js/dataTables.editor.js')}}"></script>
{{--    <script src="{{asset('plugins/editor/js/editor.bootstrap.min.js')}}"></script>--}}

{{--    <script type="text/javascript" src="https://cdn.datatables.net/v/dt/jqc-1.12.4/dt-1.10.25/b-1.7.1/sl-1.3.3/datatables.min.js"></script>--}}
    <script>
        $(function() {
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': '{{csrf_token()}}'
                }
            });

            var editor = new $.fn.dataTable.Editor({
                ajax: "/categories",
                table: "#category",
                display: "bootstrap",
                fields: [
                    {label: "Title:", name: "title"},
                    {label: "Description:", name: "description"},
                ]
            });

            $('#category').on('click', 'tbody td:not(:first-child)', function (e) {
                editor.inline(this);
            });

            {{$dataTable->generateScripts()}}
        })
    </script>
@endsection

{{--@push('scripts')--}}
{{--    <script src="https://cdn.datatables.net/1.10.25/js/jquery.dataTables.min.js"></script>--}}
{{--    {!! $datatable->scripts() !!}--}}
{{--@endpush--}}


@section('css')
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/dt/jqc-1.12.4/dt-1.10.25/b-1.7.1/sl-1.3.3/datatables.min.css"/>
    <link rel="stylesheet" type="text/css" href="{{asset('plugins/editor/css/editor.dataTables.css')}}">
@endsection

<!--@extends('wtadmin.layouts.default')-->
@extends(Config::get('syntara::views.master'))


{{-- Web site Title --}}
@section('title')
{{{ $title }}} :: @parent
@stop

{{-- Content --}}
@section('content')
<div class="container" id="main-container">
    <div class="page-header">
        <h3>
            {{{ $title }}}

            <div class="pull-right">
                <a href="{{{ URL::to('sadmin/users/create') }}}" class="btn btn-small btn-info iframe"><span class="glyphicon glyphicon-plus-sign"></span> Create</a>&nbsp;&nbsp;
                @if (Auth::user()->hasRole("admin"))
                <a href="{{{ URL::to('sadmin/users/import') }}}" class="btn btn-small btn-info iframe"><span class="glyphicon glyphicon-plus-sign"></span> Import</a>
                @endif
            </div>
        </h3>
    </div>
    <ol class="breadcrumb">
        <li> <a class="" target="_parent" href="{{{ URL::to('sadmin/') }}}">Home</a></li>
        <li> <a class="" target="_parent" href="{{{ URL::to('sadmin/users') }}}">User Management</a></li>

    </ol>
    <table id="users" class="table table-bordered  table-striped table-hover">
        <thead>
            <tr>
                <th class="col-md-2">{{{ Lang::get('wtadmin/users/table.username') }}}</th>
                <th class="col-md-2">{{{ Lang::get('wtadmin/users/table.email') }}}</th>
                <th class="col-md-1">{{{ Lang::get('wtadmin/users/table.activated') }}}</th>
                <th class="col-md-2">{{{ Lang::get('wtadmin/users/table.created_at') }}}</th>
                <th class="col-md-2">{{{ Lang::get('table.actions') }}}</th>
            </tr>
        </thead>
        <tbody>
        </tbody>
    </table>
</div>
@stop

{{-- Scripts --}}
@section('scripts')
<script type="text/javascript">
    var oTable;
    $(document).ready(function() {
        oTable = $('#users').dataTable({
            "sDom": "<'row'<'col-md-6'l><'col-md-6'f>r>t<'row'<'col-md-6'i><'col-md-6'p>>",
            "sPaginationType": "bootstrap",
            "oLanguage": {
                "sLengthMenu": "_MENU_ records per page"
            },
            "bProcessing": true,
            "sAjaxSource": "{{ URL::to('sadmin/users/data') }}",
            "fnDrawCallback": function(oSettings) {
                $(".iframe").colorbox({iframe: true, width: "80%", height: "80%"});
            }
        });
    });
</script>
@stop
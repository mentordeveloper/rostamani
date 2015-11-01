@extends('wtadmin.layouts.default')

{{-- Web site Title --}}
@section('title')
{{{ $title }}} :: @parent
@stop

{{-- Content --}}
@section('content')
<div class="page-header">
    <h3>
        {{{ Lang::get('wtadmin/info/title.info_management') }}}
        @if(!$flag)
        <div class="pull-right">
            <a href="{{{ URL::to('sadmin/info/create') }}}" class="btn btn-small btn-info iframe"><span class="glyphicon glyphicon-plus-sign"></span> Create</a>
        </div>
        @endif
    </h3>
</div>
<ol class="breadcrumb">
    <li> <a class="" target="_parent" href="{{{ URL::to('sadmin/') }}}">Home</a></li>
    <li> <a class="last" target="_parent" href="{{{ URL::to('sadmin/info/') }}}">Store Payment Information</a></li>

</ol>
<table id="info" class="table table-bordered table-striped table-hover">
    <thead>
        <tr>
            <th class="col-md-2">{{{ Lang::get('wtadmin/info/table.api_username') }}}</th>
            <th class="col-md-2">{{{ Lang::get('wtadmin/info/table.api_secret') }}}</th>
            <th class="col-md-2">{{{ Lang::get('wtadmin/info/table.tax_rate') }}}</th>
            <th class="col-md-2">{{{ Lang::get('wtadmin/info/table.is_sandbox') }}}</th>
            <th class="col-md-2">{{{ Lang::get('wtadmin/info/table.created_at') }}}</th>
            <th class="col-md-2">{{{ Lang::get('table.actions') }}}</th>
        </tr>
    </thead>
    <tbody>
    </tbody>
</table>
@stop

{{-- Scripts --}}
@section('scripts')
<script type="text/javascript">
    var oTable;
    $(document).ready(function() {
        oTable = $('#info').dataTable({
            "sDom": "<'row'<'col-md-6'l><'col-md-6'f>r>t<'row'<'col-md-6'i><'col-md-6'p>>",
            "sPaginationType": "bootstrap",
            "oLanguage": {
                "sLengthMenu": "_MENU_ records per page"
            },
            "bProcessing": true,
            "sAjaxSource": "{{ URL::to('sadmin/info/data') }}",
            "fnDrawCallback": function(oSettings) {
                $(".iframe").colorbox({iframe: true, width: "80%", height: "80%"});
            }
        });
    });
</script>
@stop
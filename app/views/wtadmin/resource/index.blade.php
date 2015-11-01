@extends('wtadmin.layouts.new_theme_default')

{{-- Web site Title --}}
@section('title')
{{{ $title }}} :: @parent
@stop

{{-- Content --}}
@section('content')
<div class="page-bar">
    <ul class="page-breadcrumb">
        <li>
            <i class="fa fa-home"></i>
            <a href="{{{ URL::to('wtadmin/') }}}">Home</a>
            <i class="fa fa-angle-right"></i>
        </li>
        <li>
            <a href="#"> Resource Management</a>
        </li>
    </ul>

</div>              
<div class="portlet box grey-cascade">
    <div class="portlet-title">
        <div class="caption">
            <i class="fa fa-globe"></i>Resource Management
        </div>
    </div>
    <div class="portlet-body">
        <div class="table-toolbar">
            <div class="row">
                <div class="col-md-6">
                    <div class="btn-group">
                        <a href="{{{ URL::to('wtadmin/resources/create') }}}" class=""><button id="sample_editable_1_new" class="btn btn-sm green">
                                Upload <i class="fa fa-plus"></i>
                            </button>
                        </a>
                    </div>
                </div>

            </div>
        </div>
        <table id="resources" class="table table-bordered table-striped table-hover">
            <thead>
                <tr>
                    <th class="col-md-2">{{{ Lang::get('wtadmin/resources/table.FullName') }}}</th>
                    <th class="col-md-2">{{{ Lang::get('wtadmin/resources/table.created_at') }}}</th>
                    <!--<th class="col-md-2">{{{ Lang::get('wtadmin/resources/table.file') }}}</th>-->
                    <th class="col-md-2">{{{ Lang::get('table.actions') }}}</th>
                </tr>
            </thead>
            <tbody>
            </tbody>
        </table>
    </div>
</div>
@stop

{{-- Scripts --}}
@section('scripts')
<script type="text/javascript">
    var oTable;
    $(document).ready(function() {
        oTable = $('#resources').dataTable({
            //    "sDom": "<'row'<'col-md-6'l><'col-md-6'f>r>t<'row'<'col-md-6'i><'col-md-6'p>>",
            "sDom": "<'row'<'col-md-5 col-sm-12 span6'l><'col-md-7 col-sm-12 span6'f>r>t<'row'<'col-md-5 col-sm-12 span6'i><'col-md-7 col-sm-12 span6'p>>",
            "sPaginationType": "bootstrap",
            "oLanguage": {
                "sLengthMenu": "_MENU_ records per page"
            },
            "bProcessing": true,
            "bServerSide": true,
            "sAjaxSource": "{{ URL::to('wtadmin/resources/data') }}",
            "fnDrawCallback": function(oSettings) {
                $(".iframe").colorbox({iframe: true, width: "80%", height: "80%"});
                $(".iframe_del").colorbox({iframe: true, width: "90%", height: "55%"});
            }
        });
    });
</script>
@stop
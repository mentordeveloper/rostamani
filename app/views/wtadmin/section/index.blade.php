@extends(Config::get('syntara::views.master'))

{{-- Web site Title --}}
@section('title')
{{{ $title }}} :: @parent
@stop

{{-- Content --}}
@section('content')
<div class="container" id="main-container">
    <div class="row">
        <div class="col-lg-12">
            <section class="module">
                <div class="module-head">
                    <b>Section Management</b>
                </div>
                <div class="module-body ajax-content">

                    <span id="ajax_content">
                        <div class="row upper-menu">

                            <div style="float:right;">
                                <div class="actions" style="float: right;">
                                    <div class="btn-group btn-group-devided">
                                        <a class="btn btn-sm btn-default btn-small btn-inverse" href="{{{ URL::to('sadmin/section/')}}}" >Back</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <table id="section" class="table table-bordered table-striped table-hover">
                            <thead>
                                <tr>
                                    
                                    <th class="col-md-2">{{{ Lang::get('wtadmin/section/table.SectionName') }}}</th>
                                    <th class="col-md-2">{{{ Lang::get('wtadmin/section/table.sequence') }}}</th>
                                    <th class="col-md-2">{{{ Lang::get('wtadmin/section/table.status') }}}</th>
                                    <th class="col-md-2">{{{ Lang::get('wtadmin/section/table.created_at') }}}</th>
                                    <th class="col-md-2">{{{ Lang::get('wtadmin/section/table.content') }}}</th>
                                    <!--<th class="col-md-2">{{{ Lang::get('table.actions') }}}</th>-->
                                </tr>
                            </thead>
                            <tbody>
                            </tbody>
                        </table>
                    </span>
                </div>
            </section>
        </div>

    </div>
</div>

@stop

{{-- Scripts --}}
@section('scripts')
<script type="text/javascript">
    var oTable;
    $(document).ready(function () {
        oTable = $('#section').dataTable({
            "sDom": "<'row'<'col-md-6'l><'col-md-6'f>r>t<'row'<'col-md-6'i><'col-md-6'p>>",
            "sPaginationType": "bootstrap",
            "oLanguage": {
                "sLengthMenu": "_MENU_ records per page"
            },
            "bProcessing": true,
            "bServerSide": true,
            "sAjaxSource": "{{ URL::to('sadmin/section/data') }}",
            "fnDrawCallback": function (oSettings) {
                $(".iframe").colorbox({iframe: true, width: "80%", height: "80%"});
            }
        });
    });
</script>
@stop
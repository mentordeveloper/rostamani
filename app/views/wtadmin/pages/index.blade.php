@extends(Config::get('syntara::views.master'))

{{-- Web site Title --}}
@section('title')
{{{ $title }}} :: @parent
@stop

{{-- Content --}}
@section('content')
<!-- BEGIN PAGE BREADCRUMB -->


<!-- BEGIN EXAMPLE TABLE PORTLET-->


<div class="container" id="main-container">
    <div class="row">
        <div class="col-lg-12">
            <section class="module">
                <div class="module-head">
                    <b>Pages Management</b>
                </div>
                <div class="module-body ajax-content">

                    <span id="ajax_content">
                        <div class="row upper-menu">

                            <div style="float:right;">
                                <div class="btn-group">
                                    <a href="{{{ URL::to('sadmin/pages/create/'.$section_id) }}}" class="iframe">
                                        <button id="sample_editable_1_new" class="btn btn-sm btn-green btn-success">
                                            Create <i class="fa fa-plus"></i>
                                        </button>
                                    </a>
                                </div>
                                <div class="actions" style="float: right;margin-left: 5px;">
                                    <div class="btn-group btn-group-devided">
                                        <a class="btn btn-sm btn-default btn-small btn-inverse" href="{{{ URL::to('sadmin/section/')}}}" >Back</a>
                                    </div>
                                </div>
                            </div>

                        </div>
                        <table id="pages" class="table table-bordered table-striped table-hover">
                            <thead>
                                <tr>
                                    <!--<th class="col-md-1">{{{ Lang::get('wtadmin/pages/table.id') }}}</th>-->
                                    <th class="col-md-2">{{{ Lang::get('wtadmin/pages/table.title') }}}</th>
                                  <!--<th class="col-md-2">{{{ Lang::get('wtadmin/pages/table.slug') }}}</th>-->
                                    <th class="col-md-1">{{{ Lang::get('wtadmin/pages/table.type') }}}</th>
                                    <th class="col-md-1">{{{ Lang::get('wtadmin/pages/table.seq') }}}</th>

                                    <th class="col-md-1">{{{ Lang::get('wtadmin/pages/table.created_at') }}}</th>
                                    <!--<th class="col-md-2">{{{ Lang::get('table.assign') }}}</th>-->
                                    <th class="col-md-2">{{{ Lang::get('table.actions') }}}</th>
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
        oTable = $('#pages').dataTable({
            //     "sDom": "<'row'<'col-md-6'l><'col-md-6'f>r>t<'row'<'col-md-6'i><'col-md-6'p>>",
            "sDom": "<'row'<'col-md-5 col-sm-12 span6'l><'col-md-7 col-sm-12 span6'f>r>t<'row'<'col-md-5 col-sm-12 span6'i><'col-md-7 col-sm-12 span6'p>>",
            "sPaginationType": "bootstrap",
            "oLanguage": {
                "sLengthMenu": "_MENU_ records per page"
            },
            "bProcessing": true,
            "bServerSide": true,
            "sAjaxSource": "{{ URL::to('sadmin/pages/data') }}",
            "fnServerParams": function (aoData) {
                aoData.push({"name": "section", "value": "{{$section->id}}"});
            },
            "fnDrawCallback": function (oSettings) {
                $(".iframe").colorbox({iframe: true, width: "90%", height: "95%"});
                $(".iframe_del").colorbox({iframe: true, width: "90%", height: "55%"});
                $(".iframe_dup").colorbox({iframe: true, width: "90%", height: "55%"});
            }
        });
    });
</script>
<script>
    function editSeq(section_id, gal_id)
    {
        var seq = prompt("Enter New Sequence");
        if (seq != null && seq != "")
        {
            location.href = "/sadmin/pages/updateSeq/" + section_id + "/"+ gal_id + "/" + seq + "/<?php echo time(); ?>";
            return true;
        }
        return false;
    }

</script>
@stop
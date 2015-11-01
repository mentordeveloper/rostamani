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
            <a href="#">File Listing</a>
        </li>
    </ul>

</div>               
<div class="portlet box grey-cascade">
    <div class="portlet-title">
        <div class="caption">
            <i class="fa fa-globe"></i>Files Management
        </div>
    </div>
    <div class="portlet-body">
        <div class="table-toolbar">
            <div class="row">
                <div class="col-md-6">
                    <div class="btn-group">
<!--                        <a href="{{{ URL::to('wtadmin/terms/create') }}}" class=""><button id="sample_editable_1_new" class="btn green" data-toggle="modal">
                                Create <i class="fa fa-plus"></i>
                            </button>
                        </a>-->
                    </div>
                </div>

            </div>
        </div>
        <table id="pages" class="table table-bordered table-striped table-hover">
            <thead>
                <tr>
                    <th class="col-md-1">Content Title</th>
                    <th class="col-md-1">File Name</th>
                    <th class="col-md-1">File Type</th>
        <!--            <th class="col-md-1">File Size</th>-->
                    <th class="col-md-1">Creation Date</th>
                    <th class="col-md-1">Action</th>
                </tr>
            </thead>
            <tbody>

                @foreach($pages as $k => $val)
                <?php
                $size = @sizeFormat(@filesize(ltrim($val['path'], '/')));
                $size = (int) $size;
//               if($size>0){
                if (!empty($val['imv_id'])) {
                    ?>
                    <tr>
                        <td class="col-md-1">{{{$val['title']}}}</td>
                        <td class="col-md-1">{{{$val['file_name']}}}</td>
                        <td class="col-md-1">{{{$val['type']}}}</td>
            <!--            <td class="col-md-1"><?php echo @sizeFormat(@filesize(ltrim($val['path'], '/'))); ?></td>-->

                        <td class="col-md-1">{{{$val['created_at']}}}</td>
                        <td class="col-md-2 col-lg-2 col-xs-2">
                            <div style='width:210px !important'>
                                <a href="{{{ URL::to('/file/view/'.$val['imv_id']) }}}"  title="View" alt="View" class="iframe_file btn green" data-toggle="modal"><i class="fa fa-search"></i></a>
                                <a href="{{{ URL::to('wtadmin/pages/share_file/'.$val['imv_id']) }}}"  title="share" alt="share" class="iframe_file btn default" data-toggle="modal"><i class="fa fa-share"></i></a>
                                <a href="/download/<?= $val['imv_id'] ?>"  title="Download" alt="Download" class="btn default" data-toggle="modal"><i class="fa fa-download"></i></a>
                            </div>
                        </td>
                    </tr>

                <?php } ?>
                @endforeach

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
        $('#pages').dataTable({
            "sPaginationType": "bootstrap",
            "sDom": "<'row'<'col-md-5 col-sm-12 span6'l><'col-md-7 col-sm-12 span6'f>r>t<'row'<'col-md-5 col-sm-12 span6'i><'col-md-7 col-sm-12 span6'p>>",
            "lengthMenu": [
                [10, 30, 50, -1],
                [10, 30, 50, "All"] // change per page values here
            ],
            "oLanguage": {
                "sLengthMenu": "_MENU_ records per page"
            },
            "bProcessing": true,
            "fnDrawCallback": function(oSettings) {
                $(".iframe").colorbox({iframe: true, width: "90%", height: "95%"});
            }
        });
        $(".iframe").colorbox({iframe: true, width: "80%", height: "95%"});
    });
    function ref_page() {
        window.location = '/wtadmin';
    }
</script>
@stop
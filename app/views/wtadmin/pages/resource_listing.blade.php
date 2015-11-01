@extends('wtadmin.layouts.new_default')

{{-- Web site Title --}}
@section('title')
{{{ $title }}} :: @parent
@stop
<ol class="breadcrumb">
    <li> <a class="" target="_parent" href="{{{ URL::to('wtadmin/') }}}">Home</a></li>
    <li> <a class="last" target="_parent" href="{{{ URL::to('wtadmin/resource') }}}">Resource Listing</a></li>
</ol>
{{-- Content --}}
@section('content')

<div class="page-header">
    <h3>{{{ $con_title }}}
    <div class="pull-right ">
        
    </div>
    </h3>
</div>


<table id="pages" class="table table-bordered table-striped table-hover">
    <thead>
        <tr>
            <th class="col-md-1">Content Title</th>
            <th class="col-md-1">File Name</th>
            <th class="col-md-1">File Type</th>
            <!--<th class="col-md-1">File Size</th>-->
            <th class="col-md-1">Creation Date</th>
            <th class="col-md-1">Action</th>
        </tr>
    </thead>
    <tbody>

        @foreach($pages as $k => $val)
        <?php
        
        $size = @sizeFormat(@filesize(ltrim($val['path'], '/'))); 
               $size = (int)$size;
//               if($size>0){
               if(!empty($val['imv_id'])){
        ?>
        <tr>
            <td class="col-md-1">{{{$val['title']}}}</td>
            <td class="col-md-1">{{{$val['file_name']}}}</td>
            <td class="col-md-1">{{{$val['type']}}}</td>
            <!--<td class="col-md-1"><?php //  echo @sizeFormat(@filesize(ltrim($val['path'], '/'))); ?></td>-->
            
            <td class="col-md-1">{{{$val['created_at']}}}</td>
            <td class="col-md-2">
                <a href="{{{ URL::to('/file/view/'.$val['imv_id']) }}}"class="iframe_file btn btn-xs btn-sm btn-default">View</a>
                <a href="{{{ URL::to('wtadmin/pages/share_file/'.$val['imv_id']) }}}"class="iframe_file btn btn-xs btn-sm green">Share</a>
                <a href="/download/<?= $val['imv_id'] ?>" class="btn btn-xs btn-sm blue">Download</a>
            </td>
        </tr>
            <?php }?>
        @endforeach

    </tbody>
</table>
@stop

{{-- Scripts --}}
@section('scripts')
<script type="text/javascript">
  var oTable;
  $(document).ready(function() {
        $('#pages').dataTable();
        $(".iframe").colorbox({iframe: true, width: "80%", height: "95%"});
    });
    function ref_page(){
        window.location = '/wtadmin';
    }
</script>
@stop
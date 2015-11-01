@extends('wtadmin.layouts.default')

{{-- Web site Title --}}
@section('title')
	{{{ $title }}} :: @parent
@stop

{{-- Content --}}
@section('content')

<div class="page-header">
		<h3>
              {{$con_title}} Sub Category Management

			<div class="pull-right">
                 <a href="{{{ URL::to('sadmin/sub_categories/'.$category_id.'/create') }}}" class="btn btn-small btn-info iframe"><span class="glyphicon glyphicon-plus-sign"></span> Create</a>
               </div>
		</h3>
	</div>
<ol class="breadcrumb">
    <li> <a class="" target="_parent" href="{{{ URL::to('sadmin/') }}}">Home</a></li>
    <li> <a class="last" target="_parent" href="{{{ URL::to('sadmin/categories/') }}}">Category Management</a></li>
    <li> <a class="last" target="_parent" href="{{{ URL::to('sadmin/sub_categories/'.$category_id) }}}">{{$con_title}} Sub Categories </a></li>

</ol>
<table id="categories" class="table table-bordered table-striped table-hover">
  <thead>
			<tr>
                 <th class="col-md-2">{{{ Lang::get('wtadmin/categories/table.FullName') }}}</th>
                 <th class="col-md-2">{{{ Lang::get('wtadmin/categories/table.created_at') }}}</th>
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
                        oTable = $('#categories').dataTable( {
                        "sDom": "<'row'<'col-md-6'l><'col-md-6'f>r>t<'row'<'col-md-6'i><'col-md-6'p>>",
                        "sPaginationType": "bootstrap",
                        "oLanguage": {
                                "sLengthMenu": "_MENU_ records per page"
                        },
                        "bProcessing": true,
//		        "bServerSide": true,
		        "sAjaxSource": "{{ URL::to('sadmin/sub_categories/SubData/'.$category_id) }}",
		        "fnDrawCallback": function ( oSettings ) {
	           		$(".iframe").colorbox({iframe:true, width:"80%", height:"80%"});
             		}
			});
		});
	</script>
@stop
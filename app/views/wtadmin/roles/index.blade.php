@extends('wtadmin.layouts.default')

{{-- Web site Title --}}
@section('title')
	{{{ $title }}} :: @parent
@stop

{{-- Content --}}
@section('content')
	<div class="page-header">
		<h3>
			Role Management

			<div class="pull-right">
                 <a href="{{{ URL::to('wtadmin/roles/create') }}}" class="btn btn-small btn-info iframe"><span class="glyphicon glyphicon-plus-sign"></span> Create</a>
               </div>
		</h3>
	</div>
<ol class="breadcrumb">
    <li> <a class="" target="_parent" href="{{{ URL::to('wtadmin/') }}}">Home</a></li>
    <li> <a class="last" target="_parent" href="{{{ URL::to('wtadmin/roles/') }}}">Role Management</a></li>

</ol>
<table id="roles" class="table table-striped table-hover">
		<thead>
			<tr>
                 <th class="col-md-6">{{{ Lang::get('wtadmin/roles/table.name') }}}</th>
                 <th class="col-md-2">{{{ Lang::get('wtadmin/roles/table.users') }}}</th>
                 <th class="col-md-2">{{{ Lang::get('wtadmin/roles/table.created_at') }}}</th>
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
				oTable = $('#roles').dataTable( {
				"sDom": "<'row'<'col-md-6'l><'col-md-6'f>r>t<'row'<'col-md-6'i><'col-md-6'p>>",
				"sPaginationType": "bootstrap",
				"oLanguage": {
					"sLengthMenu": "_MENU_ records per page"
				},
				"bProcessing": true,
		        "bServerSide": true,
		        "sAjaxSource": "{{ URL::to('wtadmin/roles/data') }}",
		        "fnDrawCallback": function ( oSettings ) {
	           		$(".iframe").colorbox({iframe:true, width:"80%", height:"80%"});
	     		}
			});
		});
	</script>
@stop
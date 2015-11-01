@extends('wtadmin.layouts.default')

{{-- Web site Title --}}
@section('title')
	{{{ $title }}} :: @parent
@stop

{{-- Content --}}
@section('content')
	<div class="page-header">
		<h3>
              {{{ Lang::get('wtadmin/terms/title.term_management') }}}

			<div class="pull-right">
                   <a href="{{{ URL::to('sadmin/store-terms/create') }}}" class="btn btn-small btn-info iframe"><span class="glyphicon glyphicon-plus-sign"></span> Create</a>
               </div>
		</h3>
	</div>
<ol class="breadcrumb">
    <li> <a class="" target="_parent" href="{{{ URL::to('sadmin/') }}}">Home</a></li>
    <li> <a class="last" target="_parent" href="{{{ URL::to('sadmin/store-terms/') }}}">Store Times Management</a></li>

</ol>
<div class="alert alert-warning">
    <span class="alert-heading"><strong>Reminder:</strong> </span> BoozRun's policy states that operations for delivery must end AT LEAST one hour before the store is legally required to stop selling alcohol.
</div>
<br />
<table id="terms" class="table table-bordered table-striped table-hover">
    <thead>
			<tr>
                   <th class="col-md-2">{{{ Lang::get('wtadmin/terms/table.FullName') }}}</th>
                   <!--<th class="col-md-2">{{{ Lang::get('wtadmin/terms/table.name') }}}</th>-->
                   <th class="col-md-2">{{{ Lang::get('wtadmin/terms/table.start_date') }}}</th>
                   <th class="col-md-2">{{{ Lang::get('wtadmin/terms/table.end_date') }}}</th>
                   <th class="col-md-2">{{{ Lang::get('wtadmin/terms/table.created_at') }}}</th>
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
				oTable = $('#terms').dataTable( {
				"sDom": "<'row'<'col-md-6'l><'col-md-6'f>r>t<'row'<'col-md-6'i><'col-md-6'p>>",
				"sPaginationType": "bootstrap",
				"oLanguage": {
					"sLengthMenu": "_MENU_ records per page"
				},
				"bProcessing": true,
//		        "bServerSide": true,
		        "sAjaxSource": "{{ URL::to('sadmin/store-terms/data') }}",
		        "fnDrawCallback": function ( oSettings ) {
	           		$(".iframe").colorbox({iframe:true, width:"80%", height:"80%"});
	     		}
			});
		});
	</script>
@stop
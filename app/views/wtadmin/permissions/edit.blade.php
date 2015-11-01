@extends('wtadmin.layouts.modal')

{{-- Content --}}
@section('content')
<!-- Tabs -->
<ol class="breadcrumb">
    <li> <a class="" target="_parent" href="{{{ URL::to('wtadmin/') }}}">Home</a></li>
    <li> <a class="last" target="_parent" href="{{{ URL::to('wtadmin/permissions/') }}}">Permission Management</a></li>
    <li> {{{$title}}}</li>

</ol>
<ul class="nav nav-tabs">
			<li class="active"><a href="#tab-general" data-toggle="tab">General</a></li>
		</ul>
	<!-- ./ tabs -->

     {{-- Edit Permission Form --}}
     <form class="form-horizontal" method="post" action="" autocomplete="off">
		<!-- CSRF Token -->
		<input type="hidden" name="_token" value="{{{ csrf_token() }}}" />
		<!-- ./ csrf token -->

		<!-- Tabs Content -->
		<div class="tab-content">
			<!-- General tab -->
			<div class="tab-pane active" id="tab-general">
				<!-- Name -->
				<div class="form-group {{{ $errors->has('name') ? 'error' : '' }}}">
					<label class="col-md-2 control-label" for="name">Name</label>
					<div class="col-md-10">
                           <input class="form-control" type="text" name="name" id="name" value="{{{ Input::old('display_name', $permission->display_name) }}}" />
                           {{ $errors->first('name', '<span class="help-inline">:message</span>') }}
					</div>
				</div>
				<!-- ./ name -->
			</div>
			<!-- ./ general tab -->

		</div>
		<!-- ./ tabs content -->

		<!-- Form Actions -->
		<div class="form-group">
			<div class="col-md-offset-2 col-md-10">
				<element class="btn btn-danger btn-cancel close_popup">Cancel</element>
				<button type="reset" class="btn btn-default">Reset</button>
                    <button type="submit" class="btn btn-success">Update Permission</button>
               </div>
		</div>
		<!-- ./ form actions -->
	</form>
@stop

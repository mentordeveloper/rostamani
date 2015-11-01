@extends('wtadmin.layouts.modal')

{{-- Content --}}
@section('content')

<ol class="breadcrumb">
    <li> <a class="" target="_parent" href="{{{ URL::to('sadmin/') }}}">Home</a></li>
    <li> <a class="" target="_parent" href="{{{ URL::to('sadmin/categories/') }}}">Category Management</a></li>
    <li class="last"> {{{ $title }}}</li>
</ol>
<!-- Tabs -->
<ul class="nav nav-tabs">
    <li class="active"><a href="#tab-general" data-toggle="tab">General</a></li>
</ul>
<!-- ./ tabs -->

{{-- Create Category Form --}}
<form class="form-horizontal" enctype="multipart/form-data"  method="post" action="" autocomplete="off">
    <!-- CSRF Token -->
    <input type="hidden" name="_token" value="{{{ csrf_token() }}}" />
    <!-- ./ csrf token -->

    <!-- Tabs Content -->
    <div class="tab-content">
        <!-- Tab General -->
        <div class="tab-pane active" id="tab-general">
            
            <!-- Name -->
            <div class="form-group {{{ $errors->has('name') ? 'error' : '' }}}">
                <label class="col-md-2 control-label" for="name">Name</label>
                <div class="col-md-10">
                    <input class="form-control" type="text" name="name" id="name" value="{{{ Input::old('name') }}}" />
                    {{ $errors->first('name', '<span class="help-inline">:message</span>') }}
                </div>
            </div>
            <!-- ./ name -->
            <!-- Status -->
            <div class="form-group {{{ $errors->has('is_active') ? 'error' : '' }}}">
                <label class="col-md-2 control-label" for="is_active">Is Active</label>
                <div class="col-md-10">
                    <select class="form-control"  name="is_active" id="is_active">
                        <option value="1" selected="">Active</option>
                        <option value="2">In-Active</option>
                    </select>
<!--<input class="form-control" type="text" name="gr_name" id="gr_name" value="{{{ Input::old('gr_name') }}}" />-->
                    {{ $errors->first('is_active', '<span class="help-inline">:message</span>') }}
                </div>
            </div>
            <!-- ./ Status -->
            <div class="form-group">
                <label class="col-md-2 control-label" for="is_active">Image</label>
                <div class="col-md-10">
                    <input type="file" name="upload_cat_image" class="file-control" />       
                </div>
            </div>
        </div>
        <!-- ./ tab general -->


    </div>
    <!-- ./ tabs content -->

    <!-- Form Actions -->
    <div class="form-group">
        <div class="col-md-offset-2 col-md-10">
            <element class="btn btn-danger btn-cancel close_popup">Cancel</element>
            <button type="reset" class="btn btn-default">Reset</button>
            <button type="submit" class="btn btn-success">Create Category</button>
        </div>
    </div>
    <!-- ./ form actions -->
</form>
@stop

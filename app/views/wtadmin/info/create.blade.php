@extends('wtadmin.layouts.modal')

{{-- Content --}}
@section('content')
<ol class="breadcrumb">
    <li> <a class="" target="_parent" href="{{{ URL::to('sadmin/') }}}">Home</a></li>
    <li> <a class="last" target="_parent" href="{{{ URL::to('sadmin/info/') }}}">Store Payment Information</a></li>
    <li> {{{$title}}}</li>

</ol>
<!-- Tabs -->
<ul class="nav nav-tabs">
    <li class="active"><a href="#tab-general" data-toggle="tab">General</a></li>
</ul>
<!-- ./ tabs -->

{{-- Create Term Form --}}
<form class="form-horizontal" method="post" action="" autocomplete="off">
    <!-- CSRF Token -->
    <input type="hidden" name="_token" value="{{{ csrf_token() }}}" />
    <!-- ./ csrf token -->

    <!-- Tabs Content -->
    <div class="tab-content">
        <!-- Tab General -->
        <div class="tab-pane active" id="tab-general">
            <!-- api_username -->
            <div class="form-group {{{ $errors->has('api_username') ? 'error' : '' }}}">
                <label class="col-md-2 control-label" for="api_username">Client Id</label>
                <div class="col-md-10">
                    <input class="form-control" type="text" name="api_username" id="api_username" value="{{{ Input::old('api_username') }}}" />
                    {{ $errors->first('api_username', '<span class="help-inline">:message</span>') }}
                </div>
            </div>
            <!-- ./ api_username -->
            <!-- api_secret  -->
            <div class="form-group {{{ $errors->has('api_secret') ? 'error' : '' }}}">
                <label class="col-md-2 control-label" for="api_secret">Client Secret</label>
                <div class="col-md-10">
                    <input class="form-control" type="text" name="api_secret" id="api_secret" value="{{{ Input::old('api_secret') }}}" />
                    {{ $errors->first('api_secret', '<span class="help-inline">:message</span>') }}
                </div>
            </div>
            <!-- ./ api_secret -->
            <!-- tax_rate  -->
            <div style="display: none;" class="form-group {{{ $errors->has('tax_rate') ? 'error' : '' }}}">
                <label class="col-md-2 control-label" for="tax_rate">Tax Rate</label>
                <div class="col-md-10">
                    <input class="form-control" type="text" name="tax_rate" id="tax_rate" value="{{{ Input::old('tax_rate') }}}" />
                    {{ $errors->first('tax_rate', '<span class="help-inline">:message</span>') }}
                </div>
            </div>
            <!-- ./ tax_rate -->

            <!-- Status -->
            <div class="form-group {{{ $errors->has('is_sandbox') ? 'error' : '' }}}">
                <label class="col-md-2 control-label" for="is_sandbox">Environment</label>
                <div class="col-md-10">
                    <select class="form-control"  name="is_sandbox" id="is_sandbox">
                        <option value="1" selected="">Sandbox</option>
                        <option value="2">Production</option>
                    </select>
                    {{ $errors->first('is_sandbox', '<span class="help-inline">:message</span>') }}
                </div>
            </div>
            <!-- ./ Status -->
        </div>
        <!-- ./ tab general -->


    </div>
    <!-- ./ tabs content -->

    <!-- Form Actions -->
    <div class="form-group">
        <div class="col-md-offset-2 col-md-10">
            <element class="btn btn-danger btn-cancel close_popup">Cancel</element>
            <button type="reset" class="btn btn-default">Reset</button>
            <button type="submit" class="btn btn-success">Add Info</button>
        </div>
    </div>
    <!-- ./ form actions -->
</form>
@stop

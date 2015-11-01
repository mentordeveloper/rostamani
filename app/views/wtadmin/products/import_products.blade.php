@extends('wtadmin.layouts.modal')

{{-- Content --}}
@section('content')
<ol class="breadcrumb">
    <li> <a class="" target="_parent" href="{{{ URL::to('sadmin/') }}}">Home</a></li>
    <li> <a class="" target="_parent" href="{{{ URL::to('sadmin/products') }}}">Products Management</a></li>
    <li class="last">Import Products</li>
</ol>
<!-- Tabs -->
<ul class="nav nav-tabs">
    <li class="active"><a href="#tab-general" data-toggle="tab">General</a></li>
    <li class=""><a href="#tab-demo" data-toggle="tab">Demo Pattern</a></li>
</ul>
<!-- ./ tabs -->
<!-- Tabs Content -->
<div class="tab-content">


    <!-- General tab -->
    <div class="tab-pane active" id="tab-general">
        {{-- Create Products Form --}}
        <form name="import_user_frm" id="import_user_frm" class="form-horizontal" method="post" action="@if (isset($user)){{ URL::to('wtadmin/products/import') }}@endif" autocomplete="off">
            <!-- CSRF Token -->
            <input type="hidden" name="_token" value="{{{ csrf_token() }}}" />
            <!-- ./ csrf token -->

            <?php
            $timestamp = time();
            $hash = md5('unique_salt' . $timestamp);
            $csrf_token = csrf_token();
            $sch_id = '';
            ?>
            <input type="hidden" name="timestamp" id="timestamp" value="<?php echo $timestamp; ?>" />
            <input type="hidden" name="hash" id="hash" value="<?php echo $hash; ?>" />
            <input type="hidden" name="user_id" id="user_id" value="<?php echo Sentry::getUser()->id; ?>" />
            <input type="hidden" name="path" id="path" value="<?php echo '/' . Sentry::getUser()->id; ?>" />
            <input type="hidden" name="s_id" id="s_id" value="<?php echo '1'; ?>" />

            <!-- Upload Users csv/xlxs -->
            <div class="form-group {{{ $errors->has('file_name') ? 'error' : '' }}}">
                <label class="col-md-2 control-label" for="upload_path">Products Import</label>
                <div class="col-md-10">
                    <input type="hidden" name="file_name" id="file_name" value="" />
                    <input type="hidden" name="i_id" id="i_id" value="" />
                    <span id="user_uploader_div">
                        <div id="usermulitplefileuploader">Upload</div>
                    </span>

                    <input class="form-control" type="hidden" name="upload_path" id="upload_path" value="{{{ Input::old('upload_path') }}}" />
                    {{ $errors->first('file_name', '<span class="help-inline">:message</span>') }}
                </div>
            </div>
            <div class="form-group {{{ $errors->has('upload_path') ? 'error' : '' }}}">
                <div class="col-md-10">
                    <span id="user_te"></span>
                </div>
            </div>
            <!-- /------Upload Users csv/xlxs -->
            <!-- Form Actions -->
            <div class="form-group">
                <div class="col-md-offset-2 col-md-10">
                    <button type="reset" class="btn btn-default">Reset</button>
                    <button type="button" id="upload_btn" class="btn btn-success">Upload</button>
                </div>
            </div>
            <!-- ./ form actions -->
        </form>
    </div>
    <!-- ./ general tab -->

    <div class="tab-pane" id="tab-demo">


        <div class="form-group {{{ $errors->has('upload_path') ? 'error' : '' }}}">
            <label class="col-md-2 control-label" for="upload_path">Download Import Pattern</label>
            <div class="col-md-10">
                <a href="/products_import.csv">Import Pattern</a>
            </div>
        </div>



    </div>
</div>
<!-- ./ tabs content -->


@stop

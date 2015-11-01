@extends('wtadmin.layouts.new_theme_default')

{{-- Content --}}
@section('content')

<?php
$timestamp = time();
$hash = md5('unique_salt' . $timestamp);
$csrf_token = csrf_token();
//$sch_id = Auth::user()->s_id;
$sch_id = '';
?>
<input type="hidden" name="timestamp" id="timestamp" value="<?php echo $timestamp; ?>" />
<input type="hidden" name="hash" id="hash" value="<?php echo $hash; ?>" />
<input type="hidden" name="path" id="path" value="<?php echo '/' . Auth::user()->id; ?>" />
<input type="hidden" name="s_id" id="s_id" value="<?php echo Auth::user()->s_id; ?>" />
<input type="hidden" name="_token" id="_token" value="{{{ $csrf_token }}}" />

<?php
$allow_limit = 524288000;
$video_limit = 10485760;
$image_limit = 10485760;
$audio_limit = 10485760;
$doc_limit = 10485760;
if (isset($domain_size[0])) {
    $allow_limit = $domain_size[0]['allow_limit'];
    $video_limit = $domain_size[0]['video_limit'];
    $image_limit = $domain_size[0]['image_limit'];
    $audio_limit = $domain_size[0]['audio_limit'];
    $doc_limit = $domain_size[0]['doc_limit'];
}
?>
<input type="hidden" name="allow_size" id="allow_size" value="<?php echo $allow_limit; ?>" />
<input type="hidden" name="video_size" id="video_size" value="<?php echo $video_limit; ?>" />
<input type="hidden" name="image_size" id="image_size" value="<?php echo $image_limit; ?>" />
<input type="hidden" name="audio_size" id="audio_size" value="<?php echo $audio_limit; ?>" />
<input type="hidden" name="doc_size" id="doc_size" value="<?php echo $doc_limit; ?>" />


<div class="page-bar">
    <ul class="page-breadcrumb">
        <li>
            <i class="fa fa-home"></i>
            <a class="" target="_parent" href="{{{ URL::to('wtadmin/') }}}"> Home</a>
            <i class="fa fa-angle-right"></i>
        </li>
        <li>
            <a class="" target="_parent" href="{{{ URL::to('wtadmin/resources/') }}}"> {{{ Lang::get('wtadmin/resources/messages.title') }}}</a>
            <i class="fa fa-angle-right"></i>
        </li>
        <li>
            <a href="#">{{{ $title }}}</a>
        </li>
    </ul>

</div>

{{-- Create Content Form --}}

<!-- Tabs Content -->

<!-- Tab General -->
<div class="tab-content">
    <!-- Tab General -->
    <div class="tab-pane active" id="tab-general">

        <?php
        $flag_size = true;
        if ($occupy_size > $allow_limit) {
            $flag_size = FALSE;
            ?>

            <div class="clear clear_fix"></div>
            <div class="tab-pane1" >
                <div id="size_error" class="alert alert-danger alert-block">
                    <button type="button" class="close" data-dismiss="alert">&times;</button>
                    <h4>Error</h4>
                    <span id="e_msg">Your Domain Allow size limit exceeded. Contact Server Administrator. </span>
                </div>
            </div>
        <?php }
        ?>
        <div class="form-group">
            <div class="col-md-12">
                <!--<button type="button" id="txt_id" class="btn btn-large btn-info" >Resource Uploading</button>-->
            </div>
        </div>

        <div class="clear clear_fix"></div>
        <div class="form-group">

            <div class="col-md-12">
                <br />
            </div>
        </div>
        <div class="tab-pane1" id="">
            <div id="s_im_ro" style="display: none" class="alert alert-success alert-block">
                <button type="button" class="close" data-dismiss="alert">&times;</button>
                <h4>Success</h4>
                <span id="s_msg"></span>
            </div>

            <div id="e_im_ro" style="display: none" class="alert alert-danger alert-block">
                <button type="button" class="close" data-dismiss="alert">&times;</button>
                <h4>Error</h4>
                <span id="e_msg"></span>
            </div>

            <div class="portlet box grey-cascade">
                <div class="portlet-title">
                    <div class="caption">
                        <i class="fa fa-globe"></i>{{{@$title}}}
                    </div>
                </div>
                <div class="portlet-body">
                    <div class="table-toolbar">
                        <div class="row">
                            <div class="col-md-6">
                                <div>
                                    <h2 class="modal-title">Upload Resource</h2>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="btn-group pull-right">

                                    <button class="btn default close_popup"><span class="glyphicon glyphicon-circle-arrow-left"></span> Back</button>

                                </div>
                            </div>
                        </div>
                    </div>
                    <!--                <div class="portlet-body form">-->
                    <br/>
                    <!-- Tab Video -->
                    <div class="tab-pane1" id="">
                        <form id="resource_frm" class="form-horizontal" method="post" action="" autocomplete="off" enctype="multipart/form-data">
                            <!-- CSRF Token -->
                            <input type="hidden" name="_token" id="_token" value="{{{ $csrf_token }}}" />
                            <input type="hidden" name="active" id="active" value="1" />
                            <input type="hidden" name="hash" id="hash" value="{{{$hash}}}" />
                            <input type="hidden" name="name" id="name" value="" />
                            <input type="hidden" name="resource" id="resource" value="" />
                            <input type="hidden" name="page" id="page" value="" />
                            <input type="hidden" name="view_path" id="view_path" value="" />
                            <input type="hidden" name="r_type" id="r_type" value="" />
                            <!-- ./ csrf token -->
                            <!-- Name -->
                            <div class="form-group {{{ $errors->has('title') ? 'has-error' : '' }}}">
                                <label class="col-md-2 control-label" for="title">Title</label>
                                <div class="col-md-10">
                                    <input class="form-control" type="text" name="title" id="title" value="{{{ Input::old('title') }}}" />
                                    {{ $errors->first('title', '<span class="help-block">:message</span>') }}
                                </div>
                            </div>
                            <!-- ./ name -->
                            <!-- description -->
                            <div class="form-group {{{ $errors->has('description') ? 'has-error' : '' }}}">
                                <label class="col-md-2 control-label" for="description">Detail</label>
                                <div class="col-md-10">
                                    <textarea class="form-control full-width wysihtml5" name="description" value="description" rows="5">{{{ Input::old('description', isset($post) ? $post->description : null) }}}</textarea>
                                    {{ $errors->first('description', '<span class="help-block">:message</span>') }}
                                </div>
                            </div>
                            <!-- ./ description -->
                            <?php if ($flag_size) { ?>
                                <div class="form-group {{{ $errors->has('resource_path') ? 'has-error' : '' }}}">
                                    <label class="col-md-2 control-label" for="resource_path">Upload Resource</label>
                                    <div class="col-md-10">
                                        <span id="resource_uploader_div">
                                            <div id="resourcemultiplefileuploader">Upload</div>
                                        </span>

                                        <input class="form-control" type="hidden" name="resource_path" id="resource_path" value="{{{ Input::old('resource_path') }}}" />
                                        {{ $errors->first('resource_path', '<span class="help-block">:message</span>') }}
                                    </div>
                                </div>
                                <div class="form-group {{{ $errors->has('resource_path') ? 'has-error' : '' }}}">
                                    <div class="col-md-10">
                                        <span id="resource_te"></span>
                                    </div>
                                </div>
                            <?php } ?>
                            <!-- ./ Video -->
                            <!-- Form Actions -->
                            <div class="form-group">
                                <div class="col-md-offset-2 col-md-10">
                                    <button class="btn default btn-cancel close_popup">Close</button>
                                    <button type="reset" class="btn default">Reset</button>
                                    <button type="button" id="resource_submit"  class="btn green">Create Resource</button>
                                </div>
                            </div>

                            <!-- ./ form actions -->
                        </form>
                    </div>
                    <!-- ./ tab Video -->



                </div>
            </div>   
        </div>
    </div>
</div>

<!-- ./ tabs content -->


@stop




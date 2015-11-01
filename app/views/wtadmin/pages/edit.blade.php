@extends('wtadmin.layouts.new_theme_default')

{{-- Content --}}
@section('content')
<div class="tabbable tabbable-custom tabbable-noborder">
    <div class="tab-content">
        <div id="tab-capture" class="tab-pane active">
            <div id="show_icon" class="capt-content showicons">      
                <div class="portlet light ">
                    <div class="portlet-title">
                        <div class="caption caption-md">
                            <i class="fa fa-cogs font-green-sharp"></i>
                            <span class="caption-subject font-green-sharp bold uppercase">{{{ $title. " in ".$con_title }}}</span>

                        </div>
                        <div class="actions">
                            <div class="btn-group btn-group-devided">

                                @if ($page->is_video === 1)
                                <label class="btn btn-transparent grey-salsa btn-circle btn-sm active">
                                    <span id="vdo_id" class="toggle" name="options">Video</span></label>
                                @elseif ($page->is_image === 1)
                                <label class="btn btn-transparent grey-salsa btn-circle btn-sm active">
                                    <span id="img_id" class="toggle" name="options">Image</span></label>
                                @elseif ($page->is_text === 1 || $page->is_doc === 1)
                                <label class="btn btn-transparent grey-salsa btn-circle btn-sm active">
                                    <span id="txt_id" class="toggle" name="options">Text / Document</span></label>
                                @elseif ($page->is_audio === 1)
                                <label class="btn btn-transparent grey-salsa btn-circle btn-sm active">
                                    <span id="audio_id" class="toggle" name="options">Audio</span></label>
                                @endif

                                <button class="btn btn-sm btn-default btn-small btn-inverse close_popup">
                                    <span class="glyphicon glyphicon-circle-arrow-left"></span> Back
                                </button>
                            </div>
                        </div>
                    </div>


                    <div class="portlet-body">

                        <!-- Tabs -->

                        <?php
                        $timestamp = time();
                        $hash = md5('unique_salt' . $timestamp);
                        $oldhash = $page->hash;
                        $csrf_token = csrf_token();
                        $sch_id = '';
                        ?>
                        <input type="hidden" name="timestamp" id="timestamp" value="<?php echo $timestamp; ?>" />
                        <input type="hidden" name="hash" id="hash" value="<?php echo $hash; ?>" />
                        <input type="hidden" name="oldhash" id="oldhash" value="<?php echo $oldhash; ?>" />
                        <!--<input type="hidden" name="path" id="path" value="<?php echo $sch_id . '/' . Sentry::getUser()->id; ?>" />-->
                        <input type="hidden" name="path" id="path" value="<?php echo '/' . Sentry::getUser()->id; ?>" />
                        <input type="hidden" name="s_id" id="s_id" value="<?php echo 1; ?>" />

                        <?php
                        $allow_limit = sizeFormatWOT(524288000);
                        $video_limit = sizeFormatWOT(10485760);
                        $image_limit = sizeFormatWOT(10485760);
                        $audio_limit = sizeFormatWOT(10485760);
                        $doc_limit = sizeFormatWOT(10485760);
                        if (isset($domain_size[0])) {
                            $allow_limit = $domain_size[0]['allow_limit'];
                            $video_limit = sizeFormatWOT($domain_size[0]['video_limit']);
                            $image_limit = sizeFormatWOT($domain_size[0]['image_limit']);
                            $audio_limit = sizeFormatWOT($domain_size[0]['audio_limit']);
                            $doc_limit = sizeFormatWOT($domain_size[0]['doc_limit']);
                        }
                        ?>
                        <input type="hidden" name="allow_size" id="allow_size" value="<?php echo $allow_limit; ?>" />
                        <input type="hidden" name="video_size" id="video_size" value="<?php echo $video_limit; ?>" />
                        <input type="hidden" name="image_size" id="image_size" value="<?php echo $image_limit; ?>" />
                        <input type="hidden" name="audio_size" id="audio_size" value="<?php echo $audio_limit; ?>" />
                        <input type="hidden" name="doc_size" id="doc_size" value="<?php echo $doc_limit; ?>" />




                        <input type="hidden" name="_token" id="_token" value="{{{ $csrf_token }}}" />
                        <div class="popover-content">
                            <div class="page-container">
                                <!-- BEGIN PAGE BREADCRUMB -->



                                <!-- ./ tabs -->

                                {{-- Edit Content Form --}}

                                <!-- Tabs Content -->
                                <div class="tab-content">
                                    <!-- Tab General -->
                                    <div class="tab-pane active" id="tab-general">

                                        <?php
                                        $flag_size = true;
                                        ?>


                                        <div class="clear clear_fix"></div>
                                        <div class="form-group">

                                            <div class="col-md-12">
                                                <br />
                                                <span id="error_on_delete" class="info error"></span>
                                            </div>
                                        </div>
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


                                        <!-- Tab Video -->
                                        <?php
//        echo 'Is Video : ' . $page->is_video;
                                        $style = 'none';
                                        if ($page->is_video == 1) {
                                            $style = 'block';
                                            if ($errors->has('vid_path') || $errors->has('video_title') || $errors->has('video_description'))
                                                $style = 'block';
                                            ?>
                                            <div style="display: {{{ $style }}};" class="tab-pane1" id="tab-video">
                                                <form id="video_frm" class="form-horizontal form-bordered form-row-stripped" method="post" action="" autocomplete="off" enctype="multipart/form-data">
                                                    <!-- CSRF Token -->
                                                    <input type="hidden" name="_token" id="_token" value="{{{ $csrf_token }}}" />
                                                    <input type="hidden" name="video_active" id="video_active" value="1" />
                                                    <input type="hidden" name="vid_cat_id" id="vid_cat_id" value="{{{$section_id}}}" />
                                                    <input type="hidden" name="vid_hash" id="vid_hash" value="{{{$oldhash}}}" />
                                                    <input type="hidden" name="page_status" id="page_status" value="{{{$page->status}}}" />
                                                    <!-- ./ csrf token -->
                                                    <!-- Status -->
                                                    <div class="hidden form-group {{{ $errors->has('video_status') ? 'has-error' : '' }}}">
                                                        <label class="col-md-2 control-label" for="video_status">Status</label>
                                                        <div class="col-md-10">
                                                            <input type="button" {{{ ($page->status==1)? 'disabled=""':'' }}} class="btn btn-success paction" data="1" name="btn_approve" value="Approved" />
                                                            <input type="button" {{{ ($page->status==2)? 'disabled=""':'' }}} class="btn btn-warning paction" data="2" name="btn_review" value="Being Reviewed" />
                                                            <input type="button" {{{ ($page->status==3)? 'disabled=""':'' }}} class="btn red paction" data="3" name="btn_waiting" value="Awaiting Review" />
                                                            {{ $errors->first('video_status', '<span class="help-block">:message</span>') }}
                                                        </div>
                                                    </div>
                                                    <!-- ./ Status -->

                                                    <!-- Name -->
                                                    <div class="form-group {{{ $errors->has('video') ? 'has-error' : '' }}}">
                                                        <label class="col-md-2 control-label" for="video_title">Title</label>
                                                        <div class="col-md-10">
                                                            <input class="form-control" type="text" name="video_title" id="video_title" value="{{{ Input::old('video_title', $page->title) }}}" />
                                                            {{ $errors->first('video_title', '<span class="help-block">:message</span>') }}
                                                        </div>
                                                    </div>
                                                    <div class="form-group {{{ $errors->has('video_slug') ? 'has-error' : '' }}}">
                                                        <label class="col-md-2 control-label" for="video_slug">Sub Heading</label>
                                                        <div class="col-md-10">
                                                            <input class="form-control" type="text" name="video_slug" id="video_slug" value="{{{ Input::old('video_slug', $page->slug) }}}" />
                                                            {{ $errors->first('video_slug', '<span class="help-block">:message</span>') }}
                                                        </div>
                                                    </div>
                                                    <!-- ./ name -->
                                                    <!-- description -->
                                                    <div class="form-group {{{ $errors->has('video_description') ? 'has-error' : '' }}}">
                                                        <label class="col-md-2 control-label" for="video_description">Detail</label>
                                                        <div class="col-md-10">
                                                            <textarea class="form-control full-width wysihtml5" name="video_description" id="video_description" rows="5">{{{ Input::old('video_description', $page->description) }}}</textarea>
                                                            {{ $errors->first('video_description', '<span class="help-block">:message</span>') }}
                                                        </div>
                                                    </div>

                                                    <!-- ./ description -->
                                                    <!-- . Video -->
                                                    <div class="form-group">
                                                        <label class="col-md-2 control-label" >Uploaded Videos</label>
                                                        <div class="col-md-10">
                                                            <?php
                                                            foreach ($p_i_v_r as $p_i_v) {
                                                                ?>
                                                                <div id="div_{{{$p_i_v->id}}}" class="ajax-file-upload-statusbar" style="width:300px;float:left;">
                                                                    <div style="width:290px;height:170px;float:left;margin-bottom: 10px;" class="ajax-file-upload-image">
                                                                        <video width="290" height="170" controls>
                                                                            <source src="{{ ($p_i_v->path) }}" type="video/mp4">
                                                                            Your browser does not support the video tag.
                                                                        </video>

                                                                    </div>
                                                                    <br /><a href="{{ asset($p_i_v->path) }}" >{{{$p_i_v->file_name}}}</a><br />
                                                                    <div class="ajax-file-upload-red delete_div" id="del_{{{$p_i_v->id}}}">Delete</div>
                                                                </div>
                                                                <?php
                                                            }
                                                            ?>

                                                        </div>
                                                    </div>
                                                        <div class="form-group {{{ $errors->has('vid_path') ? 'has-error' : '' }}}">
                                                            <label class="col-md-2 control-label" for="vid_path">Video</label>
                                                            <div class="col-md-10">
                                                                <!--<div id="vidmulitplefileuploader">Upload</div>-->
                                                                <div class="dropzone" id="my-Videodropzone"></div>
                                                                <input class="form-control" type="hidden" name="vid_path" id="vid_path" value="{{{ Input::old('vid_path',$page->hash) }}}" />
                                                                {{ $errors->first('vid_path', '<span class="help-block">:message</span>') }}
                                                            </div>
                                                        </div>
                                                        <div class="form-group {{{ $errors->has('vid_path') ? 'has-error' : '' }}}">
                                                            <div class="col-md-12">
                                                                <span id="vid_te"></span>
                                                            </div>
                                                        </div>
                                                        <!-- ./ Video -->

                                                    <!-- Comments -->
                                                    <div class="form-group {{{ $errors->has('video_comments') ? 'has-error' : '' }}}">
                                                        <label class="col-md-2 control-label" for="video_comments">Comments</label>
                                                        <div class="col-md-10">
                                                            <textarea class="form-control full-width" name="video_comments" value="video_comments" rows="5">{{{ Input::old('video_comments', $page->comments) }}}</textarea>
                                                            {{ $errors->first('video_comments', '<span class="help-block">:message</span>') }}
                                                        </div>
                                                    </div>
                                                    <!-- ./ Comments -->
                                                    <!-- Form Actions -->

                                                    
                                                    <div class="form-group">
                                                        <div class="col-md-offset-2 col-md-10">
                                                            <button class="btn btn-sm red close_popup">Cancel</button>
                                                            <button type="reset" class="btn btn-sm btn-default">Reset</button>
                                                            <button type="button" id="vid_submit"  class="btn btn-sm green">Save Content</button>
                                                        </div>
                                                    </div>

                                                    <!-- ./ form actions -->
                                                </form>
                                                  </div>
                                            <!-- ./ tab Video -->

                                            <!-- Tab Audio -->
                                            <?php
                                        }
                                        //        echo 'Is audio : ' . $page->is_audio;
                                        $style = 'none';
                                        if ($page->is_audio == 1) {
                                            $style = 'block';
                                            if ($errors->has('audio_path') || $errors->has('audio_title') || $errors->has('audio_description'))
                                                $style = 'block';
                                            ?>
                                            <div style="display: {{{ $style }}};" class="tab-pane1" id="tab-audio">
                                                <form id="audio_frm" class="form-horizontal form-bordered form-row-stripped" method="post" action="" autocomplete="off" enctype="multipart/form-data">
                                                    <!-- CSRF Token -->
                                                    <input type="hidden" name="_token" id="_token" value="{{{ $csrf_token }}}" />
                                                    <input type="hidden" name="audio_active" id="audio_active" value="1" />
                                                    <input type="hidden" name="audio_cat_id" id="audio_cat_id" value="{{{$section_id}}}" />
                                                    <input type="hidden" name="audio_hash" id="audio_hash" value="{{{$oldhash}}}" />
                                                    <input type="hidden" name="page_status" id="page_status" value="{{{$page->status}}}" />
                                                    <!-- ./ csrf token -->

                                                    <!-- Status -->
                                                    <div class="hidden form-group {{{ $errors->has('audio_status') ? 'has-error' : '' }}}">
                                                        <label class="col-md-2 control-label" for="audio_status">Status</label>
                                                        <div class="col-md-10">
                                                            <input type="button" {{{ ($page->status==1)? 'disabled=""':'' }}} class="btn btn-success paction" data="1" name="btn_approve" value="Approved" />
                                                            <input type="button" {{{ ($page->status==2)? 'disabled=""':'' }}} class="btn btn-warning paction" data="2" name="btn_review" value="Being Reviewed" />
                                                            <input type="button" {{{ ($page->status==3)? 'disabled=""':'' }}} class="btn red paction" data="3" name="btn_waiting" value="Awaiting Review" />
                                                            {{ $errors->first('audio_status', '<span class="help-block">:message</span>') }}
                                                        </div>
                                                    </div>
                                                    <!-- ./ Status -->
                                                    <!-- Name -->
                                                    <div class="form-group {{{ $errors->has('audio') ? 'has-error' : '' }}}">
                                                        <label class="col-md-2 control-label" for="audio_title">Title</label>
                                                        <div class="col-md-10">
                                                            <input class="form-control" type="text" name="audio_title" id="audio_title" value="{{{ Input::old('audio_title',$page->title) }}}" />
                                                            {{ $errors->first('audio_title', '<span class="help-block">:message</span>') }}
                                                        </div>
                                                    </div>
                                                    <!-- ./ name -->
                                                    <!-- description -->
                                                    <div class="form-group {{{ $errors->has('audio_description') ? 'has-error' : '' }}}">
                                                        <label class="col-md-2 control-label" for="audio_description">Detail</label>
                                                        <div class="col-md-10">
                                                            <textarea class="form-control full-width wysihtml5" id="audio_description" value="audio_description" rows="5">{{{ Input::old('audio_description', $page->description) }}}</textarea>
                                                            {{ $errors->first('audio_description', '<span class="help-block">:message</span>') }}
                                                        </div>
                                                    </div>

                                                    <!-- ./ description -->
                                                    <!-- . Audio -->
                                                    <div class="form-group">
                                                        <label class="col-md-2 control-label" >Uploaded Audio</label>
                                                        <div class="col-md-10">
                                                            <?php
                                                            foreach ($p_i_v_r as $p_i_v) {
                                                                ?>
                                                                <div id="div_{{{$p_i_v->id}}}" class="ajax-file-upload-statusbar" style="width:300px;float:left;">
                                                                    <div style="width:290px;height:170px;float:left;margin-bottom: 10px;" class="ajax-file-upload-image">
                                                                        <video width="290" height="170" controls>
                                                                            <source src="{{ ($p_i_v->path) }}" type="video/mp4">
                                                                            Your browser does not support the Audio tag.
                                                                        </video>


                                                                    </div>
                                                                    <br /><a href="{{ asset($p_i_v->path) }}" >{{{$p_i_v->file_name}}}</a><br />
                                                                    <div class="ajax-file-upload-red delete_div" id="del_{{{$p_i_v->id}}}">Delete</div>
                                                                </div>
                                                                <?php
                                                            }
                                                            ?>

                                                        </div>
                                                    </div>

                                                    <?php if ($flag_size) { ?>
                                                        <div class="form-group {{{ $errors->has('audio_path') ? 'has-error' : '' }}}">
                                                            <label class="col-md-2 control-label" for="audio_path">Audio</label>
                                                            <div class="col-md-10">
                                                                <!--<div id="audiomulitplefileuploader">Upload</div>-->
                                                                <div class="dropzone" id="my-AudioDropzone"></div>
                                                                <input class="form-control" type="hidden" name="audio_path" id="audio_path" value="{{{ Input::old('audio_path',$page->hash) }}}" />
                                                                {{ $errors->first('audio_path', '<span class="help-block">:message</span>') }}
                                                            </div>
                                                        </div>
                                                        <div class="form-group {{{ $errors->has('audio_path') ? 'has-error' : '' }}}">
                                                            <div class="col-md-10">
                                                                <span id="audio_te"></span>
                                                            </div>
                                                        </div>
                                                        <!-- ./ Audio -->

                                                        <!-- . Chose Existing-->
                                                        <div class="form-group {{{ $errors->has('audio_path_exist') ? 'has-error' : '' }}}">
                                                            <label class="col-md-2 control-label" for="audio_path_exist">Existing Audio</label>
                                                            <div class="col-md-10">
                                                                <span id="audio_uploader_div_exist">
                                                                    <a href="/wtadmin/pages/file_listing/{{{$oldhash}}}/audio" class="iframe_list btn btn-large btn-sm blue" id="audiomulitplefileuploader_exist">Chose From Existing</a>
                                                                </span>

                                                                <input class="form-control" type="hidden" name="audio_path_exist" id="audio_path_exist" value="{{{ Input::old('audio_path_exist') }}}" />
                                                                {{ $errors->first('audio_path_exist', '<span class="help-block">:message</span>') }}
                                                            </div>
                                                        </div>
                                                        <div class="form-group {{{ $errors->has('audio_path_exist') ? 'has-error' : '' }}}">
                                                            <div class="col-md-12">
                                                                <span id="audio_te_exist"></span>
                                                            </div>
                                                        </div>

                                                    <?php } ?>
                                                    <!-- ./ Chose Existing-->
                                                    <!-- Comments -->
                                                    <div class="form-group {{{ $errors->has('audio_comments') ? 'has-error' : '' }}}">
                                                        <label class="col-md-2 control-label" for="audio_comments">Comments</label>
                                                        <div class="col-md-10">
                                                            <textarea class="form-control full-width" name="audio_comments" value="audio_comments" rows="5">{{{ Input::old('audio_comments', $page->comments) }}}</textarea>
                                                            {{ $errors->first('audio_comments', '<span class="help-block">:message</span>') }}
                                                        </div>
                                                    </div>
                                                    <!-- ./ Comments -->
                                                    <!-- Form Actions -->
                                                    
                                                    <div class="form-group">
                                                        <div class="col-md-offset-2 col-md-10">
                                                            <button class="btn btn-sm red close_popup">Cancel</button>
                                                            <button type="reset" class="btn btn-sm btn-default">Reset</button>
                                                            <button type="button" id="audio_submit"  class="btn btn-sm green">Save Content</button>
                                                        </div>
                                                    </div>

                                                    <!-- ./ form actions -->
                                                </form>
                                            </div>
                                            <!-- ./ tab Audio -->


                                            <!-- Tab Image -->
                                            <?php
                                        }
                                        //        echo 'Is image : ' . $page->is_image;
                                        $style = 'none';
                                        if ($page->is_image == 1) {
                                            $style = 'block';
                                            if ($errors->has('img_path') || $errors->has('img_title') || $errors->has('img_description'))
                                                $style = 'block';
                                            ?>
                                            <div style="display: {{{ $style}}};" class="tab-pane1" id="tab-image">


                                                <form id="img_frm" class="form-horizontal form-bordered form-row-stripped" method="post" action="" autocomplete="off" enctype="multipart/form-data">
                                                    <!-- CSRF Token -->
                                                    <input type="hidden" name="_token" value="{{{ $csrf_token }}}" />
                                                    <input type="hidden" name="img_active" id="img_active" value="1" />
                                                    <input type="hidden" name="img_cat_id" id="img_cat_id" value="{{{$section_id}}}" />
                                                    <input type="hidden" name="img_hash" id="img_hash" value="{{{$oldhash}}}" />
                                                    <input type="hidden" name="page_status" id="page_status" value="{{{$page->status}}}" />
                                                    <!-- ./ csrf token -->



                                                    <!-- Status -->
                                                    <div class="hidden form-group {{{ $errors->has('img_status') ? 'has-error' : '' }}}">
                                                        <label class="col-md-2 control-label" for="img_status">Status</label>
                                                        <div class="col-md-10">
                                                            <input type="button" {{{ ($page->status==1)? 'disabled=""':'' }}} class="btn btn-success paction" data="1" name="btn_approve" value="Approved" />
                                                            <input type="button" {{{ ($page->status==2)? 'disabled=""':'' }}} class="btn btn-warning paction" data="2" name="btn_review" value="Being Reviewed" />
                                                            <input type="button" {{{ ($page->status==3)? 'disabled=""':'' }}} class="btn red paction" data="3" name="btn_waiting" value="Awaiting Review" />
                                                            {{ $errors->first('img_status', '<span class="help-block">:message</span>') }}
                                                        </div>
                                                    </div>
                                                    <!-- ./ Status -->
                                                    <!-- Name -->
                                                    <div class="form-group {{{ $errors->has('title') ? 'has-error' : '' }}}">
                                                        <label class="col-md-2 control-label" for="img_title">Title</label>
                                                        <div class="col-md-10">
                                                            <input class="form-control" type="text" name="img_title" id="img_title" value="{{{ Input::old('img_title',$page->title) }}}" />
                                                            {{ $errors->first('img_title', '<span class="help-block">:message</span>') }}
                                                        </div>
                                                    </div>
                                                    <div class="form-group {{{ $errors->has('img_slug') ? 'has-error' : '' }}}">
                                                        <label class="col-md-2 control-label" for="img_slug">Sub Heading</label>
                                                        <div class="col-md-10">
                                                            <input class="form-control" type="text" name="img_slug" id="img_slug" value="{{{ Input::old('img_slug', $page->slug) }}}" />
                                                            {{ $errors->first('img_slug', '<span class="help-block">:message</span>') }}
                                                        </div>
                                                    </div>
                                                    <!-- ./ name -->
                                                    <!-- description -->
                                                    <div class="form-group {{{ $errors->has('img_description') ? 'has-error' : '' }}}">
                                                        <label class="col-md-2 control-label" for="img_description">Detail</label>
                                                        <div class="col-md-10">
                                                            <textarea class="form-control full-width wysihtml5" name="img_description" id="img_description" rows="5">{{{ Input::old('img_description', $page->description) }}}</textarea>
                                                            {{ $errors->first('img_description', '<span class="help-block">:message</span>') }}
                                                        </div>
                                                    </div>
                                                    <!-- ./ description -->



                                                    <!-- Image -->
                                                    <div class="form-group">
                                                        <label class="col-md-2 control-label" >Uploaded Images</label>
                                                        <div class="col-md-10">
                                                            <?php
                                                            foreach ($p_i_v_r as $p_i_v) {
                                                                ?>

                                                                <div id="div_{{{$p_i_v->id}}}" class="ajax-file-upload-statusbar" style="width:300px;float:left;">

                                                                    <div class="col-md-2">
                                                                        <!--<span data-id="{{{$p_i_v->id}}}"  id="save_image_content" class="btn btn-lg btn-success">Save</span>-->
                                                                    </div>

                                                                    <div style="width:290px;height:250px;float:left;margin-bottom: 10px;" class="ajax-file-upload-image">
                                                                        <img data-id="{{{$p_i_v->id}}}"  data-value="0" id="v_file_{{{$p_i_v->id}}}" width="250" height="250" src="{{ ($p_i_v->path) }}">
                                                                    </div>
                                                                    <br />
                                                                    <div class="ajax-file-upload-red delete_div" id="del_{{{$p_i_v->id}}}">Delete</div>
                                                                    <a href="/download/{{{$p_i_v->id}}}" class="btn btn-sm blue">Download</a>
                                                                    <!--<div data-id="{{{$p_i_v->id}}}" class="right_content btn btn-success">Right</div>-->
                                                                    <!--<div data-id="{{{$p_i_v->id}}}" class="rotate_content btn btn-sm btn-default">Rotate</div>-->
                                                                </div>
                                                                <?php
                                                            }
                                                            ?>

                                                        </div>
                                                    </div>
                                                        <div class="form-group {{{ $errors->has('img_path') ? 'has-error' : '' }}}">
                                                            <label class="col-md-2 control-label" for="img_path">Image</label>
                                                            <div class="col-md-10">
                                                                <input type="hidden" name="preview_image" id="preview_image" value="" />
                                                                <!--<div id="imgmulitplefileuploader">Upload</div>-->
                                                                <div class="dropzone" id="my-Imagedropzone"></div>
                                                                <input class="form-control" type="hidden" name="img_path" id="img_path" value="{{{ Input::old('img_path',$page->hash) }}}" />
                                                                {{ $errors->first('img_path', '<span class="help-block">:message</span>') }}
                                                            </div>
                                                        </div>
                                                        <div class="form-group {{{ $errors->has('img_path') ? 'has-error' : '' }}}">
                                                            <div class="col-md-10">
                                                                <span id="img_te"></span>
                                                            </div>
                                                        </div>
                                                        <!-- ./ Image -->

                                                    <!-- ./ Chose Existing-->
                                                    <!-- Comments -->
                                                    <div class="form-group {{{ $errors->has('img_comments') ? 'has-error' : '' }}}">
                                                        <label class="col-md-2 control-label" for="img_comments">Comments</label>
                                                        <div class="col-md-10">
                                                            <textarea class="form-control full-width" name="img_comments" value="img_comments" rows="5">{{{ Input::old('img_comments', $page->comments) }}}</textarea>
                                                            {{ $errors->first('img_comments', '<span class="help-block">:message</span>') }}
                                                        </div>
                                                    </div>
                                                    <!-- ./ Comments -->
                                                    <!-- Form Actions -->
                                                    
                                                    <div class="form-group">
                                                        <div class="col-md-offset-2 col-md-10">
                                                            <button class="btn btn-sm red close_popup">Cancel</button>
                                                            <button type="reset" class="btn btn-sm btn-default">Reset</button>
                                                            <button type="button" id="img_submit" class="btn btn-sm green">Save Content</button>
                                                        </div>
                                                    </div>
                                                    <!-- ./ form actions -->
                                                </form>
                                                
                                            </div>
                                            <!-- ./ tab Image -->

                                            <!-- Tab Text -->
                                            <?php
                                        }
                                        $style = 'none';
                                        //        echo 'Is Text : ' . $page->is_text;
                                        if ($page->is_text == 1) {
                                            $style = 'block';
                                            if ($errors->has('txt_title') || $errors->has('description'))
                                                $style = 'block';
                                            ?>
                                            <div style="display: {{{$style}}};" class="tab-pane1" id="tab-text">
                                                <form id="doc_frm" class="form-horizontal form-bordered form-row-stripped" method="post" action="" autocomplete="off" enctype="multipart/form-data">
                                                    <!-- CSRF Token -->
                                                    <input type="hidden" name="_token" value="{{{ $csrf_token }}}" />
                                                    <input type="hidden" name="text_active" id="text_active" value="1" />
                                                    <input type="hidden" name="txt_cat_id" id="txt_cat_id" value="{{{$section_id}}}" />
                                                    <input type="hidden" name="txt_hash" id="txt_hash" value="{{{$oldhash}}}" />
                                                    <input type="hidden" name="page_status" id="page_status" value="{{{$page->status}}}" />
                                                    <!-- ./ csrf token -->
                                                    <!-- Status -->
                                                    <div class="hidden form-group {{{ $errors->has('txt_status') ? 'has-error' : '' }}}">
                                                        <label class="col-md-2 control-label" for="txt_status">Status</label>
                                                        <div class="col-md-10">
                                                            <input type="button" {{{ ($page->status==1)? 'disabled=""':'' }}} class="btn btn-success paction" data="1" name="btn_approve" value="Approved" />
                                                            <input type="button" {{{ ($page->status==2)? 'disabled=""':'' }}} class="btn btn-warning paction" data="2" name="btn_review" value="Being Reviewed" />
                                                            <input type="button" {{{ ($page->status==3)? 'disabled=""':'' }}} class="btn red paction" data="3" name="btn_waiting" value="Awaiting Review" />
                                                            {{ $errors->first('txt_status', '<span class="help-block">:message</span>') }}
                                                        </div>
                                                    </div>
                                                    <!-- ./ Status -->
                                                    <!-- Name -->
                                                    <div class="form-group {{{ $errors->has('txt_title') ? 'has-error' : '' }}}">
                                                        <label class="col-md-2 control-label" for="txt_title">Title</label>
                                                        <div class="col-md-10">
                                                            <input class="form-control" type="text" name="txt_title" id="txt_title" value="{{{ Input::old('txt_title',$page->title) }}}" />
                                                            {{ $errors->first('txt_title', '<span class="help-block">:message</span>') }}
                                                        </div>
                                                    </div>
                                                    <div class="form-group {{{ $errors->has('txt_slug') ? 'has-error' : '' }}}">
                                                        <label class="col-md-2 control-label" for="txt_title">Sub Heading</label>
                                                        <div class="col-md-10">
                                                            <input class="form-control" type="text" name="txt_slug" id="txt_slug" value="{{{ Input::old('txt_slug',$page->slug) }}}" />
                                                            {{ $errors->first('txt_slug', '<span class="help-block">:message</span>') }}
                                                        </div>
                                                    </div>
                                                    <!-- ./ name -->

                                                    <!-- description -->
                                                    <div class="form-group {{{ $errors->has('description') ? 'has-error' : '' }}}">
                                                        <label class="col-md-2 control-label" for="description">Detail</label>
                                                        <div class="col-md-10">
                                                            <textarea class="form-control full-width wysihtml5" name="description" id="description" rows="10">{{{ Input::old('description', $page->description) }}}</textarea>
                                                            {{ $errors->first('description', '<span class="help-block">:message</span>') }}
                                                        </div>
                                                    </div>
                                                    <!-- ./ description -->
                                                    <!-- Documents -->
                                                    <div class="form-group">
                                                        <label class="col-md-2 control-label" >Uploaded Documents</label>
                                                        <div class="col-md-10">
                                                            <?php
                                                            $i = 0;
                                                            foreach ($p_i_v_r as $p_i_v) {
                                                                $i++;
                                                                ?>
                                                                <div id="div_{{{$p_i_v->id}}}" class="ajax-file-upload-statusbar" style="width:350px;float:left;">
                                                                    <div style="width:auto;height:70px;float:left;margin-bottom: 10px;" class="ajax-file-upload-image">
                                                                        <a href="{{ asset($p_i_v->path) }}" ><img width="50" height="50"  src="/doc.png" />{{{$p_i_v->file_name}}}</a>
                                                                    </div>
                                                                    <div class="ajax-file-upload-red delete_div" id="del_{{{$p_i_v->id}}}">Delete</div>
                                                                </div>
                                                                <?php
                                                            }
                                                            ?>

                                                        </div>
                                                    </div>
                                                    <!-- . Document-->
                                                        <div class="form-group {{{ $errors->has('doc_path') ? 'has-error' : '' }}}">
                                                            <label class="col-md-2 control-label" for="doc_path">Documents</label>
                                                            <div class="col-md-10">
                <!--                                                <span id="doc_uploader_div">
                                                                    <div id="docmulitplefileuploader">Upload</div>
                                                                </span>-->
                                                                <div class="dropzone" id="my-Txtdropzone"></div>
                                                                <input class="form-control" type="hidden" name="doc_path" id="doc_path" value="{{{ Input::old('doc_path',$page->hash) }}}" />
                                                                {{ $errors->first('doc_path', '<span class="help-block">:message</span>') }}
                                                            </div>
                                                        </div>
                                                        <div class="form-group {{{ $errors->has('doc_path') ? 'has-error' : '' }}}">
                                                            <div class="col-md-10">
                                                                <span id="doc_te"></span>
                                                            </div>
                                                        </div>
                                                        <!-----Document--->
                                                    <!-- Comments -->
                                                    <div class="form-group {{{ $errors->has('txt_comments') ? 'has-error' : '' }}}">
                                                        <label class="col-md-2 control-label" for="txt_comments">Comments</label>
                                                        <div class="col-md-10">
                                                            <textarea class="form-control full-width" name="txt_comments" value="txt_comments" rows="5">{{{ Input::old('txt_comments', $page->comments) }}}</textarea>
                                                            {{ $errors->first('txt_comments', '<span class="help-block">:message</span>') }}
                                                        </div>
                                                    </div>
                                                    <!-- ./ Comments -->

                                                    <!-- Form Actions -->
                                                    
                                                    <div class="form-group">
                                                        <div class="col-md-offset-2 col-md-10">
                                                            <button class="btn btn-sm red close_popup">Cancel</button>
                                                            <button type="reset" class="btn btn-sm btn-default">Reset</button>
                                                            <button type="button" id="doc_submit" class="btn btn-sm green">Save Content</button>
                                                        </div>
                                                    </div>
                                                    <!-- ./ form actions -->
                                                </form>

                                            </div>
                                            <!-- ./ tab Text -->

                                        <?php } ?>


                                    </div>
                                    <!-- ./ tab general -->

                                </div>
                                <!-- ./ tabs content -->
                            </div>
                        </div>
                        <!-- ./ portlet body -->
                    </div>
                </div>

            </div>

        </div>
    </div>

</div>

@stop
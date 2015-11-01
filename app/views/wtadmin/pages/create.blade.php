@extends('wtadmin.layouts.new_theme_default')

{{-- Content --}}
@section('content')

<!-- BEGIN PAGE BREADCRUMB -->
<div class="tabbable tabbable-custom tabbable-noborder">


    <div class="tab-content">

        <div id="tab-capture" class="tab-pane active">



            <div id="show_icon" class="capt-content showicons">      
                <div class="portlet light ">
                    <div class="portlet-title">
                        <div class="caption caption-md">
                            <i class="fa fa-cogs font-green-sharp"></i>
                            <span class="caption-subject font-green-sharp bold uppercase">{{{ ($option==2) ? $title. " in ".$con_title : $con_title }}}</span>

                        </div>
                        <div class="actions">
                            <div class="btn-group btn-group-devided">
                                <!--<a class="btn btn-sm btn-default btn-small btn-inverse" href="{{{ URL::to('sadmin/pages/'.$section_id)}}}" >Back</a>-->
                                <button class="btn btn-sm btn-default btn-small btn-inverse close_popup">
                                    <span class="glyphicon glyphicon-circle-arrow-left"></span> Back
                                </button>
                            </div>
                        </div>
                    </div>
                    <div class="portlet-body">
                        <div class="tab-content">
                            <?php
                            $timestamp = time();
                            $hash = md5('unique_salt' . $timestamp);
                            $csrf_token = csrf_token();
                            $sch_id = '';
                            ?>
                            <input type="hidden" name="timestamp" id="timestamp" value="<?php echo $timestamp; ?>" />
                            <input type="hidden" name="hash" id="hash" value="<?php echo $hash; ?>" />
                            <!--<input type="hidden" name="path" id="path" value="<?php echo $sch_id . '/' . Sentry::getUser()->id; ?>" />-->
                            <input type="hidden" name="path" id="path" value="<?php echo '/' . Sentry::getUser()->id; ?>" />
                            <input type="hidden" name="s_id" id="s_id" value="<?php echo 1; ?>" />
                            <input type="hidden" name="oldhash" id="oldhash" value="<?php echo $hash; ?>" />
                        

                            <?php
                            $allow_limit = sizeFormatWOT(524288000);
                            $video_limit = sizeFormatWOT(10485760);
                            $image_limit = sizeFormatWOT(10485760);
                            $audio_limit = sizeFormatWOT(10485760);
                            $doc_limit = sizeFormatWOT(10485760);
                            $is_feature = 1;
                            ?>
                            <input type="hidden" name="allow_size" id="allow_size" value="<?php echo $allow_limit; ?>" />
                            <input type="hidden" name="video_size" id="video_size" value="<?php echo $video_limit; ?>" />
                            <input type="hidden" name="image_size" id="image_size" value="<?php echo $image_limit; ?>" />
                            <input type="hidden" name="audio_size" id="audio_size" value="<?php echo $audio_limit; ?>" />
                            <input type="hidden" name="doc_size" id="doc_size" value="<?php echo $doc_limit; ?>" />



                            <input type="hidden" name="_token" id="_token" value="{{{ $csrf_token }}}" />


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
                                <div class="tab-pane active" id="tab-capture">
                                    <div class="row">


                                        <div class="col-md-2"></div>
                                        <div class="col-md-8">
                                            <ul class="nav-nav-pills">
                                                <?php
                                                $audio_active = '';
                                                $vid_active = '';
                                                $img_active = '';
                                                $txt_active = '';
                                                if ($errors->has('audio_path') || $errors->has('audio_title') || $errors->has('audio_description')) {
                                                    $audio_active = 'active';
                                                } elseif ($errors->has('vid_path') || $errors->has('video_title') || $errors->has('video_description')) {
                                                    $vid_active = 'active';
                                                } elseif ($errors->has('img_path') || $errors->has('img_title') || $errors->has('img_description')) {
                                                    $img_active = 'active in';
                                                } elseif ($errors->has('txt_title') || $errors->has('description')) {
                                                    $txt_active = 'active';
                                                }
                                                    ?>
                                                        
                                                

                                                <li class="btn btn-default {{{$img_active}}}">
                                                    <a onclick="txt_click('tab-image');"  href="#tab-image" data-toggle="tab" class="capt-link capt-link-2"><i class="fa fa-file-image-o"></i><span>Image</span></a>
                                                </li>
                                                <?php 
                                                
                                                if($section_id!=10){
                                                 ?>
                                                <li class="btn btn-default {{{$txt_active}}}">
                                                    <a onclick="txt_click('tab-text');"  href="#tab-text" data-toggle="tab" class="capt-link capt-link-1">
                                                        <i class="fa fa-file-text-o"></i><span>Text / Document</span>
                                                    </a>
                                                </li>

                                                
<!--                                            <li class="btn btn-default {{{$audio_active}}}">
                                                    <a onclick="txt_click('tab-audio');" href="#tab-audio" data-toggle="tab" class="capt-link capt-link-3"><i class="fa fa-file-audio-o"></i><span>Audio</span></a>
                                                </li>-->

                                                <li class="btn btn-default {{{$vid_active}}}">
                                                    <a onclick="txt_click('tab-video');" href="#tab-video" data-toggle="tab" class="capt-link capt-link-4"><i class="fa fa-file-video-o"></i><span>Video</span></a>
                                                </li>     
                                                <?php    
                                                }
                                                ?>
                                                
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-12">
                                        <!-- Tab Audio -->
                                        <?php
                                        $style = 'none';
                                        $active = '';
                                        if ($errors->has('audio_path') || $errors->has('audio_title') || $errors->has('audio_description')) {
                                            $style = 'block';
                                            $active = 'active in';
                                        }
                                        ?>
                                        <div style="display: {{{ $style }}};" class="tab-pane1 tab-pane {{{$active}}}" id="tab-audio">
                                            <form id="audio_frm" class="form-horizontal form-bordered form-row-stripped" method="post" action="" autocomplete="off" enctype="multipart/form-data">
                                                <!-- CSRF Token -->
                                                <input type="hidden" name="_token" id="_token" value="{{{ $csrf_token }}}" />
                                                <input type="hidden" name="audio_active" id="audio_active" value="1" />
                                                <input type="hidden" name="audio_cat_id" id="audio_cat_id" value="{{{$section_id}}}" />
                                                <input type="hidden" name="audio_hash" id="audio_hash" value="{{{$hash}}}" />
                                                <input type="hidden" name="audio_option_dashboard" id="audio_option_dashboard" value="{{{$option}}}"  />
                                                <!-- ./ csrf token -->

                                                <!-- Status -->
                                                <?php if ($option == 1) { ?>
                                                    <div class="form-group {{{ $errors->has('audio_category_list') ? 'has-error' : '' }}}">
                                                        <label class="col-md-2 control-label" for="audio_category_list">Section</label>
                                                        <div class="col-md-10">
                                                            <select class="form-control"  name="audio_category_list" id="audio_category_list">
                                                                <option value="">Select Section</option>
                                                                <?php
                                                                foreach ($section as $k => $cate) {
                                                                    echo '<option value="' . $cate['id'] . '">' . $cate['section_name'] . '</option>';
                                                                }
                                                                ?>
                                                            </select>
                                                            {{ $errors->first('category_list', '<span class="help-block">:message</span>') }}
                                                        </div>
                                                    </div>
                                                <?php } ?>
                                                <!-- ./ Status -->
                                                <!-- Name -->
                                                <div class="form-group {{{ $errors->has('audio_title') ? 'has-error' : '' }}}">
                                                    <label class="col-md-2 control-label" for="audio_title">Title</label>
                                                    <div class="col-md-10">
                                                        <input class="form-control" type="text" name="audio_title" id="audio_title" value="{{{ Input::old('audio_title') }}}" />
                                                        {{ $errors->first('audio_title', '<span class="help-block">:message</span>') }}
                                                    </div>
                                                </div>
                                                <!-- ./ name -->
                                                <!-- description -->
                                                <div class="form-group {{{ $errors->has('audio_description') ? 'has-error' : '' }}}">
                                                    <label class="col-md-2 control-label" for="audio_description">Detail</label>
                                                    <div class="col-md-10">
                                                        <textarea class="form-control full-width wysihtml5" name="audio_description" id="audio_description" rows="5">{{{ Input::old('audio_description', isset($post) ? $post->description : null) }}}</textarea>
                                                        {{ $errors->first('audio_description', '<span class="help-block">:message</span>') }}
                                                    </div>
                                                </div>


                                                <!-- ./ description -->
                                                <!-- . Audio-->
                                                <div class="form-group {{{ $errors->has('audio_path') ? 'has-error' : '' }}}">
                                                    <label class="col-md-2 control-label" for="audio_path">Audio</label>
                                                    <div class="col-md-10">
            <!--                                            <span id="audio_uploader_div">
                                                            <div id="audiomulitplefileuploader">Upload</div>
                                                        </span>-->
                                                        <div class="dropzone" id="my-AudioDropzone"></div>

                                                        <input class="form-control" type="hidden" name="audio_path" id="audio_path" value="{{{ Input::old('audio_path') }}}" />
                                                        {{ $errors->first('audio_path', '<span class="help-block">:message</span>') }}
                                                    </div>
                                                </div>
                                                <div class="form-group {{{ $errors->has('audio_path') ? 'has-error' : '' }}}">
                                                    <div class="col-md-10">
                                                        <span id="audio_te"></span>
                                                    </div>
                                                </div>
                                                <!-- ./ Audio -->
                                                <!-- Comments -->
                                                <div class="form-group {{{ $errors->has('audio_comments') ? 'has-error' : '' }}}">
                                                    <label class="col-md-2 control-label" for="audio_comments">Comments</label>
                                                    <div class="col-md-10">
                                                        <textarea class="form-control full-width" name="audio_comments" value="audio_comments" rows="5">{{{ Input::old('audio_comments') }}}</textarea>
                                                        {{ $errors->first('audio_comments', '<span class="help-block">:message</span>') }}
                                                    </div>
                                                </div>
                                                <!-- ./ Comments -->
                                                <!-- Form Actions -->

                                                <div class="form-group">
                                                    <div class="col-md-offset-2 col-md-10">
                                                        <button class="btn btn-sm red close_popup">Cancel</button>
                                                        <button type="reset" class="btn btn-sm default">Reset</button>
                                                        <button type="button" id="audio_submit"  class="btn btn-sm green">Save Content</button>
                                                    </div>
                                                </div>

                                                <!-- ./ form actions -->
                                            </form>
                                        </div>
                                        <!-- ./ tab Audio -->

                                        <!-- Tab Video -->
                                        <?php
                                        $style = 'none';
                                        if ($errors->has('vid_path') || $errors->has('video_title') || $errors->has('video_description')) {
                                            $style = 'block';
                                            $active = 'active in';
                                        }
                                        ?>
                                        <div style="display: {{{ $style }}};" class="tab-pane1 tab-pane  {{{$active}}}" id="tab-video">
                                            <form id="video_frm" class="form-horizontal form-bordered form-row-stripped" method="post" action="" autocomplete="off" enctype="multipart/form-data">
                                                <!-- CSRF Token -->
                                                <input type="hidden" name="_token" id="_token" value="{{{ $csrf_token }}}" />
                                                <input type="hidden" name="video_active" id="video_active" value="1" />
                                                <input type="hidden" name="vid_cat_id" id="vid_cat_id" value="{{{$section_id}}}" />
                                                <input type="hidden" name="vid_hash" id="vid_hash" value="{{{$hash}}}" />
                                                <input type="hidden" name="vid_option_dashboard" id="vid_option_dashboard" value="{{{$option}}}"  />
                                                <!-- ./ csrf token -->


                                                <!-- Status -->
                                                <?php if ($option == 1) { ?>
                                                    <div class="form-group {{{ $errors->has('video_category_list') ? 'has-error' : '' }}}">
                                                        <label class="col-md-2 control-label" for="video_category_list">Section</label>
                                                        <div class="col-md-10">
                                                            <select class="form-control"  name="video_category_list" id="audio_category_list">
                                                                <option value="">Select Section</option>
                                                                <?php
                                                                foreach ($section as $k => $cate) {
                                                                    echo '<option value="' . $cate['id'] . '">' . $cate['section_name'] . '</option>';
                                                                }
                                                                ?>
                                                            </select>
                                                            {{ $errors->first('video_category_list', '<span class="help-block">:message</span>') }}
                                                        </div>
                                                    </div>
                                                <?php } ?>
                                                <!-- ./ Status -->
                                                <!-- Name -->
                                                <div class="form-group {{{ $errors->has('video_title') ? 'has-error' : '' }}}">
                                                    <label class="col-md-2 control-label" for="video_title">Title</label>
                                                    <div class="col-md-10">
                                                        <input class="form-control" type="text" name="video_title" id="video_title" value="{{{ Input::old('video_title') }}}" />
                                                        {{ $errors->first('video_title', '<span class="help-block">:message</span>') }}
                                                    </div>
                                                </div>
                                                <div class="form-group {{{ $errors->has('video_slug') ? 'has-error' : '' }}}">
                                                    <label class="col-md-2 control-label" for="video_slug">Sub Heading</label>
                                                    <div class="col-md-10">
                                                        <input class="form-control" type="text" name="video_slug" id="video_slug" value="{{{ Input::old('video_slug') }}}" />
                                                        {{ $errors->first('video_slug', '<span class="help-block">:message</span>') }}
                                                    </div>
                                                </div>
                                                <!-- ./ name -->
                                                <!-- description -->
                                                <div class="form-group {{{ $errors->has('video_description') ? 'has-error' : '' }}}">
                                                    <label class="col-md-2 control-label" for="video_description">Detail</label>
                                                    <div class="col-md-10">
                                                        <textarea class="form-control full-width wysihtml5" name="video_description" value="video_description" rows="5">{{{ Input::old('video_description', isset($post) ? $post->description : null) }}}</textarea>
                                                        {{ $errors->first('video_description', '<span class="help-block">:message</span>') }}
                                                    </div>
                                                </div>
                                                <!-- ./ description -->
                                                <!-- . Video -->
                                                <div class="form-group {{{ $errors->has('vid_path') ? 'has-error' : '' }}}">
                                                    <label class="col-md-2 control-label" for="vid_path">Video</label>
                                                    <div class="col-md-10">
            <!--                                            <span id="video_uploader_div">
                                                            <div id="vidmulitplefileuploader">Upload</div>
                                                        </span>-->
                                                        <div class="dropzone" id="my-Videodropzone"></div>
                                                        <input class="form-control" type="hidden" name="vid_path" id="vid_path" value="{{{ Input::old('vid_path') }}}" />
                                                        {{ $errors->first('vid_path', '<span class="help-block">:message</span>') }}
                                                    </div>
                                                </div>
                                                <div class="form-group {{{ $errors->has('vid_path') ? 'has-error' : '' }}}">
                                                    <div class="col-md-10">
                                                        <span id="vid_te"></span>
                                                    </div>
                                                </div>
                                                <!-- ./ Video -->

                                                <!-- Comments -->
                                                <div class="form-group {{{ $errors->has('video_comments') ? 'has-error' : '' }}}">
                                                    <label class="col-md-2 control-label" for="video_comments">Comments</label>
                                                    <div class="col-md-10">
                                                        <textarea class="form-control full-width" name="video_comments" id="video_comments" rows="5">{{{ Input::old('video_comments') }}}</textarea>
                                                        {{ $errors->first('video_comments', '<span class="help-block">:message</span>') }}
                                                    </div>
                                                </div>
                                                <!-- ./ Comments -->
                                                <!-- Form Actions -->

                                                <div class="form-group">
                                                    <div class="col-md-offset-2 col-md-10">
                                                        <button class="btn btn-sm red close_popup">Cancel</button>
                                                        <button type="reset" class="btn btn-sm default">Reset</button>
                                                        <button type="button" id="vid_submit"  class="btn btn-sm green">Save Content</button>
                                                    </div>
                                                </div>

                                                <!-- ./ form actions -->
                                            </form>
                                        </div>
                                        <!-- ./ tab Video -->

                                        <!-- Tab Image -->
                                        <?php
                                        $style = 'none';
                                        if ($errors->has('img_path') || $errors->has('img_title') || $errors->has('img_description')) {
                                            $style = 'block';
                                            $active = 'active in';
                                        }
                                        ?>
                                        <div style="display: {{{ $style}}};" class="tab-pane1 tab-pane  {{{$active}}}" id="tab-image">
                                            <form id="img_frm" class="form-horizontal form-bordered form-row-stripped" method="post" action="" autocomplete="off" enctype="multipart/form-data">
                                                <!-- CSRF Token -->
                                                <input type="hidden" name="_token" value="{{{ $csrf_token }}}" />
                                                <input type="hidden" name="img_active" id="img_active" value="1" />
                                                <input type="hidden" name="img_cat_id" id="img_cat_id" value="{{{$section_id}}}" />
                                                <input type="hidden" name="img_hash" id="img_hash" value="{{{$hash}}}" />
                                                <input type="hidden" name="img_option_dashboard" id="img_option_dashboard" value="{{{$option}}}" />
                                                <!-- ./ csrf token -->


                                                <!-- Status -->
                                                <?php if ($option == 1) { ?>
                                                    <div class="form-group {{{ $errors->has('img_category_list') ? 'has-error' : '' }}}">
                                                        <label class="col-md-2 control-label" for="img_category_list">Section</label>
                                                        <div class="col-md-10">
                                                            <select class="form-control"  name="img_category_list" id="img_category_list">
                                                                <option value="">Select Section</option>
                                                                <?php
                                                                foreach ($section as $k => $cate) {
                                                                    echo '<option value="' . $cate['id'] . '">' . $cate['section_name'] . '</option>';
                                                                }
                                                                ?>
                                                            </select>
                                                            {{ $errors->first('img_category_list', '<span class="help-block">:message</span>') }}
                                                        </div>
                                                    </div>
                                                <?php } ?>
                                                <!-- ./ Status -->

                                                <!-- Name -->
                                                <div class="form-group {{{ $errors->has('img_title') ? 'has-error' : '' }}}">
                                                    <label class="col-md-2 control-label" for="img_title">Title</label>
                                                    <div class="col-md-10">
                                                        <input class="form-control" type="text" name="img_title" id="img_title" value="{{{ Input::old('img_title') }}}" />
                                                        {{ $errors->first('img_title', '<span class="help-block">:message</span>') }}
                                                    </div>
                                                </div>
                                                <div class="form-group {{{ $errors->has('img_slug') ? 'has-error' : '' }}}">
                                                    <label class="col-md-2 control-label" for="img_slug">Sub Heading</label>
                                                    <div class="col-md-10">
                                                        <input class="form-control" type="text" name="img_slug" id="img_slug" value="{{{ Input::old('img_slug') }}}" />
                                                        {{ $errors->first('img_slug', '<span class="help-block">:message</span>') }}
                                                    </div>
                                                </div>
                                                <!-- ./ name -->
                                                <!-- description -->
                                                <div class="form-group {{{ $errors->has('img_description') ? 'has-error' : '' }}}">
                                                    <label class="col-md-2 control-label" for="img_description">Detail</label>
                                                    <div class="col-md-10">
                                                        <textarea class="form-control full-width wysihtml5" name="img_description" id="img_description" rows="5">{{{ Input::old('img_description', isset($post) ? $post->description : null) }}}</textarea>
                                                        {{ $errors->first('img_description', '<span class="help-block">:message</span>') }}
                                                    </div>
                                                </div>

                                                <!-- ./ description -->

                                                <!-- Image -->
                                                <div class="form-group {{{ $errors->has('img_path') ? 'has-error' : '' }}}">
                                                    <label class="col-md-2 control-label" for="img_path">Image</label>
                                                    <div class="col-md-10">
                                                        <input type="hidden" name="preview_image" id="preview_image" value="" />
            <!--                                            <span id="image_uploader_div">
                                                            <div id="imgmulitplefileuploader">Upload</div>
                                                        </span>-->
                                                        <div class="dropzone" id="my-Imagedropzone"></div>
                                                        <input class="form-control" type="hidden" name="img_path" id="img_path" value="{{{ Input::old('img_path') }}}" />
                                                        {{ $errors->first('img_path', '<span class="help-block">:message</span>') }}
                                                    </div>
                                                </div>
                                                <div class="form-group {{{ $errors->has('img_path') ? 'has-error' : '' }}}">
                                                    <div class="col-md-10">
                                                        <span id="img_te"></span>
                                                    </div>
                                                </div>
                                                <!-- ./ Image -->

                                                <!-- Comments -->
                                                <div class="form-group {{{ $errors->has('img_comments') ? 'has-error' : '' }}}">
                                                    <label class="col-md-2 control-label" for="img_comments">Comments</label>
                                                    <div class="col-md-10">
                                                        <textarea class="form-control full-width" name="img_comments" id="img_comments" rows="5">{{{ Input::old('img_comments') }}}</textarea>
                                                        {{ $errors->first('img_comments', '<span class="help-block">:message</span>') }}
                                                    </div>
                                                </div>
                                                <!-- ./ Comments -->
                                                <!-- Form Actions -->

                                                <div class="form-group">
                                                    <div class="col-md-offset-2 col-md-10">
                                                        <button class="btn btn-sm red close_popup">Cancel</button>
                                                        <button type="reset" class="btn btn-sm default">Reset</button>
                                                        <button type="button" id="img_submit" class="btn btn-sm green">Save Content</button>
                                                    </div>
                                                </div>
                                                <!-- ./ form actions -->
                                            </form>
                                        </div>
                                        <!-- ./ tab Image -->

                                        <!-- Tab Text -->
                                        <?php
                                        $style = 'none';
                                        if ($errors->has('txt_title') || $errors->has('description')) {
                                            $style = 'block';
                                            $active = 'active in';
                                        }
                                        ?>
                                        <div style="display: {{{$style}}};" class="tab-pane1 tab-pane  {{{$active}}}" id="tab-text">
                                            <form id="doc_frm" class="form-horizontal form-bordered form-row-stripped" method="post" action="" autocomplete="off" enctype="multipart/form-data">
                                                <!-- CSRF Token -->
                                                <input type="hidden" name="_token" value="{{{ $csrf_token }}}" />
                                                <input type="hidden" name="text_active" id="text_active" value="1" />
                                                <input type="hidden" name="txt_cat_id" id="txt_cat_id" value="{{{$section_id}}}" />
                                                <input type="hidden" name="txt_hash" id="txt_hash" value="{{{$hash}}}" />
                                                <input type="hidden" name="txt_option_dashboard" id="txt_option_dashboard" value="{{{$option}}}" />
                                                <!-- ./ csrf token -->

                                                <!-- Status -->
                                                <?php if ($option == 1) { ?>
                                                    <div class="form-group {{{ $errors->has('txt_category_list') ? 'has-error' : '' }}}">
                                                        <label class="col-md-2 control-label" for="txt_category_list">Section</label>
                                                        <div class="col-md-10">
                                                            <select class="form-control"  name="txt_category_list" id="txt_category_list">
                                                                <option value="">Select Section</option>
                                                                <?php
                                                                foreach ($section as $k => $cate) {
                                                                    echo '<option value="' . $cate['id'] . '">' . $cate['section_name'] . '</option>';
                                                                }
                                                                ?>
                                                            </select>
                                                            {{ $errors->first('txt_category_list', '<span class="help-block">:message</span>') }}
                                                        </div>
                                                    </div>
                                                <?php } ?>
                                                <!-- ./ Status -->
                                                <!-- Name -->
                                                <div class="form-group {{{ $errors->has('txt_title') ? 'has-error' : '' }}}">
                                                    <label class="col-md-2 control-label" for="txt_title">Title</label>
                                                    <div class="col-md-10">
                                                        <input class="form-control" type="text" name="txt_title" id="txt_title" value="{{{ Input::old('txt_title') }}}" />
                                                        {{ $errors->first('txt_title', '<span class="help-block">:message</span>') }}
                                                    </div>
                                                </div>
                                                <div class="form-group {{{ $errors->has('txt_slug') ? 'has-error' : '' }}}">
                                                    <label class="col-md-2 control-label" for="txt_slug">Sub Heading</label>
                                                    <div class="col-md-10">
                                                        <input class="form-control" type="text" name="txt_slug" id="txt_slug" value="{{{ Input::old('txt_slug') }}}" />
                                                        {{ $errors->first('txt_slug', '<span class="help-block">:message</span>') }}
                                                    </div>
                                                </div>
                                                <!-- ./ name -->

                                                <!-- description -->
                                                <div class="form-group {{{ $errors->has('description') ? 'has-error' : '' }}}">
                                                    <label class="col-md-2 control-label" for="description">Detail</label>
                                                    <div class="col-md-10">
                                                        <textarea class="form-control full-width wysihtml5" name="description" id="description" rows="10">{{{ Input::old('description') }}}</textarea>
                                                        {{ $errors->first('description', '<span class="help-block">:message</span>') }}
                                                    </div>
                                                </div>
                                                <!-- ./ description -->

                                                <!-- . Document-->
                                                <div class="form-group {{{ $errors->has('doc_path') ? 'has-error' : '' }}}">
                                                    <label class="col-md-2 control-label" for="doc_path">Documents</label>
                                                    <div class="col-md-10">
                                                        <div class="dropzone" id="my-Txtdropzone"></div>
                                                        <input class="form-control" type="hidden" name="doc_path" id="doc_path" value="{{{ Input::old('doc_path') }}}" />
                                                        {{ $errors->first('doc_path', '<span class="help-block">:message</span>') }}
                                                    </div>
                                                </div>
                                                <div class="form-group {{{ $errors->has('doc_path') ? 'has-error' : '' }}}">
                                                    <div class="col-md-10">
                                                        <span id="doc_te"></span>
                                                    </div>
                                                </div>
                                                <!--Documents-->
                                                <!-- Comments -->
                                                <div class="form-group {{{ $errors->has('txt_comments') ? 'has-error' : '' }}}">
                                                    <label class="col-md-2 control-label" for="txt_comments">Comments</label>
                                                    <div class="col-md-10">
                                                        <textarea class="form-control full-width" name="txt_comments" value="txt_comments" rows="5">{{{ Input::old('txt_comments') }}}</textarea>
                                                        {{ $errors->first('txt_comments', '<span class="help-block">:message</span>') }}
                                                    </div>
                                                </div>
                                                <!-- ./ Comments -->

                                                <!-- Form Actions -->

                                                <div class="form-group">
                                                    <div class="col-md-offset-2 col-md-10">
                                                        <button class="btn btn-sm red close_popup">Cancel</button>
                                                        <button type="reset" class="btn btn-sm default">Reset</button>
                                                        <button type="button" id="doc_submit" class="btn btn-sm green">Save Content</button>
                                                    </div>
                                                </div>
                                                <!-- ./ form actions -->
                                            </form>
                                        </div>
                                        <!-- ./ tab Text -->
                                    </div>
                                </div>


                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>

</div>
@stop

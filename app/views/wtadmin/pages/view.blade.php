@extends('wtadmin.layouts.new_theme_default')

{{-- Content --}}
@section('content')
<!-- BEGIN PAGE BREADCRUMB -->

<div class="page-bar">
    <ul class="page-breadcrumb">
        <li>
            <i class="fa fa-home"></i>
            <a class="" target="_parent" href="{{{ URL::to('wtadmin/') }}}"> Home</a>
            <i class="fa fa-angle-right"></i>
        </li>
        <li>
            <a class="" target="_parent" href="{{{ URL::to('wtadmin/categories/') }}}"> Category Management</a>
            <i class="fa fa-angle-right"></i>
        </li>
        <li>
           <a class="" target="_parent" href="{{{ URL::to('wtadmin/pages/'.$category_id) }}}">{{{ $con_title }}}</a>
            <i class="fa fa-angle-right"></i>
        </li>
        <li>
            <a href="#"> {{{ $title }}}</a>
        </li>
    </ul>

</div>

<div class="portlet light ">
    <div class="portlet-title">
        <div class="caption caption-md">
            <i class="icon-bar-chart theme-font hide"></i>
            <span class="caption-subject theme-font bold uppercase">{{{ $title. " in ".$con_title }}}</span>

        </div>
        <div class="actions">
            <div data-toggle="buttons" class="btn-group btn-group-devided">


                @if ($page->is_video === 1)
                <label class="btn btn-transparent grey-salsa btn-circle btn-sm active">
                    <input type="radio" id="vdo_id" class="toggle" name="options">Video</label>
                @elseif ($page->is_image === 1)
                <label class="btn btn-transparent grey-salsa btn-circle btn-sm active">
                    <input type="radio" id="img_id" class="toggle" name="options">Image</label>
                @elseif ($page->is_text === 1 || $page->is_doc === 1)
                <label class="btn btn-transparent grey-salsa btn-circle btn-sm active">
                    <input type="radio" id="txt_id" class="toggle" name="options">Text / Document</label>
                @elseif ($page->is_audio === 1)
                <label class="btn btn-transparent grey-salsa btn-circle btn-sm active">
                    <input type="radio" id="audio_id" class="toggle" name="options">Audio</label>
                @endif

                
            </div>
            <a href='{{{ URL::to('wtadmin')}}}' class="btn btn-default btn-small btn-inverse close_popup_view"><span class="glyphicon glyphicon-circle-arrow-left"></span> Back</a>
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
        <!--<input type="hidden" name="path" id="path" value="<?php echo $sch_id . '/' . Auth::user()->id; ?>" />-->
        <input type="hidden" name="path" id="path" value="<?php echo '/' . Auth::user()->id; ?>" />
        <input type="hidden" name="s_id" id="s_id" value="<?php echo Auth::user()->s_id; ?>" />

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
        <input type="hidden" name="option_id" id="option_id" value="<?php echo $option_id; ?>" />

        <br />

        <input type="hidden" name="_token" id="_token" value="{{{ $csrf_token }}}" />
        <div class="popover-content">
            <div class="page-container">


                <!-- ./ tabs -->

                {{-- Edit Content Form --}}

                <!-- Tabs Content -->
                <div class="tab-content">
                    <!-- Tab General -->
                    <div class="tab-pane active" id="tab-general">
                        <?php
                        $flag_size = true;
                        if ($occupy_size > $allow_limit) {
                            $flag_size = false;
                            ?>

                            <div class="clear clear_fix"></div>
                            <div class="tab-pane1" >
                                <div id="size_error" class="alert alert-danger alert-block">
                                    <button type="button" class="close" data-dismiss="alert">&times;</button>
                                    <h4>Error</h4>
                                    <span id="e_msg">Your Domain Allow size limit exceeded. Contact Server Administrator. </span>
                                </div>
                            </div>
                            <?php
                        }
                        ?>
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

                        <div class="form-horizontal form-bordered form-row-stripped">
                            <div class="form-group">
                                <label class="col-md-2 control-label" >&nbsp;Users</label>
                                <div class="col-md-10">
                                    <?php if ($data['assign'] == 1) { ?> 
                                        <div class="btn-group">
                                            <button data-toggle="dropdown" class="btn btn-default dropdown-toggle" type="button" id="btnGroupVerticalDrop1">
                                                Assigned Users
                                                <span class="caret"></span>
                                            </button>
                                            <ul aria-labelledby="btnGroupVerticalDrop1" role="menu" class="dropdown-menu">
                                                <?php foreach ($data['assignUsers'] as $u_list) { ?>
                                                    <li><a target="_blank" href="{{{ URL::to('/wtadmin/user/dashboard/'.$u_list['id']) }}}">{{{$u_list['username']}}}</a></li>
                                                <?php } ?>
                                            </ul>
                                        </div>
                                        <?php
                                    } else {
                                        echo '<span class="btn btn-sm red" >Not Assign</span>';
                                    }
                                    ?>
                                </div>

                            </div>
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
                                    <input type="hidden" name="vid_cat_id" id="vid_cat_id" value="{{{$category_id}}}" />
                                    <input type="hidden" name="vid_hash" id="vid_hash" value="{{{$oldhash}}}" />
                                    <input type="hidden" name="page_status" id="page_status" value="{{{$page->status}}}" />
                                    <!-- ./ csrf token -->

                                    <!-- Status -->
                                    <div class="form-group {{{ $errors->has('video_status') ? 'has-error' : '' }}}">
                                        <label class="col-md-2 control-label" for="video_status">Status</label>
                                        <div class="col-md-10">
                                            <input type="button" {{{ ($page->status==1)? 'disabled=""':'' }}} class="btn btn-sm btn-success paction" data="1" name="btn_approve" value="Approved" />
                                            <input type="button" {{{ ($page->status==2)? 'disabled=""':'' }}} class="btn btn-sm btn-warning paction" data="2" name="btn_review" value="Being Reviewed" />
                                            <input type="button" {{{ ($page->status==3)? 'disabled=""':'' }}} class="btn btn-sm red paction" data="3" name="btn_waiting" value="Awaiting Review" />


                                            {{ $errors->first('video_status', '<span class="help-block">:message</span>') }}
                                        </div>
                                    </div>
                                    <!-- ./ Status -->

                                    <!-- Name -->
                                    <div class="form-group {{{ $errors->has('video') ? 'has-error' : '' }}}">
                                        <label class="col-md-2 control-label" for="video_title">Title</label>
                                        <div class="col-md-10">
                                            <input class="form-control" type="text" name="video_title" id="video_title" value="{{{ Input::old('video_title',$page->title) }}}" />
                                            {{ $errors->first('video_title', '<span class="help-block">:message</span>') }}
                                        </div>
                                    </div>
                                    <!-- ./ name -->
                                    <!-- description -->
                                    <div class="form-group {{{ $errors->has('video_description') ? 'has-error' : '' }}}">
                                        <label class="col-md-2 control-label" for="video_description">Detail</label>
                                        <div class="col-md-10">
                                            <textarea class="form-control full-width wysihtml5" name="video_description" value="video_description" rows="5">{{{ Input::old('video_description', $page->description) }}}</textarea>
                                            {{ $errors->first('video_description', '<span class="help-block">:message</span>') }}
                                        </div>
                                    </div>


                                    <?php
                                        $is_advance_feature = Session::get('is_advance_feature');
                                        if ($is_advance_feature[0] == 1) {
                                    ?>
                                    <div class="form-group">
                                        <label class="col-md-2 control-label" for="extra_options"></label>

                                        <div class="col-md-10">
                                            <a class="btn default dropdown-toggle advance_options" href="javascript:" data-toggle="dropdown" alt="options_4">
                                                <span class="current-font">Advance options</span>
                                                <b class="caret"></b>
                                            </a>    
                                        </div>
                                    </div>

                                    <div id="options_4" style="display:none">

                                        <div class="form-group">
                                            <label class="col-md-2 control-label" for="dm">DM</label>
                                            <div class="col-md-10">
                                                <textarea class="form-control full-width" name="field_dm" value="field_dm" rows="3">{{{ Input::old('detail_c_el', $page->detail_dm) }}}</textarea>
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label class="col-md-2 control-label" for="dm">Next Step</label>
                                            <div class="col-md-10">
                                                <textarea class="form-control full-width" name="field_ns" value="field_ns" rows="3">{{{ Input::old('detail_c_el', $page->detail_ns) }}}</textarea>
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label class="col-md-2 control-label" for="dm">C of EL</label>
                                            <div class="col-md-10">
                                                <textarea class="form-control full-width" name="field_c_el" value="field_c_el" rows="3">{{{ Input::old('detail_c_el', $page->detail_c_el) }}}</textarea>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="col-md-2 control-label" for="band">Band</label>
                                            <div class="col-md-10">
                                                <select class="form-control"  name="band" id="band">
                                                    <option value="">Select Band</option>
                                                    <option  value="birth-11" <?php echo (isset($page->band) && $page->band == "birth-11") ? 'selected=""' : ''; ?> >Birth – 11</option>
                                                    <option value="8-20m" <?php echo (isset($page->band) && $page->band == "8-20m") ? 'selected=""' : ''; ?>>8-20 Months</option>
                                                    <option value="16-26m" <?php echo (isset($page->band) && $page->band == "16-26m") ? 'selected=""' : ''; ?>>16-26 Months</option>
                                                    <option value="22-36m" <?php echo (isset($page->band) && $page->band == "22-36m") ? 'selected=""' : ''; ?>>22-36 Months</option>
                                                    <option value="30-50m" <?php echo (isset($page->band) && $page->band == "30-50m") ? 'selected=""' : ''; ?>>30-50 Months</option>
                                                    <option value="40-60+m" <?php echo (isset($page->band) && $page->band == "40-60+m") ? 'selected=""' : ''; ?>>40-60+ Months</option>
                                                    <option value="goal" <?php echo (isset($page->band) && $page->band == "goal") ? 'selected=""' : ''; ?>>GOAL</option>
                                                </select>
                                            </div>
                                        </div>


                                    </div>

                                    <?php }?>
                                    <!-- ./ description -->
                                    <!-- . Video -->
                                    <div class="form-group">
                                        <label class="col-md-2 control-label" >Uploaded Videos</label>
                                        <div class="col-md-10">
                                            <?php
                                            foreach ($p_i_v_r as $p_i_v) {
                                                ?>
                                                <div id="div_{{{$p_i_v->id}}}" class="ajax-file-upload-statusbar" style="width:300px;float:left;">
                                                    <div class="ajax-file-upload-image">
                                                        <video width="290" height="170" controls>
                                                            <source src="{{ ($p_i_v->path) }}" type="video/mp4">
                                                            Your browser does not support the video tag.
                                                        </video>

                                                    </div>
                                                    <div class="ajax-file-upload-red delete_div" id="del_{{{$p_i_v->id}}}">Delete</div>
                                                    <a href="/download/{{{$p_i_v->id}}}" class="btn btn-sm blue">Download</a>
                                                </div>
                                                <?php
                                            }
                                            ?>

                                        </div>
                                    </div>
                                    <?php if ($flag_size) { ?>
                                        <div class="form-group {{{ $errors->has('vid_path') ? 'has-error' : '' }}}">
                                            <label class="col-md-2 control-label" for="vid_path">Video</label>
                                            <div class="col-md-10">
                                                <div id="vidmulitplefileuploader">Upload</div>
                                                <input class="form-control" type="hidden" name="vid_path" id="vid_path" value="{{{ Input::old('vid_path',$page->hash) }}}" />
                                                {{ $errors->first('vid_path', '<span class="help-block">:message</span>') }}
                                            </div>
                                        </div>
                                        <div class="form-group {{{ $errors->has('vid_path') ? 'has-error' : '' }}}">
                                            <div class="col-md-10">
                                                <span id="vid_te"></span>
                                            </div>
                                        </div>
                                        <!-- ./ Video -->

                                        <!-- . Chose Existing-->
                                        <div class="form-group {{{ $errors->has('vid_path_exist') ? 'has-error' : '' }}}">
                                            <label class="col-md-2 control-label" for="vid_path_exist">Existing Video</label>
                                            <div class="col-md-10">
                                                <span id="video_uploader_div_exist">
                                                    <a href="/wtadmin/pages/file_listing/{{{$oldhash}}}/video" class="iframe_list btn btn-large blue" id="vidmulitplefileuploader_exist">Chose From Existing</a>
                                                </span>

                                                <input class="form-control" type="hidden" name="vid_path_exist" id="vid_path_exist" value="{{{ Input::old('vid_path_exist') }}}" />
                                                {{ $errors->first('vid_path_exist', '<span class="help-block">:message</span>') }}
                                            </div>
                                        </div>
                                        <div class="form-group {{{ $errors->has('vid_path_exist') ? 'has-error' : '' }}}">
                                            <div class="col-md-10">
                                                <span id="vid_te_exist"></span>
                                            </div>
                                        </div>
                                    <?php } ?>
                                    <!-- ./ Chose Existing-->
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
                                    <!--                                    @include('form_notifications')-->
                                    <div class="form-group">
                                        <div class="col-md-offset-2 col-md-10">
                                            <button class="btn btn-sm red close_popup">Cancel</button>
                                            <button type="reset" class="btn btn-sm default">Reset</button>
                                            <button type="button" id="vid_submit"  class="btn btn-sm green">Save Content</button>
                                        </div>
                                    </div>

                                    <!-- ./ form actions -->
                                </form>
                                <?php
                                $is_comment = Session::get('is_comment_allow');
                                if ($is_comment[0] == 1) {
                                    ?>
                                    <!-- List Comments -->
                                    <!-- List Comments -->
                                    <div id="c_s_im_ro" style="display: none" class="alert alert-success alert-block">
                                        <button type="button" class="close" data-dismiss="alert">&times;</button>
                                        <h4>Success</h4>
                                        <span id="s_msg">Comments Delete Successfully.</span>
                                    </div>

                                    <div id="c_e_im_ro" style="display: none" class="alert alert-danger alert-block">
                                        <button type="button" class="close" data-dismiss="alert">&times;</button>
                                        <h4>Error</h4>
                                        <span id="e_msg">Error occurred on comments deletion.</span>
                                    </div>
                                    <section id="comments">
                                        <h1>Comments</h1>
                                        <p class="commentCount">(showing {{{sizeof($comments)}}} comments)</p>
                                        <?php
                                        if (sizeof($comments) > 0) {
                                            ?>
                                            <ol>
                                                <?php foreach ($comments as $comm) { ?>
                                                    <li class="adminComment" id="cmt-<?php echo $comm['id']; ?>">
                                                        <p class="commentInfo"><?php echo $comm['username']; ?>.<small class="commentDateStamp"><?php echo date('d/m/Y @ H:m:s a', strtotime($comm['created_at'])); ?></small></p>
                                                        <div class="comment">
                                                            <p>
                                                                <?php echo $comm['content']; ?>
                                                            </p>
                                                        </div>
                                                        <?php
                                                        if ($comm['user_id'] == Auth::user()->id || Auth::user()->hasRole("admin")) {
                                                            ?>
                                                            <span data-id="{{{$comm['id']}}}" data-link="/wtadmin/comments/<?php echo $comm['id']; ?>/delete/view" class="del_comm btn btn-sm btn-xs red">{{{ Lang::get('button.delete') }}}</span>
                                                            <?php
                                                        }
                                                        ?>
                                                    </li>
                                                <?php } ?>

                                            </ol>
                                        <?php } ?>
                                    </section>

                                    <!-- ./ List Comments -->
                                <?php } ?>
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
                                    <input type="hidden" name="audio_cat_id" id="audio_cat_id" value="{{{$category_id}}}" />
                                    <input type="hidden" name="audio_hash" id="audio_hash" value="{{{$oldhash}}}" />
                                    <input type="hidden" name="page_status" id="page_status" value="{{{$page->status}}}" />
                                    <!-- ./ csrf token -->

                                    <!-- Status -->
                                    <div class="form-group {{{ $errors->has('audio_status') ? 'has-error' : '' }}}">
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
                                            <textarea class="form-control full-width wysihtml5" name="audio_description" value="audio_description" rows="5">{{{ Input::old('audio_description', $page->description) }}}</textarea>
                                            {{ $errors->first('audio_description', '<span class="help-block">:message</span>') }}
                                        </div>
                                    </div>

                                    <?php
                                        $is_advance_feature = Session::get('is_advance_feature');
                                        if ($is_advance_feature[0] == 1) {
                                    ?>
                                    <div class="form-group">
                                        <label class="col-md-2 control-label" for="extra_options"></label>

                                        <div class="col-md-10">
                                            <a class="btn default dropdown-toggle advance_options" href="javascript:" data-toggle="dropdown" alt="options_1">
                                                <span class="current-font">Advance options</span>
                                                <b class="caret"></b>
                                            </a>    
                                        </div>
                                    </div>

                                    <div class="" id="options_1">

                                        <div class="form-group">
                                            <label class="col-md-2 control-label" for="dm">DM</label>
                                            <div class="col-md-10">
                                                <textarea class="form-control full-width" name="field_dm" value="field_dm" rows="3">{{{ Input::old('detail_c_el', $page->detail_dm) }}}</textarea>
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label class="col-md-2 control-label" for="dm">Next Step</label>
                                            <div class="col-md-10">
                                                <textarea class="form-control full-width" name="field_ns" value="field_ns" rows="3">{{{ Input::old('detail_c_el', $page->detail_ns) }}}</textarea>
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label class="col-md-2 control-label" for="dm">C of EL</label>
                                            <div class="col-md-10">
                                                <textarea class="form-control full-width" name="field_c_el" value="field_c_el" rows="3">{{{ Input::old('detail_c_el', $page->detail_c_el) }}}</textarea>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="col-md-2 control-label" for="band">Band</label>
                                            <div class="col-md-10">
                                                <select class="form-control"  name="band" id="band">
                                                    <option value="">Select Band</option>
                                                    <option  value="birth-11" <?php echo (isset($page->band) && $page->band == "birth-11") ? 'selected=""' : ''; ?> >Birth – 11</option>
                                                    <option value="8-20m" <?php echo (isset($page->band) && $page->band == "8-20m") ? 'selected=""' : ''; ?>>8-20 Months</option>
                                                    <option value="16-26m" <?php echo (isset($page->band) && $page->band == "16-26m") ? 'selected=""' : ''; ?>>16-26 Months</option>
                                                    <option value="22-36m" <?php echo (isset($page->band) && $page->band == "22-36m") ? 'selected=""' : ''; ?>>22-36 Months</option>
                                                    <option value="30-50m" <?php echo (isset($page->band) && $page->band == "30-50m") ? 'selected=""' : ''; ?>>30-50 Months</option>
                                                    <option value="40-60+m" <?php echo (isset($page->band) && $page->band == "40-60+m") ? 'selected=""' : ''; ?>>40-60+ Months</option>
                                                    <option value="goal" <?php echo (isset($page->band) && $page->band == "goal") ? 'selected=""' : ''; ?>>GOAL</option>
                                                </select>
                                            </div>
                                        </div>


                                    </div>
                                    <?php }?>
                                    <!-- ./ description -->
                                    <!-- . Audio -->
                                    <div class="form-group">
                                        <label class="col-md-2 control-label" >Uploaded Audio</label>
                                        <div class="col-md-10">
                                            <?php
                                            foreach ($p_i_v_r as $p_i_v) {
                                                ?>
                                                <div id="div_{{{$p_i_v->id}}}" class="ajax-file-upload-statusbar" style="width:300px;float:left;">
                                                    <div class="ajax-file-upload-image">
                                                        <video width="290" height="170" controls>
                                                            <source src="{{ ($p_i_v->path) }}" type="video/mp4">
                                                            Your browser does not support the Audio tag.
                                                        </video>

                                                    </div>
                                                    <div class="ajax-file-upload-red delete_div" id="del_{{{$p_i_v->id}}}">Delete</div>
                                                    <a href="/download/{{{$p_i_v->id}}}" class="btn btn-sm blue">Download</a>
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
                                                <div id="audiomulitplefileuploader">Upload</div>
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
                                                    <a href="/wtadmin/pages/file_listing/{{{$oldhash}}}/audio" class="iframe_list btn btn-large blue" id="audiomulitplefileuploader_exist">Chose From Existing</a>
                                                </span>

                                                <input class="form-control" type="hidden" name="audio_path_exist" id="audio_path_exist" value="{{{ Input::old('audio_path_exist') }}}" />
                                                {{ $errors->first('audio_path_exist', '<span class="help-block">:message</span>') }}
                                            </div>
                                        </div>
                                        <div class="form-group {{{ $errors->has('audio_path_exist') ? 'has-error' : '' }}}">
                                            <div class="col-md-10">
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
                                    <!--                                    @include('form_notifications')-->
                                    <div class="form-group">
                                        <div class="col-md-offset-2 col-md-10">
                                            <button class="btn btn-sm red close_popup">Cancel</button>
                                            <button type="reset" class="btn btn-sm default">Reset</button>
                                            <button type="button" id="audio_submit"  class="btn btn-sm green">Save Content</button>
                                        </div>
                                    </div>

                                    <!-- ./ form actions -->
                                </form>
                                <?php
                                $is_comment = Session::get('is_comment_allow');
                                if ($is_comment[0] == 1) {
                                    ?>
                                    <!-- List Comments -->
                                    <!-- List Comments -->
                                    <div id="c_s_im_ro" style="display: none" class="alert alert-success alert-block">
                                        <button type="button" class="close" data-dismiss="alert">&times;</button>
                                        <h4>Success</h4>
                                        <span id="s_msg">Comments Delete Successfully.</span>
                                    </div>

                                    <div id="c_e_im_ro" style="display: none" class="alert alert-danger alert-block">
                                        <button type="button" class="close" data-dismiss="alert">&times;</button>
                                        <h4>Error</h4>
                                        <span id="e_msg">Error occurred on comments deletion.</span>
                                    </div>
                                    <section id="comments">
                                        <h1>Comments</h1>
                                        <p class="commentCount">(showing {{{sizeof($comments)}}} comments)</p>
                                        <?php
                                        if (sizeof($comments) > 0) {
                                            ?>
                                            <ol>
                                                <?php foreach ($comments as $comm) { ?>
                                                    <li class="adminComment" id="cmt-<?php echo $comm['id']; ?>">
                                                        <p class="commentInfo"><?php echo $comm['username']; ?>.<small class="commentDateStamp"><?php echo date('d/m/Y @ H:m:s a', strtotime($comm['created_at'])); ?></small></p>
                                                        <div class="comment">
                                                            <p>
                                                                <?php echo $comm['content']; ?>
                                                            </p>
                                                        </div>
                                                        <?php
                                                        if ($comm['user_id'] == Auth::user()->id || Auth::user()->hasRole("admin")) {
                                                            ?>
                                                            <span data-id="{{{$comm['id']}}}" data-link="/wtadmin/comments/<?php echo $comm['id']; ?>/delete/view" class="del_comm btn btn-xs btn-sm red">{{{ Lang::get('button.delete') }}}</span>
                                                            <?php
                                                        }
                                                        ?>
                                                    </li>
                                                <?php } ?>

                                            </ol>
                                        <?php } ?>
                                    </section>

                                    <!-- ./ List Comments -->
                                <?php } ?>
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
                                    <input type="hidden" name="img_cat_id" id="img_cat_id" value="{{{$category_id}}}" />
                                    <input type="hidden" name="img_hash" id="img_hash" value="{{{$oldhash}}}" />
                                    <input type="hidden" name="page_status" id="page_status" value="{{{$page->status}}}" />
                                    <!-- ./ csrf token -->



                                    <!-- Status -->
                                    <div class="form-group {{{ $errors->has('img_status') ? 'has-error' : '' }}}">
                                        <label class="col-md-2 control-label" for="img_status">Status</label>
                                        <div class="col-md-10">
                                            <input type="button" {{{ ($page->status==1)? 'disabled=""':'' }}} class="btn btn-success paction" data="1" name="btn_approve" value="Approved" />
                                            <input type="button" {{{ ($page->status==2)? 'disabled=""':'' }}} class="btn btn-warning paction" data="2" name="btn_review" value="Being Reviewed" />
                                            <input type="button" {{{ ($page->status==3)? 'disabled=""':'' }}} class="btn red paction" data="3" name="btn_waiting" value="Awaiting Review" />
                    <!--                        <select class="form-control"  name="img_status" id="img_status">
                                                <option value="1"  {{{ ($page->status==1)? 'selected=""':'' }}}>Approved</option>
                                                <option value="2" {{{ ($page->status==2)? 'selected=""':'' }}}>Being Reviewed</option>
                                                <option value="3" {{{ ($page->status==3)? 'selected=""':'' }}}>Awaiting Review</option>
                                            </select>-->
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
                                    <!-- ./ name -->
                                    <!-- description -->
                                    <div class="form-group {{{ $errors->has('img_description') ? 'has-error' : '' }}}">
                                        <label class="col-md-2 control-label" for="img_description">Detail</label>
                                        <div class="col-md-10">
                                            <textarea class="form-control full-width wysihtml5" name="img_description" value="img_description" rows="5">{{{ Input::old('img_description', $page->description) }}}</textarea>
                                            {{ $errors->first('img_description', '<span class="help-block">:message</span>') }}
                                        </div>
                                    </div>
                                    <!-- ./ description -->
                                    <?php
                                        $is_advance_feature = Session::get('is_advance_feature');
                                        if ($is_advance_feature[0] == 1) {
                                    ?>
                                    <div class="form-group">
                                        <label class="col-md-2 control-label" for="extra_options"></label>

                                        <div class="col-md-10">
                                            <a class="btn default dropdown-toggle advance_options" href="javascript:" data-toggle="dropdown" alt="options_2">
                                                <span class="current-font">Advance options</span>
                                                <b class="caret"></b>
                                            </a>    
                                        </div>
                                    </div>

                                    <div class="" id="options_2">

                                        <div class="form-group">
                                            <label class="col-md-2 control-label" for="dm">DM</label>
                                            <div class="col-md-10">
                                                <textarea class="form-control full-width" name="field_dm" value="field_dm" rows="3">{{{ Input::old('detail_c_el', $page->detail_dm) }}}</textarea>
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label class="col-md-2 control-label" for="dm">Next Step</label>
                                            <div class="col-md-10">
                                                <textarea class="form-control full-width" name="field_ns" value="field_ns" rows="3">{{{ Input::old('detail_c_el', $page->detail_ns) }}}</textarea>
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label class="col-md-2 control-label" for="dm">C of EL</label>
                                            <div class="col-md-10">
                                                <textarea class="form-control full-width" name="field_c_el" value="field_c_el" rows="3">{{{ Input::old('detail_c_el', $page->detail_c_el) }}}</textarea>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="col-md-2 control-label" for="band">Band</label>
                                            <div class="col-md-10">
                                                <select class="form-control"  name="band" id="band">
                                                    <option value="">Select Band</option>
                                                    <option  value="birth-11" <?php echo (isset($page->band) && $page->band == "birth-11") ? 'selected=""' : ''; ?> >Birth – 11</option>
                                                    <option value="8-20m" <?php echo (isset($page->band) && $page->band == "8-20m") ? 'selected=""' : ''; ?>>8-20 Months</option>
                                                    <option value="16-26m" <?php echo (isset($page->band) && $page->band == "16-26m") ? 'selected=""' : ''; ?>>16-26 Months</option>
                                                    <option value="22-36m" <?php echo (isset($page->band) && $page->band == "22-36m") ? 'selected=""' : ''; ?>>22-36 Months</option>
                                                    <option value="30-50m" <?php echo (isset($page->band) && $page->band == "30-50m") ? 'selected=""' : ''; ?>>30-50 Months</option>
                                                    <option value="40-60+m" <?php echo (isset($page->band) && $page->band == "40-60+m") ? 'selected=""' : ''; ?>>40-60+ Months</option>
                                                    <option value="goal" <?php echo (isset($page->band) && $page->band == "goal") ? 'selected=""' : ''; ?>>GOAL</option>
                                                </select>
                                            </div>
                                        </div>


                                    </div>
                                    <?php }?>
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

                                                    <div class="ajax-file-upload-image">                                                        
                                                        <img data-id="{{{$p_i_v->id}}}" style="margin:auto;width:100%;height:290px"  data-value="0" id="v_file_{{{$p_i_v->id}}}" width="250" height="250" src="{{ ($p_i_v->path) }}">
                                                    </div>
                                                    <br />
                                                    <div class="btn btn-sm red ajax-file-upload-red delete_div" id="del_{{{$p_i_v->id}}}">Delete</div>
                                                    <a href="/download/{{{$p_i_v->id}}}" class="btn btn-sm blue">Download</a>
                                                    <!--<div data-id="{{{$p_i_v->id}}}" class="right_content btn btn-success">Right</div>-->
                                                    <div data-id="{{{$p_i_v->id}}}" class="rotate_content btn btn-sm default">Rotate</div>
                                                </div>
                                                <?php
                                            }
                                            ?>

                                        </div>
                                    </div>
                                    <?php if ($flag_size) { ?>
                                        <div class="form-group {{{ $errors->has('img_path') ? 'has-error' : '' }}}">
                                            <label class="col-md-2 control-label" for="img_path">Image</label>
                                            <div class="col-md-10">
                                                <input type="hidden" name="preview_image" id="preview_image" value="" />
                                                <div id="imgmulitplefileuploader">Upload</div>
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

                                        <!-- . Chose Existing-->
                                        <div class="form-group {{{ $errors->has('img_path_exist') ? 'has-error' : '' }}}">
                                            <label class="col-md-2 control-label" for="img_path_exist">Existing Images</label>
                                            <div class="col-md-10">
                                                <span id="img_uploader_div_exist">
                                                    <a href="/wtadmin/pages/file_listing/{{{$oldhash}}}/image" class="iframe_list btn btn-large btn-sm blue" id="imgmulitplefileuploader_exist">Chose From Existing</a>
                                                </span>

                                                <input class="form-control" type="hidden" name="img_path_exist" id="img_path_exist" value="{{{ Input::old('img_path_exist') }}}" />
                                                {{ $errors->first('img_path_exist', '<span class="help-block">:message</span>') }}
                                            </div>
                                        </div>
                                        <div class="form-group {{{ $errors->has('img_path_exist') ? 'has-error' : '' }}}">
                                            <div class="col-md-10">
                                                <span id="img_te_exist"></span>
                                            </div>
                                        </div>
                                    <?php } ?>
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
                                    <!--                                    @include('form_notifications')-->
                                    <div class="form-group">
                                        <div class="col-md-offset-2 col-md-10">
                                            <button class="btn btn-sm red close_popup">Cancel</button>
                                            <button type="reset" class="btn btn-sm default">Reset</button>
                                            <button type="button" id="img_submit" class="btn btn-sm green">Save Content</button>
                                        </div>
                                    </div>
                                    <!-- ./ form actions -->
                                </form>
                                <?php
                                $is_comment = Session::get('is_comment_allow');
                                if ($is_comment[0] == 1) {
                                    ?>
                                    <!-- List Comments -->
                                    <!-- List Comments -->
                                    <div id="c_s_im_ro" style="display: none" class="alert alert-success alert-block">
                                        <button type="button" class="close" data-dismiss="alert">&times;</button>
                                        <h4>Success</h4>
                                        <span id="s_msg">Comments Delete Successfully.</span>
                                    </div>

                                    <div id="c_e_im_ro" style="display: none" class="alert alert-danger alert-block">
                                        <button type="button" class="close" data-dismiss="alert">&times;</button>
                                        <h4>Error</h4>
                                        <span id="e_msg">Error occurred on comments deletion.</span>
                                    </div>
                                    <section id="comments">
                                        <h1>Comments</h1>
                                        <p class="commentCount">(showing {{{sizeof($comments)}}} comments)</p>
                                        <?php
                                        if (sizeof($comments) > 0) {
                                            ?>
                                            <ol>
                                                <?php foreach ($comments as $comm) { ?>
                                                    <li class="adminComment" id="cmt-<?php echo $comm['id']; ?>">
                                                        <p class="commentInfo"><?php echo $comm['username']; ?>.<small class="commentDateStamp"><?php echo date('d/m/Y @ H:m:s a', strtotime($comm['created_at'])); ?></small></p>
                                                        <div class="comment">
                                                            <p>
                                                                <?php echo $comm['content']; ?>
                                                            </p>
                                                        </div>
                                                        <?php
                                                        if ($comm['user_id'] == Auth::user()->id || Auth::user()->hasRole("admin")) {
                                                            ?>
                                                            <span data-id="{{{$comm['id']}}}" data-link="/wtadmin/comments/<?php echo $comm['id']; ?>/delete/view" class="del_comm btn btn-xs btn-sm red">{{{ Lang::get('button.delete') }}}</span>
                                                            <?php
                                                        }
                                                        ?>
                                                    </li>
                                                <?php } ?>

                                            </ol>
                                        <?php } ?>
                                    </section>

                                    <!-- ./ List Comments -->
                                <?php } ?>
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
                                    <input type="hidden" name="txt_cat_id" id="txt_cat_id" value="{{{$category_id}}}" />
                                    <input type="hidden" name="txt_hash" id="txt_hash" value="{{{$oldhash}}}" />
                                    <input type="hidden" name="page_status" id="page_status" value="{{{$page->status}}}" />
                                    <!-- ./ csrf token -->
                                    <!-- Status -->
                                    <div class="form-group {{{ $errors->has('txt_status') ? 'has-error' : '' }}}">
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
                                    <!-- ./ name -->

                                    <!-- description -->
                                    <div class="form-group {{{ $errors->has('description') ? 'has-error' : '' }}}">
                                        <label class="col-md-2 control-label" for="description">Detail</label>
                                        <div class="col-md-10">
                                            <textarea class="form-control full-width wysihtml5" name="description" value="description" rows="10">{{{ Input::old('description', $page->description) }}}</textarea>
                                            {{ $errors->first('description', '<span class="help-block">:message</span>') }}
                                        </div>
                                    </div>

                                     <?php
                                        $is_advance_feature = Session::get('is_advance_feature');
                                        if ($is_advance_feature[0] == 1) {
                                    ?>
                                    <div class="form-group">
                                        <label class="col-md-2 control-label" for="extra_options"></label>

                                        <div class="col-md-10">
                                            <a class="btn default dropdown-toggle advance_options" href="javascript:" data-toggle="dropdown" alt="options_3">

                                                <span class="current-font">Advance options</span>
                                                <b class="caret"></b>
                                            </a>    
                                        </div>
                                    </div>

                                    <div class="" id="options_3">

                                        <div class="form-group">
                                            <label class="col-md-2 control-label" for="dm">DM</label>
                                            <div class="col-md-10">
                                                <textarea class="form-control full-width" name="field_dm" value="field_dm" rows="3">{{{ Input::old('detail_c_el', $page->detail_dm) }}}</textarea>
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label class="col-md-2 control-label" for="dm">Next Step</label>
                                            <div class="col-md-10">
                                                <textarea class="form-control full-width" name="field_ns" value="field_ns" rows="3">{{{ Input::old('detail_c_el', $page->detail_ns) }}}</textarea>
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label class="col-md-2 control-label" for="dm">C of EL</label>
                                            <div class="col-md-10">
                                                <textarea class="form-control full-width" name="field_c_el" value="field_c_el" rows="3">{{{ Input::old('detail_c_el', $page->detail_c_el) }}}</textarea>
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label class="col-md-2 control-label" for="band">Band</label>
                                            <div class="col-md-10">
                                                <select class="form-control"  name="band" id="band">
                                                    <option value="">Select Band</option>
                                                    <option  value="birth-11" <?php echo (isset($page->band) && $page->band == "birth-11") ? 'selected=""' : ''; ?> >Birth – 11</option>
                                                    <option value="8-20m" <?php echo (isset($page->band) && $page->band == "8-20m") ? 'selected=""' : ''; ?>>8-20 Months</option>
                                                    <option value="16-26m" <?php echo (isset($page->band) && $page->band == "16-26m") ? 'selected=""' : ''; ?>>16-26 Months</option>
                                                    <option value="22-36m" <?php echo (isset($page->band) && $page->band == "22-36m") ? 'selected=""' : ''; ?>>22-36 Months</option>
                                                    <option value="30-50m" <?php echo (isset($page->band) && $page->band == "30-50m") ? 'selected=""' : ''; ?>>30-50 Months</option>
                                                    <option value="40-60+m" <?php echo (isset($page->band) && $page->band == "40-60+m") ? 'selected=""' : ''; ?>>40-60+ Months</option>
                                                    <option value="goal" <?php echo (isset($page->band) && $page->band == "goal") ? 'selected=""' : ''; ?>>GOAL</option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                    <?php }?>


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
                                                    <div  class="ajax-file-upload-image">
                                                        <a href="{{ asset($p_i_v->path) }}" >{{{$i}}}<img width="50" height="50"  src="/doc.png" />{{{$p_i_v->file_name}}}</a>
                                                    </div>
                                                    <div class="ajax-file-upload-red delete_div" id="del_{{{$p_i_v->id}}}">Delete</div>
                                                    <a href="/download/{{{$p_i_v->id}}}" class="btn btn-sm blue">Download</a>
                                                </div>

                                                <?php
                                            }
                                            ?>

                                        </div>
                                    </div>
                                    <!-- . Document-->
                                    <?php if ($flag_size) { ?>
                                        <div class="form-group {{{ $errors->has('doc_path') ? 'has-error' : '' }}}">
                                            <label class="col-md-2 control-label" for="doc_path">Documents</label>
                                            <div class="col-md-10">
                                                <span id="doc_uploader_div">
                                                    <div id="docmulitplefileuploader">Upload</div>
                                                </span>

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
                                        <!-- . Chose Existing-->
                                        <div class="form-group {{{ $errors->has('doc_path_exist') ? 'has-error' : '' }}}">
                                            <label class="col-md-2 control-label" for="doc_path_exist">Existing Documents</label>
                                            <div class="col-md-10">
                                                <span id="doc_uploader_div_exist">
                                                    <a href="/wtadmin/pages/file_listing/{{{$oldhash}}}/doc" class="iframe_list btn btn-large btn-sm blue" id="docmulitplefileuploader_exist">Chose From Existing</a>
                                                </span>

                                                <input class="form-control" type="hidden" name="doc_path_exist" id="doc_path_exist" value="{{{ Input::old('doc_path_exist') }}}" />
                                                {{ $errors->first('doc_path_exist', '<span class="help-block">:message</span>') }}
                                            </div>
                                        </div>
                                        <div class="form-group {{{ $errors->has('doc_path_exist') ? 'has-error' : '' }}}">
                                            <div class="col-md-10">
                                                <span id="doc_te_exist"></span>
                                            </div>
                                        </div>
                                    <?php } ?>
                                    <!-- ./ Chose Existing-->
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
                                    <!--                                    @include('form_notifications')-->
                                    <div class="form-group">
                                        <div class="col-md-offset-2 col-md-10">
                                            <button class="btn btn-sm red close_popup">Cancel</button>
                                            <button type="reset" class="btn btn-sm default">Reset</button>
                                            <button type="button" id="doc_submit" class="btn btn-sm green">Save Content</button>
                                        </div>
                                    </div>
                                    <!-- ./ form actions -->
                                </form>
                                <?php
                                $is_comment = Session::get('is_comment_allow');
                                if ($is_comment[0] == 1) {
                                    ?>
                                    <!-- List Comments -->
                                    <!-- List Comments -->
                                    <div id="c_s_im_ro" style="display: none" class="alert alert-success alert-block">
                                        <button type="button" class="close" data-dismiss="alert">&times;</button>
                                        <h4>Success</h4>
                                        <span id="s_msg">Comments Delete Successfully.</span>
                                    </div>

                                    <div id="c_e_im_ro" style="display: none" class="alert alert-danger alert-block">
                                        <button type="button" class="close" data-dismiss="alert">&times;</button>
                                        <h4>Error</h4>
                                        <span id="e_msg">Error occurred on comments deletion.</span>
                                    </div>
                                    <section id="comments">
                                        <h1>Comments</h1>
                                        <p class="commentCount">(showing {{{sizeof($comments)}}} comments)</p>
                                        <?php
                                        if (sizeof($comments) > 0) {
                                            ?>
                                            <ol>
                                                <?php foreach ($comments as $comm) { ?>
                                                    <li class="adminComment" id="cmt-<?php echo $comm['id']; ?>">
                                                        <p class="commentInfo"><?php echo $comm['username']; ?>.<small class="commentDateStamp"><?php echo date('d/m/Y @ H:m:s a', strtotime($comm['created_at'])); ?></small></p>
                                                        <div class="comment">
                                                            <p>
                                                                <?php echo $comm['content']; ?>
                                                            </p>
                                                        </div>
                                                        <?php
                                                        if ($comm['user_id'] == Auth::user()->id || Auth::user()->hasRole("admin")) {
                                                            ?>
                                                            <span data-id="{{{$comm['id']}}}" data-link="/wtadmin/comments/<?php echo $comm['id']; ?>/delete/view" class="del_comm btn btn-xs btn-sm red">{{{ Lang::get('button.delete') }}}</span>
                                                            <?php
                                                        }
                                                        ?>
                                                    </li>
                                                <?php } ?>

                                            </ol>
                                        <?php } ?>
                                    </section>

                                    <!-- ./ List Comments -->
                                <?php } ?>
                            </div>
                            <!-- ./ tab Text -->

                        <?php } ?>



                    </div>
                    <!-- ./ tab general -->

                </div>
                <!-- ./ tabs content -->
            </div>
        </div>
    </div>
    <!-- ./ portlet body -->
</div>
@stop
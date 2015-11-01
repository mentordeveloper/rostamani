@extends('site.layouts.view_modal')
{{-- Content --}}
@section('content')

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

<!-- Tabs -->
<ol class="breadcrumb">
    <li> <a class="" target="_parent" href="{{{ URL::to('wtadmin/') }}}">Home</a></li>
</ol>

<!-- ./ tabs -->

{{-- Edit Content Form --}}

<!-- Tabs Content -->
<div class="tab-content">
    <!-- Tab General -->
    <div class="col-lg-12 tab-pane active">
        <!-- Tab Student Wise-->
        <div class="tab-pane1 form-horizontal" id="tab-student">

            <!-- View File -->
            
<div class="form-group"><div class="col-md-2"></div>
                <div class="col-md-10">

                </div>
            </div>

            <?php
            if ($type == 'Video') {
                ?>
                <div class="form-group">
                    <div class="col-md-2"></div>
                    <div class="col-md-10">
                        <div id="div_{{{$imv->id}}}" class="view_file_div" >
                            <div class="view_file">
                                <video width="500"  controls>
                                    <source src="{{ asset($imv->path) }}" type="video/mp4">
                                    Your browser does not support the video tag.
                                </video>

                            </div>


                        </div>       
                    </div>
                </div>
                <?php
            } elseif ($type == 'Audio') {
                ?>
                <div class="form-group">
                    <div class="col-md-2"></div>
                    <div class="col-md-10">
                        <div id="div_{{{$imv->id}}}" class="view_file_div" >
                            <div class="view_file">
                                <video width="500"  controls>
                                    <source src="{{ asset($imv->path) }}" type="video/mp4">
                                    Your browser does not support the video tag.
                                </video>

                            </div>

                        </div>    
                    </div>
                </div>
                <?php
            } elseif ($type == 'Image') {
                ?>
            <div class="form-group"><div class="col-md-10"></div>
                <div class="col-md-2">
                    <!--<span id="save_image" class="btn btn-lg btn-success">Save</span>-->
                </div>
            </div>
                <div class="form-group">
                    <div class="col-md-2">
                        <div class="">
                            <!--<span class="right btn btn-success">Right</span>-->
                        </div>
                    </div>
                    <div class="col-md-8">
                        <div id="div_{{{$imv->id}}}" class="view_file_div">
                            <div id="v_file_div" class="view_file">
                                <img id="v_file" width="500" height="500" title="{{{$imv->file_name}}}" src="{{ asset($imv->path) }}">
                            </div>
                        </div>
                    </div>
                    <div class="col-md-2"><div class=""><span class="left btn btn-default">Rotate</span></div></div>
                </div>
                <?php
            } elseif ($type == 'Text/Document') {
                ?>
                <div class="form-group">
                    <div class="col-md-2"></div>
                    <div class="col-md-10">
                        <div id="div_{{{$imv->id}}}" class="view_doc_file" >
                            <div class="view_doc">
                                <a href="{{ asset($imv->path) }}" ><img width="50" height="50"  src="/doc.png" />{{{$imv->file_name}}}</a>
                            </div>
                        </div>

                    </div>
                </div>
                <?php
            }
            ?><br />
            <div class="btn btn-link">{{{$imv->file_name}}}</div>


            <!-- View File -->

            <div class="form-group"></div>
        </div>
        <!-- Tab Student Wise-->
    </div>
</div>
<!-- ./ tabs content -->
@stop
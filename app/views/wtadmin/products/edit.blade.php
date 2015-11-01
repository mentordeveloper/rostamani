@extends('wtadmin.layouts.modal')

{{-- Content --}}
@section('content')

<ol class="breadcrumb">
    <li> <a class="" target="_parent" href="{{{ URL::to('sadmin/') }}}">Home</a></li>
    <li> <a class="" target="_parent" href="{{{ URL::to('sadmin/products/') }}}">Product Management</a></li>
    <?php if(!$option){ ?>
    <li> <a class="" target="_parent" href="{{{ URL::to('wtadmin/categories/') }}}">Category Management</a></li>
    <!--<li> <a class="" target="_parent" href="{{{ URL::to('wtadmin/pages/'.$category_id) }}}">{{{ $con_title }}}</a></li>-->
    <?php }?>
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
    <?php
$timestamp = time();
$hash = md5('unique_salt' . $timestamp);
?>
<input type="hidden" name="timestamp" id="timestamp" value="<?php echo $timestamp; ?>" />
<input type="hidden" name="hash" id="hash" value="<?php echo $product->hash; ?>" />
    <input type="hidden" name="_token" value="{{{ csrf_token() }}}" />
    <input type="hidden" id="sub_categories_link" name="sub_categories_link" value="{{ URL::to('sadmin/products/sub_categories') }}" />
    <input type="hidden" id="sub_size_link" name="sub_size_link" value="{{ URL::to('sadmin/products/sub_sizes') }}" />
    <!-- ./ csrf token -->

    <!-- Tabs Content -->
    <div class="tab-content">
        <!-- Tab General -->
        <div class="tab-pane active" id="tab-general">
            
            <!-- Name -->
            <div class="form-group {{{ $errors->has('name') ? 'error' : '' }}}">
                <label class="col-md-2 control-label" for="name">Name</label>
                <div class="col-md-10">
                    <input class="form-control" type="text" name="name" id="name" value="{{{ $product->name }}}" />
                    {{ $errors->first('name', '<span class="help-inline">:message</span>') }}
                </div>
            </div>
            <!-- ./ name -->
            
            <!-- categories-->
            <div class="form-group {{{ $errors->has('parent_category') ? 'error' : '' }}}">
                <label class="col-md-2 control-label" for="parent_category">Categories</label>
                <div class="col-md-10">
                    <input type="hidden" name="parent_cate_hidden" id="parent_cate_hidden" value="{{{Input::old('parent_category')}}}" />
                    <select class="form-control"  name="parent_category" id="parent_cate">
                        <option value="">Select Category</option>
                        @foreach ($parent_category as $cate)
                        <option value="{{{ $cate->id }}}" {{{ (Input::old('parent_category',$product->cat_id)==$cate->id )?"selected=''":"" }}}>{{{ $cate->cat_name }}}</option>
                        @endforeach
                    </select>
                    {{ $errors->first('parent_category', '<span class="help-inline">:message</span>') }}
                </div>
            </div>
            <!-- ./ categories-->
            <!-- Sub categories-->
            <div class="form-group {{{ $errors->has('sub_category') ? 'error' : '' }}}">
                <label class="col-md-2 control-label" for="sub_category">Sub Categories</label>
                <div class="col-md-10">
                    <input type="hidden" name="sub_cate_hidden" id="sub_cate_hidden" value="{{{Input::old('sub_category')}}}" />
                    <select class="form-control"  name="sub_category" id="sub_cate">
                        <option value="">Select Sub Category</option>
                        @foreach ($category as $sub_cate)
                        <option value="{{{ $sub_cate->id }}}" {{{ (Input::old('sub_category',$product->sub_cat_id)==$sub_cate->id )?"selected=''":"" }}}>{{{ $sub_cate->cat_name }}}</option>
                        @endforeach
                    </select>
                    {{ $errors->first('sub_category', '<span class="help-inline">:message</span>') }}
                </div>
            </div>
            <!-- ./ categories-->
            <!-- Technical Specification  -->
            <div class="form-group {{{ $errors->has('lumen') ? 'error' : '' }}}">
                <label class="col-md-2 control-label" for="lumen">Lumen or Link</label>
                <div class="col-md-10">
                    <input class="form-control" placeholder="Lumen or Electrical Product Link" type="text" name="lumen" id="lumen" value="{{{ Input::old('lumen',(isset($product_spec->lumen)?$product_spec->lumen:'')) }}}" />
                    {{ $errors->first('lumen', '<span class="help-inline">:message</span>') }}
                </div>
            </div>
            <div class="form-group {{{ $errors->has('beam_angle') ? 'error' : '' }}}">
                <label class="col-md-2 control-label" for="beam_angle">Beam Angle</label>
                <div class="col-md-10">
                    <input class="form-control" type="text" name="beam_angle" id="beam_angle" value="{{{ Input::old('beam_angle',(isset($product_spec->beam_angle)?$product_spec->beam_angle:'')) }}}" />
                    {{ $errors->first('beam_angle', '<span class="help-inline">:message</span>') }}
                </div>
            </div>
            <div class="form-group {{{ $errors->has('move_angle') ? 'error' : '' }}}">
                <label class="col-md-2 control-label" for="move_angle">Moveable Angle</label>
                <div class="col-md-10">
                    <input class="form-control" type="text" name="move_angle" id="move_angle" value="{{{ Input::old('move_angle',(isset($product_spec->move_angle)?$product_spec->move_angle:'')) }}}" />
                    {{ $errors->first('move_angle', '<span class="help-inline">:message</span>') }}
                </div>
            </div>
            <div class="form-group {{{ $errors->has('body_size') ? 'error' : '' }}}">
                <label class="col-md-2 control-label" for="body_size">Lamp Body Size</label>
                <div class="col-md-10">
                    <input class="form-control" type="text" name="body_size" id="body_size" value="{{{ Input::old('body_size',(isset($product_spec->body_size)?$product_spec->body_size:'')) }}}" />
                    {{ $errors->first('body_size', '<span class="help-inline">:message</span>') }}
                </div>
            </div>
            <div class="form-group {{{ $errors->has('hole_size') ? 'error' : '' }}}">
                <label class="col-md-2 control-label" for="hole_size">Hole Size</label>
                <div class="col-md-10">
                    <input class="form-control" type="text" name="hole_size" id="hole_size" value="{{{ Input::old('hole_size',(isset($product_spec->hole_size)?$product_spec->hole_size:'')) }}}" />
                    {{ $errors->first('hole-size', '<span class="help-inline">:message</span>') }}
                </div>
            </div>
            <div class="form-group {{{ $errors->has('material') ? 'error' : '' }}}">
                <label class="col-md-2 control-label" for="material">Material</label>
                <div class="col-md-10">
                    <input class="form-control" type="text" name="material" id="material" value="{{{ Input::old('material',(isset($product_spec->material)?$product_spec->material:'')) }}}" />
                    {{ $errors->first('material', '<span class="help-inline">:message</span>') }}
                </div>
            </div>
            <div class="form-group {{{ $errors->has('color') ? 'error' : '' }}}">
                <label class="col-md-2 control-label" for="color">Color</label>
                <div class="col-md-10">
                    <input class="form-control" type="text" name="color" id="color" value="{{{ Input::old('color',(isset($product_spec->color)?$product_spec->color:'')) }}}" />
                    {{ $errors->first('color', '<span class="help-inline">:message</span>') }}
                </div>
            </div>
            <div class="form-group {{{ $errors->has('short_description') ? 'has-error' : '' }}}">
                <label class="col-md-2 control-label" for="short_description">Short Description</label>
                <div class="col-md-10">
                    <textarea class="form-control full-width wysihtml5" name="short_description" id="short_description" rows="5">{{{ Input::old('short_description', isset($product->slug) ? $product->slug : null) }}}</textarea>
                    {{ $errors->first('short_description', '<span class="help-block">:message</span>') }}
                </div>
            </div>

            <!-- ./ Technical Specification -->
            <!-- Image -->
             <div class="form-group {{{ $errors->has('product_image') ? 'error' : '' }}}">
                <label class="col-md-2 control-label" for="is_active">Image</label>
                <div class="col-md-10">
                    <input type="file" id="product_image" name="product_image" class="file-control" />       
                    {{ $errors->first('product_image', '<span class="help-inline">:message</span>') }}
                    @if(!empty($product->thumb_image))
                    <img alt="productImage" src="{{{$product->image}}}" width="350"   class="custom-manager" />
                    @endif
                </div>
            </div>
            <!-- ./ Image -->
            <!-- Image -->
             <div class="form-group {{{ $errors->has('product_catalog') ? 'error' : '' }}}">
                <label class="col-md-2 control-label" for="product_catalog">Catalog</label>
                <div class="col-md-10">
                    <input type="file" id="product_catalog" name="product_catalog" class="file-control" />       
                    {{ $errors->first('product_catalog', '<span class="help-inline">:message</span>') }}
                    @if(!empty($product->product_catalog))
                    <a href="{{$product->product_catalog}}">{{$product->name}} Catalog</a>
                    @endif
                </div>
            </div>
            <!-- ./ Image -->
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
           
        </div>
        <!-- ./ tab general -->


    </div>
    <!-- ./ tabs content -->

    <!-- Form Actions -->
    <div class="form-group">
        <div class="col-md-offset-2 col-md-10">
            <element class="btn btn-danger btn-cancel close_popup">Cancel</element>
            <button type="reset" class="btn btn-default">Reset</button>
            <button type="submit" class="btn btn-success">Update Product</button>
        </div>
    </div>
    <!-- ./ form actions -->
</form>
@stop

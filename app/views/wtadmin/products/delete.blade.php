@extends('wtadmin.layouts.modal')

{{-- Content --}}
@section('content')

    <!-- Tabs -->
        
    <!-- ./ tabs -->
    {{-- Delete Grade Form --}}
    <form id="deleteForm" class="form-horizontal" method="post" action="@if (isset($permission)){{ URL::to('wtadmin/products/' . $product->id . '/delete') }}@endif" autocomplete="off">

        <!-- CSRF Token -->
        
        <div class="alert alert-warning">
          Are you sure you want to delete?
        </div>
        <input type="hidden" name="_token" value="{{{ csrf_token() }}}" />
        <input type="hidden" name="id" value="{{ $product->id }}" />
        <!-- <input type="hidden" name="_method" value="DELETE" /> -->
        <!-- ./ csrf token -->

        <!-- Form Actions -->
        <div class="col-lg-12">
            <div class="form-group">
                 <div class="controls">
                     <element class="btn btn-danger btn-cancel close_popup">Cancel</element>
                     <button type="submit" class="btn btn-danger ">Delete</button>
                </div>
            </div>
        </div>
        <!-- ./ form actions -->
    </form>
@stop
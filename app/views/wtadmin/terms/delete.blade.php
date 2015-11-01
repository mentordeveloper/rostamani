@extends('wtadmin.layouts.modal')

{{-- Content --}}
@section('content')
<ol class="breadcrumb">
    <li> <a class="" target="_parent" href="{{{ URL::to('sadmin/') }}}">Home</a></li>
    <li> <a class="last" target="_parent" href="{{{ URL::to('sadmin/store-terms/') }}}">Store Time Management</a></li>
    <li> {{{$title}}}</li>

</ol>
<!-- Tabs -->
     
    <!-- ./ tabs -->
    {{-- Delete Grade Form --}}
    <form id="deleteForm" class="form-horizontal" method="post" action="@if (isset($permission)){{ URL::to('sadmin/store-terms/' . $term->id . '/delete') }}@endif" autocomplete="off">

        <!-- CSRF Token -->
        
         <div class="alert alert-warning">
          Are you sure you want to delete?
         </div>
        <input type="hidden" name="_token" value="{{{ csrf_token() }}}" />
        <input type="hidden" name="id" value="{{ $term->id }}" />
        <!-- <input type="hidden" name="_method" value="DELETE" /> -->
        <!-- ./ csrf token -->
        <br />
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
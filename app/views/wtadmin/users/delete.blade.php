@extends('wtadmin.layouts.modal')

{{-- Content --}}
@section('content')
<ol class="breadcrumb">
    <li> <a class="" target="_parent" href="{{{ URL::to('wtadmin/') }}}">Home</a></li>
    <li> <a class="" target="_parent" href="{{{ URL::to('wtadmin/users') }}}">User Management</a></li>
    <li class="last"> 
        Delete User</li>
</ol>
<!-- Tabs -->
        
    <!-- ./ tabs -->

    {{-- Delete User Form --}}
    <form id="deleteForm" class="form-horizontal" method="post" action="@if (isset($user)){{ URL::to('wtadmin/users/' . $user->id . '/delete') }}@endif" autocomplete="off">
      <!-- CSRF Token -->
      
      <div class="alert alert-warning">
          Are you sure you want to delete?
      </div>
        <input type="hidden" name="_token" value="{{{ csrf_token() }}}" />
        <input type="hidden" name="id" value="{{ $user->id }}" />
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
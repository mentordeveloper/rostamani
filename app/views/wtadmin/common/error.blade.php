@extends('wtadmin.layouts.default')

{{-- Web site Title --}}
@section('title')
Driver:: {{{$title}}}
@parent
@stop

{{-- Content --}}
@section('content')
<div id="register_user">
    <a class="btn btn-info btn-new" href="{{ URL::to('/merchant') }}">Go Back</a>
    <button data-dismiss="alert" class="close" type="button"></button>
    <div class="panel panel-danger margin-top-20px"> 
    <!-- Default panel contents -->
    <div class="panel-heading">Error! Wrong Confirmation Code.</div>
    <div class="panel-body">
       <p><b>{{ Lang::get('confide::confide.email.account_confirmation.greetings', array( 'name' => 'User')) }},</b></p>
          <p>Wrong Confirmation Code!. This confirmation code is expired or wrong.</p>
    </div>
  </div>
</div>
@stop
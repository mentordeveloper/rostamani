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
    <div class="panel panel-success margin-top-20px"> 
    <!-- Default panel contents -->
    <div class="panel-heading">Success! Confirmation Completed</div>
    <div class="panel-body">
       <p><b>{{ Lang::get('confide::confide.email.account_confirmation.greetings', array( 'name' => $driver->dr_name)) }},</b></p>
          <!--<p>Your Account has been confirmed and your details was updated. Go On Login page and check your orders.</p>-->
          <p>Thank you for completing the application process! BoozRun's partnered retailer will reach out to you if a position is available.</p>
    </div>
  </div>
</div>
@stop
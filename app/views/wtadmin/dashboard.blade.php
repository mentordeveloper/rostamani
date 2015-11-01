@extends('wtadmin.layouts.default')

{{--@if (Auth::user()->hasRole("admin"))--}}
{{-- Web site Title --}}
@section('title')
{{{ $title }}} :: @parent
@stop

{{-- Content --}}
@section('content')
<br>
<div class="page-header" style="margin: 10px;border-bottom:none;">
    <b>{{{$con_title}}}</b>
</div>
<br>
<ol class="breadcrumb">
    <li> <a class="" target="_parent" href="{{{ URL::to('sadmin/') }}}">Home</a></li>
    <li> <a class="" target="_parent" href="{{{ URL::to('sadmin/') }}}">Dashboard</a></li>
</ol>
<div class="">
</div>
@stop

@stop

{{--@endif--}}
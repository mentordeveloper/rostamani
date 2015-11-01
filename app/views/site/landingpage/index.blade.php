@extends('site.layouts.landing')

{{-- Web site Title --}}
@section('title')

@stop
{{-- Content --}}
@section('index')
@parent
<!-- Slider (banners/video) --> 
@include('site.section.slider') 
<!-- ./ Slider --> 

<!-- Introduction AboutUs --> 

@include('site.section.about-us') 
<!-- ./ Introduction AboutUs-->

<!-- Products --> 
@include('site.section.products') 
<!-- ./ Products--> 

<!-- Partners --> 
@include('site.section.partners') 
<!-- ./ Partners--> 

<!-- Certificates --> 
@include('site.section.certificates') 
<!-- ./ Certificates-->


<!-- Projects --> 
@include('site.section.projects') 
<!-- ./ Projects-->

<!-- Special Static Pages --> 
@include('site.section.special') 
<!-- ./ Special Static Pages--> 

<!-- Google Map --> 
@include('site.section.map') 
<!-- ./ Google Map--> 
<!-- Before Footer --> 
@include('site.section.before-footer') 
<!-- ./ Before Footer--> 


@stop


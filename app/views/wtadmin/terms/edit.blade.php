@extends('wtadmin.layouts.modal')
{{-- Styles --}}
@section('styles')
<link href="{{asset('assets/timepicker/bootstrap-timepicker.min.css')}}" type="text/css" rel="stylesheet" />
@stop
{{-- Content --}}
@section('content')
<ol class="breadcrumb">
    <li> <a class="" target="_parent" href="{{{ URL::to('sadmin/') }}}">Home</a></li>
    <li> <a class="last" target="_parent" href="{{{ URL::to('sadmin/store-terms/') }}}">Store Time Management</a></li>
    <li> {{{$title}}}</li>

</ol>
<!-- Tabs -->
<ul class="nav nav-tabs">
    <li class="active"><a href="#tab-general" data-toggle="tab">General</a></li>
</ul>
<!-- ./ tabs -->

{{-- Edit Term Form --}}
<form class="form-horizontal" method="post" action="" autocomplete="off">
    <!-- CSRF Token -->
    <input type="hidden" name="_token" value="{{{ csrf_token() }}}" />
    <!-- ./ csrf token -->

    <!-- Tabs Content -->
    <div class="tab-content">
        <!-- General tab -->
        <div class="tab-pane active" id="tab-general">
            <!-- Name -->
            <div class="form-group {{{ $errors->has('day_name') ? 'error' : '' }}}">
                <label class="col-md-2 control-label" for="day_name">Name</label>
                    <div class="col-md-10">
                        <select class="form-control" name="day_name" id="day_name">
                            <option value="" selected="">Select Day</option>
                            @foreach($remain_days as $days)
                               <option value="{{{$days}}}" selected="">{{{$days}}}</option>
                            @endforeach
                        </select>
                        {{ $errors->first('day_name', '<span class="help-inline">:message</span>') }}
                    </div>

                
            </div>
            <!-- ./ name -->
            <!--  Valid Date To -->


            <div class="form-group {{{ $errors->has('start_time') || $errors->has('from_time') ? 'error' : '' }}}">
                <label class="col-md-2 control-label" for="start_time">Start Time</label>

                <div class="col-md-10">
                    <div class="bootstrap-timepicker">
                        <input id="timepicker3" name="start_time" value="{{{ Input::old('start_time', $term->start_time) }}}"  type="text" class="form-control">
                    </div>
                    {{ $errors->first('start_time', '<span class="help-inline">:message</span>') }}
                </div>
            </div>
            <!-- Valid Date To-->
            <div class="form-group {{{ $errors->has('end_time') ? 'error' : '' }}}">
                <label class="col-md-2 control-label" for="end_time">End Time</label>

                <div class="col-md-10">
                    <div class="bootstrap-timepicker">
                        <input id="timepicker2" name="end_time" value="{{{ Input::old('end_time', $term->end_time) }}}"  type="text" class="form-control">
                    </div>
                    {{ $errors->first('end_time', '<span class="help-inline">:message</span>') }}
                </div>

            </div>


            <!-- ./ Valid Date -->
            <!-- Status -->
            <div class="form-group {{{ $errors->has('is_active') ? 'error' : '' }}}">
                <label class="col-md-2 control-label" for="is_active">Is Active</label>
                <div class="col-md-10">
                    <select class="form-control"  name="is_active" id="is_active">
                        <option value="1" <?php echo ($term->is_active == 1) ? 'selected=""' : ''; ?>>Active</option>
                        <option value="2" <?php echo ($term->is_active == 2) ? 'selected=""' : ''; ?>>In-Active</option>
                    </select>

                    {{ $errors->first('is_active', '<span class="help-inline">:message</span>') }}
                </div>
            </div>
            <!-- ./ Status -->
        </div>
        <!-- ./ general tab -->

    </div>
    <!-- ./ tabs content -->

    <!-- Form Actions -->
    <div class="form-group">
        <div class="col-md-offset-2 col-md-10">
            <element class="btn btn-danger btn-cancel close_popup">Cancel</element>
            <button type="reset" class="btn btn-default">Reset</button>
            <button type="submit" class="btn btn-success">Update Time</button>
        </div>
    </div>
    <!-- ./ form actions -->
</form>
@stop
@section('scripts')
<script type="text/javascript" src="{{asset('assets/timepicker/bootstrap-timepicker.js')}}"></script>
<script type="text/javascript">
$(document).ready(function() {
    $('#timepicker3').timepicker({
        minuteStep: 5,
        showInputs: false,
        disableFocus: true
    });
    $('#timepicker2').timepicker({
        minuteStep: 5,
        showInputs: false,
        disableFocus: true
    });
});
</script>
@stop
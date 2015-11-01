@extends('wtadmin.layouts.delete_new_modal')

{{-- Content --}}
@section('content')

<div class="popover-content">
    <div class="page-container">


        <!-- BEGIN EXAMPLE TABLE PORTLET-->
        <div class="portlet light">


            <div class="portlet-body">
                <div class="portlet light bordered form-fit">
                    <div class="portlet-title">
                        <div class="caption">
                            <i class="icon-list font-blue-hoki"></i>
                            <span class="caption-subject font-blue-hoki bold uppercase">{{{@$title}}}</span>
                        </div>
                        <div class="actions">
                            <button class="btn btn-sm btn-default btn-small btn-inverse close_popup"><span class="glyphicon glyphicon-circle-arrow-left"></span> Back</button>
                        </div>
                    </div>
                    <div class="portlet-body form">
                        {{-- Delete Content Form --}}
                        <form id="deleteForm" class="form-horizontal" method="post" action="@if (isset($permission)){{ URL::to('sadmin/pages/' . $page->id . '/delete') }}@endif" autocomplete="off">

                            <!-- CSRF Token -->
                            <div class="alert alert-warning">
                                Are you sure you want to delete?
                            </div>
                            <input type="hidden" name="_token" value="{{{ csrf_token() }}}" />
                            <input type="hidden" name="id" value="{{ $page->id }}" />
                            <!-- <input type="hidden" name="_method" value="DELETE" /> -->
                            <!-- ./ csrf token -->

                            <!-- Form Actions -->
                            <div class="col-lg-12">
                                <div class="form-group">
                                    <div class="controls">
                                        <br />
                                        <element class="btn btn-sm red btn-cancel close_popup">Cancel</element>
                                        <button type="submit" class="btn btn-sm red ">Delete</button>
                                    </div>
                                </div>
                            </div>
                            <!-- ./ form actions -->
                        </form>
                    </div>
                </div>

            </div>
        </div>
    </div>
</div>
@stop
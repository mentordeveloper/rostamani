@extends('wtadmin.layouts.default')

{{-- Web site Title --}}
@section('title')
{{{ $title }}} :: @parent
@stop

{{-- Content --}}
@section('content')

<div class="page-header">
    <h3>
        {{{$school['name']}}} {{{ Lang::get('wtadmin/info/title.store_profile') }}}

    </h3>
</div>
<ol class="breadcrumb">
    <li> <a class="" target="_parent" href="{{{ URL::to('sadmin/') }}}">Home</a></li>
    <li> <a class="last" target="_parent" href="{{{ URL::to('sadmin/info/storeProfile') }}}">Store Profile</a></li>

</ol>
<!-- Default panel contents -->
<div class="panel-body">

    <div class="row">
        <div class="col-lg-7 block well well-lg">
            <section class="module">
                <div class="module-head">
                    <b>{{{$school['name']}}} Detail</b>
                </div>
                <div class="module-body ajax-content">
                    <span id="ajax_content">
                        <div class="panel-body">

                            <form name="merchant_detail" id="merchant_detail" method="POST" action="" accept-charset="UTF-8">
                                <?php
                                $timestamp = time();
                                $hash = md5('unique_salt' . $timestamp);
                                $sch_id = '';
                                ?>
                                <input type="hidden" name="timestamp" id="timestamp" value="<?php echo $timestamp; ?>" />
                                <input type="hidden" name="hash" id="hash" value="<?php echo $hash; ?>" />
                                <input type="hidden" name="path" id="path" value="<?php echo ''; ?>" />
                                <input type="hidden" name="s_id" id="s_id" value="{{{$school['id']}}}" />

                                <input type="hidden" name="_token" value="{{{ Session::getToken() }}}">
                                <input type="hidden" id="store_hash" name="store_hash" value="{{{$storeInfo['store_hash']}}}">
                                <fieldset>
                                    <div class="form-group {{{ $errors->has('merchant_name') ? 'error' : '' }}}">
                                        <label for="store_name">{{{ Lang::get('store/store.merchant_name') }}}</label>
                                        <input class="form-control" placeholder="{{{ Lang::get('store/store.merchant_name') }}}" readonly="" type="text" name="merchant_name" id="merchant_name" value="{{{$school['name']}}}" />
                                        {{ $errors->first('merchant_name', '<span class="help-inline">:message</span>') }} 
                                    </div>
                                    <div class="form-group {{{ $errors->has('merchant_email') ? 'error' : '' }}}">
                                        <label for="store_name">{{{ Lang::get('store/store.merchant_email') }}}</label>
                                        <input class="form-control" readonly="" placeholder="{{{ Lang::get('store/store.merchant_email') }}}" type="text" name="merchant_email" id="merchant_email" value="{{{$school['email']}}}" />
                                        {{ $errors->first('merchant_email', '<span class="help-inline">:message</span>') }} 
                                    </div>
                                    <div class="form-group {{{ $errors->has('store_name') ? 'error' : '' }}}">
                                        <label for="store_name">{{{ Lang::get('store/store.store_name') }}}</label>
                                        <input class="form-control" placeholder="{{{ Lang::get('store/store.store_name') }}}" type="text" name="store_name" id="store_name" value="{{{$storeInfo['store_name']}}}" />
                                        {{ $errors->first('store_name', '<span class="help-inline">:message</span>') }} 
                                    </div>

                                    <div class="form-group {{{ $errors->has('store_address') ? 'error' : '' }}}">
                                        <label for="store_name">{{{ Lang::get('store/store.store_address') }}}</label>
                                        <input class="form-control" placeholder="{{{ Lang::get('store/store.store_address') }}}" type="text" name="store_address" id="store_address" value="{{{$storeInfo['store_address']}}}" />
                                        {{ $errors->first('store_address', '<span class="help-inline">:message</span>') }} 
                                    </div>
                                    
                                    <div class="form-group {{{ $errors->has('store_phone') ? 'error' : '' }}}">
                                        <label for="store_name">{{{ Lang::get('store/store.store_phone') }}}</label>
                                        <input class="form-control" placeholder="{{{ Lang::get('store/store.store_phone') }}}" type="text" name="store_phone" id="store_phone" value="{{{$storeInfo['store_phone']}}}" />
                                        {{ $errors->first('store_phone', '<span class="help-inline">:message</span>') }} 
                                    </div>
                                 
                                    <div class="form-group {{{ $errors->has('store_monthly_payment') ? 'error' : '' }}}">
                                        <label for="store_monthly_payment">{{{ Lang::get('store/store.store_monthly_payment') }}}</label>
                                        <input class="form-control" readonly="" placeholder="{{{ Lang::get('store/store.store_monthly_payment') }}}" type="text" name="store_monthly_payment" id="store_monthly_payment" value="{{{$storeInfo['store_monthly_payment']}}}" />
                                        {{ $errors->first('store_monthly_payment', '<span class="help-inline">:message</span>') }} 
                                    </div>
                                    @if ( Session::get('error') )
                                    <div class="alert alert-error alert-danger"> @if ( is_array(Session::get('error')) )
                                        {{ head(Session::get('error')) }}
                                        @endif </div>
                                    @endif

                                    @if ( Session::get('notice') )
                                    <div class="alert">{{ Session::get('notice') }}</div>
                                    @endif
                                    <div class="form-actions form-group">
                                        <button name="con_sub" id="con_sub" type="submit" class="btn btn-primary">{{{ Lang::get('store/store.store_submit') }}}</button>
                                    </div>
                                </fieldset>
                            </form>
                        </div>

                </div>
            </section>
        </div>
        <div class="col-lg-1"></div>
        <div class="col-lg-4 block well well-lg">
            <section class="module">
                <div class="module-head">
                    <b>{{ trans('syntara::users.information') }}</b>
                </div>
                <div class="module-body ajax-content">
                    <label>{{{ Lang::get('store/store.store_creation_date') }}}</label><p>{{{$school['created_at']}}}</p>
                    <label>{{{ Lang::get('store/store.store_updation_date') }}}</label><p>{{{$school['updated_at']}}}</p>
                    <label>{{{ Lang::get('store/store.contract_documents') }}}</label><p>
                        <?php
                        $i = 0;
                        foreach ($p_i_v_r as $p_i_v) {
                            $i++;
                            ?>
                        <div id="div_{{{$p_i_v->id}}}" class="ajax-file-upload-statusbar" style="width: 360px;" >
                            <div >
                                <a href="{{ asset($p_i_v->path) }}" ><img width="50" height="50"  src="/doc.png" />{{{$p_i_v->file_name}}}</a>
                            </div>
                        </div>
                        <?php
                    }
                    ?>
                    </p>


                </div>
            </section>
        </div>

    </div>

</div>
@stop 
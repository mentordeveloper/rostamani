@extends(Config::get('syntara::views.master'))


{{-- Web site Title --}}
@section('title')
{{{ $title }}} :: @parent
@stop

{{-- Content --}}
@section('content')
<div class="container" id="main-container">
   <div class="row">
        <div class="col-lg-12">
            <section class="module">
                <div class="module-head">
                    <b>Products Management</b>
                </div>
                <div class="module-body ajax-content">

                    <span id="ajax_content">
                        <div class="row upper-menu">

                            <div style="float:right;">
                                <a href="{{{ URL::to('sadmin/products/create') }}}" class="btn btn-small btn-info iframe_product"><span class="glyphicon glyphicon-plus-sign"></span> Create</a>
                                <a href="{{{ URL::to('sadmin/products/import') }}}" class="btn btn-small btn-info iframe"><span class="glyphicon glyphicon-plus-sign"></span> Import</a>
                                <!--<a href="{{{ URL::to('sadmin/products/zipUpload') }}}" class="btn btn-small btn-info iframe"><span class="glyphicon glyphicon-plus-sign"></span>Products Images Upload</a>-->

                            </div>

                        </div>
                        <table id="products" class="table table-bordered table-striped table-hover ">
                            <thead>
                                <tr>
                                    <th class="col-md-1">{{{ Lang::get('wtadmin/products/table.id') }}}</th>
                                    <th class="col-md-2">{{{ Lang::get('wtadmin/products/table.FullName') }}}</th>
                                    <!--<th class="col-md-1">{{{ Lang::get('wtadmin/products/table.price') }}}</th>-->
                                    <!--<th class="col-md-1">{{{ Lang::get('wtadmin/products/table.quantity') }}}</th>-->
                                    <!--<th class="col-md-1">{{{ Lang::get('wtadmin/products/table.size') }}}</th>-->
                                    <th class="col-md-2">{{{ Lang::get('wtadmin/products/table.image') }}}</th>
                                    <th class="col-md-1">{{{ Lang::get('wtadmin/products/table.category') }}}</th>
                                    <th class="col-md-2">{{{ Lang::get('wtadmin/products/table.sub-category') }}}</th>
                                    <th class="col-md-1">{{{ Lang::get('wtadmin/products/table.status') }}}</th>
                                    <th class="col-md-2">{{{ Lang::get('table.actions') }}}</th>
                                </tr>
                            </thead>
                            <tbody>
                            </tbody>
                        </table>
                    </span>
                </div>
            </section>
        </div>

    </div>
</div>

@stop

{{-- Scripts --}}
@section('scripts')
<script type="text/javascript">
    var oTable;
    $(document).ready(function () {
        oTable = $('#products').dataTable({
            "sDom": "<'row'<'col-md-6'l><'col-md-6'f>r>t<'row'<'col-md-6'i><'col-md-6'p>>",
            "sPaginationType": "bootstrap",
            "oLanguage": {
                "sLengthMenu": "_MENU_ records per page"
            },
            "bProcessing": true,
            "bServerSide": true,
            "sAjaxSource": "{{ URL::to('sadmin/products/data') }}",
            "fnDrawCallback": function (oSettings) {
                $(".iframe_product").colorbox({iframe: true, width: "95%", height: "100%"});
                $(".iframe").colorbox({iframe: true, width: "90%", height: "85%"});
            }
        });
    });
</script>
@stop
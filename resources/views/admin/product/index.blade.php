@extends('layouts.admin')
@section('admin_content')
    <link href="https://cdn.jsdelivr.net/gh/gitbrent/bootstrap4-toggle@3.6.1/css/bootstrap4-toggle.min.css" rel="stylesheet">
    <link href="https://gitcdn.github.io/bootstrap-toggle/2.2.2/css/bootstrap-toggle.min.css" rel="stylesheet">
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0">Product</h1>
                    </div><!-- /.col -->
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <a href="{{ route('product.create') }}" class="btn btn-primary"> + Add New</a>  </ol>
                    </div><!-- /.col -->
                </div><!-- /.row -->
            </div><!-- /.container-fluid -->
        </div>
        <!-- /.content-header -->
        <section class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-header">
                                <h3 class="card-title">All Products list here</h3>
                            </div>
                            <div class="row p-3 pb-lg-0">
                                <div class="form-group col-lg-3">
                                    <select class="form-control submitable" name="category_id" id="category_id">
                                        <option value="">All categories</option>
                                        @foreach($category as $row)
                                            <option value="{{$row->id}}">{{$row->category_name}}</option>
                                        @endforeach
                                    </select>
                                </div>

                                <div class="form-group col-lg-3">
                                    <select class="form-control submitable" name="brand_id" id="brand_id">
                                        <option value="">All Brand</option>
                                        @foreach($brand as $row)
                                            <option value="{{$row->id}}">{{$row->brand_name}}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="form-group col-lg-3">
                                    <select class="form-control submitable" name="warehouse" id="warehouse">
                                        <option value="">All Warehouse</option>
                                        @foreach($warehouse as $row)
                                            <option value="{{$row->name}}">{{$row->name}}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="form-group col-lg-3">
                                    <select class="form-control submitable" name=" status" id="status">
                                        <option value="1">All Status</option>
                                            <option value="1">Active</option>
                                        <option value="0">Inactive</option>
                                    </select>
                                </div>
                            </div>

                            <!-- /.card-header -->
                            <div class="card-body">
                                <table id="" class="table table-bordered table-striped table-sm ytable">
                                    <thead>
                                    <tr>
                                        <th>SL</th>
                                        <th> Thumbnail</th>
                                        <th> Name</th>
                                        <th> Category Name</th>
                                        <th> Total Stock</th>
                                        <th> Code</th>
                                        <th> Selling price</th>
                                        <th> Features</th>
                                        <th> Today's Deal</th>
                                        <th> Status</th>
                                        <th>Action</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/gh/gitbrent/bootstrap4-toggle@3.6.1/js/bootstrap4-toggle.min.js"></script>
    <script src="https://gitcdn.github.io/bootstrap-toggle/2.2.2/js/bootstrap-toggle.min.js"></script>

    <script  type="text/javascript">
        $("input[data-bootstrap-switch]").each(function(){
            $(this).bootstrapSwitch('state', $(this).prop('checked'));
        });
    </script>
    <script type="text/javascript">
        $(function product(){
             table=$('.ytable').DataTable({
                "processing":true,
                "serverSide":true,
                 "searching":true,
                "ajax":{
                    "url":"{{ route('product.index') }}",
                    "data":function (e) {
                        e.category_id = $("#category_id").val();
                        e.subcategory_id = $("#subcategory_id").val();
                        e.brand_id = $("#brand_id").val();
                        e.warehouse = $("#warehouse").val();
                        e.status= $("#status").val();
                    }
                },
                columns:[
                    {data:'DT_RowIndex',name:'DT_RowIndex'},
                    {data:'thumbnail',name:'thumbnail'},
                    {data:'name',name:'name'},
                    {data:'category_name',name:'category_name'},
                    {data:'stock_quantity',name:'stock_quantity'},
                    {data:'code',name:'code'},
                    {data:'selling_price',name:'selling_price'},
                    {data:'featured',name:'featured'},
                    {data:'today_deal',name:'today_deal'},
                    {data:'status',name:'status'},
                    {data:'action',name:'action',orderable:true, searchable:true},

                ]
            });
        });
    </script>

<!--Active deactive featured-->
    <script  type="text/javascript">
        $('body').on('change','.submitable', function(){
            $('.ytable').DataTable().ajax.reload();
        });
        $('body').on('click','.active_featured', function(){
            let id=$(this).data('id');
            //alert(id);
            $.ajax({
                url: "{{url("product/activefeatured")}}/"+id,
                type: 'get',
                success: function (data) {
                    table.ajax.reload();
                }
            });
        });

        $('body').on('click','.deactive_featured', function(){
            let id=$(this).data('id');
            $.ajax({
                url: "{{url("product/deactivefeatured")}}/"+id,
                type: 'get',
                success: function (data) {
                    table.ajax.reload();
                }
            });
        });
    </script>
    <!--Active deactive todays deal-->
    <script  type="text/javascript">
        $('body').on('click','.active_today_deal', function(){
            let id=$(this).data('id');
            //alert(id);
            $.ajax({
                url: "{{url("product/activetodaysdeal")}}/"+id,
                type: 'get',
                success: function (data) {
                    table.ajax.reload();
                }
            });
        });

        $('body').on('click','.deactive_today_deal', function(){
            let id=$(this).data('id');
            $.ajax({
                url: "{{url("product/deactivetodaysdeal")}}/"+id,
                type: 'get',
                success: function (data) {
                    table.ajax.reload();
                }
            });
        });
    </script>
    <!--Active deactive status-->
    <script  type="text/javascript">
        $('body').on('click','.active_status', function(){
            let id=$(this).data('id');
            //alert(id);
            $.ajax({
                url: "{{url("product/activestatus")}}/"+id,
                type: 'get',
                success: function (data) {
                    table.ajax.reload();
                }
            });
        });

        $('body').on('click','.deactive_status', function(){
            let id=$(this).data('id');
            $.ajax({
                url: "{{url("product/deactivestatus")}}/"+id,
                type: 'get',
                success: function (data) {
                    table.ajax.reload();
                }
            });
        });
    </script>
@endsection

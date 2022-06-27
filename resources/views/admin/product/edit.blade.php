@extends('layouts.admin')
@section('admin_content')
    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/Dropify/0.1.3/css/dropify.min.css">
    <link href="https://cdn.jsdelivr.net/gh/gitbrent/bootstrap4-toggle@3.6.1/css/bootstrap4-toggle.min.css" rel="stylesheet">

    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0 text-dark"> Product Edit</h1>
                    </div><!-- /.col -->
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="">Home</a></li>
                            <li class="breadcrumb-item"><a href="{{ route('product.index') }}">All Product list</a></li>
                            <li class="breadcrumb-item active"><a href="{{ route('product.index') }}">Go back to index</a></li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>
        <div class="content">
            <div class="container-fluid">
                <form action="{{ route('product.update',$product->id) }}" method="Post" enctype="multipart/form-data">
                    @csrf
                    <div class="row">
                        <div class="col-md-8 ">
                            <div class="card ">
                                <div class="card-header">
                                    <h3 class="card-title">Product Information</h3>
                                </div>
                                <div class="card-body " style="padding: 1.5rem 5rem!important;">
                                    <div class="form-group row">
                                        <label for="inputEmail3" class="col-sm-3 col-form-label required " >Product Name </label>
                                        <div class="col-sm-9">
                                            <input type="text" name="name" value="{{$product->name }}" class="form-control"  placeholder="Product Name" required="">
                                        </div>
                                    </div>
                                <!--
                            <div class="form-group row">
                                <label for="inputEmail3" class="col-sm-3 col-form-label">Category</label>
                                <div class="col-sm-9">
                                    <select class="form-control demo-select2 " name="category_id" id="category_id" required="">
                                        <option selected disabled value="category_name"> Select Category name </option>
                                        @foreach($category as $row)
                                    <option  value="{{ $row->category_name }}">{{ $row->category_name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="inputEmail3" class="col-sm-3 col-form-label "> Sub category</label>
                                <div class="col-sm-9">
                                    <select class="form-control select2 demo-select2" data-placeholder="Choose subcategory" name=" subcategory_id" id="subcategory_id">
                                        <option selected disabled value="subcategory_name"> Select SubCategory name </option>
                                    </select>
                                </div>
                            </div>

-->
                                    <div class="form-group row">
                                        <label for="inputEmail3" class="col-sm-3 col-form-label required">Category/ Sub category</label>
                                        <div class="col-sm-9">
                                            <select class="form-control demo-select2" name="subcategory_id" id="subcategory_id" required="">
                                                <option  disabled="" selected="" >== Choose Category ==</option>
                                                @foreach($category as $row)
                                                    @php
                                                        $subcat=DB::table('subcategories')->where('category_id', $row->id)->get();
                                                    @endphp
                                                    <option disabled="" style="color: blue;">{{ $row->category_name }}</option>
                                                    @foreach($subcat as $row)
                                                        <option value="{{ $row->id }}"   &nbsp;  &nbsp;  &nbsp;  &nbsp; -- {{ $row->subcategory_name }}</option>
                                                    @endforeach
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="inputEmail3" class="col-sm-3 col-form-label ">Sub Sub category</label>
                                        <div class="col-sm-9">
                                            <select class="form-control" name="childcategory_id" id="childcategory_id">
                                                <option selected disabled value="subcategory_name"> Select SubCategory name </option>

                                            </select>
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label for="inputEmail3" class="col-sm-3 col-form-label">Brand</label>
                                        <div class="col-sm-9">

                                            <select class="form-control" name="brand_id" id="brand_id" required="">
                                                <option selected disabled value="brand_name"> Select brand name </option>
                                                @foreach($brand as $row)
                                                    <option  value="{{ $row->brand_name }}">{{ $row->brand_name }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="inputEmail3" class="col-sm-3 col-form-label">Pickup point</label>
                                        <div class="col-sm-9">

                                            <select class="form-control" name="pickup_point_id" required="">
                                                <option selected disabled value="brand name"> Select Pickup Point  </option>
                                                @foreach($pickup as $row)
                                                    <option  value="{{ $row->name }}">{{ $row->name }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label for="inputEmail3" class="col-sm-3 col-form-label">Warehouse</label>
                                        <div class="col-sm-9">

                                            <select class="form-control" name="subcategory_id" required="">
                                                <option selected disabled value="brand name"> Select Wraehouse name </option>
                                                @foreach($warehouse as $row)
                                                    <option  value="{{ $row->name }}">{{ $row->name }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>


                                    <div class="form-group row">
                                        <label for="inputEmail3" class="col-sm-3 col-form-label required">Unit</label>
                                        <div class="col-sm-9">
                                            <input type="text" name="unit" value="{{$product->unit }}"  class="form-control" id="inputEmail3" placeholder="Unit" required>
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label for="inputEmail3" class="col-sm-3 col-form-label required">Product Code</label>
                                        <div class="col-sm-9">
                                            <input type="text" class="form-control" name="code" value="{{$product->code }}" id="inputEmail3" placeholder="Product Code" required="">
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label for="inputEmail3" class="col-sm-3 col-form-label">Tags</label>
                                        <div class="col-sm-9">
                                            <input type="text"   class="form-control " value="{{$product->tags }}" name="tags" multiple data-role="tagsinput" placeholder="Type and Hit Comma">
                                        </div>
                                    </div>

                                </div>
                            </div>


                            <div class="card ">
                                <div class="card-header">
                                    <h3 class="card-title">Product Variation</h3>
                                </div>
                                <div class="card-body " style="padding: 1.5rem 5rem!important;">
                                    <div class="form-group row">
                                        <label for="inputEmail3" class="col-sm-3 col-form-label">Color</label>
                                        <div class="col-sm-9">
                                            <input type="text" name="color" value="{{$product->color }}" multiple data-role="tagsinput" class="form-control" id="inputEmail3" placeholder="Color">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="inputEmail3" class="col-sm-3 col-form-label">Size</label>
                                        <div class="col-sm-9">
                                            <input type="text" name="size"  value="{{$product->size }}" multiple data-role="tagsinput"  class="form-control" id="inputEmail3" placeholder="Size">
                                        </div>
                                    </div>


                                </div>
                            </div>
                            <div class="card ">
                                <div class="card-header">
                                    <h3 class="card-title">Product Description</h3>
                                </div>
                                <div class="card-body " style="padding: 1.5rem 5rem!important;">
                                    <div class="form-group row">
                                        <label for="inputEmail3" class="col-sm-3 col-form-label">Description</label>
                                        <div class="col-sm-9">
                                   <textarea class="textarea"  placeholder="Place some text here" name="description"
                                             style="width: 100%; height: 300px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;">{{$product->description }}"</textarea>
                                        </div>
                                    </div>


                                </div>
                            </div>
                            <div class="card ">
                                <div class="card-header">
                                    <h3 class="card-title">Product Price + Stock</h3>
                                </div>
                                <div class="card-body " style="padding: 1.5rem 5rem!important;">
                                    <div class="form-group row">
                                        <label for="inputEmail3" class="col-sm-3 col-form-label required">selling Price</label>
                                        <div class="col-sm-9">
                                            <input type="text" name="selling_price" value="{{$product->selling_price }}"  class="form-control" required="" placeholder="Selling Price">
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label for="inputEmail3" class="col-sm-3 col-form-label">Purchase price</label>
                                        <div class="col-sm-9">
                                            <input type="text" name="purchase_price" value="{{$product->purchase_price }}"class="form-control" placeholder="Purchase Price">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="inputEmail3" class="col-sm-3 col-form-label">Discount price</label>
                                        <div class="col-sm-9">
                                            <input type="text" name="discount_price" value="{{$product->discount_price }}" class="form-control"  placeholder="Discount Price">
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label for="inputEmail3" class="col-sm-3 col-form-label required">Stock Quantity</label>
                                        <div class="col-sm-9">
                                            <input type="text" name="stock_quantity" value="{{$product->stock_quantity }}" class="form-control" id="inputEmail3" placeholder="Stock Quantity" required="">
                                        </div>
                                    </div>

                                </div>
                            </div>
                        </div>
                        <!-- /.col (left) -->
                        <div class="col-md-4">
                            <div class="card ">
                                <div class="card-header">
                                    <h3 class="card-title">Product Image</h3>
                                </div>
                                <div class="card-body">
                                    <div class="form-group">
                                        <label for="brand-name"> Thumbnail</label>
                                        <input type="file" name="thumbnail" accept="image/*" class="dropify"  data-height="140" id="input-file-now" >
                                        <small id="emailHelp" class="form-text text-muted">This is your Brand Logo </small>
                                    </div>

                                    <div class="card ">
                                        <div class="card-header">
                                            <h3 class="card-title">More Image (click Add for more image)</h3>
                                        </div>

                                        <div class="input-group control-group img_div form-group card-body" >
                                            <input type="file" name="image[]" accept="image/*" class="form-control">
                                            <div class="input-group-btn">
                                                <button class="btn btn-success btn-add-more" type="button"><i class="glyphicon glyphicon-plus"></i>Add</button>
                                            </div>
                                        </div>
                                        <div class="clone hide" style="display: none;" >
                                            <div class="control-group input-group form-group  card-body " style="margin-top:-30px">
                                                <input type="file" accept="image/*" name="image[]" class="form-control">
                                                <div class="input-group-btn">
                                                    <button class="btn btn-danger btn-remove" type="button"><i class="glyphicon glyphicon-remove"></i> Remove</button>
                                                </div>
                                            </div>
                                        </div>




                                        <div class="card card-secondary">
                                            <div class="card-body">
                                                <h6 for="inputEmail3">Features Product</h6>

                                                <div class="bootstrap-switch-container" >
                                                    <input type="checkbox" name="featured" value="1" @if($product->featured==1) checked @endif data-toggle="toggle">
                                                </div>
                                            </div>
                                        </div>

                                        <div class="card card-secondary">
                                            <div class="card-body">
                                                <h6 for="inputEmail3">Today's Deal</h6>

                                                <div class="bootstrap-switch-container" >
                                                    <input type="checkbox" name="today_deal"  value="1" @if($product->today_deal==1) checked @endif data-toggle="toggle">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="card card-secondary">
                                            <div class="card-body">
                                                <h6 for="inputEmail3">Status</h6>

                                                <div class="bootstrap-switch-container" >
                                                    <input type="checkbox" name="status" value="1" @if($product->status==1) checked @endif data-toggle="toggle">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="card card-secondary">
                                            <div class="card-body">
                                                <h6 for="inputEmail3">Product Slider</h6>

                                                <div class="bootstrap-switch-container" >
                                                    <input type="checkbox" name="product_slider" value="1" @if($product->product_slider==1) checked @endif data-toggle="toggle">
                                                </div>
                                            </div>
                                        </div>

                                        <div class="card ">
                                            <div class="card-header">
                                                <h3 class="card-title">video link</h3>
                                            </div>
                                            <div class="card-body">
                                                <input type="text" name="video" value="{{$product->video }}"  class="form-control" id="inputEmail3" placeholder="vedio link">
                                            </div>
                                        </div>



                                    </div>
                                    <!-- /.form group -->

                                </div>
                                <!-- /.card-body -->

                            </div>

                            <div class="modal-footer">
                                <button type="Submit" class="btn btn-success">Save</button>
                            </div>
                        </div>
                </form>
            </div>
        </div>
    </div>
    </div>
    <div id="ccc">

    </div>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/Dropify/0.1.3/js/dropify.min.js"></script>
    <script src="https://cdn.jsdelivr.net/gh/gitbrent/bootstrap4-toggle@3.6.1/js/bootstrap4-toggle.min.js"></script>
    <script type="text/javascript">
        $('input').tagsinput({
            confirmKeys: [13, 44]
        });

    </script>

    <script  type="text/javascript">
        $( "#category_id" ).change(function () {
            var id = $(this).val();
            // alert(id);
            $.ajax({
                url: "{{url("/get-subcategory/")}}/"+id,
                type: 'get',
                success: function (data) {
                    $('#subcategory_id').empty();
                    $.each(data,function(index,subcatObj){
                        $('#subcategory_id').append('<option value ="'+subcatObj.id+'">'+subcatObj.subcategory_name+'</option>');
                    });
                }
            });
        });
    </script>
    <script  type="text/javascript">
        $( "#subcategory_id" ).change(function () {
            var id = $(this).val();
            // alert(id);
            $.ajax({
                url: "{{url("/get-child-category/")}}/"+id,
                type: 'get',
                success: function (data) {
                    $('#childcategory_id').empty();
                    $.each(data,function(index,subcatObj){
                        $('#childcategory_id').append('<option value ="'+subcatObj.id+'">'+subcatObj.childcategory_name+'</option>');
                    });
                }
            });
        });
    </script>
    <script  type="text/javascript">
        $('.dropify').dropify();
    </script>

    <script  type="text/javascript">
        $("input[data-bootstrap-switch]").each(function(){
            $(this).bootstrapSwitch('state', $(this).prop('checked'));
        });
    </script>
    <!--
<script type="text/javascript">
    $(document).ready(function ()
    {
        var postURL = "<?php echo url('addmore');?>";
        var i = 1;
        $('#add').click(function () {
            $('#dynamic_field').append('<tr id  = "row'+i+'" class = "dynamic-added"><td> <input type="file" accept="image/*" name="images[]" placeholder="Enter your name" class="form-control name_list"/></td><td> <button type="button" name="remove" id="'+i+'" class="btn btn-danger btn_remove">% </button> </td> </tr> );

        });
            $(document).on('click', '.btn_remove', function () {
                var button_id = $(this).attr("id");
                $('#row' +button_id+ '').remove();

            });
    });

</script>
-->
    <script type="text/javascript">
        $(document).ready(function() {
            $(".btn-add-more").click(function(){
                var html = $(".clone").html();
                $(".img_div").after(html);
            });
            $("body").on("click",".btn-remove",function(){
                $(this).parents(".control-group").remove();
            });
        });
    </script>
@endsection

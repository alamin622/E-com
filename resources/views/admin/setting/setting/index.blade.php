@extends('layouts.admin')
@section('admin_content')
    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/Dropify/0.2.2/css/dropify.css">

    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0 text-dark">Setting Update</h1>
                    </div><!-- /.col -->
                    <!-- /.col -->
                </div><!-- /.row -->
            </div><!-- /.container-fluid -->
        </div>
        <!-- /.content-header -->

        <!-- Main content -->
        <div class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="card">
                            <div class="card-header">
                                <div class="d-flex justify-content-between align-items-center">
                                    <h3 class="card-title">Setting Update -</h3>

                                </div>
                            </div>
                            <div class="card-body p-0">
                                <div class="row">
                                    <div class="col-12 col-lg-8 offset-lg-2 col-md-8 offset-md-2">
                                        <div class="card-body">
                                            <form action="{{ route('setting.update',$setting->id) }}" method="Post" enctype="multipart/form-data">
                                                @csrf
                                                <div class="modal-body">


                                                    <div class="form-group ">
                                                        <label for="exampleInputEmail1">Author</label>
                                                        <select name="currency" id=""  class="form-control">
                                                            <option value="৳" {{($setting->currency== '৳') ? 'selected' : '' }}>Taka</option>
                                                            <option value="$" {{($setting->currency== '$') ?'selected' : '' }}>USD</option>
                                                            <option value=" ₹" {{($setting->currency== ' ₹') ?'selected' : '' }}>RUPEE</option>
                                                        </select>
                                                    </div>
                                                    <div class="form-group ">
                                                        <label for="exampleInputEmail1">Site Name</label>
                                                        <input type="text" class="form-control " value="{{ $setting->site_name }}" aria-describedby="emailHelp" name="meta_author" >
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="exampleInputEmail1">Phone</label>
                                                        <input type="" class="form-control " value="{{ $setting->phone }}" aria-describedby="emailHelp" name="meta_title" >
                                                    </div>

                                                    <div class="form-group">
                                                        <label for="exampleInputEmail1">Email</label>
                                                        <input type="email" class="form-control " value="{{ $setting->email }}" aria-describedby="emailHelp" name="link" >
                                                    </div>

                                                    <div class="form-group">
                                                        <label for="exampleInputEmail1">Address</label>
                                                        <input type="text" class="form-control " value="{{ $setting->address }}" aria-describedby="emailHelp" name="meta_description" >
                                                    </div>

                                                    <div class="form-group">
                                                        <label for="exampleInputEmail1">Facebook</label>
                                                        <input type="text" class="form-control " value="{{ $setting->facebook }}" aria-describedby="emailHelp" name="alexa_analytics" >
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="exampleInputEmail1">Twitter</label>
                                                        <input type="text" class="form-control " value="{{ $setting->twitter }}" aria-describedby="emailHelp" name="google_verification" >
                                                    </div>

                                                    <div class="form-group">
                                                        <label for="exampleInputEmail1">Youtube</label>
                                                        <input type="text" class="form-control " value="{{ $setting->youtube }}" aria-describedby="emailHelp" name="meta_description" >
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="exampleInputEmail1">Instagram</label>
                                                        <input type="text" class="form-control " value="{{ $setting->instagram }}" aria-describedby="emailHelp" name="google_analytics" >
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="exampleInputEmail1">Linkedin</label>
                                                        <input type="text" class="form-control " value="{{ $setting->linkedin }}" aria-describedby="emailHelp" name="alexa_analytics" >
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="exampleInputEmail1">Google Plus</label>
                                                        <input type="text" class="form-control " value="{{ $setting->google_plus }}" aria-describedby="emailHelp" name="google_verification" >
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="exampleInputEmail1">Google Favicon</label>
                                                        <input type="file" class="form-control " value="{{ $setting->favicon }}" aria-describedby="emailHelp" name="google_verification" >
                                                    </div>
                                                    <div class="row">
                                                        <div class="form-group">
                                                            <label for="brand-name"> Logo</label>
                                                            <input type="file" class="dropify" data-height="140" id="input-file-now" name="logo" >
                                                            <small id="emailHelp" class="form-text text-muted">This is your  Logo </small>
                                                        </div>
                                                        <div class="col-lg-6">
                                                            <label for="exampleInputFile">Old Image</label><br>
                                                            <img src="{{ asset($setting->logo) }}" style="height: 50px; width: 70px;">
                                                            <input type="hidden" name="oldlogo" value="{{ $setting->logo }}">
                                                        </div>
                                                    </div>

                                                    <div class="modal-footer">
                                                        <button type="Submit" class="btn btn-success">Update</button>
                                                    </div>
                                                </div>
                                            </form>

                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </section>


@endsection
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/Dropify/0.2.2/js/dropify.js"></script>

<script type="text/javascript">
    $('.dropify').dropify();

</script>
<script type="text/javascript">
    $('input').tagsinput({
        confirmKeys: [13, 44]
    });
</script>

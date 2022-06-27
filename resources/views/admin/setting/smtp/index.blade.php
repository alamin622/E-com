@extends('layouts.admin')
@section('admin_content')
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0 text-dark">Seo Update</h1>
                    </div>
                </div>
            </div>
        </div>
        <!-- Main content -->
        <div class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="card">
                            <div class="card-header">
                                <div class="d-flex justify-content-between align-items-center">
                                    <h3 class="card-title">Seo Update -</h3>
                                </div>
                            </div>
                            <div class="card-body p-0">
                                <div class="row">
                                    <div class="col-12 col-lg-8 offset-lg-2 col-md-8 offset-md-2">
                                        <div class="card-body">
                                            <form action="{{ route('smtp.update', ['id' => $smtp->id])}}" method="post" >
                                                @csrf
                                                <div class="modal-body">
                                                    <div class="form-group">
                                                        <label for="exampleInputEmail1">MAIL DRIVER</label> <br>
                                                        <input type="text" class="form-control " aria-describedby="emailHelp" name="meta_author"   value="{{ $smtp->mailer }}">
                                                    </div>
                                                    <div class="form-group ">
                                                        <label for="exampleInputEmail1">MAIL HOST</label>
                                                        <input type="text" class="form-control " value="{{ $smtp->host }}" aria-describedby="emailHelp" name="meta_author" >
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="exampleInputEmail1">MAIL PORT</label>
                                                        <input type="text" class="form-control " value="{{ $smtp->port }}" aria-describedby="emailHelp" name="meta_title" >
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="exampleInputEmail1">MAIL USERNAME</label>
                                                        <input type="text" class="form-control " value="{{ $smtp->username }}" aria-describedby="emailHelp" name="link" >
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="exampleInputEmail1">MAIL PASSWORD</label>
                                                        <input type="text" class="form-control " value="{{ $smtp->password }}" aria-describedby="emailHelp" name="meta_description" >
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="exampleInputEmail1">MAIL ENCRYPTION</label>
                                                        <input type="text" class="form-control " value="{{$smtp->encryption }}" aria-describedby="emailHelp" name="google_analytics" >
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="exampleInputEmail1">MAIL FROM NAME</label>
                                                        <input type="text" class="form-control " value="{{$smtp->from_name }}" aria-describedby="emailHelp" name="alexa_analytics" >
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="exampleInputEmail1">MAIL FROM ADDRESS</label>
                                                        <input type="text" class="form-control " value="{{ $smtp->from_address }}" aria-describedby="emailHelp" name="google_verification" >
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

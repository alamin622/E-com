@extends('layouts.admin')
@section('admin_content')
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0 text-dark">Page Create</h1>
                    </div><!-- /.col -->
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="">Home</a></li>
                            <li class="breadcrumb-item"><a href="{{ route('page.index') }}">All Page list</a></li>
                            <li class="breadcrumb-item active">Create Website</li>
                        </ol>
                    </div>
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
                                    <h3 class="card-title">Page Create -</h3>
                                    <a href="{{ route('page.index',$page->id) }}" class="btn btn-success">Go Back to  page List</a>

                                </div>
                            </div>
                            <div class="card-body p-0">
                                <div class="row">
                                    <div class="col-12 col-lg-8 offset-lg-2 col-md-8 offset-md-2">
                                        <div class="card-body">
                                            <form action="{{ route('page.update' ,$page->id) }}" method="post">
                                                @csrf
                                                <div class="modal-body">
                                                    <div class="form-group ">
                                                        <label for="exampleInputEmail1">Page Position</label>
                                                        <select name="page_position" class="form-control" id="">
                                                            <option value="1" {{($page->page_position==1 ? "selected" : ""  )}}>Line One</option>
                                                            <option value="2" {{($page->page_position ==2  ? "selected" : "")}}>Line Two</option>
                                                        </select>
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="exampleInputEmail1">Page Name</label>
                                                        <input type="text" class="form-control "  aria-describedby="emailHelp" name="page_name" placeholder="Page Name"  value="{{$page->page_name }}" >
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="exampleInputEmail1">Page Title</label>
                                                        <input type="text" class="form-control "  aria-describedby="emailHelp" name="page_title" placeholder="Page Title" value="{{$page->page_title }}">
                                                    </div>
                                                    <div class="form-group  col-md-12">
                                                        <label for="page_description">Page Description</label>
                                                        <textarea class="textarea" placeholder="Place some text here" name="page_description"> {{$page->page_description }}</textarea>
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
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </section>
@endsection


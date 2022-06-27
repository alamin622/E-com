
@extends('layouts.admin')

@section('admin_content')
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Edit User Role</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">

          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->
     <section class="content">
      <div class="container-fluid">
        <div class="row"  >
          <div class="col-12" >
            <div class="card" style="justify-content: center">
              <div class="card-header">
                <h3 class="card-title">Edit User</h3>
              </div>
              <form action="{{ route('role.update') }}" method="POST" >
                @csrf
                <input type="hidden" name="id" value="{{ $user->id }}">
            <div class="form-layout " >
                <div class="row " style="justify-content: center">
                    <div class="col-lg-6">
                      <div class="form-group">
                        <label class="form-control-label"> Name: <span class="tx-danger">*</span></label>
                        <input class="form-control" type="text" name="name" value="{{ $user->name }}" required="">
                      </div>
                    </div><!-- col-4 -->
                    </div>
                    <!-- col-4 -->
                    <div class="row " style="justify-content: center">
                    <div class="col-lg-6">
                      <div class="form-group">
                        <label class="form-control-label">Email <span class="tx-danger">*</span></label>
                        <input class="form-control" type="email" name="email" value="{{ $user->email }}"  required="">
                      </div>
                    </div>
                    </div>
                    <!-- col-4 -->

            </div><!-- col-4 -->

              <!-- row -->
              <br><hr>
              <div class="row" style="justify-content: center">
                  <div class="col-lg-4">
                      <label class="ckbox">
                        <input type="checkbox" name="category" value="1" <? php if($user-<category==1){
                            echo "checked";
                        } ?>
                        <span>Category</span>
                      </label>
                  </div>
              </div>
            </div>
              <br><br><hr>
              <div class="form-layout-footer">
                <button class="btn btn-info mg-r-5" type="submit">Submit </button>
              </div><!-- form-layout-footer -->
            </div><!-- form-layout -->

            </form>
        </div>
      </div>
     </section>
  </div>

@endsection



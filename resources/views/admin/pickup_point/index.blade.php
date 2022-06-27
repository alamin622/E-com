@extends('layouts.admin')

@section('admin_content')
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Pickup Point</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <button class="btn btn-primary" data-toggle="modal" data-target="#addModal"> + Add New</button>
            </ol>
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
                <h3 class="card-title">All Pickup Point list here</h3>
              </div>
              <!-- /.card-header -->
                <div class="card-body">
                  <table id="" class="table table-bordered table-striped table-sm ytable">
                    <thead>
                    <tr>
                      <th>SL</th>
                      <th> Name</th>
                      <th> Address</th>
                      <th> Phone</th>
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

{{-- Warehouse insert modal --}}
<div class="modal fade" id="addModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Add New Pickup Point</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
     <form action="{{ route('pickup_point.store') }}" method="Post" id="add-form">
      @csrf
      <div class="modal-body">

          <div class="form-group">
            <label for="name"> Name</label>
            <input type="text" class="form-control"  name="name" >
            <small id="emailHelp" class="form-text text-muted">This is your  pickup point Name</small>
          </div>
          <div class="form-group">
              <label for="address"> Addresss</label>
              <input type="text" class="form-control"  name="address">
              <small id="emailHelp" class="form-text text-muted">This is your  pickup point address</small>
          </div>

          <div class="form-group">
              <label for="phone"> Phone</label>
              <input type="text" class="form-control"  name="phone" >
              <small id="emailHelp" class="form-text text-muted">This is your  pickup point phone</small>
          </div>

      </div>
      <div class="modal-footer">
        <button type="Submit" class="btn btn-primary"> <span class="d-none"> loading..... </span>  Submit</button>
      </div>
      </form>
    </div>
  </div>
</div>

{{-- edit modal --}}
<div class="modal fade" id="editModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Edit  pickup point</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
     <div id="modal_body">

     </div>
    </div>
  </div>
</div>


  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>

<script type="text/javascript">
	$(function pickup_point(){
		var table=$('.ytable').DataTable({
			processing:true,
			serverSide:true,
			ajax:"{{ route('pickup_point.index') }}",
			columns:[
				{data:'DT_RowIndex',name:'DT_RowIndex'},
                {data:'name'  ,name:'name'},
                {data:'address'  ,name:'address'},
                {data:'phone'  ,name:'phone'},
				{data:'action',name:'action',orderable:true, searchable:true},

			]
		});
	});
    $('body').on('click','.edit', function(){
        let id=$(this).data('id');
        $.get("pickup_point/edit/"+id, function(data){
            $("#modal_body").html(data);
        });
    });
</script>

@endsection

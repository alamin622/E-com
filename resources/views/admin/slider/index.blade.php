@extends('layouts.admin')

@section('admin_content')
<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/Dropify/0.2.2/css/dropify.css">
<link href="https://cdn.jsdelivr.net/gh/gitbrent/bootstrap4-toggle@3.6.1/css/bootstrap4-toggle.min.css" rel="stylesheet">

  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Slider</h1>
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
                <h3 class="card-title">All Slider List Here</h3>
              </div>
              <!-- /.card-header -->
                <div class="card-body">
                  <table id="" class="table table-bordered table-striped table-sm ytable">
                    <thead>
                    <tr>
                      <th>SL</th>
                      <th>Photo</th>
                      <th>Link</th>
                        <th>Published</th>
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

{{-- category insert modal --}}
<div class="modal fade" id="addModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Add New Slider</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
     <form action="{{ route('slider.store') }}" method="Post" enctype="multipart/form-data" id="add-form">
      @csrf
      <div class="modal-body">

           <div class="form-group">
            <label for="brand-photo">Photo</label>
            <input type="file" class="dropify" data-height="140" id="input-file-now" name="photo" required="">
            <small id="emailHelp" class="form-text text-muted">This is your Slider Logo </small>
          </div>
          <div class="form-group">
              <label for="link-name">Link</label>
              <input type="text" class="form-control"  name="link" >
              <small id="emailHelp" class="form-text text-muted">This is your Link </small>
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
        <h5 class="modal-title" id="exampleModalLabel">Edit Slider</h5>
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
<script src="https://cdn.jsdelivr.net/gh/gitbrent/bootstrap4-toggle@3.6.1/js/bootstrap4-toggle.min.js"></script>
<script src="https://gitcdn.github.io/bootstrap-toggle/2.2.2/js/bootstrap-toggle.min.js"></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/Dropify/0.2.2/js/dropify.js"></script>
<script type="text/javascript">
	$('.dropify').dropify();
</script>

<!--published slider-->

<script  type="text/javascript">
    $('body').on('click','.active_status', function(){
        let id=$(this).data('id');
        //alert(id);
        $.ajax({
            url: "{{url("slider/activestatus")}}/"+id,
            type: 'get',
            success: function (data) {
                $('.ytable').DataTable().ajax.reload();
            }
        });
    });

    $('body').on('click','.deactive_status', function(){
        let id=$(this).data('id');
        $.ajax({
            url: "{{url("slider/deactivestatus")}}/"+id,
            type: 'get',
            success: function (data) {
                $('.ytable').DataTable().ajax.reload();
            }
        });
    });
</script>
<script type="text/javascript">
	$(function slider(){
		var table=$('.ytable').DataTable({
			processing:true,
			serverSide:true,
			ajax:"{{ route('slider.index') }}",
			columns:[
				{data:'DT_RowIndex',name:'DT_RowIndex'},
                {data:'photo',name:'photo', render: function(data, type ,full,meta){
                        return "<img src=\"" +data+ "\"  height=\"30\" />";
                    }},
				{data:'link'  ,name:'link'},
                {data:'status'  ,name:'status'},
				{data:'action',name:'action',orderable:true, searchable:true},

			]
		});
	});

  $('body').on('click','.edit', function(){
    let id=$(this).data('id');
    $.get("slider/edit/"+id, function(data){
         $("#modal_body").html(data);
    });
  });
</script>

@endsection

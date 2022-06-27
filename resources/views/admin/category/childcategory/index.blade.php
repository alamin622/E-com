@extends('layouts.admin')

@section('admin_content')
    <link href="https://cdn.jsdelivr.net/gh/gitbrent/bootstrap4-toggle@3.6.1/css/bootstrap4-toggle.min.css" rel="stylesheet">
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Child Category</h1>
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
                <h3 class="card-title">All Child-categories list here</h3>
              </div>
              <!-- /.card-header -->
                <div class="card-body">
                  <table id="" class="table table-bordered table-striped table-sm ytable">
                    <thead>
                    <tr>
                      <th>SL</th>

                      <th>Category Name</th>
                      <th>SubCategory Name</th>
                      <th>ChildCategory Name</th>
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
        <h5 class="modal-title" id="exampleModalLabel">Add New Child Category</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
     <form action="{{ route('childcategory.store') }}" method="Post" id="add-form">
      @csrf
      <div class="modal-body">
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
                      @foreach($category as $c)
                          @foreach($c->subcategories as $s)
                              <option data-chained="{{$c->id}}" value="{{$s->id}}">
                                  {{$s->subcategory_name}}
                              </option>
                          @endforeach
                      @endforeach
                  </select>
              </div>
          </div>
            -->
      	  <div class="form-group">
            <label for="category_name">Category/Subcategory </label>
            <select class="form-control" name="subcategory_id" required="">
            	@foreach($category as $row)
                  @php
                    $subcat=DB::table('subcategories')->where('category_id',$row->id)->get();
                  @endphp
                  <option disabled="" style="color: blue;"
                  >{{ $row->category_name }}</option>
                  @foreach($subcat as $row)
            	        <option value="{{ $row->id }}"> ---- {{ $row->subcategory_name }}</option>
                  @endforeach
            	@endforeach
            </select>
          </div>

          <div class="form-group">
            <label for="category_name">Child Category Name</label>
            <input type="text" class="form-control"  name="childcategory_name" required="">
            <small id="emailHelp" class="form-text text-muted">This is your childcategory category</small>
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
        <h5 class="modal-title" id="exampleModalLabel">Edit Child Category</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
     <div id="modal_body">

     </div>
    </div>
  </div>
</div>



<script type="text/javascript">
	$(function childcategory(){
		var table=$('.ytable').DataTable({
			processing:true,
			serverSide:true,
			ajax:"{{ route('childcategory.index') }}",
			columns:[
				{data:'DT_RowIndex',name:'DT_RowIndex'},

				{data:'category_name',name:'category_name'},
				{data:'subcategory_name',name:'subcategory_name'},
                {data:'childcategory_name'  ,name:'childcategory_name'},
				{data:'action',name:'action',orderable:true, searchable:true},

			]
		});
	});

  $('body').on('click','.edit', function(){
    let id=$(this).data('id');
    $.get("childcategory/edit/"+id, function(data){
        $("#modal_body").html(data);
    });
  });

</script>
@endsection

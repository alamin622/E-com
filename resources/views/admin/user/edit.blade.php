{{--
     <form action="{{ route('user.update') }}"  method="Post" id="add-form">
      @csrf
      <div class="modal-body">
          <div class="form-group">
            <label for="name"> Name</label>
            <input type="text" class="form-control"  name="name" required="" value="{{ $user->name }}">
          </div>
          <input type="hidden" name="id" value="{{ $user->id }}">

          <div class="form-group">
            <label for="warehouse_address">email</label>
            <input type="email" class="form-control"  name="email" required="" value="{{ $user->email }}">
          </div>

          <div class="form-group">
            <label for="warehouse_phone">Password</label>
            <input type="Password" class="form-control"  name="Password" required="" value="{{ $user->Password }}">
          </div>
      </div>
      <div class="modal-footer">
        <button type="Submit" class="btn btn-primary"> <span class="d-none loader"><i class="fas fa-spinner"></i> Loading..</span> <span class="submit_btn"> Update </span> </button>
      </div>
      </form>

 --}}

 <form action="{{ route('user.update') }}" method="Post" enctype="multipart/form-data">
      @csrf
      <div class="modal-body">
          <div class="form-group">
            <label for="brand-name">Brand Name</label>
            <input type="text" class="form-control"  name="brand_name" value="{{ $data->brand_name }}" required="">
            <small id="emailHelp" class="form-text text-muted">This is your Brand </small>
          </div>
          <input type="hidden" name="id" value="{{ $data->id }}">
           <div class="form-group">
            <label for="brand-name">Brand Logo</label>
            <input type="file"  class="dropify" data-height="140"  name="brand_logo" >
            <input type="hidden" name="old_logo" value="{{ $data->brand_logo }}">
          </div>
      </div>
      <div class="modal-footer">
        <button type="Submit" class="btn btn-primary"> <span class="d-none"> loading..... </span>  Update</button>
      </div>
</form>


<script type="text/javascript">
	$('.dropify').dropify();

</script>

 <form action="{{ route('warehouse.update') }}" method="Post" id="add-form">
      @csrf
      <div class="modal-body">

          <div class="form-group">
            <label for="category_name"> Name</label>
            <input type="text" class="form-control"  name="name"  value="{{ $data->name }}">
            <small id="emailHelp" class="form-text text-muted">This is your  name</small>
          </div>

          <div class="form-group">
              <label for="category_name"> Address</label>
              <input type="text" class="form-control"  name="address" value="{{ $data->address }}">
              <small id="emailHelp" class="form-text text-muted">This is your  Address</small>
          </div>

          <div class="form-group">
              <label for="category_name"> Phone</label>
              <input type="text" class="form-control"  name="phone"  value="{{ $data->phone }}">
              <small id="emailHelp" class="form-text text-muted">This is your  phone</small>
          </div>
      </div>
      <div class="modal-footer">
        <button type="Submit" class="btn btn-primary"> <span class="d-none"> loading..... </span>  Update</button>
      </div>
</form>

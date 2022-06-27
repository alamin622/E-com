<form action="{{ route('coupon.update') }}" method="Post" id="edit_form">
    @csrf
    <div class="modal-body">

        <div class="form-group">
            <label for="brand-coupon_code">Coupon Code</label>
            <input type="text" class="form-control"  name="coupon_code"  value="{{ $data->coupon_code }}">
            <input type="hidden" name="id" id="" value="{{ $data->id }}">
            <small id="emailHelp" class="form-text text-muted">This is your Coupon Name </small>
        </div>
        <div class="form-group">
            <label for="brand-coupon_amount">Coupon Amount</label>
            <input type="text" class="form-control"  name="coupon_amount" value="{{ $data->coupon_amount }}">
            <small id="emailHelp" class="form-text text-muted">This is your Coupon Amount </small>
        </div>
        <div class="form-group">
            <label for="type-name">Coupon Type</label>
            <select name="type" id="" class="form-control">
                <option value="1" {{($data->type==1 ? "selected" : ""  )}}>Fixed </option>
                <option value="2" {{($data->type ==2  ? "selected" : "")}}>Percentage</option>
            </select>
            <small id="emailHelp" class="form-text text-muted">This is your Coupon Type </small>
        </div>
        <div class="form-group">
            <label for="valid_date-name">Coupon Date</label>
            <input type="date" class="form-control"  name="valid_date" value="{{ $data->valid_date }} >
            <small id="emailHelp" class="form-text text-muted">This is your Coupon Date </small>
        </div>
        <div class="form-group">
            <label for="type-name">Coupon Status</label>
            <select name="status" id="" class="form-control">
                <option value="Active @if ($data->type=="active")selected @endif">Active</option>
                <option value="Inactive"  @if ($data->type=="Inactive")selected @endif>Inactive</option>
            </select>
            <small id="emailHelp" class="form-text text-muted">This is your Coupon Type </small>
        </div>

    <div class="modal-footer">
        <button type="Submit" class="btn btn-primary"> <span class="d-none"> loading..... </span>  Update</button>
    </div>
</form>
<script type="text/javascript">
    //data passed through here
    $('#edit_form').submit(function (e) {
        e.preventDefault();
        var url = $(this).attr('action');
        var request  = $(this).serialize();
        $.ajax({
            url:url,
            type:'post',
            async:false,
            data:request,
            success:function (data) {
                $('#edit_form')[0].reset();
                $('#editModal').modal('hide');
                table.ajax.reload();
            }
        });
    });
</script>

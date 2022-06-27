<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/Dropify/0.2.2/css/dropify.css">
<form action="{{ route('campaign.update') }}" method="Post" enctype="multipart/form-data">
    @csrf
    <div class="modal-body">
        <div class="form-group">
            <label for="brand-name " class=" col-form-label required " >Title</label>
            <input type="text" class="form-control" value="{{ $data->title }}"   name="title" required="">
        </div>

        <div class="form-group">
            <label for="brand-name " class=" col-form-label required ">Start Date</label>
            <input type="date" class="form-control" value="{{ $data->start_date }}"  name="start_date" required="">
        </div>
        <div class="form-group">
            <label for="brand-name">End Date</label>
            <input type="date" class="form-control" value="{{ $data->end_date }}"  name="end_date" >
        </div>
        <div class="form-group">
            <label for="brand-name "  class=" col-form-label required ">Discount</label>
            <input type="text" class="form-control" value="{{ $data->discount }}"  name="discount" required="">
        </div>

        <div class="form-group">
            <label for="brand-name">Status</label>
            <select name="status" class="form-control"  id="status">
                <option value="1" {{($data->status==1 ? "selected" : ""  )}}>Active</option>
                <option value="2" {{($data->status==2 ? "selected" : ""  )}}>Inactive</option>
            </select>
        </div>

        <input type="hidden" name="id" value="{{ $data->id }}">
        <div class="form-group">
            <label for="brand-name ">Brand Logo</label>
            <input type="file"  class="dropify" data-height="140"  name="brand_logo"  >
            <input type="hidden" name="old_logo" value="{{ $data->image }}">
        </div>
    </div>
    <div class="modal-footer">
        <button type="Submit" class="btn btn-primary"> <span class="d-none"> loading..... </span>  Update</button>
    </div>
</form>

<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/Dropify/0.2.2/js/dropify.js"></script>
<script type="text/javascript">
    $('.dropify').dropify();

</script>

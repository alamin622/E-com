<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/Dropify/0.2.2/css/dropify.css">
<form action="{{ route('category.update') }}" method="Post" enctype="multipart/form-data">
    @csrf
    <div class="modal-body">
        <div class="form-group">
            <label for="brand-name">Category name</label>
            <input type="text" class="form-control"  name="category_name" value="{{ $data->category_name }}" required="">
        </div>
        <input type="hidden" name="id" value="{{ $data->id }}">
        <div class="form-group">
            <label for="brand-name">Image</label>
            <input type="file"  class="dropify" data-height="140"  name="image" >
            <input type="hidden" name="old_logo" value="{{ $data->image }}">
        </div>
        <div class="form-group">
            <label for="icon">icon</label>
            <input type="file"  class="dropify" data-height="140"  name="icon" >
            <input type="hidden" name="old_icon" value="{{ $data->icon }}">
        </div>
        <div class="form-group">
            <label for="home_page">Home Page</label>
            <select name="home_page" class="form-control"  id="home_page">
                <option value="1" {{($data->home_page==1 ? "selected" : ""  )}}>Yes</option>
                <option value="2" {{($data->home_page==0 ? "selected" : ""  )}}>No </option>
            </select>
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

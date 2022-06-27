
@foreach ($data as $item)
<option value="{{$item->id}}">{{$item->subcategory_name}}</option>
@endforeach

@include('/admin/header')
<div id="admin-content">
  <div class="container">
  <div class="row">
    <div class="col-md-12">
        <h1 class="admin-heading">Update Post</h1>
    </div>
    <div class="col-md-offset-3 col-md-6">
        <!-- Form for show edit-->
        <form action="/admin/saveUpdatePost" method="POST" enctype="multipart/form-data" autocomplete="off">
            @csrf
            <div class="form-group">
                <input type="hidden" name="post_id"  class="form-control" value={{$row['id']}} placeholder="">
            </div>
            <div class="form-group">
                <label for="exampleInputTile">Title</label>
                <input type="text" name="post_title"  class="form-control" id="exampleInputUsername" value="{{$row['title']}}">
            </div>
            <div class="form-group">
                <label for="exampleInputPassword1"> Description</label>
                <textarea name="postdesc" class="form-control"  required rows="5">
                {{$row['description']}}
                </textarea>
            </div>
            <div class="form-group">
                <label for="exampleInputCategory">Category</label>
<select class="form-control" name="category">
@foreach($result as $row1)
@if($row1['category_id']==$row['category_id'])
    @php $select= 'selected'; @endphp
@else
    @php $select= ''; @endphp
@endif
    <option $select value={{$row1['category_id']}}>{{$row1['category_name']}} </option>
@endforeach
</select>

            </div>
            <div class="form-group">
                <label for="">Post image</label>
                <input type="file" name="new_image" >   
                <img src="{{ asset('storage/images/'.$row['post_img']) }}" height="150px">
                <input type="hidden" name="old_image" value="{{$row['post_img']}}" placeholder="{{$row['post_img']}}">
            </div>
            <input type="submit" name="submit" class="btn btn-primary" value="Update" />
        </form>
        <!-- Form End -->
      </div>
    </div>
  </div>
</div>
@include('/admin/footer')

@include("/admin/header")
  <div id="admin-content">
      <div class="container">
         <div class="row">
             <div class="col-md-12">
                 <h1 class="admin-heading">Add New Post</h1>
             </div>
              <div class="col-md-offset-3 col-md-6">
                  <!-- Form -->
                  <form  action="/admin/savePost" method="POST" enctype="multipart/form-data">
                  @csrf
                      <div class="form-group">
                          <label for="post_title">Title</label>
                          <input type="text" name="post_title" class="form-control" autocomplete="off" required>
                      </div>
                      <div class="form-group">
                          <label for="exampleInputPassword1"> Description</label>
                          <textarea name="postdesc" class="form-control" rows="5"  required></textarea>
                      </div>
                      <div class="form-group">
                          <label for="exampleInputPassword1">Category</label>
                          <select name="category" class="form-control">
                          <option disabled>Select Category</option>
@foreach($result  as $row)
        <option value={{$row['category_id']}}>{{$row['category_name']}} </option>
@endforeach
                          </select>
                      </div>
                      <div class="form-group">
                          <label for="">Post image</label>
                          <input type="file" name="image" required>
                      </div>
                      <input type="submit" name="submit" class="btn btn-primary" value="Save" required />
                  </form>
                  <!--/Form -->
              </div>
          </div>
      </div>
</div>
@include("/admin/footer")

@include("/admin/header")
  <div id="admin-content">
      <div class="container">
          <div class="row">
              <div class="col-md-10">
                  <h1 class="admin-heading">All Posts</h1>
              </div>
              <div class="col-md-2">
                  <a class="add-new" href="addPost">add post</a>
              </div>
              <div class="col-md-12">
                  <table class="content-table">
                      <thead>
                          <th>S.No.</th>
                          <th>Title</th>
                          <th>Category</th>
                          <th>Date</th>
                          <th>Author</th>
                          <th>Edit</th>
                          <th>Delete</th>
                      </thead>
                      <tbody>
@foreach($result as $row)
                          <tr>
                              <td class='id'>{{$row['id']}}</td>
                              <td>{{$row['title']}} </td>
@foreach($result1 as $row1)
@if($row['category_id']==$row1['category_id']) 
                              <td>{{$row1['category_name']}} </td>
@endif
@endforeach
                              <td>{{$row['created_at']}}</td>
                              <td>{{$row['author_id']}}</td>
                              <td class='edit'><a href={{ "update-post/".$row['id'] }}><i class='fa fa-edit'></i></a></td>
                              <td class='delete'><a href={{ "deletePost/".$row['id'] }}><i class='fa fa-trash-o'></i></a></td>
                          </tr>
@endforeach
                      </tbody>
                  </table>
<!--  Pagination -->
              </div>
          </div>
      </div>
  </div>
@include("/admin/footer")

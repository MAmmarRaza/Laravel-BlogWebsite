@include('/admin/header')
  <div id="admin-content">
      <div class="container">
          <div class="row">
              <div class="col-md-10">
                  <h1 class="admin-heading">All Users</h1>
              </div>
              <div class="col-md-2">
                  <a class="add-new" href="/admin/addUser">add user</a>
              </div>
              <div class="col-md-12">
                  <table class="content-table">
                      <thead>
                          <th>S.No.</th>
                          <th>Full Name</th>
                          <th>User Name</th>
                          <th>Role</th>
                          <th>Edit</th>
                          <th>Delete</th>
                      </thead>

                      <tbody>
@foreach ($result as $row)
    

                          <tr>
                              <td class='id'>{{$row['user_id']}}</td>
                              <td>{{$row['first_name']. " ". $row['last_name']}}</td>
                              <td>{{$row['username']}}</td>
                              <td>{{$row['role']}}</td>
                              <td class='edit'><a href={{"/admin/update-user/".$row['user_id']}}><i class='fa fa-edit'></i></a></td>
                              <td class='delete'><a href={{"/admin/delete-user/".$row['user_id']}}><i class='fa fa-trash-o'></i></a></td>
                          </tr>
@endforeach
                      </tbody>
                  </table>
<!--  Pagination -->
              </div>
          </div>
      </div>
  </div>

@include('/admin/footer')
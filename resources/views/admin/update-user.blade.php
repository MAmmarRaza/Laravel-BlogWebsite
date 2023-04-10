@include('/admin/header')
  <div id="admin-content">
      <div class="container">
          <div class="row">
              <div class="col-md-12">
                  <h1 class="admin-heading">Modify User Details</h1>
              </div>
              <div class="col-md-offset-4 col-md-4">
                  <!-- Form Start -->
                  <form  action="/admin/updateUserData" method ="POST">
                  @csrf
                      <div class="form-group">
                          <input type="hidden" name="user_id"  class="form-control" value="{{ $row['user_id']}}" placeholder="" >
                      </div>
                          <div class="form-group">
                          <label>First Name</label>
                          <input type="text" name="fname" class="form-control" value="{{ $row['first_name']}}" placeholder="" required>
                      </div>
                      <div class="form-group">
                          <label>Last Name</label>
                          <input type="text" name="lname" class="form-control" value="{{$row['last_name']}}" placeholder="" required>
                      </div>
                      <div class="form-group">
                          <label>User Name</label>
                          <input type="text" name="username" class="form-control" value="{{ $row['username']}}" placeholder="" required>
                      </div>
                      <div class="form-group">
                          <label>User Role</label>
                          <select class="form-control" name="role" value="{{ $row['role']}}" >
                        @php
                            if($row['role'] == 0){
                               echo " <option value='0' selected >normal User</option>
                               <option value='1'>Admin</option>";
                            }else if($row['role'] == 1){
                                echo " <option value='0'  >normal User</option>
                               <option value='1' selected >Admin</option>";
                            }
                          @endphp                              
                          </select>
                      </div>
                      <input type="submit" name="submit" class="btn btn-primary" value="Update" required />
                  </form>
                  <!-- /Form -->
              </div>
          </div>
      </div>
  </div>
@include('/admin/footer')

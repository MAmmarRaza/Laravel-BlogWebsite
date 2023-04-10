@include("/admin/header")

<div id="admin-content">
    <div class="container">
        <div class="row">
            <div class="col-md-10">
                <h1 class="admin-heading">All Categories</h1>
            </div>
            <div class="col-md-2">
                <a class="add-new" href="/admin/add-category" >add category</a>
            </div>
            <div class="col-md-12">
                <table class="content-table">
                    <thead>
                        <th>S.No.</th>
                        <th>Category Name</th>
                        <th>No. of Posts</th>
                        <th>Edit</th>
                        <th>Delete</th>
                    </thead>
                    <tbody>

@foreach($result as $row)

                        <tr>
                            <td class='id'>{{$row['category_id'] }}</td>
                            <td>{{$row['category_name']}}</td>
                            <td> {{$row['post']}}</td>
                            <td class='edit'><a href={{ "update-category/".$row['category_id'] }} ><i class='fa fa-edit'></i></a></td>
                            <td class='delete'><a href={{ "deleteCategory/".$row['category_id'] }} ><i class='fa fa-trash'></i></a></td>
                        </tr>
@endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@include("/admin/footer")

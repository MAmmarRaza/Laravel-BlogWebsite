<div id="sidebar" class="col-md-4">
    <!-- search box -->
    <div class="search-box-container">
        <h4>Search</h4>
        <form class="search-post" action="/search" method ="post">
            @csrf
            <div class="input-group">
                <input type="text" name="search" class="form-control" placeholder="Search .....">
                <span class="input-group-btn">
                    <button type="submit" class="btn btn-danger">Search</button>
                </span>
            </div>
        </form>
    </div>
    <!-- /search box -->
    <!-- recent posts box -->
    <div class="recent-post-container">
        <h4>Recent Posts</h4>
@foreach ($result as $row)
    
        <div class="recent-post">
            <a class="post-img" href="{{"/single/".$row['id']}}">
                <img src="{{ asset('storage/images/'.$row['post_img']) }}" alt=""/>
            </a>
            <div class="post-content">
                <h5><a href="{{"/single/".$row['id']}}">{{$row['title']}}</a></h5>
                <span>
                    <i class="fa fa-tags" aria-hidden="true"></i>
                    <a href="{{"/category/".$row['category_id']}}">{{$row['category_name']}}</a>
                </span>
                <span>
                    <i class="fa fa-calendar" aria-hidden="true"></i>
                    {{$row['created_at']}}
                </span>
                <a class="read-more" href="{{"/single/".$row['id']}}">read more</a>
            </div>
        </div>
@endforeach
    </div>
    <!-- /recent posts box -->
</div>

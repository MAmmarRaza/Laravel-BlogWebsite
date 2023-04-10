@include('header')
<div id="main-content">
    <div class="container">
        <div class="row">
            <div class="col-md-8">
                <!-- post-container -->
                <div class="post-container">
@foreach($result as $row)
                        <div class="post-content">
                            <div class="row">
                                <div class="col-md-4">
                                    <a class="post-img" href="{{"/single/".$row['id']}}"><img src="{{ asset('storage/images/'.$row['post_img']) }}" alt=""/></a>
                                </div>
                                <div class="col-md-8">
                                    <div class="inner-content clearfix">
                                        <h3><a href={{"/single/".$row['id']}}>{{$row['title']}}</a></h3>
                                        <div class="post-information">
                                            <span>
                                                <i class="fa fa-tags" aria-hidden="true"></i>
                                                <a href="{{"category/".$row['category_id']}}">{{$row['category_name']}}</a>
                                            </span>
                                            <span>
                                                <i class="fa fa-user" aria-hidden="true"></i>
                                                <a href="{{"author/".$row['user_id']}}">{{$row['username']}}</a>
                                            </span>
                                            <span>
                                                <i class="fa fa-calendar" aria-hidden="true"></i>
                                                {{$row['created_at']}}
                                            </span>
                                        </div>
                                        <p class="description">
                                            {{-- echo substr($row['description'],0,130) . "..."; --}}
                                            {{ substr($row['description'], 0, 130) . "..." }}
                                        </p>
                                        <a class='read-more pull-right' href="{{"/single/".$row['id']}}">read more</a>
                                    </div>
                                </div>
                            </div>
                        </div>
@endforeach
<div class="pagination" style="color:black;">
    {{ $result->links() }}
</div>
                    </div>
                    <!-- /post-container -->   
            </div>
                @include('sidebar')
        </div>
    </div>
</div>
@include('footer')
<style>
.pagination li a{
    color: black;
}
</style>

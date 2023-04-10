@include('header')
    <div id="main-content">
        <div class="container">
            <div class="row">
                <div class="col-md-8">
                  <!-- post-container -->
@foreach($result as $row)
                    <div class="post-container">
                        <div class="post-content single-post">
                            <h3>{{$row['title']}}</h3>
                           
                            <div class="post-information">
                                <span>
                                    <i class="fa fa-tags" aria-hidden="true"></i>
                                    {{ $row['category_name']}}
                                </span>
                                <span>
                                    <i class="fa fa-user" aria-hidden="true"></i>
                                    <a href="{{"/author/".$row['user_id']}}">{{ $row['username']}}</a>
                                </span>
                                <span>
                                    <i class="fa fa-calendar" aria-hidden="true"></i>
                                    {{ $row['created_at']}}
                                </span>
                            </div>
                            <img class="single-feature-image" src="{{ asset('storage/images/'.$row['post_img']) }}" alt=""/>
                            <p class="description">
                                {{  $row['description']}}
                            </p>
                        </div>
                    </div>
@endforeach
                    <!-- /post-container -->
                </div>
                @include('sidebar')
            </div>
        </div>
    </div>
@include('footer')

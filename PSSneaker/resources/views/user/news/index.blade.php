@extends('user.index')
@section('content')
<section>
    <div class="container">
        <div class="row">
            <div class="col-sm-12">
                <div class="bg">
                    <h2 class="title text-center">Tin tức</h2>
                </div>
                <div class="blog-post-area">
                    @foreach($lstnews as $news)
                    <div class="single-blog-post">
                        <h3>{{$news->name}}</h3>
                        <a href="{{route('newsdetail',$news->id)}}">
                            <img src="{{$news->image}}" alt="{{$news->name}}">
                        </a>
                        <p class="created_at_news">Ngày đăng: {{$news->created_at}}</p>
                        <p class="describe_news">{{$news->describe}}</p>
                        <a class="btn btn-primary" href="{{route('newsdetail',$news->id)}}">Xem chi tiết</a>
                    </div>
                    <hr>
                    @endforeach
                    <div class="pagination flex-wrap justify-content-center">
                        {!! $lstnews->links() !!}
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
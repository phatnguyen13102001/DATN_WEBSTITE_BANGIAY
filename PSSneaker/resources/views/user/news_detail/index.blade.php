@extends('user.index')
@section('content')
<section>
    <div class="container">
        <div class="row">
            <div class="col-sm-12">
                <div class="bg">
                    <h2 class="title text-center">{{$lstnews->name}}</h2>
                </div>
                <div class="time-main"><i class="fas fa-calendar-week"></i><span>{{ date("h:i:s A - d/m/Y", strtotime($lstnews->created_at)) }}</span></div>
                @if(($lstnews->content)===NULL)
                <div class="alert alert-warning w-100" role="alert">
                    <p>Nội dung đang cập nhật</p>
                </div>
                @else
                <div class="blog-post-area">
                    <div class="single-blog-post">
                        <div class="content_news">
                            {!! htmlspecialchars_decode(nl2br($lstnews->content)) !!}
                        </div>
                    </div>
                </div>
                @endif
                <div class="share othernews mb-3">
                    <b>Bài viết khác:</b>
                    <ul class="list-news-other">
                        @foreach($lstnewssame as $newssame)
                        <li><a class="text-decoration-none" href="{{route('newsdetail',$newssame->id)}}" title="{{$newssame->name}}">{{$newssame->name}} || {{$newssame->created_at}}</a></li>
                        @endforeach
                    </ul>
                    <div class="pagination-home w-100"></div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
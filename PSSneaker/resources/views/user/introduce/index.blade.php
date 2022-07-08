@extends('user.index')
@section('content')
<div class="wrap_pagegioithieu">
    <div class="container">
        <div class="bg">
            <div class="row">
                <div class="col-sm-12">
                    <h2 class="title text-center">{{$gioithieu->title}}</h2>
                    <div class="content_wrapgioithieu">
                        {!! htmlspecialchars_decode(nl2br($gioithieu->content)) !!}
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
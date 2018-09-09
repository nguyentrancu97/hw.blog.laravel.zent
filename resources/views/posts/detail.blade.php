@extends('layouts.master')
@section('content')
<!-- CONTENT -->
<div class="content col-xs-8">
    <!-- ARTICLE 1 -->
    <article>
        <div class="post-image">
            <img src="{{$post->thumbnail}}" alt="post image 1">
        </div>
        <div class="post-text">
            <h2>{{$post->title}}</h2>
        </div>
        <div class="post-text text-content">
            <div class="text">
                <p>{{$post->content}}</p>
            </div>
        </div>
        {{-- <div class="post-info">
            <div class="post-by">Tag:
            @foreach($post->tags as $tag)
                <a href="{{asset('')}}tag/{{$tag->slug}}">{{$tag->name}}</a>
            @endforeach
            </div>
            <div class="extra-info">
                <a href="#"><i class="icon-facebook5"></i></a>
                <a href="#"><i class="icon-twitter4"></i></a>
                <a href="#"><i class="icon-google-plus"></i></a>
                <span class="comments">25 <i class="icon-bubble2"></i></span>
            </div>
            <div class="clearfix"></div>
        </div> --}}
        <div class="widget tags">
                <h3 class="widget-title">
                    Tags
                </h3>
                <div class="tags-container">
                    @foreach($post->tags as $tag)

                    <a href="{{asset('')}}tag/{{$tag->slug}}">{{$tag->name}}</a>
                    @endforeach
                                                      
                </div>
                <div class="clearfix"></div>
            </div> 
    </article>
</div>
@endsection

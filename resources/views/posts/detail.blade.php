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
    </article>
</div>
<!-- SIDEBAR -->
<div class="sidebar col-xs-4">
    <!-- ABOUT ME -->
    <div class="widget about-me">
        <div class="ab-image">
            <img src="{{URL::asset('blog_assets/img/about-me.jpg')}}"  alt="about me">
            <div class="ab-title">About Me</div>
        </div>
        <div class="ad-text">
            <p>Lorem ipsum dolor sit consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore.</p>
            <span class="signing"><img src="{{URL::asset('')}}blog_assets/img/signing.png" alt="signing"></span>
        </div>
    </div>
    <!-- LATEST POSTS -->
    <div class="widget latest-posts">
        <h3 class="widget-title">
            Latest Posts
        </h3>

        <div class="posts-container">
            @foreach($lastPosts as $lastPost)
            <div class="item">
                <img src="{{$lastPost->thumbnail}}" alt="post 1" class="post-image">
                <div class="info-post">
                    <h5><a href="#">{{$lastPost->title}}</a></h5>
                    <span class="date">{{$lastPost->created_at}}</span>
                </div>
                <div class="clearfix"></div>
            </div>
            @endforeach    
            <div class="clearfix"></div>
        </div>
    </div>
    <!-- FOLLOW US -->
    <div class="widget follow-us">
        <h3 class="widget-title">
            Follow Us
        </h3>
        <div class="follow-container">
            <a href="#"><i class="icon-facebook5"></i></a>
            <a href="#"><i class="icon-twitter4"></i></a>
            <a href="#"><i class="icon-google-plus"></i></a>
            <a href="#"><i class="icon-vimeo4"></i></a>
            <a href="#"><i class="icon-linkedin2"></i></a>
        </div>
        <div class="clearfix"></div>
    </div>
    <!-- TAGS -->
    <div class="widget tags">
        <h3 class="widget-title">
            Tags
        </h3>
        <div class="tags-container">
            <a href="#">Audio</a>
            <a href="#">Travel</a>
            <a href="#">Food</a>
            <a href="#">Event</a>
            <a href="#">Wordpress</a>
            <a href="#">Video</a>
            <a href="#">Design</a>
            <a href="#">Sport</a>
            <a href="#">Blog</a>
            <a href="#">Post</a>
            <a href="#">Img</a>
            <a href="#">Masonry</a>
        </div>
        <div class="clearfix"></div>
    </div>
    <!-- ADVERTISING -->
    <div class="widget advertising">
        <div class="advertising-container">
            <img src="{{URL::asset('')}}blog_assets/img/350x300.png" alt="banner 350x300">
        </div>
    </div>
    <!-- NEWSLETTER -->
    <div class="widget newsletter">
        <h3 class="widget-title">
            Newsletter
        </h3>
        <div class="newsletter-container">
            <h4>DO NOT MISS OUR NEWS</h4>
            <p>Sign up and receive the
                <br> latest news of our company</p>
                <form>
                    <input type="email" class="newsletter-email" placeholder="Your email address...">
                    <button type="submit" class="newsletter-btn">Send</button>
                </form>
            </div>
            <div class="clearfix"></div>
        </div>
    </div>
    <!-- #SIDEBAR -->
    <div class="clearfix"></div>
    @endsection


{{-- kế thừa từ trang master --}}
@extends('layouts.master') 

{{-- thay đổi nội dung phần content --}}
@section('content')
<!-- CONTENT -->
<div class="content col-xs-8">
    <!-- ARTICLE  -->  
    {{-- kiểm tra sự tồn tại của dữ liệu trước khi dùng --}}
    @if(isset($posts)) 
    {{-- in tất cả bài viết ra bằng foreach --}}
    @foreach ($posts as $post)

    <article>
        <div class="post-image">
            <img src="{{ asset($post->thumbnail) }}" alt="post image 1">
            <div class="category"><a href="{{asset('')}}category/{{$post->category->slug}}">IMG</a></div>
        </div>
        <div class="post-text">
            <span class="date">{{ $post->created_at }}</span>
            <h2><a href="{{asset('')}}blog/{{$post->slug}}">{{ $post->title }}</a></h2>
            <p class="text">
                {!! $post->description !!}
                <a href="#"><i class="icon-arrow-right2"></i></a>
            </p>                                 
        </div>
        <div class="post-info">
            <div class="post-by">Post By <a href="#">AD-Theme</a></div>
            <div class="extra-info">
                <a href="#"><i class="icon-facebook5"></i></a>
                <a href="#"><i class="icon-twitter4"></i></a>
                <a href="#"><i class="icon-google-plus"></i></a>
                <span class="comments">25 <i class="icon-bubble2"></i></span>
            </div>
            <div class="clearfix"></div>
        </div>
    </article>

    @endforeach
    @endif

    <!-- NAVIGATION -->
    <div class="navigation">
        @if($posts->currentPage() != 1)
        <a href="{{$posts->url($posts->currentPage()-1)}}" class="prev"><i class="icon-arrow-left8"></i> Previous Posts</a>
        @endif
        @if($posts->currentPage()!= $posts->lastPage())
        <a href="{{$posts->url($posts->currentPage()+1)}}" class="next">Next Posts <i class="icon-arrow-right8"></i></a>
        @endif
        <div class="clearfix"></div>
        
        
    </div>
    
</div>


<!-- SIDEBAR -->
<div class="sidebar col-xs-4">


    <!-- ABOUT ME -->                    
    <div class="widget about-me">
        <div class="ab-image">
            <img src="blog_assets/img/about-me.jpg" alt="about me">
            <div class="ab-title">About Me</div>
        </div>
        <div class="ad-text">
            <p>Lorem ipsum dolor sit consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore.</p>
            <span class="signing"><img src="blog_assets/img/signing.png" alt="signing"></span>
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
            <img src="{{asset('')}}blog_assets/img/350x300.png" alt="banner 350x300">
        </div>
    </div>


    <!-- NEWSLETTER -->                          
    <div class="widget newsletter">
        <h3 class="widget-title">
            Newsletter
        </h3>
        <div class="newsletter-container">
            <h4>DO NOT MISS OUR NEWS</h4>
            <p>Sign up and receive the <br> latest news of our company</p> 
            <form>
             <input type="email" class="newsletter-email" placeholder="Your email address...">
             <button type="submit" class="newsletter-btn">Send</button>
         </form>                                  
     </div>
     <div class="clearfix"></div>
 </div>  

</div> <!-- #SIDEBAR -->

<div class="clearfix"></div>
@endsection
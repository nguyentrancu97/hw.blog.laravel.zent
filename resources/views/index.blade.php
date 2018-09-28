
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
            <img src="{{ asset('storage')}}/{{$post->thumbnail }}" alt="post image 1">
            <div class="category"><a href="{{asset('')}}category/{{$post->category->slug}}">{{$post->category->name}}</a></div>
        </div>
        <div class="post-text">
            <span class="date">
                @php
                $date = new DateTime($post->created_at); // tạo biến mới để đổi kiểu thời gian mặc định của csdl
                $month_num = $date->format('m'); //lấy ra tháng
                $convert_month = DateTime::createFromFormat('!m',$month_num); //convert tháng sang kiểu chữ

                @endphp
                {{$convert_month->format('F')}} {{$date->format('d')}}, {{$date->format('Y')}}
            </span>
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
                <span class="comments">{{$post->view_post}}view</span>
            </div>
            <div class="clearfix"></div>
        </div>
    </article>

    @endforeach
    @endif
    @if(isset($name))
    <div class="navigation">
        @if($posts->currentPage() != 1)
        <a href="{{$posts->appends(['name' => $name])->previousPageUrl()}}" class="prev"><i class="icon-arrow-left8"></i> Previous Posts</a>
        @endif
        @if($posts->currentPage()!= $posts->lastPage())
        <a href="{{$posts->appends(['name' => $name])->nextPageUrl()}}" class="next">Next Posts <i class="icon-arrow-right8"></i></a>
        @endif
        <div class="clearfix"></div>
        
        
    </div>
    @else
    <div class="navigation">
        @if($posts->currentPage() != 1)
        <a href="{{$posts->previousPageUrl()}}" class="prev"><i class="icon-arrow-left8"></i> Previous Posts</a>
        @endif
        @if($posts->currentPage()!= $posts->lastPage())
        <a href="{{$posts->nextPageUrl()}}" class="next">Next Posts <i class="icon-arrow-right8"></i></a>
        @endif
        <div class="clearfix"></div>
        
        
    </div>
   
    @endif
    <!-- NAVIGATION -->
    
    
</div>

@endsection
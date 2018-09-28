
@extends('layouts.master')
@section('content')

<!-- CONTENT -->    
<div class="content col-xs-8">

 @foreach($cate as $post)
 <div>


   <!-- ARTICLE 1 -->      
   <article>
     <div class="post-image">
       <img src="{{asset('storage')}}/{{$post->thumbnail}}" alt="post image 1">
       <div class="category"><a href="#">{{$namecate}}</a></div>
     </div>
     <div class="post-text">
       <span class="date">{{$post->create_at}}</span>
       <h2><a href="{{asset('')}}blog/{{$post->slug}}">{{$post->title}}</a></h2>
       <p class="text">{{$post->description}}
        <a href="#"><i class="icon-arrow-right2"></i></a></p>                                 
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

 </div>
 @endforeach   

 <div class="clearfix"></div> 


 <!-- NAVIGATION -->
 <div class="navigation">
  @if($cate->currentPage() != 1)
  <a href="{{$cate->url($cate->currentPage()-1)}}" class="prev"><i class="icon-arrow-left8"></i> Previous Posts</a>
  @endif
  @if($cate->currentPage() != $cate->lastPage())
  <a href="{{$cate->url($cate->currentPage()+1)}}" class="next">Next Posts <i class="icon-arrow-right8"></i></a>
  @endif
  <div class="clearfix"></div>
</div>  



</div><!-- #CONTENT -->



@endsection
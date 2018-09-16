
@extends('layouts.master')
@section('content')

<!-- CONTENT -->    
<div class="content col-xs-8">

 @foreach($posts as $post)
 <div>


   <!-- ARTICLE 1 -->      
   <article>
     <div class="post-image">
       <img src="{{$post->thumbnail}}" alt="post image 1">
       <div class="category"><a href="#">IMG</a></div>
     </div>
     <div class="post-text">
       <span class="date">{{$post->create_at}}</span>
       <h2><a href="{{asset('')}}blog/{{$post->slug}}">{{$post->title}}</a></h2>
       <p class="text">{{$post->description}}
        <a href="#"><i class="icon-arrow-right2"></i></a></p>                                 
      </div>
      <div class="post-info">
       <div class="post-by">Post By <a href="#">AD-Theme</a></div>
     </div>
   </article>

 </div>
 @endforeach   

 <div class="clearfix"></div> 


 <!-- NAVIGATION -->
 <div class="navigation">
  @if($posts->currentPage() != 1)
  <a href="{{$posts->url($posts->currentPage()-1)}}" class="prev"><i class="icon-arrow-left8"></i> Previous Posts</a>
  @endif
  @if($posts->currentPage() != $posts->lastPage())
  <a href="{{$posts->url($posts->currentPage()+1)}}" class="next">Next Posts <i class="icon-arrow-right8"></i></a>
  @endif
  <div class="clearfix"></div>
</div>  



</div><!-- #CONTENT -->



@endsection
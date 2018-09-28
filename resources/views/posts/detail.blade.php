@extends('layouts.master')
@section('content')
<!-- CONTENT -->
<div class="content col-xs-8">
    <!-- ARTICLE 1 -->
    <article>
        <div class="post-image">
            <img src="{{asset('storage')}}/{!!$post->thumbnail!!}" alt="post image 1">
        </div>
        <div class="post-text">
            <h2>{!!$post->title!!}</h2>
        </div>
        <div class="post-text text-content">
            <div class="text">
                <p>{!!$post->content!!}</p>
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
                
                <div class="tags-container">
                    <h3 class="widget-title">
                    Tags
                </h3>
                    @foreach($post->tags as $tag)

                    <a href="{{asset('')}}tag/{{$tag->slug}}">{{$tag->name}}</a>
                    @endforeach
                                                      
                </div>
                <div class="clearfix"></div>
            </div> 
    </article>
    <div class="fb-comments" data-href="{{asset('blog')}}/{{$post->slug}}" data-numposts="5"></div>
</div>

@endsection

@push('script')
<div id="fb-root"></div>
<script>(function(d, s, id) {
  var js, fjs = d.getElementsByTagName(s)[0];
  if (d.getElementById(id)) return;
  js = d.createElement(s); js.id = id;
  js.src = 'https://connect.facebook.net/vi_VN/sdk.js#xfbml=1&version=v3.1';
  fjs.parentNode.insertBefore(js, fjs);
}(document, 'script', 'facebook-jssdk'));</script>
@endpush


<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>Blog - Zent</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" type="image/png" href="{{asset('blog_assets')}}/img/favicon.png" />
    <!-- STYLES -->
    <link rel="stylesheet" type="text/css" href="{{ asset('blog_assets/css/bootstrap.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('blog_assets/css/slippry.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('blog_assets/css/fonts.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('blog_assets/css/style.css') }}">
    <!-- GOOGLE FONTS -->
    <link href='https://fonts.googleapis.com/css?family=Source+Sans+Pro:400,300,300italic' rel='stylesheet' type='text/css'>
    <link href='https://fonts.googleapis.com/css?family=Playfair+Display:400,400italic,700,700italic' rel='stylesheet' type='text/css'>
    <link href='https://fonts.googleapis.com/css?family=Sarina' rel='stylesheet' type='text/css'>

    
</head>

<body>
    <!-- *****************************************************************
    ** Preloader *********************************************************
    ****************************************************************** -->
    <div id="preloader-container">
        <div id="preloader-wrap">
            <div id="preloader"></div>
        </div>
    </div>
    <!-- *****************************************************************
    ** Header ************************************************************ 
    ****************************************************************** -->
    <header class="tada-container" style="width: 900px;">
        <!-- LOGO -->
        <div class="logo-container">
            <a href="{{asset('index')}}"><img src="{{ asset('blog_assets/img/logo.png')}}" alt="logo" ></a>
            <div class="tada-social">
                <a href="#"><i class="icon-facebook5"></i></a>
                <a href="#"><i class="icon-twitter4"></i></a>
                <a href="#"><i class="icon-google-plus"></i></a>
                <a href="#"><i class="icon-vimeo4"></i></a>
                <a href="#"><i class="icon-linkedin2"></i></a>
            </div>
        </div>
        <!-- MENU DESKTOP -->

        <nav class="menu-desktop menu-sticky" style="width: 900px;">
            <ul class="tada-menu">

                @if(!empty($categories)) 

                @foreach($categories as $key =>$category)
                
                @if($category->parent_id == null)
                <li><a href="{{asset('')}}category/{{$category->slug}}" class="@if($key == 0) active @endif">{{$category->name}}
                    @foreach($categories as $subcategory) 
                    @if($subcategory->parent_id == $category->id)
                    <i class="icon-arrow-down8"></i>
                    @break
                    @endif

                    @endforeach
                    
                </a> 
                <ul class="submenu">
                    @foreach($categories as $subcategory) 
                    @if($subcategory->parent_id == $category->id)
                    <li><a href="{{asset('')}}category/{{$subcategory->slug}}">{{$subcategory->name}}</a> </li>
                    @endif
                    @endforeach
                </ul>
            </li>
            
            @endif 
            @endforeach
            @endif
        </ul>
                
        </nav>
        <!-- MENU MOBILE -->
        <div class="menu-responsive-container">
            <div class="open-menu-responsive">|||</div>
            <div class="close-menu-responsive">|</div>
            <div class="menu-responsive">
                <ul class="tada-menu">
                    <li><a href="#" class="active">HOME <i class="icon-arrow-down8"></i></a>
                        <ul class="submenu">
                            <li><a href="home-1-column.html">Home 1 Column</a></li>
                            <li><a href="index.html" class="active">Home 1 Column + Sidebar</a></li>
                            <li><a href="home-2-columns-with-sidebar.html">Home 2 Columns + Sidebar</a></li>
                            <li><a href="home-2-columns.html">Home 2 Columns</a></li>
                            <li><a href="home-3-columns.html">Home 3 Columns</a></li>
                        </ul>
                    </li>
                    <li><a href="#">FEATURES <i class="icon-arrow-down8"></i></a>
                        <ul class="submenu">
                            <li><a href="page.html">Page</a></li>
                            <li><a href="page-with-right-sidebar.html">Page + Right Sidebar</a></li>
                            <li><a href="page-with-left-sidebar.html">Page + Left Sidebar</a></li>
                            <li><a href="post.html">Post Full Width</a></li>
                            <li><a href="post-with-right-sidebar.html">Post + Right Sidebar</a></li>
                            <li><a href="post-with-left-sidebar.html">Post + Left Sidebar</a></li>
                            <li><a href="no-sticky.html">No Sticky Menu</a></li>
                            <li><a href="no-slider.html">No Slider</a></li>
                            <li><a href="#">Submenu <i class="icon-arrow-right8"></i></a>
                                <ul class="submenu">
                                    <li><a href="#">Item 1</a></li>
                                    <li><a href="#">Item 2</a></li>
                                    <li><a href="#">Item 3</a></li>
                                    <li><a href="#">Item 4</a></li>
                                </ul>
                            </li>
                        </ul>
                    </li>
                    <li><a href="#">BLOG <i class="icon-arrow-down8"></i></a>
                        <ul class="submenu">
                            <li><a href="blog-1-column.html">Blog 1 Column</a></li>
                            <li><a href="blog-1-column-with-sidebar.html">Blog + Sidebar</a></li>
                            <li><a href="blog-2-columns-with-sidebar.html">Blog 2 Columns + Sidebar</a></li>
                            <li><a href="blog-2-columns.html">Blog 2 Columns</a></li>
                            <li><a href="blog-3-columns.html">Blog 3 Columns</a></li>
                        </ul>
                    </li>
                    <li><a href="about-us.html">ABOUT US</a></li>
                    <li><a href="contact.html">CONTACT</a></li>
                </ul>
            </div>
        </div>
        <!-- # menu responsive container -->
        <!-- SEARCH -->
        <div class="tada-search" >
            <form action="{{asset('search')}}" method="get">
                <div class="form-group-search">

                    @csrf
                    <input type="search" class="search-field" name="name" placeholder="Search and hit enter...">
                    <button type="submit" class="search-btn"><i class="icon-search4"></i></button>
                </div>
            </form>
        </div>
        <!-- SLIDER -->
        <div class="tada-slider">
            <ul id="tada-slider">
                <li>
                    <img src="{{ asset('blog_assets/img/image-slider-1.jpg')}}" alt="image slider 1">
                    <div class="pattern"></div>
                    <div class="tada-text-container">
                        <h1>AENEAN AC DIAM</h1>
                        <h2>VIVAMUS <span class="main-color">TINCIDUNT</span> FERMENTUM</h2>
                        <span class="button"><a href="#">TEXT BUTTON</a></span>
                    </div>
                </li>
                <li>
                    <img src="{{ asset('blog_assets/img/image-slider-2.jpg')}}" alt="image slider 2">
                    <div class="pattern"></div>
                    <div class="tada-text-container">
                        <h1>MAECENAS CONSECTETUR</h1>
                        <h2>Lorem <span class="main-color">ipsum dolor</span> sit amet</h2>
                        <span class="button"><a href="#">READ ME</a></span>
                    </div>
                </li>
                <li>
                    <img src="{{ asset('blog_assets/img/image-slider-3.jpg') }}" alt="image slider 3">
                    <div class="pattern"></div>
                    <div class="tada-text-container">
                        <h1>AENEAN AC DIAM</h1>
                        <h2>VIVAMUS <span class="main-color">TINCIDUNT</span> FERMENTUM</h2>
                        <span class="button"><a href="#">TEXT BUTTON</a></span>
                    </div>
                </li>
                <li>
                    <img src="{{asset('blog_assets/img/image-slider-4.jpg')}}" alt="image slider 4">
                    <div class="pattern"></div>
                    <div class="tada-text-container">
                        <h1>AENEAN AC DIAM</h1>
                        <h2>VIVAMUS <span class="main-color">TINCIDUNT</span> FERMENTUM</h2>
                        <span class="button"><a href="#">TEXT BUTTON</a></span>
                    </div>
                </li>
            </ul>
        </div>
        <!-- #SLIDER -->
    </header>
    <!-- #HEADER -->
    <!-- *****************************************************************
    ** Section ***********************************************************
    ****************************************************************** -->
    <section class="tada-container content-posts" style="width: 900px;">
        @yield('content')
        <!-- SIDEBAR -->
        <div class="sidebar col-xs-4">


            <!-- ABOUT ME -->                    
            <div class="widget about-me">
                <div class="ab-image">
                    <img src="{{asset('')}}blog_assets/img/about-me.jpg" alt="about me">
                    <div class="ab-title">About Me</div>
                </div>
                <div class="ad-text">
                    <p>Lorem ipsum dolor sit consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore.</p>
                    <span class="signing"><img src="{{asset('')}}blog_assets/img/signing.png" alt="signing"></span>
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
                        <img src="{{asset('storage')}}/{{$lastPost->thumbnail}}" alt="post 1" class="post-image">
                        <div class="info-post" style="width: 100%;">
                            <h5><a href="{{asset('')}}blog/{{$lastPost->slug}}">{{$lastPost->title}}</a></h5>
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
            {{-- <div class="widget tags">
                <h3 class="widget-title">
                    Tags
                </h3>
                <div class="tags-container">
                    @foreach($tags as $tag)

                    <a href="{{asset('')}}tag/{{$tag->slug}}">{{$tag->name}}</a>
                    @endforeach
                                                      
                </div>
                <div class="clearfix"></div>
            </div>  --}}


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
   </section>
    <!-- *****************************************************************
    ** Footer ************************************************************
    ****************************************************************** -->
    <footer class="tada-container">
        <!-- INSTAGRAM -->
        <div class="widget widget-gallery">
            <h3 class="widget-title">INSTAGRAM</h3>
            <div class="image">
                <a href="#"><img src="{{ asset('blog_assets/img/img-gallery-1.jpg')}}" alt="image gallery 1"></a>
                <a href="#"><img src="{{ asset('blog_assets/img/img-gallery-2.jpg')}}" alt="image gallery 2"></a>
                <a href="#"><img src="{{ asset('blog_assets/img/img-gallery-3.jpg')}}" alt="image gallery 3"></a>
                <a href="#"><img src="{{ asset('blog_assets/img/img-gallery-4.jpg')}}" alt="image gallery 4"></a>
                <a href="#"><img src="{{ asset('blog_assets/img/img-gallery-5.jpg')}}" alt="image gallery 5"></a>
                <a href="#"><img src="{{ asset('blog_assets/img/img-gallery-6.jpg')}}" alt="image gallery 6"></a>
            </div>
            <div class="clearfix"></div>
        </div>
        <!-- FOOTER BOTTOM -->
        <div class="footer-bottom">
            <span class="copyright">Theme Created by <a href="#">AD-Theme</a> Copyright © 2016. All Rights Reserved</span>
            <span class="backtotop">TOP <i class="icon-arrow-up7"></i></span>
            <div class="clearfix"></div>
        </div>
    </footer>
    <!-- *****************************************************************
    ** Script ************************************************************
    ****************************************************************** -->
    <script src="{{ asset('blog_assets/js/jquery-1.12.4.min.js') }}"></script>
    <script src="{{ asset('blog_assets/js/slippry.js') }}"></script>
    <script src="{{ asset('blog_assets/js/main.js') }}"></script>

</body>
    @stack('script')
</html>

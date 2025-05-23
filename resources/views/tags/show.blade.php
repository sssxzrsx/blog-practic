<!DOCTYPE html>
<html lang="en">

    <!-- Basic -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">

    <!-- Mobile Metas -->
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Site Metas -->
    <title>Markedia - Marketing Blog Template</title>
    <meta name="keywords" content="">
    <meta name="description" content="">
    <meta name="author" content="">

    <!-- Site Icons -->
    <link rel="shortcut icon" href="images/favicon.ico" type="image/x-icon" />
    <link rel="apple-touch-icon" href="images/apple-touch-icon.png">

    <!-- Design fonts -->
    <link href="https://fonts.googleapis.com/css?family=Roboto+Slab:400,700" rel="stylesheet">

    <!-- Bootstrap core CSS -->
    <link href="{{ asset('css/bootstrap.css')}}" rel="stylesheet">

    <!-- FontAwesome Icons core CSS -->
    <link href="{{asset('css/font-awesome.min.css')}}" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="{{ asset('style.css') }}" rel="stylesheet">

    <!-- Animate styles for this template -->
    <link href="{{ asset('css/animate.css') }}" rel="stylesheet">

    <!-- Responsive styles for this template -->
    <link href="{{ asset('css/responsive.css') }}" rel="stylesheet">

    <!-- Colors for this template -->
    <link href="{{ asset('css/colors.css') }}" rel="stylesheet">

    <!-- Version Marketing CSS for this template -->
    <link href="{{ asset('css/version/marketing.css') }}" rel="stylesheet">

    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
      <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

</head>
<body>

    <div id="wrapper">
        <header class="market-header header">
            <div class="container-fluid">
                <nav class="navbar navbar-toggleable-md navbar-inverse fixed-top bg-inverse">
                    <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                    </button>
                    <a class="navbar-brand" href="marketing-index.html"><img src="images/version/market-logo.png" alt=""></a>
                    <div class="collapse navbar-collapse" id="navbarCollapse">
                        <ul class="navbar-nav mr-auto">
                            <li class="nav-item">
                                <a class="nav-link" href="marketing-index.html">Home</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="marketing-category.html">Marketing</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="marketing-category.html">Make Money</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="marketing-blog.html">Blog</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="marketing-contact.html">Contact Us</a>
                            </li>
                        </ul>
                        <form class="form-inline">
                            <input class="form-control mr-sm-2" type="text" placeholder="How may I help?">
                            <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
                        </form>
                    </div>
                </nav>
            </div><!-- end container-fluid -->
        </header><!-- end market-header -->

        <section class="section lb m3rem">
            <div class="container">
                <div class="row">
                    <div class="col-lg-8 col-md-12 col-sm-12 col-xs-12">
                        <div class="page-wrapper">
                            <div class="blog-title-area">
                                    <ol class="breadcrumb hidden-xs-down">
                            <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
                            <li class="breadcrumb-item"><a href="{{ route('tags.single', ['slug' => $tag->slug]) }}">{{ $tag->title }}</a></li>
                            <li class="breadcrumb-item active">Posts</li>
                        </ol>

                        <span class="color-yellow">
                            <a href="{{ route('tags.single', ['slug' => $tag->slug]) }}" title="">{{ $tag->title }}</a>
                        </span>

                        <h3>Tag: {{ $tag->title }}</h3>
                    </div>

                    @forelse ($posts as $post)
                        <div class="blog-box row">
                            <div class="col-md-4">
                                <div class="post-media">
                                    <a href="{{ route('posts.single', ['slug' => $post->slug]) }}" title="">
                                        <img src="{{ asset('storage/images/' . substr($post->thumbnail, 7)) }}" alt="" class="img-fluid">
                                    </a>
                                </div>
                            </div>

                            <div class="blog-meta big-meta col-md-8">
                                <h4><a href="{{ route('posts.single', ['slug' => $post->slug]) }}" title="">{{ $post->title }}</a></h4>

                                <p>{!! Str::limit($post->description, 150) !!}</p>

                                <small>
                                    <a href="{{ route('categories.single', ['slug' => $post->category->slug]) }}" class="bg-yellow">
                                        {{ $post->category->title }}
                                    </a>
                                </small>
                                <small>{{ $post->created_at->format('d M, Y') }}</small>
                                <small><i class="fa fa-eye"></i> {{ $post->views }}</small>
                            </div>
                        </div>

                        <hr class="invis1">
                    @empty
                        <p>No posts with this tag</p>
                    @endforelse

                    {{ $posts->links() }}
                </div>
            </div>

        <div class="dmtop">Scroll to Top</div>

    </div><!-- end wrapper -->

    <!-- Core JavaScript
    ================================================== -->
    <script src="js/jquery.min.js"></script>
    <script src="js/tether.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/animate.js"></script>
    <script src="js/custom.js"></script>

</body>
</html>

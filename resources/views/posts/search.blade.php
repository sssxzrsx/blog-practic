
@extends('posts.layout')
@section('content')
    <div class="page-title db">
        <div class="container">
            <div class="row">
                <div class="col-lg-8 col-md-8 col-sm-12 col-xs-12">
                    <h2>Search: {{ $s }}</h2>
                </div>
                <div class="col-lg-4 col-md-4 col-sm-12 hidden-xs-down hidden-sm-down">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
                        <li class="breadcrumb-item active">Search</li>
                    </ol>
                </div><!-- end col -->
            </div><!-- end row -->
        </div><!-- end container -->
    </div><!-- end page-title -->
    <div class="page-wrapper">
        <div class="">
            @if($posts->count())
                @foreach($posts as $post)
                    <div class="blog-box row">
                        <div class="col-md-4">
                            <div class="post-media">
                                <a href="{{ route('posts.single', ['slug' => $post->slug]) }}" title="">
                                    <img src="{{asset('storage/'.$post->thumbnail)}}" alt="" >
                                </a>
                            </div>
                        </div>

                        <div class="blog-meta big-meta col-md-8 d-flex flex-column justify-content-center">
                            <h4>
                                <a href="{{ route('posts.single', ['slug' => $post->slug]) }}" title="">
                                    {{ $post->title }}
                                </a>
                            </h4>

                            <p>{!! Str::limit($post->description, 150) !!}</p>
                            <div>
                                <small>
                                    <a href="{{ route('categories.single', ['slug' => $post->category->slug]) }}" class="bg-yellow">
                                        {{ $post->category->title }}
                                    </a>
                                </small>
                                <small>{{ $post->created_at->format('d M, Y') }}</small>
                                <small><i class="fa fa-eye"></i> {{ $post->views }}</small>
                            </div>

                        </div>
                    </div>

                    <hr class="invis1">
                @endforeach
            @else
                <p>По вашему запросу ничего не найдено...</p>
            @endif
        </div>
    </div>
    <hr class="invis">
    <div class="row">
        <div class="col-md-12">
            <nav aria-label="Page navigation">
                {{ $posts->appends(['s' => request('s')])->links() }}
            </nav>
        </div><!-- end col -->
    </div><!-- end row -->
@endsection

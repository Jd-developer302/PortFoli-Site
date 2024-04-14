@extends('layouts.frontendmaster')

@section('content')
<section class="services" id="services">
    <div class="container">
        <div class="row">
            <div class="col-md-9">
                <div class="main-text-category mt-5">
                    <h4 style="color: #36454F;">All Posts</h4>
                </div>
                <div class="row">
                    @foreach ($all_posts as $all_posts_item)
                    <div class="col-md-4 mt-3">
                        <div class="card" style=" height: 400px; ">
                            <div class="card-top">
                                <img src="{{ asset('storage/'.$all_posts_item->image) }}"
                                    style="height: 100%;width:auto;" alt="">
                            </div>
                            <div class="card-body">
                                <a class="text-decoration-none"
                                    href="{{ route('tutorial.view', ['category_slug' => $all_posts_item->category->slug, 'post_slug' => $all_posts_item->slug]) }}">
                                    <h5>{{ $all_posts_item->name }}</h5>
                                </a>
                                <span class="date">{{$all_posts_item->created_at->format('d-m-Y')}}</span>
                                <span style="margin-left: 10px">Posted By:{{$all_posts_item->user->name}}
                                    <p class="excerpt" style="max-height: 10vh; overflow: hidden;">
                                        {!! $all_posts_item->description !!}
                                    </p>
                                    <a href="{{ route('tutorial.view', ['category_slug' => $all_posts_item->category->slug, 'post_slug' => $all_posts_item->slug]) }}"
                                        class="readMore">Explore More</a>
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>

            </div>
            <div class="col-md-3 mt-5">
                <div class="main-text-category">
                    <h4>Adevrtisment Area</h4>
                </div>
                <div class="card" style="margin-top: 4rem">
                    <h4 style="color: #36454F;">Popular Posts</h4>
                    <div class="card-body">
                        @foreach ($popular_posts as $popular_posts_item)
                        <a style="color: #36454F;" href="{{url('tutorial/'.$popular_posts_item->category->slug.'/'.$popular_posts_item->slug)}}"
                            class="text-decoration-none">
                            <h6>{{$popular_posts_item->name}}</h6>
                        </a>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>



    <div class="showcase">
        <img src="{{asset('asset/img/shapes/ring.png')}}" class="ring">
        <img src="{{asset('asset/img/shapes/circle.png')}}" class="circle">
        <img src="{{asset('asset/img/shapes/circle.png')}}" class="circle2">
        <img src="{{asset('asset/img/shapes/circle.png')}}" class="circle3">
        <img src="{{asset('asset/img/shapes/half-ring.png')}}" class="half-ring">
    </div>
</section>

@endsection
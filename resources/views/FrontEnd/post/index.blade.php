@extends('layouts.frontendmaster')
@section('title', "$category->meta_title")
@section('meta_description', "$category->meta_description")
@section('meta_keywords', "$category->meta_keywords")

@section('content')

<section class="services" id="services">
    {{-- <div class="category_view_post">
        <h1>Category view Post</h1>
    </div> --}}
    <div class="container">
        <div class="row" style="margin-top: 5rem">
            <div class="col-md-9">
                <div class="main-text-category">
                    <h4 style="color: #36454F;">{{$category->name}}</h4>
                </div>
                <div class="row">
                    @forelse ($post as $postitem)
                    <div class="col-md-4 mt-3">
                        <div class="card" style=" height: 400px; ">
                            <div class="card-top">
                                <img src="{{ asset('storage/'.$postitem->image) }}" style="height: 100%;width:auto;"
                                    alt="">
                            </div>
                            <div class="card-info">
                                <a class="text-decoration-none"
                                    href="{{ route('tutorial.view', ['category_slug'=>$category->slug , 'post_slug'=>$postitem->slug] )}}">
                                    <h2 class="post-heading">
                                        {{$postitem->name}}
                                    </h2>
                                </a>
                                <span class="date">{{$postitem->created_at->format('d-m-Y')}}</span>
                                <span style="margin-left: 10px">Posted By:{{$postitem->user->name}}
                                    <p class="excerpt" style="max-height: 10vh; overflow: hidden;">
                                        {{$postitem->description}}
                                    </p>

                                    <a href="{{ route('tutorial.view', ['category_slug'=>$category->slug , 'post_slug'=>$postitem->slug] )}}"
                                        class="readMore">Explore More</a>
                            </div>
                        </div>
                    </div>

                    @empty
                    <h2>
                        No Post Available
                    </h2>
                    @endforelse
                    <div class="d-flex justify-content-center align-items-center mt-5">
                        <div class="card-paginate">
                            {{$post->links()}}
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-3">
                <div class="main-text-category p-4">
                    <h5>Advertisment Area</h5>
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
@extends('layouts.frontendmaster')
@section('title', "$post->meta_title")
@section('meta_description', "$post->meta_description")
@section('meta_keywords', "$post->meta_keywords")
@section('content')
<style>
    .custom-scrollbar {
        max-height: 150px;
        overflow-y: auto;
        scrollbar-width: thin; /* For Firefox */
        scrollbar-color: rgba(155, 155, 155, 0.5) rgba(0, 0, 0, 0.1); /* For Firefox */
    }

    /* For Chrome, Edge, and Safari */
    .custom-scrollbar::-webkit-scrollbar {
        width: 8px;
    }

    .custom-scrollbar::-webkit-scrollbar-thumb {
        background-color: rgba(155, 155, 155, 0.5);
        border-radius: 4px;
    }

    .custom-scrollbar::-webkit-scrollbar-track {
        background-color: rgba(0, 0, 0, 0.1);
    }

    /* Optional: add smooth transition effect */
    .custom-scrollbar::-webkit-scrollbar-thumb {
        transition: background-color 0.3s ease-in-out;
    }

    .custom-scrollbar::-webkit-scrollbar-thumb:hover {
        background-color: rgba(155, 155, 155, 0.8);
    }
</style>
<section class="services" id="services">
    <div class="container">
        <div class="row">
            <div class="col-md-9">
                <div class="main-text-category mt-5">
                    <h4 style="color:#36454F;">{!!$post->name!!}</h4>
                </div>
                <div class="card">
                    <div class="card-body">
                        {!!$post->description!!}
                    </div>
                </div>
                <button class="btn mt-5 mb-3" data-bs-toggle="collapse" data-bs-target="#demo">Add Comment</button>

                <div id="demo" class="collapse">
                    <div class="card mt-3">
                        <div class="card-body">
                            <form action="{{ route('comments.store', $post->slug) }}" method="POST">
                                @csrf
                                <div class="row">
                                    <div class="col-md-6">
                                        <label>Name:</label>
                                        <input type="text" name="name" class="form-control mb-3"
                                            placeholder="Enter your name">
                                    </div>
                                    <div class="col-md-6">
                                        <label>Email:</label>
                                        <input type="text" name="email" class="form-control mb-3"
                                            title="Not be shared others" placeholder="Yor Email">
                                    </div>
                                </div>
                                <div>
                                    <label>Leave a comment</label>
                                    <textarea name="comment_body" class="form-control" rows="3" required></textarea>
                                </div>
                                <button type="submit" class="btn btn-primary mt-3 border-0"
                                    style="padding:7px 10px 7px 10px">Submit</button>
                            </form>
                        </div>

                    </div>
                </div>


                <div class="card mt-3">
                    <div class="card-body custom-scrollbar">
                        @forelse($post->comments as $comment)
                
                        <h6>
                            {{ $comment->name }}
                            <small class="text-primary ms-3">Commented on: {{ $comment->created_at->format('d-m-Y')
                                }}</small>
                        </h6>
                        <p>
                            {!! $comment->comment_body !!}
                        </p>
                
                        @empty
                        <p>No comments available.</p>
                        @endforelse
                    </div>
                </div>
                
                

            </div>
            <div class="col-md-3 mt-5">
                <div class="main-text-category">
                    <h4>Adevrtisment Area</h4>
                </div>
                <div class="card">
                    <h4 style="color: #36454F;">Latest Posts</h4>
                    <div class="card-body">
                        @foreach ($latest_posts as $latest_post_item)
                        <a style="color: #36454F;"
                            href="{{url('tutorial/'.$latest_post_item->category->slug.'/'.$latest_post_item->slug)}}"
                            class="text-decoration-none">
                            <h6>{{$latest_post_item->name}}</h6>
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
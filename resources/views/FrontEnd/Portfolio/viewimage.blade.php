<!-- viewimage.blade.php -->

@extends('layouts.frontendmaster')

@section('content')
<section class="services" id="services">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="main-text-category justify-content-between d-flex mt-5">
                    <h4 style="color: #36454F;">{{ $category->name }}</h4>
                </div>
                
                <div class="fancy-gallery mb-5">
                    <div class="row">
                        @foreach ($category->images as $image)
                        <a href="{{ asset('storage/'.$image->image) }}" class="mb-4 col-6 col-sm-4 img-fluid"
                            data-fancybox="images" data-caption="{{ $image->caption }}">
                            <img class="img-fluid img-thumbnail" src="{{ asset('storage/'.$image->image) }}" style="height: 50vh;width:auto;" alt="" />
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

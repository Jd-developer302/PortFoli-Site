@extends('layouts.frontendmaster')

@section('content')
<section class="services" id="services">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                @foreach ($category->services as $service)
                <div class="main-text-category mt-5">
                    <h4 style="color: #36454F;"> {{ $service->name }}</h4>
                </div>
                <div class="card mt-3" >
                    <div class="card-body" style="margin-right: 10px">
                        
                       
                        <p >
                            {!! $service->description !!} 
                        </p>
                            
                       
                    </div>
                </div>
                @endforeach
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
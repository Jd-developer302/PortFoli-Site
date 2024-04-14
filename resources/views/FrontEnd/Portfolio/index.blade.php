@extends('layouts.frontendmaster')

@section('content')
<section class="services" id="services">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="main-text-category justify-content-between d-flex mt-5">
                    <h4 style="color: #36454F;">Gallery</h4>
                    <form class="form-inline">
                        <select class="form-control" onchange="changeOrder(this)">
                            <option value="oldest">Oldest</option>
                            <option value="latest">Latest</option>
                        </select>
                    </form>
                </div>
                
                <div class="fancy-gallery mb-5">
                    <div class="row">
                        {{-- Oldest Image --}}
                        @if(isset($oldestImage))
                        <a href="{{ asset('storage/'.$oldestImage->image) }}" class="mb-4 col-6 col-sm-4 img-fluid"
                            data-fancybox="images" data-caption="Oldest Image">
                            <img class="img-fluid img-thumbnail" src="{{ asset('storage/'.$oldestImage->image) }}" style="height: 50vh;width:auto;" alt="" />
                        </a>
                        @endif

                        {{-- Latest Images --}}
                        @foreach ($PortfolioImages as $all_image_item)
                        <a href="{{ asset('storage/'.$all_image_item->image) }}" class="mb-4 col-6 col-sm-4 img-fluid"
                            data-fancybox="images" data-caption="Latest Images">
                            <img class="img-fluid img-thumbnail" src="{{ asset('storage/'.$all_image_item->image) }}" style="height: 50vh;width:auto;" alt="" />
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

<script>
    function changeOrder(selectElement) {
        var order = selectElement.value;
        window.location.href = "{{ url('/Portfolio') }}" + "?order=" + order;
    }
</script>
@endsection

@php
    $sliders = \App\Model\Slider::where('status', 0)->where('slider_id', 42)->orderBy('order','asc')->get();
@endphp

@if($sliders->count())

<!-- Start Slider -->
<div id="slider">
    <div class="tns-carousel tns-controls-static tns-nav-enabled tns-nav-light tns-nav-inside">
        <div class="tns-carousel-inner" data-carousel-options='{"mode": "gallery", "nav": true}'>
            @foreach($sliders as $key => $slider)
            <div>
                <img src="{{url($slider->src)}}" alt="..." class="w-100">
                <div class="text-center py-lg-5 py-3 px-3 position-absolute">
                    <h2 class="from-top">{{$slider->name}}</h2>
                    <div class="fs-lg pb-3 from-bottom delay-1">{!! htmlspecialchars_decode($slider->description) !!}</div>
                    @if(!empty($slider->link))
                    <a class="btn scale-down delay-2" href="{{ $slider->link??'javascript:;' }}" >Xem ngay <i class="fs-sm ci-arrow-right"></i></a>
                    @endif
                </div>
            </div>
            @endforeach
        </div>
    </div>
    <div class="carousel-caret-circle-down">
        <img src="assets/images/CaretCircleDown.svg" alt="">
    </div>
</div>
<!-- End Slider -->
@endif
@php
    $sliders = \App\Model\Slider::where('status', 0)->where('slider_id', 42)->orderBy('order','asc')->get();
@endphp

@if($sliders->count())

<!-- Start Slider -->
<div id="slider">
    <div id="carousel-example-one" class="carousel slide" data-ride="carousel">
        <div class="carousel-caret-circle-down">
            <img src="assets/images/CaretCircleDown.svg" alt="">
        </div>
        <ol class="carousel-indicators">
            @foreach($sliders as $key => $slider)
            <li data-target="#carousel-example-one" data-slide-to="{{ $key }}" class="{{$key == 0 ? 'active' : ''}}"></li>
            @endforeach
        </ol>
        <div class="carousel-inner">
            @foreach($sliders as $key => $slider)
            <div class="carousel-item {{$key == 0 ? 'active' : ''}}">
                <img src="{{url($slider->src)}}" alt="..." class="w-100">
                <div class="carousel-caption d-none d-md-block">
                    <h2>Welcome to</h2>
                    <h3>OPENWORLD.VN</h3>
                    <p class="slider-text-content">{!! htmlspecialchars_decode($slider->description) !!}</p>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</div>
<!-- End Slider -->
@endif
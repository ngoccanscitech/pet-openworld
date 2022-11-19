@php
    $sliders = \App\Model\Slider::where('status', 0)->where('slider_id', 66)->orderBy('order', 'asc')->get();
@endphp
<div id="slider-child">
    <div class="container">
        <div class="row mt-91">
            <div id="col-lg-12" class="col-md-12 col-sm-12">
                <div id="carousel-example-two" class="carousel slide" data-ride="carousel">
                    <ol class="carousel-indicators">
                        @foreach($sliders as $key => $slider)
                            <li data-target="#carousel-example-two" data-slide-to="{{ $key }}" class="{{$key == 0 ? 'active' : ''}}"></li>
                        @endforeach
                    </ol>
                    <div class="carousel-inner">
                        @foreach($sliders as $key => $slider)
                        <div class="carousel-item {{ $key == 0 ? 'active' : '' }}">
                            <img src="{{url($slider->src)}}" alt="..." class="w-100">
                            <div class="carousel-caption d-none d-md-block carousel-custom">
                                <p class="mb-22">{{$slider->name}}</p>
                                {!! htmlspecialchars_decode($slider->description) !!}
                                <a href="{{ $slider->link }}" class="btn">Xem ngay</a>
                            </div>
                        </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@php
    $sliders = \App\Model\Slider::where('status', 0)->where('slider_id', 66)->orderBy('order', 'asc')->get();
@endphp
<div id="slider-child" class="my-lg-5 my-3 py-lg-3">
    <div class="container">
        <div class="tns-carousel">
            <div class="tns-carousel-inner" data-carousel-options='{"mode": "gallery", "nav": true}'>
                @foreach($sliders as $key => $slider)
                <div>
                    <img src="{{url($slider->src)}}" alt="..." class="w-100">
                    <div class="text-center py-lg-5 py-2 px-3 position-absolute top-0 start-0 w-100 h-100">
                        <p class="from-top">{{$slider->name}}</p>
                        <div class="fs-lg pb-lg-3 pb-2 from-bottom delay-1">{!! htmlspecialchars_decode($slider->description) !!}</div>
                        <a class="btn scale-down delay-2" href="{{ $slider->link??'javascript:;' }}" >Xem ngay <i class="fs-sm ci-arrow-right"></i></a>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
        <!-- <div class="row">
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
                                @if( !empty($slider->link) )
                                <a href="{{ $slider->link }}" class="btn">Xem ngay</a>
                                @endif
                            </div>
                        </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div> -->
    </div>
</div>
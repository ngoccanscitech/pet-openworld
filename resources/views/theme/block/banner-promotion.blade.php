@php
    $sliders = \App\Model\Slider::where('status', 0)->where('slider_id', 59)->orderBy('order', 'asc')->get();
@endphp
<div id="carousel-example-three">
   <div class="tns-carousel">
      <div class="tns-carousel-inner" data-carousel-options='{"mode": "gallery", "nav": true}'>
          @foreach($sliders as $key => $slider)
          <div>
              <img src="{{url($slider->src)}}" alt="..." class="w-100">
              <div class="text-center py-5 px-3 position-absolute top-0 start-0 w-100 h-100">
                  <!-- <p class="from-top">{{$slider->name}}</p> -->
                  <!-- <div class="fs-lg pb-3 from-bottom delay-1">{!! htmlspecialchars_decode($slider->description) !!}</div> -->
                  <!-- <a class="btn scale-down delay-2" href="{{ $slider->link??'javascript:;' }}" >Xem ngay <i class="fs-sm ci-arrow-right"></i></a> -->
              </div>
          </div>
          @endforeach
      </div>
   </div>
</div>

{{--
<div id="carousel-example-three" class="carousel slide" data-ride="carousel">
   <ol class="carousel-indicators">
      @foreach($sliders as $key => $slider)
         <li data-target="#carousel-example-three" data-slide-to="{{ $key }}" class="{{$key == 0 ? 'active' : ''}}"></li>
      @endforeach
   </ol>
   <div class="carousel-inner">
      @foreach($sliders as $key => $slider)
      <div class="carousel-item {{ $key == 0 ? 'active' : '' }}">
         <img src="{{url($slider->src)}}" alt="{{$slider->name}}" class="w-100">
         <div class="carousel-caption d-none d-md-block transform-rotate">
            {!! htmlspecialchars_decode($slider->description) !!}
            <!-- <img src="./assets/images/caption-week-sale.png" class="tranform-image-caption" alt="">
            <p>Sách đồng loạt giảm</p>
            <h1>30% - 40%</h1> -->
         </div>
      </div>
      @endforeach
   </div>
</div>
--}}
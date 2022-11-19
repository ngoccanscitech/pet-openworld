@php
    $sliders = \App\Model\Slider::where('status', 0)->where('slider_id', )
@endphp
<div id="carousel-example-three" class="carousel slide" data-ride="carousel">
    <ol class="carousel-indicators">
        <li data-target="#carousel-example-three" data-slide-to="0" class="active"></li>
        <li data-target="#carousel-example-three" data-slide-to="1"></li>
        <li data-target="#carousel-example-three" data-slide-to="2"></li>
    </ol>
    <div class="carousel-inner">
        <div class="carousel-item active">
            <img src="./assets/images/week-sale-last.png" alt="...">
            <div class="carousel-caption d-none d-md-block transform-rotate">
                <img src="./assets/images/caption-week-sale.png" class="tranform-image-caption" alt="">
                <p>Sách đồng loạt giảm</p>
                <h1>30% - 40%</h1>
            </div>
        </div>
        <div class="carousel-item">
            <img src="./assets/images/week-sale-last.png" alt="...">
            <div class="carousel-caption d-none d-md-block transform-rotate">
                <img src="./assets/images/caption-week-sale.png" class="tranform-image-caption" alt="">
                <p>Sách đồng loạt giảm</p>
                <h1>30% - 40%</h1>
            </div>
        </div>
        <div class="carousel-item">
            <img src="./assets/images/week-sale-last.png" alt="...">
            <div class="carousel-caption d-none d-md-block transform-rotate">
                <img src="./assets/images/caption-week-sale.png" class="tranform-image-caption" alt="">
                <p>Sách đồng loạt giảm</p>
                <h1>30% - 40%</h1>
            </div>
        </div>
    </div>
</div>
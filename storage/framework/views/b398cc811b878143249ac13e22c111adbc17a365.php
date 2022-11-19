<?php
    $sliders = \App\Model\Slider::where('status', 0)->where('slider_id', 42)->orderBy('order','asc')->get();
?>

<?php if($sliders->count()): ?>

<!-- Start Slider -->
<div id="slider">
    <div class="tns-carousel tns-controls-static tns-nav-enabled tns-nav-light tns-nav-inside">
        <div class="tns-carousel-inner" data-carousel-options='{"mode": "gallery", "nav": true}'>
            <?php $__currentLoopData = $sliders; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $slider): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <div>
                <img src="<?php echo e(url($slider->src)); ?>" alt="..." class="w-100">
                <div class="text-center py-lg-5 py-3 px-3 position-absolute">
                    <h2 class="from-top"><?php echo e($slider->name); ?></h2>
                    <div class="fs-lg pb-3 from-bottom delay-1"><?php echo htmlspecialchars_decode($slider->description); ?></div>
                    <?php if(!empty($slider->link)): ?>
                    <a class="btn scale-down delay-2" href="<?php echo e($slider->link??'javascript:;'); ?>" >Xem ngay <i class="fs-sm ci-arrow-right"></i></a>
                    <?php endif; ?>
                </div>
            </div>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </div>
    </div>
    <div class="carousel-caret-circle-down">
        <img src="assets/images/CaretCircleDown.svg" alt="">
    </div>
</div>
<!-- End Slider -->
<?php endif; ?><?php /**PATH C:\wamp64\www\expro\Laravel\oppenworld\resources\views/theme/block/slider-main.blade.php ENDPATH**/ ?>
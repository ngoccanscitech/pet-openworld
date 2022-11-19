<?php
    $sliders = \App\Model\Slider::where('status', 0)->where('slider_id', 66)->orderBy('order', 'asc')->get();
?>
<div id="slider-child" class="my-lg-5 my-3 py-lg-3">
    <div class="container">
        <div class="tns-carousel">
            <div class="tns-carousel-inner" data-carousel-options='{"mode": "gallery", "nav": true}'>
                <?php $__currentLoopData = $sliders; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $slider): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <div>
                    <img src="<?php echo e(url($slider->src)); ?>" alt="..." class="w-100">
                    <div class="text-center py-lg-5 py-2 px-3 position-absolute top-0 start-0 w-100 h-100">
                        <p class="from-top"><?php echo e($slider->name); ?></p>
                        <div class="fs-lg pb-lg-3 pb-2 from-bottom delay-1"><?php echo htmlspecialchars_decode($slider->description); ?></div>
                        <a class="btn scale-down delay-2" href="<?php echo e($slider->link??'javascript:;'); ?>" >Xem ngay <i class="fs-sm ci-arrow-right"></i></a>
                    </div>
                </div>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </div>
        </div>
        <!-- <div class="row">
            <div id="col-lg-12" class="col-md-12 col-sm-12">
                <div id="carousel-example-two" class="carousel slide" data-ride="carousel">
                    <ol class="carousel-indicators">
                        <?php $__currentLoopData = $sliders; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $slider): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <li data-target="#carousel-example-two" data-slide-to="<?php echo e($key); ?>" class="<?php echo e($key == 0 ? 'active' : ''); ?>"></li>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </ol>
                    <div class="carousel-inner">
                        <?php $__currentLoopData = $sliders; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $slider): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <div class="carousel-item <?php echo e($key == 0 ? 'active' : ''); ?>">
                            <img src="<?php echo e(url($slider->src)); ?>" alt="..." class="w-100">
                            <div class="carousel-caption d-none d-md-block carousel-custom">
                                <p class="mb-22"><?php echo e($slider->name); ?></p>
                                <?php echo htmlspecialchars_decode($slider->description); ?>

                                <?php if( !empty($slider->link) ): ?>
                                <a href="<?php echo e($slider->link); ?>" class="btn">Xem ngay</a>
                                <?php endif; ?>
                            </div>
                        </div>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </div>
                </div>
            </div>
        </div> -->
    </div>
</div><?php /**PATH C:\wamp64\www\expro\Laravel\oppenworld\resources\views/theme/block/banner-hot.blade.php ENDPATH**/ ?>
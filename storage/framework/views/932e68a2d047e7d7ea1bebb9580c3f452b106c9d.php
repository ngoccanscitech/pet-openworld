<?php
    $sliders = \App\Model\Slider::where('status', 0)->where('slider_id', 59)->orderBy('order', 'asc')->get();
?>
<div id="carousel-example-three">
   <div class="tns-carousel">
      <div class="tns-carousel-inner" data-carousel-options='{"mode": "gallery", "nav": true}'>
          <?php $__currentLoopData = $sliders; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $slider): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
          <div>
              <img src="<?php echo e(url($slider->src)); ?>" alt="..." class="w-100">
              <div class="text-center py-5 px-3 position-absolute top-0 start-0 w-100 h-100">
                  <!-- <p class="from-top"><?php echo e($slider->name); ?></p> -->
                  <!-- <div class="fs-lg pb-3 from-bottom delay-1"><?php echo htmlspecialchars_decode($slider->description); ?></div> -->
                  <!-- <a class="btn scale-down delay-2" href="<?php echo e($slider->link??'javascript:;'); ?>" >Xem ngay <i class="fs-sm ci-arrow-right"></i></a> -->
              </div>
          </div>
          <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
      </div>
   </div>
</div>

<?php /**PATH C:\wamp64\www\expro\Laravel\oppenworld\resources\views/theme/block/banner-promotion.blade.php ENDPATH**/ ?>
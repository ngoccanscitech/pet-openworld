<?php $__env->startSection('seo'); ?>
<?php echo $__env->make($templatePath .'.layouts.seo', $seo??[] , \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php $__env->stopSection(); ?>


<?php $__env->startSection('content'); ?>

<!-- Page Title-->
<div class="py-4" style="background: #d9d9d9;">
  <div class="container d-lg-flex justify-content-between py-2 py-lg-3">
    <div class="order-lg-2 mb-3 mb-lg-0 pt-lg-2">
      <nav aria-label="breadcrumb">
        <ol class="breadcrumb flex-lg-nowrap justify-content-center justify-content-lg-start">
          <li class="breadcrumb-item"><a class="text-nowrap" href="/"><i class="ci-home"></i>Home</a></li>
          </li>
          <li class="breadcrumb-item text-nowrap active" aria-current="page">Nghiên cứu</li>
        </ol>
      </nav>
    </div>
    <div class="order-lg-1 pe-lg-4 text-center text-lg-start">
      <h1 class="h4 mb-0"><?php echo e($post->name); ?></h1>
    </div>
  </div>
</div>

<!--=================================
blog-detail -->
<section class="space-ptb pt-3">
  <div class="container">
    <div class="row pt-4 mt-md-2">
        <div class="col-lg-8">
          <div class="blog-detail">
            <div class="blog-post">
              <div class="blog-post-content border-0">
                <?php echo htmlspecialchars_decode($post->content); ?>

              </div>
              <hr>
              <div class="mt-3">
                <span class="d-inline-block align-middle text-muted fs-sm me-3 mt-1 mb-2">Share post:</span>
                <a class="btn-social bs-facebook me-2 mb-2" href="https://www.facebook.com/sharer/sharer.php?u=<?php echo e(url()->current()); ?>&amp;t=<?php echo e($post->title); ?>"><i class="ci-facebook"></i></a>
                <a class="btn-social bs-twitter me-2 mb-2" href="http://twitter.com/share?text=text goes here&url=<?php echo e(url()->current()); ?>"><i class="ci-twitter"></i></a>
                <a class="btn-social bs-pinterest me-2 mb-2" href="tps://www.instagram.com/?url=<?php echo e(url()->current()); ?>"><i class="ci-pinterest"></i></a>
              </div>
            </div>
          </div>

          <h6 class="text-primary mt-4">Tài liệu liên quan</h6>
          <ul class="pl-3">
            <?php if(count($news_featured)>0): ?>
              <?php $__currentLoopData = $news_featured; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
              <li>
                <a class="text-dark" href="<?php echo e(route('document.detail', ['slug' => $item->slug])); ?>"><?php echo e($item->name); ?></a>
              </li>
              <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            <?php endif; ?>
          </ul>
        </div>
        <div class="col-lg-4">
          <!-- Sidebar-->
          <div class="offcanvas offcanvas-collapse offcanvas-end border-start ms-lg-auto" id="blog-sidebar" style="max-width: 22rem;">
            <div class="offcanvas-header align-items-center shadow-sm">
              <h2 class="h5 mb-0">Sidebar</h2>
              <button class="btn-close ms-auto" type="button" data-bs-dismiss="offcanvas" aria-label="Close"></button>
            </div>
            <div class="offcanvas-body py-grid-gutter py-lg-1 px-lg-4" data-simplebar data-simplebar-auto-hide="true">
              <div class="widget mb-grid-gutter pb-grid-gutter border-bottom mx-lg-2">
                <h3 class="widget-title">Tài liệu mới</h3>
                <?php if(count($news_featured)>0): ?>
                  <?php $__currentLoopData = $news_featured; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                  <div class="d-flex align-items-center mb-3">
                    <a class="flex-shrink-0" href="blog-single.html"><img class="rounded" src="<?php echo e(asset($item->image)); ?>" width="64" alt="<?php echo e($item->name); ?>"></a>
                    <div class="ps-3">
                      <h6 class="blog-entry-title fs-sm mb-0"><a href="<?php echo e(route('news.single', ['id' => $item->id, 'slug' => $item->slug], true, $lc)); ?>"><?php echo e($item->name); ?></a></h6>
                    </div>
                  </div>
                  <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                <?php endif; ?>
            </div>
          </div>
        </div>
      </div>
    </div>
</section>
<!--=================================
blog-detail -->
 <?php $__env->startPush('after-footer'); ?>
  <script src="https://sp.zalo.me/plugins/sdk.js"></script>
    <script>
      jQuery(document).ready(function($) {
        $('.view-phone').click(function(event) {
          var phone = '<?php echo e(Helpers::get_option_minhnn('zalo')); ?>';
          $(this).find('span').text(phone);
          $(this).attr('href', 'tel:' + phone);
        });
      });

    </script>
  <?php $__env->stopPush(); ?>

<?php $__env->stopSection(); ?>
<?php echo $__env->make($templatePath .'.layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/admin/domains/exproweb.com/public_html/thuvientonghop/resources/views/theme/research/single.blade.php ENDPATH**/ ?>
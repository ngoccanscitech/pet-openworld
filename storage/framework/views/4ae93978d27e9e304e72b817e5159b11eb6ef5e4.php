<?php
    $states = \App\Model\Province::get();
?>


<?php $__env->startSection('seo'); ?>
<?php echo $__env->make($templatePath .'.layouts.seo', $seo??[] , \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php $__env->stopSection(); ?>


<?php $__env->startSection('content'); ?>
<section class="space-ptb">
  <div class="bg-white py-3 mb-3 ">
      <div class="container d-lg-flex justify-content-between py-2 py-lg-3">
         <div class="order-lg-2 mb-3 mb-lg-0 pt-lg-2">
            <nav aria-label="breadcrumb">
               <ol class="breadcrumb flex-lg-nowrap justify-content-center justify-content-lg-start">
                  <li class="breadcrumb-item"><a class="text-nowrap" href="index.html"><i class="ci-home"></i>Home</a></li>
                  <li class="breadcrumb-item text-nowrap"><a href="<?php echo e(route('research')); ?>">Tác giả</a></li>
               </ol>
            </nav>
         </div>
         <div class="order-lg-1 pe-lg-4 text-center text-lg-start">
            <h1 class="h3 mb-0">Tác giả</h1>
         </div>
      </div>
  </div>
   <div class="container">
      <div class="row">
         <div class="col-lg-8 col-md-8 col-sm-12">
            <div class="row">
              <?php if(count($users)>0): ?>
                  <?php $__currentLoopData = $users; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $author): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                  <div class="col-lg-4 col-md-2 mb-4">
                     <?php echo $__env->make($templatePath .'.author.author-item', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                  </div>
                  <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                  <div class="col-12">
                    <?php echo $users->links(); ?>

                  </div>
              <?php endif; ?>
            </div>
         </div>
         <div class="col-lg-4 col-md-4 col-sm-12">
            <?php echo $__env->make($templatePath . '.block.sidebar-home', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
         </div>
      </div>
   </div>
</section>

<?php $__env->stopSection(); ?>

<?php $__env->startPush('after-footer'); ?>
<script src="<?php echo e(asset('theme/js/customer.js')); ?>"></script>
<?php $__env->stopPush(); ?>

<?php echo $__env->make($templatePath .'.layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/admin/domains/exproweb.com/public_html/thuvientonghop/resources/views/theme/author/index.blade.php ENDPATH**/ ?>
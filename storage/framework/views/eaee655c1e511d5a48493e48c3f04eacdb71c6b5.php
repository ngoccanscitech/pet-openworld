<!DOCTYPE html>
<html class="no-js" lang="en">
   <head>
      <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
      <meta http-equiv="x-ua-compatible" content="ie=edge">
      <!-- <title><?php echo e(setting_option('company_name')); ?></title> -->
      <meta name="description" content="description">
      <meta name="viewport" content="width=device-width, initial-scale=1">
      <!-- Favicon -->
      <link rel="shortcut icon" href="<?php echo e(asset(setting_option('favicon'))); ?>" />
      <!-- SEO meta -->
      <?php echo $__env->yieldContent('seo'); ?>
      <!-- Bootstrap CSS Cannn-->
      <link rel="preconnect" href="https://fonts.googleapis.com">
      <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
      <!-- <link href="https://fonts.googleapis.com/css2?family=Roboto+Slab:wght@400;500&display=swap" rel="stylesheet"> -->
      <link href="https://fonts.googleapis.com/css2?family=Oooh+Baby&display=swap" rel="stylesheet">
      <link href="https://fonts.googleapis.com/css2?family=Oooh+Baby&family=Rowdies:wght@700&display=swap" rel="stylesheet">
      <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;600&display=swap" rel="stylesheet">
      <!-- <link rel="stylesheet" href="<?php echo e(url($templateFile .'/css/bootstrap.min.css')); ?>"> -->
      <link rel="stylesheet" href="<?php echo e(url($templateFile .'/fonts/themify-icons/themify-icons.css')); ?>">
      
      <link rel="stylesheet" href="<?php echo e(asset('css/sweetalert2.min.css')); ?>">
      <link rel="stylesheet" href="<?php echo e(asset($templateFile .'/plugins/owl-carousel/assets/owl.carousel.min.css')); ?>">
      <link rel="stylesheet" href="<?php echo e(asset($templateFile .'/plugins/owl-carousel/assets/owl.theme.default.min.css')); ?>">

      <link rel="stylesheet" href="<?php echo e(url($templateFile .'/css/simplebar.min.css')); ?>">
      <link rel="stylesheet" href="<?php echo e(url($templateFile .'/plugins/tiny-slider/tiny-slider.css')); ?>">
      <link rel="stylesheet" href="<?php echo e(url($templateFile .'/css/drift-basic.min.css')); ?>">
      <link href="<?php echo e(asset('assets/plugin/select2/css/select2.min.css')); ?>" rel="stylesheet" />

      <?php echo $__env->yieldPushContent('styles'); ?>
      
      <link rel="stylesheet" href="<?php echo e(url($templateFile .'/css/theme.min.css')); ?>">
      <link rel="stylesheet" href="<?php echo e(url($templateFile .'/css/style.css?ver='. time())); ?>">
      <link rel="stylesheet" href="<?php echo e(url($templateFile .'/fonts/font-awesome.min.css')); ?>">
      <?php echo $__env->yieldPushContent('head-style'); ?>
      
      <?php echo $__env->yieldPushContent('head-script'); ?>
   </head>
   <body>
      <?php $headerMenu = Menu::getByName('Menu-main'); ?>
      <?php $headerMenuCannn = Menu::getByName('menu-cannn'); ?>
      <?php echo $__env->make($templateFile .'.layouts.header', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
      
      <?php $__env->startSection('top'); ?>
         <?php echo $__env->make($templatePath.'.layouts.block_top', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
      <?php echo $__env->yieldSection(); ?>
      
      <!-- Start Main -->
      
      <div class="container">
         <!-- Research, Document, Library 8 - 4 -->
         <div class="row">
            <div class="col-lg-8 col-md-8 col-sm-12">
               
               <?php $__env->startSection('left'); ?>
                  <?php echo $__env->make($templatePath.'.layouts.block_left', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
               <?php echo $__env->yieldSection(); ?>
               
            </div>
            <div class="col-lg-4 col-md-4 col-sm-12">
               
               <?php $__env->startSection('right'); ?>
                  <?php echo $__env->make($templatePath.'.layouts.block_right', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
               <?php echo $__env->yieldSection(); ?>
               
            </div>
         </div>
      </div>
      <div id="main">
            <?php echo $__env->yieldContent('content'); ?>
      </div>
      
      <?php $__env->startSection('block_bottom'); ?>
         <?php echo $__env->make($templatePath.'.layouts.block_bottom', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
      <?php echo $__env->yieldSection(); ?>
      
      <?php echo $__env->make($templateFile .'.layouts.footer', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
      <!-- Including Jquery -->
      <!-- Optional JavaScript Off Cann -->
      <!-- jQuery first, then Popper.js, then Bootstrap JS -->
      <script src="<?php echo e(asset($templateFile.'/js/jquery.min.js')); ?>"></script>
      <!-- <script src="<?php echo e(asset($templateFile.'/js/popper.min.js')); ?>"></script> -->
      <!-- <script src="<?php echo e(asset($templateFile.'/js/bootstrap.min.js')); ?>"></script> -->


      <script src="/js/axios.min.js"></script>
      <script src="/js/sweetalert2.all.min.js"></script>
      <script src="/js/jquery.validate.min.js"></script>

      <script src="<?php echo e(asset($templateFile .'/plugins/simplebar.min.js')); ?> "></script>
      <script src="<?php echo e(asset($templateFile .'/plugins/owl-carousel/owl.carousel.min.js')); ?>"></script>
      <script src="<?php echo e(asset($templateFile .'/plugins/bootstrap.bundle.min.js')); ?> "></script>
      <script src="<?php echo e(asset($templateFile .'/plugins/smooth-scroll.polyfills.min.js')); ?> "></script>
      <script src="<?php echo e(asset($templateFile .'/plugins/Drift.min.js')); ?> "></script>
      <script src="<?php echo e(asset($templateFile .'/plugins/tiny-slider/tiny-slider.js')); ?> "></script>
      <script src="<?php echo e(asset('assets/plugin/select2/js/select2.min.js')); ?>"></script>

      <script src="<?php echo e(asset($templateFile .'/js/theme.min.js')); ?>"></script>

      <!-- jQuery UI -->
      <script src="<?php echo e(asset($templateFile.'/js/jquery-ui.min.js')); ?>"></script>
      <script src="<?php echo e(asset($templateFile.'/js/myscript.js')); ?>"></script>
      <script src="<?php echo e(asset('js/customer.js')); ?>"></script>
      <script src="<?php echo e(asset($templateFile .'/js/custom.js?ver=1.62')); ?>"></script>
      <!-- Optional End JavaScript Off Cann -->
      <?php echo $__env->yieldPushContent('after-footer'); ?>
      <?php echo $__env->yieldPushContent('scripts'); ?>
   </body>
</html><?php /**PATH /home/admin/domains/exproweb.com/public_html/thuvientonghop/resources/views/theme/layouts/index.blade.php ENDPATH**/ ?>
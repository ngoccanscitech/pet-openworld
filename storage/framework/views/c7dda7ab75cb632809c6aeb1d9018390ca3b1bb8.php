
<?php $__env->startSection('seo'); ?>
<?php echo $__env->make($templatePath .'.layouts.seo', $seo??[] , \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php $__env->stopSection(); ?>


<?php $__env->startSection('content'); ?>
<section class="position-relative">
   <div class="container">
      <div class="row justify-content-center">
         <div class="col-lg-8 pt-lg-4 pb-4 mb-3">
            <div class="pt-2 px-4 ps-lg-0 pe-xl-5">
               <!-- Title-->
               <div class="d-sm-flex flex-wrap justify-content-between align-items-center pb-2">
                  <h2 class="h3 py-2 me-2 text-center text-sm-start"><?php echo e($page->title); ?></h2> 
               </div>

               <form method="post" action="<?php echo e(route('document_upload')); ?>" enctype="multipart/form-data" id="document-upload">
                  <?php echo csrf_field(); ?>
                  <div class="list-content-loading">
                     <div class="half-circle-spinner">
                         <div class="circle circle-1"></div>
                         <div class="circle circle-2"></div>
                     </div>
                  </div>
                  <div class="mb-3 pb-2">
                     <label class="form-label" for="unp-name">Tên tài liệu</label>
                     <input class="form-control" type="text" id="unp-name" name="name" value="<?php echo e(old('name')); ?>">
                     <div class="form-text">Tối đa 100 ký tự. Không có mã HTML hoặc mã emoji.</div>
                  </div>
                  <div class="mb-3 py-2">
                     <label class="form-label" for="unp-description">Mô tả</label>
                     <textarea class="form-control" rows="6" id="unp-description" name="content"><?php echo e(old('description')); ?></textarea>
                  </div>
                  <div class="file-drop-area mb-3">
                     <div class="file-drop-icon ci-cloud-upload"></div><span class="file-drop-message">Drag and drop here to upload product screenshot</span>
                     <input class="file-drop-input" type="file" name="file">
                     <button class="file-drop-btn btn btn-primary btn-sm mb-2" type="button">Or select file</button>
                     <div class="form-text">1000 x 800px ideal size for hi-res displays</div>
                  </div>

                  
                  <button class="btn btn-primary d-block w-100 submit-upload" type="button"><i class="ci-cloud-upload fs-lg me-2"></i>Đăng tài liệu</button>
               </form>
            </div>
         </div>
      </div>
   </div>
</section>
<?php $__env->stopSection(); ?>

<?php $__env->startPush('styles'); ?>
   <link type="text/css" rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
   <link type="text/css" rel="stylesheet" href="<?php echo e(asset($templateFile .'/plugins/upload-image-js/image-uploader.min.css')); ?>">
<?php $__env->stopPush(); ?>
<?php $__env->startPush('scripts'); ?>
   <script type="text/javascript" src="<?php echo e(asset($templateFile .'/plugins/upload-image-js/image-uploader.min.js')); ?>"></script>
   <script type="text/javascript" src="<?php echo e(asset($templateFile .'/js/image-uploader.js')); ?>"></script>
<?php $__env->stopPush(); ?>
<?php echo $__env->make($templatePath .'.layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/admin/domains/exproweb.com/public_html/thuvientonghop/resources/views/theme/document/upload.blade.php ENDPATH**/ ?>
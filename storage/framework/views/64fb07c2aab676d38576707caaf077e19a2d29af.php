<?php extract($data); ?>



<?php $__env->startSection('seo'); ?>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
    <div id='page-content'>
        <h1 class="text-center mt-3"><?php echo e($page->title); ?></h1>
        <div class="page-wrapper container my-5">
            <div class="row">
                <div class="col-12 mx-auto">
                    <?php echo htmlspecialchars_decode($page->content); ?>

                </div>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make($templatePath.'.layouts.index', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/admin/domains/exproweb.com/public_html/thuvientonghop/resources/views/theme/page/index.blade.php ENDPATH**/ ?>
<?php $__env->startSection('seo'); ?>
<?php echo $__env->make($templatePath .'.layouts.seo', $seo??[] , \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>

    <section class="space-ptb my-5 ">
        <div class="container">
            <div class="row align-items-center justify-content-center mb-4">
                <div class="col-lg-8 text-center">
                    <div class="section-title mb-0 mt-4">
                        <h3 class="d-inline">Wishlists</h3>
                    </div>
                </div>
            </div>
            <div class="row mx-n2">
                <?php if(isset($wishlist)): ?>
                    <?php $__currentLoopData = $wishlist; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $product): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <div class="col-lg-3 col-md-4 col-6 px-2">
                            <?php echo $__env->make($templatePath .'.product.product-item', compact('product'), \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                        </div>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                <?php else: ?>
                    <div class="text-center py-5">
                        <img src="<?php echo e(asset('assets/images/empty-state.svg')); ?>" alt="">
                    </div>
                <?php endif; ?>
            </div>
        </div>
    </section>

    
    <?php $__env->startPush('after-footer'); ?>
    <script src="<?php echo e(asset('theme/js/customer.js')); ?>"></script>
    <?php $__env->stopPush(); ?>
<?php $__env->stopSection(); ?>

<?php echo $__env->make($templatePath .'.layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/admin/domains/exproweb.com/public_html/thuvientonghop/resources/views/theme/customer/wishlist.blade.php ENDPATH**/ ?>
<?php $__env->startSection('seo'); ?>
<?php echo $__env->make($templatePath .'.layouts.seo', $seo??[] , \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
<div class="container mt-4">
    <div class="row">
        <aside class="col-lg-3">
            <?php echo $__env->make($templatePath .'.product.sidebar', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
        </aside>

        <section class="col-lg-9">
                <form action="" method="get">
                    <div class="collection-header mt-2 mb-4">
                        <div class="d-flex flex-wrap justify-content-end">
                            <div class="d-flex align-items-center flex-nowrap me-3 me-sm-4">
                                <label class="fs-sm text-nowrap me-2 d-none d-sm-block" for="sorting">SẮP XẾP THEO:</label>
                                <select class="form-select" id="sorting" name="sort" onchange="this.form.submit()">
                                    <option value="id__desc" <?php echo e(request('sort') == 'id__desc' ? 'selected' : ''); ?>>Mới nhất</option>
                                    <option value="id__asc" <?php echo e(request('sort') == 'id__asc' ? 'selected' : ''); ?>>Cũ nhất</option>
                                    <option value="price__asc" <?php echo e(request('sort') == 'price__asc' ? 'selected' : ''); ?>>Giá tăng dần</option>
                                    <option value="price__desc" <?php echo e(request('sort') == 'price__desc' ? 'selected' : ''); ?>>Giá giảm dần</option>
                                    <option value="name__desc" <?php echo e(request('sort') == 'name__desc' ? 'selected' : ''); ?>>Từ A - Z</option>
                                    <option value="name__asc" <?php echo e(request('sort') == 'name__asc' ? 'selected' : ''); ?>>Từ Z - A</option>
                                </select>
                            </div>
                          </div>
                    </div>
                </form>
                <div class="row mx-n2">
                    <?php $__currentLoopData = $products; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $product): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <div class="col-md-4 col-sm-6 px-2 mb-4">
                        <?php echo $__env->make($templatePath .'.product.product-item', compact('product'), \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                    </div>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </div>
                <!--Pagination-->
                <hr class="clear">
                <?php echo $products->withQueryString()->links(); ?>

        </section>
    </div>
</div>

<?php $__env->stopSection(); ?>

<?php echo $__env->make($templatePath .'.layouts.index', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/admin/domains/exproweb.com/public_html/thuvientonghop/resources/views/theme/product/product-category.blade.php ENDPATH**/ ?>
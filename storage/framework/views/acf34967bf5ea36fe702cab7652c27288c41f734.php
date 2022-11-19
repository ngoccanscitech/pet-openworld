<?php
    if(isset($slider))
        extract($slider->toArray());
?>

<form id="form-editSlider" action="" method="post" enctype="multipart/form-data">
    <input type="hidden" name="id" value="<?php echo e($id??0); ?>">
    <input type="hidden" name="slider_id" value="<?php echo e($parent??0); ?>">
    <div class="form-group">
        <label for="name">Tên</label>
        <input type="text" class="form-control" id="name"  name="name" value="<?php echo e($name??''); ?>">
    </div>
    <div class="form-group">
        <label for="link">Link</label>
        <input type="text" class="form-control" name="link" value="<?php echo e($link??''); ?>">
    </div>
    <div class="form-group">
        <label for="order">STT</label>
        <input id="order" type="text" name="order" class="form-control" value="<?php echo e($order??''); ?>">
    </div>
    <div class="form-group">
        <div class="inserIMG">
            <input type="hidden" name="src" id="src-img" value="<?php echo e($src ?? ''); ?>">
            <?php if(isset($src) && $src!=''): ?>
                <img src="<?php echo e(asset($slider->src)); ?>" id="show-img" class="show-img src-img ckfinder-popup" data-show="show-img" data="src-img" width="200" onerror="this.onerror=null;this.src='<?php echo e(asset('assets/images/placeholder.png')); ?>';">
            <?php else: ?>
                <img src="<?php echo e(asset('assets/images/placeholder.png')); ?>" id="show-img" class="src-img ckfinder-popup" data-show="show-img" data="src-img" width="200">
            <?php endif; ?>
            <span class="remove-icon" data-img="<?php echo e(asset('assets/images/placeholder.png')); ?>">X</span>
        </div>
    </div>
    <div class="form-group">
        <textarea name="description" id="description" class="form-control"><?php echo $description??''; ?></textarea>
    </div>
</form><?php /**PATH /home/admin/domains/exproweb.com/public_html/thuvientonghop/resources/views/admin/slider-home/includes/form.blade.php ENDPATH**/ ?>
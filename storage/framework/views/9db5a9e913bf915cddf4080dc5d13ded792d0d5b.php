<!--Module bottom -->
<?php if(isset($blocksContent['top'])): ?>
    <?php $__currentLoopData = $blocksContent['top']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $layout): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <?php
        $arrPage = explode(',', $layout->page)
        ?>
        <?php if($layout->page == '*' || (isset($layout_page) && in_array($layout_page, $arrPage))): ?>
            <?php if ($__env->exists($templatePath .'.block.'.$layout->text, ['layout_title' => $layout->name, 'description' => $layout->description])) echo $__env->make($templatePath .'.block.'.$layout->text, ['layout_title' => $layout->name, 'description' => $layout->description], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
        <?php endif; ?>
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
<?php endif; ?>
<!--//Module bottom --><?php /**PATH /home/admin/domains/exproweb.com/public_html/thuvientonghop/resources/views/theme/layouts/block_top.blade.php ENDPATH**/ ?>
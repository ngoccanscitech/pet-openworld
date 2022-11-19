<!--Module right -->

<?php if(isset($blocksContent['right'])): ?>
    <?php $__currentLoopData = $blocksContent['right']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $layout): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <?php
        $arrPage = explode(',', $layout->page)
        ?>
        <?php if($layout->page == '*' || (isset($layout_page) && in_array($layout_page, $arrPage))): ?>
            <?php if ($__env->exists($templatePath .'.block.'.$layout->text, ['description' => $layout->description])) echo $__env->make($templatePath .'.block.'.$layout->text, ['description' => $layout->description], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
        <?php endif; ?>
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
<?php endif; ?>
<!--//Module right --><?php /**PATH C:\wamp64\www\expro\Laravel\oppenworld\resources\views/theme/layouts/block_right.blade.php ENDPATH**/ ?>
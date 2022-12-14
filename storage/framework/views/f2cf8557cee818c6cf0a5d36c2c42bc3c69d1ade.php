<?php
    $spec = $spec_short ?? '';
    if($spec != ''){
        $spec = json_decode($spec, true);
        end($spec);         // move the internal pointer to the end of the array
        $key_index = key($spec);
    }
?>
<div class="spec">
    <div class="row mb-2">
        <div class="col-5 border-bottom pb-1">Tiêu đề</div>
        <div class="col-5 border-bottom pb-1">Nội dung</div>
        <div class="col-2 border-bottom pb-1"></div>
    </div>
    <div class="spec-short-clone" data="<?php echo e($key_index ?? 0); ?>" style="display: none;">
        <div class="form-group row group-item">
            <div class="col-5">
                <input type="text" class="form-control spec-short-name" name="">
            </div>
            <div class="col-5">
                <input type="text" class="form-control spec-short-desc" name="">
            </div>
            <div class="col-2">
                <button type="button" class="btn btn-danger w-100 text-center spec-remove">Xóa</button>
            </div>
        </div>
    </div>
    <div class="spec-short-group">
        <?php if($spec != '' && is_array($spec)): ?>
        <?php //dd($spec) ?>
            <?php $__currentLoopData = $spec; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $index => $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <div class="form-group row group-item">
                    <div class="col-5">
                        <input type="text" class="form-control spec-short-name" name="spec_short[<?php echo e($index); ?>][name]" value="<?php echo e($item['name'] ?? ''); ?>">
                    </div>
                    <div class="col-5">
                        <input type="text" class="form-control spec-short-desc" name="spec_short[<?php echo e($index); ?>][desc]" value="<?php echo e($item['desc'] ?? ''); ?>">
                    </div>
                    <div class="col-2">
                        <button type="button" class="btn btn-danger w-100 text-center spec-remove">Xóa</button>
                    </div>
                </div>

            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        <?php endif; ?>
    </div>
    <div class="spec-btn text-right">
        <button type="button" class="btn btn-primary spec-short-add">Thêm trường</button>
    </div>
</div>


<?php $__env->startPush('scripts'); ?>
<script>
    jQuery(document).ready(function($) {
        /*====================
    thong so ky thuat
    ====================*/
    
    var spec = $('.spec');
    if(spec.length > 0){
        $('.spec-short-add').click(function(){
            var id = spec.find('.spec-short-clone').attr('data');
            id = parseInt(id) + 1;
            spec.find('.spec-short-clone').attr('data', id);
            
            var html = spec.find('.spec-short-clone').find('.group-item').clone();
            html.find('input.spec-short-name').attr('name', 'spec_short[' + id + '][name]');
            html.find('input.spec-short-desc').attr('name', 'spec_short[' + id + '][desc]');
            spec.find('.spec-short-group').append(html);
        });

        $(document).on('click', '.spec-remove', function(){
            console.log('fa');
            $(this).closest('.form-group').remove();
        });
    }

    /*====================
    end thong so ky thuat
    ====================*/
    });
</script>
<?php $__env->stopPush(); ?><?php /**PATH /home/admin/domains/exproweb.com/public_html/thuvientonghop/resources/views/admin/product/includes/spec-short.blade.php ENDPATH**/ ?>
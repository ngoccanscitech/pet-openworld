<div class="your-order">
    <h4 class="order-title mb-4">Chi tiết đơn hàng</h4>

    <div class="table-responsive-sm order-table">
        <table class="bg-white table table-bordered table-hover text-center">
            <thead>
                <tr>
                    <th class="text-left">Tên SP</th>
                    <th width="20%">Giá</th>
                    <th width="15%">Đơn vị</th>
                    <th>SL</th>
                    <th width="20%">Thành tiền</th>
                </tr>
            </thead>
            <tbody>
                <?php $weight = 0; ?>
                <?php 
                    //$product = \App\Product::find($cart->id); 
                    $weight = $weight + $product->weight ;
                ?>
                <tr>
                    <td class="text-left"><?php echo e($product->name); ?></td>
                    <td><?php echo render_price($product->price); ?></td>
                    <td>
                        <?php if(count($option['options'])): ?>
                            <?php $__currentLoopData = $option['options']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $groupAttr => $variable): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <div><?php echo e($variable_group[$groupAttr]); ?>: <?php echo render_option_name($variable); ?></div>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        <?php endif; ?>
                    </td>
                    <td><?php echo e($option['qty']); ?></td>
                    <td><?php echo render_price($product->price); ?></td>
                </tr>
            </tbody>
            <tfoot class="font-weight-600">
                <!-- <tr class="shipping">
                    <td colspan="4" class="text-right">Shipping </td>
                    <td class="shipping_cost">Calculated at next step</td>
                </tr> -->
                <tr>
                    <td colspan="4" class="text-right">Tổng tiền</td>
                    <td class="cart_total"><?php echo render_price($total); ?></td>
                </tr>
            </tfoot>
        </table>
        <input type="hidden" name="pounds" value="<?php echo e($weight); ?>">
        <input type="hidden" name="ounces" value="0">
    </div>
</div><?php /**PATH /home/admin/domains/exproweb.com/public_html/thuvientonghop/resources/views/theme/cart/includes/quick_buy_cart_item.blade.php ENDPATH**/ ?>
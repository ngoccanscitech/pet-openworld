<?php $__env->startSection('seo'); ?>
<?php echo $__env->make($templatePath .'.layouts.seo', $seo??[] , \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
<section class="py-5 my-post bg-light  position-relative">
    <div class="container">
        <div class="row justify-content-end">
            <div class="col-lg-3  col-12 mb-4">
                <?php echo $__env->make($templatePath .'.customer.includes.sidebar-customer', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
            </div>
            <div class="col-lg-9 col-12">
                <div class="page-title">
                    <h1>Đơn hàng của bạn</h1>
                </div>
                <div class="table-responsive">          
                	<table class="table tbl-my-reviews">
                		<thead>
                		  <tr>
                		    <th>Mã đơn hàng</th>
                            <th>Tên</th>
                            <th>Thời gian đặt</th>
                            <th>Thành tiền</th>
                            <th>Thanh toán</th>
                            <th>Trạng thái đơn hàng</th>
                		  </tr>
                		</thead>
                		<tbody>
                            <?php $__currentLoopData = $data_order; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $data): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    			<tr class="alternate">
                                    <td scope="row" id="column-<?php echo e($data->cart_id); ?>">
                                        <a href="<?php echo e(route('customer.myordersdetail', array($data->cart_id))); ?>" ><b><?php echo e($data->cart_code); ?></b></a>
                                    </td>
                                    <td class="name column-name">
                                        <a href="<?php echo e(route('customer.myordersdetail', array($data->cart_id))); ?>" ><?php echo e($data->firstname); ?> <?php echo e($data->lastname); ?></a>
                                    </td>
                                    <td>
                                        <?php echo e($data->created_at); ?>

                                    </td>
                                    <td>
                                        <span style="color:#F00;"><?php echo render_price($data->cart_total); ?></span>
                                    </td>
                                    <td>
                                        <?php if($data->cart_payment == 0): ?>
                                        <span class="badge bg-primary"><?php echo e($orderPayment[$data->cart_payment]); ?></span>
                                        <?php else: ?>
                                        <span class="badge bg-info"><?php echo e($orderPayment[$data->cart_payment]); ?></span>
                                        <?php endif; ?>
                                    </td>
                                    <td>
                                        <span class="badge cart-status-<?php echo e($data->cart_status); ?>"><?php echo e($statusOrder[$data->cart_status]??'Chờ xác nhận'); ?></span>
                                		<?php 
                                			/*if($data->cart_status==1)
                                                echo 'New';
                                            elseif($data->cart_status==3)
                                				echo 'Cancelled';
                                            elseif($data->cart_status==4)
                                                echo 'Processing';
                                            elseif($data->cart_status==6)
                                                echo 'Paid-Completed';
                                            elseif($data->cart_status==7)
                                                echo 'Delivery in progress';
                                			else
                    	            			echo 'Unpaid';*/
                    	                ?>
                                    </td>
                                </tr>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                		</tbody>
                	</table>
                </div>
            </div>
        </div>
    </div>
</section>
<?php $__env->stopSection(); ?>
<style type="text/css">
    .cart-status-1{
        color: #fff !important;
        background-color: #007bff!important;
    }
    .cart-status-2{
        color: #fff !important;
        background-color: #17a2b8!important;
    }
    .cart-status-3{
        color: #fff !important;
        background-color: #dc3545!important;
    }
    .cart-status-4{
        background-color: #ffc107!important;
    }
    .cart-status-5{
        background-color: #28a745!important;
    }

</style>
<?php echo $__env->make($templatePath .'.layouts.index', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/admin/domains/exproweb.com/public_html/thuvientonghop/resources/views/theme/customer/myorder.blade.php ENDPATH**/ ?>
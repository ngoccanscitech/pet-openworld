<?php
	$reviews = \App\Model\Review::where('status', 1)->limit(10)->get();
?>
<?php if($reviews->count()): ?>
<div class="container py-lg-5 py-3">
	<div class="author-hot">
		<h4 class="content-heading">Chia sẻ từ thành viên</h4>
		<div class="px-lg-5">
			<div class="tns-carousel tns-controls-static tns-controls-outside">
				<div class="tns-carousel-inner" data-carousel-options='{"items": 4, "nav": true, "responsive": {"0":{"items":1, "gutter": 5},"500":{"items":2, "gutter": 8},"768":{"items":4, "gutter": 8}, "1100":{"gutter": 12}}}'>
					<?php $__currentLoopData = $reviews; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
					<div class="review-item">
						<div class="my-2 p-2">
							<div class="custom-shadow p-3">
		                   <p class="card-text overflow-hidden">
		                     <span class="rating-star float-left">
		                       <span class="fa fa-star checked"></span>
		                       <span class="fa fa-star checked"></span>
		                       <span class="fa fa-star checked"></span>
		                       <span class="fa fa-star checked"></span>
		                       <span class="fa fa-star"></span>
		                     </span>
		                   </p>
		                  <div class="review-desc">
		                  	<?php echo htmlspecialchars_decode($item->description); ?>

		                  </div>
		                  <div class="member-image">
		                     <div class="img">
		                     	<img src="<?php echo e(asset($item->image)); ?>" alt="">
		                     </div>
		                  </div>
		                  <h5 class="card-member-name"><?php echo e($item->name); ?></h5>
		               </div>
		              </div>
               </div>
					<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

				</div>
			</div>
		</div>
	</div>
</div>
<?php endif; ?><?php /**PATH C:\wamp64\www\expro\Laravel\oppenworld\resources\views/theme/block/review.blade.php ENDPATH**/ ?>
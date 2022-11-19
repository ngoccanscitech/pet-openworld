<?php
	$users = \App\User::where('status', 1)->where('expert', 1)->limit(10)->get();
?>
<?php if($users->count()): ?>
<div class="container pt-lg-5 py-3">
	<div class="author-hot">
		<h4 class="content-heading">Một số tác giả tiêu biểu</h4>

		<ul class="nav nav-tabs nav-tabs-custom" role="tablist">
	      <li class="nav-item ">
	         <a class="nav-link active" href="#author-hot"  data-bs-toggle="tab" role="tab">Nổi bật nhất tháng</a>
	      </li>
	      <li class="nav-item">
	         <a class="nav-link" href="#author-new"  data-bs-toggle="tab" role="tab">Tác giả mới</a>
	      </li>
	   </ul>

	   <div class="tab-content">
      	<div class="tab-pane fade show active" id="author-hot" role="tabpanel">
      		<div class="px-lg-5">
					<div class="tns-carousel tns-controls-static tns-controls-outside">
						<div class="tns-carousel-inner" data-carousel-options='{"items": 4, "nav": true, "responsive": {"0":{"items":1, "gutter": 15},"500":{"items":2, "gutter": 18},"768":{"items":4, "gutter": 20}, "1100":{"gutter": 24}}}'>
							<?php $__currentLoopData = $users; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $author): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
							<div>
								<?php echo $__env->make($templatePath .'.author.author-item', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
							</div>
							<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

						</div>
					</div>
				</div>
      	</div>
      	<div class="tab-pane fade" id="author-new" role="tabpanel">
      		<div class="px-lg-5">
					<div class="tns-carousel tns-controls-static tns-controls-outside">
						<div class="tns-carousel-inner" data-carousel-options='{"items": 4, "nav": true, "responsive": {"0":{"items":1, "gutter": 15},"500":{"items":2, "gutter": 18},"768":{"items":4, "gutter": 20}, "1100":{"gutter": 24}}}'>
							<?php $__currentLoopData = $users; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $author): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
							<div>
								<?php echo $__env->make($templatePath .'.author.author-item', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
							</div>
							<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

						</div>
					</div>
				</div>
      	</div>
      </div>

		
	</div>
</div>
<?php endif; ?><?php /**PATH /home/admin/domains/exproweb.com/public_html/thuvientonghop/resources/views/theme/block/author-hot.blade.php ENDPATH**/ ?>
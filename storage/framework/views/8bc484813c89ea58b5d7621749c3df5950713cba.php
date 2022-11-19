<ul id="nav" class="nav justify-content-center">
	<?php $__currentLoopData = $headerMenu; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
		<?php
			$class_active ='';
		?>
		<?php if(empty($value['child'])): ?>
			<li class="nav-item "><a class="nav-link <?php echo e($class_active); ?>" href="<?php echo e(url($value['link'])); ?>"><?php echo e($value['label']); ?></a></li>
		<?php else: ?>
			<li class="nav-item has_child"><a class="nav-link <?php echo e($class_active); ?>" href="<?php echo e(url($value['link'])); ?>"><?php echo e($value['label']); ?></a>
				<ul class="subnav">
					<?php $__currentLoopData = $value['child']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $value_child): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
					<?php
						$class_active_child="";
					?>
					<?php if(empty($value_child['child'])): ?>
						<li class=""><a class="nav-link <?php echo e($class_active_child); ?>" href="<?php echo e(url($value_child['link'])); ?>"><?php echo e($value_child['label']); ?></a></li>
					<?php else: ?>
						<li class="chev-right <?php echo e($class_active_child); ?>"><a class="nav-link" href="<?php echo e(url($value_child['link'])); ?>"><?php echo e($value_child['label']); ?></a></i>
							<ul class="subnav">
								<?php $__currentLoopData = $value_child['child']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $value_child_2): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
									<li><a href="<?php echo e(url($value_child_2['link'])); ?>"><?php echo e($value_child_2['label']); ?></a></li>
								<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
							</ul>
						</li>
					<?php endif; ?>
				<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
				</ul>
			</li>
		<?php endif; ?>
	<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
	<li></li>
</ul><?php /**PATH /home/admin/domains/exproweb.com/public_html/thuvientonghop/resources/views/theme/layouts/menu-main.blade.php ENDPATH**/ ?>
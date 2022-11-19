<div class="card author-item">
	<div class="author-img">
		<div class="img">
			<img src="<?php echo e(asset($author->avatar)); ?>" alt="<?php echo e($author->fullname); ?>" class="card-img-top">
		</div>
	</div>
	<div class="details">
		<div class="detail-top">
			<h5 class="card-title title"><?php echo e($author->fullname); ?></h5>
			<p class="card-text info">“ <?php echo e($author->slogan); ?> “</p>
		</div>
		<div class="info-achieve">
			<?php echo htmlspecialchars_decode( $author->about_me ); ?>

			<a href="<?php echo e(route('author.detail', $author->id)); ?>">Xem thêm</a>
		</div>
	</div>
</div><?php /**PATH /home/admin/domains/exproweb.com/public_html/thuvientonghop/resources/views/theme/author/author-item.blade.php ENDPATH**/ ?>
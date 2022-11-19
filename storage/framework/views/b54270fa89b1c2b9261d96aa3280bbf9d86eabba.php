<?php 
	$headerMenu = Menu::getByName('Menu-main');
	//$agent = new Jenssegers\Agent\Agent;
?>
<?php echo $__env->make($templatePath . '.layouts.index', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\wamp64\www\expro\Laravel\oppenworld\resources\views/theme/layout.blade.php ENDPATH**/ ?>
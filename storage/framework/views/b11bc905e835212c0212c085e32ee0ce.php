<?php $__env->startSection('title', 'Kategoriyalar | Baraka Development'); ?>
<?php $__env->startSection('main-content'); ?>
<!-- Start Contact -->
<section id="contact-us">
	<div class="container">
		<div class="col-auto">
			<nav class="mb-2" aria-label="breadcrumb">
				<ol class="breadcrumb mb-0">
					<li class="breadcrumb-item"><a href="<?php echo e(route('home')); ?>">Bosh sahifa</a></li>
					<li class="breadcrumb-item active" aria-current="page">Kategoriyalar</li>
				</ol>
			</nav><br>
		</div>
	</div>
</section>
<!--/ End Contact -->

<?php $__env->stopSection(); ?>
<?php echo $__env->make('frontend.layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /var/www/barakarasmiy/resources/views/frontend/pages/kategoriyalar.blade.php ENDPATH**/ ?>
<?php $__env->startSection('title', 'To\'lash rejasi | Baraka Development'); ?>
<?php $__env->startSection('main-content'); ?>
    <section>
        <div class="container">
            <div class="col-auto">
                <nav class="mb-2" aria-label="breadcrumb">
                    <ol class="breadcrumb mb-0">
                        <li class="breadcrumb-item"><a href="<?php echo e(route('home')); ?>">Bosh sahifa</a></li>
                        <li class="breadcrumb-item active" aria-current="page">To'lov</li>
                    </ol>
                </nav><br>
                <div class="row g-3 mb-9">
                    <div class="col-12">
                        <div class="whooping-banner w-100 rounded-3 overflow-hidden">
                            <img src="<?php echo e(asset('back/img/bannerlar/tulov.jpg')); ?>" alt="reja">
                        </div>
                    </div>
                </div>
                
            </div>
        </div>
    </section>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('frontend.layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /var/www/barakarasmiy/resources/views/frontend/pages/tulov.blade.php ENDPATH**/ ?>
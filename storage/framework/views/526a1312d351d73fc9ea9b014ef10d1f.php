<?php $__env->startSection('title', 'Barakada aksiyalar | Baraka Development'); ?>

<?php $__env->startSection('main-content'); ?>
<section id="contact-us">
    <div class="container">
        <div class="col-auto">
            <nav class="mb-2" aria-label="breadcrumb">
                <ol class="breadcrumb mb-0">
                    <li class="breadcrumb-item"><a href="<?php echo e(route('home')); ?>">Bosh sahifa</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Aksiyalar</li>
                </ol>
            </nav><br>
            <h2 class="mb-5">Aksiyalar</h2>
        </div>

        <div class="row">
            <div class="col-lg-12 col-12">
                <div class="row">
                    <?php $__currentLoopData = $promotions; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $promotion): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <div class="col-lg-4">
                            <div class="blog-card">
                                <a href="<?php echo e(route('promotion.detail', $promotion->slug)); ?>"><img class="w-100 rounded-3"
                                        src="<?php echo e($promotion->photo); ?>" alt="<?php echo e($promotion->photo); ?>" /></a>
                                <a href="<?php echo e(route('promotion.detail', $promotion->slug)); ?>">
                                    <h4 class="mb-1 pe-sm-5 lh-lg mt-2"><?php echo e($promotion->title); ?></h4>
                                </a>
                                <?php if($promotion->days_left > 0): ?>
                                    <span  data-feather="clock"
                                        style="height:18px;width:18px; color: green;"></span>
                                    Aksiya yakunlanishiga: <span class="badge-label"
                                        style="color: green;"><?php echo e($promotion->days_left); ?> kun qoldi</span>
                                <?php else: ?>
                                <span  data-feather="clock"
                                        style="height:18px;width:18px; color: red;"></span>
                                    <span class="badge-label"
                                        style="color: red;">Aksiya yakunlandi.</span>
                                <?php endif; ?>
                            </div>
                        </div>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    <div class="col-12">
                        <!-- Pagination -->
                        
                        <!--/ End Pagination -->
                    </div>
                </div>
            </div>

        </div>
    </div>
</section>

<?php $__env->stopSection(); ?>
<?php $__env->startPush('styles'); ?>
    <style>
        .pagination {
            display: inline-flex;
        }
    </style>

<?php $__env->stopPush(); ?>
<?php echo $__env->make('frontend.layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /var/www/barakarasmiy/resources/views/frontend/pages/promotion.blade.php ENDPATH**/ ?>
<?php $__env->startSection('title', 'Barakada yangiliklar | Baraka Development'); ?>

<?php $__env->startSection('main-content'); ?>
<section id="contact-us">
    <div class="container">
        <div class="col-auto">
            <nav class="mb-2" aria-label="breadcrumb">
                <ol class="breadcrumb mb-0">
                    <li class="breadcrumb-item"><a href="<?php echo e(route('home')); ?>">Bosh sahifa</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Yangiliklar</li>
                </ol>
            </nav>
        </div>
        <div class="row">
            <div class="col-lg-9 col-12">
                <div class="row">
                    <?php $__currentLoopData = $posts; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $post): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <div class="col-lg-4">
                            <div class="blog-card">
                                <?php if($post->youtube_link): ?>
                                    <div class="embed-responsive embed-responsive-16by9">
                                        <iframe class="embed-responsive-item w-100 rounded-3"
                                            src="https://www.youtube.com/embed/<?php echo e($post->youtube_link); ?>"
                                            allowfullscreen></iframe>
                                    </div>
                                <?php elseif($post->photo): ?>
                                    <img class="w-100 rounded-3" src="<?php echo e($post->photo); ?>"
                                        alt="<?php echo e($post->title); ?>" />
                                <?php endif; ?>
                                <a href="<?php echo e(route('blog.detail', $post->slug)); ?>">
                                    <h4 class="mb-3 pe-sm-5 lh-lg mt-2"><?php echo e($post->title); ?></h4>
                                </a>
                                <p style="font-size: 12px"><?php echo e($post->created_at->format('d M Y')); ?></p>
                            </div>
                        </div>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    <div class="col-12">
                        <!-- Pagination -->
                        
                        <!--/ End Pagination -->
                    </div>
                </div>
            </div>

            <div class="col-xl-3">

                <div class="search-box w-100 mb-2 mb-sm-0" style="max-width:30rem;">
                    <form class="position-relative" method="get" action="<?php echo e(route('blog.search')); ?>"
                        data-bs-toggle="search" data-bs-display="static">
                        <input class="form-control search-input search" type="search"
                            placeholder="Yangiliklarni qidirish" aria-label="Search">
                        <span class="fas fa-search search-box-icon"></span>
                    </form>
                </div>
                <h3 class="py-3 border-bottom border-dashed">Kategoriyalar</h3>
                <div>
                    <?php if(!empty($_GET['category'])): ?>
                                        <?php
                                            $filter_cats = explode(',', $_GET['category']);
                                        ?>
                    <?php endif; ?>
                    <form action="<?php echo e(route('blog.filter')); ?>" method="POST">
                        <?php echo csrf_field(); ?>
                        
                        <?php $__currentLoopData = Helper::postCategoryList('posts'); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $cat): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <a href="<?php echo e(route('blog.category', $cat->slug)); ?>" class="badge badge-tag me-2 mb-2""><?php echo e($cat->title); ?> </a>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </form>
                </div>

                <div class=" row g-0 py-3 border-bottom border-dashed align-items-end justify-content-between">
                            <div class="col-auto">
                                <h3 class="flex-1 mb-0 text-nowrap me-3">Eng so'nggi yangiliklar</h3>
                            </div>
                </div>
                <?php $__currentLoopData = $recent_posts; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $post): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <div class="py-3 border-bottom border-dotted">
                        <a class="text-body-highlight fw-bold mb-2 line-clamp-1 me-5 lh-base" style="color: black"
                            href="<?php echo e(route('blog.detail', $post->slug)); ?>"><?php echo e($post->title); ?></a>
                        <p><?php echo $post->summary; ?></p>
                        <p class="fs-10 text-body-tertiary fw-bold mb-1" style="font-size: 12px"><span
                                class="fa-solid fa-clock text-body-secondary me-1"></span><?php echo e($post->created_at->format('d M y')); ?>

                        </p>
                    </div>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                <h3 class="mb-3 py-3 border-bottom border-dashed">Teglar</h3>
                <div class="d-flex flex-wrap pb-7">
                    <?php if(!empty($_GET['tag'])): ?>
                                        <?php
                                            $filter_tags = explode(',', $_GET['tag']);
                                        ?>
                    <?php endif; ?>
                    <form action="<?php echo e(route('blog.filter')); ?>" method="POST">
                        <?php echo csrf_field(); ?>
                        <?php $__currentLoopData = Helper::postTagList('posts'); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $tag): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <a href="<?php echo e(route('blog.tag', $tag->title)); ?>"
                                class="badge badge-tag me-2 mb-2"><?php echo e($tag->title); ?> </a>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </form>
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
<?php echo $__env->make('frontend.layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /var/www/barakarasmiy/resources/views/frontend/pages/blog.blade.php ENDPATH**/ ?>
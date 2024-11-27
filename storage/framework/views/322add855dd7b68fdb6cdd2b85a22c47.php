<title><?php echo e($post->title); ?></title>

<?php $__env->startSection('main-content'); ?>
<!-- Breadcrumbs -->
<section>
    <div class="container">
        <div class="col-auto">
            <nav class="mb-2" aria-label="breadcrumb">
                <ol class="breadcrumb mb-0">
                    <li class="breadcrumb-item"><a href="<?php echo e(route('home')); ?>">Bosh sahifa</a></li>
                    <li class="breadcrumb-item active" aria-current="page"><?php echo e($post->title); ?></li>
                </ol>
            </nav>
        </div>

    </div>
</section>
<div class="container">
    <div class="pb-9">
        <div class="row gx-lg-9">
            <div class="col-xl-9 border-end-xl">
                <div class="card mb-9">
                    <div class="card-body">
                    <?php if($post->youtube_link): ?>
                                    <div class="embed-responsive embed-responsive-16by9">
                                        <iframe class="embed-responsive-item w-100"
                                            src="https://www.youtube.com/embed/<?php echo e($post->youtube_link); ?>"
                                            allowfullscreen></iframe>
                                    </div>
                                <?php elseif($post->photo): ?>
                                <img class="rounded w-100" style="height: 60vh" src="<?php echo e($post->photo); ?>"
                                alt="<?php echo e($post->photo); ?>">
                                <?php endif; ?>
                        
                        <h1 class="lh-sm fs-6 fs-xxl-2 mb-4 mt-2"><?php echo e($post->title); ?></h1>
                        <div class="card mb-5 mb-xxl-7">
                            <div class="card-body">
                                <div class="row gy-5">
                                    <div class="col-md-12 d-flex justify-content-between">
                                        <div>
                                            <?php if($post->quote): ?>
                                                <p class="text-body-tertiary"> <i class="fa fa-quote-left"></i>
                                                    <?php echo $post->quote; ?>

                                                </p>
                                            <?php endif; ?>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <h4>Teglar:</h4>
                        <?php
                            $tags = explode(',', $post->tags);
                        ?>
                        <?php $__currentLoopData = $tags; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $tag): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <p class="fs-8 mb-0 text-body-tertiary"><?php echo e($tag); ?></p>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </div>
                </div>
                <p class="text-justify text-body-secondary mb-6 mb-xxl-8"><?php echo $post->description; ?></p>
                
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
</div>
<?php $__env->stopSection(); ?>
<?php $__env->startPush('scripts'); ?>
    <script>
        $(document).ready(function () {

            (function ($) {
                "use strict";

                $('.btn-reply.reply').click(function (e) {
                    e.preventDefault();
                    $('.btn-reply.reply').show();

                    $('.comment_btn.comment').hide();
                    $('.comment_btn.reply').show();

                    $(this).hide();
                    $('.btn-reply.cancel').hide();
                    $(this).siblings('.btn-reply.cancel').show();

                    var parent_id = $(this).data('id');
                    var html = $('#commentForm');
                    $(html).find('#parent_id').val(parent_id);
                    $('#commentFormContainer').hide();
                    $(this).parents('.comment-list').append(html).fadeIn('slow').addClass('appended');
                });

                $('.comment-list').on('click', '.btn-reply.cancel', function (e) {
                    e.preventDefault();
                    $(this).hide();
                    $('.btn-reply.reply').show();

                    $('.comment_btn.reply').hide();
                    $('.comment_btn.comment').show();

                    $('#commentFormContainer').show();
                    var html = $('#commentForm');
                    $(html).find('#parent_id').val('');

                    $('#commentFormContainer').append(html);
                });

            })(jQuery)
        })
    </script>
<?php $__env->stopPush(); ?>
<?php echo $__env->make('frontend.layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /var/www/barakarasmiy/resources/views/frontend/pages/blog-detail.blade.php ENDPATH**/ ?>
<?php $__env->startSection('title', 'Bosh sahifa | Baraka Development'); ?>
<?php $__env->startSection('main-content'); ?>

<section class="py-1 px-xl-3">
    <div class="container px-xl-0 px-xxl-3">
        <div class="row g-3 mb-9">
            <div class="col-12">
                <div class="carousel slide carousel-fade" id="carouselExampleFade" data-bs-ride="carousel">
                    <div class="carousel-inner rounded">
                        <?php $__currentLoopData = $banners; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $banner): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <div class="carousel-item <?php echo e($key == 0 ? 'active' : ''); ?>">
                                <img class="d-block w-100" src="<?php echo e($banner->photo); ?>" alt="Slide <?php echo e($key + 1); ?>">
                            </div>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </div>
                    <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleFade"
                        data-bs-slide="prev">
                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                        <span class="sr-only">Oldingi</span>
                    </button>
                    <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleFade"
                        data-bs-slide="next">
                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                        <span class="sr-only">Keyingi</span>
                    </button>
                </div>
            </div>
        </div>
    </div>
</section>

<section class="py-1">
    <div class="container">
        <div class="row">
            <div class="brand-carousel-container">
                <div class="brand-carousel-track" id="brandCarouselTrack">
                    <?php
                        $brands = DB::table('brands')->orderBy('title', 'ASC')->where('status', 'active')->get();
                    ?>
                    <?php $__currentLoopData = $brands; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $brand): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <div class="brand-card">
                            <a href="<?php echo e(route('product-brand', $brand->slug)); ?>">
                                <?php if($brand->photo): ?>
                                    <img src="<?php echo e($brand->photo); ?>" alt="<?php echo e($brand->title); ?>">
                                <?php else: ?>
                                    <img src="https://via.placeholder.com/500x200" alt="#">
                                <?php endif; ?>
                            </a>
                        </div>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    <!-- Clone the first set of brand cards -->
                    <?php $__currentLoopData = $brands; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $brand): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <div class="brand-card">
                            <a href="<?php echo e(route('product-brand', $brand->slug)); ?>">
                                <?php if($brand->photo): ?>
                                    <img src="<?php echo e($brand->photo); ?>" alt="<?php echo e($brand->title); ?>">
                                <?php else: ?>
                                    <img src="https://via.placeholder.com/500x200" alt="#">
                                <?php endif; ?>
                            </a>
                        </div>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </div>
            </div>
        </div>
    </div>
</section>

<section class="pt-6" id="blog">
    <div class="container-md px-lg-7 px-xxl-3">
        <div class="text-start mb-3">
            <h2 class="mb-2">Nashrlar</h2>
            <?php if(!empty($_GET['category'])): ?>
                        <?php
                            $filter_cats = explode(',', $_GET['category']);
                        ?>
            <?php endif; ?>
            <form action="<?php echo e(route('blog.filter')); ?>" method="POST">
                <?php echo csrf_field(); ?>
                
                <?php $__currentLoopData = Helper::postCategoryList('posts'); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $cat): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <a href="<?php echo e(route('blog.category', $cat->slug)); ?>"
                        class="btn btn-sm btn-outline-info rounded-pill w-10 me-2"
                        style="font-size: 12px; padding: 5px 10px;"><?php echo e($cat->title); ?> </a>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                <a href="<?php echo e(route('blog')); ?>" class="btn btn-sm btn-info rounded-pill w-10 me-2"
                    style="font-size: 12px; padding: 5px 10px;">Barcha yangiliklar</a>
            </form>
        </div>
        <div class="row gx-3 gy-7">
            <?php if($posts): ?>
                <?php $__currentLoopData = $posts; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $post): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <div class="col-lg-3">
                        <div class="blog-card">
                            <?php if($post->youtube_link): ?>
                                <div class="embed-responsive embed-responsive-16by9">
                                    <iframe class="embed-responsive-item w-100 rounded-3"
                                        src="https://www.youtube.com/embed/<?php echo e($post->youtube_link); ?>" allowfullscreen></iframe>
                                </div>
                            <?php elseif($post->photo): ?>
                                <img class="w-100 rounded-3" src="<?php echo e($post->photo); ?>" alt="<?php echo e($post->title); ?>" />
                            <?php endif; ?>
                            <a href="<?php echo e(route('blog.detail', $post->slug)); ?>">
                                <h4 class="mb-3 pe-sm-5 lh-lg mt-2"><?php echo e($post->title); ?></h4>
                            </a>
                            <p class="mb-0"><?php echo $post->summary; ?></p>
                            <p style="font-size: 12px"><?php echo e($post->created_at->format('d M Y')); ?></p>
                        </div>
                    </div>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            <?php endif; ?>
        </div>
    </div>
</section>
<!-- Modal -->
<?php if($product_lists): ?>
    <?php $__currentLoopData = $product_lists; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $product): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <div class="modal fade" id="<?php echo e($product->id); ?>" tabindex="-1" role="dialog">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span class="ti-close"
                                aria-hidden="true"></span></button>
                    </div>
                    <div class="modal-body">
                        <div class="row no-gutters">
                            <div class="col-lg-6 col-md-12 col-sm-12 col-xs-12">
                                <!-- Product Slider -->
                                <div class="product-gallery">
                                    <div class="quickview-slider-active">
                                        <?php
                                            $photo = explode(',', $product->photo);
                                            // dd($photo);
                                        ?>
                                        <?php $__currentLoopData = $photo; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $data): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <div class="single-slider">
                                                <img src="<?php echo e($data); ?>" alt="<?php echo e($data); ?>">
                                            </div>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    </div>
                                </div>
                                <!-- End Product slider -->
                            </div>
                            <div class="col-lg-6 col-md-12 col-sm-12 col-xs-12">
                                <div class="quickview-content">
                                    <h2><?php echo e($product->title); ?></h2>
                                    <div class="quickview-ratting-review">
                                        <div class="quickview-ratting-wrap">
                                            <div class="quickview-ratting">
                                                
                                                <?php
                                                    $rate = DB::table('product_reviews')
                                                        ->where('product_id', $product->id)
                                                        ->avg('rate');
                                                    $rate_count = DB::table('product_reviews')
                                                        ->where('product_id', $product->id)
                                                        ->count();
                                                ?>
                                                <?php for($i = 1; $i <= 5; $i++): ?>
                                                    <?php if($rate >= $i): ?>
                                                        <i class="yellow fa fa-star"></i>
                                                    <?php else: ?>
                                                        <i class="fa fa-star"></i>
                                                    <?php endif; ?>
                                                <?php endfor; ?>
                                            </div>
                                            <a href="#"> (<?php echo e($rate_count); ?> customer review)</a>
                                        </div>
                                        <div class="quickview-stock">
                                            <?php if($product->stock > 0): ?>
                                                <span><i class="fa fa-check-circle-o"></i> <?php echo e($product->stock); ?> in
                                                    stock</span>
                                            <?php else: ?>
                                                <span><i class="fa fa-times-circle-o text-danger"></i>
                                                    <?php echo e($product->stock); ?> out stock</span>
                                            <?php endif; ?>
                                        </div>
                                    </div>
                                    <?php
                                        $after_discount =
                                            $product->price - ($product->price * $product->discount) / 100;
                                    ?>
                                    <h3><small><del class="text-muted">$<?php echo e(number_format($product->price, 2)); ?></del></small>
                                        $<?php echo e(number_format($after_discount, 2)); ?> </h3>
                                    <div class="quickview-peragraph">
                                        <p><?php echo html_entity_decode($product->summary); ?></p>
                                    </div>
                                    <?php if($product->size): ?>
                                                        <div class="size">
                                                            <div class="row">
                                                                <div class="col-lg-6 col-12">
                                                                    <h5 class="title">Size</h5>
                                                                    <select>
                                                                        <?php
                                                                            $sizes = explode(',', $product->size);
                                                                            // dd($sizes);
                                                                        ?>
                                                                        <?php $__currentLoopData = $sizes; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $size): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                                            <option><?php echo e($size); ?></option>
                                                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                                    </select>
                                                                </div>
                                                                
                                                            </div>
                                                        </div>
                                    <?php endif; ?>
                                    <form action="<?php echo e(route('single-add-to-cart')); ?>" method="POST" class="mt-4">
                                        <?php echo csrf_field(); ?>
                                        <div class="quantity">
                                            <!-- Input Order -->
                                            <div class="input-group">
                                                <div class="button minus">
                                                    <button type="button" class="btn btn-primary btn-number" disabled="disabled"
                                                        data-type="minus" data-field="quant[1]">
                                                        <i class="ti-minus"></i>
                                                    </button>
                                                </div>
                                                <input type="hidden" name="slug" value="<?php echo e($product->slug); ?>">
                                                <input type="text" name="quant[1]" class="input-number" data-min="1"
                                                    data-max="1000" value="1">
                                                <div class="button plus">
                                                    <button type="button" class="btn btn-primary btn-number" data-type="plus"
                                                        data-field="quant[1]">
                                                        <i class="ti-plus"></i>
                                                    </button>
                                                </div>
                                            </div>
                                            <!--/ End Input Order -->
                                        </div>
                                        <div class="add-to-cart">
                                            <button type="submit" class="btn">Add to cart</button>
                                            <a href="<?php echo e(route('add-to-wishlist', $product->slug)); ?>" class="btn min"><i
                                                    class="ti-heart"></i></a>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
<?php endif; ?>
<!-- Modal end -->
<?php $__env->stopSection(); ?>

<?php $__env->startPush('styles'); ?>
    <style>
        /* Banner Sliding */
        #Gslider .carousel-inner {
            background: #000000;
            color: black;
        }

        #Gslider .carousel-inner {
            height: 550px;
        }

        #Gslider .carousel-inner img {
            width: 100% !important;
            opacity: .8;
        }

        #Gslider .carousel-inner .carousel-caption {
            bottom: 60%;
        }

        #Gslider .carousel-inner .carousel-caption h1 {
            font-size: 50px;
            font-weight: bold;
            line-height: 100%;
            color: #F7941D;
        }

        #Gslider .carousel-inner .carousel-caption p {
            font-size: 18px;
            color: black;
            margin: 28px 0 28px 0;
        }

        #Gslider .carousel-indicators {
            bottom: 70px;
        }

        .brand-carousel-container {
            overflow: hidden;
            width: 100%;
            position: relative;
        }

        .brand-carousel-track {
            display: flex;
            transition: transform 0.5s ease;
        }

        .brand-card {
            border-radius: 10px;
            border: 0.2px solid #dce1e4;
            overflow: hidden;
            margin: 15px;
            text-align: center;
            padding: 20px;
            background-color: #fff;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            transition: transform 0.2s;
            min-width: calc(100% / 6 - 30px);
            box-sizing: border-box;
        }

        .brand-card img {
            width: 70%;
            height: auto;
            object-fit: contain;
        }

        .card-shadow {
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            transition: box-shadow 0.3s ease-in-out;
        }

        .card-shadow:hover {
            box-shadow: 0 8px 16px rgba(0, 0, 0, 0.2);
        }

        .badge.bg-primary {
            background-color: #00297D;
            /* Color adjusted to match the image */
            color: #fff;
            padding: 0.3rem 0.6rem;
            font-size: 0.75rem;
            border-radius: 1.25rem;
        }

        .product-card {
            position: relative;
            border-radius: 10px;
            overflow: hidden;
            border: 1px solid #ebebeb;
            padding: 15px;
            display: flex;
            flex-direction: column;
            justify-content: space-between;
        }

        .product-card .badge {
            position: absolute;
            top: 10px;
            left: 10px;
            background-color: purple;
            color: white;
            padding: 5px 10px;
            border-radius: 5px;
            font-size: 12px;
            font-weight: bold;
        }

        .product-card .installment-info {
            font-size: 14px;
            color: gray;
        }

        .product-card .price {
            font-size: 18px;
            font-weight: bold;
            color: #333;
        }

        .product-card .btn-wish {
            position: absolute;
            top: 10px;
            right: 10px;
        }

        .product-card .product-name {
            font-size: 16px;
            font-weight: bold;
        }

        .product-card img {
            max-height: 200px;
            object-fit: contain;
        }





        /* Category link styles */
        .category-link {
            text-decoration: none;
            color: inherit;
        }

        /* Category card styles */
        .category-card {
            background: linear-gradient(135deg, #eef1f6, #d4dce7);
            border-radius: 15px;
            border: none;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
            transition: transform 0.2s;
        }

        .category-card:hover {
            transform: scale(1.05);
        }

        /* Card body styles */
        .category-card .card-body {
            padding: 15px;
        }

        /* Image container styles */
        .image-container {
            border-radius: 15px;
            padding: 5px;
            background-color: #fff;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .image-container img {
            width: 70px;
            height: 50px;
        }

        /* Category title styles */
        .category-card h5 {
            font-size: 16px;
            margin: 0;
            color: #3a3a3a;
            font-family: Arial, sans-serif;
        }
    </style>
<?php $__env->stopPush(); ?>

<?php $__env->startPush('scripts'); ?>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js"></script>
    <script>
        /*==================================================================
                        [ Isotope ]*/
        var $topeContainer = $('.isotope-grid');
        var $filter = $('.filter-tope-group');

        // filter items on button click
        $filter.each(function () {
            $filter.on('click', 'button', function () {
                var filterValue = $(this).attr('data-filter');
                $topeContainer.isotope({
                    filter: filterValue
                });
            });

        });

        // init Isotope
        $(window).on('load', function () {
            var $grid = $topeContainer.each(function () {
                $(this).isotope({
                    itemSelector: '.isotope-item',
                    layoutMode: 'fitRows',
                    percentPosition: true,
                    animationEngine: 'best-available',
                    masonry: {
                        columnWidth: '.isotope-item'
                    }
                });
            });
        });

        var isotopeButton = $('.filter-tope-group button');

        $(isotopeButton).each(function () {
            $(this).on('click', function () {
                for (var i = 0; i < isotopeButton.length; i++) {
                    $(isotopeButton[i]).removeClass('how-active1');
                }

                $(this).addClass('how-active1');
            });
        });
    </script>
    <script>
        function cancelFullScreen(el) {
            var requestMethod = el.cancelFullScreen || el.webkitCancelFullScreen || el.mozCancelFullScreen || el
                .exitFullscreen;
            if (requestMethod) { // cancel full screen.
                requestMethod.call(el);
            } else if (typeof window.ActiveXObject !== "undefined") { // Older IE.
                var wscript = new ActiveXObject("WScript.Shell");
                if (wscript !== null) {
                    wscript.SendKeys("{F11}");
                }
            }
        }

        function requestFullScreen(el) {
            // Supports most browsers and their versions.
            var requestMethod = el.requestFullScreen || el.webkitRequestFullScreen || el.mozRequestFullScreen || el
                .msRequestFullscreen;

            if (requestMethod) { // Native full screen.
                requestMethod.call(el);
            } else if (typeof window.ActiveXObject !== "undefined") { // Older IE.
                var wscript = new ActiveXObject("WScript.Shell");
                if (wscript !== null) {
                    wscript.SendKeys("{F11}");
                }
            }
            return false
        }
    </script>
    <script>
        document.addEventListener('DOMContentLoaded', function () {
            const track = document.getElementById('brandCarouselTrack');
            const cards = track.children;
            const cardWidth = cards[0].offsetWidth + parseInt(window.getComputedStyle(cards[0]).marginRight) * 2;
            const totalWidth = cardWidth * cards.length;
            let index = 0;

            function moveCarousel() {
                index++;
                track.style.transition = 'transform 0.5s ease';
                track.style.transform = `translateX(${-cardWidth * index}px)`;

                if (index >= cards.length / 2) {
                    setTimeout(() => {
                        track.style.transition = 'none'; // Disable transition to instantly move to the first item
                        track.style.transform = `translateX(0px)`;
                        index = 0; // Reset index to loop back to the first item
                        setTimeout(() => {
                            track.style.transition = 'transform 0.5s ease';
                        }, 50);
                    }, 500); // Wait for the transition to complete
                }
            }

            setInterval(moveCarousel, 3000); // Adjust the interval for slower or faster scrolling
        });
    </script>
<?php $__env->stopPush(); ?>
<?php echo $__env->make('frontend.layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /var/www/barakarasmiy/resources/views/frontend/index.blade.php ENDPATH**/ ?>
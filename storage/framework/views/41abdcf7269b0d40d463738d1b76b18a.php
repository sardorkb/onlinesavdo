<nav class="ecommerce-navbar navbar-expand navbar-light bg-body-emphasis py-4">
    <div class="container-md align-items-center" data-navbar="data-navbar">
        <ul class="navbar-nav mx-auto d-flex justify-content-evenly align-items-center">
            <li class="nav-item" data-nav-item="data-nav-item">
                <a class="text-decoration-none" href="<?php echo e(route('home')); ?>">
                    <div class="d-flex align-items-center">
                        <img src="<?php echo e(asset('back/img/logos/navbarlogolight.png')); ?>" alt="baraka" width="250" />
                    </div>
                </a>
            </li>
            <li class="nav-item" data-nav-item="data-nav-item"><a class="nav-link pe" style="font-size: 14px;"
                    href="tel:+998732492929"><span class="fs-3 me-2" data-feather="phone"
                        style="height:16px; width:16px;"></span>+998 (73) 249-29-29</a></li>
            <!-- <li class="nav-item" data-nav-item="data-nav-item"><a class="nav-link pe-3"
                    style="font-size: 14px; color: red;" href="<?php echo e(route('promotion')); ?>">% Aksiyalar</a></li> -->
            <li class="nav-item" data-nav-item="data-nav-item"><a class="nav-link pe-3" style="font-size: 14px;"
                    href="<?php echo e(route('contact')); ?>">Do'konlar</a></li>
            <li class="nav-item" data-nav-item="data-nav-item"><a class="nav-link pe-3" style="font-size: 14px;"
                    href="<?php echo e(route('rassrochka')); ?>">Ta'rif rejasi</a></li>
            <li class="nav-item" data-nav-item="data-nav-item"><a class="nav-link pe-3" style="font-size: 14px;"
                    href="<?php echo e(route('tulov')); ?>">Online to'lov</a></li>
            <li class="nav-item" data-nav-item="data-nav-item"><a class="nav-link pe-3" style="font-size: 14px;"
                    href="<?php echo e(route('yetkazib-berish')); ?>">Yetkazib berish</a></li>
            <li class="nav-item" data-nav-item="data-nav-item"><a class="nav-link pe-3" style="font-size: 14px;"
                    href="<?php echo e(route('xizmatlar')); ?>">Xizmatlar va servis</a></li>
        </ul>
    </div>
</nav>
<!-- ============================================-->

<!-- <section> begin ============================-->
<section class="py-0">
    <div class="container-lg d-flex justify-content-evenly space-between align-middle" style="color: grey;">
        <div class="dropdown">
            <button class="btn btn-outline-primary rounded-pill text-body dropdown-toggle dropdown-caret-none"
                data-category-btn="data-category-btn" data-bs-toggle="dropdown" style="font-size: large; width: 260px;">
                <span class="fas fa-bars me-2"></span>Katalog
            </button>
            <div class="dropdown-menu border border-translucent py-0 category-dropdown-menu">
                <div class="card border-0 scrollbar" style="max-height: 657px;">
                    <div class="card-body p-6 pb-3">
                        <div class="row gx-7 gy-5 mb-5">
                            <?php
                            // Fetch parent categories
                            $parent_categories = DB::table('categories')
                            ->where('status', 'active')
                            ->where('is_parent', 1)
                            ->get();

                            // Fetch child categories
                            $child_categories = DB::table('categories')
                            ->where('status', 'active')
                            ->where('is_parent', 0)
                            ->get()
                            ->groupBy('parent_id'); // Group child categories by parent_id
                            ?>
                            <?php if($parent_categories): ?>
                            <?php $__currentLoopData = $parent_categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $parent_cat): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <div class="col-12 col-sm-6 col-md-4">
                                <div class="d-flex align-items-center mb-3">
                                    <span class="text-primary me-2" data-feather="pocket"
                                        style="stroke-width:3;"></span>
                                    <h6 class="text-body-highlight mb-0 text-nowrap"><?php echo e($parent_cat->title); ?></h6>
                                    <!-- Display parent category name -->
                                </div>
                                <div class="ms-n2">
                                    <?php if(isset($child_categories[$parent_cat->id])): ?>
                                    <?php $__currentLoopData = $child_categories[$parent_cat->id]; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $child_cat): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <a class="text-body-emphasis d-block mb-1 text-decoration-none bg-body-highlight-hover px-2 py-1 rounded-2"
                                        href="<?php echo e(route('product-sub-cat', ['slug' => $parent_cat->slug, 'sub_slug' => $child_cat->slug])); ?>"><?php echo e($child_cat->title); ?></a>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    <?php endif; ?>
                                </div>
                            </div>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            <?php endif; ?>
                        </div>
                        <div class="text-center border-top border-translucent pt-3"><a class="fw-bold"
                                href="<?php echo e(route('kategoriyalar')); ?>">Barcha kategoriyalar<span
                                    class="fas fa-angle-right ms-1" data-fa-transform="down-1"></span></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="search-box ecommerce-search-box w-50">
            <form class="d-flex align-items-center">
                <input class="form-control search-input form-control-lg border-0 border-bottom border-grey rounded-0"
                    type="search" placeholder="Topa olmayapsizmi? Shu yerdan izlang!" aria-label="Search"
                    style="box-shadow: none;">
                <button type="submit" class="btn p-0 ms-2">
                    <span class="fas fa-search" style="width: 18px; height: 18px; color: grey;"></span>
                </button>
            </form>
        </div>
        <nav class="navbar navbar-expand-xxl navbar-light ml-0">
            <div class="rowflex-between-evenly">
                <div class="col-auto order-md-1">
                    <ul class="navbar-nav navbar-nav-icons flex-row gap-6">
                        <?php if(auth()->guard()->check()): ?>
                        <?php if(Auth::user()->role == 'admin'): ?>
                        <li class="nav-item">
                            <a class="nav-link px-2" href="<?php echo e(route('admin')); ?>" target="_blank">
                                <span class="text-body-tertiary" data-feather="user"
                                    style="height:25px;width:25px;"></span>
                            </a>
                        </li>
                        <?php else: ?>
                        <li class="nav-item dropdown">
                            <a class="nav-link px-2" href="<?php echo e(route('user')); ?>">
                                <span class="text-body-tertiary" data-feather="user"
                                    style="height:25px;width:25px;"></span>
                            </a>
                        </li>
                        <?php endif; ?>
                        <?php else: ?>
                        <li class="nav-item">
                            <a class="nav-link px-2" href="<?php echo e(route('login.form')); ?>">
                                <span class="text-body-tertiary" data-feather="user"
                                    style="height:25px;width:25px;"></span>
                            </a>
                        </li>
                        <?php endif; ?>
                        <li class="nav-item dropdown ml-3">
                            <a class="nav-link px-2 icon-indicator icon-indicator-danger"
                                id="navbarTopDropdownNotification" href="#" role="button" data-bs-toggle="dropdown"
                                data-bs-auto-close="outside" aria-haspopup="true" aria-expanded="false">
                                <span class="text-body-tertiary">
                                    <i class="<?php echo e(Helper::wishlistCount() > 0 ? 'fas fa-heart' : 'far fa-heart'); ?>"
                                        style="font-size: 24px; color: <?php echo e(Helper::wishlistCount() > 0 ? '#00297D' : 'inherit'); ?>;"></i>
                                </span>
                                <span class="icon-indicator-number"><?php echo e(Helper::wishlistCount()); ?></span>
                            </a>
                            <div class="dropdown-menu custom-dropdown dropdown-menu-end"
                                aria-labelledby="navbarTopDropdownNotification">
                                <?php if(auth()->guard()->check()): ?>
                                <div class="shopping-item">
                                    <div class="dropdown-cart-header d-flex justify-content-between align-items-center">
                                        <span><?php echo e(count(Helper::getAllProductFromWishlist())); ?> dona mahsulot</span>
                                        <a class="btn btn-outline-info" style="font-size: 12px; padding: 3px 10px;"
                                            href="<?php echo e(route('wishlist')); ?>">Barcha saralanganlarni ko'rish</a>
                                    </div>

                                    <ul class="shopping-list">
                                        <?php $__currentLoopData = Helper::getAllProductFromWishlist(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $data): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <?php
                                        $photo = explode(',', $data->product['photo']);
                                        ?>
                                        <li class="shopping-list-item">
                                            <div class="shopping-list-item-left">
                                                <a class="cart-img"
                                                    href="<?php echo e(route('product-detail', $data->product['slug'])); ?>">
                                                    <img src="<?php echo e($photo[0]); ?>" alt="<?php echo e($photo[0]); ?>">
                                                </a>
                                            </div>
                                            <div class="shopping-list-item-right">
                                                <h5>
                                                    <a href="<?php echo e(route('product-detail', $data->product['slug'])); ?>"
                                                        target="_blank"><?php echo e($data->product['title']); ?></a>
                                                </h5>
                                                <div class="quantity-price">
                                                    <p class="amount"><?php echo e($data->quantity); ?> x UZS
                                                        <?php echo e(number_format($data->price, 2)); ?>

                                                    </p>
                                                </div>
                                                <a href="<?php echo e(route('wishlist-delete', $data->id)); ?>" class="remove"
                                                    title="Saralangan ro'yxatdan o'chirish">
                                                    <i class="far fa-trash-alt"></i>
                                                </a>
                                            </div>
                                        </li>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    </ul>

                                    <div class="bottom">
                                        <div class="total">
                                            <span>Jami: </span>
                                            <span class="total-amount">UZS
                                                <?php echo e(number_format(Helper::totalWishlistPrice(), 2)); ?></span>
                                        </div>
                                        <a href="<?php echo e(route('cart')); ?>" class="btn btn-outline-info"
                                            style="font-size: 12px; padding: 3px 10px;">Savatga o'tish</a>
                                    </div>
                                </div>
                                <?php endif; ?>
                            </div>
                        </li>

                        <li class="nav-item ml-3">
                            <a class="nav-link px-2 icon-indicator icon-indicator-primary" id="navbarTopDropdownCart"
                                href="#" role="button" data-bs-toggle="dropdown" data-bs-auto-close="outside"
                                aria-haspopup="true" aria-expanded="false">
                                <span class="text-body-tertiary">
                                    <span class="text-body-tertiary">
                                        <i class="<?php echo e(Helper::wishlistCount() > 0 ? 'fas fa-shopping-cart' : 'fas fa-shopping-cart'); ?>"
                                            style="font-size: 24px; color: <?php echo e(Helper::wishlistCount() > 0 ? '#00297D' : 'inherit'); ?>;"></i>
                                    </span>
                                </span>
                                <span class="icon-indicator-number"><?php echo e(Helper::cartCount()); ?></span>
                            </a>
                            <!-- Dropdown Menu -->
                            <div class="dropdown-menu custom-dropdown dropdown-menu-end"
                                aria-labelledby="navbarTopDropdownNotification">
                                <?php if(auth()->guard()->check()): ?>
                                <div class="shopping-item">
                                    <div class="dropdown-cart-header d-flex justify-content-between align-items-center">
                                        <span><?php echo e(count(Helper::getAllProductFromCart())); ?> dona mahsulot</span>
                                        <a class="btn btn-outline-info" style="font-size: 12px; padding: 3px 10px;"
                                            href="<?php echo e(route('cart')); ?>">Savatchani ko'rish</a>
                                    </div>

                                    <ul class="shopping-list">
                                        <?php $__currentLoopData = Helper::getAllProductFromCart(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $data): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <?php
                                        $photo = explode(',', $data->product['photo']);
                                        ?>
                                        <li class="shopping-list-item">
                                            <div class="shopping-list-item-left">
                                                <a class="cart-img" href="#"><img src="<?php echo e($photo[0]); ?>"
                                                        alt="<?php echo e($photo[0]); ?>"></a>
                                            </div>
                                            <div class="shopping-list-item-right">
                                                <h5>
                                                    <a href="<?php echo e(route('product-detail', $data->product['slug'])); ?>"
                                                        target="_blank"><?php echo e($data->product['title']); ?></a>
                                                </h5>
                                                <div class="quantity-price">
                                                    <p class="amount">
                                                        <?php echo e($data->quantity); ?> x UZS <?php echo e(number_format($data->price, 2)); ?>

                                                    </p>
                                                </div>
                                                <a href="<?php echo e(route('cart-delete', $data->id)); ?>" class="remove"
                                                    title="Saralangan ro'yxatdan o'chirish">
                                                    <i class="far fa-trash-alt"></i>
                                                </a>
                                            </div>
                                        </li>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    </ul>
                                    <div class="bottom">
                                        <div class="total">
                                            <span>Jami: </span>
                                            <span class="total-amount">UZS
                                                <?php echo e(number_format(Helper::totalCartPrice(), 2)); ?></span>
                                        </div>
                                        <a href="<?php echo e(route('checkout')); ?>" class="btn btn-outline-info"
                                            style="font-size: 12px; padding: 3px 10px;">Rasmiylashtirish</a>
                                    </div>
                                </div>
                                <?php endif; ?>
                            </div>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
    </div>
    <!-- end of .container-->
</section>

<!-- <section> close ============================-->

<!-- <section> begin ============================-->


<section class="py-1">
    <div class="container-lg d-flex justify-content-evenly space-between align-middle">
        <div class="scrollbar">
            <div class="d-flexalign-items-center p-2 mr-6">
                <a href="<?php echo e(route('promotion')); ?>" class="btn btn-sm btn-primary rounded-pill w-10 me-5"
                    style="color: white;">
                    <span class="me-2 far fa-star"></span>Aksiyalar
                </a>
                <?php
                $specific_category_ids = [2, 17, 18, 20, 4, 21, 12, 16];
                $category_lists = DB::table('categories')->where('status', 'active')->whereIn('id',
                $specific_category_ids)->get();
                ?>
                <?php if($category_lists): ?>
                <?php $__currentLoopData = $category_lists; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $cat): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <a href="<?php echo e(route('product-cat', $cat->slug)); ?>"
                    class="btn btn-sm btn-outline-info rounded-pill w-10 me-5">
                    <?php echo e($cat->title); ?>

                </a>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                <?php endif; ?>
                <a href="<?php echo e(route('kategoriyalar')); ?>" class="btn btn-sm btn-outline-info rounded-pill w-10 me-5">
                    </span>Barcha kategoriyalar
                </a>
            </div>
        </div>
    </div>
</section>
<!-- <section> close ============================-->

<!-- ============================================-->
<style>
/* Custom dropdown menu size */
.dropdown-menu.custom-dropdown {
    width: 400px;
    /* Adjust the width as needed */
    max-height: 400px;
    /* Adjust the height as needed */
    overflow-y: auto;
    /* Adds a scrollbar if the content exceeds the height */
}

/* Align the dropdown menu to the left of the button */
.dropdown-menu.dropdown-menu-end {
    left: auto;
    right: 0;
    /* Align to the right edge */
    transform: translateX(0%);
    /* Shift to the left by 100% of its width */
}

/* Style for shopping list items */
.shopping-list li {
    display: flex;
    align-items: center;
    padding: 10px;
}

/* Style for images in the shopping list */
.shopping-list .cart-img img {
    width: 50px;
    /* Adjust the width as needed */
    height: auto;
    margin-right: 10px;
}

/* Style for product title and price */
.shopping-list h4,
.shopping-list p {
    margin: 0;
    margin-left: auto;
}

/* Style for the remove icon */
.shopping-list .remove {
    margin-left: auto;
    color: red;
}

/* Style for the dropdown cart header */
.dropdown-cart-header {
    text-align: left;
    padding: 10px;
    border-bottom: 1px solid #eaeaea;
}

/* Style for the bottom section of the dropdown */
.dropdown-menu .bottom {
    padding: 10px;
    border-top: 1px solid #eaeaea;
    text-align: right;
}

.shopping-list {
    list-style: none;
    padding: 0;
    margin: 0;
}

.shopping-list-item {
    display: flex;
    align-items: center;
    justify-content: space-between;
    padding: 10px 0;
    border-bottom: 1px solid #ccc;
}

.shopping-list-item-left {
    flex-shrink: 0;
}

.shopping-list-item-left img {
    max-width: 50px;
    height: auto;
}

.shopping-list-item-right {
    display: flex;
    flex-direction: column;
    justify-content: space-between;
    width: 100%;
    padding-left: 10px;
}

.shopping-list-item-right h5 {
    margin: 0 0 5px;
    font-size: 16px;
}

.quantity-price {
    display: flex;
    justify-content: space-between;
    align-items: center;
}

.amount {
    margin: 0;
}

.remove {
    align-self: flex-end;
    margin-top: 5px;
    color: #ff0000;
    text-decoration: none;
}

.remove:hover {
    color: #e60000;
}

.search-box {
    position: relative;
}

.search-input {
    width: 100%;
    padding-right: 40px;
}

.fas.fa-search {
    position: absolute;
    right: 10px;
    top: 50%;
    transform: translateY(-50%);
    color: grey;
}
</style>

<script>
document.addEventListener('DOMContentLoaded', (event) => {
    const searchInput = document.querySelector('.search-input');
    const placeholderText = "Shu yerdan izlang!";
    let placeholderIndex = 0;

    function typePlaceholder() {
        if (placeholderIndex < placeholderText.length) {
            searchInput.setAttribute('placeholder', placeholderText.substring(0, placeholderIndex + 1));
            placeholderIndex++;
            setTimeout(typePlaceholder, 150); // Adjust typing speed here
        } else {
            setTimeout(erasePlaceholder, 1000); // Pause before erasing
        }
    }

    function erasePlaceholder() {
        if (placeholderIndex > 0) {
            searchInput.setAttribute('placeholder', placeholderText.substring(0, placeholderIndex - 1));
            placeholderIndex--;
            setTimeout(erasePlaceholder, 100); // Adjust erasing speed here
        } else {
            setTimeout(typePlaceholder, 500); // Pause before typing again
        }
    }

    typePlaceholder(); // Start the typing effect
});
</script>

<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.3/dist/umd/popper.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/js/bootstrap.min.js"></script><?php /**PATH /var/www/barakarasmiy/resources/views/frontend/layouts/header.blade.php ENDPATH**/ ?>
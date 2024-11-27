<?php $__env->startSection('meta'); ?>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name='copyright' content=''>
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=yes">
<meta name="keywords" content="muddatli to'lov, sotib olish, onlayn magazin, kredit, rassrochka">
<meta property="og:url" content="<?php echo e(route('product-detail', $product_detail->slug)); ?>">
<meta property="og:type" content="article">
<meta property="og:title" content="<?php echo e($product_detail->title); ?>">
<meta property="og:image" content="<?php echo e($product_detail->photo); ?>">
<meta property="og:description" content="<?php echo e($product_detail->description); ?>">
<?php $__env->stopSection(); ?>
<title><?php echo e($product_detail->title); ?> | Baraka Development</title>
<?php $__env->startSection('main-content'); ?>



<!-- Shop Single -->
<section class="py-5">
	<div class="container">
		<!-- Breadcrumbs -->
		<div class="col-auto">
			<nav class="mb-2" aria-label="breadcrumb">
				<ol class="breadcrumb">
					<li class="breadcrumb-item"><a href="<?php echo e(route('home')); ?>">Bosh sahifa</a></li>
					<li class="breadcrumb-item"><a
							href="<?php echo e(route('product-cat', $product_detail->cat_info['slug'])); ?>"><?php echo e($product_detail->cat_info['title']); ?></a>
					</li>
					<li class="breadcrumb-item"><a
							href="<?php echo e(route('product-sub-cat', [$product_detail->cat_info['slug'], $product_detail->sub_cat_info['slug']])); ?>"><?php echo e($product_detail->sub_cat_info['title']); ?></a>
					</li>
					<li class="breadcrumb-item active" aria-current="page"><?php echo e($product_detail->title); ?></li>
				</ol>
			</nav>
		</div>
<!-- End Breadcrumbs -->
		<div class="row g-5">
			<!-- Product Images -->
			<div class="col-lg-6">
				<div class="row mb-4">
					<div class="col-2">
						<div class="d-flex flex-column align-items-center">
							<?php 
								$photos = explode(',', $product_detail->photo);
							?>
							<?php $__currentLoopData = $photos; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $photo): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
								<img src="<?php echo e($photo); ?>" class="img-thumbnail mb-2" alt="<?php echo e($product_detail->title); ?>">
							<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
						</div>
					</div>
					<div class="col-10">
						<img src="<?php echo e($photos[0]); ?>" class="img-fluid" alt="<?php echo e($product_detail->title); ?>">
					</div>
				</div>
				<div class="d-flex">
					<form action="<?php echo e(route('single-add-to-cart')); ?>" method="POST" class="me-2">
						<?php echo csrf_field(); ?>
						<button type="submit" class="btn btn-warning btn-lg rounded-pill w-100">
							<span class="fas fa-shopping-cart me-2"></span>Sotib olish
						</button>
						<input type="hidden" name="slug" value="<?php echo e($product_detail->slug); ?>">
					</form>
					<a href="<?php echo e(route('add-to-wishlist', $product_detail->slug)); ?>"
						class="btn btn-outline-warning btn-lg rounded-pill w-100">
						<span class="far fa-heart me-2"></span>Bir marta bosish bilan sotib oling
					</a>
				</div>
			</div>
			<!-- Product Details -->
			<div class="col-lg-6">
				<h3><?php echo e($product_detail->title); ?></h3>
				<?php 
					$after_discount = ($product_detail->price - (($product_detail->price * $product_detail->discount) / 100));
				?>
				<h1><?php echo e(number_format($after_discount, 2)); ?> so'm</h1>
				<p class="text-success fw-bold fs-4">Foydali to'lov rejasi:</p>
				<h3 class="text-danger fw-bold">Oyiga <?php echo e(number_format($after_discount / 12, 2)); ?> so'mdan boshlab</h3>

				<div class="mt-4">
					<p>Bepul yetkazib berish</p>
					<p>Gofolat 3 yil</p>
					<p>Stock:
						<span class="badge <?php echo e($product_detail->stock > 0 ? 'bg-success' : 'bg-danger'); ?>"
							style="color: white;">
							<?php echo e($product_detail->stock); ?>

						</span>
					</p>
					<p>Category: <a
							href="<?php echo e(route('product-cat', $product_detail->cat_info['slug'])); ?>"><?php echo e($product_detail->cat_info['title']); ?></a>
					</p>
					<?php if($product_detail->sub_cat_info): ?>
						<p>Sub Category: <a
								href="<?php echo e(route('product-sub-cat', [$product_detail->cat_info['slug'], $product_detail->sub_cat_info['slug']])); ?>"><?php echo e($product_detail->sub_cat_info['title']); ?></a>
						</p>
					<?php endif; ?>
				</div>
			</div>
		</div>
	</div>
</section>
<!-- End Shop Single -->





<!-- Modal -->
<div class="modal fade" id="modelExample" tabindex="-1" role="dialog">
	< class="modal-dialog" role="document">
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
								<div class="single-slider">
									<img src="images/modal1.png" alt="#">
								</div>
								<div class="single-slider">
									<img src="images/modal2.png" alt="#">
								</div>
								<div class="single-slider">
									<img src="images/modal3.png" alt="#">
								</div>
								<div class="single-slider">
									<img src="images/modal4.png" alt="#">
								</div>
							</div>
						</div>
						<!-- End Product slider -->
					</div>
					<div class="col-lg-6 col-md-12 col-sm-12 col-xs-12">
						<div class="quickview-content">
							<h2>Flared Shift Dress</h2>
							<div class="quickview-ratting-review">
								<div class="quickview-ratting-wrap">
									<div class="quickview-ratting">
										<i class="yellow fa fa-star"></i>
										<i class="yellow fa fa-star"></i>
										<i class="yellow fa fa-star"></i>
										<i class="yellow fa fa-star"></i>
										<i class="fa fa-star"></i>
									</div>
									<a href="#"> (1 customer review)</a>
								</div>
								<div class="quickview-stock">
									<span><i class="fa fa-check-circle-o"></i> in stock</span>
								</div>
							</div>
							<h3>$29.00</h3>
							<div class="quickview-peragraph">
								<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Mollitia iste laborum ad
									impedit pariatur esse optio tempora sint ullam autem deleniti nam in quos qui nemo
									ipsum numquam.</p>
							</div>
							<div class="size">
								<div class="row">
									<div class="col-lg-6 col-12">
										<h5 class="title">Size</h5>
										<select>
											<option selected="selected">s</option>
											<option>m</option>
											<option>l</option>
											<option>xl</option>
										</select>
									</div>
									<div class="col-lg-6 col-12">
										<h5 class="title">Color</h5>
										<select>
											<option selected="selected">orange</option>
											<option>purple</option>
											<option>black</option>
											<option>pink</option>
										</select>
									</div>
								</div>
							</div>
							<div class="quantity">
								<!-- Input Order -->
								<div class="input-group">
									<div class="button minus">
										<button type="button" class="btn btn-primary btn-number" disabled="disabled"
											data-type="minus" data-field="quant[1]">
											<i class="ti-minus"></i>
										</button>
									</div>
									<input type="text" name="qty" class="input-number" data-min="1" data-max="1000"
										value="1">
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
								<a href="#" class="btn">Add to cart</a>
								<a href="#" class="btn min"><i class="ti-heart"></i></a>
								<a href="#" class="btn min"><i class="fa fa-compress"></i></a>
							</div>
							<div class="default-social">
								<h4 class="share-now">Share:</h4>
								<ul>
									<li><a class="facebook" href="#"><i class="fa fa-facebook"></i></a></li>
									<li><a class="twitter" href="#"><i class="fa fa-twitter"></i></a></li>
									<li><a class="youtube" href="#"><i class="fa fa-pinterest-p"></i></a></li>
									<li><a class="dribbble" href="#"><i class="fa fa-google-plus"></i></a></li>
								</ul>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</>
</div>
<!-- Modal end -->

<?php $__env->stopSection(); ?>
<?php $__env->startPush('styles'); ?>
	<style>
		/* Rating */
		.rating_box {
			display: inline-flex;
		}

		.star-rating {
			font-size: 0;
			padding-left: 10px;
			padding-right: 10px;
		}

		.star-rating__wrap {
			display: inline-block;
			font-size: 1rem;
		}

		.star-rating__wrap:after {
			content: "";
			display: table;
			clear: both;
		}

		.star-rating__ico {
			float: right;
			padding-left: 2px;
			cursor: pointer;
			color: #F7941D;
			font-size: 16px;
			margin-top: 5px;
		}

		.star-rating__ico:last-child {
			padding-left: 0;
		}

		.star-rating__input {
			display: none;
		}

		.star-rating__ico:hover:before,
		.star-rating__ico:hover~.star-rating__ico:before,
		.star-rating__input:checked~.star-rating__ico:before {
			content: "\F005";
		}
	</style>
<?php $__env->stopPush(); ?>
<?php $__env->startPush('scripts'); ?>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js"></script>

	

<?php $__env->stopPush(); ?>
<?php echo $__env->make('frontend.layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /var/www/barakarasmiy/resources/views/frontend/pages/product_detail.blade.php ENDPATH**/ ?>
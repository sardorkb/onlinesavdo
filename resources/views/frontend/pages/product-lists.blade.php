@extends('frontend.layouts.master')
@section('title', 'Mahsulotlar | Baraka Development')
@section('main-content')

<!-- <section> begin ============================-->
<section class="pt-5 pb-9">
	<div class="product-filter-container">
		<div class="row">
			<div class="col-lg-3 col-xxl-2 ps-2 ps-xxl-3">
				<a class="btn px-0 d-block collapse-indicator" data-bs-toggle="collapse" href="#collapsePriceRange"
					role="button" aria-expanded="true" aria-controls="collapsePriceRange">
					<div class="d-flex align-items-center justify-content-between w-100">
						<div class="fs-8 text-body-highlight">Narxi so'm</div>
						<span class="fa-solid fa-angle-down toggle-icon text-body-quaternary"></span>
					</div>
				</a>
				<div class="collapse show" id="collapsePriceRange">
					<div class="single-widget range">
						<div class="price-filter">
							<div class="price-filter-inner">
								@php
									$max = DB::table('products')->max('price');
								@endphp
								<div id="slider-range" data-min="0" data-max="{{ $max }}"></div>
								<div class="product_filter">
									<div class="label-input">
										<span>Range:</span>
										<input type="text" id="amount" readonly />
										<input type="hidden" name="price_range" id="price_range"
											value="@if(!empty($_GET['price'])){{$_GET['price']}}@endif" />
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
				<a class="btn px-0 d-block collapse-indicator" data-bs-toggle="collapse" href="#collapseBrands"
					role="button" aria-expanded="true" aria-controls="collapseBrands">
					<div class="d-flex align-items-center justify-content-between w-100">
						<div class="fs-8 text-body-highlight">Brendlar</div>
						<span class="fa-solid fa-angle-down toggle-icon text-body-quaternary"></span>
					</div>
				</a>
				<div class="collapse show" id="collapseBrands">
					<div class="mb-2">
						@php
							$brands = DB::table('brands')->orderBy('title', 'ASC')->where('status', 'active')->get();
						@endphp
						@foreach($brands as $brand)
							<div class="form-check mb-0">
								<input class="form-check-input mt-0" id="brand_{{ $brand->id }}" type="checkbox"
									name="brands[]" value="{{ $brand->id }}">
								<label class="form-check-label d-block lh-sm fs-8 text-body fw-normal mb-0"
									for="brand_{{ $brand->id }}">{{ $brand->title }}</label>
							</div>
						@endforeach
					</div>
				</div>
				<div class="phoenix-offcanvas-backdrop d-lg-none" data-phoenix-backdrop></div>
				<a class="btn px-0 d-block collapse-indicator" data-bs-toggle="collapse" href="#collapseCategories"
					role="button" aria-expanded="true" aria-controls="collapseCategories">
					<div class="d-flex align-items-center justify-content-between w-100">
						<div class="fs-8 text-body-highlight">Kategoriyalar</div>
						<span class="fa-solid fa-angle-down toggle-icon text-body-quaternary"></span>
					</div>
				</a>
				<div class="collapse show" id="collapseColorFamily">
					<div class="mb-2">
						@php
							$menu = App\Models\Category::getAllParentWithChild();
						@endphp
						@if($menu)
							@foreach($menu as $cat_info)
								<div class="form-check mb-0">
									<input class="form-check-input mt-0" id="category_{{ $cat_info->id }}" type="checkbox"
										name="category[]" value="{{ $cat_info->id }}">
									<label class="form-check-label d-block lh-sm fs-8 text-body fw-normal mb-0"
										for="category_{{ $cat_info->id }}">{{ $cat_info->title }}</label>
								</div>
								@if($cat_info->child_cat->count() > 0)
									@foreach($cat_info->child_cat as $sub_menu)
										<div class="form-check mb-0 ms-3">
											<input class="form-check-input mt-0" id="subcategory_{{ $sub_menu->id }}" type="checkbox"
												name="category[]" value="{{ $sub_menu->id }}">
											<label class="form-check-label d-block lh-sm fs-8 text-body fw-normal mb-0"
												for="subcategory_{{ $sub_menu->id }}">{{ $sub_menu->title }}</label>
										</div>
									@endforeach
								@endif
							@endforeach
						@endif
					</div>
				</div>


			</div>
			<div class="col-lg-9 col-xxl-10">
				<div class="row gx-3 gy-4 mb-8">
					@if(count($products))
						@foreach($products as $product)
							<div class="col-12 col-sm-6 col-md-4 col-lg-3 mb-4">
								<div class="product-card-container h-100 d-flex flex-column">
									<div
										class="position-relative text-decoration-none product-card flex-grow-1 d-flex flex-column card-shadow rounded-6 p-3 custom-card">
										@if ($product->is_featured)
											<div class="badge bg-primary position-absolute top-0 start-0 m-3">Super narx</div>
										@endif
										<div class="d-flex flex-column justify-content-between flex-grow-1">
											<div>
												<div class="position-relative mb-3">
													<a href="{{ route('add-to-wishlist', $product->slug) }}"
														class="btn rounded-circle p-0 d-flex flex-center btn-wish z-2 d-toggle-container btn-outline-primary"
														data-bs-toggle="tooltip" data-bs-placement="top"
														title="Tanlanganlar ro'yxatiga qo'shish">
														<span class="fas fa-heart d-block-hover"></span>
														<span class="far fa-heart d-none-hover"></span>
													</a>
													@php 
														$photo = explode(',', $product->photo);
													@endphp
													<img class="img-fluid custom-image" src="{{ $photo[0] }}"
														alt="{{ $photo[0] }}" />
												</div>
												<div class="position-relative">
													<a class="stretched-link" style="text-decoration: none;"
														href="{{ route('product-detail', $product->slug) }}">
														<h6 class="mb-2 lh-sm line-clamp-3 product-name">{{ $product->title }}
														</h6>
													</a>
												</div>
											</div>
											<div>
												<div class="installment-info text-muted">To'lov:
													<span style="font-size: large; color: black;">
														<strong>{{ number_format((($product->price * 0.36) + $product->price) / 12, 0, '', ' ') }}</strong>
													</span> so'm/oyiga
												</div>
												<hr>
												<div class="d-flex justify-content-between align-items-center mb-3">
													<h4 class="text-body-emphasis mb-0">
														{{ number_format($product->price, 0, '', ' ') }} so'm
													</h4>
													<a class="btn btn-outline-primary mt-2"
														href="{{ route('add-to-cart', $product->slug) }}">
														<i class="fas fa-shopping-cart me-1"></i>
													</a>
												</div>
											</div>
										</div>
									</div>
								</div>
							</div>
						@endforeach
					@else
						<h4 class="text-warning text-center my-5">Mahsulotlar yo'q</h4>
					@endif
				</div>
			</div>
		</div>
		<!-- end of .container-->

</section>
<!-- <section> close ============================-->
<!-- ============================================-->
@endsection
<style>
	.product-card-container {
		padding: 0.5rem;
	}

	.product-card {
		background: #fff;
		border: 1px solid #ebebeb;
		border-radius: 10px;
		overflow: hidden;
		transition: box-shadow 0.3s ease, transform 0.3s ease;
	}

	.product-card:hover {
		box-shadow: 0 8px 16px rgba(0, 0, 0, 0.1);
		transform: translateY(-5px);
	}

	.product-card img {
		max-width: 100%;
		height: auto;
		border-radius: 10px;
		transition: transform 0.3s ease;
	}

	.product-card:hover img {
		transform: scale(1.05);
	}

	.product-card h6 {
		font-size: 1rem;
		font-weight: bold;
	}

	.product-card .installment-info {
		font-size: 0.875rem;
	}

	.product-card .btn-wish {
		position: absolute;
		top: 0.5rem;
		right: 0.5rem;
		transition: background-color 0.3s ease;
	}

	.product-card:hover .btn-wish {
		background-color: #f8f9fa;
	}

	.product-card .btn-outline-primary {
		border-color: #007bff;
		color: #007bff;
	}

	.product-card .btn-outline-primary:hover {
		background-color: #007bff;
		color: #fff;
	}

	.product-card .text-body-emphasis {
		font-weight: bold;
	}
</style>
<script>
	$(document).ready(function () {
		/*----------------------------------------------------*/
		/*  Jquery Ui slider js
		/*----------------------------------------------------*/
		if ($("#slider-range").length > 0) {
			const max_value = parseInt($("#slider-range").data('max')) || 500;
			const min_value = parseInt($("#slider-range").data('min')) || 0;
			const currency = $("#slider-range").data('currency') || '';
			let price_range = min_value + '-' + max_value;
			if ($("#price_range").length > 0 && $("#price_range").val()) {
				price_range = $("#price_range").val().trim();
			}

			let price = price_range.split('-');
			$("#slider-range").slider({
				range: true,
				min: min_value,
				max: max_value,
				values: price,
				slide: function (event, ui) {
					$("#amount").val(currency + ui.values[0] + " -  " + currency + ui.values[1]);
					$("#price_range").val(ui.values[0] + "-" + ui.values[1]);
				}
			});
		}
		if ($("#amount").length > 0) {
			const m_currency = $("#slider-range").data('currency') || '';
			$("#amount").val(m_currency + $("#slider-range").slider("values", 0) +
				"  -  " + m_currency + $("#slider-range").slider("values", 1));
		}
	})
</script>
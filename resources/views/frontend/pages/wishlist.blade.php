@extends('frontend.layouts.master')
@section('title', 'Saralangan mahsulotlar | Baraka Development')
@section('main-content')
<!-- Breadcrumbs -->
<section>
	<div class="container">
		<div class="col-auto">
			<nav class="mb-2" aria-label="breadcrumb">
				<ol class="breadcrumb mb-0">
					<li class="breadcrumb-item"><a href="{{ route('home') }}">Bosh sahifa</a></li>
					<li class="breadcrumb-item active" aria-current="page">Saralanganlar</li>
				</ol>
			</nav>
		</div>
	</div>
</section>
<!-- End Breadcrumbs -->

<section class="pt-1">

	<div class="container cart">
		<div class="border-y border-translucent" id="productWishlistTable"
			data-list='{"valueNames":["products","color","size","price","quantity","total"],"page":5,"pagination":true}'>
			<div class="table-responsive scrollbar">
				<table class="table fs-9 mb-0">
					<thead>
						<tr>
							<th class="sort white-space-nowrap align-middle" scope="col"
								style="width:30%; min-width:250px;" data-sort="products">Mahsulotlar</th>
							<th class="sort align-middle" scope="col" data-sort="color" style="width:16%;">Nomi</th>
							<th class="sort align-middle" scope="col" data-sort="size" style="width:10%;">Jami</th>
							<th class="sort align-middle text-end pe-0" scope="col" style="width:35%;"> </th>
						</tr>
					</thead>
					<tbody class="list" id="profile-wishlist-table-body">
						@if(Helper::getAllProductFromWishlist())
							@foreach(Helper::getAllProductFromWishlist() as $key => $wishlist)
								<tr class="hover-actions-trigger btn-reveal-trigger position-static">
									@php 
										$photo = explode(',', $wishlist->product['photo']);
									@endphp
									<td class="align-middle white-space-nowrap ps-0 py-0"><a
											class="border border-translucent rounded-2 d-inline-block"
											href="{{route('product-detail', $wishlist->product['slug'])}}"><img src="
												{{$photo[0]}}" alt=" {{$photo[0]}}" width="53px"></a></td>
									<td class="products align-middle pe-11"><a class="fw-semibold mb-0 line-clamp-1"
											href="{{route('product-detail', $wishlist->product['slug'])}}">{{$wishlist->product['title']}}</a>
									</td>
									<td class="color align-middle white-space-nowrap fs-9 text-body">{{$wishlist['amount']}}
										so'm</td>
									<td class="total align-middle fw-bold text-body-highlight text-end text-nowrap pe-0">
										<a class="btn btn-sm text-body-quaternary text-body-tertiary-hover me-2"
											href="{{route('wishlist-delete', $wishlist->id)}}"><span
												class="fas fa-trash"></span></a>
										<a class="btn btn-primary fs-10"
											href="{{route('add-to-cart', $wishlist->product['slug'])}}"><span
												class="fas fa-shopping-cart me-1 fs-10"></span>Savatga qo'shish</a>
									</td>
								</tr>
							@endforeach
						@endif
					</tbody>
				</table>
			</div>
			<div class="row align-items-center justify-content-between py-2 pe-0 fs-9">
				<div class="col-auto d-flex">
					<p class="mb-0 d-none d-sm-block me-3 fw-semibold text-body" data-list-info="data-list-info"></p><a
						class="fw-semibold" href="#!" data-list-view="*">View all<span class="fas fa-angle-right ms-1"
							data-fa-transform="down-1"></span></a><a class="fw-semibold d-none" href="#!"
						data-list-view="less">View Less<span class="fas fa-angle-right ms-1"
							data-fa-transform="down-1"></span></a>
				</div>
				<div class="col-auto d-flex">
					<button class="page-link" data-list-pagination="prev"><span
							class="fas fa-chevron-left"></span></button>
					<ul class="mb-0 pagination"></ul>
					<button class="page-link pe-0" data-list-pagination="next"><span
							class="fas fa-chevron-right"></span></button>
				</div>
			</div>
		</div>
	</div>
	<!-- end of .container-->

</section>

<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog">
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
								<div class="single-slider">
									<img src="images/modal1.jpg" alt="#">
								</div>
								<div class="single-slider">
									<img src="images/modal2.jpg" alt="#">
								</div>
								<div class="single-slider">
									<img src="images/modal3.jpg" alt="#">
								</div>
								<div class="single-slider">
									<img src="images/modal4.jpg" alt="#">
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
									<input type="text" name="quant[1]" class="input-number" data-min="1" data-max="1000"
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
	</div>
</div>
<!-- Modal end -->

@endsection
@push('scripts')
	<script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js"></script>
@endpush
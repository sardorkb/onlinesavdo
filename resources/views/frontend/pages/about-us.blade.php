@extends('frontend.layouts.master')
@section('title', 'Kompaniya haqida | Baraka Development')
@section('main-content')
<!-- Start Contact -->
<section id="contact-us">
	<div class="container">
		<div class="col-auto">
			<nav class="mb-2" aria-label="breadcrumb">
				<ol class="breadcrumb mb-0">
					<li class="breadcrumb-item"><a href="{{ route('home') }}">Bosh sahifa</a></li>
					<li class="breadcrumb-item active" aria-current="page">Kompaniya haqida</li>
				</ol>
			</nav><br>
		</div>
		<div class="row g-3 mb-9">
			<div class="col-12">
				<div class="whooping-banner w-100 rounded-3 overflow-hidden">
					<img src="{{ asset('back/img/bannerlar/biz-haqimizda.jpg') }}" alt="bizhaqimizda">
				</div>
			</div>
		</div>
	</div>
</section>
<!--/ End Contact -->


<section class="counter-container p-0 pb-10">
	<div class="position-absolute start-0 end-0 w-100 counter-overlay" style="transform: skewY(-8deg)"></div>
	<div class="bg-holder d-none d-lg-block"
		style="background-image:url('{{ asset('back/img/bg/bg-left-25.png') }}');background-size:auto;background-position:left center;">
	</div>
	<!--/.bg-holder-->

	<div class="bg-holder d-none d-lg-block"
		style="background-image:url('{{ asset('back/img/bg/bg-right-25.png') }}');background-size:auto;background-position:right center;">
	</div>
	<!--/.bg-holder-->

	<div class="container-small position-relative">
		<div class="row gx-0 gy-8 justify-content-center">
			<div
				class="col-sm-6 col-md-auto me-md-5 pe-md-5 border-end-md border-translucent border-dashed text-center order-2 order-md-0">
				<h1 class="fs-6 fs-lg-9 fw-bolder text-info mb-3"><span> </span><span
						data-countup='{"endValue":10,"duration":1.5,"suffix":" Yillik"}'></span></h1>
				<h4>Tajriba</h4>
			</div>
			<div
				class="col-sm-6 col-md-auto me-md-5 pe-md-5 border-end-md border-translucent border-dashed text-center order-1 order-md-0">
				<h1 class="fs-6 fs-lg-9 fw-bolder text-info mb-3"><span
						data-countup='{"endValue":5,"duration":1.5,"suffix":"ta filial"}'></span></h1>
				<h4>5750 kv maydon</h4>
			</div>
			<div
				class="col-sm-6 col-md-auto me-md-5 pe-md-5 border-end-md border-translucent border-dashed text-center">
				<h1 class="fs-6 fs-lg-9 fw-bolder text-info mb-3">
					<span data-countup='{"endValue":100,"duration":1.5,"suffix":"+"}'></span>
				</h1>
				<h4>Hamkorlar</h4>
			</div>
			<div class="col-sm-6 col-md-auto text-center">
				<h1 class="fs-6 fs-lg-9 fw-bolder text-info mb-3">
					<span data-countup='{"endValue":5000,"duration":1.5,"suffix":"+"}'></span>
				</h1>
				<h4>Mahsulotlar</h4>
			</div>
		</div>
	</div>
</section>


<!-- ============================================-->
<!-- <section> begin ============================-->
<section class="pt-6 pb-10" id="feature">
	<div class="container px-lg-9 px-xxl-3">
		<div class="row flex-between-center px-xl-11 mb-10 mb-md-9">
			<div class="col-md-7 order-1 order-md-0 text-center text-md-start">
				<h4 class="mb-3">Kompaniyaning oliy maqsadi</h4>
				<p class="mb-5">Insonlarni mahsulotga boʻlgan ehtiyojlarini imkoniyatga aylantirib, ularni baxtliroq
					yashashlariga hissa qoʻshamiz!</p>
				<h4 class="mb-3">Kompaniyaning haqida</h4>
				<p style="text-align: justify;">Kompaniyamizning shiori — har bir xaridingiz barakali.<br>
					Baraka – maishiy texnika, elektronika va mebel mahsulotlarini
					muddatli
					toʻlov asosida beruvchi doʻkonlar tarmogʻi. Kompaniya 2014-yilda Qoʻqon shahri, Charxiy 1-“A”
					joylashuvida
					tashkil etilgan. Korxonamiz 10 yildan oshiq muddat mobaynida koʻplab yurtdoshlarimizga halol
					muddatli toʻlovga
					mahsulotlar yetkazib berib kelmoqda. Bugungi kunda kompaniyaning 5 ta filiali mavjud boʻlib, ular
					orqali muntazam oflayn va
					onlayn savdo yoʻlga qoʻyilgan. Biz mijozlarimizga mahsulotlarning keng assortimentini taqdim etamiz.
					Doʻkonlarimizda 100 dan
					ortiq brendlar tomonidan ishlab chiqarilgan 5 000 dan ortiq turdagi mahsulotlar taklif etiladi. Biz
					oʻz ustimizda ishlashda davom etamiz.</p>

			</div>
			<div class="col-md-5 mb-5 mb-md-0 text-center">
				<video class="w-100 w-md-100" src="{{ asset('back/video/haqida.mp4') }}" type="video/mp4"
					controls></video>
			</div>
		</div>
</section>
<!-- <section> close ============================-->
<!-- ============================================-->
<section class="pt-0 pb-10" id="feature">
	<div class="container px-lg-12 px-xxl-3">
		<div class="row gy-3 gx-5 gx-xxl-6">
			<div class="col-xl-12 d-none d-xl-block">
				<div class="mb-8">
					<div class="d-flex pb-4 align-items-end">
						<h3 class="flex-1 mb-0">Galereya</h3>
					</div>
					<div class="row g-3">
						<div class="col-4">
							@foreach ($galleries as $gallery)
									<a href="{{ $gallery->photo }}" data-gallery="gallery-photos">
										<img class="w-75 rounded-3" src="{{ $gallery->photo }}" alt="{{ $gallery->photo }}" />
									</a>
								</div>
							@endforeach
					</div>
				</div>
			</div>
		</div>
	</div>
</section>


<!--================Contact Success  =================-->
<div class="modal fade" id="success" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h2 class="text-success">Thank you!</h2>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<div class="modal-body">
				<p class="text-success">Your message is successfully sent...</p>
			</div>
		</div>
	</div>
</div>

<!-- Modals error -->
<div class="modal fade" id="error" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h2 class="text-warning">Sorry!</h2>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<div class="modal-body">
				<p class="text-warning">Something went wrong.</p>
			</div>
		</div>
	</div>
</div>
@endsection
@push('styles')
	<style>
		.modal-dialog .modal-content .modal-header {
			position: initial;
			padding: 10px 20px;
			border-bottom: 1px solid #e9ecef;
		}

		.modal-dialog .modal-content .modal-body {
			height: 100px;
			padding: 10px 20px;
		}

		.modal-dialog .modal-content {
			width: 50%;
			border-radius: 0;
			margin: auto;
		}
	</style>
@endpush
@push('scripts')
	<script src="{{ asset('frontend/js/jquery.form.js') }}"></script>
	<script src="{{ asset('frontend/js/jquery.validate.min.js') }}"></script>
	<script src="{{ asset('frontend/js/contact.js') }}"></script>
	<script src="{{ asset('back/vendors/countup/countUp.umd.js')}}"></script>
@endpush
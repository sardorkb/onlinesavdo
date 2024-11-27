@extends('frontend.layouts.master')
@section('title', 'Do\'konlar | Baraka Development')
@section('main-content')
<!-- Start Contact -->
<section id="contact-us">
	<div class="container">
		<div class="col-auto">
			<nav class="mb-2" aria-label="breadcrumb">
				<ol class="breadcrumb mb-0">
					<li class="breadcrumb-item"><a href="{{ route('home') }}">Bosh sahifa</a></li>
					<li class="breadcrumb-item active" aria-current="page">Do'konlar</li>
				</ol>
			</nav><br>
			<h2 class="mb-5">Do'konlar<span class="text-body-tertiary fw-normal ms-2">(5)</span></h2>
		</div>
		<div class="row g-4">
			<div class="col-sm-6 col-md-4 col-lg-6">
				<div class="card border border-light">
					<div class="card-body shadow-sm">
						<h4 class="card-title">Baraka Development (Derizlik, Qo'qon sh.) </h4>
						<div class="d-flex justify-content-between">
							<span class="fas fa-map-marker-alt" style="color: #00297D; height:25px;width:25px;"> </span>
							<div class="d-flex flex-column flex-grow-1">
								<p class="card-text"><b>Farg'ona viloyati,
										Qo'qon shahar, A. Navoiy ko'chasi, 25-uy</b></p>
								<p class="card-text">Mo'ljal: Derizlik jom'e masjidi ro'parasi</p>
							</div>
							<div class="d-flex flex-column flex-grow-1" style="font-size: 14px">
								<p class="card-text">(73) 249-29-29</p>
								<p class="card-text">08-00 dan 18-00 gacha <br> (dam olish kunisiz)</p>
							</div>
						</div>
					</div>
				</div>
			</div>
			<div class="col-sm-6 col-md-4 col-lg-6">
				<div class="card border border-light">
					<div class="card-body shadow-sm">
						<h4 class="card-title">Baraka Development (Charxiy, Qo'qon sh.) </h4>
						<div class="d-flex justify-content-between">
							<span class="fas fa-map-marker-alt" style="color: #00297D; height:25px;width:25px;"> </span>
							<div class="d-flex flex-column flex-grow-1">
								<p class="card-text"><b>Farg'ona viloyati,
										Qo'qon shahar, A.T Xo'qandiy mavzesi 93a-uy</b></p>
								<p class="card-text">Mo'ljal: Tez tibbiy yordam shifoxonasi yo'nalishi</p>
							</div>
							<div class="d-flex flex-column flex-grow-1" style="font-size: 14px">
								<p class="card-text">(73) 249-29-29</p>
								<p class="card-text">08-00 dan 18-00 gacha <br> (dam olish kunisiz)</p>
							</div>
						</div>
					</div>
				</div>
			</div>
			<div class="col-sm-6 col-md-4 col-lg-6">
				<div class="card border border-light">
					<div class="card-body shadow-sm">
						<h4 class="card-title">Baraka Development (Farg'ona sh.) </h4>
						<div class="d-flex justify-content-between">
							<span class="fas fa-map-marker-alt" style="color: #00297D; height:25px;width:25px;"> </span>
							<div class="d-flex flex-column flex-grow-1">
								<p class="card-text"><b>Farg'ona viloyati,
										Farg'ona shahar, Sayilgoh ko'chasi, 3-uy</b></p>
								<p class="card-text">Mo'ljal: Farg'ona mehmonxonasi orqasida</p>
							</div>
							<div class="d-flex flex-column flex-grow-1" style="font-size: 14px">
								<p class="card-text">(73) 249-29-29</p>
								<p class="card-text">08-00 dan 18-00 gacha <br> (dam olish kunisiz)</p>
							</div>
						</div>
					</div>
				</div>
			</div>
			<div class="col-sm-6 col-md-4 col-lg-6">
				<div class="card border border-light">
					<div class="card-body shadow-sm">
						<h4 class="card-title">Baraka Development (Yunusobod, Toshkent sh.) </h4>
						<div class="d-flex justify-content-between">
							<span class="fas fa-map-marker-alt" style="color: #00297D; height:25px;width:25px;"> </span>
							<div class="d-flex flex-column flex-grow-1">
								<p class="card-text"><b>Toshkent shahar,
										Yunusobod tumani, A. Temur shox ko'chasi, 61-uy</b></p>
								<p class="card-text">Mo'ljal: Oqsaroy milliy taomlari yonida</p>
							</div>
							<div class="d-flex flex-column flex-grow-1" style="font-size: 14px">
								<p class="card-text">(73) 249-29-29</p>
								<p class="card-text">08-00 dan 18-00 gacha <br> (dam olish kunisiz)</p>
							</div>
						</div>
					</div>
				</div>
			</div>
			<div class="col-sm-6 col-md-4 col-lg-6">
				<div class="card border border-light">
					<div class="card-body shadow-sm">
						<h4 class="card-title">Baraka Development (Uchtepa, Toshkent sh.) </h4>
						<div class="d-flex justify-content-between">
							<span class="fas fa-map-marker-alt" style="color: #00297D; height:25px;width:25px;"> </span>
							<div class="d-flex flex-column flex-grow-1">
								<p class="card-text"><b>Toshkent shahar,
										Uchtepa tumani, Ibrat ko'chasi, 42-uy</b></p>
								<p class="card-text">Mo'ljal: 22-Oilaviy poliklinika yonida</p>
							</div>
							<div class="d-flex flex-column flex-grow-1" style="font-size: 14px">
								<p class="card-text">(73) 249-29-29</p>
								<p class="card-text">08-00 dan 18-00 gacha <br> (dam olish kunisiz)</p>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</section>
<!--/ End Contact -->



<!--================Contact Success  =================-->
<div class="modal fade" id="success" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
	aria-hidden="true">
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
<div class="modal fade" id="error" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
	aria-hidden="true">
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
@endpush

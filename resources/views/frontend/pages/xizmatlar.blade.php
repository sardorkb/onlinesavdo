@extends('frontend.layouts.master')
@section('title', 'Xizmatlar va servis | Baraka Development')
@section('main-content')
    <section id="contact-us">
        <div class="container">
            <div class="col-auto">
                <nav class="mb-2" aria-label="breadcrumb">
                    <ol class="breadcrumb mb-0">
                        <li class="breadcrumb-item"><a href="{{ route('home') }}">Bosh sahifa</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Xizmatlar va servis</li>
                    </ol>
                </nav><br>
                <h2 class="mb-5">Xizmatlar va servis</h2>

                <div class="row g-3 mb-9">
                    <div class="col-12">
                        <div class="whooping-banner w-100 rounded-3 overflow-hidden">
                            <img src="{{ asset('back/img/bannerlar/xizmatlar.jpg') }}" alt="reja">
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-auto">
                <div class="card rounded-4 border-0 offer-card">
                    <div class="card-body d-md-flex align-items-center gap-4 py-5">
                        <div>
                            <h4 style="text-align: justify">Yuqori malakali mutaxassislar jamoasi va barcha zarur jihozlarning mavjudligi bilan biz Baraka Development Service mijozlarga yuqori darajadagi tezkor xizmatni taqdim etamiz.</h4>
                        </div>
                    </div>
                </div>
            </div><br>
        </div>
    </section>

@endsection

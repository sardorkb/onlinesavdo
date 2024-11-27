@extends('frontend.layouts.master')
@section('title', 'To\'lash rejasi | Baraka Development')
@section('main-content')
    <section>
        <div class="container">
            <div class="col-auto">
                <nav class="mb-2" aria-label="breadcrumb">
                    <ol class="breadcrumb mb-0">
                        <li class="breadcrumb-item"><a href="{{ route('home') }}">Bosh sahifa</a></li>
                        <li class="breadcrumb-item active" aria-current="page">To'lov</li>
                    </ol>
                </nav><br>
                <div class="row g-3 mb-9">
                    <div class="col-12">
                        <div class="whooping-banner w-100 rounded-3 overflow-hidden">
                            <img src="{{ asset('back/img/bannerlar/tulov.jpg') }}" alt="reja">
                        </div>
                    </div>
                </div>
                
            </div>
        </div>
    </section>

@endsection

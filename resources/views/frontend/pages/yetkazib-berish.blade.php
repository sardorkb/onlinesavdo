@extends('frontend.layouts.master')
@section('title', 'Yetkazib berish | Baraka Development')
@section('main-content')
    <section id="contact-us">
        <div class="container">
            <div class="col-auto">
                <nav class="mb-2" aria-label="breadcrumb">
                    <ol class="breadcrumb mb-0">
                        <li class="breadcrumb-item"><a href="{{ route('home') }}">Bosh sahifa</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Yetkazib berish</li>
                    </ol>
                </nav><br>
                <h2 class="mb-5">Yetkazib berish</h2>

                <div class="row g-3 mb-9">
                    <div class="col-12">
                        <div class="whooping-banner w-100 rounded-3 overflow-hidden">
                            <img src="{{ asset('back/img/bannerlar/yetkazib-berish.jpg') }}" alt="reja">
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-auto">
                <div class="card rounded-4 border-0 offer-card">
                    <div class="card-body d-md-flex align-items-center gap-4 py-5">
                        <span class="fas fa-shipping-fast" style="color: #00297D; height:50px;width:50px;"></span>
                        <div>
                            <p style="text-align: justify"> Baraka Development yetkazib berish xizmati kompaniyaning
                                bozorda 2014 yildan beri faoliyat ko'rsatib kelmoqda.
                                Yetkazib berish xizmatlarining asosiy yo'nalishlarini faol rivojlantirmoqda.
                                Ekspeditorlik xizmatlarini amalga oshirishda xizmat ko'rsatish sifati va buyurtmalarni
                                bajarish tezligi biz uchun asosiy vazifalardir. Shaxsiy yondashuv bizga har bir
                                mijozning
                                barcha xususiyatlarini, sizning minnatdorchiligingizni sarflangan mablag'lardan tashqari
                                ko'proq e'tiborga olishga imkon beradi!</p>
                        </div>
                    </div>
                </div>
            </div><br>
            
            <div class="col-auto">
                <div class="row g-4">
                    <div class="col-sm-6 col-md-4 col-lg-3">
                        <div class="card border border-light">
                            <div class="card-body">
                                <div class="d-flex justify-content-center align-items-center">
                                    <span class="far fa-calendar-alt"
                                        style="color: #00297D; height:60px;width:60px;"></span>
                                </div><br>
                                <p class="card-text" style="text-align: center">Yetkazib berish barcha kunlarda, dam olish
                                    va bayram kunlari xisoblamagan holda amalga oshiriladi.</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-6 col-md-4 col-lg-3">
                        <div class="card border border-light">
                            <div class="card-body">
                                <div class="d-flex justify-content-center align-items-center">
                                    <span class="far fa-clock" style="color: #00297D; height:60px;width:60px;"></span>
                                </div><br>
                                <p class="card-text" style="text-align: center">Bizning ekspeditorlarimiz hech qachon ofisda
                                    o'tirishmaydi, ular doimo yo'lda.
                                    Shunday qilib, biz eng tez etkazib berishga erishamiz!</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-6 col-md-4 col-lg-3">
                        <div class="card border border-light">
                            <div class="card-body">
                                <div class="d-flex justify-content-center align-items-center">
                                    <span class="fas fa-truck-loading"
                                        style="color: #00297D; height:60px;width:60px;"></span>
                                </div><br>
                                <p class="card-text" style="text-align: center">Yetkazib berish xizmati oson yo'llarni
                                    izlamaydi, biz o'z ishimizni yaxshi ko'ramiz va odamlarga yordam berishdan zavqlanamiz!
                                </p>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-6 col-md-4 col-lg-3">
                        <div class="card border border-light">
                            <div class="card-body">
                                <div class="d-flex justify-content-center align-items-center">
                                    <span class="far fa-comments" style="color: #00297D; height:60px;width:60px;"></span>
                                </div><br>
                                <p class="card-text" style="text-align: center">Sizning fikringiz biz uchun juda muhimdir.
                                    Iltimos, sayt va xizmat haqida o'z taklif va mulohazalaringizni bo'lishing ko'ring.</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
    </section>
@endsection

@extends('frontend.layouts.master')
@php
use Carbon\Carbon;
Carbon::setLocale('uz'); // Change to the desired locale
@endphp
<title>{{ $promotion->title }}</title>

@section('main-content')
<!-- Breadcrumbs -->
<section>
    <div class="container">
        <div class="col-auto">
            <nav class="mb-2" aria-label="breadcrumb">
                <ol class="breadcrumb mb-0">
                    <li class="breadcrumb-item"><a href="{{ route('home') }}">Bosh sahifa</a></li>
                    <li class="breadcrumb-item active" aria-current="page">{{ $promotion->title }}</li>
                </ol>
            </nav>
        </div>
    </div>
</section>
<div class="container">
    <div class="pb-9">
        <div class="row gx-lg-9">
            <div class="col-xl-9 border-end-xl">
                <div class="card mb-9">
                    <div class="card-body">
                        <img class="rounded w-100" style="height: 60vh" src="{{ $promotion->photo }}"
                            alt="{{ $promotion->photo }}">
                        <h1 class="lh-sm fs-6 fs-xxl-2 mb-4 mt-2">{{ $promotion->title }}</h1>
                        <p><span data-feather="calendar"
                        style="height:22px;width:22px;"></span> Aksiya davomiyligi {!! Carbon::parse($promotion->start_date)->translatedFormat('d F Y') !!} dan {!! Carbon::parse($promotion->end_date)->translatedFormat('d F Y') !!} gacha</p>
                        @if ($promotion->days_left > 0)
                                    <span  data-feather="clock"
                                        style="height:18px;width:18px; color: green;"></span>
                                    Aksiya yakunlashiga: <span class="badge-label"
                                        style="color: green;">{{ $promotion->days_left }} kun qoldi</span>
                                @else
                                <span  data-feather="clock"
                                        style="height:18px;width:18px; color: red;"></span>
                                    <span class="badge-label"
                                        style="color: red;">Aksiya yakunlandi.</span>
                                @endif
                    </div>
                </div>
                <p class="text-justify text-body-secondary mb-6 mb-xxl-8">{!! $promotion->description !!}</p>
            </div>

            <div class="col-xl-3">

                <div class="search-box w-100 mb-2 mb-sm-0" style="max-width:30rem;">
                    <form class="position-relative" method="get" action="{{ route('promotion.search') }}"
                        data-bs-toggle="search" data-bs-display="static">
                        <input class="form-control search-input search" type="search"
                            placeholder="Qidiruv" aria-label="Search">
                        <span class="fas fa-search search-box-icon"></span>
                    </form>
                </div>

                <div class="row g-0 py-3 border-bottom border-dashed align-items-end justify-content-between">
                    <div class="col-auto">
                        <h3 class="flex-1 mb-0 text-nowrap me-3">Eng so'nggi aksiyalar</h3>
                    </div>
                </div>
                @foreach ($recent_promotions as $promotion)
                    <div class="py-3 border-bottom border-dotted">
                        <a class="text-body-highlight fw-bold mb-2 line-clamp-1 me-5 lh-base" style="color: black"
                            href="{{ route('promotion.detail', $promotion->slug) }}">{{ $promotion->title }}</a>
                        @if ($promotion->days_left > 0)
                                    <span  data-feather="clock"
                                        style="height:18px;width:18px; color: green;"></span>
                                    Aksiya yakunlashiga: <span class="badge-label"
                                        style="color: green;">{{ $promotion->days_left }} kun qoldi</span>
                                @else
                                <span  data-feather="clock"
                                        style="height:18px;width:18px; color: red;"></span>
                                    <span class="badge-label"
                                        style="color: red;">Aksiya yakunlandi.</span>
                                @endif
                    </div>
                @endforeach
            </div>
        </div>
    </div>
</div>
@endsection
@push('scripts')
    <script>
        $(document).ready(function () {

            (function ($) {
                "use strict";

                $('.btn-reply.reply').click(function (e) {
                    e.preventDefault();
                    $('.btn-reply.reply').show();

                    $('.comment_btn.comment').hide();
                    $('.comment_btn.reply').show();

                    $(this).hide();
                    $('.btn-reply.cancel').hide();
                    $(this).siblings('.btn-reply.cancel').show();

                    var parent_id = $(this).data('id');
                    var html = $('#commentForm');
                    $(html).find('#parent_id').val(parent_id);
                    $('#commentFormContainer').hide();
                    $(this).parents('.comment-list').append(html).fadeIn('slow').addClass('appended');
                });

                $('.comment-list').on('click', '.btn-reply.cancel', function (e) {
                    e.preventDefault();
                    $(this).hide();
                    $('.btn-reply.reply').show();

                    $('.comment_btn.reply').hide();
                    $('.comment_btn.comment').show();

                    $('#commentFormContainer').show();
                    var html = $('#commentForm');
                    $(html).find('#parent_id').val('');

                    $('#commentFormContainer').append(html);
                });

            })(jQuery)
        })
    </script>
@endpush
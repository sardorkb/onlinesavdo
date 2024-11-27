@extends('frontend.layouts.master')

@section('title', 'Barakada aksiyalar | Baraka Development')

@section('main-content')
<section id="contact-us">
    <div class="container">
        <div class="col-auto">
            <nav class="mb-2" aria-label="breadcrumb">
                <ol class="breadcrumb mb-0">
                    <li class="breadcrumb-item"><a href="{{ route('home') }}">Bosh sahifa</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Aksiyalar</li>
                </ol>
            </nav><br>
            <h2 class="mb-5">Aksiyalar</h2>
        </div>

        <div class="row">
            <div class="col-lg-12 col-12">
                <div class="row">
                    @foreach ($promotions as $promotion)
                        <div class="col-lg-4">
                            <div class="blog-card">
                                <a href="{{ route('promotion.detail', $promotion->slug) }}"><img class="w-100 rounded-3"
                                        src="{{ $promotion->photo }}" alt="{{ $promotion->photo }}" /></a>
                                <a href="{{ route('promotion.detail', $promotion->slug) }}">
                                    <h4 class="mb-1 pe-sm-5 lh-lg mt-2">{{ $promotion->title }}</h4>
                                </a>
                                @if ($promotion->days_left > 0)
                                    <span  data-feather="clock"
                                        style="height:18px;width:18px; color: green;"></span>
                                    Aksiya yakunlanishiga: <span class="badge-label"
                                        style="color: green;">{{ $promotion->days_left }} kun qoldi</span>
                                @else
                                <span  data-feather="clock"
                                        style="height:18px;width:18px; color: red;"></span>
                                    <span class="badge-label"
                                        style="color: red;">Aksiya yakunlandi.</span>
                                @endif
                            </div>
                        </div>
                    @endforeach
                    <div class="col-12">
                        <!-- Pagination -->
                        {{-- {{$promotions->appends($_GET)->links()}} --}}
                        <!--/ End Pagination -->
                    </div>
                </div>
            </div>

        </div>
    </div>
</section>

@endsection
@push('styles')
    <style>
        .pagination {
            display: inline-flex;
        }
    </style>

@endpush
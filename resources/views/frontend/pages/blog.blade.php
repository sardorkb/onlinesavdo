@extends('frontend.layouts.master')

@section('title', 'Barakada yangiliklar | Baraka Development')

@section('main-content')
<section id="contact-us">
    <div class="container">
        <div class="col-auto">
            <nav class="mb-2" aria-label="breadcrumb">
                <ol class="breadcrumb mb-0">
                    <li class="breadcrumb-item"><a href="{{ route('home') }}">Bosh sahifa</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Yangiliklar</li>
                </ol>
            </nav>
        </div>
        <div class="row">
            <div class="col-lg-9 col-12">
                <div class="row">
                    @foreach ($posts as $post)
                        <div class="col-lg-4">
                            <div class="blog-card">
                                @if ($post->youtube_link)
                                    <div class="embed-responsive embed-responsive-16by9">
                                        <iframe class="embed-responsive-item w-100 rounded-3"
                                            src="https://www.youtube.com/embed/{{ $post->youtube_link }}"
                                            allowfullscreen></iframe>
                                    </div>
                                @elseif ($post->photo)
                                    <img class="w-100 rounded-3" src="{{$post->photo}}"
                                        alt="{{ $post->title }}" />
                                @endif
                                <a href="{{ route('blog.detail', $post->slug) }}">
                                    <h4 class="mb-3 pe-sm-5 lh-lg mt-2">{{ $post->title }}</h4>
                                </a>
                                <p style="font-size: 12px">{{ $post->created_at->format('d M Y') }}</p>
                            </div>
                        </div>
                    @endforeach
                    <div class="col-12">
                        <!-- Pagination -->
                        {{-- {{$posts->appends($_GET)->links()}} --}}
                        <!--/ End Pagination -->
                    </div>
                </div>
            </div>

            <div class="col-xl-3">

                <div class="search-box w-100 mb-2 mb-sm-0" style="max-width:30rem;">
                    <form class="position-relative" method="get" action="{{ route('blog.search') }}"
                        data-bs-toggle="search" data-bs-display="static">
                        <input class="form-control search-input search" type="search"
                            placeholder="Yangiliklarni qidirish" aria-label="Search">
                        <span class="fas fa-search search-box-icon"></span>
                    </form>
                </div>
                <h3 class="py-3 border-bottom border-dashed">Kategoriyalar</h3>
                <div>
                    @if (!empty($_GET['category']))
                                        @php
                                            $filter_cats = explode(',', $_GET['category']);
                                        @endphp
                    @endif
                    <form action="{{ route('blog.filter') }}" method="POST">
                        @csrf
                        {{-- {{count(Helper::postCategoryList())}} --}}
                        @foreach (Helper::postCategoryList('posts') as $cat)
                            <a href="{{ route('blog.category', $cat->slug) }}" class="badge badge-tag me-2 mb-2"">{{ $cat->title }} </a>
                        @endforeach
                    </form>
                </div>

                <div class=" row g-0 py-3 border-bottom border-dashed align-items-end justify-content-between">
                            <div class="col-auto">
                                <h3 class="flex-1 mb-0 text-nowrap me-3">Eng so'nggi yangiliklar</h3>
                            </div>
                </div>
                @foreach ($recent_posts as $post)
                    <div class="py-3 border-bottom border-dotted">
                        <a class="text-body-highlight fw-bold mb-2 line-clamp-1 me-5 lh-base" style="color: black"
                            href="{{route('blog.detail', $post->slug)}}">{{ $post->title }}</a>
                        <p>{!! $post->summary !!}</p>
                        <p class="fs-10 text-body-tertiary fw-bold mb-1" style="font-size: 12px"><span
                                class="fa-solid fa-clock text-body-secondary me-1"></span>{{ $post->created_at->format('d M y') }}
                        </p>
                    </div>
                @endforeach
                <h3 class="mb-3 py-3 border-bottom border-dashed">Teglar</h3>
                <div class="d-flex flex-wrap pb-7">
                    @if (!empty($_GET['tag']))
                                        @php
                                            $filter_tags = explode(',', $_GET['tag']);
                                        @endphp
                    @endif
                    <form action="{{ route('blog.filter') }}" method="POST">
                        @csrf
                        @foreach (Helper::postTagList('posts') as $tag)
                            <a href="{{ route('blog.tag', $tag->title) }}"
                                class="badge badge-tag me-2 mb-2">{{ $tag->title }} </a>
                        @endforeach
                    </form>
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
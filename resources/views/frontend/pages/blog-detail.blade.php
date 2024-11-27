@extends('frontend.layouts.master')

<title>{{ $post->title }}</title>

@section('main-content')
<!-- Breadcrumbs -->
<section>
    <div class="container">
        <div class="col-auto">
            <nav class="mb-2" aria-label="breadcrumb">
                <ol class="breadcrumb mb-0">
                    <li class="breadcrumb-item"><a href="{{ route('home') }}">Bosh sahifa</a></li>
                    <li class="breadcrumb-item active" aria-current="page">{{ $post->title }}</li>
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
                    @if ($post->youtube_link)
                                    <div class="embed-responsive embed-responsive-16by9">
                                        <iframe class="embed-responsive-item w-100"
                                            src="https://www.youtube.com/embed/{{ $post->youtube_link }}"
                                            allowfullscreen></iframe>
                                    </div>
                                @elseif ($post->photo)
                                <img class="rounded w-100" style="height: 60vh" src="{{ $post->photo }}"
                                alt="{{ $post->photo }}">
                                @endif
                        
                        <h1 class="lh-sm fs-6 fs-xxl-2 mb-4 mt-2">{{ $post->title }}</h1>
                        <div class="card mb-5 mb-xxl-7">
                            <div class="card-body">
                                <div class="row gy-5">
                                    <div class="col-md-12 d-flex justify-content-between">
                                        <div>
                                            @if ($post->quote)
                                                <p class="text-body-tertiary"> <i class="fa fa-quote-left"></i>
                                                    {!! $post->quote !!}
                                                </p>
                                            @endif
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <h4>Teglar:</h4>
                        @php
                            $tags = explode(',', $post->tags);
                        @endphp
                        @foreach ($tags as $tag)
                            <p class="fs-8 mb-0 text-body-tertiary">{{ $tag }}</p>
                        @endforeach
                    </div>
                </div>
                <p class="text-justify text-body-secondary mb-6 mb-xxl-8">{!! $post->description !!}</p>
                {{-- @auth
                <div class="col-12 mt-4">
                    <div class="reply">
                        <div class="reply-head comment-form" id="commentFormContainer">
                            <h2 class="reply-title">Leave a Comment</h2>
                            <!-- Comment Form -->
                            <form class="form comment_form" id="commentForm"
                                action="{{ route('post-comment.store', $post->slug) }}" method="POST">
                                @csrf
                                <div class="row">
                                    <div class="col-12">
                                        <div class="form-group  comment_form_body">
                                            <label>Your Message<span>*</span></label>
                                            <textarea name="comment" id="comment" rows="10" placeholder=""></textarea>
                                            <input type="hidden" name="post_id" value="{{ $post->id }}" />
                                            <input type="hidden" name="parent_id" id="parent_id" value="" />
                                        </div>
                                    </div>
                                    <div class="col-12">
                                        <div class="form-group button">
                                            <button type="submit" class="btn"><span class="comment_btn comment">Post
                                                    Comment</span><span class="comment_btn reply"
                                                    style="display: none;">Reply
                                                    Comment</span></button>
                                        </div>
                                    </div>
                                </div>
                            </form>
                            <!-- End Comment Form -->
                        </div>
                    </div>
                </div>
                @else
                <p class="text-center p-5">
                    Sharh yozish uchun siz saytga <a href="{{ route('login.form') }}"
                        style="color:rgb(54, 54, 204)">KIRISH</a>ingiz kerak yoki
                    <a style="color:blue" href="{{ route('register.form') }}">RO'YXATDAN</a> o'tishingiz kerak.

                </p>


                <!--/ End Form -->
                @endauth
                <div class="col-12">
                    <div class="comments">
                        <h3 class="comment-title">Comments ({{ $post->allComments->count() }})</h3>
                        <!-- Single Comment -->
                        @include('frontend.pages.comment', [
                        'comments' => $post->comments,
                        'post_id' => $post->id,
                        'depth' => 3,
                        ])
                        <!-- End Single Comment -->
                    </div>
                </div> --}}
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
                            href="{{ route('blog.detail', $post->slug) }}">{{ $post->title }}</a>
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
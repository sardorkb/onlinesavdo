<!-- Start Most Popular -->
<div class="product-area most-popular related-product section">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="section-title">
                    <h2>Related Products</h2>
                </div>
            </div>
        </div>
        <div class="row">
            {{-- {{$product_detail->rel_prods}} --}}
            <div class="col-12">
                <div class="owl-carousel popular-slider">
                    @foreach($product_detail->rel_prods as $data)
                    @if($data->id !==$product_detail->id)
                    <!-- Start Single Product -->
                    <div class="single-product">
                        <div class="product-img">
                            <a href="{{route('product-detail',$data->slug)}}">
                                @php
                                $photo=explode(',',$data->photo);
                                @endphp
                                <img class="default-img" src="{{$photo[0]}}" alt="{{$photo[0]}}">
                                <img class="hover-img" src="{{$photo[0]}}" alt="{{$photo[0]}}">
                                <span class="price-dec">{{$data->discount}} % Off</span>
                                {{-- <span class="out-of-stock">Hot</span> --}}
                            </a>
                            <div class="button-head">
                                <div class="product-action">
                                    <a data-toggle="modal" data-target="#modelExample" title="Quick View" href="#"><i
                                            class=" ti-eye"></i><span>Quick Shop</span></a>
                                    <a title="Wishlist" href="#"><i class=" ti-heart "></i><span>Add to
                                            Wishlist</span></a>
                                    <a title="Compare" href="#"><i class="ti-bar-chart-alt"></i><span>Add to
                                            Compare</span></a>
                                </div>
                                <div class="product-action-2">
                                    <a title="Add to cart" href="#">Add to cart</a>
                                </div>
                            </div>
                        </div>
                        <div class="product-content">
                            <h3><a href="{{route('product-detail',$data->slug)}}">{{$data->title}}</a></h3>
                            <div class="product-price">
                                @php
                                $after_discount=($data->price-(($data->discount*$data->price)/100));
                                @endphp
                                <span class="old">${{number_format($data->price,2)}}</span>
                                <span>${{number_format($after_discount,2)}}</span>
                            </div>

                        </div>
                    </div>
                    <!-- End Single Product -->

                    @endif
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</div>
End Most Popular Area

















<style>
    .brand-carousel-container {
        overflow: hidden;
        width: 100%;
        position: relative;
    }

    .brand-carousel-track {
        display: flex;
        transition: transform 0.5s ease;
    }

    .brand-card {
        border-radius: 10px;
        overflow: hidden;
        margin: 15px;
        text-align: center;
        padding: 20px;
        background-color: #fff;
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        transition: transform 0.2s;
        min-width: calc(100% / 6 - 30px);
        /* Adjust the width to show 6 cards at a time */
        box-sizing: border-box;
    }

    .brand-card img {
        width: 100%;
        height: auto;
        object-fit: contain;
    }
</style>

<div class="brand-carousel-container">
    <div class="brand-carousel-track" id="brandCarouselTrack">
        @php
        $brands = DB::table('brands')->orderBy('title', 'ASC')->where('status', 'active')->get();
        @endphp
        @foreach ($brands as $brand)
        <div class="brand-card">
            <a href="{{ route('product-brand', $brand->slug) }}">
                @if ($brand->photo)
                <img src="{{ $brand->photo }}" alt="{{ $brand->title }}">
                @else
                <img src="https://via.placeholder.com/500x200" alt="#">
                @endif
            </a>
        </div>
        @endforeach
        <!-- Duplicate the first 6 brands to create an infinite loop effect -->
        @foreach ($brands->slice(0, 6) as $brand)
        <div class="brand-card">
            <a href="{{ route('product-brand', $brand->slug) }}">
                @if ($brand->photo)
                <img src="{{ $brand->photo }}" alt="{{ $brand->title }}">
                @else
                <img src="https://via.placeholder.com/500x200" alt="#">
                @endif
            </a>
        </div>
        @endforeach
    </div>
</div>


<script>
    document.addEventListener('DOMContentLoaded', function () {
        const track = document.getElementById('brandCarouselTrack');
        const cards = track.children;
        const cardWidth = cards[0].offsetWidth + parseInt(window.getComputedStyle(cards[0]).marginRight) * 2;
        let index = 0;

        function moveCarousel() {
            index++;
            track.style.transform = `translateX(${-cardWidth * index}px)`;

            if (index >= cards.length - 1) {
                setTimeout(() => {
                    track.style.transition = 'none';
                    track.style.transform = 'translateX(0)';
                    index = 0;
                    setTimeout(() => {
                        track.style.transition = 'transform 0.5s ease';
                    }, 50);
                }, 500);
            }
        }

        setInterval(moveCarousel, 3000); // Adjust the interval for slower or faster scrolling
    });
</script>

























<div class="modal-content">
    <form autocomplete="off" id="form_login" method="POST" name="auth-form" novalidate="novalidate">
        <div class="modal-header">
            <div class="tab-modal">
                <button type="button" class="tabs__nav-item tabs__nav-item_active">Войти</button>
                <button type="button" class="tabs__nav-item js-register">Регистрация </button>
            </div>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
                <svg>
                    <use xlink:href="/sprite.svg#close"></use>
                </svg>
            </button>
        </div>
        <div class="modal-body">
            <p class="title">Для входа на сайт введите свой телефон и пароль</p>
            <div class="row-form-modal">
                <label>
                    <span>Телефон:</span>
                    <input type="text" class="js-phone form-control" name="phone" value=""
                        placeholder="+998 (__) ___ __ __" maxlength="19">
                    <div class="input-group-prepend justify-content-center"><span
                            class="input-group-text icon icon-checkmark"></span><span
                            class="input-group-text icon icon-znak"></span>
                    </div>
                </label>
            </div>

            <div class="row-form-modal">
                <label>
                    <span>Пароль:</span>
                    <input class="form-control" type="password" name="password">
                    <div class="input-group-prepend justify-content-center"><span
                            class="input-group-text icon icon-checkmark"></span><span
                            class="input-group-text icon icon-znak"></span>
                    </div>
                </label>
            </div>
            <div class="flex-row">
                <label class="">
                    <input type="checkbox">
                    <span>Запомнить меня</span>
                </label>
                <button type="button" class="forgot js-recover-password">Забыли пароль?</button>
            </div>
        </div>
        <div class="modal-footer">
            <div class="flex">
                <button type="button" class="blue js-register">Зарегистрироваться </button>
                <button type="submit" class="pink">Войти</button>
            </div>
        </div>
    </form>
</div>



<!-- Shopping Cart -->
<div class="shopping-cart section">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <!-- Shopping Summery -->
                <table class="table shopping-summery">
                    <thead>
                        <tr class="main-hading">
                            <th>PRODUCT</th>
                            <th>NAME</th>
                            <th class="text-center">TOTAL</th>
                            <th class="text-center">ADD TO CART</th>
                            <th class="text-center"><i class="ti-trash remove-icon"></i></th>
                        </tr>
                    </thead>
                    <tbody>
                        @if(Helper::getAllProductFromWishlist())
                        @foreach(Helper::getAllProductFromWishlist() as $key => $wishlist)
                        <tr>
                            @php
                            $photo = explode(',', $wishlist->product['photo']);
                            @endphp
                            <td class="image" data-title="No"><img src="{{$photo[0]}}" alt="{{$photo[0]}}"></td>
                            <td class="product-des" data-title="Description">
                                <p class="product-name"><a
                                        href="{{route('product-detail', $wishlist->product['slug'])}}">{{$wishlist->product['title']}}</a>
                                </p>
                                <p class="product-des">{!!($wishlist['summary']) !!}</p>
                            </td>
                            <td class="total-amount" data-title="Total"><span>${{$wishlist['amount']}}</span></td>
                            <td><a href="{{route('add-to-cart', $wishlist->product['slug'])}}"
                                    class='btn text-white'>Add
                                    To Cart</a></td>
                            <td class="action" data-title="Remove"><a
                                    href="{{route('wishlist-delete', $wishlist->id)}}"><i
                                        class="ti-trash remove-icon"></i></a></td>
                        </tr>
                        @endforeach
                        @else
                        <tr>
                            <td class="text-center">
                                There are no any wishlist available. <a href="{{route('product-grids')}}"
                                    style="color:blue;">Continue shopping</a>

                            </td>
                        </tr>
                        @endif


                    </tbody>
                </table>
                <!--/ End Shopping Summery -->
            </div>
        </div>
    </div>
</div>
<!--/ End Shopping Cart -->

<!-- Shopping Cart -->
<div class="shopping-cart section">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <!-- Shopping Summery -->
                <table class="table shopping-summery">
                    <thead>
                        <tr class="main-hading">
                            <th>PRODUCT</th>
                            <th>NAME</th>
                            <th class="text-center">UNIT PRICE</th>
                            <th class="text-center">QUANTITY</th>
                            <th class="text-center">TOTAL</th>
                            <th class="text-center"><i class="ti-trash remove-icon"></i></th>
                        </tr>
                    </thead>
                    <tbody id="cart_item_list">
                        <form action="{{route('cart.update')}}" method="POST">
                            @csrf
                            @if(Helper::getAllProductFromCart())
                            @foreach(Helper::getAllProductFromCart() as $key => $cart)
                            <tr>
                                @php
                                $photo = explode(',', $cart->product['photo']);
                                @endphp
                                <td class="image" data-title="No"><img src="{{$photo[0]}}" alt="{{$photo[0]}}"></td>
                                <td class="product-des" data-title="Description">
                                    <p class="product-name"><a
                                            href="{{route('product-detail', $cart->product['slug'])}}"
                                            target="_blank">{{$cart->product['title']}}</a></p>
                                    <p class="product-des">{!!($cart['summary']) !!}</p>
                                </td>
                                <td class="price" data-title="Price"><span>${{number_format($cart['price'], 2)}}</span>
                                </td>
                                <td class="qty" data-title="Qty"><!-- Input Order -->
                                    <div class="input-group">
                                        <div class="button minus">
                                            <button type="button" class="btn btn-primary btn-number" disabled="disabled"
                                                data-type="minus" data-field="quant[{{$key}}]">
                                                <i class="ti-minus"></i>
                                            </button>
                                        </div>
                                        <input type="text" name="quant[{{$key}}]" class="input-number" data-min="1"
                                            data-max="100" value="{{$cart->quantity}}">
                                        <input type="hidden" name="qty_id[]" value="{{$cart->id}}">
                                        <div class="button plus">
                                            <button type="button" class="btn btn-primary btn-number" data-type="plus"
                                                data-field="quant[{{$key}}]">
                                                <i class="ti-plus"></i>
                                            </button>
                                        </div>
                                    </div>
                                    <!--/ End Input Order -->
                                </td>
                                <td class="total-amount cart_single_price" data-title="Total"><span
                                        class="money">${{$cart['amount']}}</span></td>

                                <td class="action" data-title="Remove"><a href="{{route('cart-delete', $cart->id)}}"><i
                                            class="ti-trash remove-icon"></i></a></td>
                            </tr>
                            @endforeach
                            <track>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td class="float-right">
                                <button class="btn float-right" type="submit">Update</button>
                            </td>
                            </track>
                            @else
                            <tr>
                                <td class="text-center">
                                    There are no any carts available. <a href="{{route('product-grids')}}"
                                        style="color:blue;">Continue shopping</a>

                                </td>
                            </tr>
                            @endif

                        </form>
                    </tbody>
                </table>
                <!--/ End Shopping Summery -->
            </div>
        </div>
        <div class="row">
            <div class="col-12">
                <!-- Total Amount -->
                <div class="total-amount">
                    <div class="row">
                        <div class="col-lg-8 col-md-5 col-12">
                            <div class="left">
                                <div class="coupon">
                                    <form action="{{route('coupon-store')}}" method="POST">
                                        @csrf
                                        <input name="code" placeholder="Enter Your Coupon">
                                        <button class="btn">Apply</button>
                                    </form>
                                </div>
                                {{-- <div class="checkbox">`
                                    @php
                                    $shipping=DB::table('shippings')->where('status','active')->limit(1)->get();
                                    @endphp
                                    <label class="checkbox-inline" for="2"><input name="news" id="2" type="checkbox"
                                            onchange="showMe('shipping');"> Shipping</label>
                                </div> --}}
                            </div>
                        </div>
                        <div class="col-lg-4 col-md-7 col-12">
                            <div class="right">
                                <ul>
                                    <li class="order_subtotal" data-price="{{Helper::totalCartPrice()}}">Cart
                                        Subtotal<span>${{number_format(Helper::totalCartPrice(), 2)}}</span></li>

                                    @if(session()->has('coupon'))
                                    <li class="coupon_price" data-price="{{Session::get('coupon')['value']}}">You
                                        Save<span>${{number_format(Session::get('coupon')['value'], 2)}}</span></li>
                                    @endif
                                    @php
                                    $total_amount = Helper::totalCartPrice();
                                    if (session()->has('coupon')) {
                                    $total_amount = $total_amount - Session::get('coupon')['value'];
                                    }
                                    @endphp
                                    @if(session()->has('coupon'))
                                    <li class="last" id="order_total_price">You
                                        Pay<span>${{number_format($total_amount, 2)}}</span></li>
                                    @else
                                    <li class="last" id="order_total_price">You
                                        Pay<span>${{number_format($total_amount, 2)}}</span></li>
                                    @endif
                                </ul>
                                <div class="button5">
                                    <a href="{{route('checkout')}}" class="btn">Checkout</a>
                                    <a href="{{route('product-grids')}}" class="btn">Continue shopping</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!--/ End Total Amount -->
            </div>
        </div>
    </div>
</div>
<!--/ End Shopping Cart -->


<section class="py-1">
    <div class="container-lg d-flex justify-content-evenly space-between align-middle">
        <div class="scrollbar">
            <div class="d-flexalign-items-center p-2 mr-6">
                <a href="{{ route('promotion') }}" class="btn btn-sm btn-primary rounded-pill w-10 me-5"
                    style="color: white;">
                    <span class="me-2 far fa-star"></span>Aksiyalar
                </a>
                @php
                $specific_category_ids = [2, 17, 18, 20, 4, 21, 12, 16];
                $category_lists = DB::table('categories')->where('status', 'active')->whereIn('id',
                $specific_category_ids)->get();
                @endphp
                @if ($category_lists)
                @foreach ($category_lists as $cat)
                <a href="{{ route('product-cat', $cat->slug) }}"
                    class="btn btn-sm btn-outline-info rounded-pill w-10 me-5">
                    {{ $cat->title }}
                </a>
                @endforeach
                @endif
                <a href="{{ route('kategoriyalar')}}" class="btn btn-sm btn-outline-info rounded-pill w-10 me-5">
                    </span>Barcha kategoriyalar
                </a>
            </div>
        </div>
    </div>
</section>


<!-- <section> begin ============================-->


<section class="py-1">
    <div class="container-lg d-flex justify-content-evenly space-between align-middle">
        <div class="scrollbar">
            <div class="d-flexalign-items-center p-2 mr-6">
                <a href="{{ route('promotion') }}" class="btn btn-sm btn-primary rounded-pill w-10 me-5"
                    style="color: white;">
                    <span class="me-2 far fa-star"></span>Aksiyalar
                </a>
                @php
                $category_lists = DB::table('categories')->where('status', 'active')->limit(10)->get();
                @endphp
                @if ($category_lists)
                @foreach ($category_lists as $cat)
                @if ($cat->is_parent == 1)
                <a href="{{ route('product-cat', $cat->slug) }}" class="w-10 me-5" style="color: rgb(108, 113, 120);">
                    {{ $cat->title }}
                </a>
                @endif
                @endforeach
                @endif
                <a href="{{ route('kategoriyalar')}}" class="w-10 me-5" style="color: rgb(108, 113, 120);">
                    </span>Barcha kategoriyalar
                </a>
            </div>
        </div>
    </div>
</section>
<!-- <section> close ============================-->




<h2 class="mb-2">Nashrlar</h2>
@if (!empty($_GET['category']))
@php
$filter_cats = explode(',', $_GET['category']);
@endphp
@endif
<form action="{{ route('blog.filter') }}" method="POST">
    @csrf
    {{-- {{count(Helper::postCategoryList())}} --}}
    @foreach (Helper::postCategoryList('posts') as $cat)
    <a href="{{ route('blog.category', $cat->slug) }}" class="btn btn-sm btn-outline-info rounded-pill w-10 me-2"
        style="font-size: 12px; padding: 5px 10px;">{{ $cat->title }} </a>
    @endforeach
    <a href="{{ route('blog') }}" class="btn btn-sm btn-info rounded-pill w-10 me-2"
        style="font-size: 12px; padding: 5px 10px;">Barcha yangiliklar</a>
</form>



<section class="py-1 px-xl-3">
    <div class="container">
        <div class="mb-6">
            <div class="d-flex justify-content-between align-items-center mb-3">
                <h3>Kir yuvish mashinalari</h3>
                <a href="#!" class="fw-bold d-none d-md-block">Barchasini ko'rish</a>
            </div>
            <div class="swiper-theme-container products-slider">
                <div class="swiper swiper-container theme-slider"
                    data-swiper='{"slidesPerView":1,"spaceBetween":16,"breakpoints":{"450":{"slidesPerView":2,"spaceBetween":16},"576":{"slidesPerView":3,"spaceBetween":20},"768":{"slidesPerView":4,"spaceBetween":20},"992":{"slidesPerView":5,"spaceBetween":20},"1200":{"slidesPerView":6,"spaceBetween":16}}}'>
                    <div class="swiper-wrapper">
                        @php
                            $products = DB::table('products')
                                ->where('cat_id', 3)
                                ->where('child_cat_id', 18)
                                ->where('status', 'active')
                                ->get();
                        @endphp
                        @foreach($products as $product)
                            <div class="swiper-slide">
                                <div
                                    class="position-relative text-decoration-none product-card flex-grow-1 d-flex flex-column card-shadow rounded-6 p-3">
                                    @if ($product->is_featured)
                                        <div class="badge bg-danger position-absolute top-0 start-0 m-3">Super narx</div>
                                    @endif
                                    <div class="d-flex flex-column justify-content-between flex-grow-1">
                                        <div>
                                            <div class="position-relative mb-3">
                                                <a href="{{ route('add-to-wishlist', $product->slug) }}"
                                                    class="btn rounded-circle p-0 d-flex flex-center btn-wish z-2 d-toggle-container btn-outline-primary"
                                                    data-bs-toggle="tooltip" data-bs-placement="top"
                                                    title="Tanlanganlar ro'yxatiga qo'shish">
                                                    <span class="fas fa-heart d-block-hover"></span>
                                                    <span class="far fa-heart d-none-hover"></span>
                                                </a>
                                                @php 
                                                    $photo = explode(',', $product->photo);
                                                @endphp
                                                <img class="img-fluid" src="{{ $photo[0] }}" alt="{{ $photo[0] }}" />
                                            </div>
                                            <div class="position-relative">
                                                <a class="stretched-link" style="text-decoration: none;"
                                                    href="{{ route('product-detail', $product->slug) }}">
                                                    <h6 class="mb-2 lh-sm line-clamp-3 product-name">{{ $product->title }}
                                                    </h6>
                                                </a>
                                            </div>
                                        </div>
                                        <div>
                                            <div class="installment-info text-muted">To'lov:
                                                <span
                                                    style="font-size: large; color: black;"><strong>{{ number_format((($product->price * 0.36) + $product->price) / 12, 0, '', ' ') }}</strong></span>
                                                so'm/oyiga
                                            </div>
                                            <hr>
                                            <div class="d-flex justify-content-between align-items-center mb-3">
                                                <h4 class="price text-body-emphasis mb-0">
                                                    {{ number_format($product->price, 0, '', ' ') }} so'm
                                                </h4>
                                                <a class="btn btn-outline-primary mt-2"
                                                    href="{{ route('add-to-cart', $product->slug) }}"><i
                                                        class="fas fa-shopping-cart me-1"></i></a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                    <div class="swiper-nav">
                        <div class="swiper-button-next">
                            <span class="fas fa-chevron-right nav-icon"></span>
                        </div>
                        <div class="swiper-button-prev">
                            <span class="fas fa-chevron-left nav-icon"></span>
                        </div>
                    </div>
                </div>
            </div>
            <a href="#!" class="fw-bold d-md-none">Explore more <span class="fas fa-chevron-right fs-9 ms-1"></span></a>
        </div>
    </div>
</section>



<!-- <section class="py-1 px-xl-3">
    <div class="container">
        <div class="d-flex justify-content-between mb-3">
            <h3>Ommabop kategoriyalar</h3>
            <a class="fw-bold d-none d-md-block" href="{{ route('kategoriyalar')}}" style="text-decoration: none;">
                Barcha kategoriyalar
            </a>
        </div>
        <div class="row g-6">
            @php
                $category_lists = DB::table('categories')->where('status', 'active')->limit(7)->get();
            @endphp
            @if ($category_lists)
                @foreach ($category_lists as $cat)
                    @if ($cat->is_parent == 1)
                        <div class="col-sm-4 col-md-3 col-lg-2">
                            <a class="category-link" href="{{ route('product-cat', $cat->slug) }}">
                                <div class="category-card">
                                    <div class="card-body">
                                        <div class="row g-2 align-items-center">
                                            <div class="col-auto me-2">
                                                <div class="image-container">
                                                    <img src="{{ asset($cat->photo) }}" alt="{{ $cat->title }}">
                                                </div>
                                            </div>
                                            <div class="col-sm-auto flex-1">
                                                <h5>{{ $cat->title }}</h5>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </a>
                        </div>
                    @endif
                @endforeach
            @endif
        </div>
    </div>
</section>
<br> -->

















++++++++++++++++++++++++++++++++



<section class="py-1 px-xl-3">
    <div class="container">
        <div class="mb-6">
            <div class="d-flex justify-content-between align-items-center mb-3">
                <h3>Super narx</h3>
            </div>
            <div class="swiper-theme-container products-slider">
                <div class="swiper swiper-container theme-slider"
                    data-swiper='{"slidesPerView":1,"spaceBetween":16,"breakpoints":{"450":{"slidesPerView":2,"spaceBetween":16},"576":{"slidesPerView":3,"spaceBetween":20},"768":{"slidesPerView":4,"spaceBetween":20},"992":{"slidesPerView":5,"spaceBetween":20},"1200":{"slidesPerView":6,"spaceBetween":16}}}'>
                    <div class="swiper-wrapper">
                        @if($featured)
                            @foreach($featured as $data)
                                <div class="swiper-slide">
                                    <div
                                        class="position-relative text-decoration-none product-card flex-grow-1 d-flex flex-column card-shadow rounded-6 p-3">
                                        <div class="badge bg-danger position-absolute top-0 start-0 m-3">Super narx</div>
                                        <div class="d-flex flex-column justify-content-between flex-grow-1">
                                            <div>
                                                <div class="position-relative mb-3">
                                                    <a href="{{route('add-to-wishlist', $data->slug)}}"
                                                        class="btn rounded-circle p-0 d-flex flex-center btn-wish z-2 d-toggle-container btn-outline-primary"
                                                        data-bs-toggle="tooltip" data-bs-placement="top"
                                                        title="Tanlanganlar ro'yxatiga qo'shish">
                                                        <span class="fas fa-heart d-block-hover"></span>
                                                        <span class="far fa-heart d-none-hover"></span>
                                                    </a>
                                                    @php 
                                                        $photo = explode(',', $data->photo);
                                                    @endphp
                                                    <img class="img-fluid" src="{{ $photo[0] }}" alt="{{ $photo[0] }}" />
                                                </div>
                                                <div class="position-relative">
                                                    <a class="stretched-link" style="text-decoration: none;"
                                                        href="{{ route('product-detail', $data->slug) }}">
                                                        <h6 class="mb-2 lh-sm line-clamp-3 product-name">{{ $data->title }}</h6>
                                                    </a>
                                                </div>
                                            </div>
                                            <div>
                                                <div class="installment-info text-muted">To'lov:
                                                    <span
                                                        style="font-size: large; color: black;"><strong>{{ number_format((($data->price * 0.36) + $data->price) / 12, 0, '', ' ') }}</strong></span>
                                                    so'm/oyiga
                                                </div>
                                                <hr>
                                                <div class="d-flex justify-content-between align-items-center mb-3">
                                                    <h4 class="text-body-emphasis mb-0">
                                                        {{ number_format($data->price, 0, '', ' ') }} so'm
                                                    </h4>
                                                    <a class="btn btn-outline-primary mt-2"
                                                        href="{{route('add-to-cart', $data->slug)}}"><i
                                                            class="fas fa-shopping-cart me-1"></i></a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        @endif
                    </div>

                    <!-- Navigation arrows -->
                    <div class="swiper-nav">
                        <div class="swiper-button-next">
                            <span class="fas fa-chevron-right nav-icon"></span>
                        </div>
                        <div class="swiper-button-prev">
                            <span class="fas fa-chevron-left nav-icon"></span>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Explore more link for smaller screens -->
            <a href="#!" class="fw-bold d-md-none">Explore more <span class="fas fa-chevron-right fs-9 ms-1"></span></a>
        </div>
    </div>
</section>

<section class="py-1 px-xl-3">
    <div class="container">
        <div class="mb-6">
            <div class="text-start mb-3">
                <h3 class="mb-3">Elektronika</h3>
                @php
                    $parent_categories = DB::table('categories')
                        ->where('status', 'active')
                        ->where('is_parent', 1)
                        ->where('id', 1)
                        ->get();
                    $child_categories = DB::table('categories')
                        ->where('status', 'active')
                        ->where('is_parent', 0)
                        ->get()
                        ->groupBy('parent_id');
                @endphp
                @if ($parent_categories)
                    @foreach ($parent_categories as $parent_cat)
                        @if (isset($child_categories[$parent_cat->id]))
                            @foreach ($child_categories[$parent_cat->id] as $child_cat)
                                <a href="{{ route('product-sub-cat', ['slug' => $parent_cat->slug, 'sub_slug' => $child_cat->slug]) }}"
                                    class="btn btn-sm btn-outline-info rounded-pill w-10 me-2"
                                    style="font-size: 14px; padding: 5px 10px;">Barcha {{ $child_cat->title }}lar
                                </a>
                            @endforeach
                        @endif
                    @endforeach
                @endif
                <a href="{{ route('product-sub-cat', ['slug' => $parent_cat->slug, 'sub_slug' => $child_cat->slug]) }}"
                    class="btn btn-sm btn-primary rounded-pill w-10 me-2" style="font-size: 14px; padding: 5px 10px;">
                    Barcha elektronikalar
                </a>
            </div>
            <div class="swiper-theme-container products-slider">
                <div class="swiper swiper-container theme-slider"
                    data-swiper='{"slidesPerView":1,"spaceBetween":16,"breakpoints":{"450":{"slidesPerView":2,"spaceBetween":16},"576":{"slidesPerView":3,"spaceBetween":20},"768":{"slidesPerView":4,"spaceBetween":20},"992":{"slidesPerView":5,"spaceBetween":20},"1200":{"slidesPerView":6,"spaceBetween":16}}}'>
                    <div class="swiper-wrapper">
                        @php
                            $products = DB::table('products')
                                ->where('cat_id', 1)
                                ->where('status', 'active')
                                ->get();
                        @endphp
                        @foreach($products as $product)
                            <div class="swiper-slide">
                                <div
                                    class="position-relative text-decoration-none product-card flex-grow-1 d-flex flex-column card-shadow rounded-6 p-3">
                                    @if ($product->is_featured)
                                        <div class="badge bg-danger position-absolute top-0 start-0 m-3">Super narx</div>
                                    @endif
                                    <div class="d-flex flex-column justify-content-between flex-grow-1">
                                        <div>
                                            <div class="position-relative mb-3">
                                                <a href="{{ route('add-to-wishlist', $product->slug) }}"
                                                    class="btn rounded-circle p-0 d-flex flex-center btn-wish z-2 d-toggle-container btn-outline-primary"
                                                    data-bs-toggle="tooltip" data-bs-placement="top"
                                                    title="Tanlanganlar ro'yxatiga qo'shish">
                                                    <span class="fas fa-heart d-block-hover"></span>
                                                    <span class="far fa-heart d-none-hover"></span>
                                                </a>
                                                @php 
                                                    $photo = explode(',', $product->photo);
                                                @endphp
                                                <img class="img-fluid" src="{{ $photo[0] }}" alt="{{ $photo[0] }}" />
                                            </div>
                                            <div class="position-relative">
                                                <a class="stretched-link" style="text-decoration: none;"
                                                    href="{{ route('product-detail', $product->slug) }}">
                                                    <h6 class="mb-2 lh-sm line-clamp-3 product-name">{{ $product->title }}
                                                    </h6>
                                                </a>
                                            </div>
                                        </div>
                                        <div>
                                            <div class="installment-info text-muted">To'lov:
                                                <span
                                                    style="font-size: large; color: black;"><strong>{{ number_format((($product->price * 0.36) + $product->price) / 12, 0, '', ' ') }}</strong></span>
                                                so'm/oyiga
                                            </div>
                                            <hr>
                                            <div class="d-flex justify-content-between align-items-center mb-3">
                                                <h4 class="price text-body-emphasis mb-0">
                                                    {{ number_format($product->price, 0, '', ' ') }} so'm
                                                </h4>
                                                <a class="btn btn-outline-primary mt-2"
                                                    href="{{ route('add-to-cart', $product->slug) }}"><i
                                                        class="fas fa-shopping-cart me-1"></i></a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                    <div class="swiper-nav">
                        <div class="swiper-button-next"><span class="fas fa-chevron-right nav-icon"></span></div>
                        <div class="swiper-button-prev"><span class="fas fa-chevron-left nav-icon"></span></div>
                    </div>
                </div>
            </div>
            <a href="#!" class="fw-bold d-md-none">Explore more <span class="fas fa-chevron-right fs-9 ms-1"></span></a>
        </div>
    </div>
</section>
<section class="py-1 px-xl-3">
    <div class="container">
        <div class="mb-6">
            <div class="text-start mb-3">
                <h3 class="mb-3">Maishiy texnika</h3>
                @php
                    $parent_categories = DB::table('categories')
                        ->where('status', 'active')
                        ->where('is_parent', 1)
                        ->where('id', 3)
                        ->get();
                    $child_categories = DB::table('categories')
                        ->where('status', 'active')
                        ->where('is_parent', 0)
                        ->get()
                        ->groupBy('parent_id');
                @endphp
                @if ($parent_categories)
                    @foreach ($parent_categories as $parent_cat)
                        @if (isset($child_categories[$parent_cat->id]))
                            @foreach ($child_categories[$parent_cat->id] as $child_cat)
                                <a href="{{ route('product-sub-cat', ['slug' => $parent_cat->slug, 'sub_slug' => $child_cat->slug]) }}"
                                    class="btn btn-sm btn-outline-info rounded-pill w-10 me-2"
                                    style="font-size: 14px; padding: 5px 10px;">Barcha {{ $child_cat->title }}lar
                                </a>
                            @endforeach
                        @endif
                    @endforeach
                @endif
                <a href="{{ route('product-sub-cat', ['slug' => $parent_cat->slug, 'sub_slug' => $child_cat->slug]) }}"
                    class="btn btn-sm btn-primary rounded-pill w-10 me-2" style="font-size: 14px; padding: 5px 10px;">
                    Barcha maishiy texnikalar
                </a>
            </div>
            <div class="swiper-theme-container products-slider">
                <div class="swiper swiper-container theme-slider"
                    data-swiper='{"slidesPerView":1,"spaceBetween":16,"breakpoints":{"450":{"slidesPerView":2,"spaceBetween":16},"576":{"slidesPerView":3,"spaceBetween":20},"768":{"slidesPerView":4,"spaceBetween":20},"992":{"slidesPerView":5,"spaceBetween":20},"1200":{"slidesPerView":6,"spaceBetween":16}}}'>
                    <div class="swiper-wrapper">
                        @php
                            $products = DB::table('products')
                                ->where('cat_id', 3)
                                ->where('status', 'active')
                                ->get();
                        @endphp
                        @foreach($products as $product)
                            <div class="swiper-slide">
                                <div
                                    class="position-relative text-decoration-none product-card flex-grow-1 d-flex flex-column card-shadow rounded-6 p-3">
                                    @if ($product->is_featured)
                                        <div class="badge bg-danger position-absolute top-0 start-0 m-3">Super narx</div>
                                    @endif
                                    <div class="d-flex flex-column justify-content-between flex-grow-1">
                                        <div>
                                            <div class="position-relative mb-3">
                                                <a href="{{ route('add-to-wishlist', $product->slug) }}"
                                                    class="btn rounded-circle p-0 d-flex flex-center btn-wish z-2 d-toggle-container btn-outline-primary"
                                                    data-bs-toggle="tooltip" data-bs-placement="top"
                                                    title="Tanlanganlar ro'yxatiga qo'shish">
                                                    <span class="fas fa-heart d-block-hover"></span>
                                                    <span class="far fa-heart d-none-hover"></span>
                                                </a>
                                                @php 
                                                    $photo = explode(',', $product->photo);
                                                @endphp
                                                <img class="img-fluid" src="{{ $photo[0] }}" alt="{{ $photo[0] }}" />
                                            </div>
                                            <div class="position-relative">
                                                <a class="stretched-link" style="text-decoration: none;"
                                                    href="{{ route('product-detail', $product->slug) }}">
                                                    <h6 class="mb-2 lh-sm line-clamp-3 product-name">{{ $product->title }}
                                                    </h6>
                                                </a>
                                            </div>
                                        </div>
                                        <div>
                                            <div class="installment-info text-muted">To'lov:
                                                <span
                                                    style="font-size: large; color: black;"><strong>{{ number_format((($product->price * 0.36) + $product->price) / 12, 0, '', ' ') }}</strong></span>
                                                so'm/oyiga
                                            </div>
                                            <hr>
                                            <div class="d-flex justify-content-between align-items-center mb-3">
                                                <h4 class="price text-body-emphasis mb-0">
                                                    {{ number_format($product->price, 0, '', ' ') }} so'm
                                                </h4>
                                                <a class="btn btn-outline-primary mt-2"
                                                    href="{{ route('add-to-cart', $product->slug) }}"><i
                                                        class="fas fa-shopping-cart me-1"></i></a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                    <div class="swiper-nav">
                        <div class="swiper-button-next"><span class="fas fa-chevron-right nav-icon"></span></div>
                        <div class="swiper-button-prev"><span class="fas fa-chevron-left nav-icon"></span></div>
                    </div>
                </div>
            </div>
            <a href="#!" class="fw-bold d-md-none">Explore more <span class="fas fa-chevron-right fs-9 ms-1"></span></a>
        </div>
    </div>
</section>

<section class="py-1 px-xl-3">
    <div class="container">
        <div class="mb-6">
            <div class="text-start mb-3">
                <h3 class="mb-3">Mebellar</h3>
                @php
                    $parent_categories = DB::table('categories')
                        ->where('status', 'active')
                        ->where('is_parent', 1)
                        ->where('id', 4)
                        ->get();
                    $child_categories = DB::table('categories')
                        ->where('status', 'active')
                        ->where('is_parent', 0)
                        ->get()
                        ->groupBy('parent_id');
                @endphp
                @if ($parent_categories)
                    @foreach ($parent_categories as $parent_cat)
                        @if (isset($child_categories[$parent_cat->id]))
                            @foreach ($child_categories[$parent_cat->id] as $child_cat)
                                <a href="{{ route('product-sub-cat', ['slug' => $parent_cat->slug, 'sub_slug' => $child_cat->slug]) }}"
                                    class="btn btn-sm btn-outline-info rounded-pill w-10 me-2"
                                    style="font-size: 14px; padding: 5px 10px;">Barcha {{ $child_cat->title }}lar
                                </a>
                            @endforeach
                        @endif
                    @endforeach
                @endif
                <a href="{{ route('product-sub-cat', ['slug' => $parent_cat->slug, 'sub_slug' => $child_cat->slug]) }}"
                    class="btn btn-sm btn-primary rounded-pill w-10 me-2" style="font-size: 14px; padding: 5px 10px;">
                    Barcha mebellar
                </a>
            </div>
            <div class="swiper-theme-container products-slider">
                <div class="swiper swiper-container theme-slider"
                    data-swiper='{"slidesPerView":1,"spaceBetween":16,"breakpoints":{"450":{"slidesPerView":2,"spaceBetween":16},"576":{"slidesPerView":3,"spaceBetween":20},"768":{"slidesPerView":4,"spaceBetween":20},"992":{"slidesPerView":5,"spaceBetween":20},"1200":{"slidesPerView":6,"spaceBetween":16}}}'>
                    <div class="swiper-wrapper">
                        @php
                            $products = DB::table('products')
                                ->where('cat_id', 4)
                                ->where('status', 'active')
                                ->get();
                        @endphp
                        @foreach($products as $product)
                            <div class="swiper-slide">
                                <div
                                    class="position-relative text-decoration-none product-card flex-grow-1 d-flex flex-column card-shadow rounded-6 p-3">
                                    @if ($product->is_featured)
                                        <div class="badge bg-danger position-absolute top-0 start-0 m-3">Super narx</div>
                                    @endif
                                    <div class="d-flex flex-column justify-content-between flex-grow-1">
                                        <div>
                                            <div class="position-relative mb-3">
                                                <a href="{{ route('add-to-wishlist', $product->slug) }}"
                                                    class="btn rounded-circle p-0 d-flex flex-center btn-wish z-2 d-toggle-container btn-outline-primary"
                                                    data-bs-toggle="tooltip" data-bs-placement="top"
                                                    title="Tanlanganlar ro'yxatiga qo'shish">
                                                    <span class="fas fa-heart d-block-hover"></span>
                                                    <span class="far fa-heart d-none-hover"></span>
                                                </a>
                                                @php 
                                                    $photo = explode(',', $product->photo);
                                                @endphp
                                                <img class="img-fluid" src="{{ $photo[0] }}" alt="{{ $photo[0] }}" />
                                            </div>
                                            <div class="position-relative">
                                                <a class="stretched-link" style="text-decoration: none;"
                                                    href="{{ route('product-detail', $product->slug) }}">
                                                    <h6 class="mb-2 lh-sm line-clamp-3 product-name">{{ $product->title }}
                                                    </h6>
                                                </a>
                                            </div>
                                        </div>
                                        <div>
                                            <div class="installment-info text-muted">To'lov:
                                                <span
                                                    style="font-size: large; color: black;"><strong>{{ number_format((($product->price * 0.36) + $product->price) / 12, 0, '', ' ') }}</strong></span>
                                                so'm/oyiga
                                            </div>
                                            <hr>
                                            <div class="d-flex justify-content-between align-items-center mb-3">
                                                <h4 class="price text-body-emphasis mb-0">
                                                    {{ number_format($product->price, 0, '', ' ') }} so'm
                                                </h4>
                                                <a class="btn btn-outline-primary mt-2"
                                                    href="{{ route('add-to-cart', $product->slug) }}"><i
                                                        class="fas fa-shopping-cart me-1"></i></a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                    <div class="swiper-nav">
                        <div class="swiper-button-next"><span class="fas fa-chevron-right nav-icon"></span></div>
                        <div class="swiper-button-prev"><span class="fas fa-chevron-left nav-icon"></span></div>
                    </div>
                </div>
            </div>
            <a href="#!" class="fw-bold d-md-none">Explore more <span class="fas fa-chevron-right fs-9 ms-1"></span></a>
        </div>
    </div>
</section>

<section class="py-1 px-xl-3">
    <div class="container">
        <div class="mb-6">
            <div class="text-start mb-3">
                <h3 class="mb-3">Uy uchun</h3>
                @php
                    $parent_categories = DB::table('categories')
                        ->where('status', 'active')
                        ->where('is_parent', 1)
                        ->where('id', 12)
                        ->get();
                    $child_categories = DB::table('categories')
                        ->where('status', 'active')
                        ->where('is_parent', 0)
                        ->get()
                        ->groupBy('parent_id');
                @endphp
                @if ($parent_categories)
                    @foreach ($parent_categories as $parent_cat)
                        @if (isset($child_categories[$parent_cat->id]))
                            @foreach ($child_categories[$parent_cat->id] as $child_cat)
                                <a href="{{ route('product-sub-cat', ['slug' => $parent_cat->slug, 'sub_slug' => $child_cat->slug]) }}"
                                    class="btn btn-sm btn-outline-info rounded-pill w-10 me-2"
                                    style="font-size: 14px; padding: 5px 10px;">Barcha {{ $child_cat->title }}lar
                                </a>
                            @endforeach
                        @endif
                    @endforeach
                @endif
                <a href="{{ route('product-sub-cat', ['slug' => $parent_cat->slug, 'sub_slug' => $child_cat->slug]) }}"
                    class="btn btn-sm btn-primary rounded-pill w-10 me-2" style="font-size: 14px; padding: 5px 10px;">
                    Barcha uy jihozlari
                </a>
            </div>
            <div class="swiper-theme-container products-slider">
                <div class="swiper swiper-container theme-slider"
                    data-swiper='{"slidesPerView":1,"spaceBetween":16,"breakpoints":{"450":{"slidesPerView":2,"spaceBetween":16},"576":{"slidesPerView":3,"spaceBetween":20},"768":{"slidesPerView":4,"spaceBetween":20},"992":{"slidesPerView":5,"spaceBetween":20},"1200":{"slidesPerView":6,"spaceBetween":16}}}'>
                    <div class="swiper-wrapper">
                        @php
                            $products = DB::table('products')
                                ->where('cat_id', 12)
                                ->where('status', 'active')
                                ->get();
                        @endphp
                        @foreach($products as $product)
                            <div class="swiper-slide">
                                <div
                                    class="position-relative text-decoration-none product-card flex-grow-1 d-flex flex-column card-shadow rounded-6 p-3">
                                    @if ($product->is_featured)
                                        <div class="badge bg-danger position-absolute top-0 start-0 m-3">Super narx</div>
                                    @endif
                                    <div class="d-flex flex-column justify-content-between flex-grow-1">
                                        <div>
                                            <div class="position-relative mb-3">
                                                <a href="{{ route('add-to-wishlist', $product->slug) }}"
                                                    class="btn rounded-circle p-0 d-flex flex-center btn-wish z-2 d-toggle-container btn-outline-primary"
                                                    data-bs-toggle="tooltip" data-bs-placement="top"
                                                    title="Tanlanganlar ro'yxatiga qo'shish">
                                                    <span class="fas fa-heart d-block-hover"></span>
                                                    <span class="far fa-heart d-none-hover"></span>
                                                </a>
                                                @php 
                                                    $photo = explode(',', $product->photo);
                                                @endphp
                                                <img class="img-fluid" src="{{ $photo[0] }}" alt="{{ $photo[0] }}" />
                                            </div>
                                            <div class="position-relative">
                                                <a class="stretched-link" style="text-decoration: none;"
                                                    href="{{ route('product-detail', $product->slug) }}">
                                                    <h6 class="mb-2 lh-sm line-clamp-3 product-name">{{ $product->title }}
                                                    </h6>
                                                </a>
                                            </div>
                                        </div>
                                        <div>
                                            <div class="installment-info text-muted">To'lov:
                                                <span
                                                    style="font-size: large; color: black;"><strong>{{ number_format((($product->price * 0.36) + $product->price) / 12, 0, '', ' ') }}</strong></span>
                                                so'm/oyiga
                                            </div>
                                            <hr>
                                            <div class="d-flex justify-content-between align-items-center mb-3">
                                                <h4 class="price text-body-emphasis mb-0">
                                                    {{ number_format($product->price, 0, '', ' ') }} so'm
                                                </h4>
                                                <a class="btn btn-outline-primary mt-2"
                                                    href="{{ route('add-to-cart', $product->slug) }}"><i
                                                        class="fas fa-shopping-cart me-1"></i></a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                    <div class="swiper-nav">
                        <div class="swiper-button-next"><span class="fas fa-chevron-right nav-icon"></span></div>
                        <div class="swiper-button-prev"><span class="fas fa-chevron-left nav-icon"></span></div>
                    </div>
                </div>
            </div>
            <a href="#!" class="fw-bold d-md-none">Explore more <span class="fas fa-chevron-right fs-9 ms-1"></span></a>
        </div>
    </div>
</section>

<section class="py-1 px-xl-3">
    <div class="container">
        <div class="mb-6">
            <div class="text-start mb-3">
                <h3 class="mb-3">Avtomobil jihozlari</h3>
                @php
                    $parent_categories = DB::table('categories')
                        ->where('status', 'active')
                        ->where('is_parent', 5)
                        ->where('id', 5)
                        ->get();
                    $child_categories = DB::table('categories')
                        ->where('status', 'active')
                        ->where('is_parent', 0)
                        ->get()
                        ->groupBy('parent_id');
                @endphp
                @if ($parent_categories)
                    @foreach ($parent_categories as $parent_cat)
                        @if (isset($child_categories[$parent_cat->id]))
                            @foreach ($child_categories[$parent_cat->id] as $child_cat)
                                <a href="{{ route('product-sub-cat', ['slug' => $parent_cat->slug, 'sub_slug' => $child_cat->slug]) }}"
                                    class="btn btn-sm btn-outline-info rounded-pill w-10 me-2"
                                    style="font-size: 14px; padding: 5px 10px;">Barcha {{ $child_cat->title }}lar
                                </a>
                            @endforeach
                        @endif
                    @endforeach
                @endif
                <a href="{{ route('product-sub-cat', ['slug' => $parent_cat->slug, 'sub_slug' => $child_cat->slug]) }}"
                    class="btn btn-sm btn-primary rounded-pill w-10 me-2" style="font-size: 14px; padding: 5px 10px;">
                    Barcha avtomobil jihozlari
                </a>
            </div>
            <div class="swiper-theme-container products-slider">
                <div class="swiper swiper-container theme-slider"
                    data-swiper='{"slidesPerView":1,"spaceBetween":16,"breakpoints":{"450":{"slidesPerView":2,"spaceBetween":16},"576":{"slidesPerView":3,"spaceBetween":20},"768":{"slidesPerView":4,"spaceBetween":20},"992":{"slidesPerView":5,"spaceBetween":20},"1200":{"slidesPerView":6,"spaceBetween":16}}}'>
                    <div class="swiper-wrapper">
                        @php
                            $products = DB::table('products')
                                ->where('cat_id', 5)
                                ->where('status', 'active')
                                ->get();
                        @endphp
                        @foreach($products as $product)
                            <div class="swiper-slide">
                                <div
                                    class="position-relative text-decoration-none product-card flex-grow-1 d-flex flex-column card-shadow rounded-6 p-3">
                                    @if ($product->is_featured)
                                        <div class="badge bg-danger position-absolute top-0 start-0 m-3">Super narx</div>
                                    @endif
                                    <div class="d-flex flex-column justify-content-between flex-grow-1">
                                        <div>
                                            <div class="position-relative mb-3">
                                                <a href="{{ route('add-to-wishlist', $product->slug) }}"
                                                    class="btn rounded-circle p-0 d-flex flex-center btn-wish z-2 d-toggle-container btn-outline-primary"
                                                    data-bs-toggle="tooltip" data-bs-placement="top"
                                                    title="Tanlanganlar ro'yxatiga qo'shish">
                                                    <span class="fas fa-heart d-block-hover"></span>
                                                    <span class="far fa-heart d-none-hover"></span>
                                                </a>
                                                @php 
                                                    $photo = explode(',', $product->photo);
                                                @endphp
                                                <img class="img-fluid" src="{{ $photo[0] }}" alt="{{ $photo[0] }}" />
                                            </div>
                                            <div class="position-relative">
                                                <a class="stretched-link" style="text-decoration: none;"
                                                    href="{{ route('product-detail', $product->slug) }}">
                                                    <h6 class="mb-2 lh-sm line-clamp-3 product-name">{{ $product->title }}
                                                    </h6>
                                                </a>
                                            </div>
                                        </div>
                                        <div>
                                            <div class="installment-info text-muted">To'lov:
                                                <span
                                                    style="font-size: large; color: black;"><strong>{{ number_format((($product->price * 0.36) + $product->price) / 12, 0, '', ' ') }}</strong></span>
                                                so'm/oyiga
                                            </div>
                                            <hr>
                                            <div class="d-flex justify-content-between align-items-center mb-3">
                                                <h4 class="price text-body-emphasis mb-0">
                                                    {{ number_format($product->price, 0, '', ' ') }} so'm
                                                </h4>
                                                <a class="btn btn-outline-primary mt-2"
                                                    href="{{ route('add-to-cart', $product->slug) }}"><i
                                                        class="fas fa-shopping-cart me-1"></i></a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                    <div class="swiper-nav">
                        <div class="swiper-button-next"><span class="fas fa-chevron-right nav-icon"></span></div>
                        <div class="swiper-button-prev"><span class="fas fa-chevron-left nav-icon"></span></div>
                    </div>
                </div>
            </div>
            <a href="#!" class="fw-bold d-md-none">Explore more <span class="fas fa-chevron-right fs-9 ms-1"></span></a>
        </div>
    </div>
</section>



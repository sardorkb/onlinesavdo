@extends('frontend.layouts.master')
@section('title', 'Savatdagi mahsulotlar | Baraka Development')
@section('main-content')
<!-- Breadcrumbs -->
<section>
    <div class="container">
        <div class="col-auto">
            <nav class="mb-2" aria-label="breadcrumb">
                <ol class="breadcrumb mb-0">
                    <li class="breadcrumb-item"><a href="{{ route('home') }}">Bosh sahifa</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Savat</li>
                </ol>
            </nav>
        </div>
    </div>
</section>
<!-- End Breadcrumbs -->

<!-- ============================================-->
<!-- <section> begin ============================-->
<section class="pt-5 pb-9">

    <div class="container cart">
        <div class="row g-5">
            <div class="col-12 col-lg-8">
                <div id="cartTable"
                    data-list='{"valueNames":["products","color","size","price","quantity","total"],"page":10}'>
                    <div class="table-responsive scrollbar mx-n1 px-1">
                        <table class="table fs-9 mb-0 border-top border-translucent">
                            <thead>
                                <tr>
                                    <th class="sort white-space-nowrap align-middle" scope="col"
                                        >Mahsulotlar</th>
                                    <th class="sort align-middle" scope="col" style="width:80px;">Nomi</th>
                                    <th class="sort align-middle text-end" scope="col" style="width:300px;">Narxi</th>
                                    <th class="sort align-middle ps-5" scope="col" style="width:200px;">Soni</th>
                                    <th class="sort align-middle text-end" scope="col" style="width:250px;">Jami</th>
                                    <th class="sort text-end align-middle pe-0" scope="col"></th>
                                </tr>
                            </thead>
                            <tbody class="list" id="cart-table-body">
                                <form action="{{route('cart.update')}}" method="POST">
                                    @csrf
                                    @foreach(Helper::getAllProductFromCart() as $key => $cart)
                                                                        <tr class="cart-table-row btn-reveal-trigger">
                                                                            @php
                                                                                $photo = explode(',', $cart->product['photo']);
                                                                            @endphp
                                                                            <td class="align-middle py-0"><a
                                                                                    class="d-block border border-translucent rounded-2"
                                                                                    href="{{route('product-detail', $cart->product['slug'])}}"><img
                                                                                        src="{{$photo[0]}}" alt="{{$photo[0]}}" width="53" /></a>
                                                                            </td>
                                                                            <td class="products align-middle"><a class="fw-semibold mb-0 line-clamp-2"
                                                                                    href="{{route('product-detail', $cart->product['slug'])}}">{{$cart->product['title']}}</a>
                                                                            </td>
                                                                            <td class="price align-middle text-body fs-9 fw-semibold text-end">
                                                                                {{number_format($cart['price'], 0, '', ' ')}} so'm
                                                                            </td>
                                                                            <td class="quantity align-middle fs-8 ps-5">
                                                                                <div class="input-group input-group-sm flex-nowrap"
                                                                                    data-quantity="data-quantity">
                                                                                    <button type="button" class="btn btn-sm px-2" data-type="minus"
                                                                                        disabled="disabled" data-field="quant[{{$key}}]">-</button>
                                                                                    <input
                                                                                        class="form-control text-center input-spin-none bg-transparent border-0 px-0"
                                                                                        type="text" name="quant[{{$key}}]" data-min="1" data-max="100"
                                                                                        value="{{$cart->quantity}}">
                                                                                    <input type="hidden" name="qty_id[]" value="{{$cart->id}}">
                                                                                    <button class="btn btn-sm px-2" data-type="plus"
                                                                                        data-field="quant[{{$key}}]">+</button>
                                                                                </div>
                                                                            </td>
                                                                            <td class="total align-middle fw-bold text-body-highlight text-end">
                                                                                {{$cart['amount']}} so'm
                                                                            </td>
                                                                            <td class="align-middle white-space-nowrap text-end pe-0 ps-3">
                                                                                <a class="btn btn-sm text-body-tertiary text-opacity-85 text-body-tertiary-hover me-2"
                                                                                    href="{{route('cart-delete', $cart->id)}}"><span
                                                                                        class="fas fa-trash"></span></a>
                                                                            </td>
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

                                    <tr class="cart-table-row btn-reveal-trigger">
                                        <td class="text-body-emphasis fw-semibold ps-0 fs-8" colspan="6">Jami summa :
                                        </td>
                                        <td class="text-body-emphasis fw-bold text-end fs-8"> so'm</td>
                                        <td></td>
                                    </tr>
                                </form>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <div class="col-12 col-lg-4">
                <div class="card">
                    <div class="card-body">
                        <div class="d-flex flex-between-center mb-3">
                            <h3 class="card-title mb-0">Qisqacha</h3>
                        </div>
                        <div>
                            <div class="d-flex justify-content-between">
                                <p class="text-body fw-semibold">Har bil mahsulotlar jami :</p>
                                <p class="text-body-emphasis fw-semibold">
                                    {{number_format(Helper::totalCartPrice(), 0, '', ' ')}} so'm
                                </p>
                            </div>
                            @if(session()->has('coupon'))
                                                        <div class="d-flex justify-content-between">
                                                            <p class="text-body fw-semibold">Discount :</p>
                                                            <p class="text-danger fw-semibold">
                                                                -${{number_format(Session::get('coupon')['value'], 0, '', ' ')}}</p>
                                                        </div>
                                                        @php
                                                            $total_amount = Helper::totalCartPrice() - Session::get('coupon')['value'];
                                                        @endphp
                            @else
                                                        @php
                                                            $total_amount = Helper::totalCartPrice();
                                                        @endphp
                            @endif
                            <div class="d-flex justify-content-between">
                                <p class="text-body fw-semibold">Jami :</p>
                                <p class="text-body-emphasis fw-semibold">{{number_format($total_amount, 0, '', ' ')}}
                                    so'm</p>
                            </div>
                        </div>
                        <div class="input-group mb-3">
                            <input class="form-control" type="text" name="code" placeholder="Enter Your Coupon" />
                            <button class="btn btn-phoenix-primary px-5" type="submit" formmethod="POST"
                                formaction="{{route('coupon-store')}}">Apply</button>
                        </div>
                        <div class="d-flex justify-content-between border-y border-dashed py-3 mb-4">
                            <h4 class="mb-0">Jami :</h4>
                            <h4 class="mb-0">{{number_format($total_amount, 0, '', ' ')}} so'm</h4>
                        </div>
                        <a href="{{route('checkout')}}" class="btn btn-primary w-100"
                            style="color: white;">Rasmiylashtirish<span
                                class="fas fa-chevron-right ms-1 fs-10"></span></a>
                        <a href="{{route('product-grids')}}" class="btn btn-outline-info w-100 mt-2">Mahsulotlar
                            ko'rishda davom etish</a>
                    </div>
                </div>
            </div>

        </div>
    </div>
    <!-- end of .container-->

</section>
<!-- <section> close ============================-->
<!-- ============================================-->

@endsection
@push('styles')
    <style>
        li.shipping {
            display: inline-flex;
            width: 100%;
            font-size: 14px;
        }

        li.shipping .input-group-icon {
            width: 100%;
            margin-left: 10px;
        }

        .input-group-icon .icon {
            position: absolute;
            left: 20px;
            top: 0;
            line-height: 40px;
            z-index: 3;
        }

        .form-select {
            height: 30px;
            width: 100%;
        }

        .form-select .nice-select {
            border: none;
            border-radius: 0px;
            height: 40px;
            background: #f6f6f6 !important;
            padding-left: 45px;
            padding-right: 40px;
            width: 100%;
        }

        .list li {
            margin-bottom: 0 !important;
        }

        .list li:hover {
            background: #F7941D !important;
            color: white !important;
        }

        .form-select .nice-select::after {
            top: 14px;
        }
    </style>
@endpush
@push('scripts')
    <script src="{{asset('frontend/js/nice-select/js/jquery.nice-select.min.js')}}"></script>
    <script src="{{ asset('frontend/js/select2/js/select2.min.js') }}"></script>
    <script>
        $(document).ready(function () { $("select.select2").select2(); });
        $('select.nice-select').niceSelect();
    </script>
    <script>
        $(document).ready(function () {
            $('.shipping select[name=shipping]').change(function () {
                let cost = parseFloat($(this).find('option:selected').data('price')) || 0;
                let subtotal = parseFloat($('.order_subtotal').data('price'));
                let coupon = parseFloat($('.coupon_price').data('price')) || 0;
                // alert(coupon);
                $('#order_total_price span').text('$' + (subtotal + cost - coupon).toFixed(2));
            });

        });

    </script>

@endpush
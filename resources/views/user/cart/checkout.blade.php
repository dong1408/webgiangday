@extends('layouts.main')

@section('main-content')
    <style>
        #carouselExampleIndicators {
            height: 400px !important;
        }

        .carousel-item img {
            height: 400px !important;
        }

        /* ************************************** */
        .breadcrumbs-wrapper {
            font-size: var(--thim-breacrumb-font-size, 1em);
            color: var(--thim-breacrumb-color, #666);
            background-color: var(--thim-breacrumb-bg-color, transparent);
            padding-bottom: 30px;
        }

        .breadcrumbs-wrapper #breadcrumbs {
            padding: 13px 0;
            margin: 0;
            border-bottom: 1px solid #adb5bd;
        }

        .separator::before {
            content: "❯";
            margin: 0px 8px 0px 0px;
            color: #999;
        }

        .breadcrumbs-wrapper #breadcrumbs li {
            line-height: 25px;
            display: inline-block;
            color: black;
            list-style: none;
        }

        .breadcrumbs-wrapper #breadcrumbs a {
            line-height: 25px;
            display: inline-block;
            color: var(--thim-breacrumb-color, #666);
            margin-right: 12px;
            text-decoration: none;
        }

        /* ************************************** */


        /* *************************************** */
        #customer-info-wp .section-title,
        #order-review-wp .section-title {
            position: relative;
            display: block;
            font-size: 21px;
            color: #272727;
            text-transform: uppercase;
            line-height: normal;
            padding-bottom: 15px;
            margin-bottom: 40px;
            border-bottom: 1px solid #ccc;
            text-align: left;
            /* font-family: 'Roboto Regular'; */
            font-weight: normal;
        }

        #customer-info-wp .section-title:before,
        #order-review-wp .section-title:before {
            position: absolute;
            content: '';
            bottom: -1px;
            width: 100px;
            height: 2px;
            background: #bf2424;
            left: 0px;
        }


        #order-review-wp .shop-table {
            width: 100%;
            text-align: left;
        }

        #order-review-wp .shop-table tr td:nth-child(2) {
            text-align: right;
        }

        #order-review-wp .shop-table thead tr {
            border-bottom: 1px solid #ddd;
        }

        #order-review-wp .shop-table thead tr td {
            text-transform: uppercase;
            padding-bottom: 15px;
            text-transform: uppercase;
            font-family: 'Roboto Medium';
        }

        #order-review-wp .shop-table tbody tr td {
            padding: 15px 0px;
            border-bottom: 1px solid #ddd;
            display: table-cell;
            vertical-align: middle;
        }

        #order-review-wp .shop-table tbody tr td .product-quantity {
            display: inline-block;
            padding-left: 10px;
            font-family: 'Roboto Medium';
            font-weight: normal;
            font-size: 13px;
        }

        #order-review-wp .shop-table tfoot tr td {
            padding: 15px 0px;
            text-transform: uppercase;
            font-family: 'Roboto Medium';
            font-weight: normal;
        }

        /* *************************************** */
    </style>

    <div class="container mt-5" style="margin-top: 70px!important">

        <div class="breadcrumbs-wrapper">
            <div class="container">
                <ul class="breadcrumbs" id="breadcrumbs">
                    <li><a href="{{ route('home') }}">Home</a><span class="separator"></span></li>
                    <li><a href="{{ route('cart.show') }}">Giỏ hàng</a><span class="separator"></span></li>
                    <li>Thanh toán</li>
                </ul>
            </div>
        </div>
        <div style="text-align:center; margin-bottom: 30px">
            <h1>Thanh toán</h1>
        </div>

        <div class="row">
            <!-- Cột Thông Tin Khách Hàng -->
            <div class="col-md-6">
                <div id="customer-info-wp" class="p-3 mb-3"
                    style="box-shadow: 12px -7px 5px rgba(0, 0, 0, 0.1); padding-left: 25px !important">
                    <div class="section-head">
                        <h1 class="section-title">Thông tin khách hàng</h1>
                    </div>
                    <div class="section-body">
                        <form id="checkout-form">
                            <div class="mb-3">
                                <label for="name" class="form-label">Họ và tên:</label>
                                <input type="text" id="name" class="form-control" placeholder="Nguyễn Văn A"
                                    required>
                            </div>
                            <div class="mb-3">
                                <label for="email" class="form-label">Email:</label>
                                <input type="email" id="email" class="form-control" placeholder="example@email.com"
                                    required>
                            </div>
                            <div class="mb-3">
                                <label for="address" class="form-label">Địa chỉ nhận hàng:</label>
                                <input type="text" id="address" class="form-control"
                                    placeholder="Số nhà, Đường, Phường, Quận, TP" required>
                            </div>
                        </form>
                    </div>
                </div>
            </div>

            <!-- Cột Thông Tin Đơn Hàng -->
            <div class="col-md-6">
                <div id="order-review-wp" class="section p-3 mb-3"
                    style="box-shadow: 12px -7px 5px rgba(0, 0, 0, 0.1); padding-left: 25px !important">
                    <div class="section-head">
                        <h1 class="section-title">Thông tin đơn hàng</h1>
                    </div>
                    <div class="section-body">
                        <table class="shop-table">
                            <thead>
                                <tr>
                                    <td>Sản phẩm</td>
                                    <td>Tổng</td>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($cart as $item)
                                    <tr class="cart-item">
                                        <td class="product-name">{{ $item['name'] }}<strong
                                                class="product-quantity">x1</strong>
                                        </td>
                                        <td class="product-total">{{ number_format($item['price'], 0, '.', '.') }}đ</td>
                                    </tr>
                                @endforeach
                            </tbody>
                            <tfoot>
                                <tr class="order-total">
                                    <td>Tổng đơn hàng:</td>
                                    <td><strong class="total-price">{{ number_format($cartInfo['total'], 0, '.', '.') }} vnđ</strong></td>
                                </tr>
                            </tfoot>
                        </table>
                    </div>
                    <!-- Chọn Phương Thức Thanh Toán -->
                    <div class="section-footer" style="margin-top: 20px">
                        <h6>Chọn phương thức thanh toán</h6>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="payment_method" id="cod"
                                value="cod" checked>
                            <label class="form-check-label" for="cod">Thanh toán khi nhận hàng (COD)</label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="payment_method" id="stripe"
                                value="stripe">
                            <label class="form-check-label" for="stripe">Thanh toán qua Momo</label>
                        </div>
                        <div class="text-center mt-4">
                            <button class="btn btn-primary w-100" onclick="submitOrder()">Xác nhận đặt hàng</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

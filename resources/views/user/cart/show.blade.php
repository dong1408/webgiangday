@extends('layouts.main')

@section('main-content')
    <style scoped>
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

        .cart-table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }

        .cart-table th,
        .cart-table td {
            padding: 10px;
            border-bottom: 1px solid #ddd;
            text-align: center;
        }

        .product-info {
            display: flex;
            align-items: center;
        }

        .product-info img {
            flex: 1;
            margin-right: 10px;
        }

        .product-info .product-details {
            flex: 2;
            line-height: 0.7;
            text-align: left;
        }

        .cart-summary {
            background: #f9f9f9;
            padding: 20px;
            margin-top: 60px;
            border-radius: 10px;
        }

        .cart-summary h3 {
            margin-bottom: 10px;
        }

        .cart-summary p {
            font-size: 18px;
        }

        .checkout-btn {
            background-color: #dfb128;
            border: none;
            padding: 15px;
            width: 100%;
            font-size: 18px;
            font-weight: bold;
            cursor: pointer;
            margin-top: 10px;
            border-radius: 10px;
        }

        .schedule {
            background: #f8f9fa;
            padding: 15px;
            border-radius: 8px;
        }
    </style>

    <div class="container mt-5" style="margin-top: 70px!important">
        {{-- <nav class="breadcrumb">
            <span>Home</span> > <span>Giỏ hàng</span>
        </nav>

        <div class="alert">
            ✅ Luyện thi Toán 6 theo yêu cầu đã được cho vào giỏ hàng.
        </div> --}}
        <div class="breadcrumbs-wrapper">
            <div class="container">
                <ul class="breadcrumbs" id="breadcrumbs">
                    <li><a href="{{ route('home') }}">Home</a><span class="separator"></span></li>
                    <li>Giỏ hàng</li>
                </ul>
            </div>
        </div>
        <div style="text-align:center">
            <h1>Giỏ hàng 🛒</h1>
        </div>
        <div class="row cart-content">
            <div class="col-md-9">
                <table class="cart-table">
                    <thead>
                        <tr>
                            <th style="width: 55%">Sản phẩm</th>
                            <th style="width: 15%">Giá</th>
                            <th style="width: 10%">Số lượng</th>
                            <th style="width: 15%">Tạm tính</th>
                            <th style="width: 5%"></th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($cart as $item)
                            <tr>
                                <td class="product-info">
                                    <img src="{{ $item['image_url'] }}" alt="Sách Toán 6" style="width: 163px; heigh:auto">
                                    <div class="product-details">
                                        <p><strong>{{ $item['name'] }}</strong></p>
                                        <p class="card-text">
                                            <strong>Loại: </strong>
                                            <span
                                                class="badge {{ $item['type'] == 'online' ? 'bg-success' : 'bg-secondary' }}">
                                                {{ $item['type'] == 'online' ? 'Online' : 'Offline' }}
                                            </span>
                                        </p>
                                        <p><strong>Thời gian:</strong> {{ date('d/m/Y', strtotime($item['start_date'])) }} -
                                            {{ date('d/m/Y', strtotime($item['end_date'])) }}</p>
                                        <div class="schedule">
                                            <p class="fw-bold">Lịch học trong tuần</p>
                                            @foreach ($item['schedules'] as $itemm)
                                                <p><strong>{{ $days[$itemm['day_of_week']] }}:
                                                    </strong>{{ \Carbon\Carbon::parse($itemm->start_time)->format('h:i A') }}
                                                    -
                                                    {{ \Carbon\Carbon::parse($itemm->end_time)->format('h:i A') }}</p>
                                            @endforeach
                                        </div>
                                </td>
                                <td class="product-price">₫100,000</td>
                                <td class="product-quantity">
                                    1
                                </td>
                                <td class="product-subtotal">₫100,000</td>
                                <td>
                                    <button class="btn btn-danger btn-sm remove-btn">Xóa</button>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
            <div class="col-md-3">
                <div class="cart-summary">
                    <h3>Cộng giỏ hàng</h3>
                    <p><strong>Tạm tính:</strong> ₫100,000</p>
                    <p><strong>Tổng:</strong> <span class="total-price">₫100,000</span></p>
                    <button class="checkout-btn"><a href="{{ route('cart.checkout') }}" style="color: white;text-decoration: none;">TIẾN HÀNH THANH TOÁN</a></button>
                    <p style="text-align: center; margin-bottom: 0px"><a href="{{ route('product.main') }}">Continute shopping</a></p>
                </div>
            </div>
        </div>
    </div>
@endsection

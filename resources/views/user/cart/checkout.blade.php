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
                                <input type="text" name="fullname" id="name" class="form-control"
                                    placeholder="Nguyễn Văn A" required>
                            </div>
                            <div class="mb-3">
                                <label for="email" class="form-label">Email:</label>
                                <input type="email" name="email" id="email" class="form-control"
                                    placeholder="example@email.com" required>
                            </div>
                            <div class="mb-3">
                                <label for="address" class="form-label">Địa chỉ nhận hàng:</label>
                                <input type="text" name="address" id="address" class="form-control"
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
                                    <td><strong class="total-price">{{ number_format($cartInfo['total'], 0, '.', '.') }}
                                            vnđ</strong></td>
                                </tr>
                            </tfoot>
                        </table>
                    </div>
                    <!-- Chọn Phương Thức Thanh Toán -->
                    <div class="section-footer" style="margin-top: 20px">
                        <h6>Chọn phương thức thanh toán</h6>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="payment_method" id="momo-payment"
                                value="momo" checked>
                            <label class="form-check-label" for="momo-payment">Thanh toán qua Momo</label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="payment_method" id="contact-payment"
                                value="cod">
                            <label class="form-check-label" for="contact-payment">Liên hệ trực tiếp người bán</label>
                        </div>
                        <!-- Thông tin người bán -->
                        <div id="sellerInfo" style="display: none; margin-top: 10px; border: 1px solid #ddd">
                            <div class="row" style="padding: 20px">
                                <div class="col-md-8">
                                    <p><strong>Người bán:</strong> Nguyễn Văn B</p>
                                    <p><strong>Zalo:</strong> 0123 456 789</p>
                                    <a href="https://zalo.me/0123456789" target="_blank">
                                        <button
                                            style="background: #0084ff; color: white; padding: 5px 10px; border: none; cursor: pointer; border-radius: 10px">
                                            Nhắn tin Zalo
                                        </button>
                                    </a>
                                </div>
                                <div class="col-md-4">
                                    <div>
                                        <img src="https://khangnguyenco.vn/pub/media/magefan_blog/ma-qr-code.jpg"
                                            style="width: 100%" alt="">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="text-center mt-4">
                            <button class="btn btn-primary w-100" style="display: none" id="paymentCod"
                                data-urlpayment={{ route('createCodPayment') }}>Xác nhận </button>
                            <button class="btn btn-primary w-100" id="paymentMomo"
                                data-urlpayment = "{{ route('createMomoPayment') }}">Thanh toán với
                                momo</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script>
        document.addEventListener("DOMContentLoaded", function() {
            // let contactOption = document.getElementById("contact-payment");
            // let momoOption = document.getElementById("momo-payment");
            // let sellerInfo = document.getElementById("sellerInfo");

            // function toggleSellerInfo() {
            //     if (contactOption.checked) {
            //         sellerInfo.style.display = "block";

            //     } else {
            //         sellerInfo.style.display = "none";
            //     }
            // }

            // contactOption.addEventListener("change", toggleSellerInfo);
            // momoOption.addEventListener("change", toggleSellerInfo);

            // toggleSellerInfo();
        });


        // Sự kiện click lựa chọn thanh toán 
        $('input[name="payment_method"]').change(function() {
            let sellerInfo = document.getElementById("sellerInfo");
            let btnPaymentCod = document.getElementById('paymentCod');
            let btnPaymentMomo = document.getElementById('paymentMomo');
            let paymentMethod = $(this).val();
            if (paymentMethod == 'momo') {
                sellerInfo.style.display = "none";
                btnPaymentMomo.style.display = 'block';
                btnPaymentCod.style.display = 'none';
            } else if (paymentMethod == 'cod') {
                sellerInfo.style.display = "block";
                btnPaymentMomo.style.display = 'none';
                btnPaymentCod.style.display = 'block';
            }
        });

        // Lựa chọn thanh toán liên hệ trực tiếp
        $('#paymentCod').click(function() {
            var urlCod = $(this).data('urlpayment');
            // Get form data
            const form = document.querySelector("#checkout-form");
            const formData = new FormData(form);
            // const paymentMethod = document.querySelector('input[name="payment_method"]:checked').value;
            // Convert FormData to object
            const data = {};
            formData.forEach((value, key) => {
                data[key] = value;
            });

            $.ajax({
                url: urlCod,
                method: 'POST',
                data: data,
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                success: function(response) {
                    // $("#loading").hide();
                    // if (response.success) {
                    //     window.location.href = '/checkout/success';
                    // } else {
                    //     window.location.href = '/';
                    // }
                },
            });
        });


        // Chọn thanh toán với momo
        $('#paymentMomo').click(function() {
            var urlMomo = $(this).data('urlpayment');
            // Get form data
            const form = document.querySelector("#checkout-form");
            const formData = new FormData(form);
            // const paymentMethod = document.querySelector('input[name="payment_method"]:checked').value;
            // Convert FormData to object
            const data = {};
            formData.forEach((value, key) => {
                data[key] = value;
            });
            $.ajax({
                url: urlMomo,
                method: 'POST',
                data: data,
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                success: function(response) {
                    // $("#loading").hide();
                    if (response && response.payUrl) {
                        window.location.href = response.payUrl;
                    } else {
                        toastr.error("Không thể tạo thanh toán momo");
                    }
                },
                error: function() {
                    toastr.error("Có lỗi xảy ra khi kết nối tới momo");
                }
            });
        });

        function submitOrder() {
            $("#loading").show();
            // Get form data
            const form = document.querySelector("#checkout-form");
            const formData = new FormData(form);
            const paymentMethod = document.querySelector('input[name="payment_method"]:checked').value;
            // Convert FormData to object
            const data = {};
            formData.forEach((value, key) => {
                data[key] = value;
            });
            data['paymentMethod'] = paymentMethod;

            $.ajax({
                url: '/cart/payment',
                method: 'POST',
                data: data,
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                success: function(response) {
                    $("#loading").hide();
                    setTimeout(() => {
                        if (response.success) {
                            window.location.href = '/checkout/success';
                        } else {
                            window.location.href = '/';
                        }
                    }, 100);
                },
                error: function(xhr) {
                    $("#loading").hide();
                    setTimeout(() => {
                        let errorData = JSON.parse(xhr.responseText);
                        alert(errorData.message);
                    }, 100);
                }
            });
        }
    </script>
@endsection

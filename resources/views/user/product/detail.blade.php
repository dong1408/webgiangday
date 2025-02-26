@extends('layouts.main')

@section('main-content')
    <div class="container mt-5" style="margin-top: 70px!important">
        <div class="breadcrumbs-wrapper">
            <div class="container">
                <ul class="breadcrumbs" id="breadcrumbs">
                    <li><a href="{{ route('home') }}">Home</a><span class="separator"></span></li>
                    <li>Chi tiết sản phẩm</li>
                </ul>
            </div>
        </div>
        <div class="product-detail">
            <div class="row g-4">
                <!-- Cột hình ảnh -->
                <div class="col-md-5">
                    <img src="{{ $course->image_url }}" class="img-fluid">
                </div>

                <!-- Cột thông tin sản phẩm -->
                <div class="col-md-7">
                    <h1 class="product-title">{{ $course->name }}</h1>
                    <p class="product-price">đ{{ number_format($course->price, 0, '.', '.') }}</p>
                    <p class="product-description">{{ $course->short_desc }}</p>

                    <div class="mb-3">
                        <p><strong>Thời gian: </strong> {{ date('d/m/Y', strtotime($course->start_date)) }} -
                            {{ date('d/m/Y', strtotime($course->end_date)) }}</p>
                    </div>

                    <div class="mb-3">
                        <p><strong>Người đứng lớp: </strong>Thầy Phúc</p>
                    </div>

                    <div class="schedule">
                        <p class="fw-bold">Lịch học trong tuần</p>
                        @foreach ($schedules as $item)
                            <p><strong>{{ $days[$item['day_of_week']] }}:
                                </strong>{{ \Carbon\Carbon::parse($item->start_time)->format('h:i A') }} -
                                {{ \Carbon\Carbon::parse($item->end_time)->format('h:i A') }}</p>
                        @endforeach
                    </div>

                    <!-- Nhập số lượng + nút thêm vào giỏ hàng -->
                    <div class="d-flex align-items-center mt-3">
                        <input type="number" value="1" class="form-control quantity-input me-3">
                        <button class="btn btn-warning btn-add-cart flex-grow-1" data-product-id={{ $coruse->id }}>🛒
                            Thêm vào giỏ hàng</button>
                    </div>

                    <p class="text-muted mt-3">Mã: N/A</p>
                    <p class="text-muted">Danh mục: Toán 8</p>

                    <!-- Chia sẻ -->
                    <div class="mt-3 share-links">
                        <span class="fw-semibold">Chia sẻ:</span>
                        <a href="#" class="text-primary">🔵 Facebook</a>
                        <a href="#" class="text-danger">📧 Email</a>
                        <a href="#" class="text-secondary">🔗 LinkedIn</a>
                    </div>
                </div>
            </div>
            <div class="row" style="margin-top: 20px">
                <!-- Tabs -->
                <ul class="nav nav-tabs-course" id="productTabs" role="tablist" style="padding-left: 10px">
                    <li class="nav-item" role="presentation">
                        <button class="nav-link active" id="description-tab" data-bs-toggle="tab"
                            data-bs-target="#description" type="button" role="tab">
                            Mô tả
                        </button>
                    </li>
                    <li class="nav-item" role="presentation">
                        <button class="nav-link" id="reviews-tab" data-bs-toggle="tab" data-bs-target="#reviews"
                            type="button" role="tab">
                            Đánh giá (0)
                        </button>
                    </li>
                </ul>

                <!-- Nội dung Tab -->
                <div class="tab-content" id="productTabsContent">
                    <!-- Mô tả -->
                    <div class="tab-pane fade show active" id="description" role="tabpanel">
                        <div class="p-3 border">
                            {!! $course->description !!}
                        </div>
                    </div>

                    <!-- Đánh giá -->
                    <div class="tab-pane fade" id="reviews" role="tabpanel">
                        <div class="p-3 border">
                            <p>Chưa có đánh giá nào. Hãy là người đầu tiên đánh giá khóa học này!</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <style scoped>
        #carouselExampleIndicators {
            /* display: none; */
            height: 400px;
        }

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

        .product-detail img {
            border-radius: 10px;
            object-fit: cover;
            width: 100%;
            height: 500px;
        }

        .product-title {
            font-size: 24px;
            font-weight: bold;
            color: #333;
            margin-bottom: 10px;
        }

        .product-price {
            font-size: 22px;
            font-weight: bold;
            color: #d9534f;
        }

        .product-description {
            font-size: 16px;
            color: #666;
            margin-bottom: 15px;
        }

        .schedule {
            background: #f8f9fa;
            padding: 15px;
            border-radius: 8px;
        }

        .schedule p {
            margin-bottom: 5px;
            font-size: 16px;
        }

        .schedule strong {
            color: #333;
        }

        .quantity-input {
            width: 60px;
            text-align: center;
        }

        .btn-add-cart {
            background: #ffb300;
            color: white;
            font-size: 16px;
            font-weight: bold;
            padding: 10px;
            border-radius: 6px;
            border: none;
            cursor: pointer;
            transition: 0.3s;
        }

        .btn-add-cart:hover {
            background: #ffa000;
        }

        .share-links a {
            text-decoration: none;
            font-size: 16px;
            margin-right: 10px;
            transition: 0.3s;
        }

        .share-links a:hover {
            text-decoration: underline;
        }



        /* mô tả + đánh giá */
        .nav-tabs-course .nav-link {
            font-size: 16px;
            font-weight: bold;
            color: #333;
            padding: 10px 50px;
        }

        .nav-tabs-course .nav-link.active {
            border-bottom: 3px solid #ffb300;
            color: #000;
        }

        .tab-pane {
            background: #fff;
            border-radius: 5px;
        }
    </style>

    <script>
        $(document).ready(function() {
            $('.btn-add-cart').click(function() {
                let productId = $(this).data('product-id');
                let quantity = $('#quantity').val();

                $.ajax({
                    url: '/cart/add',
                    type: 'POST',
                    data: {
                        product_id: productId,
                        quantity: quantity,
                        _token: $('meta[name="csrf-token"]').attr(
                            'content') // Lấy CSRF Token nếu có
                    },
                    success: function(response) {
                        $('#cart-message').html(
                            '<div class="alert alert-success">Đã thêm vào giỏ hàng!</div>');

                        // Cập nhật số lượng sản phẩm trong giỏ hàng (nếu có hiển thị icon giỏ hàng)
                        $('#cart-count').text(response.cart_count);
                    },
                    error: function() {
                        $('#cart-message').html(
                            '<div class="alert alert-danger">Lỗi khi thêm vào giỏ hàng!</div>'
                        );
                    }
                });
            });
        });
    </script>
@endsection

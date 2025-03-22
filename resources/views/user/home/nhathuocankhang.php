<!DOCTYPE html>
<html lang="vi">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Header Nhà Thuốc An Khang</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">

    <style>
        body {
            background-color: #f5f5f5;
        }

        /****************  HEADER ****************/
        .header {
            background-color: #42b549;
            padding: 10px 0;
        }

        .logo img {
            height: 50px;
        }

        .search-box {
            width: 100%;
            max-width: 400px;
        }

        .header-btn {
            background-color: #fff;
            border-radius: 5px;
            padding: 5px 10px;
        }

        .hotline {
            color: yellow;
            font-weight: bold;
        }

        .text-location {
            padding-right: 15px;
            font-size: 13px;
        }

        /******************* END HEADER *****************/

        /* =================   Banner ================= */
        .banner {
            width: 100%;
            display: flex;
            justify-content: center;
            background-color: #f5f5f5;
            padding: 10px 0;
        }

        .banner-container {
            display: flex;
            max-width: 1540px;
            /* Tùy chỉnh theo kích thước header */
            width: 100%;
            align-items: center;
            justify-content: space-between;
        }

        .banner-side {
            width: 120px;
            text-align: center;
            flex-shrink: 0;
            /* Giữ cố định kích thước */
        }

        .banner-side img {
            width: 100%;
            border-radius: 10px;
        }

        .banner-content {
            display: flex;
            flex: 1;
            /* Chiếm toàn bộ phần giữa */
            gap: 20px;
            /* Khoảng cách giữa banner-main và banner-right */
        }

        .banner-main {
            flex: 2;
            /* Chiếm phần lớn diện tích */
            position: relative;
            text-align: center;
        }

        .banner-main img {
            width: 100%;
            border-radius: 10px;
            height: 100%;
        }

        .banner-pagination {
            position: absolute;
            bottom: 10px;
            left: 50%;
            transform: translateX(-50%);
            background: rgba(0, 0, 0, 0.5);
            color: white;
            padding: 5px 10px;
            border-radius: 15px;
            font-size: 14px;
        }

        .banner-pagination span {
            margin: 0 5px;
            cursor: pointer;
        }

        .banner-right {
            flex: 1;
            /* Chiếm 1 phần nhỏ hơn so với banner-main */
            display: flex;
            flex-direction: column;
            gap: 10px;
        }

        .consult-banner,
        .price-check {
            background: white;
            padding: 10px;
            border-radius: 10px;
            text-align: center;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
        }

        .consult-banner img,
        .price-check img {
            width: 100%;
            border-radius: 10px;
        }

        /*================= End Banner =================*/

        /* ================== categories ============== */
        .categories .row div {
            padding: 10px;
            background-color: #fff;
            text-align: center;
            border-radius: 10px;
        }

        /* ===================== */
        .nav-tabs .nav-link {
            border-radius: 5px 5px 0 0;
            background-color: #f0f0f0;
            color: black;
        }

        .nav-tabs .nav-link.active {
            background-color: #4caf50;
            color: white;
        }

        .product-card {
            border: 1px solid #ddd;
            border-radius: 10px;
            overflow: hidden;
            padding: 10px;
            background: white;
            transition: 0.3s;
        }

        .product-card:hover {
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
        }

        .btn-custom {
            background-color: #4caf50;
            color: white;
            border-radius: 20px;
        }


        /* =============== Tu thuoc =================== */
        .tu-thuoc {
            background-color: #fff;
        }

        .tu-thuoc .category-tabs {
            display: flex;
            gap: 10px;
            overflow-x: auto;
            white-space: nowrap;
            padding-bottom: 10px;
            justify-content: end;
        }

        .tu-thuoc .category-tabs button {
            border: 1px solid #4caf50;
            background-color: white;
            padding: 5px 15px;
            border-radius: 20px;
            font-size: 14px;
            color: #4caf50;
            transition: 0.3s;
        }

        .tu-thuoc .category-tabs button.active,
        .tu-thuoc .category-tabs button:hover {
            background-color: #4caf50;
            color: white;
        }

        .tu-thuoc .product-card {
            border: 1px solid #ddd;
            border-radius: 10px;
            overflow: hidden;
            padding: 10px;
            background: white;
            transition: 0.3s;
        }

        .tu-thuoc .product-card:hover {
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
        }

        .tu-thuoc .product-card img {
            width: 100%;
            height: 150px;
            object-fit: contain;
        }

        .tu-thuoc .btn-custom {
            background-color: #4caf50;
            color: white;
            border-radius: 20px;
            width: 100%;
        }

        /* ============================================ */


        /* ================ super-sale ================ */
        .super-sale {
            background-color: #fff;
        }

        .super-sale .tabs {
            background-color: #05726a;
            padding: 20px 0px;
        }

        .super-sale .tabs .tab-item {
            background: #f8f9fa;
            padding: 10px 20px;
            border-radius: 8px;
            font-weight: bold;
            color: black;
            cursor: pointer;
            transition: 0.3s;
            text-align: center;
            box-shadow: 0px 2px 5px rgba(0, 0, 0, 0.2);
            margin: 0px 10px;
        }

        .super-sale .tabs .tab-item.active {
            background: #ffcc80;
            color: black;
        }

        .super-sale .tabs .tab-item:hover {
            background: #ffb74d;
        }

        .super-sale .list-product {
            background-color: #05726a;
        }

        .super-sale .product-card {
            margin-bottom: 15px;
            background: white;
            border-radius: 10px;
            padding: 15px;
            border: 1px solid #ddd;
            transition: 0.3s;
            position: relative;
        }

        .super-sale .product-card:hover {
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
        }

        .super-sale .product-card img {
            width: 100%;
            height: 160px;
            object-fit: contain;
        }

        .super-sale .discount-badge {
            position: absolute;
            top: 10px;
            left: 10px;
            background: red;
            color: white;
            padding: 3px 8px;
            font-size: 14px;
            border-radius: 5px;
        }

        .super-sale .price {
            font-size: 18px;
            font-weight: bold;
            color: #d9534f;
        }

        .super-sale .old-price {
            text-decoration: line-through;
            color: gray;
            font-size: 14px;
        }

        .super-sale .btn-add {
            background: #28a745;
            color: white;
            border-radius: 10px;
            width: 100%;
        }

        .super-sale .btn-add:hover {
            background: #218838;
        }

        /* ============================================= */

        /* ===================== Thuc pham chuc nang ====================== */
        .thuc-pham-chuc-nang {
            background-color: #fff;
            border-radius: 10px;
        }

        .thuc-pham-chuc-nang .category-tabs {
            display: flex;
            gap: 10px;
            overflow-x: auto;
            white-space: nowrap;
            padding-bottom: 10px;
            justify-content: end;
        }

        .thuc-pham-chuc-nang .category-tabs button {
            border: 1px solid #4caf50;
            background-color: white;
            padding: 5px 15px;
            border-radius: 20px;
            font-size: 14px;
            color: #4caf50;
            transition: 0.3s;
        }

        .thuc-pham-chuc-nang .category-tabs button.active,
        .thuc-pham-chuc-nang .category-tabs button:hover {
            background-color: #4caf50;
            color: white;
        }

        .thuc-pham-chuc-nang .product-card {
            border: 1px solid #ddd;
            border-radius: 10px;
            overflow: hidden;
            padding: 10px;
            background: white;
            transition: 0.3s;
        }

        .thuc-pham-chuc-nang .product-card:hover {
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
        }

        .thuc-pham-chuc-nang .product-card img {
            width: 100%;
            height: 150px;
            object-fit: contain;
        }

        .thuc-pham-chuc-nang .btn-custom {
            background-color: #4caf50;
            color: white;
            border-radius: 10px;
            width: 100%;
        }

        /* ============================================ */


        /* ===================== Duoc My Pham Chinh Hang ====================== */
        .duoc-my-pham {
            background-color: #fff;
            border-radius: 10px;
        }

        .duoc-my-pham .category-tabs {
            display: flex;
            gap: 10px;
            overflow-x: auto;
            white-space: nowrap;
            padding-bottom: 10px;
            justify-content: end;
        }

        .duoc-my-pham .category-tabs button {
            border: 1px solid #4caf50;
            background-color: white;
            padding: 5px 15px;
            border-radius: 20px;
            font-size: 14px;
            color: #4caf50;
            transition: 0.3s;
        }

        .duoc-my-pham .category-tabs button.active,
        .duoc-my-pham .category-tabs button:hover {
            background-color: #4caf50;
            color: white;
        }

        .duoc-my-pham .product-card {
            border: 1px solid #ddd;
            border-radius: 10px;
            overflow: hidden;
            padding: 10px;
            background: white;
            transition: 0.3s;
        }

        .duoc-my-pham .product-card:hover {
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
        }

        .duoc-my-pham .product-card img {
            width: 100%;
            height: 150px;
            object-fit: contain;
        }

        .duoc-my-pham .btn-custom {
            background-color: #4caf50;
            color: white;
            border-radius: 10px;
            width: 100%;
        }

        /* ============================================ */


        /* ===================== San Pham Khac ====================== */
        .san-pham-khac {
            background-color: #fff;
            border-radius: 10px;
        }

        .san-pham-khac .category-tabs {
            display: flex;
            gap: 10px;
            overflow-x: auto;
            white-space: nowrap;
            padding-bottom: 10px;
            justify-content: end;
        }

        .san-pham-khac .category-tabs button {
            border: 1px solid #4caf50;
            background-color: white;
            padding: 5px 15px;
            border-radius: 20px;
            font-size: 14px;
            color: #4caf50;
            transition: 0.3s;
        }

        .san-pham-khac .category-tabs button.active,
        .san-pham-khac .category-tabs button:hover {
            background-color: #4caf50;
            color: white;
        }

        .san-pham-khac .product-card {
            border: 1px solid #ddd;
            border-radius: 10px;
            overflow: hidden;
            padding: 10px;
            background: white;
            transition: 0.3s;
        }

        .san-pham-khac .product-card:hover {
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
        }

        .san-pham-khac .product-card img {
            width: 100%;
            height: 150px;
            object-fit: contain;
        }

        .san-pham-khac .btn-custom {
            background-color: #4caf50;
            color: white;
            border-radius: 10px;
            width: 100%;
        }

        /* ============================================ */


        /* =============== Tin tuc moi =============== */
        .news-container {
            background-color: #ffffff;
            border-radius: 10px;
        }

        .news-title {
            font-size: 20px;
            font-weight: bold;
            margin-bottom: 15px;
            padding-top: 10px;
        }

        .news-main img {
            width: 100%;
            border-radius: 10px;
        }

        .news-item {
            display: flex;
            align-items: center;
            margin-bottom: 10px;
        }

        .news-item img {
            width: 90px;
            height: 60px;
            border-radius: 8px;
            object-fit: cover;
            margin-right: 10px;
        }

        .news-link {
            color: green;
            text-decoration: none;
            font-weight: bold;
        }

        .news-link:hover {
            text-decoration: underline;
        }

        /* ============================================= */


        /* ============== Tim kiem nhieu ================ */
        .tim-kiem-nhieu {
            background-color: #ffffff;
            border-radius: 10px;
        }

        .tim-kiem-nhieu .search-title {
            font-size: 20px;
            font-weight: bold;
            margin-bottom: 15px;
            padding-top: 10px;
        }

        .tim-kiem-nhieu .search-tag {
            display: inline-block;
            padding: 8px 15px;
            border: 1px solid #ddd;
            border-radius: 20px;
            text-decoration: none;
            color: #333;
            font-size: 14px;
            margin: 5px;
        }

        .tim-kiem-nhieu .search-tag:hover {
            background-color: #f0f0f0;
        }

        /* ============================================ */


        /* =================== FOOTER =================== */
        footer {
            width: 100%;
            margin: auto;
            background: #4cb551;
        }

        .footer-1 {
            margin-top: 70px;
            background: #ebf8ed;
            width: 100%;
        }

        footer .another-ak {
            margin-top: 70px;
            padding: 20px 0;
            position: relative;
            display: block;
            max-width: 1200px;
            min-width: 1024px;
            margin: auto;
        }

        .another-ak .title {
            color: #28a745;
        }

        .another-ak .icon-box {
            padding: 10px 0px;
        }

        footer .another-ak::before {
            background: url(https://cdnv2.tgdd.vn/webmwg/2024/ak/images/common/img_commit_desktop.png) bottom right no-repeat;
            background-size: 340px 224px;
            bottom: 0;
            content: '';
            height: 224px;
            position: absolute;
            right: 0;
            width: 380px;
        }

        /* ============================================= */
    </style>
</head>

<body>

    <header class="header">
        <div class="container">
            <div class="d-flex justify-content-between align-items-center">
                <!-- Logo -->
                <div class="logo">
                    <img src="image/logo.jpg" style="height: 65px;" alt="Nhà thuốc An Khang">
                </div>

                <!-- Địa điểm -->
                <div>
                    <button class="btn btn-success">
                        <i class="fa-solid fa-location-dot"></i>
                        <span class="text-location">Giao tại: <strong>Hồ Chí Minh</strong></span>
                        <i class="fa-solid fa-caret-down"></i>
                    </button>
                </div>

                <!-- Ô tìm kiếm -->
                <div class="search-box">
                    <div class="input-group">
                        <input type="text" class="form-control" placeholder="Tìm theo bệnh, tên thuốc...">
                        <span class="input-group-text"><i class="fa-solid fa-magnifying-glass"></i></span>
                    </div>
                </div>

                <!-- Nút tra giá -->
                <div>
                    <button class="btn btn-primary"><i class="bi bi-barcode"></i> Tra giá thuốc</button>
                </div>

                <!-- Giỏ hàng -->
                <div>
                    <button class="btn btn-light"><i class="bi bi-cart"></i> Giỏ hàng</button>
                </div>

                <!-- Tài khoản -->
                <div>
                    <button class="btn btn-success">Tài khoản & đơn hàng</button>
                </div>

                <!-- Hotline -->
                <div class="hotline">
                    <span>Hotline:</span> <br>
                    <span>1900 1572</span>
                </div>
            </div>

            <!-- Menu dưới -->
            <nav class="mt-1">
                <ul class="nav justify-content-between">
                    <li class="nav-item text-white"><a class="nav-link text-white" href="#">Thực phẩm chức năng</a></li>
                    <li class="nav-item text-white"><a class="nav-link text-white" href="#">Thiết bị y tế</a></li>
                    <li class="nav-item text-white"><a class="nav-link text-white" href="#">Dược mỹ phẩm</a></li>
                    <li class="nav-item text-white"><a class="nav-link text-white" href="#">Chăm sóc cá nhân</a></li>
                    <li class="nav-item text-white"><a class="nav-link text-white" href="#">Chăm sóc trẻ em</a></li>
                    <li class="nav-item text-white"><a class="nav-link text-white" href="#">Góc sức khỏe</a></li>
                    <li class="nav-item text-white"><a class="nav-link text-white" href="#">Chuỗi nhà thuốc</a></li>
                </ul>
            </nav>
        </div>
    </header>


    <section class="banner">
        <div class="banner-container">
            <!-- Banner phụ bên trái -->
            <div class="banner-side">
                <img src="left-banner.png" alt="Đặt lịch ngay">
            </div>

            <!-- Phần banner chính và banner phải -->
            <div class="banner-content">
                <!-- Banner chính -->
                <div class="banner-main">
                    <img src="image/banner-main.jpg" alt="Khuyến mãi sữa dinh dưỡng">
                    <!-- <div class="banner-pagination">
                        <span>&lt;</span>
                        <span>5 | 9</span>
                        <span>&gt;</span>
                    </div> -->
                </div>

                <!-- Banner bên phải -->
                <div class="banner-right">
                    <div class="consult-banner">
                        <img src="image/banner-right-top.png" alt="Tư vấn dược sĩ">
                    </div>
                    <div class="price-check">
                        <img src="image/banner-right-bottom.png" alt="Tra cứu giá thuốc">
                    </div>
                </div>
            </div>

            <!-- Banner phụ bên phải -->
            <div class="banner-side">
                <img src="right-banner.png" alt="Đặt lịch ngay">
            </div>
        </div>
    </section>

    <div class="container mt-3 categories">
        <div class="row" style="justify-content: space-around;">
            <div class="col-1">
                <div class="category-item">
                    <img src="image/duoc-my-pham.png" alt="Dược mỹ phẩm">
                    <p>Dược mỹ phẩm</p>
                </div>
            </div>
            <div class="col-1">
                <div class="category-item">
                    <img src="image/duoc-my-pham.png" alt="Dược mỹ phẩm">
                    <p>Dược mỹ phẩm</p>
                </div>
            </div>
            <div class="col-1">
                <div class="category-item">
                    <img src="image/duoc-my-pham.png" alt="Dược mỹ phẩm">
                    <p>Dược mỹ phẩm</p>
                </div>
            </div>
            <div class="col-1">
                <div class="category-item">
                    <img src="image/duoc-my-pham.png" alt="Dược mỹ phẩm">
                    <p>Dược mỹ phẩm</p>
                </div>
            </div>
            <div class="col-1">
                <div class="category-item">
                    <img src="image/duoc-my-pham.png" alt="Dược mỹ phẩm">
                    <p>Dược mỹ phẩm</p>
                </div>
            </div>
            <div class="col-1">
                <div class="category-item">
                    <img src="image/duoc-my-pham.png" alt="Dược mỹ phẩm">
                    <p>Dược mỹ phẩm</p>
                </div>
            </div>
            <div class="col-1">
                <div class="category-item">
                    <img src="image/duoc-my-pham.png" alt="Dược mỹ phẩm">
                    <p>Dược mỹ phẩm</p>
                </div>
            </div>
            <div class="col-1">
                <div class="category-item">
                    <img src="image/duoc-my-pham.png" alt="Dược mỹ phẩm">
                    <p>Dược mỹ phẩm</p>
                </div>
            </div>
            <div class="col-1">
                <div class="category-item">
                    <img src="image/duoc-my-pham.png" alt="Dược mỹ phẩm">
                    <p>Dược mỹ phẩm</p>
                </div>
            </div>
            <div class="col-1">
                <div class="category-item">
                    <img src="image/duoc-my-pham.png" alt="Dược mỹ phẩm">
                    <p>Dược mỹ phẩm</p>
                </div>
            </div>
        </div>
    </div>
    <div class="container mt-3">
        <div class="row">
            <img src="https://cdnv2.tgdd.vn/mwg-static/ankhang/Banner/fa/35/fa35c8fa5d1bc1c0d18f7a1759bb78ac.png" alt="">
        </div>
    </div>

    <div class="container mt-5">
        <!-- Tabs -->
        <ul class="nav nav-tabs" id="diseaseTabs">
            <h4 style="padding-right: 20px;">Bệnh phổ biến mùa này</h4>
            <li class="nav-item">
                <a class="nav-link active" data-bs-toggle="tab" href="#benh-soi">Bệnh sởi</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" data-bs-toggle="tab" href="#benh-cum-a">Bệnh Cúm A</a>
            </li>
        </ul>

        <div class="tab-content mt-3">
            <!-- Tab Bệnh Sởi -->
            <div id="benh-soi" class="tab-pane fade show active">
                <div class="row">
                    <div class="col-md-3">
                        <div class="category-box p-4 bg-success text-white rounded" style="height: 100%;">
                            <h5>Bệnh sởi: Dấu hiệu, nguyên nhân, chẩn đoán và điều trị</h5>
                            <p>Bệnh sởi là bệnh virus lây truyền phổ biến...</p>
                            <button class="btn btn-warning text-dark rounded-pill" style="margin-top: 135px;">Xem cách phòng chữa bệnh</button>
                        </div>
                    </div>
                    <div class="col-md-9">
                        <div class="row">
                            <div class="col-md-3 col-6 mb-3">
                                <div class="product-card">
                                    <img src="https://cdn.tgdd.vn/Products/Images/6991/270855/keo-ong-ivy-propolis-herbal-spray-30ml-600x600.jpg" class="w-100" alt="Sản phẩm">
                                    <h6>Viên sủi UPSA-C</h6>
                                    <p class="text-danger fw-bold">37.000đ /Tube</p>
                                    <button class="btn btn-custom w-100">Thêm vào giỏ thuốc</button>
                                </div>
                            </div>
                            <div class="col-md-3 col-6 mb-3">
                                <div class="product-card">
                                    <img src="https://cdn.tgdd.vn/Products/Images/6991/270855/keo-ong-ivy-propolis-herbal-spray-30ml-600x600.jpg" class="w-100" alt="Sản phẩm">
                                    <h6>Viên sủi UPSA-C</h6>
                                    <p class="text-danger fw-bold">37.000đ /Tube</p>
                                    <button class="btn btn-custom w-100">Thêm vào giỏ thuốc</button>
                                </div>
                            </div>
                            <div class="col-md-3 col-6 mb-3">
                                <div class="product-card">
                                    <img src="https://cdn.tgdd.vn/Products/Images/6991/270855/keo-ong-ivy-propolis-herbal-spray-30ml-600x600.jpg" class="w-100" alt="Sản phẩm">
                                    <h6>Viên sủi UPSA-C</h6>
                                    <p class="text-danger fw-bold">37.000đ /Tube</p>
                                    <button class="btn btn-custom w-100">Thêm vào giỏ thuốc</button>
                                </div>
                            </div>
                            <div class="col-md-3 col-6 mb-3">
                                <div class="product-card">
                                    <img src="https://cdn.tgdd.vn/Products/Images/6991/270855/keo-ong-ivy-propolis-herbal-spray-30ml-600x600.jpg" class="w-100" alt="Sản phẩm">
                                    <h6>Viên sủi UPSA-C</h6>
                                    <p class="text-danger fw-bold">37.000đ /Tube</p>
                                    <button class="btn btn-custom w-100">Thêm vào giỏ thuốc</button>
                                </div>
                            </div>
                            <!-- Thêm các sản phẩm khác -->
                        </div>
                    </div>
                </div>
            </div>

            <!-- Tab Bệnh Cúm A -->
            <div id="benh-cum-a" class="tab-pane fade">
                <div class="row">
                    <div class="col-md-3">
                        <div class="category-box p-4 bg-success text-white rounded" style="height: 100%;">
                            <h5>Bệnh Cúm A: Triệu chứng và cách điều trị</h5>
                            <p>Cúm A là bệnh nhiễm virus ảnh hưởng đến đường hô hấp...</p>
                            <button class="btn btn-warning text-dark rounded-pill" style="margin-top: 135px;">Xem cách phòng chữa bệnh</button>
                        </div>
                    </div>
                    <div class="col-md-9">
                        <div class="row">
                            <div class="col-md-3 col-6 mb-3">
                                <div class="product-card">
                                    <img src="https://cdn.tgdd.vn/Products/Images/10053/153017/upsa-c-1g-thumb-1-600x600.jpg" class="w-100" alt="Sản phẩm">
                                    <h6>Viên sủi Effer-Paralmax</h6>
                                    <p class="text-danger fw-bold">49.000đ /Hộp</p>
                                    <button class="btn btn-custom w-100">Thêm vào giỏ thuốc</button>
                                </div>
                            </div>
                            <div class="col-md-3 col-6 mb-3">
                                <div class="product-card">
                                    <img src="https://cdn.tgdd.vn/Products/Images/10053/153017/upsa-c-1g-thumb-1-600x600.jpg" class="w-100" alt="Sản phẩm">
                                    <h6>Viên sủi Effer-Paralmax</h6>
                                    <p class="text-danger fw-bold">49.000đ /Hộp</p>
                                    <button class="btn btn-custom w-100">Thêm vào giỏ thuốc</button>
                                </div>
                            </div>
                            <div class="col-md-3 col-6 mb-3">
                                <div class="product-card">
                                    <img src="https://cdn.tgdd.vn/Products/Images/10053/153017/upsa-c-1g-thumb-1-600x600.jpg" class="w-100" alt="Sản phẩm">
                                    <h6>Viên sủi Effer-Paralmax</h6>
                                    <p class="text-danger fw-bold">49.000đ /Hộp</p>
                                    <button class="btn btn-custom w-100">Thêm vào giỏ thuốc</button>
                                </div>
                            </div>
                            <div class="col-md-3 col-6 mb-3">
                                <div class="product-card">
                                    <img src="https://cdn.tgdd.vn/Products/Images/10053/153017/upsa-c-1g-thumb-1-600x600.jpg" class="w-100" alt="Sản phẩm">
                                    <h6>Viên sủi Effer-Paralmax</h6>
                                    <p class="text-danger fw-bold">49.000đ /Hộp</p>
                                    <button class="btn btn-custom w-100">Thêm vào giỏ thuốc</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="container mt-4 tu-thuoc">
        <!-- Tabs danh mục -->
        <div class="row mb-3 pt-3">
            <div class="col-md-4">
                <h4 class="mb-3">Tủ thuốc gia đình</h4>
            </div>
            <div class="col-8">
                <div class="category-tabs">
                    <button class="active">Giảm đau, hạ sốt</button>
                    <button>Mắt, tai - mũi - họng</button>
                    <button>Thuốc tiêu hóa, dạ dày</button>
                    <button>Dầu, cao xoa, miếng dán</button>
                </div>
            </div>
        </div>

        <!-- Danh sách sản phẩm -->
        <div class="row">
            <div class="col-md-2 col-6">
                <div class="product-card">
                    <img src="https://cdnv2.tgdd.vn/mwg-static/ankhang/Products/Images/10244/234326/partamol-tab-500mg-h-100v-thumb-638683918242892959-600x600.jpg" alt="Partamol Tab. 500mg">
                    <p class="small text-primary">10 vỉ x 10 viên</p>
                    <h6>Partamol Tab. 500mg Stella</h6>
                    <p class="text-danger fw-bold">55.000đ /Hộp</p>
                    <p class="small">550đ/Viên</p>
                    <button class="btn btn-custom">Thêm vào giỏ thuốc</button>
                </div>
            </div>
            <div class="col-md-2 col-6">
                <div class="product-card">
                    <img src="https://cdnv2.tgdd.vn/mwg-static/ankhang/Products/Images/10244/234326/partamol-tab-500mg-h-100v-thumb-638683918242892959-600x600.jpg" alt="Partamol Tab. 500mg">
                    <p class="small text-primary">10 vỉ x 10 viên</p>
                    <h6>Partamol Tab. 500mg Stella</h6>
                    <p class="text-danger fw-bold">55.000đ /Hộp</p>
                    <p class="small">550đ/Viên</p>
                    <button class="btn btn-custom">Thêm vào giỏ thuốc</button>
                </div>
            </div>
            <div class="col-md-2 col-6">
                <div class="product-card">
                    <img src="https://cdnv2.tgdd.vn/mwg-static/ankhang/Products/Images/10244/234326/partamol-tab-500mg-h-100v-thumb-638683918242892959-600x600.jpg" alt="Partamol Tab. 500mg">
                    <p class="small text-primary">10 vỉ x 10 viên</p>
                    <h6>Partamol Tab. 500mg Stella</h6>
                    <p class="text-danger fw-bold">55.000đ /Hộp</p>
                    <p class="small">550đ/Viên</p>
                    <button class="btn btn-custom">Thêm vào giỏ thuốc</button>
                </div>
            </div>
            <div class="col-md-2 col-6">
                <div class="product-card">
                    <img src="https://cdnv2.tgdd.vn/mwg-static/ankhang/Products/Images/10244/234326/partamol-tab-500mg-h-100v-thumb-638683918242892959-600x600.jpg" alt="Partamol Tab. 500mg">
                    <p class="small text-primary">10 vỉ x 10 viên</p>
                    <h6>Partamol Tab. 500mg Stella</h6>
                    <p class="text-danger fw-bold">55.000đ /Hộp</p>
                    <p class="small">550đ/Viên</p>
                    <button class="btn btn-custom">Thêm vào giỏ thuốc</button>
                </div>
            </div>
            <div class="col-md-2 col-6">
                <div class="product-card">
                    <img src="https://cdnv2.tgdd.vn/mwg-static/ankhang/Products/Images/10244/234326/partamol-tab-500mg-h-100v-thumb-638683918242892959-600x600.jpg" alt="Partamol Tab. 500mg">
                    <p class="small text-primary">10 vỉ x 10 viên</p>
                    <h6>Partamol Tab. 500mg Stella</h6>
                    <p class="text-danger fw-bold">55.000đ /Hộp</p>
                    <p class="small">550đ/Viên</p>
                    <button class="btn btn-custom">Thêm vào giỏ thuốc</button>
                </div>
            </div>
            <div class="col-md-2 col-6">
                <div class="product-card">
                    <img src="https://cdnv2.tgdd.vn/mwg-static/ankhang/Products/Images/10244/234326/partamol-tab-500mg-h-100v-thumb-638683918242892959-600x600.jpg" alt="Partamol Tab. 500mg">
                    <p class="small text-primary">10 vỉ x 10 viên</p>
                    <h6>Partamol Tab. 500mg Stella</h6>
                    <p class="text-danger fw-bold">55.000đ /Hộp</p>
                    <p class="small">550đ/Viên</p>
                    <button class="btn btn-custom">Thêm vào giỏ thuốc</button>
                </div>
            </div>
        </div>
    </div>

    <div class="container mt-4 super-sale">
        <div class="row">
            <img src="https://cdnv2.tgdd.vn/mwg-static/common/Campaign/8e/85/8e850559038308098d721a0941596c91.png" alt="">
        </div>
        <div class="row">
            <div class="d-flex justify-content-center tabs">
                <div class="tab-item active">
                    <p>Tặng quà yêu</p>
                </div>
                <div class="tab-item">
                    <p>BILL 399K - Tặng quà hấp dẫn</p>
                </div>
                <div class="tab-item">
                    <p>GIÁ TỐT HOÀN TOÀN</p>
                </div>
            </div>
        </div>
        <!-- Danh sách sản phẩm -->
        <div class="row list-product pt-3 row-cols-5">
            <?php for ($i = 0; $i < 30; $i++) {
            ?>
                <div class="col custom-col">
                    <div class="product-card">
                        <span class="discount-badge">-20%</span>
                        <img src="https://cdnv2.tgdd.vn/mwg-static/ankhang/Products/Images/11478/301794/thuc-pham-bao-ve-suc-khoe-canxi-mk7-for-kid-hop-20-ong-thumb-638708199764268729-600x600.jpg" alt="Sản phẩm">
                        <p class="small text-primary">20 ống x 10ml</p>
                        <h6>Siro Canxi MK7 giúp xương chắc khỏe</h6>
                        <p class="price">103.200đ <span class="old-price">129.000đ</span></p>
                        <button class="btn btn-add">Thêm vào giỏ thuốc</button>
                    </div>
                </div>
            <?php
            } ?>
        </div>

        <div class="row" style="background-color: #05726a;">
            <div class="col-md-12">
                <p style="text-align: center; color:white; font: size 15px;">Xem tất cả <strong>Deal sốc nổi bật</strong> > </p>
            </div>
        </div>
    </div>


    <div class="container mt-4 thuc-pham-chuc-nang">
        <!-- Tabs danh mục -->
        <div class="row mb-3 pt-3">
            <div class="col-md-4">
                <h4 class="mb-3">Thực phẩm chức năng</h4>
            </div>
            <div class="col-8">
                <div class="category-tabs">
                    <button class="active">Nổi bật</button>
                    <button>Hỗ trợ tiêu hóa</button>
                    <button>Vitamin, khoáng chất</button>
                    <button>Bổ não</button>
                    <button>Bổ mắt</button>
                    <button>Bổ phế, hô hấp</button>
                </div>
            </div>
        </div>

        <!-- Danh sách sản phẩm -->
        <div class="row">
            <?php for ($i = 0; $i < 6; $i++) {
            ?>
                <div class="col-md-2 col-6">
                    <div class="product-card">
                        <img src="https://cdnv2.tgdd.vn/mwg-static/ankhang/Products/Images/7018/333591/vien-uong-dau-nhuyen-the-springleaf-wild-red-krill-oil-complex-700mg-lo-60v-311224-041518-991-600x600.jpg" alt="Partamol Tab. 500mg">
                        <p class="small text-primary">10 vỉ x 10 viên</p>
                        <h6>Partamol Tab. 500mg Stella</h6>
                        <p class="text-danger fw-bold">55.000đ /Hộp</p>
                        <p class="small">550đ/Viên</p>
                        <button class="btn btn-custom">Thêm vào giỏ thuốc</button>
                    </div>
                </div>
            <?php
            } ?>
        </div>
        <div class="row" style="padding-top: 20px;">
            <div class="col-md-12">
                <p style="text-align: center; font-size:15px; color: #4caf50">Xem tất cả <strong>Thực phẩm chức năng nổi bật</strong> > </p>
            </div>
        </div>
    </div>


    <div class="container mt-4 duoc-my-pham">
        <!-- Tabs danh mục -->
        <div class="row mb-3 pt-3">
            <div class="col-md-4">
                <h4 class="mb-3">Dược mỹ phẩm chính hãng</h4>
            </div>
            <div class="col-8">
                <div class="category-tabs">
                    <button class="active">Nổi bật</button>
                    <button>Làm sạch da</button>
                    <button>Trị liệu cho da</button>
                    <button>Dưỡng da</button>
                    <button>Chống năng</button>
                </div>
            </div>
        </div>

        <!-- Danh sách sản phẩm -->
        <div class="row">
            <?php for ($i = 0; $i < 6; $i++) {
            ?>
                <div class="col-md-2 col-6">
                    <div class="product-card">
                        <img src="https://cdn.tgdd.vn/Products/Images/3708/216973/TimerThumb/216973.jpg" alt="Partamol Tab. 500mg">
                        <p class="small text-primary">10 vỉ x 10 viên</p>
                        <h6>Partamol Tab. 500mg Stella</h6>
                        <p class="text-danger fw-bold">55.000đ /Hộp</p>
                        <p class="small">550đ/Viên</p>
                        <button class="btn btn-custom">Thêm vào giỏ thuốc</button>
                    </div>
                </div>
            <?php
            } ?>
        </div>
        <div class="row" style="padding-top: 20px;">
            <div class="col-md-12">
                <p style="text-align: center; font-size:15px; color: #4caf50">Xem tất cả <strong>Dược mỹ phẩm nổi bật</strong> > </p>
            </div>
        </div>
    </div>


    <div class="container mt-4 san-pham-khac">
        <!-- Tabs danh mục -->
        <div class="row mb-3 pt-3">
            <div class="col-md-4">
                <h4 class="mb-3">Sản phẩm khác</h4>
            </div>
            <div class="col-8">
                <div class="category-tabs">
                    <button class="active">Nổi bật</button>
                    <button>Sữa dinh dưỡng</button>
                    <button>Trang thiết bị y tế</button>
                    <button>Chăm sóc cá nhân</button>
                    <button>Chăm sóc trẻ em</button>
                </div>
            </div>
        </div>

        <!-- Danh sách sản phẩm -->
        <div class="row">
            <?php for ($i = 0; $i < 6; $i++) {
            ?>
                <div class="col-md-2 col-6">
                    <div class="product-card">
                        <img src="https://cdnv2.tgdd.vn/mwg-static/common/Product/2382/284736/1-min-600x600.jpg" alt="Partamol Tab. 500mg">
                        <p class="small text-primary">10 vỉ x 10 viên</p>
                        <h6>Partamol Tab. 500mg Stella</h6>
                        <p class="text-danger fw-bold">55.000đ /Hộp</p>
                        <p class="small">550đ/Viên</p>
                        <button class="btn btn-custom">Thêm vào giỏ thuốc</button>
                    </div>
                </div>
            <?php
            } ?>
        </div>
    </div>


    <div class="container news-container mt-4">
        <div class="news-title">Bản tin sức khoẻ</div>
        <div class="row">
            <!-- Tin tức lớn bên trái -->
            <div class="col-md-4">
                <div class="news-main">
                    <img src="https://cdnv2.tgdd.vn/mwg-static/ankhang/News/Thumb/1575930/thong-tin-chinh-thuc-cua-la-roche-posay-viet-nam-thumb638778265317076791.jpg" alt="Tin tức lớn">
                    <h6 class="mt-2">Thông tin chính thức của La Roche - Posay Việt Nam về vấn đề thu hồi sản phẩm trị mụn Duo+</h6>
                    <small class="text-muted">2 ngày trước</small>
                </div>
            </div>
            <!-- Danh sách tin tức nhỏ bên phải -->
            <div class="col-md-8">
                <div class="row">
                    <div class="col-6">
                        <div class="news-item">
                            <img src="https://cdnv2.tgdd.vn/mwg-static/ankhang/News/Thumb/1575924/canh-bao-hang-gia-megaduo-thumb638778263555595361.jpg" alt="Tin nhỏ">
                            <div>
                                <h6 class="mb-1">Cảnh báo hàng giả MEGADUO</h6>
                                <small class="text-muted">2 ngày trước</small>
                            </div>
                        </div>
                        <div class="news-item">
                            <img src="https://cdnv2.tgdd.vn/mwg-static/ankhang/News/Thumb/1573991/lich-phuc-vu-tet-nguyen-dan-cua-nha-thuoc-an-khang-thumb638719437188350209.jpg" alt="Tin nhỏ">
                            <div>
                                <h6 class="mb-1">Lịch phục vụ Tết Nguyên Đán 2025 của Nhà thuốc An Khang</h6>
                                <small class="text-muted">2 tháng trước</small>
                            </div>
                        </div>
                        <div class="news-item">
                            <img src="https://cdnv2.tgdd.vn/mwg-static/ankhang/News/bi-cam-lanh-uong-thuoc-gi-nhanh-khoe-thumb638760062916225046.jpg" alt="Tin nhỏ">
                            <div>
                                <h6 class="mb-1">Bị cảm lạnh uống thuốc gì nhanh khoẻ?</h6>
                                <small class="text-muted">2 tuần trước</small>
                            </div>
                        </div>
                    </div>
                    <div class="col-6">
                        <div class="news-item">
                            <img src="https://cdnv2.tgdd.vn/mwg-static/ankhang/News/Thumb/1574209/medpro-dat-lich-kham-nhanh-giai-phap-tiep-can-y-thumb-2638729649149747415.jpg" alt="Tin nhỏ">
                            <div>
                                <h6 class="mb-1">Medpro đặt lịch khám nhanh - giải pháp y tế</h6>
                                <small class="text-muted">2 tháng trước</small>
                            </div>
                        </div>
                        <div class="news-item">
                            <img src="https://cdnv2.tgdd.vn/mwg-static/ankhang/News/7-giai-doan-cua-benh-alzheimer-dau-hieu-nhan-biet638761190721515395.jpg" alt="Tin nhỏ">
                            <div>
                                <h6 class="mb-1">7 giai đoạn của bệnh Alzheimer</h6>
                                <small class="text-muted">1 tuần trước</small>
                            </div>
                        </div>
                        <div class="news-item">
                            <img src="https://cdnv2.tgdd.vn/mwg-static/ankhang/News/tia-tu-ngoai-tac-dung-ung-dung-thumb638744287125730519.jpg" alt="Tin nhỏ">
                            <div>
                                <h6 class="mb-1">Tia tử ngoại: Tác dụng và ảnh hưởng</h6>
                                <small class="text-muted">1 tuần trước</small>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Link xem tất cả -->
        <div class="row">
            <div class="col-md-12">
                <p style="text-align: center;"> <a href="#" class="news-link">Xem tất cả ></a></p>
            </div>
        </div>
    </div>

    <div class="container mt-4 tim-kiem-nhieu" style="padding-bottom: 20px;">
        <div class="search-title">Tìm kiếm nhiều</div>
        <div class="row">
            <div class="col-12">
                <a href="#" class="search-tag">thuốc cảm cúm</a>
                <a href="#" class="search-tag">thuốc tây</a>
                <a href="#" class="search-tag">thực phẩm bảo vệ sức khoẻ</a>
                <a href="#" class="search-tag">mỹ phẩm</a>
                <a href="#" class="search-tag">đồ dùng cho bé sơ sinh</a>
                <a href="#" class="search-tag">chăm sóc cá nhân</a>
                <a href="#" class="search-tag">mặt nạ</a>
                <a href="#" class="search-tag">thuốc tránh thai</a>
                <a href="#" class="search-tag">thuốc hạ sốt</a>
                <a href="#" class="search-tag">nước ngọt</a>
                <a href="#" class="search-tag">thuốc giảm đau</a>
                <a href="#" class="search-tag">dầu gội</a>
                <a href="#" class="search-tag">sữa tắm</a>
                <a href="#" class="search-tag">tẩy trang</a>
                <a href="#" class="search-tag">dầu</a>
                <a href="#" class="search-tag">dầu xả</a>
                <a href="#" class="search-tag">nội tiết tố nữ</a>
                <a href="#" class="search-tag">thuốc kháng sinh</a>
            </div>
        </div>
    </div>


    <footer>
        <div class="footer-1">
            <div class="another-ak">
                <div class="container">
                    <div class="row">
                        <div class="col-md-3">
                            <div class="icon-box">
                                <div>
                                    <i class="fas fa-check-circle"></i>
                                    <strong class="title">CAM KẾT 100%</strong> <br>
                                    thuốc chính hãng
                                </div>
                            </div>
                            <div class="icon-box">
                                <div>
                                    <i class="fas fa-clock"></i>
                                    <strong class="title">GIAO NHANH 2 GIỜ</strong> <br>
                                    Xem chi tiết
                                </div>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="icon-box">
                                <div>
                                    <i class="fas fa-truck"></i>
                                    <strong class="title">MIỄN PHÍ GIAO HÀNG</strong> <br>
                                    đơn hàng từ 150.000đ
                                </div>
                            </div>
                            <div class="icon-box">
                                <div>
                                    <i class="fas fa-undo"></i>
                                    <strong class="title">ĐỔI TRẢ TRONG 3 NGÀY</strong> <br>
                                    Xem chi tiết
                                </div>
                            </div>
                        </div>
                        <div class="col-md-3 mt-4">
                            <strong class="title">HỆ THỐNG 326 NHÀ THUỐC AN KHANG</strong> <br>
                            <button class="btn btn-success mt-2">Xem danh sách nhà thuốc</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="footer-2" style="background-color: white; padding-top: 80px;">
            <div class="container">
                <div class="row">
                    <div class="col-md-3">
                        <p style="padding-bottom: 20px;"><strong>TỔNG ĐÀI</strong></p>
                        <div style="line-height: 1.2;">
                            <p>Gọi mua (8:00 - 21:30): <strong>1900 1572</strong></p>
                            <p>Khiếu nại (8:00 - 21:30): <strong>1900 1572</strong></p>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <p><strong>HỆ THỐNG NHÀ THUỐC</strong></p>
                        <div style="line-height: 1.2;">
                            <p>Hệ thống 326 nhà thuốc</p>
                            <p>Nội quy nhà thuốc</p>
                            <p>Chất lượng phục vụ</p>
                            <p>Chính sách đổi trả, bảo hành</p>
                            <p>Tích điểm Quà tặng VIP</p>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <p><strong>HỖ TRỢ KHÁCH HÀNG</strong></p>
                        <div style="line-height: 1.2;">
                            <p>Điều kiện giao dịch chung</p>
                            <p>Hướng dẫn mua hàng online</p>
                            <p>Chính sách giao hàng</p>
                            <p>Chính sách thanh toán</p>
                            <p>Lịch sử đơn hàng</p>
                            <p>Đăng ký bán hàng CTV chiết khấu cao</p>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <p><strong>VỀ NHÀ THUỐC AN KHANG</strong></p>
                        <div style="line-height: 1.2;">
                            <p>Giới thiệu công ty</p>
                            <p>Ban Điều Hành</p>
                            <p>Chính sách xử lý dữ liệu cá nhân</p>
                        </div>
                        <p><strong>BỆNH VIỆN</strong></p>
                    </div>
                </div>
            </div>
        </div>

        <div class="footer-3" style="background-color: white; padding-top: 40px;">
            <div class="container" style="padding-bottom: 20px; border-bottom: 1px solid black">
                <div class="row">
                    <div class="col-md-3">
                        <p><strong>KẾT NỐI VỚI CHÚNG TÔI</strong></p>
                        <div class="social-icons">
                            <a href="#"><i class="fab fa-facebook" style="font-size: 35px;"></i></a>
                            <a href="#"><i class="fab fa-youtube" style="font-size: 35px;"></i></a>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <p><strong>CHỨNG NHẬN BỞI</strong></p>
                        <div class="certification">
                            <a href="#"><i class="fab fa-facebook" style="font-size: 35px;"></i></a>
                            <a href="#"><i class="fab fa-youtube" style="font-size: 35px;"></i></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </footer>

</body>

</html>
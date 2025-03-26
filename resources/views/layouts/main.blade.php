<!DOCTYPE html>
<html lang="vi">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Học Toán Lý</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    {{-- <link rel="stylesheet" href="style.css"> --}}
    <link rel="stylesheet" href="{{ asset('style.css') }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
    <script src="https://cdn.tiny.cloud/1/qbw7rset86a37udw8sv86njuneptk0ctw88a570llag2w9od/tinymce/6/tinymce.min.js"
        referrerpolicy="origin"></script>
    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
</head>

<body>
    <div class="top-header">
        <div class="container d-flex justify-content-between align-items-center">
            <div class="contact-info">
                <span><i class="fas fa-phone-alt"></i> 0916 025552</span>
                <span><i class="fas fa-envelope"></i> toanly.thayphuc@gmail.com</span>
            </div>
            <div class="header-right">
                @auth
                    <!-- Settings Dropdown -->
                    <div class="auth-links">
                        <div class="dropdown">
                            <p class="dropdown-toggle" style="color: white; margin-bottom:0px" onclick="toggleDropdown()">
                                {{ Auth::user()->name }}</p>
                            <div class="dropdown-menu">
                                <a href="{{ route('profile.edit') }}">Profile</a>
                                <form method="POST" action="{{ route('logout') }}">
                                    @csrf
                                    <a href=""
                                        onclick="event.preventDefault();
                                                this.closest('form').submit();">Log
                                        Out</a>
                                </form>
                            </div>
                        </div>
                    </div>
                @else
                    <div class="auth-links">
                        <a href="{{ route('register') }}">Đăng ký</a> | <a href="{{ route('login') }}">Đăng nhập</a>
                    </div>
                @endauth
                <div class="cart-icon">
                    <a href="{{ route('cart.show') }}" class="cart-link">
                        🛒 <span id="cart-count">0</span>
                    </a>
                </div>
            </div>
        </div>
    </div>

    <nav class="navbar navbar-expand-lg navbar-dark fixed-top">
        <div class="container">
            <a class="navbar-brand" href="#">LOP-HOC-THAY-PHUC.VN</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item"><a class="nav-link" href="{{ route('introduction') }}">Giới thiệu</a></li>
                    <li class="nav-item"><a class="nav-link" href="#">Sự kiện</a></li>
                    <li class="nav-item"><a class="nav-link" href="#">Tài liệu toán lý</a></li>
                    <li class="nav-item"><a class="nav-link" href="{{ route('product.main') }}">Đăng ký lớp học</a></li>
                    <li class="nav-item"><a class="nav-link" href="#">Blog</a></li>
                </ul>
            </div>
        </div>
    </nav>

    <!-- Carousel Banner -->
    <div id="carouselExampleIndicators" class="carousel slide banner-container" data-bs-ride="carousel">
        <div class="carousel-indicators">
            <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="0"
                class="active"></button>
            <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="1"></button>
            <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="2"></button>
        </div>
        <div class="carousel-inner">
            <div class="carousel-item active">
                <img src="https://png.pngtree.com/thumb_back/fw800/background/20240528/pngtree-ancient-master-teaching-art-image_15735524.jpg"
                    class="d-block w-100" alt="Banner 1">
                <div class="carousel-caption">
                    <h1>Chào mừng đến với lớp học thầy Phúc</h1>
                    <p>Nền tảng học toán trực tuyến tốt nhất</p>
                    <a href="#" class="btn btn-light">Xem khóa học</a>
                </div>
            </div>
            <div class="carousel-item">
                <img src="https://png.pngtree.com/thumb_back/fw800/back_our/20190628/ourmid/pngtree-simple-atmosphere-green-chalkboard-teaching-illustration-background-image_271860.jpg"
                    class="d-block w-100" alt="Banner 2">
                <div class="carousel-caption">
                    <h1>Khóa học chất lượng</h1>
                    <p>Hàng ngàn học viên đã tham gia</p>
                </div>
            </div>
            <div class="carousel-item">
                <img src="https://teachforvietnam.org/wp-content/uploads/2023/12/banner-daisu.jpg" class="d-block w-100"
                    alt="Banner 3">
                <div class="carousel-caption">
                    <h1>Học mọi lúc, mọi nơi</h1>
                    <p>Hỗ trợ trên mọi thiết bị</p>
                </div>
            </div>
        </div>
        <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleIndicators"
            data-bs-slide="prev">
            <span class="carousel-control-prev-icon"></span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleIndicators"
            data-bs-slide="next">
            <span class="carousel-control-next-icon"></span>
        </button>
    </div>

    @yield('main-content')

    <!-- Footer -->
    <footer class="footer mt-5">
        <div class="footer-container">
            <!-- Cột 1: Thông tin liên hệ -->
            <div class="footer-column contact">
                <img src="https://hoctoan.vn/wp-content/uploads/2022/01/HOCTOAN.VN164.48.2.png" alt="Logo HOCTOAN.VN">
                <p class="mt-3"><i class="fas fa-phone"></i> 0916 025552</p>
                <p><i class="fas fa-envelope"></i> hoctoan.help@gmail.com</p>
                <div class="social-icons">
                    <p><i class="fab fa-facebook"></i></p>
                    <p><i class="fab fa-youtube"></i></p>
                    <p><i class="fab fa-telegram"></i></p>
                </div>
            </div>

            <!-- Cột 2: Giới thiệu -->
            <div class="footer-column">
                <h5>GIỚI THIỆU</h5>
                <ul>
                    <li><a href="#">Các khóa học</a></li>
                    <li><a href="#">Giới thiệu</a></li>
                    <li><a href="#">Lịch sự kiện</a></li>
                    <li><a href="#">Lớp luyện thi</a></li>
                    <li><a href="#">Blog</a></li>
                    <li><a href="#">Khuyến mãi</a></li>
                </ul>
            </div>

            <!-- Cột 3: Tài liệu Toán -->
            <div class="footer-column">
                <h5>TÀI LIỆU TOÁN</h5>
                <ul>
                    <li><a href="#">Sách Toán</a></li>
                    <li><a href="#">Tài liệu mới</a></li>
                    <li><a href="#">Sách Toán 1</a></li>
                    <li><a href="#">Sách Toán 2</a></li>
                    <li><a href="#">Sách Toán 3</a></li>
                    <li><a href="#">Sách Toán 4</a></li>
                    <li><a href="#">Sách Toán 5</a></li>
                    <li><a href="#">Sách Toán 6</a></li>
                    <li><a href="#">Sách Toán 7</a></li>
                    <li><a href="#">Sách Toán 8</a></li>
                    <li><a href="#">Sách Toán 9</a></li>
                    <li><a href="#">Sách Toán 10</a></li>
                </ul>
            </div>

            <!-- Cột 4: Links -->
            <div class="footer-column">
                <h5>LINKS</h5>
                <ul>
                    <li><a href="#">EdX Free Learning</a></li>
                    <li><a href="#">Harvard Free Learning</a></li>
                    <li><a href="#">MIT Learning</a></li>
                    <li><a href="#" class="highlight">Eduma Learning</a></li>
                </ul>
            </div>

            <!-- Cột 5: Social -->
            <div class="footer-column">
                <h5>SOCIAL</h5>
                <ul>
                    <li><a href="#">Nhóm Zalo</a></li>
                    <li><a href="#">YouTube HOCTOAN.VN</a></li>
                    <li><a href="#">TikTok HOCTOAN.VN</a></li>
                    <li><a href="#">FB HOCTOAN.VN</a></li>
                    <li><a href="#">FB Nhóm giải Toán 5</a></li>
                    <li><a href="#">FB Nhóm giải Toán 6</a></li>
                    <li><a href="#">FB Nhóm giải Toán 7</a></li>
                    <li><a href="#">FB Nhóm giải Toán 8</a></li>
                    <li><a href="#">FB Nhóm giải Toán 9</a></li>
                    <li><a href="#">FB Nhóm giải Toán 10</a></li>
                </ul>
            </div>
        </div>

        <div id="loading" class="loading-overlay" style="display: none">
            <div class="spinner"></div>
        </div>
    </footer>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>

<style>
    .loading-overlay {
        position: fixed;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        background: rgba(0, 0, 0, 0.3);
        display: flex;
        justify-content: center;
        align-items: center;
        z-index: 1000;
    }

    .loading-overlay .spinner {
        width: 50px;
        height: 50px;
        border: 5px solid rgba(255, 255, 255, 0.3);
        border-top-color: white;
        border-radius: 50%;
        animation: spin 1s linear infinite;
    }

    @keyframes spin {
        0% {
            transform: rotate(0deg);
        }

        100% {
            transform: rotate(360deg);
        }
    }
</style>

<style scoped>
    /* Header trên cùng */
    .top-header {
        position: fixed;
        top: 0;
        left: 0;
        width: 100%;
        background: #000;
        color: #fff;
        padding: 20px 0;
        font-size: 14px;
        z-index: 1050;
        /* Đảm bảo nằm trên navbar */
    }

    .top-header .contact-info {
        display: flex;
        align-items: center;
        gap: 20px;
        /* Khoảng cách giữa các phần tử */
    }

    .top-header .contact-info span {
        display: flex;
        align-items: center;
        gap: 8px;
        white-space: nowrap;
    }

    .top-header .auth-links a {
        color: #fff;
        text-decoration: none;
        margin-left: 10px;
    }

    .top-header .auth-links a:hover {
        text-decoration: underline;
    }

    .header-right {
        display: flex;
        align-items: center;
        gap: 15px;
    }

    .cart-icon {
        position: relative;
        font-size: 22px;
    }

    #cart-count {
        background-color: red;
        color: white;
        font-size: 12px;
        font-weight: bold;
        padding: 2px 6px;
        border-radius: 50%;
        position: absolute;
        top: -8px;
        right: -8px;
    }

    .dropdown {
        position: relative;
        display: inline-block;
    }

    .dropdown-toggle {
        cursor: pointer;
        font-size: 16px;
        background: none;
        border: none;
        outline: none;
    }

    .dropdown-menu {
        position: absolute;
        top: 130%;
        right: 0;
        background: white;
        box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
        border-radius: 6px;
        width: 150px;
        display: none;
        flex-direction: column;
    }

    .dropdown-menu a {
        text-decoration: none !important;
        color: #333 !important;
        padding: 5px 0px;
        display: block;
        transition: background 0.2s;
    }

    .dropdown-menu a:hover {
        background: rgb(238 242 255 / var(--tw-bg-opacity, 1))
    }

    .dropdown.active .dropdown-menu {
        display: flex;
    }


    /* Làm navbar đè lên banner */
    .navbar {
        position: fixed;
        top: 70px;
        width: 100%;
        z-index: 1000;
        transition: transform 0.4s ease-in-out;
    }

    .navbar.hidden {
        transform: translateY(-100%);
    }

    .navbar.scrolled-up {
        background: white;
        box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
    }

    .navbar.scrolled-up a {
        color: black !important;
    }

    .banner-container {
        position: relative;
        top: 60px;
        height: calc(100vh - 60px);
        /* Chiều cao toàn màn hình trừ header */
        overflow: hidden;
    }

    /* Điều chỉnh carousel */
    .carousel-item img {
        height: 635px;
        object-fit: cover;
    }

    /* Điều chỉnh chữ trên banner */
    .carousel-caption {
        background: rgba(0, 0, 0, 0.5);
        padding: 15px;
        border-radius: 8px;
    }

    /* Card hover */
    .card:hover {
        transform: scale(1.05);
        transition: 0.3s;
    }






    /* Phần Đăng ký ngay */
    .register-section {
        position: relative;
        width: 100%;
        height: 100vh;
        background: url('https://hoctoan.vn/wp-content/uploads/2015/10/bg_register_now.jpg') no-repeat center center;
        background-size: cover;
        background-attachment: fixed;
        /* Giữ ảnh nền cố định khi cuộn */
        display: flex;
        align-items: center;
        justify-content: center;
        color: white;
        text-align: center;
        padding: 20px;
    }

    .register-content {
        max-width: 800px;
        background: rgba(0, 0, 0, 0.6);
        /* Tạo lớp overlay đen nhẹ */
        padding: 40px;
        border-radius: 10px;
    }

    .register-content h1 {
        font-size: 48px;
        font-weight: bold;
    }

    .register-content p {
        font-size: 18px;
        margin-bottom: 20px;
    }

    .highlight {
        color: #ffcc00;
        /* Màu vàng */
    }

    /* Countdown Timer */
    .countdown {
        display: flex;
        justify-content: center;
        gap: 20px;
        margin-top: 20px;
    }

    .countdown div {
        background: rgba(255, 255, 255, 0.2);
        padding: 10px 20px;
        border-radius: 5px;
        font-size: 24px;
    }

    /* Responsive */
    @media (max-width: 768px) {
        .register-content h1 {
            font-size: 36px;
        }

        .countdown div {
            font-size: 18px;
        }

        .guide-box {
            right: 10px;
            width: 200px;
        }
    }


    /* =============== testimonial ============= */
    .testimonial {
        max-width: 800px;
        margin: 0px auto;
        text-align: center
    }

    .title {
        font-size: 24px;
        font-weight: bold;
        margin-bottom: 5px;
    }

    .subtitle {
        font-size: 16px;
        margin-bottom: 20px;
        color: #666;
    }

    /* Hình đại diện */
    .avatar-container {
        display: flex;
        justify-content: center;
        gap: 15px;
        margin-bottom: 15px;
    }

    .avatar {
        width: 80px;
        height: 80px;
        border-radius: 50%;
        object-fit: cover;
        opacity: 0.8;
    }

    /* Thông tin người đánh giá */
    .reviewer-name {
        font-size: 18px;
        font-weight: bold;
        margin-bottom: 5px;
    }

    .reviewer-title {
        font-size: 14px;
        color: #888;
        margin-bottom: 15px;
    }

    /* Nội dung nhận xét */
    .review-text {
        font-size: 16px;
        color: #333;
        line-height: 1.5;
        margin-bottom: 30px;
    }

    /* Đăng ký tài khoản */
    .register-title {
        font-size: 18px;
        font-weight: bold;
        margin-bottom: 5px;
        color: #007bff;
    }

    .register-text {
        font-size: 14px;
        color: #555;
        margin-bottom: 20px;
    }

    /* Nút tải ứng dụng */
    .app-links {
        display: flex;
        justify-content: center;
        gap: 15px;
    }

    .app-links img {
        width: 150px;
        height: auto;
    }



    /* ============== FOOTER ================== */
    footer {
        background-color: #111;
        color: white;
        padding: 40px 0;
        font-family: Arial, sans-serif;
    }

    /* Layout flexbox cho các cột */
    .footer-container {
        display: flex;
        flex-wrap: wrap;
        justify-content: space-between;
        max-width: 1200px;
        margin: 0 auto;
        padding: 0 20px;
    }

    /* Style từng cột */
    .footer-column {
        flex: 1;
        min-width: 200px;
        /* Giúp cột không quá nhỏ khi thu nhỏ màn hình */
        margin-bottom: 20px;
    }

    .footer-column h3 {
        /* border-bottom: 2px solid yellow; */
        padding-bottom: 10px;
        margin-bottom: 15px;
    }

    .footer-column ul {
        list-style: none;
        padding: 0;
    }

    .footer-column ul li {
        margin: 8px 0;
    }

    .footer-column ul li a {
        color: white;
        text-decoration: none;
    }

    .footer-column ul li a:hover {
        color: yellow;
    }

    /* Phần logo & liên hệ */
    .contact-info {
        max-width: 250px;
    }

    .contact-info img {
        width: 150px;
        margin-bottom: 15px;
    }

    .contact-info p {
        margin: 5px 0;
    }

    /* Icon mạng xã hội */
    .social-icons {
        display: flex;
        gap: 15px;
    }

    .social-icons p {
        font-size: 24px;
        cursor: pointer;
        margin: 0;
    }

    .social-icons p:hover {
        color: yellow;
    }

    /* Responsive cho màn hình nhỏ (dưới 768px) */
    @media screen and (max-width: 768px) {
        .footer-container {
            flex-direction: column;
            /* Chuyển sang dạng cột */
            align-items: center;
            text-align: center;
        }

        .footer-column {
            width: 100%;
        }

        .social-icons {
            justify-content: center;
        }
    }
</style>

<script>
    let lastScrollTop = 0;
    const navbar = document.querySelector('.navbar');

    window.addEventListener('scroll', function() {
        let scrollTop = window.scrollY || document.documentElement.scrollTop;

        if (scrollTop > lastScrollTop) {
            // Cuộn xuống -> Ẩn navbar
            navbar.classList.add('hidden');
            navbar.classList.remove('scrolled-up', 'at-top');
        } else {
            // Cuộn lên -> Hiện navbar, đổi màu trắng và text màu đen
            navbar.classList.remove('hidden');

            if (scrollTop === 0) {
                // Khi lên đến đầu trang, xóa background và đổi text về trắng
                navbar.classList.remove('scrolled-up');
                navbar.classList.add('at-top');
            } else {
                navbar.classList.add('scrolled-up');
                navbar.classList.remove('at-top');
            }
        }

        lastScrollTop = scrollTop;
    });


    function toggleDropdown() {
        document.querySelector('.dropdown').classList.toggle('active');
    }

    // Đóng dropdown khi click ra ngoài
    document.addEventListener('click', function(event) {
        const dropdown = document.querySelector('.dropdown');
        if (!dropdown.contains(event.target)) {
            dropdown.classList.remove('active');
        }
    });
</script>

@extends('layouts.main')

@section('main-content')
    <div class="container">
        <div class="breadcrumbs-wrapper">
            <div class="container">
                <ul class="breadcrumbs" id="breadcrumbs">
                    <li><a href="{{ route('home') }}">Home</a><span class="separator"></span></li>
                    <li>Giới thiệu</li>
                </ul>
            </div>
        </div>

        <section class="development" style="margin-top:20px">
            <h2 class="title" style="text-align: center">Quá trình phát triển</h2>
            <p class="description">
                HOCTOAN.VN ra đời và hoạt động từ năm 2010, là một trong những diễn đàn học toán Online đầu tiên tại Việt
                Nam.
                Năm 2014 HOCTOAN.VN đã đạt 2000 thành viên, top tìm kiếm trên Google và được Trung tâm Internet Việt Nam
                tặng giấy khen.
                Đến nay, HOCTOAN.VN tiếp tục sứ mệnh phát triển phương pháp học toán hiệu quả cho các em học sinh trên mọi
                miền tổ quốc.
            </p>
            <div class="stats">
                <div class="stat-box">
                    <span class="number">14</span>
                    <p class="text">NĂM HOẠT ĐỘNG TỪ 2010</p>
                </div>
                <div class="stat-box">
                    <span class="number">10,000</span>
                    <p class="text">THÀNH VIÊN CỘNG ĐỒNG</p>
                </div>
            </div>
            <div class="image-development">
                <img src="https://hoctoan.vn/wp-content/uploads/2024/08/hoc-sinh-1.jpg" alt="Học sinh học toán">
            </div>
        </section>

        <section class="content">
            <div class="column">
                <h2 style="text-align: center">Vì sao chọn HỌC TOÁN.VN</h2>
                <p><strong>HỌC TOÁN.VN</strong> trang bị cho học sinh ba trụ cột là “Nền tảng, Tiêu chuẩn và Kỹ năng” trong
                    học Toán giúp học sinh lấp đầy các lỗ hổng kiến thức, tạo dựng niềm tin vào bản thân và năng lực thực tế
                    trong học tập môn Toán.</p>
                <p><strong>Chương trình đào tạo</strong> của HOCTOAN.VN được chọn lọc, điều chỉnh, biên soạn từ chương trình
                    đào tạo dành cho học sinh hệ chuyên toán từ lớp 5 đến lớp 9. Chương trình được xây dựng với sự tham gia,
                    đóng góp của các cựu học sinh chuyên Toán, đã từng đạt các giải cao hoặc là thành viên đội tuyển các kỳ
                    thi học sinh giỏi Toán Quốc tế, Quốc gia, Thành phố Hà Nội (lớp 5-12).</p>
                <p><strong>Ứng dụng công nghệ</strong> dạy học Online qua Zoom và tự học qua video, bài tập trên website
                    giúp <strong><em>phổ cập rộng rãi lớp học tiêu chuẩn cao</em></strong> trong môn Toán tới các em học
                    sinh trên mọi miền Tổ quốc đồng thời cũng giúp các bậc phụ huynh tiết kiệm chi phí đáng kể cho gia đình.
                </p>
            </div>

            <div class="column">
                <h2 style="text-align: center">Phương pháp đào tạo của HỌC TOÁN.VN</h2>
                <p><strong>Nền tảng</strong> một hệ thống tổng hợp bài giảng và trắc nghiệm đầy đủ và toàn tiện giúp học
                    sinh nắm vững kiến thức cơ bản, lý thuyết, các tiên đề, định lý, công thức toán học trong SGK và nâng
                    cao, mở rộng của giáo trình chuyên toán.</p>
                <p><strong>Tiêu chuẩn</strong> là việc chú trọng hướng dẫn học sinh trình bày lời giải theo tiêu chuẩn hệ
                    chuyên toán và thi học sinh giỏi các cấp nhằm đạt điểm tuyệt đối.</p>
                <p><strong>Kỹ năng</strong> là việc xây dựng cho học sinh khả năng tối ưu hóa kết quả làm bài thi theo yêu
                    cầu về thời gian bằng một hệ thống các bài luyện tập trắc nghiệm và tự luận phong phú, toàn diện giúp
                    học sinh tạo dựng thói quen, khả năng tập trung, tốc độ, kỹ năng viết bài để đạt được điểm số tối đa.
                </p>
                <p><strong>Không chỉ ứng dụng trong học Toán,</strong> phương pháp đào tạo của HOCTOAN.VN còn giúp các em
                    vận dụng sáng tạo để học tốt các môn học khác. </p>
            </div>
        </section>

        <!-- Phần liên hệ -->
        <section class="contact-container">
            <!-- Gửi thư -->
            <div class="contact-box">
                <h2 style="text-align: center">Gửi thư cho chúng tôi</h2>
                <p class="sub-title" style="text-align: center">Chào mừng bạn đã đến website HỌC TOÁN.VN.</p>

                <div class="contact-info">
                    <div class="info-row">
                        <div class="info-item">
                            <span class="icon">📞</span>
                            <div>
                                <strong>Mobile/Zalo</strong>
                                <p>0916 025552</p>
                            </div>
                        </div>

                        <div class="info-item">
                            <span class="icon">✉️</span>
                            <div>
                                <strong>Email</strong>
                                <p>hoctoan.help@gmail.com</p>
                            </div>
                        </div>
                    </div>

                    <div class="info-item">
                        <span class="icon">📍</span>
                        <div>
                            <strong>Địa chỉ</strong>
                            <p>7 Lý Thường Kiệt, Hoàn Kiếm, Hà Nội</p>
                        </div>
                    </div>
                </div>

                <div class="social-icons">
                    <p><a href="#"><i class="fab fa-facebook-f"></i></a></p>
                    <p><a href="#"><i class="fab fa-youtube"></i></a></p>
                    <p><a href="#"><i class="fab fa-telegram"></i></a></p>
                </div>
            </div>

            <!-- Liên lạc ngay -->
            <div class="contact-box">
                <h2 style="text-align: center">Liên lạc ngay</h2>
                <p class="sub-title" style="text-align: center"><a href="#">Liên lạc ngay với chúng tôi qua ZALO</a></p>

                <div class="qr-code">
                    <img src="https://hoctoan.vn/wp-content/uploads/2022/02/Nhom-zalo-hoctoan.jpg" alt="QR Code">
                    <p>Liên lạc ngay qua nhóm Zalo</p>
                </div>
            </div>
        </section>

        <!-- Phần FAQs -->
        <section class="faqs">
            <h2 class="faqs-title">FAQs</h2>
            <div class="faq-wrapper">
                <div class="faq-column">
                    <h3>Hoàn phí</h3>
                    <div class="faq-item">
                        <button class="faq-question">Nếu đã thanh toán học phí, tôi có được hoàn phí không?<span
                                class="arrow"></span></button>
                        <div class="faq-answer">Có thể được hoàn phí theo chính sách của chúng tôi.</div>
                    </div>
                    <div class="faq-item">
                        <button class="faq-question">Làm thế nào để tôi nhận được hoàn phí?<span
                                class="arrow"></span></button>
                        <div class="faq-answer">Bạn cần gửi yêu cầu qua email hỗ trợ.</div>
                    </div>
                    <div class="faq-item">
                        <button class="faq-question">Sau thời hạn 7 ngày tôi có được hoàn phí không?<span
                                class="arrow"></span></button>
                        <div class="faq-answer">Không, hoàn phí chỉ áp dụng trong 7 ngày.</div>
                    </div>
                </div>

                <div class="faq-column">
                    <h3>Tham gia một khóa học</h3>
                    <div class="faq-item">
                        <button class="faq-question">Có những loại khóa học nào?<span class="arrow"></span></button>
                        <div class="faq-answer">Có các khóa học miễn phí và trả phí.</div>
                    </div>
                    <div class="faq-item">
                        <button class="faq-question">Làm thế nào để tham gia khóa học miễn phí?<span
                                class="arrow"></span></button>
                        <div class="faq-answer">Bạn có thể đăng ký trực tiếp trên website.</div>
                    </div>
                    <div class="faq-item">
                        <button class="faq-question">Làm thế nào để tham gia khóa học có phí?<span
                                class="arrow"></span></button>
                        <div class="faq-answer">Bạn cần thanh toán trước khi tham gia.</div>
                    </div>
                    <div class="faq-item">
                        <button class="faq-question">Làm thế nào để đăng ký tài khoản?<span class="arrow"></span></button>
                        <div class="faq-answer">Nhấp vào nút đăng ký và điền thông tin.</div>
                    </div>
                    <div class="faq-item">
                        <button class="faq-question">Dùng App trên điện thoại có lợi ích gì?<span
                                class="arrow"></span></button>
                        <div class="faq-answer">Bạn có thể học mọi lúc, mọi nơi.</div>
                    </div>
                </div>
            </div>
        </section>
    </div>
@endsection
<style scoped>
    .breadcrumbs-wrapper {
        font-size: var(--thim-breacrumb-font-size, 1em);
        color: var(--thim-breacrumb-color, #666);
        background-color: var(--thim-breacrumb-bg-color, transparent);
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
        color: #black;
        list-style: none;
    }

    .breadcrumbs-wrapper #breadcrumbs a {
        line-height: 25px;
        display: inline-block;
        color: var(--thim-breacrumb-color, #666);
        margin-right: 12px;
        text-decoration: none;
    }

    .title {
        font-size: 24px;
        font-weight: bold;
    }

    .description {
        text-align: center;
        font-size: 16px;
        line-height: 1.6;
        max-width: 800px;
        margin: auto;
    }

    .stats {
        display: flex;
        justify-content: center;
        gap: 20px;
        margin: 30px 0;
        flex-wrap: wrap;
    }

    .stat-box {
        background: white;
        padding: 20px;
        box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
        border-radius: 8px;
        width: 250px;
        text-align: center;
    }

    .number {
        font-size: 30px;
        font-weight: bold;
        color: #6d8b49;
    }

    .text {
        font-size: 14px;
        font-weight: bold;
        color: #a5a55f;
        margin-top: 5px;
    }

    .image-development img {
        width: 100%;
        border-radius: 8px;
    }

    /* Responsive */
    @media (max-width: 768px) {
        .stats {
            flex-direction: column;
            align-items: center;
        }

        .stat-box {
            width: 80%;
        }
    }

    .content {
        display: flex;
        justify-content: space-between;
        gap: 30px;
        margin-top: 20px;
    }

    .content .column {
        width: 50%;
    }

    .content h2 {
        font-size: 20px;
        margin-bottom: 10px;
        font-weight: bold;
    }

    .content p {
        font-size: 16px;
        margin-bottom: 10px;
    }

    /* Contact Section */
    .contact-container {
        display: flex;
        justify-content: space-between;
        gap: 30px;
        margin-top: 40px;
    }

    /* Mỗi khối contact */
    .contact-container .contact-box {
        width: 50%;
        padding: 20px;
        border: 1px solid #ddd;
        border-radius: 8px;
        /* background: #f9f9f9; */
    }

    .contact-container .sub-title {
        font-size: 14px;
        color: gray;
        margin-bottom: 15px;
        text-decoration: underline;
    }

    /* Thông tin liên hệ */
    .contact-container .contact-info {
        display: flex;
        flex-direction: column;
        gap: 10px;
        max-width: 100% !important;
        padding-right: 30px;
    }

    .contact-container .contact-info .info-row {
        display: flex;
        justify-content: space-between;
        gap: 20px;
    }

    .contact-container .contact-info .info-item {
        display: flex;
        align-items: center;
        gap: 10px;
        margin-bottom: 15px;
    }

    .contact-container .icon {
        font-size: 24px;
    }

    /* Social Icons */
    .contact-container .social-icons a img {
        width: 30px;
        margin-right: 10px;
    }

    /* QR Code */
    .contact-container .qr-code {
        text-align: center;
        margin-top: 20px;
    }

    .contact-container .qr-code img {
        width: 150px;
        height: auto;
    }

    /* Responsive */
    @media (max-width: 768px) {
        .content {
            flex-direction: column;
        }

        .content .column {
            width: 100%;
        }

        .contact-container {
            flex-direction: column;
        }

        .contact-container .contact-box {
            width: 100%;
        }

        .contact-container .contact-info .info-row {
            flex-direction: column;
            gap: 10px;
        }
    }

    @media (max-width: 999px) {
        .contact-container {
            flex-direction: column;
        }

        .contact-container .contact-box {
            width: 100%;
        }
    }


    .faqs {
        text-align: center;
        padding: 50px 20px;
        background-color: #fff;
    }

    .faqs-title {
        font-size: 28px;
        font-weight: bold;
        margin-bottom: 20px;
    }

    .faq-wrapper {
        display: flex;
        justify-content: center;
        gap: 50px;
        max-width: 1100px;
        margin: auto;
    }

    .faq-column {
        flex: 1;
        max-width: 500px;
        text-align: left;
    }

    .faq-column h3 {
        font-size: 20px;
        font-weight: bold;
        margin-bottom: 15px;
        text-transform: uppercase;
    }

    .faq-item {
        border: 1px solid #ddd;
        border-radius: 5px;
        margin-bottom: 10px;
        background-color: #f8f8f8;
        overflow: hidden;
    }

    .faq-question {
        width: 100%;
        background: none;
        border: none;
        text-align: left;
        font-size: 16px;
        font-weight: bold;
        padding: 12px;
        cursor: pointer;
        display: flex;
        justify-content: space-between;
        align-items: center;
    }

    .arrow {
        width: 15px;
        height: 15px;
        display: inline-block;
        background-image: url("data:image/svg+xml;utf8,<svg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 24 24'><path d='M6 9l6 6 6-6' stroke='%23000' stroke-width='2' fill='none' stroke-linecap='round' stroke-linejoin='round'/></svg>");
        background-repeat: no-repeat;
        background-size: contain;
        transition: transform 0.3s ease-in-out;
    }

    .faq-item.active .arrow {
        transform: rotate(180deg);
    }

    .faq-answer {
        display: none;
        padding: 10px 15px;
        font-size: 14px;
        background-color: #fff;
        color: #333;
        border-top: 1px solid #ddd;
    }

    @media (max-width: 768px) {
        .faq-wrapper {
            flex-direction: column;
        }
    }
</style>

<script>
    document.addEventListener("DOMContentLoaded", function() {
        document.querySelectorAll(".faq-question").forEach(button => {
            button.addEventListener("click", function() {
                const faqItem = this.parentElement;
                const answer = faqItem.querySelector(".faq-answer");

                if (faqItem.classList.contains("active")) {
                    answer.style.display = "none";
                    faqItem.classList.remove("active");
                } else {
                    document.querySelectorAll(".faq-answer").forEach(item => item.style
                        .display = "none");
                    document.querySelectorAll(".faq-item").forEach(item => item.classList
                        .remove("active"));

                    answer.style.display = "block";
                    faqItem.classList.add("active");
                }
            });
        });
    });
</script>

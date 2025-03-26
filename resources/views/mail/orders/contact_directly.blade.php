<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Xác nhận đơn hàng</title>
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: 'Poppins', sans-serif;
        }
        body {
            background-color: #f4f7fc;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }
        .container {
            background: #fff;
            padding: 25px;
            border-radius: 12px;
            box-shadow: 0px 4px 10px rgba(0, 0, 0, 0.1);
            width: 420px;
            text-align: center;
        }
        .header {
            background: #007bff;
            color: #fff;
            padding: 15px;
            font-size: 20px;
            font-weight: bold;
            border-radius: 8px 8px 0 0;
        }
        .content {
            padding: 20px;
            text-align: left;
        }
        .content p {
            margin-bottom: 10px;
            font-size: 14px;
            color: #333;
        }
        .highlight {
            font-weight: bold;
            color: #007bff;
        }
        .box {
            background: #f1f5ff;
            padding: 15px;
            border-radius: 8px;
            margin: 15px 0;
        }
        .box p {
            margin: 5px 0;
            font-size: 14px;
        }
        .seller {
            margin-top: 15px;
            font-size: 14px;
        }
        .button {
            display: inline-block;
            text-decoration: none;
            background: #007bff;
            color: #fff;
            padding: 12px 18px;
            border-radius: 8px;
            font-size: 14px;
            font-weight: bold;
            margin-top: 15px;
            transition: 0.3s;
        }
        .button:hover {
            background: #0056b3;
        }
    </style>
</head>
<body>

<div class="container">
    <div class="header">Xác nhận đơn hàng</div>
    <div class="content">
        <p>Xin chào <span class="highlight">Nguyễn Văn A</span>,</p>
        <p>Chúng tôi đã nhận được đơn hàng của bạn. Hiện tại, đơn hàng đang ở trạng thái <span class="highlight">Chờ thanh toán</span>.</p>

        <div class="box">
            <p><strong>Mã đơn hàng:</strong> #123456</p>
            <p><strong>Sản phẩm:</strong> Tên sản phẩm ABC</p>
            <p><strong>Giá:</strong> 1.200.000 VNĐ</p>
            <p><strong>Ngày đặt hàng:</strong> 26/03/2025</p>
        </div>

        <p>Vui lòng hoàn tất thanh toán sớm để đơn hàng của bạn được xử lý.</p>

        <div class="seller">
            <p><strong>Người bán:</strong> Nguyễn Văn B</p>
            <p><strong>Zalo:</strong> 0123 456 789</p>
        </div>

        <a href="#" class="button">Liên hệ người bán</a>
    </div>
</div>

</body>
</html>

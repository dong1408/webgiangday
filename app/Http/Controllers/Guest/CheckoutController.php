<?php

namespace App\Http\Controllers\Guest;

use Illuminate\Support\Facades\Session;
use App\Http\Controllers\Controller;
use App\Jobs\SendEmailJob;
use App\Models\Order;
use App\Models\OrderDetail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class CheckoutController extends Controller
{
    public function index()
    {
        $cart = Session::get('cart.buy', []);
        $cartInfo = Session::get('cart.info', []);
        // dd($cart, $cartInfo);
        return view('user.cart.checkout', compact('cart', 'cartInfo'));
    }


    // Thanh toán trả sau (liên hệ trực tiếp để thanh toán)
    public function paymentCod(Request $request)
    {
        $data = $request->all();

        $request->validate([
            'fullname' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'address' => 'required|string|max:500',
        ]);

        $cart = Session::get('cart.buy', []);
        if (empty($cart)) {
            return response()->json([
                'success' => false,
                'message' => "Hiện tại không có sản phẩm nào trong giỏ hàng!"
            ]);
        }

        // Tạo đơn hàng
        $totalPrice = array_sum(array_column($cart, 'price'));
        $order = Order::create([
            'user_id' => 1,
            'customer_name' => $request->fullname,
            'email' => $request->email,
            'address' => $request->address,
            'total_price' => $totalPrice,
            'payment_method' => 'COD',
            'status' => 'pending',
        ]);
        // Tạo chi tiết đơn hàng
        foreach ($cart as $item) {
            OrderDetail::create([
                'order_id' => $order->id,
                'course_id' => $item['course_id'],
                'course_name' => $item['name'],
                'price' => $item['price'],
            ]);
        }
        // Xóa giỏ hàng sau khi đặt hàng thành công
        Session::forget('cart');
        // Gửi mail
        $template = 'mail.orders.contact_directly';
        $data = [
            'userEmail' => 'tranvandong14082002@gmail.com',
            'subject' => 'test',
            'order' => $order
        ];
        SendEmailJob::dispatch($template, $data);
        return response()->json([
            'success' => true,
            'message' => 'Payment success!'
        ], 200);
    }


    // Thanh toán với momo
    public function paymentMomo()
    {
        $endpoint = env('MOMO_ENDPOINT');
        $partnerCode = env('MOMO_PARTNER_CODE');
        $accessKey = env('MOMO_ACCESS_KEY');
        $secretKey = env('MOMO_SECRET_KEY');

        try {
            $orderId = time();
            $amount = 10000; // Định nghĩa số tiền cần thanh toán
            $orderInfo = "Thanh toán đơn hàng $orderId";
            $redirectUrl = "https://5148-171-252-154-227.ngrok-free.app/momo/callback"; // URL xử lý sau khi thanh toán
            $ipnUrl = "https://5148-171-252-154-227.ngrok-free.app/momo/ipn";           // URL nhận phản hồi từ MoMo
            // $redirectUrl = route('momo.callback'); // URL xử lý sau khi thanh toán
            // $ipnUrl = route('momo.ipn'); // URL nhận phản hồi từ MoMo

            // Tạo signature (chữ ký bảo mật)
            $rawData = "accessKey=$accessKey&amount=$amount&extraData=&ipnUrl=$ipnUrl&orderId=$orderId&orderInfo=$orderInfo&partnerCode=$partnerCode&redirectUrl=$redirectUrl&requestId=$orderId&requestType=payWithATM";
            $signature = hash_hmac("sha256", $rawData, $secretKey);

            // Dữ liệu gửi đến MoMo
            $data = [
                "partnerCode" => $partnerCode,
                "accessKey" => $accessKey,
                "requestId" => $orderId,
                "amount" => $amount,
                "orderId" => $orderId,
                "orderInfo" => $orderInfo,
                "redirectUrl" => $redirectUrl,
                "ipnUrl" => $ipnUrl,
                "lang" => "vi",
                "extraData" => "",
                "requestType" => "payWithATM",
                "signature" => $signature
            ];

            // Gửi yêu cầu HTTP đến MoMo
            $response = Http::post($endpoint, $data);

            // if($response->successfull()){
            $body = $response->json();
            if (isset($body['payUrl'])) {
                return response()->json(['payUrl' => $body['payUrl']]);
            } else {
                // Trả về thông tin lỗi trong response nếu không có 'payUrl'
                return response()->json(['error' => 'Invalid response from Momo', 'details' => $body], 400);
            }
        } catch (\Exception $e) {
            // Trả về chi tiết ngoại lệ trong response
            return response()->json(['error' => 'Đã xảy ra lỗi', 'message' => $e->getMessage(), 'trace' => $e->getTraceAsString()], 500);
        }
    }


    public function callbackMomo(Request $request)
    {
        $orderId = $request->input('orderId');
        $resultCode = $request->input('resultCode');

        if ($resultCode == 0) {
            return response()->json(['message' => "Thanh toán thành công! Mã đơn hàng: $orderId"], 200);
        } else {
            return response()->json(['error' => "Thanh toán thất bại"], 400);
        }
    }
}

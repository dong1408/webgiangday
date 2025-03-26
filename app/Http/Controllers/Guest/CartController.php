<?php

namespace App\Http\Controllers\Guest;

use App\Http\Controllers\Controller;
use App\Jobs\SendEmailJob;
use App\Mail\OrderContactDirectly;
use App\Models\Course;
use App\Models\Order;
use App\Models\OrderDetail;
use App\Models\Schedule;
use Carbon\Carbon;
use Illuminate\Support\Facades\Session;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Symfony\Component\HttpKernel\Event\ViewEvent;

use function PHPSTORM_META\map;

class CartController extends Controller
{
    public function show()
    {
        $cart = Session::get('cart.buy', []);
        $days = [
            1 => 'Thứ 2',
            2 => 'Thứ 3',
            3 => 'Thứ 4',
            4 => 'Thứ 5',
            5 => 'Thứ 6',
            6 => 'Thứ 7',
            0 => 'Chủ nhật'
        ];
        return view('user.cart.show', compact('cart', 'days'));
    }

    public function addToCart(Request $request)
    {
        $request->validate([
            'course_id' => 'required|integer|exists:courses,id'
        ]);

        $cart = Session::get('cart.buy', []);

        $courseId = $request->input('course_id');
        $course = Course::find($courseId);
        if (!$course) {
            return response()->json([
                'success' => false,
                'message' => 'Có lỗi xảy ra, vui lòng thử lại!'
            ]);
        }

        $date = Carbon::parse($course->start_date);
        $startOfWeek = $date->copy()->startOfWeek()->toDateString();
        $endOfWeek = $date->copy()->endOfWeek()->toDateString();
        $schedules = Schedule::where('course_id', $courseId)
            ->whereBetween('date', [$startOfWeek, $endOfWeek])
            ->orderBy('date')
            ->get();

        // Trường hợp sản phẩm đã tồn tại trong giỏ hàng
        if (isset($cart[$courseId])) {
            return response()->json([
                'success' => false,
                'message' => 'Lớp học này đã được bạn thêm vào giỏ hàng trước đó!',
                'cart' => $cart
            ]);
        } else {
            $cart[$courseId] = [
                'course_id' => $courseId,
                'name' => $course->name,
                'price' => $course->price,
                'type' => $course->course_type,
                'image_url' => $course->image_url,
                'schedules' => $schedules,
                'start_date' => $course->start_date,
                'end_date' => $course->end_date
            ];
        }

        Session::put('cart.buy', $cart);
        $this->update_info_cart();


        return response()->json([
            'success' => true,
            'message' => 'Sản phẩm đã được thêm vào giỏ hàng!',
            'cart' => $cart
        ]);
    }


    private function update_info_cart()
    {
        if (Session::has('cart.buy')) {
            $num_order = 0;
            $total = 0;
            $cart = Session::get('cart.buy');

            // dd($cart);
            foreach ($cart as $item) {
                $num_order += 1;
                $total += $item['price'];
            }

            Session::put('cart.info', [
                'num_order' => $num_order,
                'total' => $total,
            ]);
        }
    }


    public function checkout()
    {
        $cart = Session::get('cart.buy', []);
        $cartInfo = Session::get('cart.info', []);
        // dd($cart, $cartInfo);
        return view('user.cart.checkout', compact('cart', 'cartInfo'));
    }

    public function payment(Request $request)
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

        $paymentMethod = $data['paymentMethod'];
        if ($paymentMethod == 'cod') {
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
        } elseif ($paymentMethod == 'momo') {
        }


        return response()->json([
            'success' => false,
            'message' => 'Sometime error, please try again!'
        ], 400);
    }


    public function success()
    {
        return view('checkout.success');
    }
}

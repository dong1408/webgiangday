<?php

namespace App\Http\Controllers\Guest;

use App\Http\Controllers\Controller;
use App\Models\Course;
use App\Models\Schedule;
use Carbon\Carbon;
use Illuminate\Support\Facades\Session;
use Illuminate\Http\Request;
use Symfony\Component\HttpKernel\Event\ViewEvent;

class CartController extends Controller
{
    public function show()
    {
        $cart = Session::get('cart', []);
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

        $cart = Session::get('cart', []);

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
                'type' => $course->course_type,
                'image_url' => $course->image_url,
                'schedules' => $schedules,
                'start_date' => $course->start_date,
                'end_date' => $course->end_date
            ];
        }

        Session::put('cart', $cart);

        return response()->json([
            'success' => true,
            'message' => 'Sản phẩm đã được thêm vào giỏ hàng!',
            'cart' => $cart
        ]);
    }


    public function checkout(){
        return view('user.cart.checkout');
    }
}

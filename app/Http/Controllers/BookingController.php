<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Tour;
use App\Models\Booking;

class BookingController extends Controller
{
    // ★ ここから追加：予約一覧表示処理
    public function index()
    {
        // 予約データをツアー情報（tour）と一緒に最新順で取得
        $bookings = Booking::with('tour')->latest()->paginate(15);

        return view('bookings.index', compact('bookings'));
    }
    
    // 予約フォーム表示
    public function create($tour_id)
    {
        $tour = Tour::findOrFail($tour_id);
        return view('bookings.create', compact('tour'));
    }

    // 予約保存処理
    public function store(Request $request, $tour_id)
    {
        $tour = Tour::findOrFail($tour_id);

        // バリデーション
        $validated = $request->validate([
            'customer_name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'phone' => 'required|string|max:20',
            'tour_date' => 'required|date|after:today',
            'number_of_people' => 'required|integer|min:1|max:20',
            'special_requests' => 'nullable|string|max:1000',
        ]);

        // 合計金額の計算
        $totalPrice = $tour->price * $validated['number_of_people'];

        // データベースに保存
        Booking::create([
            'tour_id' => $tour->id,
            'customer_name' => $validated['customer_name'],
            'email' => $validated['email'],
            'phone' => $validated['phone'],
            'tour_date' => $validated['tour_date'],
            'number_of_people' => $validated['number_of_people'],
            'total_price' => $totalPrice,
            'special_requests' => $validated['special_requests'],
        ]);

        return redirect()->route('bookings.success')->with('success', '予約が完了しました！');
    }

    // 予約完了画面
    public function success()
    {
        return view('bookings.success');
    }
}

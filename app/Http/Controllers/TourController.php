<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Tour;

class TourController extends Controller
{
    public function index()
    {
        // 最新順に1ページあたり9件取得（ペジネーション対応）
        $tours = Tour::latest()->paginate(9);

        return view('tours.index', compact('tours'));
    }

    // ★ ここから追加：ツアー詳細ページ表示
    public function show($id)
    {
        // 該当するIDのツアーを取得（存在しない場合は404ページを表示）
        $tour = Tour::findOrFail($id);

        return view('tours.show', compact('tour'));
    }
}

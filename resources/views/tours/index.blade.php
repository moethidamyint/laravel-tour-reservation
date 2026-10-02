<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ツアー一覧</title>
    <!-- Tailwind CSS (CDN) -->
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-50 text-gray-800">

    <!-- <header class="bg-white shadow">
        <div class="max-w-7xl mx-auto py-6 px-4">
            <h1 class="text-3xl font-bold text-gray-900">ツアー一覧</h1>
        </div>
    </header> -->
    <header class="bg-white shadow">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex justify-between items-center h-16">
                <h1 class="text-2xl font-bold text-gray-900">旅行予約システム</h1>
                
                <!-- ★ タブナビゲーション -->
                <nav class="flex space-x-4">
                    <a href="{{ route('tours.index') }}" 
                    class="px-4 py-2 text-sm font-semibold rounded-lg bg-blue-600 text-white shadow">
                        ツアー一覧
                    </a>
                    <a href="{{ route('bookings.index') }}" 
                    class="px-4 py-2 text-sm font-semibold rounded-lg text-gray-600 hover:bg-gray-100 hover:text-gray-900 transition">
                        予約管理一覧
                    </a>
                </nav>
            </div>
        </div>
    </header>

    <main class="max-w-7xl mx-auto py-10 px-4">
        @if($tours->isEmpty())
            <p class="text-center text-gray-500">現在、提供中のツアーはありません。</p>
        @else
            <!-- ツアーカード一覧 -->
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
                @foreach($tours as $tour)
                    <div class="bg-white rounded-xl shadow-md overflow-hidden hover:shadow-lg transition">
                        <!-- サムネイル画像 -->
                        <img class="h-48 w-full object-cover" 
                             src="{{ $tour->image_url ?? 'https://via.placeholder.com/600x400?text=Tour+Image' }}" 
                             alt="{{ $tour->title }}">

                        <div class="p-6">
                            <!-- エリア・期間 -->
                            <div class="flex items-center text-sm text-gray-500 mb-2">
                                <span class="bg-blue-100 text-blue-800 text-xs font-semibold px-2.5 py-0.5 rounded">
                                    {{ $tour->location }}
                                </span>
                                <span class="ml-auto">{{ $tour->duration_days }}日間</span>
                            </div>

                            <!-- タイトル -->
                            <h2 class="text-xl font-bold text-gray-900 mb-2">
                                {{ $tour->title }}
                            </h2>

                            <!-- 説明文 -->
                            <p class="text-gray-600 text-sm mb-4 line-clamp-3">
                                {{ $tour->description }}
                            </p>

                            <!-- 価格・詳細ボタン -->
                            <div class="flex items-center justify-between border-t pt-4">
                                <div>
                                    <span class="text-xs text-gray-400">お一人様</span>
                                    <div class="text-lg font-bold text-blue-600">
                                        ¥{{ number_format($tour->price) }}
                                    </div>
                                </div>
                                <a href="{{ route('tours.show', $tour->id) }}" class="px-4 py-2 bg-blue-600 text-white text-sm font-semibold rounded-lg hover:bg-blue-700 transition">
                                    詳細を見る
                                </a>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>

            <!-- ペジネーションリンク -->
            <div class="mt-8">
                {{ $tours->links() }}
            </div>
        @endif
    </main>

</body>
</html>
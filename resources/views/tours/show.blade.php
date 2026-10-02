<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $tour->title }} - ツアー詳細</title>
    <!-- Tailwind CSS (CDN) -->
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-50 text-gray-800">

    <!-- ヘッダー / パンくずリスト -->
    <header class="bg-white shadow-sm">
        <div class="max-w-5xl mx-auto py-4 px-4 sm:px-6 lg:px-8">
            <nav class="text-sm font-medium text-gray-500">
                <a href="{{ route('tours.index') }}" class="hover:text-blue-600">← ツアー一覧に戻る</a>
            </nav>
        </div>
    </header>

    <main class="max-w-5xl mx-auto py-10 px-4 sm:px-6 lg:px-8">
        <div class="bg-white rounded-2xl shadow-lg overflow-hidden">
            
            <!-- メイン画像 -->
            <div class="relative h-72 sm:h-96 w-full bg-gray-200">
                <img class="w-full h-full object-cover" 
                     src="{{ $tour->image_url ?? 'https://via.placeholder.com/1200x600?text=Tour+Image' }}" 
                     alt="{{ $tour->title }}">
                <div class="absolute top-4 left-4">
                    <span class="bg-blue-600 text-white text-xs font-bold px-3 py-1.5 rounded-full shadow">
                        {{ $tour->location }}
                    </span>
                </div>
            </div>

            <!-- ツアー情報詳細 -->
            <div class="p-6 sm:p-10">
                <div class="flex flex-wrap items-center justify-between gap-4 mb-6">
                    <h1 class="text-2xl sm:text-3xl font-bold text-gray-900">
                        {{ $tour->title }}
                    </h1>
                    <div class="text-right">
                        <span class="text-xs text-gray-500 block">お一人様（税込）</span>
                        <span class="text-3xl font-extrabold text-blue-600">
                            ¥{{ number_format($tour->price) }}
                        </span>
                    </div>
                </div>

                <!-- 概要情報カード -->
                <div class="grid grid-cols-2 sm:grid-cols-3 gap-4 p-4 bg-gray-50 rounded-xl mb-8 border border-gray-100">
                    <div>
                        <span class="text-xs text-gray-400 block">開催地</span>
                        <span class="font-semibold text-gray-700">{{ $tour->location }}</span>
                    </div>
                    <div>
                        <span class="text-xs text-gray-400 block">旅行期間</span>
                        <span class="font-semibold text-gray-700">{{ $tour->duration_days }} 日間</span>
                    </div>
                    <div>
                        <span class="text-xs text-gray-400 block">ツアーID</span>
                        <span class="font-semibold text-gray-700">#{{ str_pad($tour->id, 4, '0', STR_PAD_LEFT) }}</span>
                    </div>
                </div>

                <!-- ツアー説明文 -->
                <div class="prose max-w-none text-gray-600 leading-relaxed mb-10">
                    <h2 class="text-lg font-bold text-gray-900 mb-3 border-b pb-2">ツアー概要</h2>
                    <p class="whitespace-pre-line">{{ $tour->description }}</p>
                </div>

                <!-- 予約・問合せアクションボタン -->
                <div class="border-t pt-8 flex flex-col sm:flex-row items-center justify-between gap-4">
                    <a href="{{ route('tours.index') }}" class="w-full sm:w-auto text-center px-6 py-3 border border-gray-300 rounded-xl text-gray-700 font-semibold hover:bg-gray-50 transition">
                        一覧へ戻る
                    </a>
                    <a href="{{ route('bookings.create', $tour->id) }}" class="w-full sm:w-auto text-center px-8 py-3.5 bg-blue-600 text-white font-bold rounded-xl shadow-md hover:bg-blue-700 transition">
                        このツアーを予約する
                    </a>
                </div>

            </div>
        </div>
    </main>

</body>
</html>
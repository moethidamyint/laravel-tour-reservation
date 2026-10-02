<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>予約申込 - {{ $tour->title }}</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-50 text-gray-800">

    <div class="max-w-3xl mx-auto py-10 px-4">
        <a href="{{ route('tours.show', $tour->id) }}" class="text-sm font-medium text-gray-500 hover:text-blue-600 mb-6 inline-block">
            ← ツアー詳細に戻る
        </a>

        <div class="bg-white rounded-2xl shadow-lg overflow-hidden border border-gray-100">
            <!-- ヘッダー概要 -->
            <div class="bg-blue-600 text-white p-6 sm:p-8">
                <p class="text-blue-100 text-sm font-semibold">ツアー予約お申し込み</p>
                <h1 class="text-2xl sm:text-3xl font-bold mt-1">{{ $tour->title }}</h1>
                <p class="mt-2 text-blue-100">お一人様: ¥{{ number_format($tour->price) }} （{{ $tour->duration_days }}日間）</p>
            </div>

            <!-- エラー表示 -->
            @if ($errors->any())
                <div class="m-6 p-4 bg-red-50 border-l-4 border-red-500 text-red-700">
                    <p class="font-bold">入力内容に不備があります：</p>
                    <ul class="list-disc ml-5 mt-1 text-sm">
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <!-- フォーム -->
            <form action="{{ route('bookings.store', $tour->id) }}" method="POST" class="p-6 sm:p-8 space-y-6">
                @csrf

                <div>
                    <label class="block text-sm font-bold text-gray-700 mb-2">お名前 <span class="text-red-500">*</span></label>
                    <input type="text" name="customer_name" value="{{ old('customer_name') }}" required class="w-full px-4 py-3 rounded-lg border border-gray-300 focus:ring-2 focus:ring-blue-500 focus:outline-none" placeholder="山田 太郎">
                </div>

                <div class="grid grid-cols-1 sm:grid-cols-2 gap-6">
                    <div>
                        <label class="block text-sm font-bold text-gray-700 mb-2">メールアドレス <span class="text-red-500">*</span></label>
                        <input type="email" name="email" value="{{ old('email') }}" required class="w-full px-4 py-3 rounded-lg border border-gray-300 focus:ring-2 focus:ring-blue-500 focus:outline-none" placeholder="example@email.com">
                    </div>
                    <div>
                        <label class="block text-sm font-bold text-gray-700 mb-2">電話番号 <span class="text-red-500">*</span></label>
                        <input type="tel" name="phone" value="{{ old('phone') }}" required class="w-full px-4 py-3 rounded-lg border border-gray-300 focus:ring-2 focus:ring-blue-500 focus:outline-none" placeholder="090-1234-5678">
                    </div>
                </div>

                <div class="grid grid-cols-1 sm:grid-cols-2 gap-6">
                    <div>
                        <label class="block text-sm font-bold text-gray-700 mb-2">参加希望日 <span class="text-red-500">*</span></label>
                        <input type="date" name="tour_date" value="{{ old('tour_date') }}" required class="w-full px-4 py-3 rounded-lg border border-gray-300 focus:ring-2 focus:ring-blue-500 focus:outline-none">
                    </div>
                    <div>
                        <label class="block text-sm font-bold text-gray-700 mb-2">参加人数 <span class="text-red-500">*</span></label>
                        <select id="people_select" name="number_of_people" required class="w-full px-4 py-3 rounded-lg border border-gray-300 focus:ring-2 focus:ring-blue-500 focus:outline-none bg-white">
                            @for ($i = 1; $i <= 10; $i++)
                                <option value="{{ $i }}" {{ old('number_of_people') == $i ? 'selected' : '' }}>{{ $i }} 名</option>
                            @endfor
                        </select>
                    </div>
                </div>

                <div>
                    <label class="block text-sm font-bold text-gray-700 mb-2">ご質問・ご要望（任意）</label>
                    <textarea name="special_requests" rows="3" class="w-full px-4 py-3 rounded-lg border border-gray-300 focus:ring-2 focus:ring-blue-500 focus:outline-none" placeholder="アレルギーや配慮事項などがございましたらご記入ください。">{{ old('special_requests') }}</textarea>
                </div>

                <!-- 金額確認エリア -->
                <div class="p-4 bg-gray-50 rounded-xl flex justify-between items-center border border-gray-200">
                    <div>
                        <span class="text-sm text-gray-500 block">概算お支払い合計金額</span>
                        <span id="total_price_display" class="text-2xl font-extrabold text-blue-600">¥{{ number_format($tour->price) }}</span>
                    </div>
                    <span class="text-xs text-gray-400">（消費税込）</span>
                </div>

                <button type="submit" class="w-full py-4 bg-blue-600 text-white font-bold rounded-xl shadow-lg hover:bg-blue-700 transition text-lg">
                    予約を確定する
                </button>
            </form>
        </div>
    </div>

    <!-- 金額自動計算用スクリプト -->
    <script>
        const unitPrice = {{ $tour->price }};
        const selectElement = document.getElementById('people_select');
        const priceDisplay = document.getElementById('total_price_display');

        selectElement.addEventListener('change', function() {
            const count = parseInt(this.value);
            const total = unitPrice * count;
            priceDisplay.textContent = '¥' + total.toLocaleString();
        });
    </script>
</body>
</html>
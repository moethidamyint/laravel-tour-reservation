<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>予約管理一覧</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-50 text-gray-800">

    <!-- ★ タブ付きヘッダー -->
    <header class="bg-white shadow mb-8">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex justify-between items-center h-16">
                <h1 class="text-2xl font-bold text-gray-900">旅行予約システム</h1>
                
                <nav class="flex space-x-4">
                    <a href="{{ route('tours.index') }}" 
                       class="px-4 py-2 text-sm font-semibold rounded-lg text-gray-600 hover:bg-gray-100 hover:text-gray-900 transition">
                        ツアー一覧
                    </a>
                    <a href="{{ route('bookings.index') }}" 
                       class="px-4 py-2 text-sm font-semibold rounded-lg bg-blue-600 text-white shadow">
                        予約管理一覧
                    </a>
                </nav>
            </div>
        </div>
    </header>

    <main class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <h2 class="text-2xl font-bold text-gray-900 mb-6">予約管理一覧</h2>

        <div class="bg-white rounded-xl shadow overflow-hidden">
            <table class="min-w-full divide-y divide-gray-200">
                <thead class="bg-gray-50">
                    <tr>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">ID</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">予約者氏名</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">予約ツアー</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">参加希望日</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">人数</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">合計金額</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">連絡先情報</th>
                    </tr>
                </thead>
                <tbody class="bg-white divide-y divide-gray-200 text-sm">
                    @forelse ($bookings as $booking)
                        <tr class="hover:bg-gray-50">
                            <td class="px-6 py-4 font-mono font-bold text-gray-500">#{{ $booking->id }}</td>
                            <td class="px-6 py-4 font-bold text-gray-900">{{ $booking->customer_name }}</td>
                            <td class="px-6 py-4 text-blue-600 font-medium">
                                {{ $booking->tour->title ?? '削除されたツアー' }}
                            </td>
                            <td class="px-6 py-4">{{ $booking->tour_date }}</td>
                            <td class="px-6 py-4">{{ $booking->number_of_people }} 名</td>
                            <td class="px-6 py-4 font-semibold text-green-600">
                                ¥{{ number_format($booking->total_price) }}
                            </td>
                            <td class="px-6 py-4 text-xs text-gray-600">
                                <div><span class="text-gray-400">Email:</span> {{ $booking->email }}</div>
                                <div><span class="text-gray-400">TEL:</span> {{ $booking->phone }}</div>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="7" class="px-6 py-10 text-center text-gray-400">
                                現在、まだ予約データはありません。
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>

        <div class="mt-4 pb-12">
            {{ $bookings->links() }}
        </div>
    </main>

</body>
</html>
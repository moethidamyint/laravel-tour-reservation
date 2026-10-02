<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>予約完了</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-50 text-gray-800 flex items-center justify-center min-h-screen p-4">

    <div class="max-w-md w-full bg-white rounded-2xl shadow-xl p-8 text-center border border-gray-100">
        <div class="w-16 h-16 bg-green-100 text-green-500 rounded-full flex items-center justify-center mx-auto mb-4 text-3xl font-bold">
            ✓
        </div>
        
        <h1 class="text-2xl font-bold text-gray-900 mb-2">予約を受け付けました</h1>
        <p class="text-gray-600 text-sm mb-6">
            ご予約いただきありがとうございます。<br>
            確認用メールをお送りいたしましたのでご確認ください。
        </p>

        <a href="{{ route('tours.index') }}" class="inline-block w-full py-3 bg-blue-600 text-white font-semibold rounded-xl hover:bg-blue-700 transition">
            ツアー一覧に戻る
        </a>
    </div>

</body>
</html>
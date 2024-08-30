<html>

<head>
    <meta charset="UTF-8">
    <title>Bảo trì - Gulandmiennam</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="apple-touch-icon" sizes="180x180"
        href="https://guland.vn/bds/img/apple-touch-icon.png">
    <link rel="icon" type="image/png" sizes="32x32"
        href="https://guland.vn/bds/img/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="16x16"
        href="https://guland.vn/bds/img/favicon-16x16.png">
</head>

<body>
    <div class="min-h-screen flex items-center justify-center bg-zinc-900 text-white dark:bg-zinc-1000 dark:text-black">
        <div class="max-w-md p-8 bg-zinc-800 dark:bg-zinc-200 rounded-lg shadow-lg text-center">
            <a href="/"><img alt="Bảo trì" src="https://guland.vn/bds/img/logo-guland.png" class="mx-auto mb-4" /></a>
            <h1 class="text-2xl font-bold mb-2">Thông báo từ GulandMienNam</h1>
            <p class="mb-4">Bài đăng này đã bị lỗi do cú pháp đăng bài.</p>
            <p class="text-sm">Xin lỗi vì sự bất tiện này.<br> Nếu có lỗi hãy báo tới zalo: <a style="font-weight: 500; color: blue;" href="https://zalo.me/0345123856">Dev GulandMienNam</a></p>
            @if(Auth::check())
                @if($controller::checkRole($controller::getRole()->MainRole) >= 6 || Auth::user()->id == $poster['UpperID'] || Auth::user()->id == $poster['UserID'])
                    <a href="{{ route('method.delete-permanently', $id) }}" class="block bg-zinc-700 dark:bg-zinc-300 text-white dark:text-black rounded-lg px-4 py-2 mt-4">Xóa vĩnh viễn</a>
                @endif
            @endif
        </div>
    </div>
</body>

</html>

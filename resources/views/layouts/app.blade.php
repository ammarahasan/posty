<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <link href="{{ asset('css/style.css') }}" rel="stylesheet">
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">

    <title>المدونة الشخصية</title>
</head>

<body style="direction: rtl" class="bg-gray-200">

    <nav class="p-6 bg-white flex justify-between mb-6">
        <ul class="flex items-center">
            <li>
                <a href="{{ route('home') }}" class="p-3">الرئيسية</a>
            </li>
            <li>
                <a href="{{ route('dashboard') }}" class="p-3">لوحة التحكم</a>
            </li>
            <li>
                <a href="{{ route('posts') }}" class="p-3">المدونة</a>
            </li>
        </ul>

        <ul class="flex items-center">
            @auth
            <li>
                <a href="" class="p-3">{{ Auth::user()->name }}</a>
            </li>
            <li>
                <form action="{{ route('logout') }}" method="post" class="inline p-3">
                    @csrf
                    <button type="submit">خروج</button>
                </form>
            </li>
            @endauth

            @guest
            <li>
                <a href="{{ route('register') }}" class="p-3">تسجيل</a>
            </li>
            <li>
                <a href="{{ route('login') }}" class="p-3">دخول</a>
            </li>
            @endguest
        </ul>
    </nav>

    @yield("content")

    <footer class="p-4 text-center bg-white mt-5">CopyRight 2021 Ammar A Hasan</footer>
</body>

</html>
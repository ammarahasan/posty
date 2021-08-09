@extends("layouts.app")

@section("content")
<div class="flex justify-center mb-5">
    <div class="w-full mx-10 md:m-0 md:w-1/2 lg:w-1/3 bg-white p-6 rounded-lg">
        <h2 class="font-bold mb-4 text-gray-500 text-center border-b pb-2">التسجيل في الموقع</h2>
        <form action="{{ route('register') }}" method="post">
            @csrf
            <div class="mb-4">
                <label for="name" class="sr-only">الاسم الثلاثي</label>
                <input type="text" name="name" id="name" placeholder="الاسم الثلاثي"
                    class="bg-gray-100 border-2 w-full p-4 rounded-lg @error('name') border-red-500 @enderror"
                    value="{{ old('name') }}">
                @error('name')
                <div class="text-red-500 mt-2 text-sm">{{ $message }}</div>
                @enderror
            </div>
            <div class="mb-4">
                <label for="username" class="sr-only">اسم المستخدم</label>
                <input type="text" name="username" id="username" placeholder="اسم المستخدم"
                    class="bg-gray-100 border-2 w-full p-4 rounded-lg @error('username') border-red-500 @enderror"
                    value="{{ old('username') }}">
                @error('username')
                <div class="text-red-500 mt-2 text-sm">{{ $message }}</div>
                @enderror
            </div>
            <div class="mb-4">
                <label for="email" class="sr-only"></label>
                <input type="email" name="email" id="email" placeholder="البريد الالكتروني"
                    class="bg-gray-100 border-2 w-full p-4 rounded-lg @error('email') border-red-500 @enderror"
                    value="{{ old('email') }}">
                @error('email')
                <div class="text-red-500 mt-2 text-sm">{{ $message }}</div>
                @enderror
            </div>
            <div class="mb-4">
                <label for="password" class="sr-only"></label>
                <input type="password" name="password" id="password" placeholder="كلمة السر"
                    class="bg-gray-100 border-2 w-full p-4 rounded-lg @error('password') border-red-500 @enderror"
                    value="{{ old('password') }}">
                @error('password')
                <div class="text-red-500 mt-2 text-sm">{{ $message }}</div>
                @enderror
            </div>
            <div class="mb-4">
                <label for="password_confirmation" class="sr-only"></label>
                <input type="password" name="password_confirmation" id="password_confirmation"
                    placeholder="تأكيد كلمة السر"
                    class="bg-gray-100 border-2 w-full p-4 rounded-lg @error('password_confirmation') border-red-500 @enderror"
                    value="{{ old('password_confirmation') }}">
                @error('password_confirmation')
                <div class="text-red-500 mt-2 text-sm">{{ $message }}</div>
                @enderror
            </div>
            <div class="mb-4">
                <button type="submit" class="bg-blue-500 text-white px-4 py-3 rounded font-medium w-full">تسجيل</button>
            </div>
        </form>


    </div>
</div>
@endsection
@extends("layouts.app")

@section("content")
<div class="flex justify-center mb-5">
    <div class="w-full mx-10 md:m-0 md:w-1/2 lg:w-1/3 bg-white p-6 rounded-lg">
        <h2 class="font-bold mb-4 text-gray-800 text-center">دخول</h2>

        @if (session()->has('status'))
        <div class="bg-red-400 p-4 rounded-lg mb-6 text-white text-center">
            {{ session('status') }}
        </div>
        @endif

        <form action="{{ route('login') }}" method="post">
            @csrf
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
                <div class="flex items-center">
                    <input type="checkbox" name="remember" id="remember" class="ml-2">
                    <label for="remember">تذكرني</label>
                </div>
            </div>
            <div class="mb-4">
                <button type="submit" class="bg-blue-500 text-white px-4 py-3 rounded font-medium w-full">دخول</button>
            </div>
        </form>
    </div>
</div>
@endsection
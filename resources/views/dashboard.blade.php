@extends("layouts.app")

@section("content")
<div class="flex justify-center">
    <div class="w-10/12 bg-white p-6 rounded-lg">
        لوحة التحكم
        {{  Auth::user()->name }}
    </div>
</div>
@endsection
@extends("layouts.app")

@section("content")
<div class="flex justify-center">
    <div class="w-10/12 p-6 rounded-lg">

        <div class="p-6 mb-4 bg-white rounded-lg">
            <h2 class="text-2xl font-medium mb-1">{{ $user->name }}</h2>
            <p>عدد المنشورات {{ $posts->count() }} منشور - وحصل على {{ $user->receivedLikes->count() }} اعجاب</p>
        </div>


        @if ($posts->count())
        <div class="bg-white p-6 rounded-lg">
            @foreach ($posts as $post)
            <x-post :post="$post" />
            @endforeach
            {{ $posts->links() }}
            @else
            <p class="mb-2 mt-5">لا توجد منشورات</p>
            @endif
        </div>
    </div>
</div>
@endsection
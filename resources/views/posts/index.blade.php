@extends("layouts.app")

@section("content")
<div class="flex justify-center">
    <div class="w-10/12 bg-white p-6 rounded-lg">
        @auth
        <form action="{{ route('posts') }}" method="post" class="mb-4">
            @csrf
            <div class="mb-4">
                <label for="body" class="sr-only">منشور جديد</label>
                <textarea name="body" id="body" cols="30" rows="4"
                    class="bg-gray-100 border-2 w-full p-4 rounded-lg @error('body') border-red-500 @enderror"
                    placeholder="منشور جديد"></textarea>

                @error('body')
                <div class="text-red-500 mt-2 text-sm">{{ $message }}</div>
                @enderror
            </div>
            <div>
                <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded font-medium">انشر</button>
            </div>
        </form>
        @endauth

        @guest
        <p class="mb-4 text-red-500">سجل دخول لتتمكن من نشر منشور</p>
        @endguest


        @if ($posts->count())
        @foreach ($posts as $post)
        <x-post :post="$post" />
        @endforeach
        {{ $posts->links() }}
        @else
        <p class="mb-2 mt-5">لا توجد منشورات</p>
        @endif
    </div>
</div>
@endsection
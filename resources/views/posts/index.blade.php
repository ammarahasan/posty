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
        <div class="mb-4 mt-10">
            <a href="#" class="font-bold">{{ $post->user->name }}</a>
            <span class="text-gray-600 text-sm">{{ $post->created_at->diffForHumans() }}</span>
            <p class="mb-2">{{ $post->body }}</p>

            @can('delete', $post)
            <form action="{{ route('posts.destroy', $post) }}" method="post">
                @csrf
                @method('DELETE')
                <button type="submit" class="text-red-500">حذف المنشور</button>
            </form>
            @endcan

            @auth
            @if (!$post->likedBy(Auth::user()))
            <form action="{{ route('posts.likes', $post) }}" method="post" class="ml-1">
                @csrf
                <button type="submit" class="text-blue-500">أعجبني</button>
            </form>
            @else
            <form action="{{ route('posts.likes', $post) }}" method="post" class="ml-1">
                @csrf
                @method('DELETE')
                <button type="submit" class="text-blue-500">لم يعجبني</button>
            </form>
            @endif
            @endauth
            <span>{{ $post->likes->count() }} اعجاب</span>
        </div>
        @endforeach
        {{ $posts->links() }}
        @else
        <p class="mb-2 mt-5">لا توجد منشورات</p>
        @endif
    </div>
</div>
@endsection
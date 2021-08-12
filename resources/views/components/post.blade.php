@props(['post' => $post])

<div class="mb-4 mt-10">
    <a href="{{ route('users.posts' , $post->user) }}" class="font-bold">{{ $post->user->name }}</a>
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
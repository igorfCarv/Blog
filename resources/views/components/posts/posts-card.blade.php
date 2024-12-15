@props(['post'])

<div class="text-center">
    <a href="{{route('posts.details', $post->id)}}">
        <div>
            <img class="w-full h-72 object-cover rounded-xl" src="{{ asset('storage/' . $post->image) }}">
        </div>
    </a>
    <div class="mt-3">
        <div class="flex items-center mb-2">
            <a href="{{route('posts.details', $post->id)}}" class="bg-red-600
        text-white
        rounded-xl px-3 py-1 text-sm mr-3">
            Laravel
            </a>
            <p class="text-gray-500 text-sm">{{ $post->published_at }}</p>
        </div>
        <a href="{{route('posts.details', $post->id)}}" class="text-xl font-bold text-gray-900">{{ $post->title }}</a>
    </div>
</div>

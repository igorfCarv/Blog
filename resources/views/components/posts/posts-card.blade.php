@props(['post'])
<div class="text-center">
    <a href="{{route('posts.details', $post->id)}}">
        <div>
            <img class="w-full h-72 object-cover rounded-xl" src="{{ asset('storage/' . $post->image) }}">
        </div>
    </a>
    <div class="mt-3">
        <div class="flex flex-col items-center mb-2">
            <div class="flex">
                @foreach ($post->categories as $item)
                <a href="{{route('posts.details', $post->id)}}" class="

                    rounded-xl px-3 py-1 text-sm mr-3" style="background-color: {{ $item->bg_color }}; color: {{ $item->text_color }} ">
                        {{ $item->title }}
                        </a>
                @endforeach
            </div>
            <p class="text-gray-500 text-sm">{{ $post->published_at }}</p>
        </div>
        <a href="{{route('posts.details', $post->id)}}" class="text-xl font-bold text-gray-900">{{ $post->title }}</a>
    </div>
</div>

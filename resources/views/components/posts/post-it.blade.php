@props(['post'])
    <article class="[&:not(:last-child)]:border-b border-gray-100 pb-10">
        <div class="article-body grid grid-cols-12 gap-3 mt-5 items-start">
            <div class="article-thumbnail col-span-4 flex items-center">
                <a href="{{route('posts.details', $post->id)}}" >
                    <img class="mw-100 mx-auto rounded-xl"
                         src="{{asset('storage/' . $post->image)}}"
                         alt="thumbnail">
                </a>
            </div>
            <div class="col-span-8">
                <div class="article-meta flex py-1 text-sm items-center">
                    <img class="w-7 h-7 rounded-full mr-3"
                         src="{{$post->author->profile_photo_url}}"
                         alt="{{$post->author->name}}">
                    <span class="mr-1 text-xs">{{$post->author->name}}</span>
                    <span class="text-gray-500 text-xs">. {{$post->published_at->diffForHumans()}}</span>
                </div>
                <h2 class="text-xl font-bold text-gray-900">
                    <a href="{{route('posts.details',$post->id)}}" >
                        {{$post->title}}
                    </a>
                </h2>
                <p class="mt-2 text-base text-gray-700 font-light">
                    {{$post->getExcerpt()}}
                </p>
                @foreach ($post->categories as $item)
                <a href="{{route('posts.details', $post->id)}}" class="rounded-xl px-3 py-1 text-sm mr-3" style="background-color: {{ $item->bg_color }}; color: {{ $item->text_color }} "> 
                        {{ $item->title }}
                        </a>
                @endforeach
                <div class="article-actions-bar mt-6 flex items-center justify-between">
                    <div class="flex items-center space-x-4">
                        <span class="text-gray-500 text-sm">Lido à {{$post->getReadingTime()}} minuto atrás</span>
                    </div>
                </div>
            </div>
        </div>
    </article>


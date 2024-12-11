<div class=" px-3 lg:px-7 py-6">
    <div class="flex justify-between items-center border-b border-gray-100">
        <div class="text-gray-600">
            @if($search)
                Procurando por "{{$search}}"
            @endif
        </div>
        <div class="flex items-center space-x-4 font-light ">
            <button class="{{ $sort === 'desc' ? 'text-gray-900 border-b border-gray-700' : 'text-gray-500' }} py-4" wire:click="setSort('desc')">Mais recente</button>
            <button class="{{ $sort === 'asc' ? 'text-gray-900 border-b border-gray-700' : 'text-gray-500' }} py-4" wire:click="setSort('asc')">Mais antigo</button>
        </div>
    </div>
    <div class="py-4">
        @foreach($this->posts as $post)
            <x-posts.post-it :post="$post"/>
        @endforeach
    </div>
    <div class="my-3">
        {{$this->posts->onEachSide(1)->links()}}
    </div>
</div>

<div class="px-3 lg:px-7 py-6">

    <div class="flex justify-between items-center border-b border-gray-100">
        <div class="text-gray-600">
            @if($search)
                Procurando por "{{$search}}"
            @endif
        </div>
        <div class="flex items-center space-x-4 font-light">
            <div class="mb-4 ">
                <select wire:model="categoryId" wire:change="filterByCategory($event.target.value)" class="form-select border border-gray-300 px-7 py-3 rounded-lg">
                    <option value="">Filtre por categoria</option>
                    @foreach($categories as $category)
                        <option value="{{ $category->id }}">{{ $category->title }}</option>
                    @endforeach
                </select>
            </div>
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

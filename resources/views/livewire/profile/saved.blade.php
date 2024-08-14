<x-profile-layout :user="$user">
    <div class="grid grid-cols-3 gap-4">
        @foreach ($posts as $post)
        <div class="relative group">
            @php
            $cover = $post->media()->first();
            @endphp
            <div class="overflow-hidden rounded-lg aspect-w-1 aspect-h-1">
                @switch($cover?->mime)
                @case('video')
                <x-video source="{{$cover->url}}" />
                @break
                @case('image')
                <img src="{{$cover->url}}" alt="Cover Image" class="object-cover w-full h-full">
                @break
                @default
                <!-- Handle other media types or fallback -->
                @endswitch
            </div>
            <div class="absolute inset-0 flex items-center justify-center opacity-0 group-hover:opacity-100 transition-opacity duration-300 bg-black bg-opacity-50">
                <a href="#" onclick="Livewire.dispatch('openModal',{component:'post.view.modal',arguments:{'post':{{$post->id}}}})" class="text-white text-lg"><i class="fas fa-search"></i></a>
            </div>
        </div>
        @endforeach
    </div>
</x-profile-layout>
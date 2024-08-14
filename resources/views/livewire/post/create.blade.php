<div class="bg-white lg:h-[500px] flex flex-col border rounded-lg shadow-md gap-y-4 px-5">

    {{-- Top header --}}
    <header class="w-full py-2 border-b">
        <div class="flex justify-between items-center">

            <button wire:click="$dispatch('closeModal')" class="font-bold text-gray-600 hover:text-gray-900">
                X
            </button>

            <div class="text-lg font-bold text-gray-800">
                Create New Post
            </div>

            <button @disabled(count($media) == 0) wire:loading.attr='disabled' wire:click='submit' class="text-blue-500 font-bold">
                Share
            </button>

        </div>
    </header>

    <main class="grid grid-cols-12 gap-3 h-full w-full overflow-hidden">

        {{-- Media --}}
        <aside class="lg:col-span-7 m-auto items-center w-full overflow-hidden">
            @if (count($media) == 0)
                {{-- trigger button --}}
                <label for="customFileInput" class="m-auto max-w-fit flex-col flex gap-3 cursor-pointer items-center">
                    <input wire:model.live="media" type="file" multiple accept=".jpg,.png,.jpeg,.mp4,.mov" id="customFileInput" class="sr-only">

                    <span class="m-auto">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-14 h-14 text-gray-500">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M2.25 15.75l5.159-5.159a2.25 2.25 0 013.182 0l5.159 5.159m-1.5-1.5l1.409-1.409a2.25 2.25 0 013.182 0l2.909 2.909m-18 3.75h16.5a1.5 1.5 0 001.5-1.5V6a1.5 1.5 0 00-1.5-1.5H3.75A1.5 1.5 0 002.25 6v12a1.5 1.5 0 001.5 1.5zm10.5-11.25h.008v.008h-.008V8.25zm.375 0a.375.375 0 11-.75 0 .375.375 0 01.75 0z" />
                        </svg>
                    </span>

                    <span class="bg-blue-500 text-white text-sm rounded-lg p-2 px-4">
                        Upload Files from Computer
                    </span>
                </label>
            @else
                {{-- Show when file count is > 0 --}}
                <div class="flex overflow-x-auto w-full h-96 snap-x snap-mandatory px-2">
                    @foreach ($media as $key => $file)
                        <div class="flex-none w-80 h-full snap-center p-2 border rounded-lg">
                            @if (strpos($file->getMimeType(), 'image') !== false)
                                <img src="{{ $file->temporaryUrl() }}" alt="" class="w-full h-full object-contain rounded-lg">
                            @elseif (strpos($file->getMimeType(), 'video') !== false)
                                <video controls class="w-full h-full object-contain rounded-lg">
                                    <source src="{{ $file->temporaryUrl() }}" type="{{ $file->getMimeType() }}">
                                    Your browser does not support the video tag.
                                </video>
                            @endif
                        </div>
                    @endforeach
                </div>
            @endif
        </aside>

        {{-- Details --}}
        <aside class="lg:col-span-5 h-full border-l p-3 flex flex-col gap-4 overflow-hidden overflow-y-scroll">

            {{-- Author --}}
            <div class="flex items-center gap-2">
                <x-avatar wire:ignore src="{{ asset('storage/' . auth()->user()->avatar) }}" class="w-12 h-12" />
                <h5 class="font-bold">{{ auth()->user()->name }}</h5>
            </div>

            {{-- Description --}}
            <div>
                <textarea wire:model="description" placeholder="Add a caption" class="border-0 focus:border-0 px-0 w-full rounded-lg bg-white h-32 focus:outline-none focus:ring-0"></textarea>
            </div>

            {{-- Location --}}
            <div class="w-full items-center">
                <input type="text" wire:model='location' placeholder="Add location" class="border-0 focus:border-0 px-0 w-full rounded-lg bg-white focus:outline-none focus:ring-0">
            </div>

            {{-- Advanced settings --}}
            <div>
                <h6 class="text-gray-500 font-medium text-base">Advanced Settings</h6>

                <ul class="mt-2 space-y-4">
                    <li class="flex items-center justify-between">
                        <span>Hide like and view counts on this post</span>
                        <label class="relative inline-flex items-center mb-5 cursor-pointer">
                            <input wire:model='hide_like_view' type="checkbox" class="sr-only peer">
                            <div class="w-11 h-6 bg-gray-200 peer-focus:outline-none peer-focus:ring-4 peer-focus:ring-blue-300 rounded-full peer dark:bg-gray-700 peer-checked:after:translate-x-full peer-checked:after:border-white after:content-[''] after:absolute after:top-[2px] after:left-[2px] after:bg-white after:border-gray-300 after:rounded-full after:h-5 after:w-5 after:transition-all peer-checked:bg-blue-600"></div>
                        </label>
                    </li>
                    <li class="flex items-center justify-between">
                        <span>Allow commenting</span>
                        <label class="relative inline-flex items-center mb-5 cursor-pointer">
                            <input wire:model='allow_commenting' type="checkbox" class="sr-only peer">
                            <div class="w-11 h-6 bg-gray-200 peer-focus:outline-none peer-focus:ring-4 peer-focus:ring-blue-300 rounded-full peer dark:bg-gray-700 peer-checked:after:translate-x-full peer-checked:after:border-white after:content-[''] after:absolute after:top-[2px] after:left-[2px] after:bg-white after:border-gray-300 after:rounded-full after:h-5 after:w-5 after:transition-all peer-checked:bg-blue-600"></div>
                        </label>
                    </li>
                </ul>
            </div>
        </aside>
    </main>
</div>
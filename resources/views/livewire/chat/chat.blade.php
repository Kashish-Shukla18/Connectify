<div x-data="{ 
        height: 0,
        conversationElement: document.getElementById('conversation')
    }" x-init="
        height = conversationElement.scrollHeight;
        $nextTick(() => conversationElement.scrollTop = height);

        Echo.private('users.{{ auth()->user()->id }}')
            .notification((notification) => {
                if (
                    notification['type'] == 'App\\Notifications\\MessageSentNotification' &&
                    notification['conversation_id'] == {{ $conversation->id }}
                ) {
                    $wire.listenBroadcastedMessage(notification);
                }
            });
    " @scroll-bottom.window="$nextTick(() => conversationElement.scrollTop = conversationElement.scrollHeight)" class="flex flex-col h-screen">
    <!-- Header -->
    <header class="flex items-center justify-between px-6 py-3 bg-blue-400 border-b">
        <div class="flex items-center gap-3">
            <a href="{{ route('chat') }}" class="block p-2 rounded-full hover:bg-gray-100">
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" class="w-6 h-6 text-gray-500">
                    <path fill-rule="evenodd" d="M10.293 12.293a1 1 0 0 0 1.414 0l5-5a1 1 0 0 0-1.414-1.414L11 9.586V3a1 1 0 1 0-2 0v6.586L4.707 5.879a1 1 0 1 0-1.414 1.414l5 5z" clip-rule="evenodd" />
                </svg>
            </a>
            <div class="flex items-center">
                <a href="{{ route('profile.home', $receiver->username) }}" class="flex-shrink-0 block">
                    <img class="h-10 w-10 rounded-full" src="{{ asset('storage/' . $receiver->avatar) }}" alt="{{ $receiver->name }}">
                </a>
                <div class="ml-3">
                    <p class="font-bold text-gray-900 leading-none">{{ $receiver->name }}</p>
                </div>
            </div>
        </div>
    </header>

    <!-- Messages -->
    <main id="conversation" class="flex-1 overflow-y-auto px-6 py-4 bg-gray-100">
        @foreach ($loadedMessages as $message)
        <div class="flex flex-col items-{{ $message->sender_id == auth()->id() ? 'end' : 'start' }} my-2">
            <div class="max-w-xs mx-2 px-4 py-2 rounded-lg {{ $message->sender_id == auth()->id() ? 'bg-blue-500 text-white' : 'bg-white text-gray-800' }}">
                @if ($message->photo)
                <img src="{{ asset('storage/' . $message->photo) }}" class="max-w-full h-auto rounded-lg mb-2" alt="Message photo">
                @endif
                <p class="text-sm leading-normal">{{ $message->body }}</p>
            </div>
        </div>
        @endforeach
    </main>

    <!-- Send Message -->
    <footer class="flex items-center justify-between px-6 py-3 bg-blue-200 border-t">
        <form wire:submit.prevent="sendMessage" enctype="multipart/form-data" class="flex items-center w-full">
            <input wire:model.defer="body" type="text" name="message" placeholder="Type your message..." class="flex-1 px-3 py-2 rounded-lg bg-gray-100 focus:outline-none border-2 border-gray-200 mr-2">
            <label class="flex-shrink-0 relative cursor-pointer">
                <input wire:model="photo" type="file" name="photo" accept="image/*" class="hidden">
                <!-- SVG icon starts here -->
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="none" viewBox="0 0 24 24" stroke-width="1.9" stroke="black" class="w-9 h-7 mr-3 text-gray-500 hover:text-gray-600 cursor-pointer">
                    <path fill-rule="evenodd" d="M2.25 15.75l5.159-5.159a2.25 2.25 0 013.182 0l5.159 5.159m-1.5-1.5l1.409-1.409a2.25 2.25 0 013.182 0l2.909 2.909m-18 3.75h16.5a1.5 1.5 0 001.5-1.5V6a1.5 1.5 0 00-1.5-1.5H3.75A1.5 1.5 0 002.25 6v12a1.5 1.5 0 001.5 1.5zm10.5-11.25h.008v.008h-.008V8.25zm.375 0a.375.375 0 11-.75 0 .375.375 0 01.75 0z" clip-rule="evenodd" />
                    <path fill-rule="evenodd" d="M2.25 15.75l5.159-5.159a2.25 2.25 0 013.182 0l5.159 5.159m-1.5-1.5l1.409-1.409a2.25 2.25 0 013.182 0l2.909 2.909m-18 3.75h16.5a1.5 1.5 0 001.5-1.5V6a1.5 1.5 0 00-1.5-1.5H3.75A1.5 1.5 0 002.25 6v12a1.5 1.5 0 001.5 1.5zm10.5-11.25h.008v.008h-.008V8.25zm.375 0a.375.375 0 11-.75 0 .375.375 0 01.75 0z" clip-rule="evenodd" />
                </svg>
                <!-- SVG icon ends here -->
            </label>
            <button type="submit" class="px-4 py-2 bg-blue-500 text-white rounded-lg hover:bg-blue-600 focus:outline-none">Send</button>
        </form>

        @if ($photoPreview)
        <div class="flex items-center ml-4">
            <img src="{{ $photoPreview }}" class="h-10 w-10 rounded-lg mr-2" alt="Photo preview">
            <button type="button" wire:click="removePhoto" class="px-2 py-1 bg-red-500 text-white rounded-lg hover:bg-red-600 focus:outline-none">Remove</button>
        </div>
        @endif
    </footer>
</div>

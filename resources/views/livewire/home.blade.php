<div x-data="{
        canLoadMore: @entangle('canLoadMore'),
        showModal: false
    }" @scroll.window.throttle="
        let scrollTop = window.scrollY || window.scrollTop;
        let divHeight = window.innerHeight || document.documentElement.clientHeight;
        let scrollHeight = document.documentElement.scrollHeight;

        let isScrolled = scrollTop + divHeight >= scrollHeight - 1;

        if (isScrolled && canLoadMore) {
            @this.loadMore();
        }
    " class="w-full h-full">
  {{-- Header --}}
  <header class="md:hidden sticky top-0 z-50 bg-white">
    <div class="grid grid-cols-12 gap-2 items-center">
      <div class="col-span-3">
        <img src="{{ asset('assets/logo.png') }}" class="h-25 w-25" alt="logo">
      </div>
      <div class="col-span-8 flex justify-center px-2">
        <input type="text" placeholder="Search" class="border-0 outline-none w-full focus:outline-none sm:bg-transparent bg-gray-100 rounded-lg focus:ring-0 hover:ring-0">
      </div>
      <div class="col-span-1 flex justify-center">
        <a href="#">
          <span>
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.9" stroke="currentColor" class="w-6 h-6">
              <path stroke-linecap="round" stroke-linejoin="round" d="M21 8.25c0-2.485-2.099-4.5-4.688-4.5-1.935 0-3.597 1.126-4.312 2.733-.715-1.607-2.377-2.733-4.313-2.733C5.1 3.75 3 5.765 3 8.25c0 7.22 9 12 9 12s9-4.78 9-12z" />
            </svg>
          </span>
        </a>
      </div>
    </div>
  </header>

  {{-- Main --}}
  <main class="grid lg:grid-cols-12">
    <aside class="lg:col-span-8 overflow-hidden shadow-lg p-6">
      {{-- Posts --}}
      <section class="space-y-4 p-2">
        @if ($posts->isNotEmpty())
        @foreach ($posts as $post)
        <livewire:post.item wire:key="post-{{ $post->id }}" :post="$post" />
        @endforeach
        @else
        <div class="flex items-center justify-center" style="height: 100vh;">
          <p class="font-bold text-lg">No posts yet</p>
        </div> @endif
      </section>
    </aside>


    {{-- Suggestions --}}
    <aside class="bg-gradient-to-br from-blue-200 lg:col-span-4 hidden lg:block p-6">
      <div>
        <div class="flex items-center gap-2">
          @if (auth()->user()->avatar)
          <x-avatar wire:ignore src="{{ asset('storage/' . auth()->user()->avatar) }}" class="w-12 h-12" />
          @else
          <svg class="w-12 h-12 text-gray-300 bg-gray-100 rounded-full" xmlns="http://www.w3.org/2000/svg" shape-rendering="geometricPrecision" text-rendering="geometricPrecision" image-rendering="optimizeQuality" fill-rule="evenodd" clip-rule="evenodd" viewBox="0 0 512 512">
            <path fill="#A7A9AE" fill-rule="nonzero" d="M256 0c70.69 0 134.69 28.655 181.018 74.982C483.345 121.31 512 185.31 512 256s-28.655 134.69-74.982 181.018C390.69 483.345 326.69 512 256 512s-134.69-28.655-181.018-74.982C28.655 390.69 0 326.69 0 256S28.655 121.31 74.982 74.982C121.31 28.655 185.31 0 256 0zm-49.371 316.575c-.992-1.286 2.594-10.118 3.443-11.546-9.722-8.651-17.404-17.379-19.041-35.34l-1.043.022c-2.408-.032-4.729-.586-6.903-1.825-3.481-1.979-5.93-5.379-7.583-9.212-3.5-8.043-15.031-34.738 2.537-32.628-9.823-18.345 12.409-49.684-25.935-61.275 31.46-39.845 97.839-101.281 146.483-39.654 53.245 5.16 69.853 68.437 34 103.093 2.101.076 4.08.56 5.832 1.498 6.665 3.57 6.884 11.318 5.132 17.819-1.733 5.429-3.934 9.104-6.01 14.397-2.524 7.147-6.215 8.478-13.345 7.708-.362 17.67-8.528 26.343-19.518 36.724l3.007 10.187c-14.737 31.261-75.957 32.518-101.056.032zM78.752 394.224c12.076-51.533 45.656-33.396 110.338-73.867 22.982 47.952 116.386 51.437 135.54 0 55.35 35.384 98.967 20.923 109.958 72.138 28.965-37.841 46.176-85.158 46.176-136.495 0-62.068-25.158-118.26-65.83-158.934C374.26 56.394 318.068 31.236 256 31.236S137.74 56.394 97.066 97.066C56.394 137.74 31.236 193.932 31.236 256c0 52.123 17.744 100.099 47.516 138.224z" />
          </svg>
          @endif
          <h4 class="font-medium" wire:ignore>{{ auth()->user()->name }}</h4>
        </div>
      </div>


      {{-- Suggestions for you --}}
      <section class="mt-4">
        <h4 class="font-bold text-gray-700/95">Suggestions for you</h4>
        <ul class="my-2 space-y-3">
          @foreach ($suggestedUsers as $key => $user)
          @if ($user->id !== auth()->id())
          <li class="flex items-center gap-3">
            <a href="{{ route('profile.home', $user->username) }}">
              @if ($user->avatar)
              <x-avatar wire:ignore src="{{ asset('storage/' . $user->avatar) }}" class="w-12 h-12" />
              @else
              <svg class="w-12 h-12 text-gray-300 bg-gray-100 rounded-full" xmlns="http://www.w3.org/2000/svg" shape-rendering="geometricPrecision" text-rendering="geometricPrecision" image-rendering="optimizeQuality" fill-rule="evenodd" clip-rule="evenodd" viewBox="0 0 512 512">
                <path fill="#A7A9AE" fill-rule="nonzero" d="M256 0c70.69 0 134.69 28.655 181.018 74.982C483.345 121.31 512 185.31 512 256s-28.655 134.69-74.982 181.018C390.69 483.345 326.69 512 256 512s-134.69-28.655-181.018-74.982C28.655 390.69 0 326.69 0 256S28.655 121.31 74.982 74.982C121.31 28.655 185.31 0 256 0zm-49.371 316.575c-.992-1.286 2.594-10.118 3.443-11.546-9.722-8.651-17.404-17.379-19.041-35.34l-1.043.022c-2.408-.032-4.729-.586-6.903-1.825-3.481-1.979-5.93-5.379-7.583-9.212-3.5-8.043-15.031-34.738 2.537-32.628-9.823-18.345 12.409-49.684-25.935-61.275 31.46-39.845 97.839-101.281 146.483-39.654 53.245 5.16 69.853 68.437 34 103.093 2.101.076 4.08.56 5.832 1.498 6.665 3.57 6.884 11.318 5.132 17.819-1.733 5.429-3.934 9.104-6.01 14.397-2.524 7.147-6.215 8.478-13.345 7.708-.362 17.67-8.528 26.343-19.518 36.724l3.007 10.187c-14.737 31.261-75.957 32.518-101.056.032zM78.752 394.224c12.076-51.533 45.656-33.396 110.338-73.867 22.982 47.952 116.386 51.437 135.54 0 55.35 35.384 98.967 20.923 109.958 72.138 28.965-37.841 46.176-85.158 46.176-136.495 0-62.068-25.158-118.26-65.83-158.934C374.26 56.394 318.068 31.236 256 31.236S137.74 56.394 97.066 97.066C56.394 137.74 31.236 193.932 31.236 256c0 52.123 17.744 100.099 47.516 138.224z" />
              </svg>
              @endif
            </a>
            <div class="grid grid-cols-7 w-full gap-2">
              <div class="col-span-5">
                <a href="{{ route('profile.home', $user->username) }}" class="font-semibold truncate text-sm">{{ $user->name }}</a>
                <p class="text-xs truncate" wire:ignore>Batch: {{ $user->batch }}</p>
              </div>
              <div class="col-span-2 flex text-right justify-end">
                @if (auth()->user()->isFollowing($user))
                <button wire:click="toggleFollow({{ $user->id }})" class="font-bold text-blue-500 ml-auto text-sm">Following</button>
                @else
                <button wire:click="toggleFollow({{ $user->id }})" class="font-bold text-blue-500 ml-auto text-sm">Follow</button>
                @endif
              </div>
            </div>
          </li>
          @endif
          @endforeach
        </ul>
      </section>

      {{-- App links --}}
      <section class="mt-10">
        <ol class="flex gap-2 flex-wrap">
          <li class="text-xs text-gray-800/90 font-medium"><a href="#" class="hover:underline">About</a></li>
          <li class="text-xs text-gray-800/90 font-medium"><a href="#" class="hover:underline">Help</a></li>
          <li class="text-xs text-gray-800/90 font-medium"><a href="#" class="hover:underline">Jobs</a></li>
          <li @click="showModal = true" class="text-xs text-gray-800/90 hover:underline cursor-pointer font-medium">Privacy&Policy</li>
        </ol>
        <h3 class="text-gray-800/90 mt-6 text-sm">@CONNECTIFY</h3>
      </section>
    </aside>
  </main>

  {{-- Modal --}}
  <div x-show="showModal" x-cloak class="m-2 rounded-md fixed inset-0 z-50 overflow-y-auto">
    <div class="flex items-center justify-center min-h-screen px-4">
      <div class="fixed inset-0 transition-opacity">
        <div class="absolute inset-0 bg-gray-500 opacity-75"></div>
      </div>
      <div class="bg-white rounded-lg overflow-hidden shadow-xl transform transition-all sm:max-w-3xl sm:w-full lg:max-w-4xl lg:w-full relative">
        <div class="absolute top-0 right-0 pt-4 pr-4">
          <button @click="showModal = false" type="button" class="text-gray-400 hover:text-gray-500 focus:outline-none focus:text-gray-500">
            <span class="sr-only">Close</span>
            <svg class="h-6 w-6" stroke="currentColor" fill="none" viewBox="0 0 24 24">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
            </svg>
          </button>
        </div>
        <div class="px-6 pt-5 pb-4 sm:p-6 sm:pb-4">
          <div class="sm:flex sm:items-start">
            <div class="mt-3 text-center sm:mt-0 sm:ml-4 sm:text-left">
              <h3 class="text-lg leading-6 font-medium text-gray-900" id="modal-title">
                Privacy & Policy
              </h3>
              <div class="mt-2">
                <p class="text-sm text-gray-500">
                  <b>Introduction<br /></b>
                  Welcome to Connectify. We value your privacy and are committed to protecting your personal information. This Privacy Policy outlines our practices regarding the collection, use, and disclosure of your information when you use our service.
                  <br />
                  <b>1. Information We Collect</b>
                  <br />
                  1.1 Personal Information<br />
                  When you sign up for or use Connectify, we may collect personal information that can identify you, such as your name, email address, phone number, and profile photo.
                  <br />
                  1.2 Usage Data<br />
                  We collect information about your activity on Connectify, including the posts you create, the comments you leave, and the users you follow. This helps us improve our service and provide a better user experience.
                  <br />
                  1.3 Device Information<br />
                  We collect information from and about the devices you use to access Connectify. This includes IP addresses, browser type, operating system, device type, and mobile network information.
                  <br />
                  1.4 Location Data<br />
                  With your consent, we may collect and process information about your actual location. We use various technologies to determine location, including IP address, GPS, and other sensors.
                  <br />
                  <b>2. How We Use Your Information<br /></b>
                  2.1 To Provide and Improve Our Service<br />
                  We use your information to operate and improve Connectify, including personalizing content and ads, and to develop new features.
                  <br />
                  2.2 To Communicate with You<br />
                  We use your information to send you updates, newsletters, marketing materials, and other information that may be of interest to you. You can opt-out of receiving these communications at any time.
                  <br />
                  2.3 To Ensure Safety and Security<br />
                  We use your information to maintain the safety and security of Connectify and its users, including investigating suspicious activity and enforcing our terms and policies.
                  <br />
                  2.4 For Legal and Compliance Purposes<br />
                  We may use your information to comply with legal obligations, resolve disputes, and enforce our agreements.
                  <br />
                  <b>3. Sharing Your Information<br /></b>
                  3.1 With Other Users<br />
                  Your profile information and any content you post or share on Connectify may be visible to other users of the service.
                  <br />
                  3.2 With Third Parties<br />
                  We may share your information with third-party service providers who assist us in operating our service, conducting our business, or serving our users. These third parties are contractually obligated to protect your information.
                  <br />
                  3.3 For Legal Reasons<br />
                  We may disclose your information if required to do so by law or in response to valid requests by public authorities.
                  <br />
                  <b>4. Your Choices<br /></b>

                  4.1 Access and Update Your Information<br />
                  You can access and update your account information at any time by logging into your account settings.
                  <br />
                  4.2 Delete Your Account<br />
                  You can delete your Connectify account at any time. Upon deletion, your profile and all associated data will be permanently removed from our servers.
                  <br />
                  4.3 Opt-Out of Communications<br />
                  You can opt-out of receiving promotional communications from us by following the unsubscribe instructions provided in those communications.
                  <br />
                  <b>5. Data Security<br /></b>
                  We implement a variety of security measures to protect your personal information. However, no method of transmission over the Internet or electronic storage is 100% secure, and we cannot guarantee absolute security.
                  <br />
                  <b>6. Children's Privacy<br /></b>
                  Connectify is not intended for use by children under the age of 13. We do not knowingly collect personal information from children under 13. If we become aware that a child under 13 has provided us with personal information, we will take steps to delete such information.
                  <br />
                  <b>7. Changes to This Privacy Policy<br /></b>
                  We may update this Privacy Policy from time to time. We will notify you of any changes by posting the new Privacy Policy on this page. Your continued use of Connectify after any changes are effective constitutes your acceptance of the new Privacy Policy.
                  <br />
                  <b>8. Contact Us<br /></b>
                  If you have any questions about this Privacy Policy, please contact us at:
                  <br />
                  <b>
                    Email: Kushagra111awasthi@gmail.com<br />
                    Address: E-595 Awas Vika No 3 Kalyanpur Kanpur 208017<br />
                  </b>
                </p>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
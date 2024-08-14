<div x-data="{
    shrink:@entangle('shrink'),
    drawer:@entangle('drawer'),
    showSearch:false,
    showNotifications:false,

}" x-init="
 $wire.shrink={{request()->routeIs('chat')|| request()->routeIs('chat.main')}}
" class="menu p-3 w-20  h-full grid bg-blue-200 text-base-content" :class="{'w-72 ':!shrink}">

    {{--Logo--}}
    <div class="pt-3">

        <div x-show="shrink || drawer" class="w-full items-center pr-3 ">
            <img src="{{ asset('assets/logo.png') }}" class="max-w-lg" style="height: 75px;" alt="logo">
        </div>

        <img x-cloak x-show="!(shrink ||drawer)" src="{{asset('assets/logo.png')}}" class=" ml-2 object-fill text-black" style="height: 150px;" alt="logo">
    </div>

    {{-- Side content --}}
    <ul class="space-y-4">

        <li><a wire:navigate href="/" class="flex items-center gap-5 ">

                <span>

                    @if (request()->routeIs('Home'))
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="w-7 h-7">
                        <path d="M11.47 3.84a.75.75 0 011.06 0l8.69 8.69a.75.75 0 101.06-1.06l-8.689-8.69a2.25 2.25 0 00-3.182 0l-8.69 8.69a.75.75 0 001.061 1.06l8.69-8.69z" />
                        <path d="M12 5.432l8.159 8.159c.03.03.06.058.091.086v6.198c0 1.035-.84 1.875-1.875 1.875H15a.75.75 0 01-.75-.75v-4.5a.75.75 0 00-.75-.75h-3a.75.75 0 00-.75.75V21a.75.75 0 01-.75.75H5.625a1.875 1.875 0 01-1.875-1.875v-6.198a2.29 2.29 0 00.091-.086L12 5.43z" />
                    </svg>
                    @else


                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-7 h-7">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M2.25 12l8.954-8.955c.44-.439 1.152-.439 1.591 0L21.75 12M4.5 9.75v10.125c0 .621.504 1.125 1.125 1.125H9.75v-4.875c0-.621.504-1.125 1.125-1.125h2.25c.621 0 1.125.504 1.125 1.125V21h4.125c.621 0 1.125-.504 1.125-1.125V9.75M8.25 21h8.25" />
                    </svg>

                    @endif





                </span>

                <h4 x-cloak x-show="!(shrink||drawer)" class=" text-lg  {{request()->routeIs('Home')?'font-bold':'font-medium'}}">Home</h4>
            </a></li>

        <li>
            <div @click="showSearch=true;showNotifications=false;drawer=true" class="flex items-center gap-5">

                <span>
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="w-6 h-6">
                        <path fill-rule="evenodd" d="M10.5 3.75a6.75 6.75 0 100 13.5 6.75 6.75 0 000-13.5zM2.25 10.5a8.25 8.25 0 1114.59 5.28l4.69 4.69a.75.75 0 11-1.06 1.06l-4.69-4.69A8.25 8.25 0 012.25 10.5z" clip-rule="evenodd" />
                    </svg>

                </span>

                <h4 x-cloak x-show="!(shrink||drawer)" class=" text-lg font-medium">Search</h4>
            </div>
        </li>

        <li><a wire:navigate href="{{route('community')}}" class="flex items-center gap-5">

                <span>

                    @if (request()->routeIs('community'))

                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24" id="instagram">
                        <path fill="#000" fill-rule="evenodd" d="M12.6126 1H8.72076L8.94868 1.68377L10.7208 7H14.6126L13.0513 2.31623L12.6126 1ZM15.9766 9C15.9921 9.00036 16.0076 9.00036 16.0231 9H23V17.5C23 20.5376 20.5376 23 17.5 23H6.5C3.46243 23 1 20.5376 1 17.5V9H9.97665C9.99208 9.00036 10.0076 9.00036 10.0231 9H15.9766ZM16.7208 7L14.9487 1.68377L14.7208 1H17.5C20.5376 1 23 3.46243 23 6.5V7H16.7208ZM6.5 1H6.61257L7.05132 2.31623L8.61257 7H1V6.5C1 3.46243 3.46243 1 6.5 1ZM10.0735 10.1808C9.76799 9.96694 9.36892 9.94083 9.03819 10.113C8.70746 10.2852 8.5 10.6271 8.5 11V18C8.5 18.3729 8.70746 18.7148 9.03819 18.887C9.36892 19.0592 9.76799 19.0331 10.0735 18.8192L15.0735 15.3192C15.3408 15.1321 15.5 14.8263 15.5 14.5C15.5 14.1737 15.3408 13.8679 15.0735 13.6808L10.0735 10.1808Z" clip-rule="evenodd"></path>
                    </svg>
                    @else

                    <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6" width="24" height="24" fill="currentColor" id="instagram">
                        <path fill="currentColor" fill-rule="evenodd" d="M1 6.5A5.5 5.5 0 0 1 6.5 1h11A5.5 5.5 0 0 1 23 6.5v11a5.5 5.5 0 0 1-5.5 5.5h-11A5.5 5.5 0 0 1 1 17.5v-11ZM6.5 3A3.5 3.5 0 0 0 3 6.5v11A3.5 3.5 0 0 0 6.5 21h11a3.5 3.5 0 0 0 3.5-3.5v-11A3.5 3.5 0 0 0 17.5 3h-11Z" clip-rule="evenodd"></path>
                        <path fill="currentColor" fill-rule="evenodd" d="M9.038 10.113a1 1 0 0 1 1.035.068l5 3.5a1 1 0 0 1 0 1.638l-5 3.5A1 1 0 0 1 8.5 18v-7a1 1 0 0 1 .538-.887zm1.462 2.808v3.158l2.256-1.579-2.256-1.58zM1 8a1 1 0 0 1 1-1h20a1 1 0 1 1 0 2H2a1 1 0 0 1-1-1z" clip-rule="evenodd"></path>
                        <path fill="#000" fill-rule="evenodd" d="M7.684 1.051a1 1 0 0 1 1.265.633l2 6a1 1 0 0 1-1.897.632l-2-6a1 1 0 0 1 .632-1.265zm6 0a1 1 0 0 1 1.265.633l2 6a1 1 0 0 1-1.897.632l-2-6a1 1 0 0 1 .632-1.265z" clip-rule="evenodd"></path>
                    </svg>
                    @endif







                </span>

                <h4 x-cloak x-show="!(shrink||drawer)" class=" text-lg  {{request()->routeIs('community')?'font-bold':'font-medium'}}">Community</h4>
            </a></li>


        <li><a wire:navigate href="{{route('chat')}}" class="flex items-center gap-5">

                <span>
                    @if (request()->routeIs('chat') || request()->routeIs('chat.main'))
                    <svg class="w-6 h-6" xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" viewBox="0 0 16 16">
                        <path d="M0 7.76C0 3.301 3.493 0 8 0s8 3.301 8 7.76-3.493 7.76-8 7.76c-.81 0-1.586-.107-2.316-.307a.639.639 0 0 0-.427.03l-1.588.702a.64.64 0 0 1-.898-.566l-.044-1.423a.639.639 0 0 0-.215-.456C.956 12.108 0 10.092 0 7.76zm5.546-1.459-2.35 3.728c-.225.358.214.761.551.506l2.525-1.916a.48.48 0 0 1 .578-.002l1.869 1.402a1.2 1.2 0 0 0 1.735-.32l2.35-3.728c.226-.358-.214-.761-.551-.506L9.728 7.381a.48.48 0 0 1-.578.002L7.281 5.98a1.2 1.2 0 0 0-1.735.32z" />
                    </svg>
                    @else
                    <svg class="w-6 h-6 text-gray-800" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 32 32" id="messenger">
                        <path fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14.268,2.112A13,13,0,0,0,6,23.3v3.661A1.258,1.258,0,0,0,7.82,28.09l2.663-1.332a12.9,12.9,0,0,0,7.25,1.126A13,13,0,1,0,14.268,2.112Z">
                        </path>
                        <path d="M9.049,18.163,13.64,11.63a.64.64,0,0,1,.94-.2l3.075,2.307a.641.641,0,0,0,.714.036l3.745-2.646a.64.64,0,0,1,.9.835l-3.707,6.414a.64.64,0,0,1-.9.263L14.3,16.181a.638.638,0,0,0-.615-.024l-3.794,2.9A.641.641,0,0,1,9.049,18.163Z">
                        </path>
                    </svg>
                    @endif




                </span>

                <h4 x-cloak x-show="!(shrink||drawer)" class=" text-lg font-medium">Messages</h4>
            </a></li>

        <li>
            <div @click="showSearch=false;showNotifications=true;drawer=true" class="flex items-center gap-5">

                <span>
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.9" stroke="currentColor" class="w-6 h-6">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M21 8.25c0-2.485-2.099-4.5-4.688-4.5-1.935 0-3.597 1.126-4.312 2.733-.715-1.607-2.377-2.733-4.313-2.733C5.1 3.75 3 5.765 3 8.25c0 7.22 9 12 9 12s9-4.78 9-12z" />
                    </svg>

                    {{--
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="w-6 h-6">
                        <path
                            d="M11.645 20.91l-.007-.003-.022-.012a15.247 15.247 0 01-.383-.218 25.18 25.18 0 01-4.244-3.17C4.688 15.36 2.25 12.174 2.25 8.25 2.25 5.322 4.714 3 7.688 3A5.5 5.5 0 0112 5.052 5.5 5.5 0 0116.313 3c2.973 0 5.437 2.322 5.437 5.25 0 3.925-2.438 7.111-4.739 9.256a25.175 25.175 0 01-4.244 3.17 15.247 15.247 0 01-.383.219l-.022.012-.007.004-.003.001a.752.752 0 01-.704 0l-.003-.001z" />
                    </svg>

                    --}}

                </span>

                <h4 x-cloak x-show="!(shrink||drawer)" class=" text-lg font-medium">Notifications</h4>
            </div>
        </li>

        <li>
            <div onclick="Livewire.dispatch('openModal', { component: 'post.create' })" class="flex items-center gap-5">

                <span class="border border-gray-600  rounded-lg p-px">

                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.9" stroke="currentColor" class="w-5 h-5">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M12 4.5v15m7.5-7.5h-15" />
                    </svg>

                </span>

                <h4 x-cloak x-show="!(shrink||drawer)" class=" text-lg font-medium">Create</h4>
            </div>
        </li>


        @auth
        <li>
            <a wire:navigate href="{{ route('profile.home', auth()->user()->username) }}" class="flex items-center gap-5">
                @if (auth()->user()->avatar)
                <x-avatar wire:ignore src="{{ asset('storage/' . auth()->user()->avatar) }}" class="w-7 h-7 shrink-0" />
                @else
                <svg class="w-7 h-7 shrink-0 text-gray-300 bg-gray-100 rounded-full" xmlns="http://www.w3.org/2000/svg" shape-rendering="geometricPrecision" text-rendering="geometricPrecision" image-rendering="optimizeQuality" fill-rule="evenodd" clip-rule="evenodd" viewBox="0 0 512 512">
                    <path fill="#A7A9AE" fill-rule="nonzero" d="M256 0c70.69 0 134.69 28.655 181.018 74.982C483.345 121.31 512 185.31 512 256s-28.655 134.69-74.982 181.018C390.69 483.345 326.69 512 256 512s-134.69-28.655-181.018-74.982C28.655 390.69 0 326.69 0 256S28.655 121.31 74.982 74.982C121.31 28.655 185.31 0 256 0zm-49.371 316.575c-.992-1.286 2.594-10.118 3.443-11.546-9.722-8.651-17.404-17.379-19.041-35.34l-1.043.022c-2.408-.032-4.729-.586-6.903-1.825-3.481-1.979-5.93-5.379-7.583-9.212-3.5-8.043-15.031-34.738 2.537-32.628-9.823-18.345 12.409-49.684-25.935-61.275 31.46-39.845 97.839-101.281 146.483-39.654 53.245 5.16 69.853 68.437 34 103.093 2.101.076 4.08.56 5.832 1.498 6.665 3.57 6.884 11.318 5.132 17.819-1.733 5.429-3.934 9.104-6.01 14.397-2.524 7.147-6.215 8.478-13.345 7.708-.362 17.67-8.528 26.343-19.518 36.724l3.007 10.187c-14.737 31.261-75.957 32.518-101.056.032zM78.752 394.224c12.076-51.533 45.656-33.396 110.338-73.867 22.982 47.952 116.386 51.437 135.54 0 55.35 35.384 98.967 20.923 109.958 72.138 28.965-37.841 46.176-85.158 46.176-136.495 0-62.068-25.158-118.26-65.83-158.934C374.26 56.394 318.068 31.236 256 31.236S137.74 56.394 97.066 97.066C56.394 137.74 31.236 193.932 31.236 256c0 52.123 17.744 100.099 47.516 138.224z" />
                </svg>
                @endif
                <h4 x-cloak x-show="!(shrink || drawer)" class="text-lg {{ request()->routeIs('profile.home') ? 'font-bold' : 'font-medium' }}">Profile</h4>
            </a>
        </li>

        @endauth


    </ul>


    {{-- Footer --}}
    <footer class="sticky bottom-0 mt-auto w-full grid px-3 z-50 bg-blue-200">
        <div class="dropdown dropdown-top ">
            <label tabindex="0" class=" cursor-pointer bg-blue-200  flex items-center w-full gap-5 m-1">
                <span>
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="w-8 h-8">
                        <path fill-rule="evenodd" d="M3 5.25a.75.75 0 01.75-.75h16.5a.75.75 0 010 1.5H3.75A.75.75 0 013 5.25zm0 4.5A.75.75 0 013.75 9h16.5a.75.75 0 010 1.5H3.75A.75.75 0 013 9.75zm0 4.5a.75.75 0 01.75-.75h16.5a.75.75 0 010 1.5H3.75a.75.75 0 01-.75-.75zm0 4.5a.75.75 0 01.75-.75h16.5a.75.75 0 010 1.5H3.75a.75.75 0 01-.75-.75z" clip-rule="evenodd" />
                    </svg>

                </span>
                <h3 x-cloak x-show="!(shrink||drawer)" class="text-lg font-medium">More</h3>
            </label>
            <ul tabindex="0" class="dropdown-content z-[1] menu p-2 space-y-3 shadow bg-base-100 rounded-box w-60">

                <li><a class="flex items-center gap-5 py-2">

                        <span>
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M17.593 3.322c1.1.128 1.907 1.077 1.907 2.185V21L12 17.25 4.5 21V5.507c0-1.108.806-2.057 1.907-2.185a48.507 48.507 0 0111.186 0z" />
                            </svg>

                        </span>

                        <h4>Saved</h4>

                    </a></li>



                <hr>

                <li><a class="py-2">Settings</a></li>
                <li><a class="py-2">


                        <!-- Authentication -->
                        <form method="POST" action="{{ route('logout') }}">
                            @csrf

                            <button onclick="event.preventDefault();
                    this.closest('form').submit();">
                                Logout
                            </button>
                            {{-- <x-dropdown-link :href="route('logout')" onclick="event.preventDefault();
                                        this.closest('form').submit();">
                                {{ __('Log Out') }}
                            </x-dropdown-link> --}}
                        </form>

                    </a></li>
            </ul>
        </div>
    </footer>





    <div x-show="drawer" x-cloak x-transition.origin.left @click.outside="drawer=false;showSearch=false;showNotifications=false" class="fixed inset-y-0 left-[70px] w-96 px-4 overflow-y-scroll overflow-x-hidden shadow bg-white border rounded-r-2xl z-[50]">



        <template x-if="showSearch">

            <div class="h-full">

                <header class="sticky top-0 w-full z-10 bg-white py-2">

                    <h5 class="text-4xl font-bold my-4">Search</h5>

                    {{-- input --}}

                    <input wire:model.live="query" type="search" placeholder="Search" class=" border-0 outline-none w-full focus:outline-none bg-gray-100 rounded-lg hover:ring-0 focus:ring-0">

                </header>

                <main>
                    @if ($results)
                    <ul class="space-y-2 overflow-x-hidden">
                        @foreach ($results as $key=> $user)
                        <li>

                            <a href="{{route('profile.home',$user->username)}}" class="flex gap-2 truncate items-center">

                                <x-avatar wire:ignore class="w-9 h-9 mb-auto" src="{{ asset('storage/' . $user->avatar) }}" />

                                <div class="flex flex-col">
                                    <span class="font-bold text-sm">{{$user->username}}</span>
                                    <span class="font-normal text-xs truncate">{{$user->batch}}</span>
                                    <span class="font-normal text-xs truncate">{{$user->branch}}</span>


                                </div>

                            </a>

                        </li>
                        @endforeach
                    </ul>
                    @else

                    <center>
                        No results
                    </center>

                    @endif


                </main>

            </div>


        </template>

        <div x-cloak x-show="showNotifications">

            <livewire:components.notifications />

        </div>


    </div>


</div>
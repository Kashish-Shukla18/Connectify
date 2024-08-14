<div x-data="{
        shrink:false,
        drawer:false

    }" class="menu sm:hidden md:hidden lg:visible rounded p-3 w-20 overflow-x-hidden h-full grid bg-white border-r text-base-content" :class="{'w-72 ':!shrink}">

    {{--Logo--}}
    <div class="pt-3">

        <div x-show="shrink || drawer"  class=" rounded w-full px-4">
        <img src="{{ asset('assets/logo.png') }}" class="h-22 max-w-lg w-full" alt="logo">
        </div>

        <img x-cloak x-show="!(shrink ||drawer)" src="{{asset('assets/logo.png')}}" class="h-32 w-22 text-black" alt="logo">
    </div>

    {{-- Side content --}}
    <ul class="space-y-4 mt-2">

        <li><a wire:navigate href="/" class="flex items-center gap-5 ">

                <span>

                    @if (request()->routeIs('Home'))
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="w-6 h-6">
                        <path d="M11.47 3.84a.75.75 0 011.06 0l8.69 8.69a.75.75 0 101.06-1.06l-8.689-8.69a2.25 2.25 0 00-3.182 0l-8.69 8.69a.75.75 0 001.061 1.06l8.69-8.69z" />
                        <path d="M12 5.432l8.159 8.159c.03.03.06.058.091.086v6.198c0 1.035-.84 1.875-1.875 1.875H15a.75.75 0 01-.75-.75v-4.5a.75.75 0 00-.75-.75h-3a.75.75 0 00-.75.75V21a.75.75 0 01-.75.75H5.625a1.875 1.875 0 01-1.875-1.875v-6.198a2.29 2.29 0 00.091-.086L12 5.43z" />
                    </svg>
                    @else


                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M2.25 12l8.954-8.955c.44-.439 1.152-.439 1.591 0L21.75 12M4.5 9.75v10.125c0 .621.504 1.125 1.125 1.125H9.75v-4.875c0-.621.504-1.125 1.125-1.125h2.25c.621 0 1.125.504 1.125 1.125V21h4.125c.621 0 1.125-.504 1.125-1.125V9.75M8.25 21h8.25" />
                    </svg>

                    @endif





                </span>

                <h4 x-cloak x-show="!(shrink||drawer)" class=" text-lg  {{request()->routeIs('Home')?'font-bold':'font-medium'}}">Home</h4>
            </a></li>

        <li><a class="flex items-center gap-5">

                <span>
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="w-6 h-6">
                        <path fill-rule="evenodd" d="M10.5 3.75a6.75 6.75 0 100 13.5 6.75 6.75 0 000-13.5zM2.25 10.5a8.25 8.25 0 1114.59 5.28l4.69 4.69a.75.75 0 11-1.06 1.06l-4.69-4.69A8.25 8.25 0 012.25 10.5z" clip-rule="evenodd" />
                    </svg>


                </span>

                <h4 x-cloak x-show="!(shrink||drawer)" class=" text-lg font-medium">Search</h4>
            </a></li>

        <li><a class="flex items-center gap-5">

                <span>
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="w-6 h-6">
                        <path fill-rule="evenodd" d="M4.5 6a1.5 1.5 0 011.5-1.5h12a1.5 1.5 0 011.5 1.5v13.5a.75.75 0 01-1.215.586l-5.786-4.63a.75.75 0 00-.948 0l-5.786 4.63A.75.75 0 014.5 19.5V6zm1.5-.75a.75.75 0 00-.75.75v12.922l5.036-4.029a2.25 2.25 0 012.928 0l5.036 4.03V6a.75.75 0 00-.75-.75h-12z" clip-rule="evenodd" />
                    </svg>


                </span>

                <h4 x-cloak x-show="!(shrink||drawer)" class=" text-lg font-medium">Messages</h4>
            </a></li>

        <li><a class="flex items-center gap-5">

                <span>
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="w-6 h-6">
                        <path fill-rule="evenodd" d="M1.5 6.75A3.75 3.75 0 015.25 3h13.5a3.75 3.75 0 013.75 3.75v10.5A3.75 3.75 0 0118.75 18H5.25A3.75 3.75 0 011.5 14.25V6.75zM5.25 4.5A2.25 2.25 0 003 6.75v.568l9 5.625 9-5.625V6.75a2.25 2.25 0 00-2.25-2.25H5.25zm16.5 2.9l-8.602 5.368a.75.75 0 01-.796 0L3 7.4v6.85a2.25 2.25 0 002.25 2.25h13.5a2.25 2.25 0 002.25-2.25V7.4z" clip-rule="evenodd" />
                    </svg>


                </span>

                <h4 x-cloak x-show="!(shrink||drawer)" class=" text-lg font-medium">Notification</h4>
            </a></li>

        <li><a class="flex items-center gap-5">

                <span>
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="w-6 h-6">
                        <path fill-rule="evenodd" d="M4.5 4.5A2.25 2.25 0 002.25 6.75v10.5A2.25 2.25 0 004.5 19.5h15a2.25 2.25 0 002.25-2.25V6.75A2.25 2.25 0 0019.5 4.5h-15zM3.75 6.75a.75.75 0 01.75-.75h15a.75.75 0 01.75.75v.806L12 11.558 3.75 7.556V6.75zm0 2.394v8.106a.75.75 0 00.75.75h15a.75.75 0 00.75-.75V9.144L12 13.942l-8.25-4.798z" clip-rule="evenodd" />
                    </svg>


                </span>

                <h4 x-cloak x-show="!(shrink||drawer)" class=" text-lg font-medium">Saved</h4>
            </a></li>

        <li><a class="flex items-center gap-5">

                <span>
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="w-6 h-6">
                        <path d="M7.5 21a.75.75 0 01.75-.75H12a3 3 0 003-3V11.78l-.22-.22H7.5a.75.75 0 010-1.5H15a1.5 1.5 0 011.5 1.5v6a4.5 4.5 0 01-4.5 4.5H8.25A.75.75 0 017.5 21z" />
                        <path fill-rule="evenodd" d="M14.897 9.28a.75.75 0 010 1.06l-5.25 5.25a.75.75 0 11-1.06-1.06l5.25-5.25a.75.75 0 011.06 0z" clip-rule="evenodd" />
                        <path fill-rule="evenodd" d="M14.897 3.47a.75.75 0 010 1.06l-9.75 9.75a.75.75 0 11-1.06-1.06l9.75-9.75a.75.75 0 011.06 0z" clip-rule="evenodd" />
                        <path fill-rule="evenodd" d="M21.897 2.47a.75.75 0 010 1.06l-6.75 6.75a.75.75 0 11-1.06-1.06l6.75-6.75a.75.75 0 011.06 0z" clip-rule="evenodd" />
                    </svg>


                </span>

                <h4 x-cloak x-show="!(shrink||drawer)" class=" text-lg font-medium">Settings</h4>
            </a></li>

        @auth
        <li><a wire:navigate href="{{route('profile.home',auth()->user()->username)}}" class="flex items-center gap-5">
                <x-avatar src="{{ asset('storage/' . $user->avatar) }}" class="w-7 h-7 shrink-0" />
                <h4 x-cloak x-show="!(shrink||drawer)" class=" text-lg  {{request()->routeIs('profile.home')?'font-bold':'font-medium'}}">Profile</h4>
            </a></li>
        @endauth

    </ul>
    <footer class="sticky bottom-0 mt-auto w-full grid px-3">
        {{-- Footer content --}}
    </footer>
</div>

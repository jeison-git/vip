<header class="sticky top-0 bg-gradient-to-r from-blue-700 via-blue-500 to-blue-700" x-data="dropdown()">

    <div class="container flex items-center h-16">
        <a {{--:class="{'bg-opacity-100' 'text-gold' : open}"--}}

            x-on:click="show()"

            class="flex flex-col items-center justify-center h-full px-4 font-semibold bg-white bg-opacity-25 cursor-pointer text-gold">

            <svg class="w-6 h-6" stroke="currentColor" fill="none" viewBox="0 0 24 24">

                <path class="inline-flex" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                    d="M4 6h16M4 12h16M4 18h16" />

            </svg>

            <span class="text-sm">Categorías</span>

        </a>

        <a href="/" class="mx-6">
            <x-jet-application-mark class="block w-auto h-9" />
        </a>

        <div class="flex-1">
            @livewire('search')
        </div>

        <!-- Settings Dropdown -->
        <div class="relative mx-6">
            @auth

                <x-jet-dropdown align="right" width="48">
                    <x-slot name="trigger">

                        <button
                            class="flex text-sm transition border-2 border-transparent rounded-full focus:outline-none focus:border-gray-300">
                            <img class="object-cover w-8 h-8 rounded-full" src="{{ Auth::user()->profile_photo_url }}"
                                alt="{{ Auth::user()->name }}" />
                        </button>

                    </x-slot>

                    <x-slot name="content">
                        <!-- Account Management -->
                        <div class="block px-4 py-2 text-xs text-gray-400">
                            {{ __('Manage Account') }}
                        </div>

                        <x-jet-dropdown-link href="{{ route('profile.show') }}">
                            {{ __('Profile') }}
                        </x-jet-dropdown-link>

                        <div class="border-t border-gray-100"></div>

                        <!-- Authentication -->
                        <form method="POST" action="{{ route('logout') }}">
                            @csrf

                            <x-jet-dropdown-link href="{{ route('logout') }}" onclick="event.preventDefault();
                                                this.closest('form').submit();">
                                {{ __('Log Out') }}
                            </x-jet-dropdown-link>
                        </form>
                    </x-slot>
                </x-jet-dropdown>

            @else

                <x-jet-dropdown align="right" width="48">
                    <x-slot name="trigger">
                        <i class="block w-auto text-3xl text-white cursor-pointer fa fa-user-circle" aria-hidden="true"></i>
                    </x-slot>

                    <x-slot name="content">
                        <x-jet-dropdown-link href="{{ route('login') }}">
                            {{ __('Login') }}
                        </x-jet-dropdown-link>

                        <x-jet-dropdown-link href="{{ route('register') }}">
                            {{ __('Register') }}
                        </x-jet-dropdown-link>
                    </x-slot>
                </x-jet-dropdown>

            @endauth
        </div>

        @livewire('dropdown-cart')
    </div>

    <nav id="navigation-menu"
     {{----}}
     x-show="open"
     :class="{'block': open, 'hidden': !open}"
     class="absolute hidden w-full bg-opacity-25 bg-trueGray-700">
        <div class="container h-full">
            <div
            x-on:click.away="close()" class="relative grid h-full grid-cols-4">
                <ul class="bg-white">
                    @foreach ($categories as $category)
                        <li class="navigation-link text-trueGray-500 hover:bg-gold hover:text-white">
                            <a href="" class="flex items-center px-4 py-2 text-sm">

                                <span class="flex justify-center w-9">
                                    {!! $category->icon !!}
                                </span>

                                {{ $category->name }}
                            </a>

                            <div class="absolute top-0 right-0 hidden w-3/4 h-full bg-gray-100 navigation-submenu">
                                <x-components.navigation-subcategories :category="$category" />
                            </div>

                        </li>
                    @endforeach
                </ul>

                <div class="col-span-3 bg-gray-100">
                    <x-components.navigation-subcategories :category="$categories->first()" />
            </div>
        </div>
    </nav>

</header>

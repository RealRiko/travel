<nav x-data="{ open: false }" class="bg-white border-b border-gray-100">
    <!-- Primary Navigation Menu -->
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex justify-between h-16">
            <div class="flex">
                <!-- Logo -->
                <div class="shrink-0 flex items-center">
                    <a href="{{ route('dashboard') }}">
                        <!-- Place your logo here -->
                    </a>
                </div>

                <!-- Navigation Links -->
                <div class="hidden space-x-8 sm:-my-px sm:ms-10 sm:flex">
                    <x-nav-link :href="route('dashboard')" :active="request()->routeIs('dashboard')">
                        {{ __('Dashboard') }}
                    </x-nav-link>
                    <x-nav-link :href="route('destinations.index')" :active="request()->routeIs('destinations.index')">
                        {{ __('Destinations') }}
                    </x-nav-link>
                    @auth
                        <x-nav-link :href="route('destinations.create')" :active="request()->routeIs('destinations.create')">
                            {{ __('Create Destination') }}
                        </x-nav-link>
                        <x-nav-link :href="route('destinations.liked')" :active="request()->routeIs('destinations.liked')">
                            {{ __('Liked') }}
                        </x-nav-link>
                        <x-nav-link :href="route('destinations.disliked')" :active="request()->routeIs('destinations.disliked')">
                            {{ __('Disliked') }}
                        </x-nav-link>
                        <x-nav-link :href="route('destinations.mine')" :active="request()->routeIs('destinations.mine')">
                            {{ __('My Destinations') }}
                        </x-nav-link>
                    @endauth
                </div>
            </div>

            <!-- Settings Dropdown -->
            @auth
            <div class="hidden sm:flex sm:items-center sm:ms-6">
                <x-dropdown align="right" width="48">
                    <!-- Trigger -->
                    <x-slot name="trigger">
                        <button
                            @click.stop="open = !open"
                            class="inline-flex items-center px-3 py-2 border border-transparent text-sm leading-4 font-medium rounded-md text-gray-500 bg-white hover:text-gray-700 focus:outline-none transition ease-in-out duration-150"
                            id="dropdown-button"
                        >
                            <div>{{ Auth::user()->name }}</div>
                            <div class="ms-1">
                                <svg class="fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                                    <path fill-rule="evenodd"
                                          d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z"
                                          clip-rule="evenodd"/>
                                </svg>
                            </div>
                        </button>
                    </x-slot>

                    <!-- Dropdown Content -->
                    <x-slot name="content">
                        <!-- Profile -->
                        <x-dropdown-link :href="route('profile.edit')">
                            {{ __('Profile') }}
                        </x-dropdown-link>

                        <!-- Logout -->
                        <form method="POST" action="{{ route('logout') }}">
                            @csrf
                            <x-dropdown-link :href="route('logout')"
                                             onclick="event.preventDefault(); this.closest('form').submit();">
                                {{ __('Log Out') }}
                            </x-dropdown-link>
                        </form>
                    </x-slot>
                </x-dropdown>
            </div>
            @endauth
        </div>
    </div>

    <!-- Responsive Navigation Menu -->
    <div :class="{ 'block': open, 'hidden': ! open }" class="hidden sm:hidden">
        <div class="pt-2 pb-3 space-y-1">
            <x-responsive-nav-link :href="route('dashboard')" :active="request()->routeIs('dashboard')">
                {{ __('Dashboard') }}
            </x-responsive-nav-link>
            <x-responsive-nav-link :href="route('destinations.index')" :active="request()->routeIs('destinations.index')">
                {{ __('Destinations') }}
            </x-responsive-nav-link>
            @auth
                <x-responsive-nav-link :href="route('destinations.create')" :active="request()->routeIs('destinations.create')">
                    {{ __('Create Destination') }}
                </x-responsive-nav-link>
                <x-responsive-nav-link :href="route('destinations.liked')" :active="request()->routeIs('destinations.liked')">
                    {{ __('Liked') }}
                </x-responsive-nav-link>
                <x-responsive-nav-link :href="route('destinations.disliked')" :active="request()->routeIs('destinations.disliked')">
                    {{ __('Disliked') }}
                </x-responsive-nav-link>
            @endauth
        </div>

        <!-- Responsive Settings -->
        @auth
        <div class="pt-4 pb-1 border-t border-gray-200">
            <div class="px-4">
                <div class="font-medium text-base text-gray-800">{{ Auth::user()->name }}</div>
                <div class="font-medium text-sm text-gray-500">{{ Auth::user()->email }}</div>
            </div>

            <div class="mt-3 space-y-1">
                <x-responsive-nav-link :href="route('profile.edit')">
                    {{ __('Profile') }}
                </x-responsive-nav-link>

                <!-- Logout -->
                <form method="POST" action="{{ route('logout') }}">
                    @csrf
                    <x-responsive-nav-link :href="route('logout')"
                                           onclick="event.preventDefault(); this.closest('form').submit();">
                        {{ __('Log Out') }}
                    </x-responsive-nav-link>
                </form>
            </div>
        </div>
        @endauth
    </div>
</nav>
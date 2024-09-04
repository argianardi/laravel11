<nav class="bg-gray-800">
    <div class="max-w-7xl sm:px-6 lg:px-8 px-4 mx-auto">
        <div class="flex items-center justify-between h-16">
            <div class="flex items-center">
                <div class="flex-shrink-0">
                    <img class="w-8 h-8" src="https://tailwindui.com/img/logos/mark.svg?color=indigo&shade=500"
                        alt="Your Company">
                </div>
                <div class="md:block hidden">
                    <div class="flex items-baseline ml-10 space-x-4">
                        <x-navbar.link href="/">Home</x-navbar.link>
                        <x-navbar.link href="/about">About</x-navbar.link>
                        <x-navbar.link href="/contact">Contact</x-navbar.link>
                        <x-navbar.link href="/galerry">Galerry</x-navbar.link>
                    </div>
                </div>
            </div>
            <div class="md:hidden flex -mr-2">
                <!-- Mobile menu button -->
                <button type="button"
                    class="hover:bg-gray-700 hover:text-white focus:outline-none focus:ring-2 focus:ring-white focus:ring-offset-2 focus:ring-offset-gray-800 relative inline-flex items-center justify-center p-2 text-gray-400 bg-gray-800 rounded-md"
                    aria-controls="mobile-menu" aria-expanded="false">
                    <span class="absolute -inset-0.5"></span>
                    <span class="sr-only">Open main menu</span>
                    <!-- Menu open: "hidden", Menu closed: "block" -->
                    <svg class="block w-6 h-6" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                        stroke="currentColor" aria-hidden="true">
                        <path stroke-linecap="round" stroke-linejoin="round"
                            d="M3.75 6.75h16.5M3.75 12h16.5m-16.5 5.25h16.5" />
                    </svg>
                    <!-- Menu open: "block", Menu closed: "hidden" -->
                    <svg class="hidden w-6 h-6" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                        stroke="currentColor" aria-hidden="true">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" />
                    </svg>
                </button>
            </div>
        </div>
    </div>

    <!-- Mobile menu, show/hide based on menu state. -->
    <div class="md:hidden" id="mobile-menu">
        <div class="sm:px-3 px-2 pt-2 pb-3 space-y-1">
            <!-- Current: "bg-gray-900 text-white", Default: "text-gray-300 hover:bg-gray-700 hover:text-white" -->

            <x-navbar.dropdown-link href="/">Home</x-navbar.dropdown-link>
            <x-navbar.dropdown-link href="/about">About</x-navbar.dropdown-link>
            <x-navbar.dropdown-link href="/contact">Contact</x-navbar.dropdown-link>
            <x-navbar.dropdown-link href="/galerry">Galerry</x-navbar.dropdown-link>
        </div>
    </div>
</nav>

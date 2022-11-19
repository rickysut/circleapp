<nav class="bg-white border-b border-gray-100">
    <!-- Primary Navigation Menu -->
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex justify-between h-16">
            <div class="flex">
                <!-- Logo -->
                <div class="shrink-0 flex items-center">
                    <a href="{{ route('karyawan') }}">
                        <x-application-logo class="block h-9 w-auto fill-current text-gray-800" />
                    </a>
                </div>

                <!-- Navigation Links -->
                <div class="hidden space-x-8 sm:-my-px sm:ml-10 sm:flex">
                    <x-nav-link :href="route('karyawan')" :active="request()->routeIs('karyawan')">
                        {{ __('Karyawan') }}
                    </x-nav-link>
                    <x-nav-link :href="route('departemen')" :active="request()->routeIs('departemen')">
                        {{ __('Departemen') }}
                    </x-nav-link>
                    <x-nav-link :href="route('jabatan')" :active="request()->routeIs('jabatan')">
                        {{ __('Jabatan') }}
                    </x-nav-link>
                    
                </div>
            </div>

            <!-- Settings Dropdown -->
            <div class="hidden sm:flex sm:items-center sm:ml-6">
                <!-- Authentication -->
                <form method="POST" action="{{ route('logout') }}">
                    @csrf
                    {{-- <button class="inline-flex items-center px-3 py-2 border border-transparent text-sm leading-4 font-medium rounded-md text-gray-500 bg-white hover:text-gray-700 focus:outline-none transition ease-in-out duration-150"> --}}
                    <div class="px-4 py-2 rounded-l-md rounded-r-md border text-white bg-black cursor-pointer hover:bg-gray-700">
                        <a href="{{ route('logout') }}"      
                            onclick="event.preventDefault();
                                        this.closest('form').submit();">
                        {{ __('Logout') }}
                    </a>
                    </div>
                </form>
                
            </div>

            
        </div>
    </div>

    
</nav>

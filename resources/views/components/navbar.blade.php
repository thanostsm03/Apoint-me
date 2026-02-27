<nav class="bg-background border-b border-primary/20">
    <div class="w-full px-4 sm:px-6 lg:px-8">
        <div class="flex items-center h-16">
            <div class="flex items-center gap-2 flex-1">
                <div class="p-2 bg-primary border-2 border-primary rounded-xl">
                    <svg class="w-5 h-5 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4" />
                    </svg>
                </div>
                <span class="font-heading font-bold text-xl text-slate-800">AppointMe</span>
            </div>

            <div class="flex gap-2 absolute left-1/2 transform -translate-x-1/2">
                <a href="/businesses"
                    class="flex items-center gap-2 text-sm px-3 py-2 rounded-xl transition-all duration-200 {{ request()->is('businesses*') ? 'bg-primary/10 text-primary' : 'text-gray-600 hover:bg-stone-200' }}">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6" />
                    </svg>
                    Home
                </a>
                <a href="/appointments"
                    class="flex items-center gap-2 text-sm px-3 py-2 rounded-xl transition-all duration-200 {{ request()->is('appointments*') ? 'bg-primary/10 text-primary' : 'text-gray-600 hover:bg-stone-200' }}">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z" />
                    </svg>
                    My Appointments
                </a>
                <a href="{{ route('my_businesses.index') }}"
                    class="flex items-center gap-2 text-sm px-3 py-2 rounded-xl transition-all duration-200 {{ request()->is('my_businesses*') ? 'bg-primary/10 text-primary' : 'text-gray-600 hover:bg-stone-200' }}">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4" />
                    </svg>
                    My business
                </a>
            </div>

            <div class="flex-1 flex justify-end gap-3">
                @auth
                    <span class="text-gray-700 font-body font-medium px-4 py-2 flex items-center gap-2">
                        <svg class="w-5 h-5 text-primary" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" />
                        </svg>
                        {{ Auth::user()->name }}
                    </span>
                    <form action="{{ route('logout') }}" method="POST">
                        @csrf
                        <button type="submit"
                            class="text-gray-700 font-body font-medium px-4 py-2 rounded-lg hover:bg-stone-200 transition-all duration-200">
                            Logout
                        </button>
                    </form>
                @else
                    <a href="{{ route('login') }}"
                        class="text-gray-700 font-body font-medium px-4 py-2 rounded-lg hover:bg-stone-200 transition-all duration-200">
                        Login
                    </a>
                    <a href="{{ route('register') }}"
                        class="bg-primary text-white font-body font-bold px-4 py-2 rounded-lg hover:bg-primary/80 hover:scale-105 transition-all duration-200 shadow-sm hover:shadow-md">
                        Register
                    </a>
                @endauth
            </div>
        </div>
    </div>
</nav>

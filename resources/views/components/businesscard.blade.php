<a href="{{ route('businesses.show', $business) }}"
    class="block bg-white rounded-xl shadow-lg hover:shadow-2xl transition-all duration-300 overflow-hidden border border-gray-200 hover:border-primary/30 hover:-translate-y-1 cursor-pointer">
    <div class="relative h-44 overflow-hidden">
        <img src="https://images.unsplash.com/photo-1585747860715-2ba37e788b70?q=80&w=874&auto=format&fit=crop&ixlib=rb-4.1.0&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D"
            alt="{{ $business->name }}"
            class="w-full h-full object-cover hover:scale-105 transition-transform duration-300">
        <div class="absolute top-3 left-3">
            <x-tag :value="config(
                'business_categories.' . $business->category . '.subcategories.' . $business->subcategory,
            )" />
        </div>
    </div>

    <div class="p-5 space-y-4">
        <h3 class="font-heading font-bold text-xl text-slate-800 leading-tight">
            {{ $business->name }}
        </h3>

        <div class="flex items-center gap-2 text-gray-600 text-sm">
            <svg class="w-5 h-5 text-primary" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                    d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z" />
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                    d="M15 11a3 3 0 11-6 0 3 3 0 016 0z" />
            </svg>
            <p class="font-body">{{ $business->city }}, {{ $business->country }}</p>
        </div>

        <span class="inline-block bg-primary text-white font-body font-bold px-6 py-3 rounded-xl hover:bg-primary/80 hover:scale-105 transition-all duration-200 shadow-sm hover:shadow-md w-full text-center">Book Now</span>
    </div>
</a>

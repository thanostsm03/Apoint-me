<div class="bg-white rounded-xl shadow-md hover:shadow-xl transition-all duration-300 overflow-hidden border border-gray-100 hover:border-primary/20">
    <div class="relative h-52 overflow-hidden">
        <img src="https://images.unsplash.com/photo-1585747860715-2ba37e788b70?q=80&w=874&auto=format&fit=crop&ixlib=rb-4.1.0&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D"
            alt="{{ $business->name }}"
            class="w-full h-full object-cover hover:scale-105 transition-transform duration-300">
        <div class="absolute top-3 left-3">
            <x-tag :value="config('business_categories.' . $business->category . '.subcategories.' . $business->subcategory)" />
        </div>
    </div>
    
    <div class="p-6 space-y-5">
        <h3 class="font-heading font-bold text-2xl text-slate-800 leading-tight">
            {{ $business->name }}
        </h3>
        
        <div class="flex items-center gap-2 text-gray-600 text-base">
            <svg class="w-5 h-5 text-primary" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"/>
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"/>
            </svg>
            <p class="font-body">{{ $business->city }}, {{ $business->country }}</p>
        </div>
        
        <x-button-link href="#" class="w-full text-center">Book Now</x-button-link>
    </div>
</div>

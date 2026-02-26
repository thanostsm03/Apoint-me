<x-layout>
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-12">
        <div class="mb-12">
            <h1 class="font-heading font-bold text-4xl text-slate-800 mb-3">Discover Local Businesses</h1>
            <p class="text-gray-600 text-lg mb-8">Find and book appointments with trusted professionals in your area</p>
            
            <!-- Search Bar -->
            <div class="bg-white rounded-2xl shadow-lg p-4 border border-gray-200">
                <form action="{{ route('businesses.index') }}" method="GET" class="flex flex-col md:flex-row gap-4">
                    <!-- Search Input -->
                    <div class="flex-1 relative">
                        <svg class="absolute left-4 top-1/2 transform -translate-y-1/2 w-5 h-5 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"/>
                        </svg>
                        <input type="text" 
                               name="search" 
                               placeholder="Search businesses..." 
                               value="{{ request('search') }}"
                               class="w-full pl-12 pr-4 py-3 rounded-xl border border-gray-300 focus:border-primary focus:ring-2 focus:ring-primary/20 outline-none transition font-body">
                    </div>
                    
                    <!-- Category Dropdown -->
                    <x-custom-select name="category" 
                                     placeholder="All Categories"
                                     :selected="request('category')"
                                     :selectedLabel="request('category') ? config('business_categories.' . request('category') . '.label') : 'All Categories'">
                        <x-slot:icon>
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2H6a2 2 0 01-2-2V6zM14 6a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2h-2a2 2 0 01-2-2V6zM4 16a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2H6a2 2 0 01-2-2v-2zM14 16a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2h-2a2 2 0 01-2-2v-2z"/>
                        </x-slot:icon>
                        @foreach(config('business_categories') as $key => $category)
                            <x-select-option value="{{ $key }}" label="{{ $category['label'] }}" />
                        @endforeach
                    </x-custom-select>
                    
                    <!-- Location Dropdown -->
                    <x-searchable-select name="location" 
                                         placeholder="All Locations"
                                         :selected="request('location')"
                                         :selectedLabel="request('location') ?: 'All Locations'">
                        <x-slot:icon>
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"/>
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"/>
                        </x-slot:icon>
                        @foreach($businesses->unique('city') as $business)
                            <x-searchable-option value="{{ $business->city }}" label="{{ $business->city }}" />
                        @endforeach
                    </x-searchable-select>
                    
                    <!-- Search Button -->
                    <button type="submit" 
                            class="bg-primary text-white font-body font-bold px-8 py-3 rounded-xl hover:bg-primary/80 hover:scale-105 transition-all duration-200 shadow-sm hover:shadow-md">
                        Search
                    </button>
                </form>
            </div>
        </div>
        
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
            @foreach ($businesses as $business)
                <x-businesscard :$business></x-businesscard>
            @endforeach
        </div>
    </div>
</x-layout>

<div x-data="{ 
        open: false, 
        selected: '{{ $selected ?? '' }}', 
        selectedLabel: '{{ $selectedLabel ?? $placeholder }}',
        search: '',
        get filteredOptions() {
            if (!this.search) return this.$refs.options?.children || [];
            return Array.from(this.$refs.options?.children || []).filter(el => {
                return el.textContent.toLowerCase().includes(this.search.toLowerCase());
            });
        }
     }" 
     @click.away="open = false" 
     class="relative">
    <input type="hidden" name="{{ $name }}" :value="selected">
    
    <button type="button" 
            @click="open = !open"
            class="appearance-none w-full md:w-56 pl-12 pr-10 py-3 rounded-xl border-2 border-gray-200 hover:border-primary/50 focus:border-primary focus:ring-2 focus:ring-primary/20 outline-none transition-all font-body bg-white cursor-pointer text-gray-700 font-medium text-left">
        <span x-text="selectedLabel"></span>
    </button>
    
    <svg class="absolute left-4 top-1/2 transform -translate-y-1/2 w-5 h-5 text-primary pointer-events-none" fill="none" stroke="currentColor" viewBox="0 0 24 24">
        {!! $icon !!}
    </svg>
    
    <svg class="absolute right-4 top-1/2 transform -translate-y-1/2 w-5 h-5 text-primary pointer-events-none transition-transform" 
         :class="{ 'rotate-180': open }"
         fill="none" stroke="currentColor" viewBox="0 0 24 24">
        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"/>
    </svg>
    
    <div x-show="open" 
         x-cloak
         x-transition:enter="transition ease-out duration-200"
         x-transition:enter-start="opacity-0 translate-y-1"
         x-transition:enter-end="opacity-100 translate-y-0"
         x-transition:leave="transition ease-in duration-150"
         x-transition:leave-start="opacity-100 translate-y-0"
         x-transition:leave-end="opacity-0 translate-y-1"
         class="absolute z-50 w-full mt-2 bg-white border-2 border-gray-200 rounded-xl shadow-xl overflow-hidden">
        
        <!-- Search Input -->
        <div class="p-3 border-b border-gray-200">
            <div class="relative">
                <svg class="absolute left-3 top-1/2 transform -translate-y-1/2 w-4 h-4 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"/>
                </svg>
                <input type="text" 
                       x-model="search"
                       @click.stop
                       placeholder="Search locations..."
                       class="w-full pl-10 pr-3 py-2 rounded-lg border border-gray-300 focus:border-primary focus:ring-1 focus:ring-primary/20 outline-none transition font-body text-sm">
            </div>
        </div>
        
        <!-- Options List -->
        <div class="max-h-48 overflow-auto">
            <div @click="selected = ''; selectedLabel = '{{ $placeholder }}'; open = false; search = ''"
                 class="px-4 py-3 hover:bg-primary/10 cursor-pointer transition-colors font-body text-gray-700 border-b border-gray-100">
                {{ $placeholder }}
            </div>
            <div x-ref="options">
                {{ $slot }}
            </div>
        </div>
    </div>
</div>

<div x-data="{ open: false, selected: '{{ $selected ?? '' }}', selectedLabel: '{{ $selectedLabel ?? $placeholder }}' }" 
     @click.away="open = false" 
     class="relative">
    <input type="hidden" name="{{ $name }}" :value="selected">
    
    <button type="button" 
            @click="open = !open"
            class="appearance-none w-full md:w-56 pl-12 pr-10 py-3 rounded-xl border-2 border-gray-200 hover:border-primary/50 focus:border-primary focus:ring-2 focus:ring-primary/20 outline-none transition-all font-body bg-white cursor-pointer text-gray-700 font-medium text-left">
        <span x-text="selectedLabel" class="block truncate"></span>
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
         class="absolute z-50 w-full mt-2 bg-white border-2 border-gray-200 rounded-xl shadow-xl max-h-60 overflow-auto">
        <div @click="selected = ''; selectedLabel = '{{ $placeholder }}'; open = false; $nextTick(() => $el.closest('form').submit())"
             class="px-4 py-3 hover:bg-primary/10 cursor-pointer transition-colors font-body text-gray-700 border-b border-gray-100">
            {{ $placeholder }}
        </div>
        {{ $slot }}
    </div>
</div>

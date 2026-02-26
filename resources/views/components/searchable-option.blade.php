<div @click="selected = '{{ $value }}'; selectedLabel = '{{ $label }}'; open = false; search = ''"
     x-show="!search || '{{ strtolower($label) }}'.includes(search.toLowerCase())"
     class="px-4 py-3 hover:bg-primary/10 cursor-pointer transition-colors font-body text-gray-700 border-b border-gray-100 last:border-b-0"
     :class="{ 'bg-primary/5 font-bold': selected === '{{ $value }}' }">
    {{ $label }}
</div>

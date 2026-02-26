<x-layout>
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-12">
        <div class="mb-12">
            <h1 class="font-heading font-bold text-4xl text-slate-800 mb-3">Discover Local Businesses</h1>
            <p class="text-gray-600 text-lg">Find and book appointments with trusted professionals in your area</p>
        </div>
        
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
            @foreach ($businesses as $business)
                <x-businesscard :$business></x-businesscard>
            @endforeach
        </div>
    </div>
</x-layout>

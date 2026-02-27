<x-layout>
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-8">
        <!-- Header -->
        <div class="mb-8">
            <h1 class="font-heading font-bold text-4xl text-slate-800 mb-2">My Businesses</h1>
            <p class="text-gray-600 font-body">Manage and view all your registered businesses</p>
        </div>

        <!-- Stats Cards -->
        <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mb-8">
            <div class="bg-white rounded-2xl shadow-lg p-6 border border-gray-200">
                <div class="flex items-center justify-between">
                    <div>
                        <p class="text-gray-600 font-body text-sm mb-1">Total Businesses</p>
                        <p class="font-heading font-bold text-3xl text-slate-800">{{ $businesses->count() }}</p>
                    </div>
                    <div class="p-3 bg-primary/10 rounded-xl">
                        <svg class="w-8 h-8 text-primary" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4" />
                        </svg>
                    </div>
                </div>
            </div>

            <div class="bg-white rounded-2xl shadow-lg p-6 border border-gray-200">
                <div class="flex items-center justify-between">
                    <div>
                        <p class="text-gray-600 font-body text-sm mb-1">Total Employees</p>
                        <p class="font-heading font-bold text-3xl text-slate-800">0</p>
                    </div>
                    <div class="p-3 bg-purple-100 rounded-xl">
                        <svg class="w-8 h-8 text-purple-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z" />
                        </svg>
                    </div>
                </div>
            </div>

            <div class="bg-white rounded-2xl shadow-lg p-6 border border-gray-200">
                <div class="flex items-center justify-between">
                    <div>
                        <p class="text-gray-600 font-body text-sm mb-1">Total Appointments</p>
                        <p class="font-heading font-bold text-3xl text-slate-800">0</p>
                    </div>
                    <div class="p-3 bg-blue-100 rounded-xl">
                        <svg class="w-8 h-8 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z" />
                        </svg>
                    </div>
                </div>
            </div>
        </div>

        <!-- Businesses Grid -->
        @if($businesses->count() > 0)
            <div class="bg-white rounded-2xl shadow-lg p-6 border border-gray-200">
                <div class="flex items-center justify-between mb-6">
                    <h2 class="font-heading font-bold text-2xl text-slate-800">Your Businesses</h2>
                    <x-button-link href="#">
                        <svg class="w-5 h-5 inline-block mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4" />
                        </svg>
                        Add New Business
                    </x-button-link>
                </div>

                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                    @foreach ($businesses as $business)
                        <x-businesscard :business="$business" />
                    @endforeach
                </div>
            </div>
        @else
            <div class="bg-white rounded-2xl shadow-lg p-12 border border-gray-200 text-center">
                <div class="max-w-md mx-auto">
                    <div class="p-4 bg-gray-100 rounded-full w-20 h-20 mx-auto mb-6 flex items-center justify-center">
                        <svg class="w-10 h-10 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4" />
                        </svg>
                    </div>
                    <h3 class="font-heading font-bold text-2xl text-slate-800 mb-2">No Businesses Yet</h3>
                    <p class="text-gray-600 font-body mb-6">Start by adding your first business to the platform</p>
                    <x-button-link href="#">
                        <svg class="w-5 h-5 inline-block mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4" />
                        </svg>
                        Add Your First Business
                    </x-button-link>
                </div>
            </div>
        @endif
    </div>
</x-layout>

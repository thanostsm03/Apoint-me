<x-layout>
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-8">
        <!-- Back Button -->
        <div class="mb-6">
            <x-button-link href="{{ route('businesses.index') }}">
                <svg class="w-5 h-5 inline-block mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M10 19l-7-7m0 0l7-7m-7 7h18" />
                </svg>
                Back to Businesses
            </x-button-link>
        </div>

        <div class="grid grid-cols-1 lg:grid-cols-3 gap-8">
            <div class="lg:col-span-2 space-y-6">
                <div class="relative h-96 rounded-2xl overflow-hidden shadow-xl">
                    <img src="https://images.unsplash.com/photo-1585747860715-2ba37e788b70?q=80&w=874&auto=format&fit=crop&ixlib=rb-4.1.0&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D"
                        alt="{{ $business->name }}" class="w-full h-full object-cover">
                    <div class="absolute top-4 left-4">
                        <x-tag :value="config(
                            'business_categories.' . $business->category . '.subcategories.' . $business->subcategory,
                        )" />
                    </div>
                </div>

                <!-- Business Info -->
                <div class="bg-white rounded-2xl shadow-lg p-8 border border-gray-200">
                    <h1 class="font-heading font-bold text-4xl text-slate-800 mb-4">{{ $business->name }}</h1>

                    <div class="flex items-start gap-3 text-gray-600 mb-6">
                        <svg class="w-6 h-6 text-primary mt-1 flex-shrink-0" fill="none" stroke="currentColor"
                            viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z" />
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M15 11a3 3 0 11-6 0 3 3 0 016 0z" />
                        </svg>
                        <div>
                            <p class="font-body text-lg">{{ $business->address }}</p>
                            <p class="font-body text-lg">{{ $business->city }}, {{ $business->zip }}</p>
                            <p class="font-body text-lg">{{ $business->country }}</p>
                        </div>
                    </div>

                    <div class="border-t border-gray-200 pt-6">
                        <h2 class="font-heading font-bold text-2xl text-slate-800 mb-4">About</h2>
                        <p class="font-body text-gray-700 text-lg leading-relaxed">{{ $business->description }}</p>
                    </div>
                </div>
            </div>

            <!-- Sidebar -->
            <div class="lg:col-span-1">
                <div class="bg-white rounded-2xl shadow-lg p-6 border border-gray-200 sticky top-8 space-y-6">
                    <x-button-link href="#" class="w-full text-center">
                        <svg class="w-5 h-5 inline-block mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z" />
                        </svg>
                        Book Appointment
                    </x-button-link>

                    <!-- Contact Information -->
                    <div class="border-t border-gray-200 pt-6">
                        <h3 class="font-heading font-bold text-xl text-slate-800 mb-4">Contact Information</h3>
                        <ul class="space-y-4">
                            <li class="flex items-start gap-3">
                                <svg class="w-5 h-5 text-primary mt-0.5 flex-shrink-0" fill="none"
                                    stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z" />
                                </svg>
                                <a href="tel:{{ $business->phone }}"
                                    class="font-body text-gray-700 hover:text-primary transition">{{ $business->phone }}</a>
                            </li>
                            <li class="flex items-start gap-3">
                                <svg class="w-5 h-5 text-primary mt-0.5 flex-shrink-0" fill="none"
                                    stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z" />
                                </svg>
                                <a href="mailto:{{ $business->email }}"
                                    class="font-body text-gray-700 hover:text-primary transition break-all">{{ $business->email }}</a>
                            </li>
                            @if ($business->website)
                                <li class="flex items-start gap-3">
                                    <svg class="w-5 h-5 text-primary mt-0.5 flex-shrink-0" fill="none"
                                        stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M21 12a9 9 0 01-9 9m9-9a9 9 0 00-9-9m9 9H3m9 9a9 9 0 01-9-9m9 9c1.657 0 3-4.03 3-9s-1.343-9-3-9m0 18c-1.657 0-3-4.03-3-9s1.343-9 3-9m-9 9a9 9 0 019-9" />
                                    </svg>
                                    <a href="{{ $business->website }}" target="_blank"
                                        class="font-body text-gray-700 hover:text-primary transition break-all">{{ $business->website }}</a>
                                </li>
                            @endif
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-layout>

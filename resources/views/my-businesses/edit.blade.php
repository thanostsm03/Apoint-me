<x-layout>
    <div class="min-h-screen flex items-center justify-center py-12 px-4 sm:px-6 lg:px-8">
        <div class="max-w-2xl w-full">
            <!-- Header -->
            <div class="text-center mb-8">
                <h1 class="font-heading font-bold text-4xl text-slate-800 mb-2">Edit Your Business</h1>
                <p class="text-gray-600 font-body">Update your business information</p>
            </div>

            <!-- Form Card -->
            <div class="bg-white rounded-2xl shadow-xl p-8 border border-gray-200">
                <form action="{{ route('my_businesses.update', $business) }}" method="POST" class="space-y-6"
                    data-categories='@json(config('business_categories'))'>
                    @csrf
                    @method('PUT')

                    <!-- Business Name -->
                    <div>
                        <label for="name" class="block text-sm font-body font-bold text-gray-700 mb-2">Business
                            Name</label>
                        <input type="text" id="name" name="name" value="{{ old('name', $business->name) }}"
                            required
                            class="w-full px-4 py-3 rounded-xl border-2 border-gray-200 focus:border-primary focus:ring-2 focus:ring-primary/20 outline-none transition font-body"
                            placeholder="My Business">
                    </div>

                    <!-- Description -->
                    <div>
                        <label for="description"
                            class="block text-sm font-body font-bold text-gray-700 mb-2">Description</label>
                        <textarea id="description" name="description" rows="4"
                            class="w-full px-4 py-3 rounded-xl border-2 border-gray-200 focus:border-primary focus:ring-2 focus:ring-primary/20 outline-none transition font-body resize-none"
                            placeholder="Describe your business...">{{ old('description', $business->description) }}</textarea>
                    </div>

                    <!-- Category & Subcategory -->
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                        <div>
                            <label class="block text-sm font-body font-bold text-gray-700 mb-2">Category</label>
                            <x-custom-select name="category" placeholder="Select a category" :selected="old('category', $business->category)"
                                :selectedLabel="old('category', $business->category)
                                    ? config('business_categories.' . old('category', $business->category) . '.label')
                                    : 'Select a category'">
                                <x-slot:icon>
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M4 6a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2H6a2 2 0 01-2-2V6zM14 6a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2h-2a2 2 0 01-2-2V6zM4 16a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2H6a2 2 0 01-2-2v-2zM14 16a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2h-2a2 2 0 01-2-2v-2z" />
                                </x-slot:icon>
                                @foreach (config('business_categories') as $key => $category)
                                    <x-select-option-no-submit value="{{ $key }}"
                                        label="{{ $category['label'] }}" />
                                @endforeach
                            </x-custom-select>
                        </div>

                        <div>
                            <label class="block text-sm font-body font-bold text-gray-700 mb-2">Subcategory</label>
                            <x-custom-select name="subcategory" placeholder="Select a category first" :selected="old('subcategory', $business->subcategory)"
                                :selectedLabel="old('subcategory', $business->subcategory)
                                    ? ucfirst(str_replace('_', ' ', old('subcategory', $business->subcategory)))
                                    : 'Select a category first'">
                                <x-slot:icon>
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M7 7h.01M7 3h5c.512 0 1.024.195 1.414.586l7 7a2 2 0 010 2.828l-7 7a2 2 0 01-2.828 0l-7-7A1.994 1.994 0 013 12V7a4 4 0 014-4z" />
                                </x-slot:icon>
                                @if ($business->category && config('business_categories.' . $business->category . '.subcategories'))
                                    @foreach (config('business_categories.' . $business->category . '.subcategories') as $key => $label)
                                        <x-select-option-no-submit value="{{ $key }}"
                                            label="{{ $label }}" />
                                    @endforeach
                                @endif
                            </x-custom-select>
                        </div>
                    </div>

                    <!-- Location Section -->
                    <div class="border-t pt-6">
                        <h3 class="font-heading font-bold text-lg text-slate-800 mb-4">Location</h3>

                        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                            <div>
                                <label for="country"
                                    class="block text-sm font-body font-bold text-gray-700 mb-2">Country</label>
                                <input type="text" id="country" name="country"
                                    value="{{ old('country', $business->country) }}"
                                    class="w-full px-4 py-3 rounded-xl border-2 border-gray-200 focus:border-primary focus:ring-2 focus:ring-primary/20 outline-none transition font-body"
                                    placeholder="United States">
                            </div>

                            <div>
                                <label for="city"
                                    class="block text-sm font-body font-bold text-gray-700 mb-2">City</label>
                                <input type="text" id="city" name="city"
                                    value="{{ old('city', $business->city) }}"
                                    class="w-full px-4 py-3 rounded-xl border-2 border-gray-200 focus:border-primary focus:ring-2 focus:ring-primary/20 outline-none transition font-body"
                                    placeholder="New York">
                            </div>
                        </div>

                        <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mt-6">
                            <div class="md:col-span-2">
                                <label for="address"
                                    class="block text-sm font-body font-bold text-gray-700 mb-2">Address</label>
                                <input type="text" id="address" name="address"
                                    value="{{ old('address', $business->address) }}"
                                    class="w-full px-4 py-3 rounded-xl border-2 border-gray-200 focus:border-primary focus:ring-2 focus:ring-primary/20 outline-none transition font-body"
                                    placeholder="123 Main St">
                            </div>

                            <div>
                                <label for="zip" class="block text-sm font-body font-bold text-gray-700 mb-2">ZIP
                                    Code</label>
                                <input type="text" id="zip" name="zip"
                                    value="{{ old('zip', $business->zip) }}"
                                    class="w-full px-4 py-3 rounded-xl border-2 border-gray-200 focus:border-primary focus:ring-2 focus:ring-primary/20 outline-none transition font-body"
                                    placeholder="10001">
                            </div>
                        </div>
                    </div>

                    <!-- Contact Section -->
                    <div class="border-t pt-6">
                        <h3 class="font-heading font-bold text-lg text-slate-800 mb-4">Contact Information</h3>

                        <div class="space-y-6">
                            <div>
                                <label for="email"
                                    class="block text-sm font-body font-bold text-gray-700 mb-2">Email</label>
                                <input type="email" id="email" name="email"
                                    value="{{ old('email', $business->email) }}"
                                    class="w-full px-4 py-3 rounded-xl border-2 border-gray-200 focus:border-primary focus:ring-2 focus:ring-primary/20 outline-none transition font-body"
                                    placeholder="contact@business.com">
                            </div>

                            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                                <div>
                                    <label for="phone"
                                        class="block text-sm font-body font-bold text-gray-700 mb-2">Phone</label>
                                    <input type="tel" id="phone" name="phone"
                                        value="{{ old('phone', $business->phone) }}"
                                        class="w-full px-4 py-3 rounded-xl border-2 border-gray-200 focus:border-primary focus:ring-2 focus:ring-primary/20 outline-none transition font-body"
                                        placeholder="(555) 123-4567">
                                </div>

                                <div>
                                    <label for="website"
                                        class="block text-sm font-body font-bold text-gray-700 mb-2">Website</label>
                                    <input type="url" id="website" name="website"
                                        value="{{ old('website', $business->website) }}"
                                        class="w-full px-4 py-3 rounded-xl border-2 border-gray-200 focus:border-primary focus:ring-2 focus:ring-primary/20 outline-none transition font-body"
                                        placeholder="https://business.com">
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Submit Button -->
                    <button type="submit"
                        class="w-full bg-primary text-white font-body font-bold px-6 py-3 rounded-xl hover:bg-primary/80 hover:scale-105 transition-all duration-200 shadow-sm hover:shadow-md">
                        Update Business
                    </button>
                </form>
            </div>
        </div>
    </div>

    @vite('resources/js/category-subcategory.js')
</x-layout>

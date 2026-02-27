<x-layout>
    <div class="min-h-screen flex items-center justify-center py-12 px-4 sm:px-6 lg:px-8">
        <div class="max-w-md w-full">
            <!-- Header -->
            <div class="text-center mb-8">
                <h1 class="font-heading font-bold text-4xl text-slate-800 mb-2">Become a Business Owner</h1>
                <p class="text-gray-600 font-body">Register your phone number to start managing your business</p>
            </div>

            <!-- Form Card -->
            <div class="bg-white rounded-2xl shadow-xl p-8 border border-gray-200">
                <form action="{{ route('owner.store') }}" method="POST" class="space-y-6">
                    @csrf
                    
                    <!-- Phone Number Input -->
                    <div>
                        <label for="phone" class="block text-sm font-body font-bold text-gray-700 mb-2">Phone Number</label>
                        <input type="tel" 
                               id="phone"
                               name="phone" 
                               value="{{ old('phone') }}"
                               required
                               class="w-full px-4 py-3 rounded-xl border-2 border-gray-200 focus:border-primary focus:ring-2 focus:ring-primary/20 outline-none transition font-body"
                               placeholder="+1234567890">
                        @error('phone')
                            <p class="mt-1 text-sm text-red-600 font-body">{{ $message }}</p>
                        @enderror
                    </div>
                    
                    <!-- Submit Button -->
                    <button type="submit" 
                            class="w-full bg-primary text-white font-body font-bold px-6 py-3 rounded-xl hover:bg-primary/80 hover:scale-105 transition-all duration-200 shadow-sm hover:shadow-md">
                        Register as Owner
                    </button>
                </form>
            </div>
        </div>
    </div>
</x-layout>

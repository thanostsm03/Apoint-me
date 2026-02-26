<x-layout>
    <div class="min-h-screen flex items-center justify-center py-12 px-4 sm:px-6 lg:px-8">
        <div class="max-w-md w-full">
            <!-- Header -->
            <div class="text-center mb-8">
                <h1 class="font-heading font-bold text-4xl text-slate-800 mb-2">Create Account</h1>
                <p class="text-gray-600 font-body">Join AppointMe to book appointments with local businesses</p>
            </div>

            <!-- Form Card -->
            <div class="bg-white rounded-2xl shadow-xl p-8 border border-gray-200">
                <form action="{{ route('register') }}" method="POST" class="space-y-6">
                    @csrf
                    
                    <!-- Name Input -->
                    <div>
                        <label for="name" class="block text-sm font-body font-bold text-gray-700 mb-2">Full Name</label>
                        <input type="text" 
                               id="name"
                               name="name" 
                               value="{{ old('name') }}"
                               required
                               class="w-full px-4 py-3 rounded-xl border-2 border-gray-200 focus:border-primary focus:ring-2 focus:ring-primary/20 outline-none transition font-body"
                               placeholder="John Doe">
                        @error('name')
                            <p class="mt-1 text-sm text-red-600 font-body">{{ $message }}</p>
                        @enderror
                    </div>
                    
                    <!-- Email Input -->
                    <div>
                        <label for="email" class="block text-sm font-body font-bold text-gray-700 mb-2">Email Address</label>
                        <input type="email" 
                               id="email"
                               name="email" 
                               value="{{ old('email') }}"
                               required
                               class="w-full px-4 py-3 rounded-xl border-2 border-gray-200 focus:border-primary focus:ring-2 focus:ring-primary/20 outline-none transition font-body"
                               placeholder="john@example.com">
                        @error('email')
                            <p class="mt-1 text-sm text-red-600 font-body">{{ $message }}</p>
                        @enderror
                    </div>
                    
                    <!-- Password Input -->
                    <div>
                        <label for="password" class="block text-sm font-body font-bold text-gray-700 mb-2">Password</label>
                        <input type="password" 
                               id="password"
                               name="password" 
                               required
                               class="w-full px-4 py-3 rounded-xl border-2 border-gray-200 focus:border-primary focus:ring-2 focus:ring-primary/20 outline-none transition font-body"
                               placeholder="••••••••">
                        @error('password')
                            <p class="mt-1 text-sm text-red-600 font-body">{{ $message }}</p>
                        @enderror
                    </div>
                    
                    <!-- Password Confirmation Input -->
                    <div>
                        <label for="password_confirmation" class="block text-sm font-body font-bold text-gray-700 mb-2">Confirm Password</label>
                        <input type="password" 
                               id="password_confirmation"
                               name="password_confirmation" 
                               required
                               class="w-full px-4 py-3 rounded-xl border-2 border-gray-200 focus:border-primary focus:ring-2 focus:ring-primary/20 outline-none transition font-body"
                               placeholder="••••••••">
                    </div>
                    
                    <!-- Submit Button -->
                    <button type="submit" 
                            class="w-full bg-primary text-white font-body font-bold px-6 py-3 rounded-xl hover:bg-primary/80 hover:scale-105 transition-all duration-200 shadow-sm hover:shadow-md">
                        Create Account
                    </button>
                </form>
                
                <!-- Login Link -->
                <div class="mt-6 text-center">
                    <p class="text-gray-600 font-body text-sm">
                        Already have an account? 
                        <a href="{{ route('login') }}" class="text-primary font-bold hover:underline">Sign in</a>
                    </p>
                </div>
            </div>
        </div>
    </div>
</x-layout>

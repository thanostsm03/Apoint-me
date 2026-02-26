<x-layout>
    <div class="min-h-screen flex items-center justify-center py-12 px-4 sm:px-6 lg:px-8">
        <div class="max-w-md w-full">
            <!-- Header -->
            <div class="text-center mb-8">
                <h1 class="font-heading font-bold text-4xl text-slate-800 mb-2">Welcome Back</h1>
                <p class="text-gray-600 font-body">Sign in to your AppointMe account</p>
            </div>

            <!-- Form Card -->
            <div class="bg-white rounded-2xl shadow-xl p-8 border border-gray-200">
                <form action="{{ route('login') }}" method="POST" class="space-y-6">
                    @csrf
                    
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
                    
                    <!-- Remember Me -->
                    <div class="flex items-center">
                        <input type="checkbox" 
                               id="remember"
                               name="remember" 
                               class="w-4 h-4 text-primary border-gray-300 rounded focus:ring-primary">
                        <label for="remember" class="ml-2 text-sm font-body text-gray-700">Remember me</label>
                    </div>
                    
                    <!-- Submit Button -->
                    <button type="submit" 
                            class="w-full bg-primary text-white font-body font-bold px-6 py-3 rounded-xl hover:bg-primary/80 hover:scale-105 transition-all duration-200 shadow-sm hover:shadow-md">
                        Sign In
                    </button>
                </form>
                
                <!-- Register Link -->
                <div class="mt-6 text-center">
                    <p class="text-gray-600 font-body text-sm">
                        Don't have an account? 
                        <a href="{{ route('register') }}" class="text-primary font-bold hover:underline">Create one</a>
                    </p>
                </div>
            </div>
        </div>
    </div>
</x-layout>

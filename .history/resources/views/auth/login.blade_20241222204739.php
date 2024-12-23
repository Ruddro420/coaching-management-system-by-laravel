<x-guest-layout>
    <div class="min-h-screen flex items-center justify-center bg-gradient-to-r from-indigo-500 via-purple-500 to-pink-500 p-6">
        <div class="w-full max-w-md bg-white rounded-lg shadow-lg p-8">
            <center>
                <h1 class="text-2xl font-bold text-gray-800 mb-2">Welcome Back!</h1>
                <p class="text-sm text-gray-600 mb-6">Log in to your account</p>
            </center>
            
            <!-- Demo Credentials (can be removed in production) -->
            <div class="bg-gray-100 p-4 rounded-md text-sm text-gray-700 mb-4">
                <p>Email: <strong>admin@gmail.com</strong></p>
                <p>Password: <strong>12345678</strong></p>
            </div>

            <!-- Session Status -->
            <x-auth-session-status class="mb-4" :status="session('status')" />

            <form method="POST" action="{{ route('login') }}">
                @csrf

                <!-- Email Address -->
                <div class="mb-4">
                    <x-input-label for="email" :value="__('Email')" class="text-gray-700" />
                    <x-text-input 
                        id="email" 
                        class="block mt-2 w-full border-gray-300 rounded-lg shadow-sm focus:ring-indigo-500 focus:border-indigo-500" 
                        type="email" 
                        name="email" 
                        :value="old('email')" 
                        required 
                        autofocus 
                        autocomplete="username" 
                    />
                    <x-input-error :messages="$errors->get('email')" class="mt-2" />
                </div>

                <!-- Password -->
                <div class="mb-4">
                    <x-input-label for="password" :value="__('Password')" class="text-gray-700" />
                    <x-text-input 
                        id="password" 
                        class="block mt-2 w-full border-gray-300 rounded-lg shadow-sm focus:ring-indigo-500 focus:border-indigo-500" 
                        type="password" 
                        name="password" 
                        required 
                        autocomplete="current-password" 
                    />
                    <x-input-error :messages="$errors->get('password')" class="mt-2" />
                </div>

                <!-- Remember Me -->
                <div class="flex items-center mb-4">
                    <label for="remember_me" class="flex items-center">
                        <input 
                            id="remember_me" 
                            type="checkbox" 
                            class="h-4 w-4 text-indigo-600 focus:ring-indigo-500 border-gray-300 rounded"
                            name="remember" 
                        />
                        <span class="ml-2 text-sm text-gray-600">{{ __('Remember me') }}</span>
                    </label>
                </div>

                <div class="flex items-center justify-between">
                    <!-- Uncomment if needed -->
                    {{-- @if (Route::has('password.request'))
                        <a href="{{ route('password.request') }}" 
                           class="text-sm text-indigo-600 hover:text-indigo-800">
                            {{ __('Forgot your password?') }}
                        </a>
                    @endif --}}
                    
                    <x-primary-button 
                        class="px-4 py-2 bg-indigo-600 text-white text-sm font-medium rounded-lg shadow hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2">
                        {{ __('Log in') }}
                    </x-primary-button>
                </div>
            </form>
        </div>
    </div>
</x-guest-layout>

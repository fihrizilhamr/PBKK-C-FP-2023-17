<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <h3 class="text-lg font-semibold mb-4">Welcome, {{ auth()->user()->name }}!</h3>

                    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-4">
                        <div class="p-4 bg-gray-100 rounded-md">
                            <h4 class="text-xl font-semibold mb-2">Profile Information</h4>
                            <p><strong>Name:</strong> {{ auth()->user()->name }}</p>
                            <p><strong>Email:</strong> {{ auth()->user()->email }}</p>
                            <p><strong>Birthdate:</strong> {{ auth()->user()->birthdate }}</p>
                            <p><strong>Address:</strong> {{ auth()->user()->address }}</p>
                            <p><strong>Phone Number:</strong> {{ auth()->user()->phone_number }}</p>
                            <p><strong>Gender:</strong> {{ auth()->user()->gender }}</p>
                        </div>

                        <div class="p-4 bg-gray-100 rounded-md">
                            <h4 class="text-xl font-semibold mb-2">Account Information</h4>
                            <p><strong>Account Created:</strong> {{ auth()->user()->created_at->diffForHumans() }}</p>
                            <p><strong>Email Verified:</strong> {{ auth()->user()->email_verified_at ? 'Yes' : 'No' }}</p>
                        </div>

                        @if(auth()->user()->member)
                            <div class="p-4 bg-gray-100 rounded-md">
                                <h4 class="text-xl font-semibold mb-2">Member Information</h4>
                                <p><strong>Member Since:</strong> {{ auth()->user()->member->created_at->format('F d, Y') }}</p>
                                <!-- Add more member-related information if needed -->
                            </div>
                        @endif

                        @if(auth()->user()->trainer)
                            <div class="p-4 bg-gray-100 rounded-md">
                                <h4 class="text-xl font-semibold mb-2">Trainer Information</h4>
                                <p><strong>Specialty:</strong> {{ auth()->user()->trainer->specialty }}</p>
                                <!-- Add more trainer-related information if needed -->
                            </div>
                        @endif
                        <div class="p-4 bg-gray-100 rounded-md">
    <h4 class="text-xl font-semibold mb-2">BMI Calculator</h4>

    <form action="{{ route('bmi.calculate') }}" method="post" class="space-y-4">
        @csrf
        <div>
            <label for="height" class="block text-sm font-medium text-gray-700">Height (cm):</label>
            <input type="numeric" name="height" id="height" class="mt-1 p-2 border rounded-md w-full" required>
        </div>

        <div>
            <label for="weight" class="block text-sm font-medium text-gray-700">Weight (kg):</label>
            <input type="numeric" name="weight" id="weight" class="mt-1 p-2 border rounded-md w-full" required>
        </div>

        <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded-md hover:bg-blue-600 transition duration-300">Calculate BMI</button>
    </form>

    <!-- Display BMI result if calculated -->
    @if(session('bmi'))
        <div class="mt-4">
            <p class="text-lg"><strong>BMI:</strong> {{ session('bmi') }}</p>
            <p class="text-lg"><strong>Category:</strong> {{ session('bmi_category') }}</p>
        </div>
    @endif
    <!-- Add more sections as needed -->
</div>

                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>

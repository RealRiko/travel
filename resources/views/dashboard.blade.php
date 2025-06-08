
<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-lg sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    {{ __("You're logged in!") }}
                </div>
            </div>
        </div>
    </div>

    <!-- Add Custom Styles Here -->
    @push('styles')
        <style>
            /* Custom styles for the Dashboard */
            .bg-white {
                background-color: #f9f9f9 !important; /* Light background */
            }

            .text-gray-900 {
                color: #333; /* Darker text for contrast */
            }

            .py-12 {
                padding-top: 40px;
                padding-bottom: 40px;
            }

            .max-w-7xl {
                max-width: 100%; /* Full-width for responsiveness */
                padding-left: 15px;
                padding-right: 15px;
            }

            .p-6 {
                padding: 20px;
                background: linear-gradient(135deg, #3b8d99, #6fbcbb); /* Soft gradient background */
                border-radius: 8px;
                box-shadow: 0 8px 20px rgba(0, 0, 0, 0.1);
            }

            h2 {
                font-size: 2rem;
                color: #2b3a3a;
            }

            /* Optional: Add a hover effect to the main container */
            .bg-white:hover {
                background-color: #e5e5e5;
                transition: background-color 0.3s ease-in-out;
            }
        </style>
    @endpush
</x-app-layout>

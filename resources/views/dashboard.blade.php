<x-app-layout>
    <x-slot name="header1">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard pure') }}
        </h2>
    </x-slot>

    <h1>This is from dashboard.blade.php</h1>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    
                    You're logged in! OK
                </div>
            </div>
        </div>
    </div>
</x-app-layout>

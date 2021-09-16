<x-app-layout>
    <x-slot name="header1">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Instrument detail') }}<br>
            {{ $instrumentDetail -> name }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    
                    <form method='post' action="/instruments/{{ $instrumentDetail->id }}" enctype='multipart/form-data'>
                        @csrf
                        @method('PUT')

                        <h3>Change instrument image</h3>
                        <input type='file' name='imagefile' >
                        <input type='submit' value='Upload' name='upload'> 
                    </form>
                </div>    
            </div>
        </div>
    </div>
</x-app-layout>
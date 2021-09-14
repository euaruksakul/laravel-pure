<x-app-layout>
    <x-slot name="header1">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Instrument list') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <table class='table'>
                        @php
                            $imageMainPath='img/small/'
                        @endphp
                        @foreach($instruments as $instrument)
                            <tr>
                                <td><img src="{{ asset($imageMainPath.$instrument -> image_path) }}" width='60px' height='60px'></td>
                                <td>{{ $instrument -> name }}</td>
                                <td><a href='/instruments/{{ $instrument -> id }}'>view</a></td>
                            </tr>
                        @endforeach
                    </table>
                    <!--<a href="">add a new instrument</a>-->
                </div>
                
            </div>
        </div>
    </div>
</x-app-layout>
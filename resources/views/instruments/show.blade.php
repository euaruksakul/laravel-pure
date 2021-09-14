<x-app-layout>
    <x-slot name="header1">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Project details') }}<br>
            {{ $instrumentDetail -> name }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                <table>
                        <tr>
                            <th>Instrument ID: </td>
                            <td>{{ $instrumentDetail -> id }}</td>
                        </tr>
                        <tr>
                            <th>Instrument name: </td>
                            <td>{{ $instrumentDetail -> name }}</td>
                        </tr>
                        <tr>
                            <th>Thai name: </td>
                            <td>{{ $instrumentDetail-> thainame }}</td>
                        </tr>
                        <tr>
                            <th>Instrument manager: </th>
                            <td>{{ $instrumentDetail -> manager_firstname }} {{ $instrumentDetail -> manager_lastname }}</td>
                        </tr>
                        <tr>
                            <th>Contact: </th>
                            <td>{{ $instrumentDetail -> manager_email }}</td>
                        </tr>
                        <tr>
                            <th>Description: </td>
                            <td>{{ $instrumentDetail -> description }}</td>
                        </tr>
                    </table>
                    @php
                        $imageMainPath='img/'
                    @endphp
                    <img src="{{ asset($imageMainPath.$instrumentDetail -> image_path) }}" width='600px' height='600px'>
                </div>
                <a href="{{ route('instruments.index') }}">Return to instrument list</a>
                
            </div>
        </div>
    </div>
</x-app-layout>
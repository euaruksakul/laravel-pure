<x-app-layout>
    <x-slot name="header1">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Project list') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <table>
                        <tr>
                            <th>Project ID</th>
                            <th>Project name</th>
                            <th>Action</th>
                        </tr>
                        @foreach($projectList as $project)
                            <tr>
                                <td>{{ $project -> id }}</td>
                                <td>{{ $project -> name }}</td>
                                <td><a href='/projects/{{ $project -> id }}'>view</a></td>
                            </tr>
                        @endforeach
                    </table>
                    
                </div>
                
            </div>
        </div>
    </div>
</x-app-layout>
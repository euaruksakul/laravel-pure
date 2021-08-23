<x-app-layout>
    <x-slot name="header1">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Project details') }}
            {{ $projectDetail -> name }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                <table>
                        <tr>
                            <td>Project ID: </td>
                            <td>{{ $projectDetail -> id }}</td>
                        </tr>
                        <tr>
                            <td>Project name: </td>
                            <td>{{ $projectDetail -> name }}</td>
                        </tr>
                        <tr>
                            <td>Type: </td>
                            <td>{{ $projectDetail -> type }}</td>
                        </tr>
                        <tr>
                            <td>Description: </td>
                            <td>{{ $projectDetail -> description }}</td>
                        </tr>
                        <tr>
                            <td>Project start date: </td>
                            <td>{{ $projectDetail -> start_date }}</td>
                        </tr>
                        <tr>
                            <td>Project end date: </td>
                            <td>{{ $projectDetail -> end_date }}</td>
                        </tr>
                        
                        
                    </table>
                    
                </div>
                <a href="{{ route('projects.edit',$projectDetail -> id) }}">Edit project detail</a>
            </div>
        </div>
    </div>
</x-app-layout>
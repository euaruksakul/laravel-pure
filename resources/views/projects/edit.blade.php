<x-app-layout>
    <x-slot name="header1">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            
            {{ __('Edit project detail') }}
            {{ $projectDetail->name }}
        </h2>
        
    </x-slot>
    <form method="POST" action="/projects/{{ $projectDetail->id }}">
        @csrf
        @method('PUT')

        <div>
            <x-label for="name" :value="__('Project name')" />
            <x-input id="name"  name="name" value="{{ $projectDetail -> name }}" class="block mt-1 w-full" type="text" required autofocus />
        </div>
        <div>
            <x-label for="type" :value="__('Project type')" />
            <select class="form-control" id="type" name="type">
                <option value="Internal project">Internal project</option>
                <option value="Flagship project">Flagship project</option>
                <option value="Business dev. project">Business dev. project</option>
                <option value="Student project">Student project</option>
                <option value="Feasibility project">Feasibility project</option>
            </select>

            <script>
                document.getElementById("type").value ="{{ $projectDetail -> type }}";
            </script>

        </div>
        <div>
            <x-label for="description" :value="__('Description')" />
            <x-input id="description" name="description" value="{{ $projectDetail -> description }}" class="block mt-1 w-full" type="longtext" />
        </div>
        <div>
            <x-label for="start_date" :value="__('Start date')" />
            <x-input id="start_date" name="start_date" value="{{ $projectDetail -> start_date }}" class="block mt-1 w-full" type="date" />
        </div>
        <div>
            <x-label for="end_date" :value="__('End date')" />
            <x-input id="end_date" name="end_date" value="{{ $projectDetail -> end_date }}" class="block mt-1 w-full" type="date" />
        </div>

        <div class="flex items-center justify-end mt-4">
            <x-button class="ml-4">
                {{ __('Update project detail') }}
            </x-button>
        </div>
    </form>
    
    
   
</x-app-layout>

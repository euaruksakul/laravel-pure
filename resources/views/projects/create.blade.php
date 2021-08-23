<x-app-layout>
    <x-slot name="header1">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            
            {{ __('Create a new project') }}
        </h2>
        
    </x-slot>
    <form method="POST" action="/projects">
        @csrf
        
        <div>
            <x-label for="name" :value="__('Project name')" />
            <x-input id="name"  name="name" class="block mt-1 w-full" type="text" required autofocus />
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
        </div>
        <div>
            <x-label for="description" :value="__('Description')" />
            <x-input id="description" name="description" class="block mt-1 w-full" type="longtext" />
        </div>
        <div>
            <x-label for="start_date" :value="__('Start date')" />
            <x-input id="start_date" name="start_date" class="block mt-1 w-full" type="date" />
        </div>
        <div>
            <x-label for="end_date" :value="__('End date')" />
            <x-input id="end_date" name="end_date" class="block mt-1 w-full" type="date" />
        </div>

        <div class="flex items-center justify-end mt-4">
            <x-button class="ml-4">
                {{ __('Create project') }}
            </x-button>
        </div>
    </form>
    
    
   
</x-app-layout>

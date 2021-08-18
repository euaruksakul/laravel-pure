<x-app-layout>
    <x-slot name="header1">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Edit profile') }}
        </h2>
    </x-slot>
   
    
    <form method="POST">
        @csrf
        
        <!-- First Name -->
        <div>
            <x-label for="firstname" :value="__('First name')" />

            <x-input id="firstname" class="block mt-1 w-full" type="text" name="name" required autofocus />
        </div>
        <!-- Last Name -->
        <div>
            <x-label for="lastname" :value="__('Last name')" />

            <x-input id="lastname" class="block mt-1 w-full" type="text" name="name" required />
        </div>
        <!-- Thai first name -->
        <div>
            <x-label for="thai_firstname" :value="__('Thai first name')" />

            <x-input id="thai_firstname" class="block mt-1 w-full" type="text" name="name" required />
        </div>
        <!-- Thai last name -->
        <div>
            <x-label for="thai_lastname" :value="__('Thai last name')" />

            <x-input id="thai_lastname" class="block mt-1 w-full" type="text" name="name" required />
        </div>
        <!-- Nick name -->
        <div>
            <x-label for="nickname" :value="__('Nick name')" />

            <x-input id="nickname" class="block mt-1 w-full" type="text" name="name" required />
        </div>
        <!-- Phone number -->
        <div>
            <x-label for="phone_number" :value="__('Phone number')" />

            <x-input id="phone_number" class="block mt-1 w-full" type="text" name="name" required />
        </div>
        <!-- Affiliation -->
        <div>
            <x-label for="affiliation" :value="__('Affiliation')" />

            <x-input id="lastnaffiliationame" class="block mt-1 w-full" type="text" name="name" required />
        </div>
        <!-- Address -->
        <div>
            <x-label for="address" :value="__('Address')" />

            <x-input id="address" class="block mt-1 w-full" type="text" name="name" required />
        </div>
        <!-- Date of birth -->
        <div>
            <x-label for="date_of_birth" :value="__('Date of birth')" />

            <x-input id="date_of_birth" class="block mt-1 w-full" type="text" name="name" required />
        </div>
        <!-- Blood type -->
        <div>
            <x-label for="blood_type" :value="__('Blood type')" />

            <x-input id="blood_type" class="block mt-1 w-full" type="text" name="name" required />
        </div>
        <!-- Status -->
        <div>
            <x-label for="status" :value="__('Status')" />

            <x-input id="status" class="block mt-1 w-full" type="text" name="name" required />
        </div>

        <div class="flex items-center justify-end mt-4">
            <x-button class="ml-4">
                {{ __('Save profile') }}
            </x-button>
        </div>
    </form>
   
</x-app-layout>

<x-app-layout>
    <x-slot name="header1">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            <p>Welcome {{ $detail -> firstname }}</p>
            {{ __('Edit profile') }}
        </h2>
        
    </x-slot>
    <form method="POST" action="/user-details">
        @csrf
        
        <!-- First Name -->
        <div>
            <x-label for="firstname" :value="__('First name')" />

            <x-input id="firstname"  name="firstname" value="{{ $detail -> firstname }}" class="block mt-1 w-full" type="text" required autofocus />
        </div>
        <!-- Last Name -->
        <div>
            <x-label for="lastname" :value="__('Last name')" />

            <x-input id="lastname" name="lastname" value="{{ $detail -> lastname }}" class="block mt-1 w-full" type="text" required />
        </div>
        <!-- Thai first name -->
        <div>
            <x-label for="thai_firstname" :value="__('Thai first name')" />

            <x-input id="thai_firstname" name="thai_firstname" value="{{ $detail -> thai_firstname }}" class="block mt-1 w-full" type="text" />
        </div>
        <!-- Thai last name -->
        <div>
            <x-label for="thai_lastname" :value="__('Thai last name')" />

            <x-input id="thai_lastname" name="thai_lastname" value="{{ $detail -> thai_lastname }}" class="block mt-1 w-full" type="text" />
        </div>
        <!-- Nick name -->
        <div>
            <x-label for="nickname" :value="__('Nick name')" />

            <x-input id="nickname" name="nickname" value="{{ $detail -> nickname }}" class="block mt-1 w-full" type="text" />
        </div>
        <!-- Phone number -->
        <div>
            <x-label for="phone_number" :value="__('Phone number')" />

            <x-input id="phone_number" name="phone_number" value="{{ $detail -> phone_number}}" class="block mt-1 w-full" type="text" />
        </div>
        <!-- Affiliation -->
        <div>
            <x-label for="affiliation" :value="__('Affiliation')" />

            <x-input id="affiliation" name="affiliation" value="{{ $detail -> affiliation }}" class="block mt-1 w-full" type="text"  />
        </div>
        <!-- Address -->
        <div>
            <x-label for="address" :value="__('Address')" />

            <x-input id="address" name="address" value="{{ $detail -> address }}" class="block mt-1 w-full" type="text" />
        </div>
        <!-- Date of birth -->
        <div>
            <x-label for="date_of_birth" :value="__('Date of birth')" />

            <x-input id="date_of_birth" name="date_of_birth" value="{{ $detail -> date_of_birth }}" class="block mt-1 w-full" type="date" />
        </div>
        <!-- Blood type -->
        <div>
            <x-label for="blood_type" :value="__('Blood type')" />

            <x-input id="blood_type" name="blood_type" value="{{ $detail -> blood_type }}" class="block mt-1 w-full" type="text" />
        </div>
        <!-- Status -->
        <div>
            <x-label for="status" :value="__('Status')" />

            <select class="form-control" id="status" name="status">
                <option value="Permanent staff (พนักงาน)">Permanent staff (พนักงาน)</option>
                <option value="Contracted staff (จ้างเหมาปฏิบัติการ)">Contracted staff (จ้างเหมาปฏิบัติการ)</option>
                <option value="Temporary worker  (ลูกจ้างโครงการ)">Temporary worker  (ลูกจ้างโครงการ)</option>
                <option value="Part-time student (นักศึกษาทุนผู้ช่วยวิจัย)">Part-time student (นักศึกษาทุนผู้ช่วยวิจัย)</option>
            </select>

            <!-- change selection to the recorded value with javascript -->
            <script>
                document.getElementById("status").value ="{{ $detail -> status }}";
            </script>
        </div>


        <div class="flex items-center justify-end mt-4">
            <x-button class="ml-4">
                {{ __('Save profile') }}
            </x-button>
        </div>
    </form>
    
    
   
</x-app-layout>

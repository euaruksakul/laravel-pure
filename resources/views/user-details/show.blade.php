<x-app-layout>
    <x-slot name="header1">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            <p>Welcome {{ $detail -> firstname }}</p>
            {{ __('User details') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    
                    You're logged in! OK
                    <table>
                        <tr>
                            <td>First name: </td>
                            <td>{{ $detail -> firstname }}</td>
                        </tr>
                        <tr>
                            <td>Last name: </td>
                            <td>{{ $detail -> lastname }}</td>
                        </tr>
                        <tr>
                            <td>Thai first name: </td>
                            <td>{{ $detail -> thai_firstname }}</td>
                        </tr>
                        <tr>
                            <td>Thai last name: </td>
                            <td>{{ $detail -> thai_lastname }}</td>
                        </tr>
                        <tr>
                            <td>Nick name: </td>
                            <td>{{ $detail -> nickname }}</td>
                        </tr>
                        <tr>
                            <td>Phone number: </td>
                            <td>{{ $detail -> phone_number }}</td>
                        </tr>
                        <tr>
                            <td>Affiliation: </td>
                            <td>{{ $detail -> affiliation }}</td>
                        </tr>
                        <tr>
                            <td>Address: </td>
                            <td>{{ $detail -> address }}</td>
                        </tr>
                        <tr>
                            <td>Date of Birth: </td>
                            <td>{{ $detail -> date_of_birth }}</td>
                        </tr>
                        <tr>
                            <td>Blood type: </td>
                            <td>{{ $detail -> blood_type }}</td>
                        </tr>
                        <tr>
                            <td>Status: </td>
                            <td>{{ $detail -> status }}</td>
                        </tr>
                        
                    </table>
                    
                </div>
                <a href="{{ route('user_details.edit',[Auth::user()->id]) }}">Edit profile</a>
            </div>
        </div>
    </div>
</x-app-layout>
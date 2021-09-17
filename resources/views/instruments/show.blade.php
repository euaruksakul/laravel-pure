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
                    @php
                        $imageMainPath='img/'
                    @endphp
                    <img src="{{ asset($imageMainPath.$instrumentDetail -> image_path) }}" width='500px' height='500px'>
                    
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
                    
                    <div class="container col-sm-6 col-md-6 col-lg-6 mt-10 float-left">
                        <h3>Instrument calendar</h3>
                        <x-button class='button' onclick='DisplayPreviousMonth()'>Previous</x-button> 
                        <x-button style='background-color:#5588EE' class='button' onclick='DisplayCurrentMonth()'>Current</x-button>
                        <x-button class='button' onclick='DisplayNextMonth()'>Next</x-button>
                        <div class="card">
                            <h3 id='calendar_title' ></h3>
                            <table name='calendar'>
                                <tr>
                                    <th>Sun</th>
                                    <th>Mon</th>
                                    <th>Tue</th>
                                    <th>Wed</th>
                                    <th>Thu</th>
                                    <th>Fri</th>
                                    <th>Sat</th>
                                </tr>
                                <tr>
                                    <td id='1_0'></td>
                                    <td id='1_1'></td>
                                    <td id='1_2'></td>
                                    <td id='1_3'></td>
                                    <td id='1_4'></td>
                                    <td id='1_5'></td>
                                    <td id='1_6'></td>
                                </tr>
                                <tr>
                                    <td id='2_0'></td>
                                    <td id='2_1'></td>
                                    <td id='2_2'></td>
                                    <td id='2_3'></td>
                                    <td id='2_4'></td>
                                    <td id='2_5'></td>
                                    <td id='2_6'></td>
                                </tr>
                                <tr>
                                    <td id='3_0'></td>
                                    <td id='3_1'></td>
                                    <td id='3_2'></td>
                                    <td id='3_3'></td>
                                    <td id='3_4'></td>
                                    <td id='3_5'></td>
                                    <td id='3_6'></td>
                                </tr>
                                <tr>
                                    <td id='4_0'></td>
                                    <td id='4_1'></td>
                                    <td id='4_2'></td>
                                    <td id='4_3'></td>
                                    <td id='4_4'></td>
                                    <td id='4_5'></td>
                                    <td id='4_6'></td>
                                </tr>
                                <tr>
                                    <td id='5_0'></td>
                                    <td id='5_1'></td>
                                    <td id='5_2'></td>
                                    <td id='5_3'></td>
                                    <td id='5_4'></td>
                                    <td id='5_5'></td>
                                    <td id='5_6'></td>
                                </tr>
                                <tr>
                                    <td id='6_0'></td>
                                    <td id='6_1'></td>
                                    <td id='6_2'></td>
                                    <td id='6_3'></td>
                                    <td id='6_4'></td>
                                    <td id='6_5'></td>
                                    <td id='6_6'></td>
                                </tr>
                            </table>
                        </div>
                    </div>
                    <br>
                    <a href="{{ route('instruments.edit',$instrumentDetail -> id) }}">Edit instrument detail</a>
                    <br>
                    <a href="{{ route('instruments.index') }}">Return to instrument list</a>
                </div>
                
            </div>
        </div>
    </div>
    <script type="text/javascript" src="{{ URL::asset('js/calendar.js') }}"></script>
    <script>DisplayCurrentMonth();</script>
</x-app-layout>
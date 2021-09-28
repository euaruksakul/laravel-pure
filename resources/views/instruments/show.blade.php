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
                    
                    <!--<div class="container col-sm-6 col-md-6 col-lg-6 mt-10 float-left">-->
                    <div class="container col-sm-6 col-md-6 col-lg-6 mt-10">
                        <h3>Instrument calendar</h3>
                        <x-button class='button' onclick='DisplayPreviousMonth()'>Previous</x-button> 
                        <x-button style='background-color:#5588EE' class='button' onclick='DisplayCurrentMonth()'>Current</x-button>
                        <x-button class='button' onclick='DisplayNextMonth()'>Next</x-button>
                        <div class="card">
                            <h3 id='calendar_title' ></h3>
                            <table name='calendar' style="text-align:left;">
                                <tr style="border: 1px solid #cccccc;">
                                    <th style="width:14%;">Sun</th>
                                    <th style="width:14%;">Mon</th>
                                    <th style="width:14%;">Tue</th>
                                    <th style="width:14%;">Wed</th>
                                    <th style="width:14%;">Thu</th>
                                    <th style="width:14%;">Fri</th>
                                    <th style="width:14%;">Sat</th>
                                </tr>
                                <tr style="border: 1px solid #cccccc;">
                                    <td id='1_0'></td>
                                    <td id='1_1'></td>
                                    <td id='1_2'></td>
                                    <td id='1_3'></td>
                                    <td id='1_4'></td>
                                    <td id='1_5'></td>
                                    <td id='1_6'></td>
                                </tr>
                                <tr style="border: 1px solid #cccccc;">
                                    <td id='2_0'></td>
                                    <td id='2_1'></td>
                                    <td id='2_2'></td>
                                    <td id='2_3'></td>
                                    <td id='2_4'></td>
                                    <td id='2_5'></td>
                                    <td id='2_6'></td>
                                </tr>
                                <tr style="border: 1px solid #cccccc;">
                                    <td id='3_0'></td>
                                    <td id='3_1'></td>
                                    <td id='3_2'></td>
                                    <td id='3_3'></td>
                                    <td id='3_4'></td>
                                    <td id='3_5'></td>
                                    <td id='3_6'></td>
                                </tr>
                                <tr style="border: 1px solid #cccccc;">
                                    <td id='4_0'></td>
                                    <td id='4_1'></td>
                                    <td id='4_2'></td>
                                    <td id='4_3'></td>
                                    <td id='4_4'></td>
                                    <td id='4_5'></td>
                                    <td id='4_6'></td>
                                </tr>
                                <tr style="border: 1px solid #cccccc;">
                                    <td id='5_0'></td>
                                    <td id='5_1'></td>
                                    <td id='5_2'></td>
                                    <td id='5_3'></td>
                                    <td id='5_4'></td>
                                    <td id='5_5'></td>
                                    <td id='5_6'></td>
                                </tr>
                                <tr style="border: 1px solid #cccccc;">
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
                <h3>Book instrument</h3>
                <p>Booking..</p>
                <form method="POST" action="/instrument-bookings">
                    @csrf

                    <!-- hidden input to add instrument_id data to POST request -->
                    <input type="hidden" name="instrument_id" value="{{ $instrumentDetail -> id }}" />

                    <div>
                        <x-label for="booking_date" :value="__('Booking date')" />
                        <x-input id="booking_date"  name="booking_date" class="block mt-1 w-full" type="date" required autofocus />
                    </div>
                    <div>
                        <x-label for="booking_time_period" :value="__('Booking time')" />
                        <select class="form-control" id="booking_time_period" name="booking_time_period">
                            <option value="morning">morning</option>
                            <option value="afternoon">afternoon</option>
                            <option value="evening">evening</option>
                            <option value="morning-afternoon">morning-afternoon</option>
                            <option value="afternoon-evening">afternoon-evening</option>
                            <option value="morning-afternoon-evening">morning-afternoon-evening</option>
                        </select>
                    </div>
                    <div>
                        <x-label for="booking_type" :value="__('Booking type')" />
                        <select class="form-control" id="booking_type" name="booking_type">
                            <option value="usage">usage</option>
                            <option value="maintenance">maintenance</option>
                            <option value="commissioning">commissioning</option>
                            <option value="feasibility">feasibility study</option>
                        </select>
                    </div>
                    <div>
                        <x-label for="booking_message" :value="__('Message to manager')" />
                        <x-input id="booking_message" name="booking_message" class="block mt-1 w-full" type="longtext" />
                    </div>

                    <div>
                        <x-label for="Project" :value="__('Booking for project:')" />
                        <select class="form-control" id="project_id" name="project_id">
                        @foreach ($userProjects as $userProject)
                            <option value='{{ $userProject->project_id }}'>{{ $userProject->project_name }}</option>
                        @endforeach
                        </select>  
                    </div> 


                    <div class="flex items-center justify-end mt-4">
                        <x-button class="ml-4">
                            {{ __('Book instrument') }}
                        </x-button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <script type="text/javascript" src="{{ URL::asset('js/calendar.js') }}"></script>
    <script>
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        function LabelCalendar(selectedMonth,selectedYear){
            $.ajax({
                type: "post",
                data: {
                    instrument_id : {{ $instrumentDetail -> id }}, 
                    month : selectedMonth,
                    year : selectedYear
                },
                url: "{{ route('instrument_bookings.label') }}",
                dataType: 'JSON',
                success: function(equipmentBookings){
                    let userId = {{ $userId }};
                    equipmentBookings.forEach((booking,i)=> {
                        let bookerId = booking.user_id;
                        let bookingType = booking.booking_type;
                        let bookingDateArray = booking.booking_date.split('-');
                        let bookingDate = bookingDateArray[2];
                        let bookingMonth = bookingDateArray[1];
                        let bookingYear = bookingDateArray[0];
                        let bookingTimePeriodArray = booking.booking_time_period.split('-');
                        bookingTimePeriodArray.forEach((period)=>{
                            let markerName = bookingDate+'_'+period;
                            if (bookingType === 'usage'){
                                if (userId === bookerId){
                                    document.getElementById(markerName).style.color = "#00AA00";
                                } else {
                                    document.getElementById(markerName).style.color = "#588BEB";
                                }
                            } else if (bookingType === 'maintenance'){
                                document.getElementById(markerName).style.color = "red";
                            }                       
                        })
                    })
                }
            })
        }
    </script>
    <script>DisplayCurrentMonth();</script> <!-- this has to be put here after the .ajax script -->
</x-app-layout>






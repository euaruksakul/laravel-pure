<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Instrument;
use App\Models\InstrumentBooking;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB; //For query builder 

class InstrumentBookingController extends Controller
{
    public function ajaxLabelCalendar (Request $request){
        $month = $request -> month; //From JS: month - 0 = Jan, 1 = Feb, ...
        $year = $request -> year; //year xxxx
        $instrument_id = $request -> instrument_id;
        
        $bookings = DB::table('instrument_bookings')
            ->where('instrument_id', $instrument_id)
            ->whereMonth('booking_date','=', $month+1) //in SQL/Laravel: 1 = Jan, 2 = Feb, ..
            ->whereYear('booking_date','=', $year)
            ->get();
        
        /*
        $bookings=InstrumentBooking::
                where('instrument_id', $instrument_id)
                //->whereMonth('booking_date','8')
                //->whereMonth('booking_date',Carbon::today()->month)
                //->whereMonth('booking_date', $month)
                //->whereYear('booking_date', $year)
                ->get();
        */
        if (!$bookings -> isEmpty()){
            foreach ($bookings as $booking){
                $bookingDate = $booking->booking_date;
                $bookingTimePeriod = $booking->booking_time_period;
                $bookingType = $booking->booking_type;
                $userID = $booking->user_id;
                
                $return_arr[] = array("booking_date" => $bookingDate,
                        "booking_time_period" => $bookingTimePeriod,
                        "booking_type" => $bookingType,
                        "user_id" => $userID
                    );
                }
                $return_JSON = json_encode($return_arr);
        }  else {
            $return_JSON = "";
        }
        
            
        return ($return_JSON);
    }
    //
}

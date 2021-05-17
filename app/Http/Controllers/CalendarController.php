<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Collection;
use Illuminate\Http\Request;
use App\Booking;
use App\Suburb;
use App\Config;
use Carbon\Carbon;
class CalendarController extends Controller
{
    //
    function getAvailableSlots(Request $request){

    	$date = $request->date;

        $gaps = collect([]);
        $avlSlots = collect([]);

        $user = Auth::user();
        $instructor_id = $user->instructor_id;
        $user_suburb = $user->suburb_code;

        $bookings = new Booking;
        $records = Booking::select ('lesson_time','suburb_code')
                ->where('bookings.lesson_date',$date)
                ->where('bookings.instructor_id',$instructor_id)
                ->orderBy('lesson_time')
                ->get();


        $start_time = Config::where('param_name','start_time')->first()->param_value;
        $start_time = Carbon::parse($start_time);

        $finish_time = Config::where('param_name','finish_time')->first()->param_value;
        $finish_time = Carbon::parse($finish_time);

        $start_suburb = Config::where('param_name','start_suburb')->first()->param_value;
        $finish_suburb = Config::where('param_name','finish_suburb')->first()->param_value;
        
        /*
        $collection = $records->push(['lesson_time'=>$start_time,'suburb_code'=>$start_suburb]);
        $collection->push(['lesson_time'=>$finish_time,'suburb_code'=>$finish_suburb]);

        $sorted = $collection->sortBy('lesson_time');
*/
        foreach ($records as $record){
            $booked_time = Carbon::parse($record->lesson_time);
            $booked_suburb = $record->suburb_code;

            $gap = $start_time->diffInMinutes($booked_time);

            if($gap>=60+60+15){
                if ($start_suburb == $booked_suburb && $start_suburb == $user_suburb){
                    $go_time = 15;
                    $come_time = 15;
            }elseif ($start_suburb == $booked_suburb && $start_suburb != $user_suburb){
                    $go_time = 30;
                    $come_time = 15;
            }elseif ($start_suburb != $booked_suburb && $start_suburb == $user_suburb){
                    $go_time = 15;
                    $come_time = 30;
            }elseif ($start_suburb != $booked_suburb && $booked_suburb == $user_suburb){
                    $go_time = 30;
                    $come_time = 15;
            }
            $available_time = $gap-60-($go_time+$come_time);
            if($available_time>=60){
                $next_slot = ($start_time->addMinutes(60+$go_time));
                $avlSlots->push(date('g:i A', strtotime(clone $next_slot)));
            $d = $available_time/(60+15);
            for ($i=2; $i<$d; $i++){
                $next_slot = $next_slot->addMinutes(60+15);
                $avlSlots->push(date('g:i A', strtotime(clone $next_slot)));

            }
        }
        }

            $start_time = $booked_time;
            $start_suburb = $booked_suburb;
            $gaps->push($gap);
        }

            $gap = $finish_time->diffInMinutes($start_time);

            if($gap>=60+60+15){
                if ($start_suburb == $finish_suburb && $start_suburb == $user_suburb){
                    $go_time = 15;
                    $come_time = 15;
            }elseif ($start_suburb == $finish_suburb && $start_suburb != $user_suburb){
                    $go_time = 30;
                    $come_time = 15;
            }elseif ($start_suburb != $finish_suburb && $start_suburb == $user_suburb){
                    $go_time = 15;
                    $come_time = 30;
            }elseif ($start_suburb != $finish_suburb && $finish_suburb == $user_suburb){
                    $go_time = 30;
                    $come_time = 15;
            }else{
                    $go_time = 30;
                    $come_time = 15;
            }
            $available_time = $gap-60-($go_time+$come_time);

            if($available_time>=60){
                $next_slot = ($start_time->addMinutes(60+$go_time));
                $avlSlots->push(date('g:i A', strtotime(clone $next_slot)));
            $d = $available_time/(60+15);
            for ($i=2; $i<$d; $i++){
                $next_slot = $next_slot->addMinutes(60+15);
                $avlSlots->push(date('g:i A', strtotime(clone $next_slot)));

            }
        }
        }

        $gaps->push($gap);
        return($avlSlots->values());

    }

    function insertNew(Request $request){
        $time = \Carbon\Carbon::parse($request->time)->format('H:i:s');
        $date = \Carbon\Carbon::parse($request->date)->format('Y-m-d');
        $suburb_code = Auth::user()->suburb_code;
        $instructor_id = Auth::user()->instructor_id;
        $bookings = new Booking;
        $bookings->suburb_code = $suburb_code;
        $bookings->customer_id = Auth::user()->id;
        $bookings->lesson_date = $date;
        $bookings->lesson_time = $time;
        $bookings->instructor_id = $instructor_id;
        $bookings->calendar_sync = 0;
        $bookings->booking_status = 'ENTRY';
        $bookings->save();

        return($request);
    }

    function clearAll(){
        $status = Booking::where('customer_id',Auth::user()->id)
                    ->where('booking_status','APPROVED')->count();
        if ($status == 0){
            Booking::where('customer_id',Auth::user()->id)->delete();
            return('Cleared All');
        }else if ($status > 0){
            return('Cannot Delete. Lessons already approved. Contact Admin');
        }else{
            return('Some Error occured. Please contact Admin');
        }
    }
}



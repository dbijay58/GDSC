<?php

namespace App\Http\Controllers\Admins;
use App\User;
use App\Booking;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AdminController extends Controller
{
	public function index(){
		return view('admin_page');
	}

	function userList(){
		$users = User::get()->reverse();
		return view('view_users_admin',compact('users'));

	}
	function bookingsList(Request $request){
					$bookings=Booking::get();

		//dd($request);
		if (!$request){
			$bookings=Booking::get();
		}else{

		if ($request->user_id){
			$user_id=array($request->user_id,$request->user_id+1);
		}else{
			$user_id=array(0,999999999999999);
		}

		if ($request->start_dt){
			$start_dt=$request->start_dt;
		}else{
			$start_dt='0000-00-00';
		}

		if ($request->end_dt){
			$end_dt=$request->end_dt;
		}else{
			$end_dt='9999-12-30';
		}

		$bookings=Booking::whereBetween('customer_id',$user_id)->whereBetween('lesson_date',array($start_dt,$end_dt))->get();
			}
		return view('view_bookings_admin',compact('bookings'));
	}

	}
    //


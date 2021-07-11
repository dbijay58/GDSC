<?php

namespace App\Http\Controllers\Admins;
use App\User;
use App\Booking;
use App\Instructor;	
use App\Suburb;
use App\Account;

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
	function bookingsList(Request $request,$id=null){
					$bookings=Booking::get();

		//dd($request);
		if (!$id){
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
			return view('view_all_bookings_admin',compact('bookings'));
		}else{
			$user=User::find($id);
			return view('view_user_bookings_admin',compact('user'));
			}
	}

	function userEdit(Request $request, $id){
		$user_details=User::find($id);
		if ($request){
			$input=$request->all();
			$user_details->fill($input)->update();
			$user_details=User::find($id);
			return view('edit_user',compact('user_details'));

		}
		//dd($user_details);
		return view('edit_user',compact('user_details'));
	}

	function instructorList(Request $request, $id=null){
		if(!$id){
			if (count($request->all())){
				$instructor = new Instructor;
				$input = $request->all();
				$instructor->fill($input)->save();
			}
			$instructors=Instructor::get();
		}else{
			$instructors=Instructor::find($id);
		}
		return view('view_instructors_admin',compact('instructors'));
	}

	function suburbList(Request $request, $id=null){
		$instructors = Instructor::get();
		if(!$id){
			if (count($request->all())){
				$suburb = new Suburb;
				$input = $request->all();
				$suburb->fill($input)->save();
			}
			$suburbs=Suburb::get();
		}else{
			$suburbs=Suburb::find($id);
		}
		return view('view_suburbs_admin',compact('suburbs','instructors'));
	}

	function accountList(Request $request, $id=null){
		$users = User::get();
		if(!$id){
			if (count($request->all())){
				$account = new Account;
				$input = $request->all();
				$account->fill($input)->save();
			}
			$accounts=Account::get();
		}else{
			$accounts=Account::find($id);
		}
		return view('view_accounts_admin',compact('accounts','users'));
	}

	}
    //


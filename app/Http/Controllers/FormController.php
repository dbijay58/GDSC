<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Account;
use App\Booking;
use Auth;

class FormController extends Controller
{
    //
    public function addDetails(Request $request){
    	//dd($request);
    	$user = User::find(Auth::user()->id);
    	$user->phone = $request->phone;
    	$user->st_address = $request->st_address;
    	$user->suburb = $request->suburb;
    	$user->state = $request->l_licence_state;
    	$user->post_code = $request->post_code;
    	$user->driving_level_initial = $request->driving_exp;
    	$user->driving_level_now = $request->driving_exp;
    	$user->lesson_package = $request->lesson_package;
    	$user->l_licence_date = $request->l_licence_date;
    	$user->dob = $request->dob;
    	$user->intl_licence = $request->intl_licence;
        $user->suburb_code = 'N';
    	$user->update();
    	return redirect('/home');
    }

    public function imageUploadPost(Request $request)
    {
        $request->validate([
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);
    
        $imageName = now()->format('YmdHis').'.'.$request->image->extension();  
     
        if($request->image->move(public_path('images'), $imageName)){

        $account= new Account;
        $user = Auth::user();
        $user_id = $user->id;
        $class_count = $user->bookings->where('booking_status','ENTRY')->count();
        if ($user->bookings->count()>=10){
            $amount = $class_count*65;
        }else{
            $amount = $class_count*75;
        }

        $account->customer_id = $user_id;
        $account->class_count = $class_count;
        $account->amount = $amount;
        $account->status = 'PAID';
        $account->image = $imageName;
        $account->save();

        Booking::where('customer_id',Auth::user()->id)
                ->where('booking_status','ENTRY')
                ->update(['booking_status'=>'PENDING']);

        return back()
            ->with('success','You have successfully upload image.')
            ->with('image',$imageName); 
        }
    }
}

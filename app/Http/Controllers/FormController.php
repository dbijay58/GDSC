<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
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
}

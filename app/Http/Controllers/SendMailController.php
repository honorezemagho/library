<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Mail;

class SendMailController extends Controller
{
    public function index()
    {
    	$user = User::find(1)->toArray();
    	
    	Mail::send('mail', $user, function($message) use ($user) {
	        $message->to("anafackjordan@gmail.com");
	        $message->subject('Welcome Mail');
    	});

    	dd('Mail Send Successfully');
    }
}
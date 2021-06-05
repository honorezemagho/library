<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Mail;
use App\Mail\MyTestMail;

class SendMailController extends Controller
{
    public function index()
    {
    	$user = User::find(1)->toArray();
        $details = [
            'title' => 'Sample Title From Mail',
            'body' => 'This is sample content we have added for this test mail'
        ];

        Mail::to('anafackjordan@gmail.com')->send(new MyTestMail($details));

    	dd('Mail Send Successfully');
    }
}
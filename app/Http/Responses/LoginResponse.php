<?php

namespace App\Http\Responses;

use Laravel\Fortify\Contracts\LoginResponse as LoginResponseContract;

class LoginResponse implements LoginResponseContract
{
    /**
     * @param  $request
     * @return mixed
     */
    public function toResponse($request)
    {
        //Save data into the session

        session([
            'auth' => true,

        ]);

    	dd(session('auth'));
    	//Redirect after login.

       	$home = '/';

        return redirect()->intended($home);
    }
}
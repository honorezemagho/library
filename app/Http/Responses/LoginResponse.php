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
        $user = auth()->user();
        $auth = $user ? true : false;
        $roles = $user->getRoleNames();
        session([
            'auth' => $auth,
            'roles' => $roles
        ]);

    	//dd(session()->all());
    	//Redirect after login.

       	$home = '/';

        return redirect()->intended($home);
    }
}
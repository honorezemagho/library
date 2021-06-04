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
        $isAdmin = $user->hasRole('Admin');
        $isMember = $user->hasRole('Member');
        $isStudent = $user->hasRole('Student');
        $isLecturer = $user->hasRole('Lecturer');

        session([
            'auth' => $auth,
            'roles' => $roles,
            'isAdmin' => $isAdmin,
            'isMember' => $isMember,
            'isStudent' => $isStudent,
            'isLecturer' => $isLecturer
        ]);

    	//Redirect after login.
       	$home = '/';

        return redirect()->intended($home);
    }
}
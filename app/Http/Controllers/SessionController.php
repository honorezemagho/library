<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SessionController extends Controller
{
   public function index(){

    $roles = session('roles');
    $isAdmin = session('isAdmin');
    $isMember = session('isMember');
    $isStudent = session('isStudent');
    $isLecturer = session('isLecturer');

    $session = [$roles, $isAdmin, $isMember, $isLecturer, $isStudent];

    return $session;
   }
}

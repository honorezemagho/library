<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Bug;
use Illuminate\Support\Facades\Auth;

class AdminController extends Controller
{

    /**
     * Update a resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function resolveBug(Request $request)
    {
        //
        $bug = Bug::findOrFail(request()->id);
        $userId = Auth::user()->id;

         $bug->update(['resolved_by' => $userId]);

        if(!is_null($bug)) {
            return back()->with("success", "Success! Bug created");
        }

        else {
            return back()->with("error", "Alert! Something went wrong");
        }


    }

        /**
     * Udpate a d resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function approve(Request $request)
    {

        if(auth()->user()->role->name != 'Quality-Engineer'){
            abort(403);
        }
        //
        $bug = Bug::findOrFail(request()->id);


         $bug->update(['status' => 1]);

        if(!is_null($bug)) {
            return back()->with("success", "Success! Bug created");
        }

        else {
            return back()->with("error", "Alert! Something went wrong");
        }


    }


    public function dashboard(){
        $books = [];
        return view('dashboard.index', compact('books'));
    }

    public function bugs(){
        return redirect(route('dashboard'));
    }


}

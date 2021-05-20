<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\PageController;

class RolePermissionController extends Controller
{
    protected $pageController;

    public function __construct(PageController $pageController)
    {
        $this->pageController = $pageController;
    }

    public function index_roles(){
        $rolePage  =  $this->pageController->loadPage("roles");
        return view('pages.roles',[ 'layout' => 'side-menu', 
        'side_menu' =>  $rolePage->side_menu,
        'first_page_name' => $rolePage->first_page_name,
        'second_page_name' => $rolePage->second_page_name,
        'third_page_name' => $rolePage->third_page_name
        ]);
    }
}

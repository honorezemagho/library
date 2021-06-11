<?php

namespace App\Http\Controllers;

use Spatie\Permission\Models\Role;
use App\Http\Controllers\Controller;

class PageController extends Controller
{
    /**
     * Show specified view.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function loadPage($pageName = 'dashboard')
    {
        $layout = 'side-menu';
        $activeMenu = $this->activeMenu($layout, $pageName);

        //Role Page
        return view('pages/' . $pageName, [
            'side_menu' => $this->sideMenu(),
            'first_page_name' => $activeMenu['first_page_name'],
            'second_page_name' => $activeMenu['second_page_name'],
            'third_page_name' => $activeMenu['third_page_name'],
            'layout' => 'side-menu'
        ]);
    
    }

    /**
     * Determine active menu & submenu.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function activeMenu($layout, $pageName)
    {
        $firstPageName = '';
        $secondPageName = '';
        $thirdPageName = '';

        if ($layout == 'top-menu') {
            foreach ($this->topMenu() as $menu) {
                if ($menu['page_name'] == $pageName && empty($firstPageName)) {
                    $firstPageName = $menu['page_name'];
                }

                if (isset($menu['sub_menu'])) {
                    foreach ($menu['sub_menu'] as $subMenu) {
                        if ($subMenu['page_name'] == $pageName && empty($secondPageName) && $subMenu['page_name'] != 'dashboard') {
                            $firstPageName = $menu['page_name'];
                            $secondPageName = $subMenu['page_name'];
                        }

                        if (isset($subMenu['sub_menu'])) {
                            foreach ($subMenu['sub_menu'] as $lastSubmenu) {
                                if ($lastSubmenu['page_name'] == $pageName) {
                                    $firstPageName = $menu['page_name'];
                                    $secondPageName = $subMenu['page_name'];
                                    $thirdPageName = $lastSubmenu['page_name'];
                                }       
                            }
                        }
                    }
                }
            }
        } else if ($layout == 'simple-menu') {
            foreach ($this->simpleMenu() as $menu) {
                if ($menu !== 'devider' && $menu['page_name'] == $pageName && empty($firstPageName)) {
                    $firstPageName = $menu['page_name'];
                }

                if (isset($menu['sub_menu'])) {
                    foreach ($menu['sub_menu'] as $subMenu) {
                        if ($subMenu['page_name'] == $pageName && empty($secondPageName) && $subMenu['page_name'] != 'dashboard') {
                            $firstPageName = $menu['page_name'];
                            $secondPageName = $subMenu['page_name'];
                        }

                        if (isset($subMenu['sub_menu'])) {
                            foreach ($subMenu['sub_menu'] as $lastSubmenu) {
                                if ($lastSubmenu['page_name'] == $pageName) {
                                    $firstPageName = $menu['page_name'];
                                    $secondPageName = $subMenu['page_name'];
                                    $thirdPageName = $lastSubmenu['page_name'];
                                }       
                            }
                        }
                    }
                }
            }
        } else {
            foreach ($this->sideMenu() as $menu) {
                if ($menu !== 'devider' && $menu['page_name'] == $pageName && empty($firstPageName)) {
                    $firstPageName = $menu['page_name'];
                }

                if (isset($menu['sub_menu'])) {
                    foreach ($menu['sub_menu'] as $subMenu) {
                        if ($subMenu['page_name'] == $pageName && empty($secondPageName) && $subMenu['page_name'] != 'dashboard') {
                            $firstPageName = $menu['page_name'];
                            $secondPageName = $subMenu['page_name'];
                        }

                        if (isset($subMenu['sub_menu'])) {
                            foreach ($subMenu['sub_menu'] as $lastSubmenu) {
                                if ($lastSubmenu['page_name'] == $pageName) {
                                    $firstPageName = $menu['page_name'];
                                    $secondPageName = $subMenu['page_name'];
                                    $thirdPageName = $lastSubmenu['page_name'];
                                }       
                            }
                        }
                    }
                }
            }
        }

        return [
            'first_page_name' => $firstPageName,
            'second_page_name' => $secondPageName,
            'third_page_name' => $thirdPageName
        ];
    }

    /**
     * List of side menu items.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
  
    public function sideMenu()
    {
        return [
            'dashboard' => [
                'icon' => 'home',
                'layout' => 'side-menu',
                'page_name' => 'dashboard',
                'title' => 'Dashboard'
            ],
            'works' => [
                'icon' => 'book',
                'page_name' => 'works',
                'title' => 'Works',
                'sub_menu' => [
                    'books' => [
                        'icon' => '',
                        'layout' => 'side-menu',
                        'page_name' => 'books',
                        'title' => 'Books'
                    ],
                    'student-reports' => [
                        'icon' => '',
                        'layout' => 'side-menu',
                        'page_name' => 'student-reports',
                        'title' => 'Student Reports'
                    ],
                    'subjects' => [
                        'icon' => '',
                        'layout' => 'side-menu',
                        'page_name' => 'subjects',
                        'title' => 'Subjects'
                    ],
                ],
            ],
            'reservation' => [
                'icon' => 'clock',
                'layout' => 'side-menu',
                'page_name' => 'reservations',
                'title' => 'Reservations'
            ],
            'book-series' => [
                'icon' => 'book',
                'layout' => 'side-menu',
                'page_name' => 'book-series',
                'title' => 'Books Series'
            ],
           'devider',
            'users' => [
                'icon' => 'users',
                'page_name' => 'users',
                'title' => 'Users',
                'sub_menu' => [
                    'members' => [
                        'icon' => '',
                        'layout' => 'side-menu',
                        'page_name' => 'members',
                        'title' => 'Members'
                    ],
                    'admin' => [
                        'icon' => '',
                        'layout' => 'side-menu',
                        'page_name' => 'admins',
                        'title' => 'Admin'
                    ],
                    'roles' => [
                        'icon' => '',
                        'layout' => 'side-menu',
                        'page_name' => 'roles',
                        'title' => 'Roles'
                    ],
                    'permissions' => [
                        'icon' => '',
                        'layout' => 'side-menu',
                        'page_name' => 'permissions',
                        'title' => 'Permissions'
                    ],
                ],
            ],
            'authors' => [
                'icon' => 'user',
                'layout' => 'side-menu',
                'page_name' => 'authors',
                'title' => 'Authors',  
            ], 
            'publishers' => [
                'icon' => 'user',
                'layout' => 'side-menu',
                'page_name' => 'publishers',
                'title' => 'Publishers',  
            ],  
            'devider',  
            'config' => [
                'icon' => 'settings',
                'page_name' => 'config',
                'title' => 'Config',
                'sub_menu' => [
                    'setting' => [
                        'icon' => '',
                        'layout' => 'side-menu',
                        'page_name' => 'setting',
                        'title' => 'Settings'
                    ],
                    'home-setting' => [
                        'icon' => '',
                        'layout' => 'side-menu',
                        'page_name' => 'home-setting',
                        'title' => 'Home Setting'
                    ]
                ]
            ]
        ];
    }
    /**
     * List of simple menu items.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function simpleMenu()
    {
        return [];
    }

    /**
     * List of top menu items.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function topMenu()
    {
        return [];
    }
}

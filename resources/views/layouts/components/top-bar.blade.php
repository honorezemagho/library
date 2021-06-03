<!-- BEGIN: Top Bar -->
<div class="top-bar relative z-20">
    <!-- BEGIN: Breadcrumb -->
    <div class="-intro-x breadcrumb mr-auto hidden sm:flex relative z-20">
        <a href="" class="">Application</a>
        @if($first_page_name)
            <i data-feather="chevron-right" class="breadcrumb__icon"></i>
            @if($second_page_name)
                <a href="" class="breadcrumb">{{ $first_page_name }}</a>
            @else
                <a href="" class="breadcrumb--active">{{ $first_page_name }}</a>
            @endif
        @endif

        @if($second_page_name)
        <i data-feather="chevron-right" class="breadcrumb__icon"></i>
            @if($third_page_name)
                <a href="/admin/{{ $second_page_name }}" class="breadcrumb">{{ $second_page_name }}</a>
            @else
                <a href="" class="breadcrumb--active">{{ $second_page_name }}</a>
            @endif
        @endif

         @if($third_page_name)
            <i data-feather="chevron-right" class="breadcrumb__icon"></i>
                <a href="" class="breadcrumb--active">{{ $third_page_name }}</a>
        @endif
    
    </div>
    <!-- END: Breadcrumb -->
    <!-- BEGIN: Search -->
    <div class="intro-x mr-3 sm:mr-6  relative z-20">
        <div class="search hidden sm:block">
            <input type="text" class="search__input input placeholder-theme-13" placeholder="Search...">
            <i data-feather="search" class="search__icon"></i>
        </div>
        <a class="notification sm:hidden" href="">
            <i data-feather="search" class="notification__icon"></i>
        </a>
        <div class="search-result">
            <div class="search-result__content">
                <div class="search-result__content__title">Pages</div>
                <div class="mb-5">
                    <a href="" class="flex items-center">
                        <div class="w-8 h-8 bg-theme-18 text-theme-9 flex items-center justify-center rounded-full">
                            <i class="w-4 h-4" data-feather="inbox"></i>
                        </div>
                        <div class="ml-3">Mail Settings</div>
                    </a>
                    <a href="" class="flex items-center mt-2">
                        <div class="w-8 h-8 bg-theme-17 text-theme-11 flex items-center justify-center rounded-full">
                            <i class="w-4 h-4" data-feather="users"></i>
                        </div>
                        <div class="ml-3">Users & Permissions</div>
                    </a>
                    <a href="" class="flex items-center mt-2">
                        <div class="w-8 h-8 bg-theme-14 text-theme-10 flex items-center justify-center rounded-full">
                            <i class="w-4 h-4" data-feather="credit-card"></i>
                        </div>
                        <div class="ml-3">Transactions Report</div>
                    </a>
                </div>
                <div class="search-result__content__title">Users</div>
                <div class="mb-5">
                        <a href="" class="flex items-center mt-2">
                            <div class="w-8 h-8 image-fit">
                                <img alt="Notif" class="rounded-full" src="{{ asset('dist/images/profile-19.jpg') }}">
                            </div>
                            <div class="ml-3">Jean</div>
                            <div class="ml-auto w-48 truncate text-gray-600 text-xs text-right">g@gmail.coms</div>
                        </a>
                </div>
                <div class="search-result__content__title">Products</div>
                    <a href="" class="flex items-center mt-2">
                        <div class="w-8 h-8 image-fit">
                            <img alt="Notif" class="rounded-full" src="{{ asset('dist/images/profile-19.jpg') }}">
                        </div>
                        <div class="ml-3">Book</div>
                        <div class="ml-auto w-48 truncate text-gray-600 text-xs text-right">Maths</div>
                    </a>
             </div>
        </div>
    </div>
    <!-- END: Search -->
    <!-- BEGIN: Notifications -->
    <div class="intro-x dropdown relative mr-auto sm:mr-6 z-20">
        <div class="dropdown-toggle notification notification--bullet cursor-pointer">
            <i data-feather="bell" class="notification__icon "></i>
        </div>
        <div class="notification-content dropdown-box mt-8 absolute top-0 left-0 sm:left-auto sm:right-0 z-20 -ml-10 sm:ml-0">
            <div class="notification-content__box dropdown-box__content box">
                <div class="notification-content__title">Notifications</div>
                    <div class="cursor-pointer relative flex items-center">
                        <div class="w-12 h-12 flex-none image-fit mr-1">
                            <img alt="Midone Laravel Admin Dashboard Starter Kit" class="rounded-full" src="{{ asset('dist/images/profile-19.jpg') }}">
                            <div class="w-3 h-3 bg-theme-9 absolute right-0 bottom-0 rounded-full border-2 border-white"></div>
                        </div>
                        <div class="ml-2 overflow-hidden">
                            <div class="flex items-center">
                                <a href="javascript:;" class="font-medium truncate mr-5">Jordan</a>
                                <div class="text-xs text-gray-500 ml-auto whitespace-no-wrap">10-04-2021</div>
                            </div>
                            <div class="w-full truncate text-gray-600">New reservation</div>
                        </div>
                    </div>
             </div>
        </div>
    </div>
    <!-- END: Notifications -->
    <!-- BEGIN: Account Menu -->
    <div class="intro-x dropdown w-8 h-8 relative z-20">
        <div class="dropdown-toggle w-8 h-8 rounded-full overflow-hidden shadow-lg image-fit zoom-in">
            <img alt="Admin" src="{{ asset('dist/images/profile-19.jpg') }}">
        </div>
        <div class="dropdown-box mt-10 absolute w-56 top-0 right-0 z-10">
            <div class="dropdown-box__content box bg-theme-38 text-white">
                <div class="p-4 border-b border-theme-40">
                    <div class="font-medium">ANAFACK</div>
                    <div class="text-xs text-theme-41">Notif</div>
                </div>
                <div class="p-2">
                    <a href="" class="flex items-center p-2 transition duration-300 ease-in-out hover:bg-theme-1 rounded-md">
                        <i data-feather="user" class="w-4 h-4 mr-2"></i> Profile
                    </a>
                    <a href="" class="flex items-center p-2 transition duration-300 ease-in-out hover:bg-theme-1 rounded-md">
                        <i data-feather="edit" class="w-4 h-4 mr-2"></i> Add Account
                    </a>
                    <a href="" class="flex items-center p-2 transition duration-300 ease-in-out hover:bg-theme-1 rounded-md">
                        <i data-feather="lock" class="w-4 h-4 mr-2"></i> Reset Password
                    </a>
                    <a href="" class="flex items-center p-2 transition duration-300 ease-in-out hover:bg-theme-1 rounded-md">
                        <i data-feather="help-circle" class="w-4 h-4 mr-2"></i> Help
                    </a>
                </div>
                <div class="p-2 border-t border-theme-40">
                    <a href="{{ route('logout') }}" class="flex items-center p-2 transition duration-300 ease-in-out hover:bg-theme-1 rounded-md">
                        <i data-feather="toggle-right" class="w-4 h-4 mr-2"></i> Logout
                    </a>
                </div>
            </div>
        </div>
    </div>
    <!-- END: Account Menu -->
</div>
<!-- END: Top Bar -->
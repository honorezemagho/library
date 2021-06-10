<div>
    <div class="grid grid-cols-12 gap-6 relative z-0">
        <div class="col-span-12 xxl:col-span-9 grid grid-cols-12 gap-6">
            <!-- BEGIN: General Report -->
            <div class="col-span-12 mt-8">
                <div class="intro-y flex items-center h-10">
                    <h2 class="text-lg font-medium truncate mr-5">General Report</h2>
                    <a href="" class="ml-auto flex text-theme-1">
                        <i data-feather="refresh-ccw" class="w-4 h-4 mr-3"></i> Reload Data
                    </a>
                </div>
                <div class="grid grid-cols-12 gap-6 mt-5">
                    <div class="col-span-12 sm:col-span-6 xl:col-span-3 intro-y">
                        <div class="report-box zoom-in">
                            <div class="box p-5">
                                <div class="flex">
                                    <i data-feather="book" class="report-box__icon text-theme-10"></i>
                                    <div class="ml-auto">
                                        <div class="report-box__indicator bg-theme-9 tooltip cursor-pointer" title="33% Higher than last month">
                                            15%
                                        </div>
                                    </div>
                                </div>
                                <div class="text-3xl font-bold leading-8 mt-6">{{ $books }}</div>
                                <div class="text-base text-gray-600 mt-1">Books</div>
                            </div>
                        </div>
                    </div>
                    <div class="col-span-12 sm:col-span-6 xl:col-span-3 intro-y">
                        <div class="report-box zoom-in">
                            <div class="box p-5">
                                <div class="flex">
                                    <i data-feather="book-open" class="report-box__icon text-theme-11"></i>
                                    <div class="ml-auto">
                                        <div class="report-box__indicator bg-theme-9 tooltip cursor-pointer" title="2% Lower than last month">
                                            18%
                                        </div>
                                    </div>
                                </div>
                                <div class="text-3xl font-bold leading-8 mt-6">{{ $reports }}</div>
                                <div class="text-base text-gray-600 mt-1">Students Report</div>
                            </div>
                        </div>
                    </div>
                    <div class="col-span-12 sm:col-span-6 xl:col-span-3 intro-y  z-0">
                        <div class="report-box zoom-in">
                            <div class="box p-5">
                                <div class="flex">
                                    <i data-feather="book-open" class="report-box__icon text-theme-12"></i>
                                    <div class="ml-auto">
                                        <div class="report-box__indicator  bg-theme-9 tooltip cursor-pointer" title="12% Higher than last month">
                                            5%
                                        </div>
                                    </div>
                                </div>
                                <div class="text-3xl font-bold leading-8 mt-6">{{ $subjects }}</div>
                                <div class="text-base text-gray-600 mt-1"> Subjects</div>
                            </div>
                        </div>
                    </div>
                    <div class="col-span-12 sm:col-span-6 xl:col-span-3 intro-y  z-0">
                        <div class="report-box zoom-in">
                            <div class="box p-5">
                                <div class="flex">
                                    <i data-feather="book-open" class="report-box__icon text-theme-12"></i>
                                    <div class="ml-auto">
                                        <div class="report-box__indicator  bg-theme-9 tooltip cursor-pointer" title="12% Higher than last month">
                                            5%
                                        </div>
                                    </div>
                                </div>
                                <div class="text-3xl font-bold leading-8 mt-6">{{ $reservations_count }}</div>
                                <div class="text-base text-gray-600 mt-1"> Reservation</div>
                            </div>
                        </div>
                    </div>
                    
                </div>

                 <div class="grid grid-cols-12 gap-6 mt-5">
                    <div class="col-span-12 sm:col-span-6  intro-y">
                        <div class="m-10 bg-white rounded shadow">
                            {!! $chartWorksCategory->container() !!}
                        </div>
                    </div>
                    <div class="col-span-12 sm:col-span-6 intro-y">
                        <div class="m-10 bg-white rounded shadow">
                            {!! $chartReservation->container() !!}
                        </div>
                    </div>
                </div>

                <div class="intro-y flex flex-col sm:flex-row items-center mt-8">
                    <h2 class="text-lg font-medium mr-auto">Details Statistic about works </h2>
                    <div class="w-full sm:w-auto flex mt-4 sm:mt-0">
                        <button class="button text-white bg-theme-1 shadow-md mr-2">Add New Book</button>
                        <div class="dropdown relative ml-auto sm:ml-0">
                            <button class="dropdown-toggle button px-2 box text-gray-700">
                                <span class="w-5 h-5 flex items-center justify-center">
                                    <i class="w-4 h-4" data-feather="plus"></i>
                                </span>
                            </button>
                            <div class="dropdown-box mt-10 absolute w-40 top-0 right-0 z-20">
                                <div class="dropdown-box__content box p-2">
                                    <a href="" class="flex items-center block p-2 transition duration-300 ease-in-out bg-white hover:bg-gray-200 rounded-md">
                                        <i data-feather="file-plus" class="w-4 h-4 mr-2"></i> New Category
                                    </a>
                                    <a href="" class="flex items-center block p-2 transition duration-300 ease-in-out bg-white hover:bg-gray-200 rounded-md">
                                        <i data-feather="users" class="w-4 h-4 mr-2"></i> New Group
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- END: General Report -->
            <!-- BEGIN: Sales Report -->
           
            <!-- END: Sales Report -->
            <!-- BEGIN: Weekly Top Seller -->
          
            <!-- END: Weekly Top Seller -->
            <!-- BEGIN: Sales Report -->
           
            <!-- END: Sales Report -->
            <!-- BEGIN: Official Store -->
           
            <!-- END: Official Store -->
            <!-- BEGIN: Weekly Best Sellers -->
          
            <!-- END: Weekly Best Sellers -->
            <!-- BEGIN: General Report -->
           
            <!-- END: General Report -->
            <!-- BEGIN: Weekly Top Seller -->
          
            <!-- END: Weekly Top Seller -->
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/apexcharts"></script>
    {{ $chartWorksCategory->script() }}
    {{ $chartReservation->script() }}
    {{ $chartEvolutionOfUsers->script() }}
 
  </div>

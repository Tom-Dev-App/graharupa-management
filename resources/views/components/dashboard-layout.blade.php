<!DOCTYPE html>
<html lang="en" dir="ltr">
    <head>

        <meta charset="utf-8">
        <title>{{ $title ?? "Dashboard | Graharupa Management." }}</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta content="Tailwind Admin & Dashboard Template" name="description">
        <meta content="Themesbrand" name="author">
        <!-- App favicon -->
        <link rel="shortcut icon" href="{{ asset('assets/favicon/logo.ico') }}">
        

        <link rel="stylesheet" href="{{ asset('assets/libs/swiper/swiper-bundle.min.css') }}">

        <!-- Layout config Js -->
        <!-- Icons CSS -->
        
        
        <!-- Tailwind CSS -->
        

      <link rel="stylesheet" href="{{ asset('assets/css/tailwind2.css') }}">
      @stack('head')
    </head>

    <body data-mode="light" data-sidebar-size="lg" class="group">
        
        <!-- ========== Left Sidebar Start ========== -->
       @include('components.navigation')

        <div class="main-content group-data-[sidebar-size=sm]:ml-[70px]">
            <div class="page-content dark:bg-zinc-700">
                <div class="container-fluid px-[0.625rem]">
                        {{-- CONTENT START HERE --}}
                        @yield('content')
                        {{-- CONTENT START END HERE --}} 
                        
                        {{-- MODAL LOGOUT --}}
                        <div>
                        <div class="relative z-50 hidden modal" id="modal-idsimple2" aria-labelledby="modal-title" role="dialog" aria-modal="true">
                            <div class="fixed inset-0 z-50 overflow-hidden">
                                <div class="absolute inset-0 transition-opacity bg-black bg-opacity-50 modal-overlay"></div>
                                <div class="p-4 mx-auto animate-translate sm:max-w-lg">
                                    <div class="relative overflow-hidden text-left transition-all transform bg-white rounded-lg shadow-xl dark:bg-zinc-600">
                                        <div class="px-4 pt-5 pb-4 bg-white sm:p-6 sm:pb-4 dark:bg-zinc-700 ">
                                            <div class="sm:flex sm:items-start">
                                                <div class="flex items-center justify-center  w-12 h-12 mx-auto rounded-full bg-red-50 sm:mx-0 sm:h-10 sm:w-10 flex-shrink-0">
                                                    <i class="text-red-500 mdi mdi-alert-outline text-22"></i>
                                                </div>
                                                <div class="mt-3 text-center sm:mt-0 ltr:sm:ml-4 rtl:sm:mr-4 ltr:sm:text-left rtl:sm:text-right">
                                                    <h3 class="text-lg font-medium leading-6 text-gray-900 dark:text-gray-100" id="modal-title">Logout account</h3>
                                                    <div class="mt-2">
                                                        <p class="text-sm text-gray-500 dark:text-zinc-100/60">Are you sure you want to logout?</p>
                                                    </div>
                                                    {{-- FORM LOGOUT --}}
                                                    <form class="block gap-4 mt-4 sm:flex" method="POST" action="{{ route('logout') }}">
                                                        @csrf
                                                        @method('delete')
                                                        <button type="submit" class="inline-flex justify-center w-full px-4 py-2 text-base font-medium text-white bg-red-500 border border-transparent rounded-md shadow-sm btn hover:bg-red-600 focus:outline-none focus:ring-2 focus:ring-red-500 sm:w-auto sm:text-sm">Logout</button>
                                                        <button type="button" class="inline-flex justify-center w-full px-4 py-2 mt-3 text-base font-medium text-gray-700 bg-white border border-gray-300 rounded-md shadow-sm btn dark:text-gray-100 hover:bg-gray-50/50 focus:outline-none focus:ring-2 focus:ring-gray-500/30 sm:mt-0 sm:w-auto sm:text-sm dark:bg-zinc-700 dark:border-zinc-600 dark:hover:bg-zinc-600 dark:focus:bg-zinc-600 dark:focus:ring-zinc-700 dark:focus:ring-gray-500/20" data-tw-dismiss="modal">Cancel</button>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
    {{-- MODAL LOGOUT END --}}

                    </div>
                </div>
        </div>


        <div class="fixed z-40 flex flex-col gap-3 ltr:right-5 rtl:left-5 bottom-10 animate-bounce">

        </div>
        {{-- <script src="{{ asset('assets/libs/@popperjs/core/umd/popper.min.js') }}"></script>
        <script src="{{ asset('assets/libs/feather-icons/feather.min.js') }}"></script>
        <script src="{{ asset('assets/libs/metismenujs/metismenujs.min.js') }}"></script>
        <script src="{{ asset('assets/libs/simplebar/simplebar.min.js') }}"></script> --}}

         <!-- choices js -->
         {{-- <script src="{{ asset('assets/libs/choices.js/public/assets/scripts/choices.min.js') }}"></script> --}}

        {{-- <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script> --}}
        <!-- apexcharts -->
        {{-- <script src="assets/libs/apexcharts/apexcharts.min.js"></script> --}}
        <!-- Plugins js-->
        {{-- <script src="{{ asset('assets/libs/admin-resources/jquery.vectormap/jquery-jvectormap-1.2.2.min.js') }}"></script>
        <script src="{{ asset('assets/libs/admin-resources/jquery.vectormap/maps/jquery-jvectormap-world-mill-en.js') }}"></script> --}}

        {{-- <script src="{{ asset('assets/libs/swiper/swiper-bundle.min.js') }}"></script> --}}

        <!-- dashboard init -->
        {{-- <script  src="assets/js/pages/dashboard.init.js"></script> --}}

        {{-- <script src="{{ asset('assets/js/pages/nav&tabs.js') }}"></script>

        <script src="{{ asset('assets/js/pages/login.init.js') }}"></script> --}}
        
        <!-- color picker js -->
        {{-- <script src="{{ asset('assets/libs/@simonwep/pickr/pickr.min.js') }}"></script>
        <script src="{{ asset('assets/libs/@simonwep/pickr/pickr.es5.min.js') }}"></script> --}}

        <!-- datepicker js -->
        {{-- <script src="{{ asset('assets/libs/flatpickr/flatpickr.min.js') }}"></script> --}}


        <!-- init js -->
        {{-- <script  src="{{ asset('assets/js/pages/form-advanced.init.js') }}"></script> --}}

        <!-- Responsive Table js -->
        {{-- <script src="{{ asset('assets/libs/admin-resources/rwd-table/rwd-table.min.js') }}"></script>

        <script  src="{{ asset('assets/js/pages/table-responsive.init.js') }}"></script>


        <script  src="{{ asset('assets/js/app.js') }}"></script> --}}

        <!-- Popper.js -->
<script src="{{ asset('assets/libs/@popperjs/core/umd/popper.min.js') }}"></script>

<!-- Feather Icons -->
<script src="{{ asset('assets/libs/feather-icons/feather.min.js') }}"></script>

<!-- MetisMenu -->
<script src="{{ asset('assets/libs/metismenujs/metismenujs.min.js') }}"></script>

<!-- Simplebar -->
<script src="{{ asset('assets/libs/simplebar/simplebar.min.js') }}"></script>

<!-- Choices.js -->
<script src="{{ asset('assets/libs/choices.js/public/assets/scripts/choices.min.js') }}"></script>

<!-- jQuery -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>

<!-- ApexCharts (commented out) -->
{{-- <script src="assets/libs/apexcharts/apexcharts.min.js"></script> --}}

<!-- jQuery Vector Map -->
<script src="{{ asset('assets/libs/admin-resources/jquery.vectormap/jquery-jvectormap-1.2.2.min.js') }}"></script>
<script src="{{ asset('assets/libs/admin-resources/jquery.vectormap/maps/jquery-jvectormap-world-mill-en.js') }}"></script>

<!-- Swiper -->
<script src="{{ asset('assets/libs/swiper/swiper-bundle.min.js') }}"></script>

<!-- Navigation & Tabs -->
<script src="{{ asset('assets/js/pages/nav&tabs.js') }}"></script>

<!-- Login Init -->
<script src="{{ asset('assets/js/pages/login.init.js') }}"></script>

<!-- Color Picker (commented out) -->
{{-- <script src="{{ asset('assets/libs/@simonwep/pickr/pickr.min.js') }}"></script>
<script src="{{ asset('assets/libs/@simonwep/pickr/pickr.es5.min.js') }}"></script> --}}

<!-- Flatpickr Datepicker -->
<script src="{{ asset('assets/libs/flatpickr/flatpickr.min.js') }}"></script>

<!-- Form Advanced Init -->
<script src="{{ asset('assets/js/pages/form-advanced.init.js') }}"></script>

<!-- Responsive Table -->
<script src="{{ asset('assets/libs/admin-resources/rwd-table/rwd-table.min.js') }}"></script>

<!-- Table Responsive Init -->
<script src="{{ asset('assets/js/pages/table-responsive.init.js') }}"></script>

<!-- App JS -->
<script src="{{ asset('assets/js/app.js') }}"></script>

<script>
    // Define the updateRadio function to avoid the ReferenceError
    function updateRadio(value) {
        // Your implementation here
        console.log("updateRadio called with value: " + value);
    }
</script>


        @stack('footer')
    </body>

</html>
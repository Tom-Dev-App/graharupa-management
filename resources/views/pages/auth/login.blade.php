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

    <body data-mode="light" data-sidebar-size="lg" class="group mx-auto">
       
        <div class="container-fluid">
            <div class="h-screen md:overflow-hidden">
                <div class="grid grid-cols-1 md:grid-cols-12 justify-center place-items-center">
                    <div class="relative z-50 col-span-12 md:col-span-5 lg:col-span-4 xl:col-span-3">
                        <div class="w-full p-10 bg-white xl:p-12 dark:bg-zinc-800">
                            <div class="flex h-[90vh] flex-col">
                                <div class="mx-auto mb-6">
                                    <a href="index.html" class="t">
                                        <img src="{{ asset('/assets/logo/logo.svg') }}" alt="" class="inline-flex justify-center h-7"> <span class="text-lg font-medium align-middle ltr:ml-1.5 rtl:mr-1.5 dark:text-white text-center">Graharupa Management</span>
                                    </a>
                                </div>

                                <div class="my-auto">
                                    <div class="text-center">
                                        <h5 class="font-medium text-gray-700 dark:text-gray-100">Welcome Back !</h5>
                                        <p class="mt-2 mb-4 text-gray-500 dark:text-gray-100/60">Sign in to continue to Graharupa Management Dashboard.</p>
                                    </div>

                                    @if (session()->has('error'))
                                        
                                    <div class="flex px-5 py-3 text-red-700 border border-red-100 rounded bg-red-50">
                                        <i class="text-xl bx bx-error ltr:mr-2 rtl:ml-2"></i>
                                        <div>
                                            <h6 class="text-15">Login Failed!</h6>
                                            <p class="mt-2">{{ session('error') }}</p>
                                        </div>
                                    </div>
                                    @endif

                                    <form class="pt-2" action="{{ route('authenticate') }}" method="POST">
                                        @csrf
                                        @method('post')
                                        <div class="mb-4">
                                            <label class="block mb-2 font-medium text-gray-700 dark:text-gray-100">Email</label>
                                            <input type="text" class="w-full py-1.5 border-gray-50 rounded placeholder:text-13 bg-gray-50/30 dark:bg-zinc-700/50 dark:border-zinc-600 dark:text-gray-100 dark:placeholder:text-zinc-100/60 focus:ring focus:ring-violet-500/20 focus:border-violet-100 text-13" id="username" placeholder="Enter username" name="email" >
                                            @error('email')
                                                <span class="text-red-500 text-sm">{{ $message }}</span>
                                            @enderror
                                            </div>
                                        <div class="mb-3">
                                            <div class="flex">
                                                <div class="flex-grow-1">
                                                    <label class="block mb-2 font-medium text-gray-600 dark:text-gray-100">Password</label>
                                                </div>
                                                {{-- <div class="ltr:ml-auto rtl:mr-auto">
                                                    <a href="#" class="text-gray-500 dark:text-gray-100">Forgot password?</a>
                                                </div> --}}
                                            </div>

                                            <div class="flex">
                                                <input type="password" class="w-full py-1.5 border-gray-50 rounded ltr:rounded-r-none rtl:rounded-l-none bg-gray-50/30 placeholder:text-13 text-13 dark:bg-zinc-700/50 dark:border-zinc-600 dark:text-gray-100 dark:placeholder:text-zinc-100/60 focus:ring focus:ring-violet-500/20 focus:border-violet-100" placeholder="Enter password" aria-label="Password" aria-describedby="password-addon" id="password-input" name="password">
                                                <button class="px-4 border rounded border-gray-50 bg-gray-50 ltr:rounded-l-none rtl:rounded-r-none ltr:border-l-0 rtl:border-r-0 dark:bg-zinc-700 dark:border-zinc-600 dark:text-gray-100" type="button" id="password-toggle">
                                                    <i class="mdi mdi-eye-outline"></i>
                                                </button>
                                            </div>
                                            @error('password')
                                                <span class="text-red-500 text-sm">{{ $message }}</span>
                                            @enderror
                                        </div>
                                        <div class="mb-6 row">
                                            <div class="col">
                                                <div>
                                                    <input type="checkbox" class="w-4 h-4 mt-1 align-top transition duration-200 bg-white bg-center bg-no-repeat bg-contain border border-gray-300 rounded cursor-pointer checked:bg-blue-600 checked:border-blue-600 focus:outline-none ltr:float-left rtl:float-right ltr:mr-2 rtl:ml-2 focus:ring-offset-0" checked id="remember-me">
                                                    <label class="font-medium text-gray-600 align-middle dark:text-gray-100" for="remember-me" name="remember">
                                                        Remember me
                                                    </label>
                                                </div>
                                            </div>

                                        </div>
                                        <div class="mb-3">
                                            <button class="w-full py-2 text-white border-transparent shadow-md btn bg-violet-500 w-100 waves-effect waves-light shadow-violet-200 dark:shadow-zinc-600" type="submit">Log In</button>
                                        </div>
                                    </form>

                                    {{-- <div class="pt-2 mt-5 text-center">
                                        <div>
                                            <h6 class="mb-3 font-medium text-gray-500 text-14 dark:text-gray-100">- Sign in with -</h6>
                                        </div>

                                        <div class="flex justify-center gap-3">
                                            <a href="" class="w-8 h-8 leading-8 rounded-full bg-violet-500">
                                                <i class="text-sm text-white mdi mdi-facebook"></i>
                                            </a>
                                            <a href="" class="w-8 h-8 leading-8 rounded-full bg-sky-500">
                                                <i class="text-sm text-white mdi mdi-twitter"></i>
                                            </a>
                                            <a href="" class="w-8 h-8 leading-8 bg-red-400 rounded-full">
                                                <i class="text-sm text-white mdi mdi-google"></i>
                                            </a>
                                        </div>
                                    </div>

                                    <div class="mt-12 text-center">
                                        <p class="text-gray-500 dark:text-gray-100">Don't have an account ? <a href="register.html" class="font-semibold text-violet-500"> Signup now </a> </p>
                                    </div> --}}
                                </div>


                                <div class="text-center ">
                                    <p class="relative text-gray-500 dark:text-gray-100">©
                                        <script>document.write(new Date().getFullYear())</script> Graharupa Indonesia
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-span-12 md:col-span-7 lg:col-span-8 xl:col-span-9">
                        <div class="h-screen bg-cover relative p-5 bg-[url('{{ asset('/assets/images/bg-login.jpg') }}')]">
                            <div class="absolute inset-0 bg-violet-500/90"></div>

                            <ul class="absolute top-0 left-0 w-full h-full overflow-hidden bg-bubbles animate-square">
                                <li class="h-10 w-10 rounded-3xl bg-white/10 absolute left-[10%] "></li>
                                <li class="h-28 w-28 rounded-3xl bg-white/10 absolute left-[20%]"></li>
                                <li class="h-10 w-10 rounded-3xl bg-white/10 absolute left-[25%]"></li>
                                <li class="h-20 w-20 rounded-3xl bg-white/10 absolute left-[40%]"></li>
                                <li class="h-24 w-24 rounded-3xl bg-white/10 absolute left-[70%]"></li>
                                <li class="h-32 w-32 rounded-3xl bg-white/10 absolute left-[70%]"></li>
                                <li class="h-36 w-36 rounded-3xl bg-white/10 absolute left-[32%]"></li>
                                <li class="h-20 w-20 rounded-3xl bg-white/10 absolute left-[55%]"></li>
                                <li class="h-12 w-12 rounded-3xl bg-white/10 absolute left-[25%]"></li>
                                <li class="h-36 w-36 rounded-3xl bg-white/10 absolute left-[90%]"></li>
                            </ul>

                            <div class="flex items-center justify-center h-screen ">
                                <div class="w-full md:max-w-4xl lg:px-9">
                                    <div class="swiper login-slider">
                                        <div class="swiper-wrapper">
                                            <div>
                                                <i class="text-5xl text-green-600 bx bxs-quote-alt-left"></i>
                                                
                                                <h3 class="mt-4 text-white text-22">“Building the foundation of efficiency and style, where interiors meet exteriors in your project management journey.”</h3>
                                                {{-- <div class="flex pt-4 mt-6 mb-10">
                                                    <img src="./assets/images/avatar-1.jpg" class="w-12 h-12 rounded-full" alt="...">
                                                    <div class="flex-1 mb-4 ltr:ml-3 rtl:mr-2">
                                                        <h5 class="text-white font-size-18">Ilse R. Eaton</h5>
                                                        <p class="mb-0 text-white/50">Manager
                                                        </p>
                                                    </div>
                                                </div> --}}
                                            </div>
                                            
                                        </div>
                                        <div class="swiper-pagination"></div>
                                    </div>

                                </div>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>

        <script src="{{ asset('assets/libs/@popperjs/core/umd/popper.min.js') }}"></script>
        <script src="{{ asset('assets/libs/feather-icons/feather.min.js') }}"></script>
        <script src="{{ asset('assets/libs/metismenujs/metismenujs.min.js') }}"></script>
        <script src="{{ asset('assets/libs/simplebar/simplebar.min.js') }}"></script>


        <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
        <script src="{{ asset('assets/libs/admin-resources/jquery.vectormap/jquery-jvectormap-1.2.2.min.js') }}"></script>
        <script src="{{ asset('assets/libs/admin-resources/jquery.vectormap/maps/jquery-jvectormap-world-mill-en.js') }}"></script>

        <script src="{{ asset('assets/libs/swiper/swiper-bundle.min.js') }}"></script>

        <script src="{{ asset('assets/js/pages/nav&tabs.js') }}"></script>

        <script src="{{ asset('assets/js/pages/login.init.js') }}"></script>

        <script  src="{{ asset('assets/js/app.js') }}"></script>
        <script>
            document.addEventListener('DOMContentLoaded', function () {
                const passwordInput = document.getElementById('password-input');
                const passwordToggle = document.getElementById('password-toggle');
                
                passwordToggle.addEventListener('click', function () {
                    const type = passwordInput.getAttribute('type') === 'password' ? 'text' : 'password';
                    passwordInput.setAttribute('type', type);
                    
                    // Toggle icon
                    if (type === 'password') {
                        passwordToggle.innerHTML = '<i class="mdi mdi-eye-outline"></i>';
                    } else {
                        passwordToggle.innerHTML = '<i class="mdi mdi-eye-off-outline"></i>';
                    }
                });
            });
        </script>
        @stack('footer')
    </body>

</html>
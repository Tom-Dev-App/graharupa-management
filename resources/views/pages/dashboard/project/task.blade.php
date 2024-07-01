@php
    $component = app(App\View\Components\DashboardLayout::class, ['title' => 'Dashboard']);
@endphp

@extends('components.dashboard-layout')
@section('content')
<section class="min-h-screen">
                    <div class="grid grid-cols-1 pb-6">
                        <div class="md:flex items-center justify-between px-[2px] gap-3 flex-wrap">
                            <a href="{{ route('projects.index') }}" class="border-0 btn text-violet-500">
                                <i class="mr-1 mdi mdi-arrow-left"></i> Back
                            </a>

                            <h4 class="text-[18px] font-medium text-gray-800 mb-sm-0 grow dark:text-gray-100 mb-2 md:mb-0">Judul</h4>



                                    <p class="text-red-500 text-16 dark:text-red-100 mb-2">
                                        <i class="mdi mdi-calendar "></i>
                                         Deadline 17 Juli 2024
                                    </p>
                           </div>
                    </div>

                    <div class="flex flex-wrap card-body justify-end flex-wrap">
                        {{-- <span class="badge font-medium bg-green-600 text-white text-15 px-1.5 py-[1.5px] rounded">
                                                <i class="mdi mdi-progress-check"></i>
                                                Done</span> --}}
                                                <div>
                                                    <span class="font-sm text-gray-800 grow dark:text-gray-100 mb-2">Status</span>
                                                    <span class="badge font-medium bg-blue-400 text-white text-15 px-1.5 py-[1.5px] rounded">
                                                        <i class="mdi mdi-progress-wrench"></i>
                                                        In Progress</span>

                                                </div>
                                                {{-- <span class="badge font-medium bg-yellow-400 text-white text-15 px-1.5 py-[1.5px] rounded"> 
                                                         <i class="mdi mdi-progress-clock"></i>
                                                        On Hold</span>
                                                <span class="badge font-medium bg-red-400 text-white text-15 px-1.5 py-[1.5px] rounded">
                                                    <i class="mdi mdi-progress-close"></i>
                                                    Canceled
                                                </span> --}}

                    </div>
                        
                        <!-- TAB -->
                        <div class="grid  grid-cols-1 grid-span-12">
                            <div class="flex flex-wrap card-body w-[100%]">
                                <div class="nav-tabs bar-tabs">
                                    <ul class="w-full overflow-hidden text-sm font-medium text-center text-gray-500 rounded-lg shadow nav dark:divide-gray-900 sm:flex">
                                        <li class="w-full">
                                            <a href="{{ route('projects.index') }}" data-tw-toggle="tab" class="inline-block w-full p-4 {{ request()->routeIs('projects.index') ? 'active' : '' }}">Tasks</a>

                                        </li>
                                        <li class="w-full">
                                            <a href="javascript:void(0);" data-tw-toggle="tab" class="inline-block w-full p-4">Attachments</a>
                                        </li>
                                        <li class="w-full border-x border-gray-50">
                                            <a href="javascript:void(0);" data-tw-toggle="tab"  class="inline-block w-full p-4">Materials</a>
                                        </li>
                                        <li class="w-full ltr:border-r rtl:border-l border-gray-50">
                                            <a href="javascript:void(0);" data-tw-toggle="tab"  class="inline-block w-full p-4">Chats</a>
                                        </li>
                                    </ul>

                                    <div class="mt-5 tab-content">
                                        <div class="block tab-pane">
                                              <!-- START PROJECT -->
                                            <div class="grid grid-cols-1 lg:gap-x-6 lg:grid-cols-12">
                                                <div class="col-span-12 md:col-span-6 xl:col-span-3">
                                                    <div class="card dark:bg-zinc-800 dark:border-zinc-600">
                                                        {{-- <img class="rounded" src="assets/images/small/img-1.jpg" alt=""> --}}
                                                        <div class="card-body">
                                                            <h3 class="mb-2 text-lg md:text-xl lg:text-xl xl:text-xl 2xl:text-xl text-gray-700 dark:text-gray-100">
                                                                Pengecatan pagar hari ke-1
                                                            </h3>
                                                            <p class="text-sky-500 text-16 dark:sky-red-100 mb-2">
                                                                <i class="bx bx-user "></i>
                                                                Nanang
                                                            </p>
                                                            
                                                        <div>
                                                                {{-- <span class="badge font-medium bg-green-600 text-white text-15 px-1.5 py-[1.5px] rounded">
                                                                    <i class="mdi mdi-progress-check"></i>
                                                                    Done</span> --}}
                                                                <span class="badge font-medium bg-blue-400 text-white text-15 px-1.5 py-[1.5px] rounded">
                                                                    <i class="mdi mdi-progress-wrench"></i>
                                                                    In Progress</span>
                                                                {{-- <span class="badge font-medium bg-yellow-400 text-white text-15 px-1.5 py-[1.5px] rounded"> 
                                                                        <i class="mdi mdi-progress-clock"></i>
                                                                        On Hold</span>
                                                                <span class="badge font-medium bg-red-400 text-white text-15 px-1.5 py-[1.5px] rounded">
                                                                    <i class="mdi mdi-progress-close"></i>
                                                                    Canceled
                                                                </span> --}}
                                                        </div>
                                                                <div class="flex gap-6 items-center mt-6">
                                                                    <div class="">
                                                                        <a href="" class="btn border-transparent bg-violet-500 text-white py-2.5 shadow-md shadow-violet-200 dark:shadow-zinc-600">Open</a>
                                                                    </div>
                                                                    <div class="relative dropdown">
                                                                        <button type="button" class="py-2 font-medium leading-tight text-white bg-gray-500 border border-gray-500 shadow-md btn dropdown-toggle shadow-gray-100 dark:shadow-zinc-600 hover:bg-gray-600 focus:bg-gray-600 focus:ring focus:ring-gray-200 focus:ring-gray-500/20 " id="dropdownMenuButton1" data-bs-toggle="dropdown"><i class='text-lg align-middle bx bx-hive ltr:mr-2 rtl:ml-2'></i>Menu <i class="mdi mdi-chevron-down "></i></button>
                            
                                                                        <ul class="absolute z-50 hidden float-left py-2 mt-1 text-left list-none bg-white border-none rounded-lg shadow-lg dropdown-menu w-44 bg-clip-padding dark:bg-zinc-700" aria-labelledby="dropdownMenuButton1">
                                                                            <li><a class="inline flex items-center justify-center w-full px-4 py-1 text-sm font-medium text-gray-500 bg-transparent dropdown-item whitespace-nowrap hover:bg-gray-50/50 dark:text-gray-100 dark:hover:bg-zinc-600/50" href="#"><i class='text-lg align-middle bx bxs-edit ltr:mr-2 rtl:ml-2'></i>Edit</a>
                                                                            </li>
                                                                            <hr class="my-1 border-gray-50 dark:border-zinc-600">
                                                                            <li>
                                                                                <button type="button" class="block w-full px-4 py-1 text-sm font-medium text-gray-500 bg-transparent dropdown-item whitespace-nowrap hover:bg-gray-50/50 dark:text-gray-100 dark:hover:bg-zinc-600/50"  data-tw-toggle="modal" data-tw-target="#modal-delete-task-id">
                                                                                    <i class='text-lg align-middle bx bxs-trash ltr:mr-2 rtl:ml-2'></i>Delete</button>
                                                                            </li>
                                                                            
                                                                        </ul>
                                                                    </div>

                                                                </div>
                                                        </div>
                                                        {{-- modal delete --}}
                                                        <div class="card-body">
                                                            <div class="relative z-50 hidden modal" id="modal-delete-task-id" aria-labelledby="modal-title" role="dialog" aria-modal="true">
                                                                <div class="fixed inset-0 z-50 overflow-hidden">
                                                                    <div class="absolute inset-0 transition-opacity bg-black bg-opacity-50"></div>
                                                                    <div class="flex items-end justify-center min-h-screen p-4 text-center animate-translate sm:items-center sm:p-0">
                                                                        <div class="relative overflow-hidden text-left transition-all transform bg-white rounded-lg shadow-xl -top-10 sm:my-8 sm:w-full sm:max-w-lg dark:bg-zinc-700">
                                                                            <div class="p-5 text-center bg-white dark:bg-zinc-700">
                                                                                <div class="mx-auto bg-red-100 rounded-full h-14 w-14">
                                                                                    <i class="mdi mdi-trash-can text-2xl text-red-600 leading-[2.4]"></i>
                                                                                </div>
                                                                                <h2 class="mt-5 text-xl text-gray-700 dark:text-gray-100">Delete this task?</h2>
                                                                                <p class="mt-2 text-gray-500 dark:text-zinc-100/60">By deleting task, it will be permanantly deleted?</p>
                                                                                <div class="justify-center px-4 py-3 mt-5 border-gray-50 sm:flex sm:px-6">
                                                                                    <button type="button" class="inline-flex justify-center w-full px-4 py-2 mt-3 text-base font-medium text-gray-700 bg-white border border-gray-300 rounded-md shadow-sm btn dark:text-gray-100 hover:bg-gray-50/50 focus:outline-none focus:ring-2 focus:ring-gray-500/30 sm:mt-0 sm:ml-3 sm:w-auto sm:text-sm dark:bg-zinc-700 dark:border-zinc-600 dark:hover:bg-zinc-600 dark:focus:bg-zinc-600 dark:focus:ring-zinc-700 dark:focus:ring-gray-500/20" data-tw-dismiss="modal">Cancel</button>
                                                                                    <button type="button" class="inline-flex justify-center w-full px-4 py-2 text-base font-medium text-white bg-red-500 border border-transparent rounded-md shadow-sm btn hover:bg-red-600 focus:outline-none focus:ring-2 focus:ring-red-500 sm:ml-3 sm:w-auto sm:text-sm">Delete</button>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        {{-- modal delete --}}
                                                    </div>
                                                </div>
                                        
                                            {{-- END CARD --}}
                                            </div>
                                            {{-- END PROJECT --}}
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        {{-- END PROJECT --}}

                        
    {{-- START NEW PROJECT MODAL --}}
    <div class="relative z-50 hidden modal" id="task-new" aria-labelledby="modal-title" role="dialog" aria-modal="true">
        <div class="fixed inset-0 z-50 overflow-y-auto">
            <div class="absolute inset-0 transition-opacity bg-black bg-opacity-50 modal-overlay"></div>
            <div class="p-4 mx-auto animate-translate sm:max-w-lg">
                <div class="relative overflow-hidden text-left transition-all transform bg-white rounded-lg shadow-xl dark:bg-zinc-600">
                    <div class="bg-white dark:bg-zinc-700">
                        <button type="button" class="absolute top-3 right-2.5 text-gray-400 border-transparent hover:bg-gray-50/50 hover:text-gray-900 dark:text-gray-100 rounded-lg text-sm px-2 py-1 ltr:ml-auto rtl:mr-auto inline-flex items-center dark:hover:bg-zinc-600" data-tw-dismiss="modal">
                            <i class="text-xl text-gray-500 mdi mdi-close dark:text-zinc-100/60"></i>
                        </button>
                        <div class="p-5">
                            <h3 class="mb-4 text-xl font-medium text-gray-700 dark:text-gray-100">Create Project</h3>
                            <form class="space-y-4" action="#" method="POST">
                                <div class="mb-4">
                                    <label for="example-text-input" class="block mb-2 font-medium text-gray-700 dark:text-gray-100">Project Name</label>
                                    <input class="bg-gray-800/5 border border-gray-100 text-gray-900 dark:text-gray-100 text-sm rounded focus:ring-violet-500 focus:border-violet-500 block w-full p-2.5 dark:bg-zinc-700/50 dark:border-zinc-600 dark:placeholder-gray-400 dark:placeholder:text-zinc-100/60 focus:ring-0" type="text" placeholder="Name a project" id="example-text-input">
                                </div>
                             
                                <div>
                                    <label for="project_description" class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-100 ltr:text-left rtl:text-right">Project Description</label>
                                    <textarea name="project_description" id="project_description" cols="30" rows="10" 
                                    class="bg-gray-800/5 border border-gray-100 text-gray-900 dark:text-gray-100 text-sm rounded focus:ring-violet-500 focus:border-violet-500 block w-full p-2.5 dark:bg-zinc-700/50 dark:border-zinc-600 dark:placeholder-gray-400 dark:placeholder:text-zinc-100/60 focus:ring-0" placeholder="Short brief description" required></textarea>
                                </div>


                                <div class="mb-4">
                                    <label for="example-text-input" class="block mb-2 font-medium text-gray-700 dark:text-zinc-100">Date and time</label>
                                    <input class="bg-gray-800/5 border border-gray-100 text-gray-900 dark:text-gray-100 text-sm rounded focus:ring-violet-500 focus:border-violet-500 block w-full p-2.5 dark:bg-zinc-700/50 dark:border-zinc-600 dark:placeholder-gray-400 dark:placeholder:text-zinc-100/60 focus:ring-0" type="datetime-local" value="2019-08-19T13:45:00" id="example-email-input">
                                </div>

                            
                                <div class="mt-6">
                                    <button type="submit" class="w-full text-white bg-violet-600 border-transparent btn">Create</button>
                                </div>
                              
                               
                                
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    {{-- END NEW PROJECT MODAL --}}
                    </section>
@push('footer')


@endpush
@endSection
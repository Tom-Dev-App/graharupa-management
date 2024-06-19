@extends('components.dashboard-layout')

@section('content')
                    <div class="grid grid-cols-1 pb-6">
                        <div class="md:flex items-center justify-between px-[2px]">
                            <h4 class="text-[18px] font-medium text-gray-800 mb-sm-0 grow dark:text-gray-100 mb-2 md:mb-0">Dashboard</h4>
                            {{-- <nav class="flex" aria-label="Breadcrumb">
                                <ol class="inline-flex items-center space-x-1 ltr:md:space-x-3 rtl:md:space-x-0">
                                    <li class="inline-flex items-center">
                                        <a href="#" class="inline-flex items-center text-sm text-gray-800 hover:text-gray-900 dark:text-zinc-100 dark:hover:text-white">
                                            Dashboard
                                        </a>
                                    </li>
                                    <li>
                                        <div class="flex items-center rtl:mr-2">
                                           <i class="font-semibold text-gray-600 align-middle far fa-angle-right text-13 rtl:rotate-180 dark:text-zinc-100"></i>
                                            <a href="#" class="text-sm font-medium text-gray-500 ltr:ml-2 rtl:mr-2 hover:text-gray-900 ltr:md:ml-2 rtl:md:mr-2 dark:text-gray-100 dark:hover:text-white">Dashboard</a>
                                        </div>
                                    </li>
                                </ol>
                            </nav> --}}
                            <span></span>
                        </div>
                    </div>
                    <div class="grid grid-cols-1 gap-6 gap-y-0 2xl:gap-6 lg:grid-cols-12  min-h-screen">
                        {{-- START PROJECT TRACKER --}}
                        <div class="col-span-12 2xl:col-span-5">
                            <div class="card dark:bg-zinc-800 dark:border-zinc-600 card-h-100">
                                <div class="card-body">
                                    <div class="flex flex-wrap items-center mb-6">
                                        <h5 class="mr-2 font-medium text-gray-800 text-15 dark:text-gray-100">PROJECT PROGRESS</h5>
                                        <div class="flex gap-1 ltr:ml-auto rtl:mr-auto">
                                            <button type="button" class="px-2 py-1 font-medium text-gray-500 border-transparent btn text-[12.25px] bg-gray-50/50 hover:bg-gray-50/50 dark:hover:bg-zinc-600/800 hover:text-white focus:bg-gray-500 focus:text-white dark:bg-gray-500/10 dark:text-zinc-100 hover:bg-gray-500 dark:hover:bg-gray-200 dark:hover:text-gray-800">SEE ALL</button>
                                           
                                        </div>
                                    </div>
                                    <div class="grid grid-cols-12 2xl:gap-6 justify-items-stretch">
                                        <div class="items-center col-span-12 mr-2 md:col-span-6 justify-self-center 2xl:mr-0">
                                            {{-- CHARTS START --}}

                                            {{-- CHARTS END --}}
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        {{-- END PROJECT TRACKER --}}
                        {{-- START PROJECT TRACKER --}}
                        <div class="col-span-12 2xl:col-span-5">
                            <div class="card dark:bg-zinc-800 dark:border-zinc-600 card-h-100">
                                <div class="card-body">
                                    <div class="flex flex-wrap items-center mb-6">
                                        <h5 class="mr-2 font-medium text-gray-800 text-15 dark:text-gray-100">TASK PROGRESS</h5>
                                        <div class="flex gap-1 ltr:ml-auto rtl:mr-auto">
                                            <button type="button" class="px-2 py-1 font-medium text-gray-500 border-transparent btn text-[12.25px] bg-gray-50/50 hover:bg-gray-50/50 dark:hover:bg-zinc-600/800 hover:text-white focus:bg-gray-500 focus:text-white dark:bg-gray-500/10 dark:text-zinc-100 hover:bg-gray-500 dark:hover:bg-gray-200 dark:hover:text-gray-800">SEE ALL</button>
                                           
                                        </div>
                                    </div>
                                    <div class="grid grid-cols-12 2xl:gap-6 justify-items-stretch">
                                        <div class="items-center col-span-12 mr-2 md:col-span-6 justify-self-center 2xl:mr-0">
                                            {{-- CHARTS START --}}

                                            {{-- CHARTS END --}}
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        {{-- END PROJECT TRACKER --}}
               
                    </div>
@endSection
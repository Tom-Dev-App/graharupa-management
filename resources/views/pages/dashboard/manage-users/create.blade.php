@php
    $component = app(App\View\Components\DashboardLayout::class, ['title' => 'Create New User']);
@endphp

@extends('components.dashboard-layout')
@push('head')
<link href="{{ asset('assets/libs/datatables.net-bs4/css/dataTables.bootstrap4.min.css') }}" rel="stylesheet" type="text/css" />
<link href="{{ asset('assets/libs/datatables.net-buttons-bs4/css/buttons.bootstrap4.min.css') }}" rel="stylesheet" type="text/css" />

<!-- Responsive datatable examples -->
<link href="{{ asset('assets/libs/datatables.net-responsive-bs4/css/responsive.bootstrap4.min.css') }}" rel="stylesheet" type="text/css" />
@endPush
@section('content')

<section class="min-h-screen">
                    <div class="grid grid-cols-1 pb-6">
                        <div class="md:flex items-center justify-between px-[2px]">
                            <h4 class="text-[18px] font-medium text-gray-800 mb-sm-0 grow dark:text-gray-100 mb-2 md:mb-0">Users Data</h4>
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
                    <div class="grid grid-cols-1">
                        <div class="card dark:bg-zinc-800 dark:border-zinc-600">
                            <div class="card-body border-b border-gray-100 dark:border-zinc-600">
                                <h6 class="mb-1 text-gray-700 text-15 dark:text-gray-100">Textual inputs</h6>
                            </div>
                            <div class="card-body">
                                <div class="grid grid-cols-12 gap-x-6">
                                    <div class="col-span-12 lg:col-span-6">
                                        <div class="mb-4">
                                            <label for="example-text-input" class="block mb-2 font-medium text-gray-700 dark:text-gray-100">Text</label>
                                            <input class="w-full placeholder:text-13 text-13 py-1.5 rounded border-gray-100 focus:border focus:border-violet-50 focus:ring focus:ring-violet-500/20  dark:bg-zinc-700/50 dark:border-zinc-600 dark:placeholder:text-zinc-100 placeholder:text-gray-800 dark:text-zinc-100" type="text" placeholder="Artisanal kale" id="example-text-input">
                                        </div>
                                        <div class="mb-4">
                                            <label for="example-text-input" class="block mb-2 font-medium text-gray-700 dark:text-gray-100">Search</label>
                                            <input class="w-full placeholder:text-13 py-1.5 text-13 rounded border-gray-100 focus:border focus:border-violet-500 focus:ring focus:ring-violet-500/20 dark:bg-zinc-700/50 dark:border-zinc-600 dark:placeholder:text-zinc-100 dark:text-zinc-100" type="search" value="How do I shoot web" id="example-search-input">
                                        </div>
                                        <div class="mb-4">
                                            <label for="example-text-input" class="block mb-2 font-medium text-gray-700 dark:text-gray-100">Email</label>
                                            <input class="w-full placeholder:text-sm py-1.5 rounded border-gray-100 focus:border focus:border-violet-500 focus:ring focus:ring-violet-500/20 dark:bg-zinc-700/50 dark:border-zinc-600 dark:placeholder:text-zinc-100 dark:text-zinc-100" type="email" value="bootstrap@example.com" id="example-email-input">
                                        </div>
                                        <div class="mb-4">
                                            <label for="example-text-input" class="block mb-2 font-medium text-gray-700 dark:text-gray-100">URL</label>
                                            <input class="w-full placeholder:text-sm py-1.5 rounded border-gray-100 focus:border focus:border-violet-500 focus:ring focus:ring-violet-500/20 dark:bg-zinc-700/50 dark:border-zinc-600 dark:placeholder:text-zinc-100 dark:text-zinc-100" type="url" value="https://getbootstrap.com" id="example-email-input">
                                        </div>
                                        <div class="mb-4">
                                            <label for="example-text-input" class="block mb-2 font-medium text-gray-700 dark:text-gray-100">Telephone</label>
                                            <input class="w-full border-gray-100 rounded placeholder:text-13 text-13 py-1.5 focus:border focus:ring focus:ring-violet-500/20 focus:border-violet-100 dark:bg-zinc-700/50 dark:border-zinc-600 dark:placeholder:text-zinc-100 dark:text-zinc-100" type="tel" value="1-(555)-555-5555" id="example-email-input">
                                        </div>
                                        <div class="mb-4">
                                            <label for="example-text-input" class="block mb-2 font-medium text-gray-700 dark:text-gray-100">Password</label>
                                            <input class="w-full border-gray-100 rounded placeholder:text-13 text-13 py-1.5 focus:border focus:ring focus:ring-violet-500/20 focus:border-violet-100 dark:bg-zinc-700/50 dark:border-zinc-600 dark:placeholder:text-zinc-100 dark:text-zinc-100" type="password" value="hunter2" id="example-email-input">
                                        </div>
                                        <div class="mb-4">
                                            <label for="example-text-input" class="block mb-2 font-medium text-gray-700 dark:text-gray-100">Number</label>
                                            <input class="w-full border-gray-100 rounded placeholder:text-13 text-13 py-1.5 focus:border focus:ring focus:ring-violet-500/20 focus:border-violet-100 dark:bg-zinc-700/50 dark:border-zinc-600 dark:placeholder:text-zinc-100 dark:text-zinc-100" type="number" value="42" id="example-email-input">
                                        </div>
                                        <div class="mb-4">
                                            <label for="example-text-input" class="block mb-2 font-medium text-gray-700 dark:text-gray-100">Date and time</label>
                                            <input class="w-full border-gray-100 rounded placeholder:text-13 text-13 py-1.5 focus:border focus:ring focus:ring-violet-500/20 focus:border-violet-100 dark:bg-zinc-700/50 dark:border-zinc-600 dark:placeholder:text-zinc-100 dark:text-zinc-100" type="datetime-local" value="2019-08-19T13:45:00" id="example-email-input">
                                        </div>
                                    </div>
                                    <div class="col-span-12 lg:col-span-6">
                                        <div class="mb-4">
                                            <label for="example-text-input" class="block mb-2 font-medium text-gray-700 dark:text-gray-100">Date</label>
                                            <input class="w-full border-gray-100 rounded placeholder:text-sm focus:border focus:border-violet-500 focus:ring-0 dark:bg-zinc-700/50 dark:border-zinc-600 dark:text-zinc-100" type="date" value="2019-08-19" id="example-date-input">
                                        </div>
                                        <div class="mb-4">
                                            <label for="example-text-input" class="block mb-2 font-medium text-gray-700 dark:text-gray-100">Month</label>
                                            <input class="w-full border-gray-100 rounded placeholder:text-13 text-13 py-1.5 focus:border focus:ring focus:ring-violet-500/20 focus:border-violet-100 dark:bg-zinc-700/50 dark:border-zinc-600 dark:placeholder:text-zinc-100 dark:text-zinc-100" type="month" value="2019-08" id="example-month-input">
                                        </div>
                                        <div class="mb-4">
                                            <label for="example-text-input" class="block mb-2 font-medium text-gray-700 dark:text-gray-100">Week</label>
                                            <input class="w-full border-gray-100 rounded placeholder:text-13 text-13 py-1.5 focus:border focus:ring focus:ring-violet-500/20 focus:border-violet-100 dark:bg-zinc-700/50 dark:border-zinc-600 dark:placeholder:text-zinc-100 dark:text-zinc-100" type="week" value="2019-W33" id="example-week-input">
                                        </div>
                                        <div class="mb-4">
                                            <label for="example-text-input" class="block mb-2 font-medium text-gray-700 dark:text-gray-100">Time</label>
                                            <input class="w-full border-gray-100 rounded placeholder:text-13 text-13 py-1.5 focus:border focus:ring focus:ring-violet-500/20 focus:border-violet-100 dark:bg-zinc-700/50 dark:border-zinc-600 dark:placeholder:text-zinc-100 dark:text-zinc-100" type="time" value="13:45:00" id="example-time-input">
                                        </div>
                                        <div class="mb-4">
                                            <label for="example-text-input" class="block mb-2 font-medium text-gray-700 dark:text-gray-100">Color picker</label>
                                            <input class="h-10 p-1 text-sm text-gray-500 bg-transparent border border-gray-100 rounded focus:border focus:border-violet-500 focus:ring-0 dark:bg-zinc-700/50 dark:border-zinc-600 dark:text-zinc-100 w-14" type="color" value="#5156be" id="example-color-input">
                                        </div>
                                        <div class="mb-4">
                                            <div class="mb-3">
                                                <label class="block mb-2 font-medium text-gray-700 dark:text-zinc-100">Select</label>
                                                <select class="dark:bg-zinc-800 dark:border-zinc-700 w-full rounded border-gray-100 py-2.5 text-sm text-gray-500 focus:border focus:border-violet-500 focus:ring-0 dark:bg-zinc-700/50 dark:text-zinc-100">
                                                    <option>Select</option>
                                                    <option>Large select</option>
                                                    <option>Small select</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="mb-4">
                                            <label for="example-text-input" class="block mb-2 font-medium text-gray-700 dark:text-zinc-100">Date and time</label>
                                            <input class="w-full border-gray-100 rounded placeholder:text-13 text-13 py-1.5 focus:border focus:ring focus:ring-violet-500/20 focus:border-violet-100 dark:bg-zinc-700/50 dark:border-zinc-600 dark:placeholder:text-zinc-100 dark:text-zinc-100" type="datetime-local" value="2019-08-19T13:45:00" id="example-email-input">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </section>
@push('footer')
<!-- Include DataTables CSS and JS -->
<script src="https://code.jquery.com/jquery-3.5.1.js"></script>
@endSection
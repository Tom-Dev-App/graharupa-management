@php
    $component = app(App\View\Components\DashboardLayout::class, ['title' => 'Dashboard User']);
@endphp

@extends('components.dashboard-layout')
@push('head')
{{-- <link href="{{ asset('assets/libs/datatables.net-bs4/css/dataTables.bootstrap4.min.css') }}" rel="stylesheet" type="text/css" /> --}}
<link href="{{ asset('assets/libs/datatables.net-buttons-bs4/css/dataTables.bootstrap4.min.css') }}" rel="stylesheet" type="text/css" />

<!-- Responsive datatable examples -->
<link href="{{ asset('assets/libs/datatables.net-responsive-bs4/css/responsive.bootstrap4.min.css') }}" rel="stylesheet" type="text/css" />

@endPush
@section('content')

<section class="min-h-screen">
                    <div class="grid grid-cols-1 pb-6">
                        <div class="md:flex items-center justify-between px-[2px]">
                            
                                <a href="{{ route('dashboard.index') }}" class="border-0 btn text-violet-500">
                                    <i class="mr-1 mdi mdi-arrow-left"></i> Back
                                </a>
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
                            @can('admin')
                            <a href="{{ route('users.create') }}" class="btn text-violet-500 bg-violet-50 border-violet-50 hover:text-white hover:bg-violet-600 hover:border-violet-600 focus:text-white focus:bg-violet-600 focus:border-violet-600 focus:ring focus:ring-violet-500/30 active:bg-violet-600 active:border-violet-600 dark:focus:ring-violet-500/10 dark:bg-violet-500/20 dark:border-transparent">
                                <i data-feather="user-plus" fill="#545a6d33" class="inline"></i> 
                                <span class="ml-1">Add User</span></a>
                            @endcan
                        </div>
                    </div>
                    @if(session()->has('success'))
                        <div class="grid grid-cols-1">
                            <div class="card-body">
                                <div class="space-y-4">
                                    <div class="flex items-center rounded bg-green-50 alert-dismissible">
                                        <div class="relative w-12 h-12 text-center bg-green-400 ltr:rounded-l rtl:rounded-r">
                                            <div class="after:content-[''] after:border-[6px] after:border-transparent ltr:after:border-l-green-400 rtl:after:border-r-green-400 after:absolute ltr:after:-right-3 rtl:after:-left-3 after:top-[1.15rem]"></div>
                                            <i class="mdi mdi-check-all align-middle text-white leading-[3.5]"></i>
                                        </div>
                                        <p class="text-green-700 ltr:ml-4 rtl:mr-4">{{ session('success') }}</p>
                                        <button class="text-lg alert-close ltr:ml-auto rtl:mr-auto text-zinc-500 ltr:pr-5 rtl:pl-5"><i class="mdi mdi-close"></i></button>
                                    </div>
                            </div>
                        </div>

                       
                           
                        @endif
                        @if(session()->has('error'))
                        <div class="grid grid-cols-1">
                            <div class="card-body">
                                <div class="space-y-4">
                                    <div class="flex items-center rounded bg-red-50 alert-dismissible">
                                        <div class="relative w-12 h-12 text-center bg-red-400 ltr:rounded-l rtl:rounded-r">
                                            <div class="after:content-[''] after:border-[6px] after:border-transparent ltr:after:border-l-red-400 rtl:after:border-r-red-400 after:absolute ltr:after:-right-3 rtl:after:-left-3 after:top-[1.15rem]"></div>
                                            <i class="mdi mdi-check-all align-middle text-white leading-[3.5]"></i>
                                        </div>
                                        <p class="text-red-700 ltr:ml-4 rtl:mr-4">{{ session('error') }}</p>
                                        <button class="text-lg alert-close ltr:ml-auto rtl:mr-auto text-zinc-500 ltr:pr-5 rtl:pl-5"><i class="mdi mdi-close"></i></button>
                                   
                                </div>
                            </div>
                        </div>
                        
                        @endif
                    <div class="grid grid-cols-12 gap-6">
                        {{-- COTENT START HERE --}}
                        {{-- ALERT --}}
                        
                        {{-- END ALERT --}}

                       {{-- @dd($users) --}}
                       <div class="col-span-12 xl:col-span-8">
                        <div class="card dark:bg-zinc-800 dark:border-zinc-600">
                            <div class="card-body border-b border-gray-100 dark:border-zinc-600">
                                <h6 class="mb-1 text-gray-700 text-15 dark:text-gray-100">Users Table</h6>
                            </div>
                            <div class="card-body">
                                <div class="relative overflow-x-auto">
                                    <table class="w-full text-sm text-left text-gray-500 ">
                                        <thead class="text-sm text-gray-700 dark:text-gray-100">
                                            <tr class="border border-gray-50 dark:border-zinc-600">
                                                <th scope="col" class="px-6 py-3 border-l border-gray-50 dark:border-zinc-600">
                                                    #
                                                </th>
                                                <th scope="col" class="px-6 py-3 border-l border-gray-50 dark:border-zinc-600">
                                                    Name
                                                </th>
                                                <th scope="col" class="px-6 py-3 border-l border-gray-50 dark:border-zinc-600">
                                                    Email
                                                </th>
                                                <th scope="col" class="px-6 py-3 border-l border-gray-50 dark:border-zinc-600">
                                                    Role
                                                </th>
                                                <th scope="col" class="px-6 py-3 border-l border-gray-50 dark:border-zinc-600">
                                                    Status
                                                </th>
                                                @can('admin')
                                                <th scope="col" class="px-6 py-3 border-l border-gray-50 dark:border-zinc-600">
                                                    Action
                                                </th>
                                                @endcan
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @if ($users->count() > 0)
                                            @foreach ($users as $user)
                                                <tr class="bg-white border border-gray-50 dark:border-zinc-600 dark:bg-transparent">
                                                    <th scope="row" class="px-6 py-3.5 border-l border-gray-50 dark:border-zinc-600 font-medium text-gray-900 whitespace-nowrap dark:text-zinc-100">
                                                        {{ $loop->index + 1 }}
                                                    </th>
                                                    <td class="px-6 py-3.5 border-l border-gray-50 dark:border-zinc-600 dark:text-zinc-100">
                                                        {{ $user->name }}
                                                    </td>
                                                    <td class="px-6 py-3.5 border-l border-gray-50 dark:border-zinc-600 dark:text-zinc-100">
                                                        {{ $user->email }}
                                                    </td>
                                                    <td class="px-6 py-3.5 border-l border-gray-50 dark:border-zinc-600 dark:text-zinc-100">
                                                        {{ $user->role->name }}
                                                    </td>
                                                    <td class="px-6 py-3.5 border-l border-gray-50 dark:border-zinc-600 dark:text-zinc-100">
                                                        @if ($user->deleted_at)
                                                            <span class="badge font-medium bg-red-50 text-red-500 text-11 px-1.5 py-[1.5px] rounded dark:bg-red-500/20">Suspended</span>
                                                        @else
                                                            <span class="badge font-medium bg-green-50 text-green-500 text-11 px-1.5 py-[1.5px] rounded dark:bg-green-500/20">Active</span>
                                                        @endif
                                                    </td>
                                                    @can('admin')
                                                        <td class="px-6 py-3.5 border-l border-gray-50 dark:border-zinc-600 dark:text-zinc-100">
                                                            <a href="{{ route('users.edit', $user->id) }}"
                                                               class="btn text-violet-500 bg-violet-50 border-violet-50 hover:text-white hover:bg-violet-600 hover:border-violet-600 focus:text-white focus:bg-violet-600 focus:border-violet-600 focus:ring focus:ring-violet-500/30 active:bg-violet-600 active:border-violet-600 dark:focus:ring-violet-500/10 dark:bg-violet-500/20 dark:border-transparent">Edit</a>
                                                        </td>
                                                    @endcan
                                                </tr>
                                            @endforeach
                                        @else
                                            <tr class="bg-gray-50/60 dark:bg-zinc-600/50">
                                                <th scope="row" class="px-6 py-3.5 font-medium text-gray-900 whitespace-nowrap dark:text-zinc-100 text-center" colspan="6">
                                                    There are no users available.
                                                </th>
                                            </tr>
                                        @endif
                                        
                                        </tbody>
                                    </table>
                                      <!-- Pagination Links -->
                                      <div class="mt-4">
                                        {{ $users->links('vendor.pagination.custom-pagination') }}
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                        {{-- COTENT START END HERE --}}
                    </div>
                    </section>
@push('footer')



@endPush
@endSection
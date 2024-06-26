@php
    $component = app(App\View\Components\DashboardLayout::class, ['title' => 'Create User']);
@endphp

@extends('components.dashboard-layout')
@push('head')


@endPush
@section('content')

<section class="min-h-screen">
                    <div class="grid grid-cols-1 pb-6">
                        <div class="md:flex items-center justify-between px-[2px] gap-3">
                            <a href="{{ route('users.index') }}" class="border-0 btn text-violet-500">
                                <i class="mr-1 mdi mdi-arrow-left"></i> Back
                            </a>
                            <h4 class="text-[18px] font-medium text-gray-800 mb-sm-0 grow dark:text-gray-100 mb-2 md:mb-0">Create New User Account</h4>
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
                    <div class="grid grid-cols-12 gap-6">
                        {{-- COTENT START HERE --}}
                        <div class="col-span-12 lg:col-span-6">
                            <div class="card-body">
                                {{-- START EDIT DATA USER --}}
                                <div>
                                    <form class="mt-6" action="{{ route('users.store') }}" method="POST">
                                        @csrf
                                        <div class="mb-3">
                                            <label class="font-medium text-gray-700 dark:text-zinc-100" for="formrow-firstname-input">Fullname</label>
                                            <input type="text" class="w-full mt-2 py-1.5 placeholder:text-sm border-gray-100 rounded focus:border focus:border-violet-100 focus:ring focus:ring-violet-500/20 dark:bg-zinc-700/50 dark:border-zinc-600 dark:placeholder:text-zinc-100 dark:text-zinc-100" id="formrow-firstname-input" placeholder="Enter fullname">
                                        </div>

                                        <div class="grid grid-cols-12 gap-6">
                                            <div class="col-span-12 lg:col-span-6">
                                                <div class="mb-3">
                                                    <label class="font-medium text-gray-700 dark:text-zinc-100" for="formrow-email-input">Email</label>
                                                    <input type="email" class="w-full mt-2 py-1.5 placeholder:text-sm border-gray-100 rounded focus:border focus:border-violet-100 focus:ring focus:ring-violet-500/20 dark:bg-zinc-700/50 dark:border-zinc-600 dark:placeholder:text-zinc-100 dark:text-zinc-100 " id="formrow-email-input" placeholder="Enter your Email">
                                                </div>
                                            </div>
                                            <div class="col-span-12 lg:col-span-6">
                                                <div class="mb-3">
                                                    <label class="font-medium text-gray-700 dark:text-zinc-100" for="formrow-password-input">Password</label>
                                                    <input type="password" class="w-full mt-2 py-1.5 placeholder:text-sm border-gray-100 rounded focus:border focus:border-violet-100 focus:ring focus:ring-violet-500/20 dark:bg-zinc-700/50 dark:border-zinc-600 dark:placeholder:text-zinc-100 dark:text-zinc-100" id="formrow-password-input" placeholder="Enter your password">
                                                </div>
                                            </div>
                                        </div>
                                        
                                        <div>
                                            <label class="block mb-3 font-medium text-gray-700 dark:text-zinc-100">Select Role As</label>
                                            <select name="role_id" class="dark:bg-zinc-800 dark:border-zinc-700 rounded border-gray-100 py-2.5 text-sm text-gray-500 focus:border focus:border-violet-500 focus:ring-0 dark:bg-zinc-700/50 dark:text-zinc-100">
                                                @foreach($roles as $role)
                                                @if ($role->id = 3)
                                                    <option value="{{ $role->id }}" selected>
                                                        {{ $role->name }}
                                                    </option>
                                                @else
                                                    <option value="{{ $role->id }}">
                                                        {{ $role->name }}
                                                    </option>
                                                @endif
                                            @endforeach
                                            </select>
                                        </div>

                                        <div class="mt-6 inline-flex gap-4">
                                            <a href="{{ route('users.index') }}" class="text-gray-800 btn bg-gray-50 border-gray-50 focus:bg-gray-300 focus:border-gray-300 focus:ring focus:ring-gray-500/30 active:bg-gray-300 active:border-gray-300">Cancel</a>

                                            <button type="submit" class="font-medium text-white border-transparent btn bg-violet-500 w-28 hover:bg-violet-700 focus:bg-violet-700 focus:ring focus:ring-violet-50">Save</button>
                                        </div>
                                    </form>
                                </div>
                                {{-- END EDIT DATA USER --}}
                                
                            </div>
                        </div>
                        {{-- COTENT START END HERE --}}
                    </div>
                    </section>
@push('footer')

@endPush
@endSection
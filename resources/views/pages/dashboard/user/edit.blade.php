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
                           

                            <h4 class="text-[18px] font-medium text-gray-800 mb-sm-0 grow dark:text-gray-100 mb-2 md:mb-0">Edit User Account</h4>
                           
                            <span></span>
                        </div>
                    </div>
                    <div class="grid grid-cols-12 gap-6">
                        {{-- COTENT START HERE --}}
                        <div class="col-span-12 lg:col-span-6">
                            <div class="card-body">
                                <h5 class="text-xl text-gray-700 dark:text-gray-100">
                                    Change User Data
                                  </h5>
                                <div>
                                    <form class="mt-3" action="{{ route('users.update', $user->id) }}" method="POST">
                                        @csrf
                                        <div class="mb-3">
                                            <label class="font-medium text-gray-700 dark:text-zinc-100" for="formrow-firstname-input">Fullname</label>
                                            <input type="text" class="w-full mt-2 py-1.5 placeholder:text-sm border-gray-100 rounded focus:border focus:border-violet-100 focus:ring focus:ring-violet-500/20 dark:bg-zinc-700/50 dark:border-zinc-600 dark:placeholder:text-zinc-100 dark:text-zinc-100" id="formrow-firstname-input" placeholder="Enter fullname" value="{{ old('name' ,$user->name) }}" name="name">
                                        </div>

                                        <div class="grid grid-cols-12 gap-6">
                                            <div class="col-span-12 lg:col-span-6">
                                                <div class="mb-3">
                                                    <label class="font-medium text-gray-700 dark:text-zinc-100" for="formrow-email-input">Email</label>
                                                    <input type="email" class="w-full mt-2 py-1.5 placeholder:text-sm border-gray-100 rounded focus:border focus:border-violet-100 focus:ring focus:ring-violet-500/20 dark:bg-zinc-700/50 dark:border-zinc-600 dark:placeholder:text-zinc-100 dark:text-zinc-100 " id="formrow-email-input" placeholder="Enter your Email" value="{{ old('email' ,$user->email) }}" name="email">
                                                </div>
                                            </div>
                                            <div class="col-span-12 lg:col-span-6">
                                                <div class="mb-3">
                                                    <label class="font-medium text-gray-700 dark:text-zinc-100" for="formrow-password-input">Password</label>
                                                    <input type="password" class="w-full mt-2 py-1.5 placeholder:text-sm border-gray-100 rounded focus:border focus:border-violet-100 focus:ring focus:ring-violet-500/20 dark:bg-zinc-700/50 dark:border-zinc-600 dark:placeholder:text-zinc-100 dark:text-zinc-100" id="formrow-password-input" placeholder="Enter your password" value="{{ old('password') }}" name="password">
                                                </div>
                                            </div>
                                        </div>
                                       
                                        <div class="mt-6 inline-flex gap-4">
                                            <a href="{{ route('users.index') }}" class="text-gray-800 btn bg-gray-50 border-gray-50 focus:bg-gray-300 focus:border-gray-300 focus:ring focus:ring-gray-500/30 active:bg-gray-300 active:border-gray-300">Cancel</a>

                                            <button type="submit" class="font-medium text-white border-transparent btn bg-violet-500 w-28 hover:bg-violet-700 focus:bg-violet-700 focus:ring focus:ring-violet-50">Change</button>
                                        </div>
                                    </form>
                                </div>
                              
                            </div>
                        </div>
                        {{-- COTENT START END HERE --}}
                    </div>
                    
                    <div class="col-span-6 lg:col-span-6">
                        <div class="card-body">
                            <h5 class="text-xl text-gray-700 dark:text-gray-100">
                                Change User Role
                              </h5>
                            
                                {{-- START CHANGE ROLE --}}
                                <div>
                                    <form class="mt-3" action="{{ route('users.update', $user->id) }}" method="POST">
                                        @csrf
                                <div>
                                    <label class="block mb-2 font-medium text-gray-700 dark:text-zinc-100">Select</label>
                                    <select name="role_id" class="dark:bg-zinc-800 dark:border-zinc-700 rounded border-gray-100 py-2.5 text-sm text-gray-500 focus:border focus:border-violet-500 focus:ring-0 dark:bg-zinc-700/50 dark:text-zinc-100">
                                        @foreach($roles as $role)
                                        @if ($user->roles->contains('id', $role->id))
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

                                    <button type="submit" class="font-medium text-white border-transparent btn bg-violet-500 w-28 hover:bg-violet-700 focus:bg-violet-700 focus:ring focus:ring-violet-50">Change</button>
                                </div>
                                    </form>
                                </div>
                                {{-- END CHANGE ROLE --}}
                        </div>
                    </div>

                    
                    <div class="col-span-6 lg:col-span-6">
                        <div class="card-body">
                            <h5 class="text-xl text-gray-700 dark:text-gray-100">
                                Change User Status
                            </h5>
                            
                            {{-- START USER STATUS --}}
                            <div>
                                {{-- <form class="mt-3" action="{{ $user->is_deleted ? route('users.restore', $user->id) : route('users.suspend', $user->id) }}" method="POST">
                                    @csrf
                                    <div>
                                        <label class="block mb-2 font-medium text-gray-700 dark:text-zinc-100">Status</label>
                                        <select name="status" class="dark:bg-zinc-800 dark:border-zinc-700 rounded border-gray-100 py-2.5 text-sm text-gray-500 focus:border focus:border-violet-500 focus:ring-0 dark:bg-zinc-700/50 dark:text-zinc-100">
                                            <option value="active" {{ $user->is_deleted ? 'SUSPENDED' : '' }}>Active</option>
                                            <option value="inactive" {{ !$user->is_deleted ? 'SUSPENDED' : '' }}>Suspended</option>
                                        </select>
                                    </div>
                                    <div class="mt-6 inline-flex gap-4">
                                        <a href="{{ route('users.index') }}" class="text-gray-800 btn bg-gray-50 border-gray-50 focus:bg-gray-300 focus:border-gray-300 focus:ring focus:ring-gray-500/30 active:bg-gray-300 active:border-gray-300">Cancel</a>

                                        <button type="submit" class="font-medium text-white border-transparent btn bg-violet-500 w-28 hover:bg-violet-700 focus:bg-violet-700 focus:ring focus:ring-violet-50">Change</button>
                                    </div>
                                </form> --}}
                                <div class="mt-3">
                                    @if($user->is_deleted)
                                        <button type="button" class="text-white btn bg-green-500 border-green-500 hover:bg-green-600 focus:ring ring-green-50 focus:bg-green-600" data-tw-toggle="modal" data-tw-target="#modal-user-status">Activate</button>
                                    @else
                                        <button type="button" class="text-white btn bg-red-500 border-red-500 hover:bg-red-600 focus:ring ring-red-50 focus:bg-red-600" data-tw-toggle="modal" data-tw-target="#modal-user-status">Suspend</button>
                                    @endif
                                </div>
                            </div>
                            {{-- END USER STATUS --}}

                          
                                    <div class="card-body">
                                       
                                        <div class="relative z-50 hidden modal" id="modal-user-status" aria-labelledby="modal-title" role="dialog" aria-modal="true">
                                            <div class="fixed inset-0 z-50 overflow-hidden">
                                                <div class="absolute inset-0 transition-opacity bg-black bg-opacity-50"></div>
                                                <div class="flex items-end justify-center min-h-screen p-4 text-center animate-translate sm:items-center sm:p-0">
                                                    <div class="relative overflow-hidden text-left transition-all transform bg-white rounded-lg shadow-xl -top-10 sm:my-8 sm:w-full sm:max-w-lg dark:bg-zinc-700">
                                                        <div class="p-5 text-center bg-white dark:bg-zinc-700">
                                                            @if (!$user->is_deleted)
                                                            <div class="mx-auto bg-red-100 rounded-full h-14 w-14">
                                                                <i class="mdi mdi-trash-can text-2xl text-red-600 leading-[2.4]"></i>
                                                            </div>
                                                            <h2 class="mt-5 text-xl text-gray-700 dark:text-gray-100">Suspend User Account?</h2>
                                                            <p class="mt-2 text-gray-500 dark:text-zinc-100/60">By suspending user account the user will not be able to use this account?</p>
                                                            <div class="justify-center px-4 py-3 mt-5 border-gray-50 sm:flex sm:px-6">
                                                                <button type="button" class="inline-flex justify-center w-full px-4 py-2 mt-3 text-base font-medium text-gray-700 bg-white border border-gray-300 rounded-md shadow-sm btn dark:text-gray-100 hover:bg-gray-50/50 focus:outline-none focus:ring-2 focus:ring-gray-500/30 sm:mt-0 sm:ml-3 sm:w-auto sm:text-sm dark:bg-zinc-700 dark:border-zinc-600 dark:hover:bg-zinc-600 dark:focus:bg-zinc-600 dark:focus:ring-zinc-700 dark:focus:ring-gray-500/20" data-tw-dismiss="modal">Cancel</button>
                                                                <button type="button" class="inline-flex justify-center w-full px-4 py-2 text-base font-medium text-white bg-red-500 border border-transparent rounded-md shadow-sm btn hover:bg-red-600 focus:outline-none focus:ring-2 focus:ring-red-500 sm:ml-3 sm:w-auto sm:text-sm">Suspend</button>
                                                            </div>
                                                            @else
                                                            <div class="mx-auto bg-green-100 rounded-full h-14 w-14">
                                                                <i class="mdi mdi-delete-restore text-2xl text-green-600 leading-[2.4]"></i>
                                                            </div>
                                                            <h2 class="mt-5 text-xl text-gray-700 dark:text-gray-100">Restore User Account?</h2>
                                                            <p class="mt-2 text-gray-500 dark:text-zinc-100/60">By restoring account the user will be able to use this account?</p>
                                                            <div class="justify-center px-4 py-3 mt-5 border-gray-50 sm:flex sm:px-6">
                                                                <button type="button" class="inline-flex justify-center w-full px-4 py-2 mt-3 text-base font-medium text-gray-700 bg-white border border-gray-300 rounded-md shadow-sm btn dark:text-gray-100 hover:bg-gray-50/50 focus:outline-none focus:ring-2 focus:ring-gray-500/30 sm:mt-0 sm:ml-3 sm:w-auto sm:text-sm dark:bg-zinc-700 dark:border-zinc-600 dark:hover:bg-zinc-600 dark:focus:bg-zinc-600 dark:focus:ring-zinc-700 dark:focus:ring-gray-500/20" data-tw-dismiss="modal">Cancel</button>
                                                                <button type="button" class="inline-flex justify-center w-full px-4 py-2 text-base font-medium text-white bg-green-500 border border-transparent rounded-md shadow-sm btn hover:bg-green-600 focus:outline-none focus:ring-2 focus:ring-green-500 sm:ml-3 sm:w-auto sm:text-sm">Activate</button>
                                                            </div>
                                                            @endif
                                                            
                                                            
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                               
                    </div>
                    </section>
@push('footer')

@endPush
@endSection
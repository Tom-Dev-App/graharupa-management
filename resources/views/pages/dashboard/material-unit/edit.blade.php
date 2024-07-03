@php
    $component = app(App\View\Components\DashboardLayout::class, ['title' => 'Dashbord Material Umit']);
@endphp

@extends('components.dashboard-layout')
@push('head')


@endPush
@section('content')

<section class="min-h-screen">
                    <div class="grid grid-cols-1 pb-6">
                        <div class="md:flex items-center justify-between px-[2px] gap-3">
                            <a href="{{ route('unit.index') }}" class="border-0 btn text-violet-500">
                                <i class="mr-1 mdi mdi-arrow-left"></i> Back
                            </a>
                           

                            <h4 class="text-[18px] font-medium text-gray-800 mb-sm-0 grow dark:text-gray-100 mb-2 md:mb-0">Edit Material Unit</h4>
                           
                            <span></span>
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
                                        <i class="mdi mdi-alert align-middle text-white leading-[3.5]"></i>
                                    </div>
                                    <p class="text-red-700 ltr:ml-4 rtl:mr-4">{{ session('error') }}</p>
                                    <button class="text-lg alert-close ltr:ml-auto rtl:mr-auto text-zinc-500 ltr:pr-5 rtl:pl-5"><i class="mdi mdi-close"></i></button>
                               
                            </div>
                        </div>
                    </div>
                    
                    @endif
                    <div class="grid grid-cols-12 gap-6">
                        {{-- COTENT START HERE --}}
                      
                        <div class="col-span-12 lg:col-span-6">
                            <div class="card-body">
                                <h5 class="text-xl text-gray-700 dark:text-gray-100">
                                    Change Material Unit Data
                                  </h5>
                                <div>
                                    <form class="mt-3" action="{{ route('unit.update', $materialUnit->id) }}" method="POST">
                                        @csrf
                                        @method('put')
                                        <div class="mb-3">
                                            <label class="font-medium text-gray-700 dark:text-zinc-100" for="formrow-firstname-input">Name</label>
                                            <input type="text" class="w-full mt-2 py-1.5 placeholder:text-sm border-gray-100 rounded focus:border focus:border-violet-100 focus:ring focus:ring-violet-500/20 dark:bg-zinc-700/50 dark:border-zinc-600 dark:placeholder:text-zinc-100 dark:text-zinc-100" id="formrow-firstname-input" placeholder="Enter fullname" value="{{ old('name' ,$materialUnit->name) }}" name="name">
                                            @error('name')
                                            <div>
                                                <span class="text-red-500 text-sm">{{ $message }}</span>
                                            </div>
                                            @enderror
                                        </div>

                                        <div class="grid grid-cols-12 gap-6">
                                            <div class="col-span-12 lg:col-span-6">
                                                <div class="mb-3">
                                                    <label class="font-medium text-gray-700 dark:text-zinc-100" for="unit">Unit</label>
                                                    <input type="text" class="w-full mt-2 py-1.5 placeholder:text-sm border-gray-100 rounded focus:border focus:border-violet-100 focus:ring focus:ring-violet-500/20 dark:bg-zinc-700/50 dark:border-zinc-600 dark:placeholder:text-zinc-100 dark:text-zinc-100 " id="unit" placeholder="Enter your Unit" value="{{ old('unit' ,$materialUnit->unit) }}" name="unit">
                                                </div>
                                                @error('unit')
                                                    <span class="text-red-500 text-sm">{{ $message }}</span>
                                                @enderror
                                            </div>
                                            
                                        </div>
                                      
                                        <div class="mt-6 inline-flex gap-4">
                                            <a href="{{ route('unit.index') }}" class="text-gray-800 btn bg-gray-50 border-gray-50 focus:bg-gray-300 focus:border-gray-300 focus:ring focus:ring-gray-500/30 active:bg-gray-300 active:border-gray-300">Cancel</a>

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
                               Delete Unit?
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
                                    @if($materialUnit->trashed())
                                    <button type="button" class="text-white btn bg-green-500 border-green-500 hover:bg-green-600 focus:ring ring-green-50 focus:bg-green-600" data-tw-toggle="modal" data-tw-target="#modal-user-status">Restore</button>
                                    @else
                                    <button type="button" class="text-white btn bg-red-500 border-red-500 hover:bg-red-600 focus:ring ring-red-50 focus:bg-red-600" data-tw-toggle="modal" data-tw-target="#modal-user-status">Delete</button>
                                    @endif
                                </div>
                            </div>
                            {{-- END USER STATUS --}}

                            <div class="card-body">
                                <form action="{{ $materialUnit->trashed() ? route('unit.restore', $materialUnit->id) : route('unit.delete', $materialUnit->id) }}" method="POST">
                                    @csrf
                                    <div class="relative z-50 hidden modal" id="modal-user-status" aria-labelledby="modal-title" role="dialog" aria-modal="true">
                                        <div class="fixed inset-0 z-50 overflow-hidden">
                                            <div class="absolute inset-0 transition-opacity bg-black bg-opacity-50"></div>
                                            <div class="flex items-end justify-center min-h-screen p-4 text-center animate-translate sm:items-center sm:p-0">
                                                <div class="relative overflow-hidden text-left transition-all transform bg-white rounded-lg shadow-xl -top-10 sm:my-8 sm:w-full sm:max-w-lg dark:bg-zinc-700">
                                                    <div class="p-5 text-center bg-white dark:bg-zinc-700">
                                                        @if ($materialUnit->trashed())
                                                            <div class="mx-auto bg-green-100 rounded-full h-14 w-14">
                                                                <i class="mdi mdi-delete-restore text-2xl text-green-600 leading-[2.4]"></i>
                                                            </div>
                                                            <h2 class="mt-5 text-xl text-gray-700 dark:text-gray-100">Restore Material Unit?</h2>
                                                            <p class="mt-2 text-gray-500 dark:text-zinc-100/60">By restoring the material Unit, the user will be able to use this unit.</p>
                                                            <div class="justify-center px-4 py-3 mt-5 border-gray-50 sm:flex sm:px-6">
                                                                <button type="button" class="inline-flex justify-center w-full px-4 py-2 mt-3 text-base font-medium text-gray-700 bg-white border border-gray-300 rounded-md shadow-sm btn dark:text-gray-100 hover:bg-gray-50/50 focus:outline-none focus:ring-2 focus:ring-gray-500/30 sm:mt-0 sm:ml-3 sm:w-auto sm:text-sm dark:bg-zinc-700 dark:border-zinc-600 dark:hover:bg-zinc-600 dark:focus:bg-zinc-600 dark:focus:ring-zinc-700 dark:focus:ring-gray-500/20" data-tw-dismiss="modal">Cancel</button>
                                                                <button type="submit" class="inline-flex justify-center w-full px-4 py-2 text-base font-medium text-white bg-green-500 border border-transparent rounded-md shadow-sm btn hover:bg-green-600 focus:outline-none focus:ring-2 focus:ring-green-500 sm:ml-3 sm:w-auto sm:text-sm">Restore</button>
                                                            </div>
                                                        @else
                                                            <div class="mx-auto bg-red-100 rounded-full h-14 w-14">
                                                                <i class="mdi mdi-trash-can text-2xl text-red-600 leading-[2.4]"></i>
                                                            </div>
                                                            <h2 class="mt-5 text-xl text-gray-700 dark:text-gray-100">Delete material unit?</h2>
                                                            <p class="mt-2 text-gray-500 dark:text-zinc-100/60">By deleting the material unit, the user will not be able to use this unit.</p>
                                                            <div class="justify-center px-4 py-3 mt-5 border-gray-50 sm:flex sm:px-6">
                                                                <button type="button" class="inline-flex justify-center w-full px-4 py-2 mt-3 text-base font-medium text-gray-700 bg-white border border-gray-300 rounded-md shadow-sm btn dark:text-gray-100 hover:bg-gray-50/50 focus:outline-none focus:ring-2 focus:ring-gray-500/30 sm:mt-0 sm:ml-3 sm:w-auto sm:text-sm dark:bg-zinc-700 dark:border-zinc-600 dark:hover:bg-zinc-600 dark:focus:bg-zinc-600 dark:focus:ring-zinc-700 dark:focus:ring-gray-500/20" data-tw-dismiss="modal">Cancel</button>
                                                                <button type="submit" class="inline-flex justify-center w-full px-4 py-2 text-base font-medium text-white bg-red-500 border border-transparent rounded-md shadow-sm btn hover:bg-red-600 focus:outline-none focus:ring-2 focus:ring-red-500 sm:ml-3 sm:w-auto sm:text-sm">Delete</button>
                                                            </div>
                                                        @endif
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </form>
                            </div>
                            
                               
                    </div>
                    </section>
@push('footer')

@endPush
@endSection
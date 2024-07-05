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
                            <a href="{{ route('tasks.detail', ['pid' => $task->project_id, 'id' => $task->id]) }}" class="border-0 btn text-violet-500">
                                <i class="mr-1 mdi mdi-arrow-left"></i> Back
                            </a>
                           

                            <h4 class="text-[18px] font-medium text-gray-800 mb-sm-0 grow dark:text-gray-100 mb-2 md:mb-0">Edit Task</h4>
                           
                            <span></span>
                        </div>
                    </div>
                    <div>

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
                </div>

                    <div class="grid grid-cols-12 gap-6">
                        {{-- COTENT START HERE --}}
                      
                        <div class="col-span-12 lg:col-span-6">
                            <div class="card-body">
                                <h5 class="text-xl text-gray-700 dark:text-gray-100">
                                    Change Task Information
                                  </h5>
                                <div>
                                    <form class="mt-3" action="{{ route('tasks.update', ['pid' => $task->project->id, 'id' => $task->id]) }}" method="POST">
                                        @csrf
                                        @method('put')
                                       {{-- status --}}
                                        <div class="mb-3">
                                            <label class="block mb-2 font-medium text-gray-900 dark:text-gray-100">Select Status</label>
                                            <select name="status" class="dark:bg-zinc-800 dark:border-zinc-700 rounded border-gray-100 py-2.5 text-sm text-gray-500 focus:border focus:border-violet-500 focus:ring-0 dark:bg-zinc-700/50 dark:text-zinc-100">
                                                @foreach($statuses as $status)
                                                @if ($task->status_id === $status->id)
                                                    <option value="{{ $status->id }}" selected>
                                                            {{ $status->name }}
                                                    </option>
                                                @else
                                                    <option value="{{ $status->id }}">
                                                        {{ $status->name }}
                                                    </option>
                                                @endif
                                            @endforeach
                                            </select>
                                            @error('status')
                                            <span class="text-red-500 text-sm">{{ $message }}</span>
                                        @enderror
                                        </div>
                                        {{-- end status --}}

                                        {{-- date --}}
                                        {{-- <div>
                                            <div class="mb-3">
                                                <label class="font-medium text-gray-900 dark:text-gray-100" for="unit">Date</label>
                                                <input type="datetime-local"  class="w-full mt-2 py-1.5 placeholder:text-sm border-gray-100 rounded focus:border focus:border-violet-100 focus:ring focus:ring-violet-500/20 dark:bg-zinc-700/50 dark:border-zinc-600 dark:placeholder:text-zinc-100 dark:text-zinc-100 " id="unit" name="datetime">
                                            </div>
                                                @error('datetime')
                                                <div>
                                                    <span class="text-red-500 text-sm">{{ $message }}</span>
                                                </div>
                                                @enderror
                                        </div> --}}
                                        
                                        {{-- end date --}}
                                        {{-- start desc --}}
                                        <div>
                                            <label for="task_description" class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-100 ltr:text-left rtl:text-right">Task Description</label>
                                            <textarea  id="task_description" cols="30" rows="10" 
                                            class="bg-gray-800/5 border border-gray-100 text-gray-900 dark:text-gray-100 text-sm rounded focus:ring-violet-500 focus:border-violet-500 block w-full p-2.5 dark:bg-zinc-700/50 dark:border-zinc-600 dark:placeholder-gray-400 dark:placeholder:text-zinc-100/60 focus:ring-0" placeholder="Short brief description" name="description">{{ old('description', $task->description) }} </textarea>
                                            
                                            @error('description')
                                                <div>
                                                    <span class="text-sm text-red-500">{{ $message }}</span>
                                                </div>
                                            @enderror
                                                
                                        </div>
                                        {{-- edn desc --}}
                                        <div class="mt-6 inline-flex gap-4">
                                            <button type="submit" class="font-medium text-white border-transparent btn bg-violet-500 w-28 hover:bg-violet-700 focus:bg-violet-700 focus:ring focus:ring-violet-50">Save</button>
                                        </div>
                                    </form>
                                </div>
                              
                            </div>
                        </div>
                        {{-- COTENT START END HERE --}}
                    </div>

                    </section>

                    @push('footer')


                    @endPush
@endSection
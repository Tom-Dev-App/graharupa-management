@php
    $component = app(App\View\Components\DashboardLayout::class, ['title' => 'Dashboard']);
@endphp

@extends('components.dashboard-layout')
@section('content')
<section class="min-h-screen">
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
                    <div class="grid grid-cols-1 gap-6 gap-y-0 2xl:gap-6 lg:grid-cols-12">
                        {{-- START PROJECT TRACKER --}}
                        <div class="col-span-12 lg:col-span-8 xl:col-span-7 2xl:col-span-6">
                            <div class="card dark:bg-zinc-800 dark:border-zinc-600 card-h-100">
                                <div class="card-body">
                                    <div class="flex flex-wrap items-center mb-6">
                                        <h5 class="mr-2 font-medium text-gray-800 text-15 dark:text-gray-100">PROJECT PROGRESS</h5>
                                        <div class="flex gap-1 ltr:ml-auto rtl:mr-auto">
                                            {{-- <button type="button" class="px-2 py-1 font-medium text-gray-500 border-transparent btn text-[12.25px] bg-gray-50/50 hover:bg-gray-50/50 dark:hover:bg-zinc-600/800 hover:text-white focus:bg-gray-500 focus:text-white dark:bg-gray-500/10 dark:text-zinc-100 hover:bg-gray-500 dark:hover:bg-gray-200 dark:hover:text-gray-800">SEE ALL</button> --}}
                                           
                                        </div>
                                    </div>
                                    @if($projectCounts > 0)
                                    <div class="grid grid-cols-12 2xl:gap-6 justify-items-stretch">
                                        <div class="items-center col-span-12 mr-2 md:col-span-6 justify-self-center 2xl:mr-0">
                                            {{-- CHARTS START --}}
                                            {!! $projectChart->container() !!}
                                            {{-- CHARTS END --}}
                                        </div>
                                    </div>
                                    @else
                                    <div class="grid grid-cols-12 2xl:gap-6 justify-items-stretch">
                                        <div class="items-center col-span-12 mr-2 md:col-span-6 justify-self-start 2xl:mr-0">
                                            <p class="text-15 text-gray-700 dark:text-gray-200">There's no project, create new project to see the status.</p>
                                        </div>
                                    </div>
                                    @endif
                                </div>
                            </div>
                        </div>
                        {{-- END PROJECT TRACKER --}}
                        {{-- START PROJECT ONPROGESS TRACKER --}}
                        <div class="col-span-12 lg:col-span-8 xl:col-span-7 2xl:col-span-6">
                            <div class="card dark:bg-zinc-800 dark:border-zinc-600 card-h-100">
                                <div class="card-body">
                                    <div class="flex flex-wrap items-center mb-6">
                                        <h5 class="mr-2 font-medium text-gray-800 text-15 dark:text-gray-100">ACTIVE PROJECT PROGRESS</h5>
                                        <div class="flex gap-1 ltr:ml-auto rtl:mr-auto">
                                            {{-- <button type="button" class="px-2 py-1 font-medium text-gray-500 border-transparent btn text-[12.25px] bg-gray-50/50 hover:bg-gray-50/50 dark:hover:bg-zinc-600/800 hover:text-white focus:bg-gray-500 focus:text-white dark:bg-gray-500/10 dark:text-zinc-100 hover:bg-gray-500 dark:hover:bg-gray-200 dark:hover:text-gray-800">SEE ALL</button> --}}
                                           
                                        </div>
                                    </div>
                                    @if($onProgressCounts > 0)
                                        <div class="grid grid-cols-12 2xl:gap-6 justify-items-stretch">
                                            <div class="items-center col-span-12 mr-2 md:col-span-6 justify-self-center 2xl:mr-0">
                                                {{-- CHARTS START --}}
                                                {!! $onProgress->container() !!}
                                                {{-- CHARTS END --}}
                                            </div>
                                        </div>
                                    @else
                                    <div class="grid grid-cols-12 2xl:gap-6 justify-items-stretch">
                                        <div class="items-center col-span-12 mr-2 md:col-span-6 justify-self-start 2xl:mr-0">
                                            <p class="text-15 text-gray-700 dark:text-gray-200">Currently there's no active project.</p>
                                        </div>
                                    </div>
                                    @endif
                                </div>
                            </div>
                        </div>
                        {{-- END PROJECT ONPROGESS TRACKER --}}
                        {{-- START PROJECT ONPROGESS TRACKER --}}
                        <div class="col-span-12 lg:col-span-8 xl:col-span-7 2xl:col-span-6">
                            <div class="card dark:bg-zinc-800 dark:border-zinc-600 card-h-100">
                                <div class="card-body">
                                    <div class="flex flex-wrap items-center mb-6">
                                        <h5 class="mr-2 font-medium text-gray-800 text-15 dark:text-gray-100">DELAYED PROJECT PROGRESS</h5>
                                        <div class="flex gap-1 ltr:ml-auto rtl:mr-auto">
                                            {{-- <button type="button" class="px-2 py-1 font-medium text-gray-500 border-transparent btn text-[12.25px] bg-gray-50/50 hover:bg-gray-50/50 dark:hover:bg-zinc-600/800 hover:text-white focus:bg-gray-500 focus:text-white dark:bg-gray-500/10 dark:text-zinc-100 hover:bg-gray-500 dark:hover:bg-gray-200 dark:hover:text-gray-800">SEE ALL</button> --}}
                                           
                                        </div>
                                    </div>
                                    @if($onHoldCounts > 0)
                                    <div class="grid grid-cols-12 2xl:gap-6 justify-items-stretch">
                                        <div class="items-center col-span-12 mr-2 md:col-span-6 justify-self-center 2xl:mr-0">
                                            {{-- CHARTS START --}}
                                            {!! $onHold->container() !!}
                                            {{-- CHARTS END --}}
                                        </div>
                                    </div>
                                    @else
                                    <div class="grid grid-cols-12 2xl:gap-6 justify-items-stretch">
                                        <div class="items-center col-span-12 mr-2 md:col-span-6 justify-self-start 2xl:mr-0">
                                            <p class="text-15 text-gray-700 dark:text-gray-200">Currently there's no delayed project.</p>
                                        </div>
                                    </div>
                                    @endif
                                </div>
                            </div>
                        </div>
                        {{-- END PROJECT ONPROGESS TRACKER --}}
               
                    </div>

                    
                    </section>
@push('footer')
<script src="{{ $projectChart->cdn() }}"></script>

{{ $projectChart->script() }}
{{ $onProgress->script() }}
{{ $onHold->script() }}

@endpush
@endSection
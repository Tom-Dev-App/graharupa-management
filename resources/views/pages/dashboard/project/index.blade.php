@php
    $component = app(App\View\Components\DashboardLayout::class, ['title' => 'Dashboard']);
@endphp

@extends('components.dashboard-layout')
@section('content')
<section class="min-h-screen">
                    <div class="grid grid-cols-1 pb-6">
                        <div class="md:flex items-center justify-between px-[2px] gap-3 mb-4">
                            <a href="{{ route('dashboard.index') }}" class="border-0 btn text-violet-500">
                                <i class="mr-1 mdi mdi-arrow-left"></i> Back
                            </a>

                            <h4 class="text-[18px] font-medium text-gray-800 mb-sm-0 grow dark:text-gray-100 mb-2 md:mb-0">Projects</h4>
                            
                            @can('manager')
                            <button type="button" data-tw-toggle="modal" data-tw-target="#project_new" class="btn text-violet-500 bg-violet-50 border-violet-50 hover:text-white hover:bg-violet-600 hover:border-violet-600 focus:text-white focus:bg-violet-600 focus:border-violet-600 focus:ring focus:ring-violet-500/30 active:bg-violet-600 active:border-violet-600 dark:focus:ring-violet-500/10 dark:bg-violet-500/20 dark:border-transparent">
                                <span class="ml-1">
                                    <i class="mdi mdi-note-plus"></i>
                                    <span>Add Project</span></button>
                                </div>
                                @endcan
                                @if(auth()->user()->role_id !== 1)
                                <div></div>
                                @endif
                    </div>
                    
                    {{-- ALERT --}}
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
                    {{-- ALERT END --}}
                        
                        <!-- START PROJECT -->
                        {{-- <div class="grid grid-cols-1 lg:gap-x-6 lg:grid-cols-12"> --}}
                            {{-- container card --}}
                            <section class="grid grid-cols-12 gap-4">
                                {{-- Loop through each project --}}
                                @foreach($projects as $project)
                                <div class="col-span-12 sm:col-span-12 md:col-span-6 xl:col-span-4 2xl:col-span-3 flex">
                                    {{-- card --}}
                                    <div class="card dark:bg-zinc-800 dark:border-zinc-600 flex-1 flex flex-col">
                                        <div class="card-body flex-1 flex flex-col">
                                            <h3 class="mb-2 text-lg md:text-xl lg:text-xl xl:text-xl 2xl:text-xl text-gray-700 dark:text-gray-100">
                                                {{ $project->name }}
                                            </h3>
                                            <p class="text-red-500 text-sm dark:text-red-100 mb-2">
                                                 <i class="mdi mdi-calendar"></i> Deadline on {{ $project->deadline->format('l, d F Y \a\t h:i A') }}
                                            </p>
                                            <div>
                                                @if ($project->status->id === 1)
                                                <span class="badge font-medium bg-blue-400 text-white text-sm px-1.5 py-[1.5px] rounded">
                                                    <i class="mdi mdi-progress-wrench"></i> On Progress
                                                </span>
                                                @elseif($project->status->id === 2)
                                                <span class="badge font-medium bg-yellow-400 text-white text-sm px-1.5 py-[1.5px] rounded">
                                                    <i class="mdi mdi-progress-clock"></i> On Hold
                                                </span>
                                                @elseif($project->status->id === 3)
                                                <span class="badge font-medium bg-green-600 text-white text-sm px-1.5 py-[1.5px] rounded">
                                                    <i class="mdi mdi-progress-check"></i> Done
                                                </span>
                                                @else
                                                <span class="badge font-medium bg-red-400 text-white text-sm px-1.5 py-[1.5px] rounded">
                                                    <i class="mdi mdi-progress-close"></i> Canceled
                                                </span>
                                                @endif
                                            </div>
                                            <div class="flex gap-6 items-center mt-6">
                                                <div>
                                                    <a href="{{ route('projects.detail', $project->id) }}" class="btn border-transparent bg-violet-500 text-white py-2.5 px-4 shadow-md shadow-violet-200 dark:shadow-zinc-600">Open</a>
                                                </div>
                                                <div class="relative dropdown">
                                                    @can('manager')
                                                    <button type="button" class="py-2 px-4 font-medium leading-tight text-white bg-gray-500 border border-gray-500 shadow-md btn dropdown-toggle shadow-gray-100 dark:shadow-zinc-600 hover:bg-gray-600 focus:bg-gray-600 focus:ring focus:ring-gray-200 focus:ring-gray-500/20" id="dropdownMenuButton1" data-bs-toggle="dropdown">
                                                        <i class='text-lg align-middle bx bx-hive ltr:mr-2 rtl:ml-2'></i>Menu <i class="mdi mdi-chevron-down"></i>
                                                    </button>
                                                    <ul class="absolute z-50 hidden float-left py-2 mt-1 text-left list-none bg-white border-none rounded-lg shadow-lg dropdown-menu w-44 bg-clip-padding dark:bg-zinc-700" aria-labelledby="dropdownMenuButton1">
                                                        <li>
                                                            <a href="{{ route('projects.edit', $project->id) }}" class="inline flex items-center justify-center w-full px-4 py-1 text-sm font-medium text-gray-500 bg-transparent dropdown-item whitespace-nowrap hover:bg-gray-50/50 dark:text-gray-100 dark:hover:bg-zinc-600/50">
                                                                <i class='text-lg align-middle bx bxs-edit ltr:mr-2 rtl:ml-2'></i>Edit
                                                            </a>
                                                        </li>
                                                        <hr class="my-1 border-gray-50 dark:border-zinc-600">
                                                        <li>
                                                            <button type="button" class="block w-full px-4 py-1 text-sm font-medium text-gray-500 bg-transparent dropdown-item whitespace-nowrap hover:bg-gray-50/50 dark:text-gray-100 dark:hover:bg-zinc-600/50" data-tw-toggle="modal" data-tw-target="#modal-delete-project-id-{{ $project->id }}">
                                                                <i class='text-lg align-middle bx bxs-trash ltr:mr-2 rtl:ml-2'></i>Delete
                                                            </button>
                                                        </li>
                                                    </ul>
                                                    @endcan
                                                </div>
                                            </div>
                                        </div>
                                        {{-- modal delete --}}
                                        <div class="card-body">
                                            <form action="{{ route('projects.destroy', $project->id) }}" method="post">
                                                @csrf
                                                @method('delete')
                                                <div class="relative z-50 hidden modal" id="modal-delete-project-id-{{ $project->id }}" aria-labelledby="modal-title" role="dialog" aria-modal="true">
                                                    <div class="fixed inset-0 z-50 overflow-hidden">
                                                        <div class="absolute inset-0 transition-opacity bg-black bg-opacity-50"></div>
                                                        <div class="flex items-end justify-center min-h-screen p-4 text-center animate-translate sm:items-center sm:p-0">
                                                            <div class="relative overflow-hidden text-left transition-all transform bg-white rounded-lg shadow-xl -top-10 sm:my-8 sm:w-full sm:max-w-lg dark:bg-zinc-700">
                                                                <div class="p-5 text-center bg-white dark:bg-zinc-700">
                                                                    <div class="mx-auto bg-red-100 rounded-full h-14 w-14">
                                                                        <i class="mdi mdi-trash-can text-2xl text-red-600 leading-[2.4]"></i>
                                                                    </div>
                                                                    <h2 class="mt-5 text-xl text-gray-700 dark:text-gray-100">Delete this project?</h2>
                                                                    <p class="mt-2 text-gray-500 dark:text-zinc-100/60 font-medium">{{ $project->name }}</p>
                                                                    <p class="mt-2 text-gray-500 dark:text-zinc-100/60">By deleting project, it will be permanently deleted?</p>
                                                                    <div class="justify-center px-4 py-3 mt-5 border-gray-50 sm:flex sm:px-6">
                                                                        <button type="button" class="inline-flex justify-center w-full px-4 py-2 mt-3 text-base font-medium text-gray-700 bg-white border border-gray-300 rounded-md shadow-sm btn dark:text-gray-100 hover:bg-gray-50/50 focus:outline-none focus:ring-2 focus:ring-gray-500/30 sm:mt-0 sm:ml-3 sm:w-auto sm:text-sm dark:bg-zinc-700 dark:border-zinc-600 dark:hover:bg-zinc-600 dark:focus:bg-zinc-600 dark:focus:ring-zinc-700 dark:focus:ring-gray-500/20" data-tw-dismiss="modal">Cancel</button>
                                                                        <button type="submit" class="inline-flex justify-center w-full px-4 py-2 text-base font-medium text-white bg-red-500 border border-transparent rounded-md shadow-sm btn hover:bg-red-600 focus:outline-none focus:ring-2 focus:ring-red-500 sm:ml-3 sm:w-auto sm:text-sm">Delete</button>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </form>
                                        </div>
                                        {{-- modal delete end --}}

                                        
                                        
                                    </div>
                                    {{-- end card --}}
                                </div>
                                @endforeach
                                
                              @can('manager')
                                {{-- New project card --}}
                                <div class="col-span-12 sm:col-span-12 md:col-span-6 xl:col-span-4 2xl:col-span-3 flex">
                                  {{-- new project --}}
                                  <div class="card dark:bg-zinc-800 dark:border-zinc-600 flex-1 flex flex-col">
                                    <div class="card-body flex-1 flex flex-col items-center justify-center">
                                      {{-- <h6 class="mb-6 text-gray-700 text-lg md:text-xl lg:text-xl xl:text-xl 2xl:text-xl dark:text-gray-100">
                                        Create New Project
                                      </h6> --}}
                                      <div class="flex items-center">
                                        <button type="button" data-tw-toggle="modal" data-tw-target="#project_new" class="btn text-violet-500 hover:text-white border-violet-500 hover:bg-violet-600 hover:border-violet-600 focus:bg-violet-600 focus:text-white focus:border-violet-600 focus:ring focus:ring-violet-500/30">
                                          <i data-feather="plus" fill="#545a6d33" class="inline"></i> Create New Project
                                        </button>
                                      </div>
                                    </div>
                                  </div>
                                </div>
                                {{-- END CONTAINER PROJECT --}}
                                @endcan
                              </section>
                              
                              
                        {{-- END PROJECT --}}

                        
    
    {{-- START NNEW PROJECT MODAL --}}
    <div class="relative z-50 hidden modal" id="project_new" aria-labelledby="modal-title" role="dialog" aria-modal="true">
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
                            <form class="space-y-4" action="{{ route('projects.store') }}" method="POST">
                                @csrf
                                <div class="mb-4">
                                    <label for="project_name" class="block mb-2 font-medium text-gray-700 dark:text-gray-100">Project Name</label>
                                    <input class="bg-gray-800/5 border border-gray-100 text-gray-900 dark:text-gray-100 text-sm rounded focus:ring-violet-500 focus:border-violet-500 block w-full p-2.5 dark:bg-zinc-700/50 dark:border-zinc-600 dark:placeholder-gray-400 dark:placeholder:text-zinc-100/60 focus:ring-0" type="text" placeholder="Name a project" id="project_name" name="name" value="{{ old('name') }}">

                                    @error('name')
                                        <div>
                                            <span class="text-red-500 text-sm">
                                                {{ $message }}
                                            </span>
                                        </div>
                                    @enderror
                                </div>
                             
                                <div>
                                    <label for="project_description" class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-100 ltr:text-left rtl:text-right">Project Description</label>
                                    <textarea name="description" id="project_description" cols="30" rows="10" 
                                    class="bg-gray-800/5 border border-gray-100 text-gray-900 dark:text-gray-100 text-sm rounded focus:ring-violet-500 focus:border-violet-500 block w-full p-2.5 dark:bg-zinc-700/50 dark:border-zinc-600 dark:placeholder-gray-400 dark:placeholder:text-zinc-100/60 focus:ring-0" placeholder="Short brief description" >{{ old('description') }}</textarea>

                                    @error('description')
                                        <div>
                                            <span class="text-red-500 text-sm">
                                                {{ $message }}
                                            </span>
                                        </div>
                                    @enderror
                                </div>
    
                                <div class="mb-4">
                                    <label for="project_deadline" class="block mb-2 font-medium text-gray-900 dark:text-gray-100">Project Deadline</label>
                                    <input class="bg-gray-800/5 border border-gray-100 text-gray-900 dark:text-gray-100 text-sm rounded focus:ring-violet-500 focus:border-violet-500 block w-full p-2.5 dark:bg-zinc-700/50 dark:border-zinc-600 dark:placeholder-gray-400 dark:placeholder:text-zinc-100/60 focus:ring-0" type="datetime-local" id="project_deadline" name="deadline" value="{{ old('deadline') }}">
                                    @error('deadline')
                                    <div>
                                        <span class="text-red-500 text-sm">
                                            {{ $message }}
                                        </span>
                                    </div>    
                                    @enderror
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

    
    {{-- END NEW PROJECT MODAL --}}

    
                    </section>
@push('footer')


@endpush
@endSection
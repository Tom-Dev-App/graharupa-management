@php
    $component = app(App\View\Components\DashboardLayout::class, ['title' => 'Dashboard']);
@endphp

@extends('components.dashboard-layout')
@section('content')
<section class="min-h-screen">
                    <div class="grid grid-cols-1 pb-6">
                        <div class="md:flex items-center justify-between px-[2px] gap-3">
                            <a href="{{ route('projects.detail', ['id' => $task->project_id]) }}" class="border-0 btn text-violet-500">
                                <i class="mr-1 mdi mdi-arrow-left"></i> Back
                            </a>

                            <h4 class="text-[18px] font-medium text-gray-800 mb-sm-0 grow dark:text-gray-100 mb-2 md:mb-0">{{ $task->project->name }}</h4>

                            {{-- <button type="button" data-tw-toggle="modal" data-tw-target="#project_new" class="btn text-violet-500 bg-violet-50 border-violet-50 hover:text-white hover:bg-violet-600 hover:border-violet-600 focus:text-white focus:bg-violet-600 focus:border-violet-600 focus:ring focus:ring-violet-500/30 active:bg-violet-600 active:border-violet-600 dark:focus:ring-violet-500/10 dark:bg-violet-500/20 dark:border-transparent">
                                <span class="ml-1">
                                    <i class="mdi mdi-note-plus"></i>
                                    <span>Add Project</span></button> --}}
                   <span></span>
                        </div>
                    </div>
                    <section>
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
                </section>
                  {{-- accordion desc --}}
                <div class="flex flex-wrap card-body justify-center gap-4 flex-wrap items-center ">
                    <div class="card-body w-full">
                        <div data-tw-accordion="collapse">
                            <div class="text-gray-700 accordion-item">
                                @if(!$task->trashed())
                                <div class="ml-3">
                                    <a  href="{{ route('tasks.edit', [
                                        'pid' => $task->project->id, 'id' => $task->id
                                    ]) }}" class="btn text-violet-500 bg-violet-50 border-violet-50 hover:text-white hover:bg-violet-600 hover:border-violet-600 focus:text-white focus:bg-violet-600 focus:border-violet-600 focus:ring focus:ring-violet-500/30 active:bg-violet-600 active:border-violet-600 dark:focus:ring-violet-500/10 dark:bg-violet-500/20 dark:border-transparent">
                                        <span class="ml-1">
                                            <i class="mdi mdi-pencil"></i>
                                            <span>Edit Task</span>
                                    </a>
                                </div>
                                @endif
                                <h2>
                                    <button type="button" class="flex items-center justify-between w-full p-3 font-medium text-left border-b border-gray-100 rounded-t-lg accordion-header group active dark:border-b-zinc-600">
                                        
                                        <div>
                                            <span class="text-15 block w-full">Task Description</span>
                                            @if ($task->status->id === 1)
                                            <span class="badge font-medium bg-blue-400 text-white text-sm px-1.5 py-[1.5px] rounded">
                                                <i class="mdi mdi-progress-wrench"></i> On Progress
                                            </span>
                                            @elseif($task->status->id === 2)
                                            <span class="badge font-medium bg-yellow-400 text-white text-sm px-1.5 py-[1.5px] rounded">
                                                <i class="mdi mdi-progress-clock"></i> On Hold
                                            </span>
                                            @elseif($task->status->id === 3)
                                            <span class="badge font-medium bg-green-600 text-white text-sm px-1.5 py-[1.5px] rounded">
                                                <i class="mdi mdi-progress-check"></i> Done
                                            </span>
                                            @else
                                            <span class="badge font-medium bg-red-400 text-white text-sm px-1.5 py-[1.5px] rounded">
                                                <i class="mdi mdi-progress-close"></i> Canceled
                                            </span>
                                            @endif
                                            <p class="text-gray-500 text-sm dark:text-gray-100">
                                                <i class="mdi mdi-calendar "></i>
                                                 {{ $task->datetime->format('l, d F Y \a\t h:i A') }}
                                            </p>
                                            @if($task->trashed())
                                            <span class="text-sm text-red-600 dark:text-red-100 mb-3">(task was deleted)</span>
                                            @endif
                                        </div>

                                        <i class="mdi mdi-chevron-down text-2xl group-[.active]:rotate-180"></i>
                                    </button>
                                    
                                </h2>

                                <div class="block accordion-body">
                                    <div class="p-5 font-light">
                                        <p class="mb-2 text-gray-500 dark:text-gray-400">{{ $task->description }}</p>
                                        
                                    </div>
                                </div>
                            </div>

                          

                        </div>
                    </div>
                </div>

                        
                        
                    <div class="col-span-12 xl:col-span-8">
                        <div class="card dark:bg-zinc-800 dark:border-zinc-600">
                            <div class="card-body border-b border-gray-100 dark:border-zinc-600 flex gap-4 justify-between items-center mb-3">
                                <h6 class="mb-1 text-gray-700 text-15 dark:text-gray-100">Materials Table</h6>
                                @if(!$task->trashed())
                                <button type="button" data-tw-toggle="modal" data-tw-target="#material_modal" class="btn text-violet-500 bg-violet-50 border-violet-50 hover:text-white hover:bg-violet-600 hover:border-violet-600 focus:text-white focus:bg-violet-600 focus:border-violet-600 focus:ring focus:ring-violet-500/30 active:bg-violet-600 active:border-violet-600 dark:focus:ring-violet-500/10 dark:bg-violet-500/20 dark:border-transparent">
                                    <span class="ml-1">
                                        <i class="mdi mdi-plus"></i>
                                        <span>Add Material</span>
                                </button>
                                @endif
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
                                                    Description
                                                </th>
                                                <th scope="col" class="px-6 py-3 border-l border-gray-50 dark:border-zinc-600">
                                                    User
                                                </th>
                                                <th scope="col" class="px-6 py-3 border-l border-gray-50 dark:border-zinc-600">
                                                    Quantity
                                                </th>
                                                <th scope="col" class="px-6 py-3 border-l border-gray-50 dark:border-zinc-600">
                                                    Status
                                                </th>
                                                <th scope="col" class="px-6 py-3 border-l border-gray-50 dark:border-zinc-600">
                                                    Action
                                                </th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @if($materials->count() > 0)
                                            @foreach ($materials as $material)
                                                <tr class="bg-white border border-gray-50 dark:border-zinc-600 dark:bg-transparent">
                                                    <th scope="row" class="px-6 py-3.5 border-l border-gray-50 dark:border-zinc-600 font-medium text-gray-900 whitespace-nowrap dark:text-zinc-100">
                                                        {{ $loop->index + 1 }}
                                                    </th>
                                                    <td class="px-6 py-3.5 border-l border-gray-50 dark:border-zinc-600 dark:text-zinc-100">
                                                        {{ $material->name }} 
                                                    </td>
                                                    <td class="px-6 py-3.5 border-l border-gray-50 dark:border-zinc-600 dark:text-zinc-100">
                                                        <span class="dark:text-gray-100 text-gray-800">Created {{ $material->created_at->format('l, d F Y \a\t h:i A') }}</span> <br>
                                                        {{ $material->description }} 
                                                    </td>
                                                    <td class="px-6 py-3.5 border-l border-gray-50 dark:border-zinc-600 dark:text-zinc-100 flex gap-2 flex-col">
                                                        {{ $material->user->name }} - As {{ $material->user->role->name }}
                                                        @if ($material->user->trashed())
                                                            <div class="mb-3">
                                                                <span class="text-red-500">(Suspended)</span>
                                                            </div>
                                                        @endif
                                                    </td>
                                                    <td class="px-6 py-3.5 border-l border-gray-50 dark:border-zinc-600 dark:text-zinc-100">
                                                        {{ $material->quantity }}  {{ $material->unit->name }}  
                                                    </td>
                                                    <td class="px-6 py-3.5 border-l border-gray-50 dark:border-zinc-600 dark:text-zinc-100">
                                                        @if ($material->is_carried)
                                                            <span class="badge font-medium bg-red-50 text-red-500 text-11 px-1.5 py-[1.5px] rounded dark:bg-red-500/20">Used</span>
                                                        @else
                                                            <span class="badge font-medium bg-yellow-50 text-yellow-500 text-11 px-1.5 py-[1.5px] rounded dark:bg-yellow-500/20">Returned</span>
                                                        @endif
                                                    </td>
                                                    <td class="px-6 py-3.5 border-l border-gray-50 dark:border-zinc-600 dark:text-zinc-100 flex justify-center items-center">
                                                        <button type="button" class="block px-4 py-1 text-sm font-medium text-red-500 bg-transparent dropdown-item whitespace-nowrap hover:bg-red-50/50 dark:text-red-100 dark:hover:bg-red-600/50" data-tw-toggle="modal" data-tw-target="#modal-delete-task-id-{{ $material->id }}">
                                                            <i class='text-lg align-middle bx bxs-trash ltr:mr-2 rtl:ml-2'></i> Delete
                                                        </button>
                                                        {{-- modal delete --}}
                                                        <div class="card-body">
                                                            <form action="{{ route('materials.destroy', ['pid' => $task->project->id, 'id' => $task->id, $material->id]) }}" method="post">
                                                                @csrf
                                                                @method('delete')
                                                                <div class="relative z-50 hidden modal" id="modal-delete-task-id-{{ $material->id }}" aria-labelledby="modal-title" role="dialog" aria-modal="true">
                                                                    <div class="fixed inset-0 z-50 overflow-hidden">
                                                                        <div class="absolute inset-0 transition-opacity bg-black bg-opacity-50"></div>
                                                                        <div class="flex items-end justify-center min-h-screen p-4 text-center animate-translate sm:items-center sm:p-0">
                                                                            <div class="relative overflow-hidden text-left transition-all transform bg-white rounded-lg shadow-xl -top-10 sm:my-8 sm:w-full sm:max-w-lg dark:bg-zinc-700">
                                                                                <div class="p-5 text-center bg-white dark:bg-zinc-700">
                                                                                    <div class="mx-auto bg-red-100 rounded-full h-14 w-14">
                                                                                        <i class="mdi mdi-trash-can text-2xl text-red-600 leading-[2.4]"></i>
                                                                                    </div>
                                                                                    <h2 class="mt-5 text-xl text-gray-700 dark:text-gray-100">Delete this material?</h2>
                                                                                    <p class="mt-2 text-gray-500 dark:text-zinc-100/60 font-medium">{{ $material->name }}</p>
                                                                                    <p class="mt-2 text-gray-500 dark:text-zinc-100/60">By deleting material, it will be permanently deleted?</p>
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
                                                    </td>
                                                </tr>
                                            @endforeach
                                        @else
                                            <tr class="bg-gray-50/60 dark:bg-zinc-600/50">
                                                <th scope="row" class="px-6 py-3.5 font-medium text-gray-900 whitespace-nowrap dark:text-zinc-100 text-center" colspan="7">
                                                    There are no materials available.
                                                </th>
                                            </tr>
                                        @endif
                                        
                                        </tbody>
                                    </table>
                                      <!-- Pagination Links -->
                                      <div class="mt-4">
                                        {{ $materials->links('vendor.pagination.custom-pagination') }}
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>   
                    <div class="grid grid-cols-12 gap-6">
                        {{-- CONTENT START HERE --}}
                        <div class="col-span-12 lg:col-span-6">
                            <div class="card-body">
                                {{-- START EDIT DATA USER --}}
                                <h5 class="text-xl text-gray-700 dark:text-gray-100">
                                    Get Materials Timeline Based on a Date
                                </h5>
                                <div>
                                    <form class="mt-6" action="{{ route('materials.summary', ['pid' => $task->project->id, 'id' => $task->id]) }}" method="POST">
                                        @csrf
                    
                                        <div class="grid grid-cols-12 gap-6 mb-3">
                                            <div class="col-span-12 lg:col-span-6">
                                                <div class="mb-3">
                                                    <label class="font-medium text-gray-700 dark:text-zinc-100" for="unit">Date</label>
                                                    <input type="date" class="w-full mt-2 py-1.5 placeholder:text-sm border-gray-100 rounded focus:border focus:border-violet-100 focus:ring focus:ring-violet-500/20 dark:bg-zinc-700/50 dark:border-zinc-600 dark:placeholder:text-zinc-100 dark:text-zinc-100 " id="unit" name="date">
                                                </div>
                                                <div>
                                                    <span class="text-muted text-sm text-gray-600 dark:text-gray-200">
                                                        Leave date empty to get all data
                                                    </span>
                                                </div>
                                                @error('date')
                                                <div>
                                                    <span class="text-red-500 text-sm">{{ $message }}</span>
                                                </div>
                                                @enderror
                                            </div>
                                        </div>
                    
                                        <div class="mt-6 inline-flex gap-4">
                                            <button type="reset" class="font-medium text-gray-700 dark:text-gray-100 border border-gray-300 btn w-28 hover:bg-gray-50 dark:hover:bg-gray-500 focus:bg-gray-50 focus:ring focus:ring-gray-200">Reset</button>
                                            <button type="submit" class="font-medium text-white border-transparent btn bg-violet-500 w-28 hover:bg-violet-700 focus:bg-violet-700 focus:ring focus:ring-violet-50">Summarize</button>
                                        </div>
                                    </form>
                                </div>
                                {{-- END EDIT DATA USER --}}
                    
                            </div>
                        </div>
                        {{-- CONTENT START END HERE --}}
                    </div>
                    
    {{-- START NNEW MATERIAL MODAL --}}
    <div class="relative z-50 hidden modal" id="material_modal" aria-labelledby="modal-title" role="dialog" aria-modal="true">
        <div class="fixed inset-0 z-50 overflow-y-auto">
            <div class="absolute inset-0 transition-opacity bg-black bg-opacity-50 modal-overlay"></div>
            <div class="p-4 mx-auto animate-translate sm:max-w-lg">
                <div class="relative overflow-hidden text-left transition-all transform bg-white rounded-lg shadow-xl dark:bg-zinc-600">
                    <div class="bg-white dark:bg-zinc-700">
                        <button type="button" class="absolute top-3 right-2.5 text-gray-400 border-transparent hover:bg-gray-50/50 hover:text-gray-900 dark:text-gray-100 rounded-lg text-sm px-2 py-1 ltr:ml-auto rtl:mr-auto inline-flex items-center dark:hover:bg-zinc-600" data-tw-dismiss="modal">
                            <i class="text-xl text-gray-500 mdi mdi-close dark:text-zinc-100/60"></i>
                        </button>
                        <div class="p-5">
                            <h3 class="mb-4 text-xl font-medium text-gray-700 dark:text-gray-100">Add Material to Task</h3>
                            <form class="space-y-4" action="{{ route('materials.store', ['pid' => $task->project_id, 'id' => $task->id]) }}" method="POST">
                                @csrf
                                <div class="mb-4">
                                    <label for="material_name" class="block mb-2 font-medium text-gray-700 dark:text-gray-100">Material Name</label>
                                    <input class="bg-gray-800/5 border border-gray-100 text-gray-900 dark:text-gray-100 text-sm rounded focus:ring-violet-500 focus:border-violet-500 block w-full p-2.5 dark:bg-zinc-700/50 dark:border-zinc-600 dark:placeholder-gray-400 dark:placeholder:text-zinc-100/60 focus:ring-0" type="text" placeholder="Material name..." id="material_name" name="name" value="{{ old('name') }}">

                                    @error('name')
                                        <div>
                                            <span class="text-red-500 text-sm">
                                                {{ $message }}
                                            </span>
                                        </div>
                                    @enderror
                                </div>
                             
                                <div>
                                    <label for="project_description" class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-100 ltr:text-left rtl:text-right">Material Description</label>
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
                                    <label for="quantitiy_material" class="block mb-2 font-medium text-gray-700 dark:text-gray-100">Quantity Material</label>
                                    <input class="bg-gray-800/5 border border-gray-100 text-gray-900 dark:text-gray-100 text-sm rounded focus:ring-violet-500 focus:border-violet-500 block w-full p-2.5 dark:bg-zinc-700/50 dark:border-zinc-600 dark:placeholder-gray-400 dark:placeholder:text-zinc-100/60 focus:ring-0" type="number" placeholder="Total material..." id="quantitiy_material" name="quantity" value="{{ old('quantity') }}">

                                    @error('quantity')
                                        <div>
                                            <span class="text-red-500 text-sm">
                                                {{ $message }}
                                            </span>
                                        </div>
                                    @enderror
                                </div>
                                {{-- UNIT  --}}
                                <div>
                                    <label class="block mb-2 font-medium text-gray-700 dark:text-zinc-100">Select Unit</label>
                                    <select name="unit" class="dark:bg-zinc-800 dark:border-zinc-700 rounded border-gray-100 py-2.5 text-sm text-gray-500 focus:border focus:border-violet-500 focus:ring-0 dark:bg-zinc-700/50 dark:text-zinc-100">
                                        @foreach($units as $unit)
                                            <option value="{{ $unit->id }}" selected>
                                                {{ $unit->name }}
                                            </option>
                                    @endforeach
                                    </select>
                                    @error('unit')
                                    <span class="text-red-500 text-sm">{{ $message }}</span>
                                @enderror
                                </div>

                                <div>
                                    <label class="block mb-2 font-medium text-gray-700 dark:text-zinc-100">Material is being?</label>
                                    <select name="is_used" class="dark:bg-zinc-800 dark:border-zinc-700 rounded border-gray-100 py-2.5 text-sm text-gray-500 focus:border focus:border-violet-500 focus:ring-0 dark:bg-zinc-700/50 dark:text-zinc-100">
                                            <option value={{ true }} selected>
                                                Used (Going to be used)
                                            </option>
                                            <option value={{ false }} selected>
                                                Returned (The Remaing Material)
                                            </option>
                                    </select>
                                    @error('is_used')
                                    <span class="text-red-500 text-sm">{{ $message }}</span>
                                @enderror
                                </div>

                                {{-- <div>
                                    <div class="mb-2">
                                        <label for="choices-single-default" class="font-medium text-gray-500 form-label text-13 dark:text-zinc-100">Default</label>
                                    </div>
                                    <select class="border-gray-100" data-trigger name="choices-single-default" id="choices-single-default" placeholder="This is a search placeholder">
                                        <option value="">This is a placeholder</option>
                                        <option value="Choice 1">Choice 1</option>
                                        <option value="Choice 2">Choice 2</option>
                                        <option value="Choice 3">Choice 3</option>
                                    </select>
                                </div> --}}
                                {{-- UNIT END --}}

                                {{-- <div class="mb-4">
                                    <label for="project_deadline" class="block mb-2 font-medium text-gray-700 dark:text-zinc-100">Date and time</label>
                                    <input class="bg-gray-800/5 border border-gray-100 text-gray-900 dark:text-gray-100 text-sm rounded focus:ring-violet-500 focus:border-violet-500 block w-full p-2.5 dark:bg-zinc-700/50 dark:border-zinc-600 dark:placeholder-gray-400 dark:placeholder:text-zinc-100/60 focus:ring-0" type="datetime-local" value="2019-08-19T13:45:00" id="project_deadline" name="deadline" value="{{ old('deadline') }}">
                                    @error('deadline')
                                    <div>
                                        <span class="text-red-500 text-sm">
                                            {{ $message }}
                                        </span>
                                    </div>    
                                    @enderror
                                </div> --}}
                            
                                <div class="mt-6">
                                    <button type="submit" class="w-full text-white bg-violet-600 border-transparent btn">Create</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    
    {{-- END NEW MATERIAL MODAL --}}

    
                    </section>
@push('footer')
<script>
    document.addEventListener('DOMContentLoaded', (event) => {
        const quantityInput = document.getElementById('quantity_material');
    
        quantityInput.addEventListener('input', () => {
            // Replace any non-numeric characters with an empty string
            quantityInput.value = quantityInput.value.replace(/[^0-9]/g, '');
        });
    });
    </script>
    

@endpush
@endSection
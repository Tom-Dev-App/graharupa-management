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

<div class="grid grid-cols-1 pb-6">
    <div class="md:flex items-center justify-between px-[2px]">
        
            <a href="{{ route('projects.detail', $project->id) }}" class="border-0 btn text-violet-500">
                <i class="mr-1 mdi mdi-arrow-left"></i> Back
            </a>
        <h4 class="text-[18px] font-medium text-gray-800 mb-sm-0 grow dark:text-gray-100 mb-2 md:mb-0">Project Archives</h4>

        <button data-tw-toggle="modal" data-tw-target="#archive_modal" class="btn text-violet-500 bg-violet-50 border-violet-50 hover:text-white hover:bg-violet-600 hover:border-violet-600 focus:text-white focus:bg-violet-600 focus:border-violet-600 focus:ring focus:ring-violet-500/30 active:bg-violet-600 active:border-violet-600 dark:focus:ring-violet-500/10 dark:bg-violet-500/20 dark:border-transparent">
            <i data-feather="file-plus" fill="#545a6d33" class="inline"></i> 
            <span class="ml-1">Add Archive</span></button>
    </div>
</div>



<section class="min-h-screen flex flex-col justify-between">
    
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
                    <div class="flex flex-wrap card-body justify-between flex-wrap items-center card dark:bg-zinc-800 dark:border-zinc-600 mb-3">
                        {{-- <span class="badge font-medium bg-green-600 text-white text-15 px-1.5 py-[1.5px] rounded">
                                                <i class="mdi mdi-progress-check"></i>
                                                Done</span> --}}
                    @if($project->status_id === 1)
                    <div>

                   
                                                       
                    </div>
                    
                    @else
                    <div>
                      
                    </div>
                    @endif
    <div class="card-body border-b border-gray-100 dark:border-zinc-600 w-full">
        <h3 class="mb-1 text-gray-700 text-[18px] dark:text-gray-100">{{ $project->name }}  Archives</h3>
    </div>
    <div class="card-body w-full">
        <div class="relative overflow-x-auto">
            <table class="w-full table-full-width text-sm text-left text-gray-500 ">
                <thead class="text-sm text-gray-700 dark:text-gray-100">
                    <tr>
                        <th scope="col" class="px-6 py-3.5">
                            Number
                        </th>
                        <th scope="col" class="px-6 py-3.5">
                           Created At
                        </th>
                        <th scope="col" class="px-6 py-3.5">
                            User Name - Role - Status
                        </th>
                        <th scope="col" class="px-6 py-3.5">
                           Name
                        </th>
                        <th scope="col" class="px-6 py-3.5">
                            Description
                        </th>
                        <th scope="col" class="px-6 py-3.5">
                           Content
                        </th>
                        <th scope="col" class="px-6 py-3.5">
                          Action
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @if($archives->isEmpty())
                    <tr class="bg-gray-50/60 dark:bg-zinc-600/50">
                        <th scope="row" class="px-6 py-3.5 font-medium text-gray-900 whitespace-nowrap dark:text-zinc-100 text-center" colspan="7">
                            There is no archives right now.
                        </th>
                    </tr>
                @else
                    @foreach ($archives as $index => $archive)
                        <tr class="bg-gray-50/60 dark:bg-zinc-600/50">
                            <th scope="row" class="px-6 py-3.5 font-medium text-gray-900 whitespace-nowrap dark:text-zinc-100">
                                {{ $loop->index + 1 }}
                            </th>
                            <td class="px-6 py-3.5 dark:text-zinc-100">
                                {{ $archive->created_at->format('l, d F Y \a\t h:i A') }}
                            </td>
                            <td class="px-6 py-3.5 dark:text-zinc-100">
                                {{ $archive->user->name }} -  {{ $archive->user->role->name }} 
                                @if ($archive->user->trashed())
                                    - Suspended
                                @endif
                            </td>
                            <td class="px-6 py-3.5 dark:text-zinc-100">
                                {{ $archive->name }}
                            </td>
                            <td class="px-6 py-3.5 dark:text-zinc-100">
                                {{ $archive->description }}
                            </td>

                            <td class="px-6 py-3.5 dark:text-zinc-100">
                                @if($archive->type->name === "PDF")
                                <a href="{{ $archive->file_url }}" target="_blank" rel="noopener noreferrer" class="p-0 text-white align-middle border-0 btn bg-violet-500 focus:ring-2 focus:ring-violet-500/30 hover:bg-violet-600">
                                    <i class="w-10 h-full py-3 align-middle bg-white rounded-l  bx bx-download bg-opacity-20 text-16"></i>
                                    <span class="px-3 leading-[2.8]">Download PDF</span>
                                </a>
                            @elseif($archive->type->name === "LINK")

                                <a href="{{ $archive->file_url }}" target="_blank" class="border-0 btn text-violet-500 group"> <span class="transition-all duration-100 ease-in-out group-hover:border-b group-hover:border-violet-500">Visit Link</span></a>
                            @endif
                            
                            </td>
                            <td class="px-6 py-3.5 dark:text-zinc-100 flex flex-col items-center justify-center">
                                    <button type="button" class="inline-flex gap-2 justify-center items-center px-4 py-1 text-sm font-medium text-red-500 bg-transparent dropdown-item whitespace-nowrap hover:bg-red-50/50 dark:text-red-100 dark:hover:bg-red-600/50" data-tw-toggle="modal" data-tw-target="#modal-delete-archive-id-{{ $archive->id }}">
                                        <i class='text-lg align-middle bx bxs-trash ltr:mr-2 rtl:ml-2'></i> Delete
                                    </button>

                                    {{-- modal delete --}}
                                    <div class="card-body">
                                        <form action="{{ route('archives.destroy', ['pid' => $archive->related_id, 'id' => $archive->id]) }}" method="post">
                                            @csrf
                                            @method('delete')
                                            <div class="relative z-50 hidden modal" id="modal-delete-archive-id-{{ $archive->id }}" aria-labelledby="modal-title" role="dialog" aria-modal="true">
                                                <div class="fixed inset-0 z-50 overflow-hidden">
                                                    <div class="absolute inset-0 transition-opacity bg-black bg-opacity-50"></div>
                                                    <div class="flex items-end justify-center min-h-screen p-4 text-center animate-translate sm:items-center sm:p-0">
                                                        <div class="relative overflow-hidden text-left transition-all transform bg-white rounded-lg shadow-xl -top-10 sm:my-8 sm:w-full sm:max-w-lg dark:bg-zinc-700">
                                                            <div class="p-5 text-center bg-white dark:bg-zinc-700">
                                                                <div class="mx-auto bg-red-100 rounded-full h-14 w-14">
                                                                    <i class="mdi mdi-trash-can text-2xl text-red-600 leading-[2.4]"></i>
                                                                </div>
                                                                <h2 class="mt-5 text-xl text-gray-700 dark:text-gray-100">Delete this archive?</h2>
                                                                <p class="mt-2 text-gray-500 dark:text-zinc-100/60 font-medium">{{ $archive->name }}</p>
                                                                <p class="mt-2 text-gray-500 dark:text-zinc-100/60">By deleting archive, it will be permanently deleted?</p>
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
                @endif
                
                </tbody>
            </table>
        </div>
    </div>
</section>
{{-- START NEW ARCHIVES MODAL --}}
<div class="relative z-50 hidden modal" id="archive_modal" aria-labelledby="modal-title" role="dialog" aria-modal="true">
    <div class="fixed inset-0 z-50 overflow-y-auto">
        <div class="absolute inset-0 transition-opacity bg-black bg-opacity-50 modal-overlay"></div>
        <div class="p-4 mx-auto animate-translate sm:max-w-lg">
            <div class="relative overflow-hidden text-left transition-all transform bg-white rounded-lg shadow-xl dark:bg-zinc-600">
                <div class="bg-white dark:bg-zinc-700">
                    <button type="button" class="absolute top-3 right-2.5 text-gray-400 border-transparent hover:bg-gray-50/50 hover:text-gray-900 dark:text-gray-100 rounded-lg text-sm px-2 py-1 ltr:ml-auto rtl:mr-auto inline-flex items-center dark:hover:bg-zinc-600" data-tw-dismiss="modal">
                        <i class="text-xl text-gray-500 mdi mdi-close dark:text-zinc-100/60"></i>
                    </button>
                    <div class="p-5">
                        <h3 class="mb-4 text-xl font-medium text-gray-700 dark:text-gray-100">Add Archive</h3>
                        <form class="space-y-4" action="{{ route('archives.store', ['pid' => $project->id]) }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="mb-4">
                                <label for="archive_name" class="block mb-2 font-medium text-gray-700 dark:text-gray-100">Name</label>
                                <input class="bg-gray-800/5 border border-gray-100 text-gray-900 dark:text-gray-100 text-sm rounded focus:ring-violet-500 focus:border-violet-500 block w-full p-2.5 dark:bg-zinc-700/50 dark:border-zinc-600 dark:placeholder-gray-400 dark:placeholder:text-zinc-100/60 focus:ring-0 focus:outline-0" type="text" placeholder="Name..." id="archive_name" name="name" value="{{ old('name') }}">
                                @error('name')
                                    <div>
                                        <span class="text-red-500 text-sm">
                                            {{ $message }}
                                        </span>
                                    </div>
                                @enderror
                            </div>

                            <div>
                                <label for="archive_description" class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-100 ltr:text-left rtl:text-right">Description</label>
                                <textarea name="description" id="archive_description" cols="30" rows="10" 
                                class="bg-gray-800/5 border border-gray-100 text-gray-900 dark:text-gray-100 text-sm rounded focus:ring-violet-500 focus:border-violet-500 block w-full p-2.5 dark:bg-zinc-700/50 dark:border-zinc-600 dark:placeholder-gray-400 dark:placeholder:text-zinc-100/60 focus:ring-0 focus:outline-0" placeholder="Short brief description">{{ old('description') }}</textarea>
                                @error('description')
                                    <div>
                                        <span class="text-red-500 text-sm">
                                            {{ $message }}
                                        </span>
                                    </div>
                                @enderror
                            </div>

                            <div>
                                <label class="block mb-2 font-medium text-gray-700 dark:text-zinc-100">Select Archive Type</label>
                                <select name="type" id="archive_type" class="dark:bg-zinc-800 dark:border-zinc-700 rounded border-gray-100 py-2.5 text-sm text-gray-500 focus:border focus:border-violet-500 focus:ring-0 dark:bg-zinc-700/50 dark:text-zinc-100 focus:outline-0">
                                    @foreach($types as $index => $type)
                                        <option value="{{ $type->id }}" {{ $index === old('type', 0) ? 'selected' : '' }}>
                                            {{ $type->name }}
                                        </option>
                                    @endforeach
                                </select>
                                @error('type')
                                    <span class="text-red-500 text-sm">{{ $message }}</span>
                                @enderror
                            </div>

                            <div class="mb-4" id="pdf_input">
                                <label for="archive_link" class="block mb-2 font-medium text-gray-700 dark:text-gray-100">File PDF</label>
                                <input class="bg-gray-800/5 border border-gray-100 text-gray-900 dark:text-gray-100 text-sm rounded focus:ring-violet-500 focus:border-violet-500 block w-full p-2.5 dark:bg-zinc-700/50 dark:border-zinc-600 dark:placeholder-gray-400 dark:placeholder:text-zinc-100/60 focus:ring-0 focus:outline-0" type="file" placeholder="Upload PDF here..." id="archive_link" name="pdf" value="{{ old('pdf') }}">
                                @error('pdf')
                                    <div>
                                        <span class="text-red-500 text-sm">
                                            {{ $message }}
                                        </span>
                                    </div>
                                @enderror
                            </div>

                            <div class="mb-4 hidden" id="url_input">
                                <label for="file_url" class="block mb-2 font-medium text-gray-700 dark:text-gray-100">URL</label>
                                <input class="bg-gray-800/5 border border-gray-100 text-gray-900 dark:text-gray-100 text-sm rounded focus:ring-violet-500 focus:border-violet-500 block w-full p-2.5 dark:bg-zinc-700/50 dark:border-zinc-600 dark:placeholder-gray-400 dark:placeholder:text-zinc-100/60 focus:ring-0 focus:outline-0" type="text" placeholder="URL..." id="file_url" name="file_url" value="{{ old('file_url') }}">
                                @error('file_url')
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
{{-- END NEW ARCHIVES MODAL --}}

@push('footer')
<script>
    document.getElementById('archive_type').addEventListener('change', function() {
        var pdfInput = document.getElementById('pdf_input');
        var urlInput = document.getElementById('url_input');
        var selectedOption = this.options[this.selectedIndex].text.toLowerCase();
        if (selectedOption === 'pdf') {
            pdfInput.classList.remove('hidden');
            urlInput.classList.add('hidden');
        } else {
            pdfInput.classList.add('hidden');
            urlInput.classList.remove('hidden');
        }
    });
    
    // Initial check on page load
    document.addEventListener('DOMContentLoaded', function() {
        var archiveTypeSelect = document.getElementById('archive_type');
        var event = new Event('change');
        archiveTypeSelect.dispatchEvent(event);
    });
    </script>
@endPush

@endSection
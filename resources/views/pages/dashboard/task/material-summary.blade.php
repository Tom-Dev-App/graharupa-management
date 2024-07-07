@extends('components.layout')
@section('content')
    <div class=" min-h-screen pb-16">
        <div class="grid grid-cols-1 pb-6">
            <div class="md:flex items-center justify-between px-[2px] gap-3">
                <a href="{{ route('tasks.detail', ['pid' => $project->id, 'id' => $task->id]) }}" class="border-0 btn text-violet-500">
                    <i class="mr-1 mdi mdi-arrow-left"></i> Back
                </a>

                <h4 class="text-[18px] font-medium text-gray-800 mb-sm-0 grow dark:text-gray-100 mb-2 md:mb-0">{{ $project->name }}</h4>

            </div>
        </div>
    
<div class="card-body border-b border-gray-100 dark:border-zinc-600">
    <h1 class="text-gray-900 text-[20px] dark:text-gray-50 text-center">Materials Timeline</h1>
    <h3 class="mb-1 text-gray-700 text-[18px] dark:text-gray-100">Project Name: <br>{{ $project->name }}</h3>
    <div class="mb-3">
        <p class="text-gray-700 text-[17px] dark:text-gray-100">
            Project Desc:
        </p>
    
        <p class="text-gray-700 text-15 dark:text-gray-100">
            {{ $project->description }}
        </p>

    </div>
    <div class="mb-3">
        <p class="text-gray-700 text-15 dark:text-gray-100">
            Project Created:
        </p>
    
        <p class="text-gray-700 text-15 dark:text-gray-100">
            @if ($project->created_at)
                {{ $project->created_at->format('l, d F Y \a\t h:i A') }}
            @else
                No creation date available
            @endif
        </p>

    </div>

    <div class="mb-3">
        <p class="text-gray-700 text-15 dark:text-gray-100">
            Project Due on:
        </p>
    
        <p class="text-gray-700 text-15 dark:text-gray-50">
            @if ($project->deadline)
                {{ $project->deadline->format('l, d F Y \a\t h:i A') }}
            @else
                No creation date available
            @endif
        </p>

    </div>
    <div class="mb-3">
        <p class="text-gray-700 text-15 dark:text-gray-100">
            Project Status: 
            @if ($project->status->id === 1)
        <span class="badge font-bold bg-blue-400 text-white text-sm px-1.5 py-[1.5px] rounded">
            <i class="mdi mdi-progress-wrench"></i> On Progress
        </span>

    @elseif($project->status->id === 2)
        <span class="badge font-bold bg-yellow-400 text-white text-sm px-1.5 py-[1.5px] rounded">
            <i class="mdi mdi-progress-clock"></i> On Hold
        </span>

    @elseif($project->status->id === 3)
        <span class="badge font-bold bg-green-600 text-white text-sm px-1.5 py-[1.5px] rounded">
            <i class="mdi mdi-progress-check"></i> Done
        </span>

    @else
        <span class="badge font-bold bg-red-400 text-white text-sm px-1.5 py-[1.5px] rounded">
            <i class="mdi mdi-progress-close"></i> Canceled
        </span>
    @endif
        </p>
    
        <p class="text-gray-700 text-15 dark:text-gray-50">
            Project Deadline: 
            @if ($project->deadline)
                {{ $project->deadline->format('l, d F Y \a\t h:i A') }}
            @else
                No creation date available
            @endif
        </p>

    </div>

    <h5 class="mb-1 text-gray-700 text-[17px] dark:text-gray-100 mb-3">Task Desc:  <br>{{ $task->description }}</h5>

    <div class="mb-3">
        <p class="text-gray-700 text-15 dark:text-gray-100">
            Task Created:
        </p>
    
        <p class="text-gray-700 text-15 dark:text-gray-100">
            @if ($task->created_at)
                {{ $task->created_at->format('l, d F Y \a\t h:i A') }}
            @else
                No creation date available
            @endif
        </p>
    </div>

    <div class="mb-3">
        <p class="text-gray-700 text-15 dark:text-gray-100">
            Task Starts:
        </p>
    
        <p class="text-gray-700 text-15 dark:text-gray-100">
            @if ($task->datetime)
                {{ $task->datetime->format('l, d F Y \a\t h:i A') }}
            @else
                No start date available
            @endif
        </p>
    </div>

    <div class="mb-3">
        <p class="text-gray-700 text-15 dark:text-gray-100">
            Task Status: 
            @if ($task->status->id === 1)
        <span class="badge font-bold bg-blue-400 text-white text-sm px-1.5 py-[1.5px] rounded">
            <i class="mdi mdi-progress-wrench"></i> On Progress
        </span>

    @elseif($task->status->id === 2)
        <span class="badge font-bold bg-yellow-400 text-white text-sm px-1.5 py-[1.5px] rounded">
            <i class="mdi mdi-progress-clock"></i> On Hold
        </span>

    @elseif($task->status->id === 3)
        <span class="badge font-bold bg-green-600 text-white text-sm px-1.5 py-[1.5px] rounded">
            <i class="mdi mdi-progress-check"></i> Done
        </span>

    @else
        <span class="badge font-bold bg-red-400 text-white text-sm px-1.5 py-[1.5px] rounded">
            <i class="mdi mdi-progress-close"></i> Canceled
        </span>
    @endif
        </p>

        <p class="text-gray-700 text-15 dark:text-gray-100">
            Printed on: {{ date("l, d F Y \a\t h:i A") }}
        </p>
</div>
<div class="card-body">
    <div class="relative overflow-x-auto">
        <table class="w-full text-sm text-left text-gray-500 ">
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
                        Material Description
                    </th>
                    <th scope="col" class="px-6 py-3.5">
                        Material Name
                    </th>
                    <th scope="col" class="px-6 py-3.5">
                       Quantity (unit)
                    </th>
                    <th scope="col" class="px-6 py-3.5">
                       Material Status
                      
                    </th>
                </tr>
            </thead>
            <tbody>
                @if($materials)
                @foreach ($materials as $index => $material)
                    <tr class="bg-gray-50/60 dark:bg-zinc-600/50">
                        <th scope="row" class="px-6 py-3.5 font-medium text-gray-900 whitespace-nowrap dark:text-zinc-100">
                           {{ $index + 1 }}
                        </th>
                        <td class="px-6 py-3.5 dark:text-zinc-100">
                            {{ $material->created_at->format('l, d F Y \a\t h:i A') }}
                        </td>
                        <td class="px-6 py-3.5 dark:text-zinc-100">
                           {{ $material->user->name }} -  {{ $material->user->role->name }} 
                           @if ($material->user->trashed())
                               - Suspended
                           @endif
                        </td>
                        <td class="px-6 py-3.5 dark:text-zinc-100">
                            {{ $material->description }}
                        </td>
                        <td class="px-6 py-3.5 dark:text-zinc-100">
                            {{ $material->name }}
                        </td>
                        <td class="px-6 py-3.5 dark:text-zinc-100">
                            {{ $material->quantity }} ( {{ $material->unit->name }})
                        </td>
                        <td class="px-6 py-3.5 dark:text-zinc-100">
                          @if($material->is_carried)
                            <span class="badge font-medium bg-red-50 text-red-500 text-11 px-1.5 py-[1.5px] rounded dark:bg-red-500/20">Used</span>
                          @else
                            <span class="badge font-medium bg-yellow-50 text-yellow-500 text-11 px-1.5 py-[1.5px] rounded dark:bg-yellow-500/20">Returned</span>
                          @endif
                        </td>
                    </tr>
                @endforeach
            @endif
            </tbody>
        </table>
    </div>
</div>
</div>
@endsection

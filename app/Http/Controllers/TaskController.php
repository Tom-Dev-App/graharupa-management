<?php

namespace App\Http\Controllers;

use App\Models\MaterialUnit;
use App\Models\Project;
use App\Models\Status;
use App\Models\Task;
use App\Models\TaskMaterial;
use Illuminate\Contracts\Support\ValidatedData;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;

class TaskController extends Controller
{
    public function detail($pid, $id) {
        $pid = (int)$pid;
        $id = (int)$id;

        $task = Task::withTrashed()->with([
            'project' => function ($query) {
                $query->withTrashed();
            },
            'status',
            'user' => function ($query) {
                $query->withTrashed();
            }
        ])->findOrFail($id);

        $materials = TaskMaterial::with([
            'unit',
            'user' => function ($query) {
                $query->withTrashed();
            }
        ])->where('task_id', $id)->paginate(25);
    
        $units = MaterialUnit::all();

        if($task->project_id !== $pid){
            return redirect()->back()->with('error', 'Task does not belong to the specified project.');
        }

        if($task->project->trashed()){
            return redirect()->back()->with('error', 'Project is deleted, the task can\'t be opened.');
        }
        
        return view('pages.dashboard.task.detail', compact('materials', 'task', 'units'));
    }

    public function store($pid ,Request $request) {

                $pid = (int)$pid;
        
        $validatedData = $request->validate([
            'description' => 'required|min:5|max:1000',
            'datetime' => 'required|date',
        ]);

        $validatedData['project_id'] = $pid;
        $validatedData['percentage'] = 0;
        $validatedData['user_id'] = auth()->user()->id;
        $validatedData['status_id'] = Status::ON_PROGRESS;
        $validatedData['created_at'] = now();

        Task::create($validatedData);

        // Update project percentage
        $project = Project::find($pid);
        $project->updatePercentage();

        return redirect()->route('projects.detail', $pid)->with('success', 'Task created successfully.');;
    }

    public function edit($pid ,$id) {

        $pid = (int)$pid;
        $id = (int)$id;
        $statuses = Status::all();
        $project = Project::find($pid);
    
        if($project && $project->status_id !== Status::ON_PROGRESS) {
            return redirect()->back()->with('error', 'This Project is being HOLD or DONE or CANCELED, task can\'t be edited.');
        }
        
    $task = Task::with([
        'user' => function ($query) {
            $query->withTrashed();
        },
        'project' => function ($query) {
            $query->withTrashed();
        }
    ])->withTrashed()->find($id);
  if (!$task || $task->trashed()) {
        return redirect()->back()->with('error', 'Task has been deleted can\'t be edited.');
    }

        if (auth()->user()->id !== $task->user_id && auth()->user()->role_id !== 1) {
            abort(403, 'Forbidden');
        }

        if($task->project_id !== $pid){
            return redirect()->back()->with('error', 'Task does not belong to the specified project.');
        }

        if($task->project->trashed()){
            return redirect()->back()->with('error', 'Project is deleted, the task can\'t be opened.');
        }

        return view('pages.dashboard.task.edit', compact('statuses', 'task'));
    }

    public function update($pid ,$id, Request $request) {
                $pid = (int)$pid;
                $id = (int)$id;

        $validatedData = $request->validate([
            'description' => 'required|min:5|max:1000',
            'status' => 'required|integer|in:1,2,3,4',
            'start_date'  => 'required|date',
            'percentage' => 'required|int|min:0|max:100'
        ]);
                
        $task = Task::with(['user', 'project'])->withTrashed()->find($id);
        if (!$task) {
            return redirect()->back()->with('error', 'Task not found.');
        }
        if (auth()->user()->id !== $task->user_id && auth()->user()->role_id !== 1) {
            abort(403, 'Forbidden');
        }

        $taskUpdatedData = [
            'id' => $id,
            'description' => $validatedData['description'],
            'status_id' => $validatedData['status'],
            'datetime' => $validatedData['start_date'],
            'percentage' => $validatedData['percentage'],
            'updated_at' => now(),
        ];

        if($task->project_id !== $pid){
            return redirect()->back()->with('error', 'Task does not belong to the specified project.');
        }

        if($task->project->trashed()){
            return redirect()->back()->with('error', 'Project is deleted, the task can\'t be opened.');
        }
        
        Task::where('id', $id)->update($taskUpdatedData);

        // Update project percentage
        $task->project->updatePercentage();

        return redirect()->route('tasks.detail', ['pid' => $pid, 'id' => $id])->with('success', 'Task updated successfully.');
    }
   
    public function updateProgress($pid, $id, Request $request) {
        $pid = (int)$pid;
        $id = (int)$id;
        
        // Retrieve and validate the percentage input
        $percentage = $request->input('percentage');
    
        // Check if the percentage is provided
        if (is_null($percentage)) {
            return redirect()->back()->with('error', 'The percentage input is required.')->withInput();
        }
    
        // Custom validation logic
        if ($percentage < 0 || $percentage > 100) {
            return redirect()->back()->with('error', 'The percentage must be between 0 and 100.')->withInput();
        }
        
        // Fetch the task with user and project relationships
        $task = Task::with(['user', 'project'])->withTrashed()->find($id);
    
        // Check if the task belongs to the specified project
        if($task->project_id !== $pid){
            return redirect()->back()->with('error', 'Task does not belong to the specified project.');
        }
    
        // Check if the project is trashed
        if($task->project->trashed()){
            return redirect()->back()->with('error', 'Project is deleted, the task can\'t be opened.');
        }
    
        // Prepare the data for updating
        $taskUpdatedData = [
            'percentage' => $percentage, // Ensure the integer value is used here
            'updated_at' => now(),
        ];
    
        // Debugging: Check the data before update
        // dd([
        //     'task_id' => $id,
        //     'task_data' => $taskUpdatedData,
        //     'percentage_input' => $percentage
        // ]);
    
        // Update the task's percentage
        $updateStatus = Task::where('id', $id)->update($taskUpdatedData);
    
        // Debugging: Check if the update was successful
        if ($updateStatus) {
             // Update project percentage
             $task->project->updatePercentage();

            return redirect()->route('tasks.detail', ['pid' => $pid, 'id' => $id])->with('success', 'Task progress updated successfully.');
        } else {
            return redirect()->back()->with('error', 'Failed to update task progress. Please try again.');
        }
    }
    
    
    public function destroy(Request $request, $pid, $id) {
                $pid = (int)$pid;
                $id = (int)$id;
        $task = Task::with(['user' => function($query){
            $query->withTrashed();
        }])->findOrFail($id);

        if (auth()->user()->id !== $task->user_id && auth()->user()->role_id !== 1) {
            abort(403, 'Forbidden');
        }
        $task->delete();

        // Update project percentage
         $task->project->updatePercentage();
         
        return redirect()->back()->with('success', 'Task deleted successfully!');
    }
}
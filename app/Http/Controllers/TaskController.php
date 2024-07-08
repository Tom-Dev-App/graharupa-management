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
        // Ensure parameters are integers
        $pid = (int)$pid;
        $id = (int)$id;
        
        // dd($pid, $id);
        // Retrieve the task, including soft-deleted ones
        $task = Task::withTrashed()->with([
            'project' => function ($query) {
                $query->withTrashed();
            },
            'status',
            'user' => function ($query) {
                $query->withTrashed();
            }
        ])->findOrFail($id);
    
        // Retrieve materials for the task, including users (with soft-deleted ones)
        $materials = TaskMaterial::with([
            'unit',
            'user' => function ($query) {
                $query->withTrashed();
            }
        ])->where('task_id', $id)->paginate(25);
    
        // Retrieve all material units
        $units = MaterialUnit::all();

        if($task->project_id !== $pid){
            return redirect()->back()->with('error', 'Task does not belong to the specified project.');
        }

        if($task->project->trashed()){
            return redirect()->back()->with('error', 'Project is deleted, the task can\'t be opened.');
        }
        
        // dd($task);
        // Return the view with the retrieved data
        return view('pages.dashboard.task.detail', compact('materials', 'task', 'units'));
    }

    public function store($pid ,Request $request) {

                // Ensure parameters are integers
                $pid = (int)$pid;
        
        $validatedData = $request->validate([
            'description' => 'required|min:5|max:1000',
            'datetime' => 'required|date',
        ]);

        $validatedData['project_id'] = $pid;
        $validatedData['user_id'] = auth()->user()->id;
        $validatedData['status_id'] = Status::ON_PROGRESS;

        Task::create($validatedData);

        return redirect()->route('projects.detail', $pid)->with('success', 'Task created successfully.');;
    }

    public function edit($pid ,$id) {
                // Ensure parameters are integers
                $pid = (int)$pid;
                $id = (int)$id;
        $statuses = Status::all();
        $project = Project::find($pid);
        // dd($pid);
        if($project && $project->status_id !== Status::ON_PROGRESS) {
            return redirect()->route('projects.detail', $pid)->with('error', 'This Project is being HOLD or DONE or CANCELED, task can\'t be edited.');
        }
            // Retrieve the task with related user and project, including trashed tasks
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
                // Ensure parameters are integers
                $pid = (int)$pid;
                $id = (int)$id;

        $validatedData = $request->validate([
            'description' => 'required|min:5|max:1000',
            'status' => 'required|integer|in:1,2,3,4',
            'start_date'  => 'required|date'
        ]);
                
        $task = Task::with(['user', 'project'])->withTrashed()->find($id);
        if (auth()->user()->id !== $task->user_id && auth()->user()->role_id !== 1) {
            abort(403, 'Forbidden');
        }

        $taskUpdatedData = [
            'id' => $id,
            'description' => $validatedData['description'],
            'status_id' => $validatedData['status'],
            'datetime' => $validatedData['start_date'],
            'updated_at' => now(),
        ];

        if($task->project_id !== $pid){
            return redirect()->back()->with('error', 'Task does not belong to the specified project.');
        }

        if($task->project->trashed()){
            return redirect()->back()->with('error', 'Project is deleted, the task can\'t be opened.');
        }
        
        Task::where('id', $id)->update($taskUpdatedData);

        return redirect()->route('tasks.detail', ['pid' => $pid, 'id' => $id])->with('success', 'Task updated successfully.');
    }

    public function destroy(Request $request, $pid, $id) {
                // Ensure parameters are integers
                $pid = (int)$pid;
                $id = (int)$id;
        $task = Task::with(['user' => function($query){
            $query->withTrashed();
        }])->findOrFail($id);

        if (auth()->user()->id !== $task->user_id && auth()->user()->role_id !== 1) {
            abort(403, 'Forbidden');
        }
        $task->delete();
        
        return redirect()->back()->with('success', 'Task deleted successfully!');
    }
}

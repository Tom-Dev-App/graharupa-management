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
        $task = Task::withTrashed()->with([
            'project' => function ($query) {
                $query->withTrashed();
            },
            'status',
            'user' => function ($query) {
                $query->withTrashed();
            }
        ])->find($id);

        $materials = TaskMaterial::with([
            'unit' ,
            'user'
        ])->paginate(25);

        // dd($materials);
        $units = MaterialUnit::all();
         return view('pages.dashboard.task.detail', compact('materials', 'task', 'units'));
     }

    public function store($pid ,Request $request) {

        
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
        return view('pages.dashboard.task.edit', compact('statuses', 'task'));
    }

    public function update($pid ,$id, Request $request) {

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
        Task::where('id', $id)->update($taskUpdatedData);

        return redirect()->route('projects.detail', ['id' => $pid])->with('success', 'Task updated successfully.');
    }

    public function destroy(Request $request, $pid, $id) {
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

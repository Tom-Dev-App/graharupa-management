<?php

namespace App\Http\Controllers;

use App\Models\MaterialUnit;
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
            'project',
            'status',
            'user' => function ($query) {
                $query->withTrashed();
            }
        ])->find($id);

        $materials = TaskMaterial::with(['unit, user', 'user.role'])->where('id' , $id)->paginate('25');
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
        // dd($id);
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

    public function update($id, Request $request) {

        $validatedData = $request->validate([
            'description' => 'required|min:5|max:1000',
            'status' => 'required|integer|in:1,2,3,4'
        ]);
                
        $task = Task::with(['user', 'project'])->withTrashed()->find($id);
        if (auth()->user()->id !== $task->user_id && auth()->user()->role_id !== 1) {
            abort(403, 'Forbidden');
        }

        $taskUpdatedData = [
            'id' => $id,
            'description' => $validatedData['description'],
            'status_id' => $validatedData['status'],
            'updated_at' => now(),
        ];
        Task::where('id', $id)->update($taskUpdatedData);

        return redirect()->route('projects.index')->with('success', 'Project updated successfully.');
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

<?php

namespace App\Http\Controllers;

use App\Models\Status;
use App\Models\Task;
use App\Models\TaskMaterial;
use Illuminate\Http\Request;

class TaskController extends Controller
{
    public function detail($id) {
       $materials = TaskMaterial::with('unit')->paginate('25');
        return view('pages.dashboard.project.task', compact('materials'));
    }

    public function store($pid ,Request $request) {
        $validatedData = $request->validate([
            'description' => 'required|min:5|max:1000',
            'datetime' => 'required|datetime'
        ]);

        $validatedData['project_id'] = $pid;
        $validatedData['user_id'] = auth()->user()->id;
        $validatedData['status_id'] = Status::ON_PROGRESS;

        Task::create($validatedData);

        return redirect()->route('projects.index')->with('success', 'Task created successfully.');;
    }

    public function edit($id) {
        $statuses = Status::all();

        $task = Task::withTrashed()->with('user')->find($id);
        return view('pages.dashboard.task.edit', compact('statuses', 'task'));
    }

    public function update($id, Request $request) {
        $validatedData = $request->validate([
            'description' => 'required|min:5|max:1000',
            'datetime' => 'required|datetime',
            'status_id' => 'required|integer|in:1,2,3,4'
        ]);

        $validatedData['updated_at'] = now();

        Task::where('id', $id)->update($validatedData);

        return redirect()->route('projects.index')->with('success', 'Project updated successfully.');
    }

    public function delete() {
        dd(request()->all);
        return view('pages.dashboard.project.task');
    }
}

<?php

namespace App\Http\Controllers;

use App\Models\Project;
use App\Models\Role;
use App\Models\Status;
use App\Models\Task;
use App\Models\TaskMaterial;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Validation\Rule;

class TaskMaterialController extends Controller
{
    public function store(Request $request , $pid, $id) {
                // Ensure parameters are integers
                $pid = (int)$pid;
                $id = (int)$id;
                
        $task = Task::withTrashed()->with([
            'project' => function ($query) {
                $query->withTrashed();},
            'user' => function ($query) {
                $query->withTrashed();
            }
        ])->find($id);

        if($task->trashed() || $task->status_id === Status::CANCELED || 
        $task->status_id === Status::DONE  || 
        $task->status_id === Status::ON_HOLD || 
        $task->project->status_id === Status::DONE || 
        $task->project->status_id === Status::CANCELED || 
        $task->project->status_id === Status::ON_HOLD || $task->project->trashed()) {
           return redirect()->back()->with('error', 'Task or Project is being DONE, CANCELED, HOLD, material can\'t be added!');
        }

            // Validate 
            $validatedData = $request->validate([
                'name' => 'required|string|max:255',
                'quantity' => 'required|numeric|min:0',
                'is_used' => 'required|boolean', // Convert 'is_used' to boolean
                'description' => 'required|string|min:20',
                'unit' => 'required|integer|exists:material_units,id',
            ]);
            // Additional data
            $validatedData['user_id'] = Auth::id();
            $validatedData['task_id'] = $id;
            $validatedData['material_unit_id'] = $request->unit;
            $validatedData['is_carried'] = $request->input('is_used');
    
        // Create the record
        $record = TaskMaterial::create([
            'name' => $request->name,
            'description' => $request->description,
            'quantity' => $request->quantity,
            'material_unit_id' => $request->unit,
            'is_carried' => $request->is_used,
            'task_id' => $task->id,
            'user_id' => Auth::id(),

        ]);
    
        // Redirect or return response
        return redirect()->route('tasks.detail', ['pid' => $pid, 'id' => $id])->with('success', 'Material has been added');

    }

    public function destroy(Request $request, $pid, $id, $mid) {
                // Ensure parameters are integers
                $pid = (int)$pid;
                $id = (int)$id;
                $mid = (int)$mid;

        // Find the task with trashed records
        $task = Task::withTrashed()->with([
            'project' => function ($query) {
                $query->withTrashed();
            },
            'user' => function ($query) {
                $query->withTrashed();
            }
        ])->findOrFail($id);
    
        // Check if the task or project is in an invalid state
        if ($task->trashed() || 
            in_array($task->status_id, [Status::CANCELED, Status::DONE, Status::ON_HOLD]) || 
            in_array($task->project->status_id, [Status::DONE, Status::CANCELED, Status::ON_HOLD]) || 
            $task->project->trashed()) {
            return redirect()->back()->with('error', 'Task or Project is DONE, CANCELED, ON HOLD, material can\'t be deleted!');
        }
    
        // Find the material with trashed records
        $material = TaskMaterial::withTrashed()->with(['user' => function($query) {
            $query->withTrashed();
        }])->where('id', $mid)->where('task_id', $id)->firstOrFail();


            if ( auth()->user()->role_id === Role::MANAGER ) {
                    // Delete the material
                        $material->forceDelete();
                    
                        return redirect()->back()->with('success', 'Material deleted successfully.');
                }

        if(auth()->id() === $material->user_id) {
            
            // Delete the material
            $material->forceDelete();
        
            return redirect()->back()->with('success', 'Material deleted successfully.');
        }

        return redirect()->back()->with('error', 'You are not authorized to delete this material.');

    }
    

    public function summarize(Request $request, $pid, $id)
    {
                // Ensure parameters are integers
                $pid = (int)$pid;
                $id = (int)$id;
                

        $project = Project::withTrashed()->find($pid);
        $task = Task::withTrashed()->find($id);

        if (!empty($request->date)) {
            // Filter by specific date
            $materials = TaskMaterial::with([
                'unit',
                'user' => function ($query) {
                    $query->withTrashed()
                          ->orWhereNull('deleted_at');
                },
                'task.project'
            ])
            ->where('task_id', $id)
            ->where(function ($query) use ($request) {
                $query->whereRaw("DATE(created_at) = ?", $request->date);
            })
            ->get();
        } else {
            // No date provided, get all materials for the task_id
            $materials = TaskMaterial::with([
                'unit',
                'user' => function ($query) {
                    $query->withTrashed()
                          ->orWhereNull('deleted_at');
                },
                'task.project'
            ])
            ->where('task_id', $id)
            ->get();
        }
    
    
        return view('pages.dashboard.task.material-summary', compact('materials', 'project', 'task'));
    }
    
}

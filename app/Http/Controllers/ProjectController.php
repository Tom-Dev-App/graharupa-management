<?php

namespace App\Http\Controllers;

use App\Models\AttachmentForItem;
use App\Models\Comment;
use App\Models\Project;
use App\Models\Status;
use App\Models\Task;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;

class ProjectController extends Controller
{

    public function index()
    {
        $projects = Project::with('status')->orderBy('id', 'desc')->get();
        
        return view('pages.dashboard.project.index', compact('projects'));
    }

    public function detail(Request $request, $id) {
        $id = (int)$id;

        $project = Project::with(['tasks', 'status'])->find($id); 
        if (!$project || $project->trashed()) {
            return redirect()->route('projects.index')->with('error', 'Project has been deleted can\'t be opened.');
            }
        // $comments = Comment::with(['user', 'attachment_types'])
        // ->join('attachment_for_items', function ($join) {
        //     $join->on('comments.related_id', '=', 'attachment_for_items.id')
        //         ->where('attachment_for_items.type', AttachmentForItem::PROJECT);
        // });
        $tasks = Task::withTrashed()->with(['user' , 'status'])->where("project_id", $id)->latest()->get();

        $task_completed_count = Task::where('status_id', Status::DONE)->where('project_id', $id)->count();

        $task_progress_count = Task::where('status_id', Status::ON_PROGRESS)->where('project_id', $id)->count();
        
        $task_hold_count = Task::where('status_id', Status::ON_HOLD)->where('project_id', $id)->count();

        $task_canceled_count = Task::where('status_id', Status::CANCELED)->where('project_id', $id)->count();
        
        return view('pages.dashboard.project.detail', compact('id', 'project', 'tasks', 'task_completed_count', 'task_progress_count', 'task_hold_count', 'task_canceled_count'));
    }

    public function store(Request $request)
    {   
        Gate::authorize('manager');

        $validatedData = $request->validate([
            'name' => 'required|min:5|max:100',
            'description' => 'required|min:5|max:1000',
            'deadline' => 'required|date'
        ]);

        $validatedData['status_id'] = Status::ON_PROGRESS;

        Project::create($validatedData);

        return redirect()->route('projects.index')->with('success', 'Project created successfully.');
    }
   
    public function edit($id) {
        $id = (int)$id;
         Gate::authorize('manager');
        $statuses = Status::all();
        $project = Project::withTrashed()->find($id);
        if (!$project || $project->trashed()) {
       return redirect()->route('projects.index')->with('error', 'Project has been deleted can\'t be edited.');
           }

        return view('pages.dashboard.project.edit', compact('statuses', 'project'));
    }

    public function update($id, Request $request) {
        $id = (int)$id;
        $project = Project::withTrashed()->find($id);
        if (!$project || $project->trashed()) {
            return redirect()->route('projects.index')->with('error', 'Project has been deleted can\'t be edited.');
                }
        
        Gate::authorize('manager');
        $validatedData = $request->validate([
            'name' => 'required|min:5|max:100',
            'description' => 'required|min:5|max:1000',
            'deadline' => 'required|date',
            'status_id' => 'required|integer|in:1,2,3,4'
        ]);

        $validatedData['updated_at'] = now();

        Project::where('id', $id)->update($validatedData);
        

        return redirect()->route('projects.index')->with('success', 'Project updated successfully.');
    }


    public function destroy($id) {
        $id = (int)$id;
        Gate::authorize('manager');
        $project = Project::findOrFail($id);
        $project->delete();
        return redirect()->route('projects.index')->with('success', 'Project deleted successfully.');
    }
}

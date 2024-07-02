<?php

namespace App\Http\Controllers;

use App\Models\Project;
use App\Models\Status;
use Illuminate\Http\Request;

class ProjectController extends Controller
{
    public function index()
    {
        $projects = Project::with('status', 'user')->orderBy('updated_at', 'desc')->get();
        return view('pages.dashboard.project.index', compact('projects'));
    }

    public function detail(Request $request, $id) {
        return view('pages.dashboard.project.detail', compact('id'));
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required|min:5|max:100',
            'description' => 'required|min:5|max:1000',
            'deadline' => 'required|date'
        ]);

        $validatedData['user_id'] = auth()->user()->id;
        $validatedData['status_id'] = Status::ON_PROGRESS;

        Project::create($validatedData);

        return redirect()->route('projects.index')->with('success', 'Project created successfully.');
    }
   
    public function edit($id) {
        $statuses = Status::all();

        $project = Project::withTrashed()->with('user')->find($id);

        return view('pages.dashboard.project.edit', compact('statuses', 'project'));
    }

    public function update($id, Request $request) {
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
        $project = Project::findOrFail($id);
        $project->delete();
        return redirect()->route('projects.index')->with('success', 'Project deleted successfully.');
    }
}

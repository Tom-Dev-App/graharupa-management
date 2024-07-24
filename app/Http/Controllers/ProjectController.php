<?php

namespace App\Http\Controllers;

use App\Charts\TaskPieChart;
use App\Models\AttachmentForItem;
use App\Models\Comment;
use App\Models\Project;
use App\Models\Status;
use App\Models\Task;
use Carbon\Carbon;
use DateTime;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Gate;

class ProjectController extends Controller
{


    public function index()
    {
        $projects = Project::with('status')->where('is_hidden', false)->orderBy('id', 'desc')->get();
        
        // Update is_hidden for projects with end_date less than today
        Project::where('end_date', '<=', now())->update(['is_hidden' => true]); // Hide past projects

        return view('pages.dashboard.project.index', compact('projects'));
    }

    public function indexHidden()
    {
        Gate::authorize('admin');
        $projects = Project::with('status')->where('is_hidden', true)->orderBy('id', 'desc')->get();
        
        return view('pages.dashboard.project.hidden', compact('projects'));
    }

    public function detail(Request $request, $id) {
        $id = (int)$id;

        $project = Project::with(['tasks', 'status'])->find($id); 
        if (!$project || $project->trashed()) {
            return redirect()->route('projects.index')->with('error', 'Project has been deleted can\'t be opened.');
            }

        $tasks = Task::withTrashed()->with(['user' , 'status'])->where("project_id", $id)->latest()->get();

        $task_completed_count = Task::where('status_id', Status::DONE)->where('project_id', $id)->count();

        $task_progress_count = Task::where('status_id', Status::ON_PROGRESS)->where('project_id', $id)->count();
        
        $task_hold_count = Task::where('status_id', Status::ON_HOLD)->where('project_id', $id)->count();

        $task_canceled_count = Task::where('status_id', Status::CANCELED)->where('project_id', $id)->count();
        

        // $tasks = $project->tasks()->where('status_id', '<>', Status::CANCELED)->get();

        // // Initialize counters for each range
        // $range1 = 0; // 0% - 25%
        // $range2 = 0; // 26% - 50%
        // $range3 = 0; // 51% - 75%
        // $range4 = 0; // 76% - 100%
    
        // foreach ($tasks as $task) {
        //     $percentage = $task->percentage;
        //     if ($percentage <= 25) {
        //         $range1++;
        //     } elseif ($percentage <= 50) {
        //         $range2++;
        //     } elseif ($percentage <= 75) {
        //         $range3++;
        //     } else {
        //         $range4++;
        //     }
        // }
    
        // $chartData = [
        //     'labels' => ['0-25%', '26-50%', '51-75%', '76-100%'],
        //     'data' => [$range1, $range2, $range3, $range4],
        //     'colors' => ['#4BA6EF', '#ffbf53', '#2ab57d', '#FD625E']
        // ];
        
        // Get the task counts for each percentage range
$taskCounts = $project->tasks()
->select(DB::raw("
    COALESCE(SUM(CASE WHEN percentage <= 25 THEN 1 ELSE 0 END), 0) as range1,
    COALESCE(SUM(CASE WHEN percentage > 25 AND percentage <= 50 THEN 1 ELSE 0 END), 0) as range2,
    COALESCE(SUM(CASE WHEN percentage > 50 AND percentage <= 75 THEN 1 ELSE 0 END), 0) as range3,
    COALESCE(SUM(CASE WHEN percentage > 75 THEN 1 ELSE 0 END), 0) as range4
"))
->where('status_id', '<>', Status::CANCELED)
->first();

$chartData = [
'labels' => ['Progress 0-25%', 'Progress 26-50%', 'Progress 51-75%', 'Progress 76-100%'],
'data' => [
    $taskCounts->range1,
    $taskCounts->range2,
    $taskCounts->range3,
    $taskCounts->range4
],
'colors' => ['#FD625E', '#ffbf53', '#4BA6EF', '#2ab57d']
];

        if($project->is_hidden) {
            Gate::authorize('admin');
            return view('pages.dashboard.project.detail', compact('id', 'project', 'tasks', 'task_completed_count', 'task_progress_count', 'task_hold_count', 'task_canceled_count', 'chartData'));
        }
        return view('pages.dashboard.project.detail', compact('id', 'project', 'tasks', 'task_completed_count', 'task_progress_count', 'task_hold_count', 'task_canceled_count', 'chartData'));
    }

    public function store(Request $request)
    {   
        Gate::authorize('admin');

        $validatedData = $request->validate([
            'name' => 'required|min:5|max:100',
            'description' => 'required|min:5|max:1000',
            'start_date' => 'required|date',
            'end_date' => 'required|date',

        ]);

        // Calculate duration in weeks
        $startDate = \Carbon\Carbon::parse($validatedData['start_date']);
        $endDate = \Carbon\Carbon::parse($validatedData['end_date']);
        $validatedData['duration'] = floor($startDate->diffInWeeks($endDate)); // Store as integer

        $validatedData['status_id'] = Status::ON_PROGRESS;
        $validatedData['is_hidden'] = false;

        Project::create($validatedData);

        return redirect()->route('projects.index')->with('success', 'Project created successfully.');
    }
   
    public function edit($id) {
        $id = (int)$id;
         Gate::authorize('admin');
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
            return redirect()->route('projects.index')->with('error', 'Project has been deleted and can\'t be edited.');
        }
        
        Gate::authorize('admin');
        
        $validatedData = $request->validate([
            'name' => 'required|min:5|max:100',
            'description' => 'required|min:5|max:1000',
            'start_date' => 'required|date',
            'end_date' => 'required|date',
            'status_id' => 'required|integer|in:1,2,3,4',
        ]);
        // dd($request);
        // Convert is_hidden to boolean
        // dd($request->is_hidden == '1');
        $validatedData['is_hidden'] = $request->is_hidden == 1; // Convert 1 or 0 to boolean
    
        // Create Carbon instances for comparison
        // $now = Carbon::now();
        // $endDate = Carbon::parse($validatedData['end_date']);
 
        // Debugging: Log the received date values
        // \Log::info('Current datetime:', ['now' => $now->toDateTimeString()]);
        // \Log::info('End date:', ['end_date' => $endDate->toDateTimeString()]);
        
        // Check if is_hidden is false and end_date is today or in the future
        // if (!$validatedData['is_hidden']) {
        //     // if($endDate->isPast()) {
        //     //     return redirect()->back()->with('error', 'Project cannot be updated because the end date is in the past while hidden from employee is false.');
        //     // }
        //     if($validatedData['end_date'] <= now()) {
        //         return redirect()->back()->with('error', 'Project cannot be updated because the end date is in the past while hidden from employee is false.');
        //     }
        //     $startDate = Carbon::parse($validatedData['start_date']);
        //     $validatedData['duration'] = $startDate->diffInWeeks($endDate);
        //     $validatedData['updated_at'] = now();
        //     $project->update($validatedData);
    
        //     return redirect()->route('projects.detail', $id)->with('success', 'Project updated successfully.');
        // }
    
        
        $startDate = Carbon::parse($validatedData['start_date']);
        $endDate = Carbon::parse($validatedData['end_date']);
        $validatedData['duration'] = floor($startDate->diffInWeeks($endDate)); // Store as integer
    
        $validatedData['updated_at'] = now();
    
        // Update the project
        $project->update($validatedData);
    
        return redirect()->route('projects.detail', $id)->with('success', 'Project updated successfully.');
    }
    


    public function destroy($id) {
        $id = (int)$id;
        Gate::authorize('manager');
        $project = Project::findOrFail($id);
        $project->delete();
        return redirect()->route('projects.index')->with('success', 'Project deleted successfully.');
    }
}
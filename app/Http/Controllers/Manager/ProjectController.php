<?php

namespace App\Http\Controllers\Manager;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Project;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class ProjectController extends Controller
{


    // Dashboard
    public function dashboard()
    {
        return view('manager.dashboard');
    }

    // Tasks list (projects assigned to manager)
    public function tasks()
    {
        $projects = Project::where('assigned_manager_id', Auth::id())
            ->orderByDesc('created_at')
            ->get();

        return view('manager.tasks', compact('projects'));
    }


    // Show create_task blade
    public function createTask(Project $project)
    {
        $this->authorizeManager($project);
        return view('manager.create_task', compact('project'));
    }

    // Store/update manager input for project
    public function storeTask(Request $request, Project $project)
    {
        $this->authorizeManager($project);

        $data = $request->validate([
            'mashaar' => 'nullable|string|max:255',
            'nationality' => 'nullable|string|max:255',
            'center_number' => 'nullable|string|max:255',
            'category' => 'nullable|string|max:255',
            'total_area' => 'nullable|numeric',
            'tent_area' => 'nullable|numeric',
            'pilgrims_count' => 'nullable|integer',
            'contractor' => 'nullable|string|max:255',
            'google_map_link' => 'nullable|url|max:1000',
            'map_file' => 'nullable|file|mimes:pdf|max:10240',
            'status' => 'nullable|in:لم تبدأ,قيد التنفيذ,مكتملة',
        ]);

        if ($request->hasFile('map_file')) {
            $file = $request->file('map_file');
            $filename = time() . '_' . $file->getClientOriginalName();
            $file->storeAs('public/project_maps', $filename);

            // delete old file if exists
            if ($project->map_file_name) {
                Storage::delete('public/project_maps/' . $project->map_file_name);
            }

            $data['map_file_name'] = $filename;
        }

        $project->update(array_filter($data, fn($v) => $v !== null));

        return redirect()->route('manager.tasks')->with('success', 'تم حفظ بيانات المشروع بنجاح');
    }

    protected function authorizeManager(Project $project)
    {
        if ($project->assigned_manager_id !== Auth::id()) abort(403, 'غير مصرح');
    }
}

<?php

namespace App\Http\Controllers\Manager;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Project;
use App\Models\ProjectFile;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Validation\Rule;

class ProjectController extends Controller
{

    public function dashboard()
    {
        return view('manager.dashboard');
    }
 
    public function tasks()
    {
        $projects = Project::where('assigned_manager_id', Auth::id())
            ->orderByDesc('created_at')
            ->get();

        return view('manager.tasks', compact('projects'));
    }

    public function show(Project $project)
    {
        $this->authorizeManager($project);
        $project->load('files','assigned_manager');
        return view('manager.projects.show', compact('project'));
    }

    public function createTask(Project $project)
    {
        $this->authorizeManager($project);
        $project->load('files','assigned_manager');
        return view('manager.create_task', compact('project'));
    }

  
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

   
            'status' => ['nullable', Rule::in(['لم تبدأ','قيد التنفيذ','مكتملة'])],

            'ac_capacity' => 'nullable|numeric',
            'transformer_numbers' => 'nullable|string|max:255',

            'pre_allocation_received' => ['nullable', Rule::in(['تم','لم يتم'])],
            'pre_allocation_reason' => 'nullable|string',
            'pre_allocation_files.*' => 'nullable|file|mimes:pdf,jpg,jpeg,png|max:20480',

            'site_received_from_kdana' => ['nullable', Rule::in(['تم','لم يتم'])],
            'site_received_reason' => 'nullable|string',
            'site_received_files.*' => 'nullable|file|mimes:pdf,jpg,jpeg,png|max:20480',

            'reschedule_date' => 'nullable|date',

            'license_received' => ['nullable', Rule::in(['تم','لم يتم'])],
            'license_reason' => 'nullable|string',
            'license_files.*' => 'nullable|file|mimes:pdf,jpg,jpeg,png|max:20480',
        ]);

        if ($request->hasFile('map_file')) {
            $file = $request->file('map_file');
            $origName = $file->getClientOriginalName();
            $filename = time() . '_' . preg_replace('/\s+/', '_', $origName);
            $path = $file->storeAs('public/project_maps', $filename);

            // delete old disk file if exists
            if ($project->map_file_name) {
                Storage::delete('public/project_maps/' . $project->map_file_name);
            }

            $data['map_file_name'] = $filename;

        
            ProjectFile::create([
                'project_id' => $project->id,
                'file_name'  => $origName,
                'file_path'  => $path,
            ]);
        }

        $storeFiles = function ($filesArray) use ($project) {
            $savedPaths = [];
            if (!$filesArray) return $savedPaths;
            foreach ($filesArray as $f) {
                if (!$f || !$f->isValid()) continue;
                $orig = $f->getClientOriginalName();
                $stored = time() . '_' . preg_replace('/\s+/', '_', $orig);
                $path = $f->storeAs('public/project_files', $stored);

                ProjectFile::create([
                    'project_id' => $project->id,
                    'file_name' => $orig,
                    'file_path' => $path,
                ]);

                $savedPaths[] = $path;
                usleep(3000);
            }
            return $savedPaths;
        };


        $preSaved = $storeFiles($request->file('pre_allocation_files') ?: []);
        $siteSaved = $storeFiles($request->file('site_received_files') ?: []);
        $licenseSaved = $storeFiles($request->file('license_files') ?: []);
        $existing = $project->pre_execution_files ?? [];
        $data['pre_execution_files'] = array_values(array_filter(array_merge($existing, $preSaved, $siteSaved, $licenseSaved)));

    
        $project->update(array_filter($data, fn($v) => $v !== null));

        return redirect()->route('manager.projects.before_task', $project->id)
            ->with('success', 'تم حفظ بيانات المشروع بنجاح');
    }

    
    public function before_task(Project $project)
    {
        $this->authorizeManager($project);
        $project->load('files', 'assigned_manager');
        return view('manager.before_task', compact('project')); // <- your blade is before_task
    }
    
    protected function authorizeManager(Project $project)
    {
        if ($project->assigned_manager_id !== Auth::id()) {
            abort(403, 'غير مصرح');
        }
    }
}

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
        $project->load('files', 'assigned_manager');
        return view('manager.projects.show', compact('project'));
    }

    public function createTask(Project $project)
    {
        $this->authorizeManager($project);
        $project->load('files', 'assigned_manager');
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

            'status' => ['nullable', Rule::in(['لم تبدأ', 'قيد التنفيذ', 'مكتملة'])],

            'ac_capacity' => 'nullable|numeric',
            'transformer_numbers' => 'nullable|string|max:255',

            'pre_allocation_received' => ['nullable', Rule::in(['تم', 'لم يتم'])],
            'pre_allocation_reason' => 'nullable|string',
            'pre_allocation_files.*' => 'nullable|file|mimes:pdf,jpg,jpeg,png|max:20480',

            'site_received_from_kdana' => ['nullable', Rule::in(['تم', 'لم يتم'])],
            'site_received_reason' => 'nullable|string',
            'site_received_files.*' => 'nullable|file|mimes:pdf,jpg,jpeg,png|max:20480',

            'reschedule_date' => 'nullable|date',

            'license_received' => ['nullable', Rule::in(['تم', 'لم يتم'])],
            'license_reason' => 'nullable|string',
            'license_files.*' => 'nullable|file|mimes:pdf,jpg,jpeg,png|max:20480',
        ]);



        if ($request->hasFile('map_file')) {
            $file = $request->file('map_file');
            $origName = $file->getClientOriginalName();
            $filename = time() . '_' . preg_replace('/\s+/', '_', $origName);
            $path = $file->storeAs('public/project_maps', $filename);

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
            if (!$filesArray) return [];
            $saved = [];

            foreach ($filesArray as $file) {
                if (!$file || !$file->isValid()) continue;

                $orig = $file->getClientOriginalName();
                $stored = time() . '_' . preg_replace('/\s+/', '_', $orig);
                $path = $file->storeAs('public/project_files', $stored);

                ProjectFile::create([
                    'project_id' => $project->id,
                    'file_name' => $orig,
                    'file_path' => $path,
                ]);

                $saved[] = $path;
                usleep(3000);
            }

            return $saved;
        };

        $data['pre_execution_files'] = array_merge(
            $project->pre_execution_files ?? [],
            $storeFiles($request->file('pre_allocation_files')),
            $storeFiles($request->file('site_received_files')),
            $storeFiles($request->file('license_files'))
        );

        $project->update(array_filter($data, fn($v) => $v !== null));

        return redirect()
            ->route('manager.projects.before_task', $project->id)
            ->with('success', 'تم حفظ البيانات والانتقال إلى مرحلة قيد التنفيذ');
    }



    public function before_task(Project $project)
    {
        $this->authorizeManager($project);
        $project->load('files', 'assigned_manager');
        return view('manager.before_task', compact('project')); // <- your blade is before_task
    }

    public function storeBeforeTask(Request $request, Project $project)
    {
        $this->authorizeManager($project);

        $data = $request->validate([
            'pre_allocation_received' => ['required', Rule::in(['تم', 'لم يتم'])],
            'pre_allocation_reason' => 'nullable|string',

            'site_received_from_kdana' => ['required', Rule::in(['تم', 'لم يتم'])],
            'site_received_reason' => 'nullable|string',

            'license_received' => ['required', Rule::in(['تم', 'لم يتم'])],
            'license_reason' => 'nullable|string',

            'reschedule_date' => 'nullable|date',
        ]);

        $data['status'] = 'قيد التنفيذ';

        $project->update($data);

        return redirect()
            ->route('manager.tasks')
            ->with('success', 'تم إنهاء مرحلة لم تبدأ والانتقال إلى قيد التنفيذ');
    }


    protected function authorizeManager(Project $project)
    {
        if ($project->assigned_manager_id !== Auth::id()) {
            abort(403, 'غير مصرح');
        }
    }
}

<?php

namespace App\Http\Controllers\Manager;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Project;
use App\Models\ProjectFile;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Auth;

class ProjectFileController extends Controller
{

    public function store(Request $request, Project $project)
    {
        if ($project->assigned_manager_id !== Auth::id()) abort(403);

        $request->validate([
            'file' => 'required|file|mimes:pdf,jpg,jpeg,png,zip,doc,docx|max:20480',
        ]);

        $file = $request->file('file');
        $origName = $file->getClientOriginalName();
        $storedName = time() . '_' . preg_replace('/\s+/', '_', $origName);
        $path = $file->storeAs('public/project_files', $storedName);

        ProjectFile::create([
            'project_id' => $project->id,
            'file_name' => $origName,
            'file_path' => $path,
        ]);

        return back()->with('success', 'تم رفع الملف بنجاح');
    }

    public function download(Project $project, ProjectFile $file)
    {
        if ($file->project_id !== $project->id) abort(404);
        if ($project->assigned_manager_id !== Auth::id()) abort(403);
        if (!Storage::exists($file->file_path)) abort(404, 'File not found');

        return Storage::download($file->file_path, $file->file_name);
    }

    public function destroy(Project $project, ProjectFile $file)
    {
        if ($file->project_id !== $project->id) abort(404);
        if ($project->assigned_manager_id !== Auth::id()) abort(403);

        if (Storage::exists($file->file_path)) Storage::delete($file->file_path);
        $file->delete();

        return back()->with('success', 'تم حذف الملف');
    }
}

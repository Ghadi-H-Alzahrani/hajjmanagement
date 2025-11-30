<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Project;
use App\Models\User;

class ProjectController extends Controller
{
    // Show all projects (index page)
    public function index()
    {
        $projects = Project::all();
        return view('admin.project', compact('projects'));
    }

    // Show create form
    public function create()
    {

        $managers = User::where('role', 'manager')->get();

        return view('admin.create_project', compact('managers'));
    }


    public function store(Request $request)
    {


        $project = Project::create([
            'name' => $request->name,
            'assigned_manager_id' => $request->assigned_manager,
            'note' => $request->note,
        ]);


        return redirect()->route('admin.project.index')->with('success', 'تم إنشاء المشروع بنجاح');
    }
}

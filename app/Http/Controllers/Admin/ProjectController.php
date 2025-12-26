<?php

namespace App\Http\Controllers\Admin;

use App\Models\Admin\Project;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\ProjectRequest;
use Illuminate\Support\Facades\Storage;
use App\Models\Admin\Services;

class ProjectController extends Controller
{

    public function index()
    {
        return view('admin.project.index',['projects' => Project::latest()->paginate(10)]);
    }

    public function create()
    {
        $services = Services::all();
        return view('admin.project.create', compact('services'));
    }


    public function store(ProjectRequest $request)
    {
        $data = $request->validated();
        $data['images'] = $request->input('uploaded_images', []);
        $project = Project::create($data);
        if ($request->has('services')) {
            $project->services()->sync($request->input('services'));
        }
        return redirect()->route('project.index')->with('success', 'Project created successfully.');
    }


    public function show(Project $project)
    {
        //
    }


    public function edit(Project $project)
    {
        $services = Services::all();
        return view('admin.project.edit', compact('project', 'services'));
    }


    public function update(ProjectRequest $request, Project $project)
    {
        $data = $request->validated();

        $existingImages = $project->images ?? [];
        $uploadedImages = $request->input('uploaded_images', []);
        $removeImages = $request->input('remove_images', []);


        foreach ($removeImages as $image) {
            Storage::disk('public')->delete($image);
        }


        $remainingImages = array_diff($existingImages, $removeImages);


        $data['images'] = array_values(array_merge($remainingImages, $uploadedImages));

        $project->update($data);
        if ($request->has('services')) {
            $project->services()->sync($request->input('services'));
        }
        return redirect()->route('project.index')->with('success', 'Project updated successfully.');
    }


    public function destroy(Project $project)
    {
        $project->delete();
        return redirect()->route('project.index');
    }
    public function toggleActive(Request $request, $id)
    {
        $project = Project::findOrFail($id);
        $project->active = $request->input('active');
        $res = 0;
       if($project->save()){
        $res = 1;
       }
       return response()->json(['success' => true]);
    }

    public function Image(Request $request)
    {
        $request->validate([
            'file' => 'required|mimes:jpeg,png,jpg,gif,webp,svg,svg+xml|max:5120', // max 5MB
        ]);

        if ($request->hasFile('file')) {
            $path = $request->file('file')->store('project_images', 'public');
            return response()->json(['file_path' => $path]);
        }

        return response()->json(['error' => 'No file uploaded'], 400);
    }


}

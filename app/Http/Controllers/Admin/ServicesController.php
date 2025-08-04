<?php

namespace App\Http\Controllers\Admin;

use App\Models\Admin\Services;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;
use App\Http\Requests\admin\ServicesRequest;

class ServicesController extends Controller
{


    public function index()
    {
        return view('admin.services.index',['services' => Services::paginate(12)]);
    }

    public function create()
    {
        return view('admin.services.create');
    }

    public function store(ServicesRequest $request)
    {
        $data = $request->validated();
        if ($request->hasFile('image')) {
            $data['image'] = $request->file('image')->store('services_images', 'public');
        }
        if ($request->hasFile('icon')) {
            $data['icon'] = $request->file('icon')->store('service_icons', 'public');
        }
        if ($request->hasFile('dark_icon')) {
            $data['dark_icon'] = $request->file('dark_icon')->store('service_icons', 'public');
        }
        Services::create($data);

        return redirect()->route('services.index')->with('success', 'Service created successfully.');
    }


    public function show(Services $services)
    {

    }

    public function edit(Services $service)
    {
        return view('admin.services.edit',['service'=>$service]);
    }

    public function update(ServicesRequest $request, Services $service)
    {
        $data = $request->validated();
        if ($request->has('remove_image') && $service->image) {
            Storage::disk('public')->delete($service->image);
            $data['image'] = null;
        } elseif ($request->hasFile('image')) {
            if ($service->image) {
                Storage::disk('public')->delete($service->image);
            }
            $data['image'] = $request->file('image')->store('services_images', 'public');
        }
        if ($request->has('remove_icon') && $service->icon) {
            Storage::disk('public')->delete($service->icon);
            $data['icon'] = null;
        } elseif ($request->hasFile('icon')) {
            if ($service->icon) {
                Storage::disk('public')->delete($service->icon);
            }
            $data['icon'] = $request->file('icon')->store('service_icons', 'public');
        }
        if ($request->has('remove_dark_icon') && $service->dark_icon) {
            Storage::disk('public')->delete($service->dark_icon);
            $data['dark_icon'] = null;
        } elseif ($request->hasFile('dark_icon')) {
            if ($service->dark_icon) {
                Storage::disk('public')->delete($service->dark_icon);
            }
            $data['dark_icon'] = $request->file('dark_icon')->store('service_icons', 'public');
        }
        $service->update($data);

        return redirect()->route('services.index')->with('success', 'Services updated successfully.');
    }

    public function destroy(Services $service)
    {
        $service->delete();
        return redirect()->route('services.index');
    }
    public function toggleActive(Request $request, $id)
    {
        $service = Services::findOrFail($id);
        $service->active = $request->input('active');
        $service->save();
        return response()->json(['success' => true]);
    }

    public function uploadImage(Request $request)
    {
        $request->validate([
            'file' => 'required|mimes:jpeg,png,jpg,gif,webp,svg,svg+xml|max:5120', // max 5MB
        ]);

        if ($request->hasFile('file')) {
            $path = $request->file('file')->store('services_images', 'public');
            return response()->json(['file_path' => $path]);
        }

        return response()->json(['error' => 'No file uploaded'], 400);
    }
}

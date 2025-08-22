<?php

namespace App\Http\Controllers;

use App\Models\Location;
use App\Models\Service;
use App\Models\ServiceCategory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Validator;

class ServiceController extends Controller
{
    public function create()
    {
        $categories = ServiceCategory::get(['name']);

        $states = Location::where('is_active', true)
            ->orderBy('name')
            ->get(['id', 'name']);

        return view('admin.services.create', compact('categories', 'states'));
    }
    public function store(Request $request)
    {
        $request->validate([
            'name'  => 'required|string|max:255|unique:service_categories,name',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        $imagePath = null;

        if ($request->hasFile('image')) {
            // store file in storage/app/public/service_categories
            $imagePath = $request->file('image')->store('service_categories', 'public');
        }

        ServiceCategory::create([
            'name'  => $request->name,
            'image' => $imagePath, // save path in DB
        ]);

        return redirect()->back()->with('success', 'Service category added successfully!');
    }


    public function services()
    {
        $categories = ServiceCategory::all();
        $locations = Location::where('is_active', true)->get();

        $services = Service::latest()->paginate(20);
        return view('admin.services', compact('services', 'categories', 'locations'));
    }
    public function createService()
    {
        $categories = ServiceCategory::all();

        $locations = Location::all();
        return view('admin.add-service', compact('locations', 'categories'));
    }

    public function storeService(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'title' => 'required|string|max:255',
            'short_description' => 'nullable|string|max:500',
            'introduction' => 'nullable|string',
            'importance' => 'nullable|string',
            'traditions' => 'nullable|string',
            'service_type' => 'nullable|string|max:100',
            'location' => 'nullable|string|max:255',
            'images.*' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:5120',
            'packages' => 'nullable|array',
            'packages.*.name' => 'nullable|string|max:255',
            'packages.*.price' => 'nullable|numeric|min:0',
            'packages.*.discount_price' => 'nullable|numeric|min:0',
            'faqs' => 'nullable|array',
            'faqs.*.question' => 'nullable|string|max:500',
            'faqs.*.answer' => 'nullable|string',
        ]);

        if ($validator->fails()) {
            return back()->withErrors($validator)->withInput();
        }

        $data = $request->except(['packages', 'faqs']);


        // Handle multiple image uploads
        if ($request->hasFile('images')) {
            $imagePaths = [];
            foreach ($request->file('images') as $image) {
                $imageName = time() . '_' . uniqid() . '.' . $image->extension();
                $image->move(public_path('images/services'), $imageName);
                $imagePaths[] = 'images/services/' . $imageName;
            }
            $data['images'] = $imagePaths;
        }
        $service = Service::create($data);

        // Filter out empty packages
        if ($request->has('packages')) {
            $packages = array_filter($request->packages, function ($package) {
                return !empty($package['name']) || !empty($package['price']);
            });

            foreach ($packages as $package) {
                $service->packages()->create($package);
            }
        }

        // Filter out empty FAQs
        if ($request->has('faqs')) {
            $faqs = array_filter($request->faqs, function ($faq) {
                return !empty($faq['question']) || !empty($faq['answer']);
            });

            foreach ($faqs as $faq) {
                $service->faqs()->create($faq);
            }

            return redirect()->route('admin.services')->with('success', 'Service added successfully.');
        }
    }
    public function toggleServiceStatus($id)
    {
        $service = Service::findOrFail($id);
        $service->is_active = !$service->is_active;
        $service->save();

        return back()->with('success', 'Service status updated successfully.');
    }
}

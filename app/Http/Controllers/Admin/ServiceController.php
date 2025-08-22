<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Service;
use Illuminate\Http\Request;
use Illuminate\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Str;

class ServiceController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request): View
    {
        $query = Service::query();

        // Search functionality
        if ($request->filled('search')) {
            $search = $request->get('search');
            $query->where(function ($q) use ($search) {
                $q->where('slug', 'like', "%{$search}%")
                  ->orWhereRaw("JSON_EXTRACT(name, '$.en') LIKE ?", ["%{$search}%"])
                  ->orWhereRaw("JSON_EXTRACT(name, '$.fr') LIKE ?", ["%{$search}%"])
                  ->orWhereRaw("JSON_EXTRACT(description, '$.en') LIKE ?", ["%{$search}%"])
                  ->orWhereRaw("JSON_EXTRACT(description, '$.fr') LIKE ?", ["%{$search}%"]);
            });
        }

        // Status filter
        if ($request->filled('status')) {
            if ($request->get('status') === 'active') {
                $query->where('is_active', true);
            } elseif ($request->get('status') === 'inactive') {
                $query->where('is_active', false);
            }
        }

        // Featured filter
        if ($request->filled('featured')) {
            if ($request->get('featured') === 'yes') {
                $query->where('is_featured', true);
            } elseif ($request->get('featured') === 'no') {
                $query->where('is_featured', false);
            }
        }

        // Sorting
        $sortBy = $request->get('sort_by', 'sort_order');
        $sortDirection = $request->get('sort_direction', 'asc');

        if ($sortBy === 'name') {
            $query->orderByRaw("JSON_EXTRACT(name, '$.en') {$sortDirection}");
        } else {
            $query->orderBy($sortBy, $sortDirection);
        }

        $services = $query->paginate(15)->withQueryString();

        return view('admin.services.index', compact('services'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(): View
    {
        return view('admin.services.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request): RedirectResponse
    {
        $validated = $request->validate([
            'slug' => 'required|string|max:255|unique:services',
            'name_en' => 'required|string|max:255',
            'name_fr' => 'required|string|max:255',
            'description_en' => 'required|string',
            'description_fr' => 'required|string',
            'content_en' => 'required|string',
            'content_fr' => 'required|string',
            'meta_title_en' => 'nullable|string|max:255',
            'meta_title_fr' => 'nullable|string|max:255',
            'meta_description_en' => 'nullable|string|max:255',
            'meta_description_fr' => 'nullable|string|max:255',
            'pricing' => 'nullable|array',
            'icon' => 'nullable|string|max:255',
            'image' => 'nullable|string|max:255',
            'is_active' => 'boolean',
            'is_featured' => 'boolean',
            'sort_order' => 'integer|min:0',
        ]);

        // Transform the data for JSON storage
        $serviceData = [
            'slug' => $validated['slug'],
            'name' => [
                'en' => $validated['name_en'],
                'fr' => $validated['name_fr'],
            ],
            'description' => [
                'en' => $validated['description_en'],
                'fr' => $validated['description_fr'],
            ],
            'content' => [
                'en' => $validated['content_en'],
                'fr' => $validated['content_fr'],
            ],
            'meta_title' => [
                'en' => $validated['meta_title_en'] ?? '',
                'fr' => $validated['meta_title_fr'] ?? '',
            ],
            'meta_description' => [
                'en' => $validated['meta_description_en'] ?? '',
                'fr' => $validated['meta_description_fr'] ?? '',
            ],
            'pricing' => $validated['pricing'] ?? [],
            'icon' => $validated['icon'] ?? null,
            'image' => $validated['image'] ?? null,
            'is_active' => $validated['is_active'] ?? true,
            'is_featured' => $validated['is_featured'] ?? false,
            'sort_order' => $validated['sort_order'] ?? 0,
        ];

        $service = Service::create($serviceData);

        return redirect()->route('admin.services.show', $service)
            ->with('success', 'Service created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Service $service): View
    {
        return view('admin.services.show', compact('service'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Service $service): View
    {
        return view('admin.services.edit', compact('service'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Service $service): RedirectResponse
    {
        $validated = $request->validate([
            'slug' => 'required|string|max:255|unique:services,slug,' . $service->id,
            'name_en' => 'required|string|max:255',
            'name_fr' => 'required|string|max:255',
            'description_en' => 'required|string',
            'description_fr' => 'required|string',
            'content_en' => 'required|string',
            'content_fr' => 'required|string',
            'meta_title_en' => 'nullable|string|max:255',
            'meta_title_fr' => 'nullable|string|max:255',
            'meta_description_en' => 'nullable|string|max:255',
            'meta_description_fr' => 'nullable|string|max:255',
            'pricing' => 'nullable|array',
            'icon' => 'nullable|string|max:255',
            'image' => 'nullable|string|max:255',
            'is_active' => 'boolean',
            'is_featured' => 'boolean',
            'sort_order' => 'integer|min:0',
        ]);

        // Transform the data for JSON storage
        $serviceData = [
            'slug' => $validated['slug'],
            'name' => [
                'en' => $validated['name_en'],
                'fr' => $validated['name_fr'],
            ],
            'description' => [
                'en' => $validated['description_en'],
                'fr' => $validated['description_fr'],
            ],
            'content' => [
                'en' => $validated['content_en'],
                'fr' => $validated['content_fr'],
            ],
            'meta_title' => [
                'en' => $validated['meta_title_en'] ?? '',
                'fr' => $validated['meta_title_fr'] ?? '',
            ],
            'meta_description' => [
                'en' => $validated['meta_description_en'] ?? '',
                'fr' => $validated['meta_description_fr'] ?? '',
            ],
            'pricing' => $validated['pricing'] ?? [],
            'icon' => $validated['icon'] ?? null,
            'image' => $validated['image'] ?? null,
            'is_active' => $validated['is_active'] ?? true,
            'is_featured' => $validated['is_featured'] ?? false,
            'sort_order' => $validated['sort_order'] ?? 0,
        ];

        $service->update($serviceData);

        return redirect()->route('admin.services.show', $service)
            ->with('success', 'Service updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Service $service): RedirectResponse
    {
        $service->delete();

        return redirect()->route('admin.services.index')
            ->with('success', 'Service deleted successfully.');
    }
}

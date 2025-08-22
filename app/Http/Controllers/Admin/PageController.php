<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Page;
use Illuminate\Http\Request;
use Illuminate\View\View;
use Illuminate\Http\RedirectResponse;

class PageController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request): View
    {
        $query = Page::query();

        // Search functionality
        if ($request->filled('search')) {
            $search = $request->get('search');
            $query->where(function ($q) use ($search) {
                $q->where('slug', 'like', "%{$search}%")
                  ->orWhereRaw("JSON_EXTRACT(title, '$.en') LIKE ?", ["%{$search}%"])
                  ->orWhereRaw("JSON_EXTRACT(title, '$.fr') LIKE ?", ["%{$search}%"])
                  ->orWhereRaw("JSON_EXTRACT(content, '$.en') LIKE ?", ["%{$search}%"])
                  ->orWhereRaw("JSON_EXTRACT(content, '$.fr') LIKE ?", ["%{$search}%"]);
            });
        }

        // Type filter
        if ($request->filled('type') && $request->get('type') !== 'all') {
            $query->where('type', $request->get('type'));
        }

        // Status filter
        if ($request->filled('status')) {
            if ($request->get('status') === 'published') {
                $query->where('is_published', true);
            } elseif ($request->get('status') === 'draft') {
                $query->where('is_published', false);
            }
        }

        // Sorting
        $sortBy = $request->get('sort_by', 'sort_order');
        $sortDirection = $request->get('sort_direction', 'asc');

        if ($sortBy === 'title') {
            $query->orderByRaw("JSON_EXTRACT(title, '$.en') {$sortDirection}");
        } else {
            $query->orderBy($sortBy, $sortDirection);
        }

        $pages = $query->paginate(15)->withQueryString();

        // Get available page types
        $pageTypes = Page::distinct()->pluck('type')->filter()->sort();

        return view('admin.pages.index', compact('pages', 'pageTypes'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(): View
    {
        return view('admin.pages.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request): RedirectResponse
    {
        $validated = $request->validate([
            'slug' => 'required|string|max:255|unique:pages',
            'type' => 'required|string|max:255',
            'title_en' => 'required|string|max:255',
            'title_fr' => 'required|string|max:255',
            'content_en' => 'required|string',
            'content_fr' => 'required|string',
            'excerpt_en' => 'nullable|string',
            'excerpt_fr' => 'nullable|string',
            'meta_title_en' => 'nullable|string|max:255',
            'meta_title_fr' => 'nullable|string|max:255',
            'meta_description_en' => 'nullable|string|max:255',
            'meta_description_fr' => 'nullable|string|max:255',
            'meta_keywords_en' => 'nullable|string|max:255',
            'meta_keywords_fr' => 'nullable|string|max:255',
            'featured_image' => 'nullable|string|max:255',
            'is_published' => 'boolean',
            'is_featured' => 'boolean',
            'sort_order' => 'integer|min:0',
            'published_at' => 'nullable|date',
        ]);

        // Transform the data for JSON storage
        $pageData = [
            'slug' => $validated['slug'],
            'type' => $validated['type'],
            'title' => [
                'en' => $validated['title_en'],
                'fr' => $validated['title_fr'],
            ],
            'content' => [
                'en' => $validated['content_en'],
                'fr' => $validated['content_fr'],
            ],
            'excerpt' => [
                'en' => $validated['excerpt_en'] ?? '',
                'fr' => $validated['excerpt_fr'] ?? '',
            ],
            'meta_title' => [
                'en' => $validated['meta_title_en'] ?? '',
                'fr' => $validated['meta_title_fr'] ?? '',
            ],
            'meta_description' => [
                'en' => $validated['meta_description_en'] ?? '',
                'fr' => $validated['meta_description_fr'] ?? '',
            ],
            'meta_keywords' => [
                'en' => $validated['meta_keywords_en'] ?? '',
                'fr' => $validated['meta_keywords_fr'] ?? '',
            ],
            'featured_image' => $validated['featured_image'] ?? null,
            'is_published' => $validated['is_published'] ?? true,
            'is_featured' => $validated['is_featured'] ?? false,
            'sort_order' => $validated['sort_order'] ?? 0,
            'published_at' => $validated['published_at'] ?? now(),
        ];

        $page = Page::create($pageData);

        return redirect()->route('admin.pages.show', $page)
            ->with('success', 'Page created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Page $page): View
    {
        return view('admin.pages.show', compact('page'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Page $page): View
    {
        return view('admin.pages.edit', compact('page'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Page $page): RedirectResponse
    {
        $validated = $request->validate([
            'slug' => 'required|string|max:255|unique:pages,slug,' . $page->id,
            'type' => 'required|string|max:255',
            'title_en' => 'required|string|max:255',
            'title_fr' => 'required|string|max:255',
            'content_en' => 'required|string',
            'content_fr' => 'required|string',
            'excerpt_en' => 'nullable|string',
            'excerpt_fr' => 'nullable|string',
            'meta_title_en' => 'nullable|string|max:255',
            'meta_title_fr' => 'nullable|string|max:255',
            'meta_description_en' => 'nullable|string|max:255',
            'meta_description_fr' => 'nullable|string|max:255',
            'meta_keywords_en' => 'nullable|string|max:255',
            'meta_keywords_fr' => 'nullable|string|max:255',
            'featured_image' => 'nullable|string|max:255',
            'is_published' => 'boolean',
            'is_featured' => 'boolean',
            'sort_order' => 'integer|min:0',
            'published_at' => 'nullable|date',
        ]);

        // Transform the data for JSON storage
        $pageData = [
            'slug' => $validated['slug'],
            'type' => $validated['type'],
            'title' => [
                'en' => $validated['title_en'],
                'fr' => $validated['title_fr'],
            ],
            'content' => [
                'en' => $validated['content_en'],
                'fr' => $validated['content_fr'],
            ],
            'excerpt' => [
                'en' => $validated['excerpt_en'] ?? '',
                'fr' => $validated['excerpt_fr'] ?? '',
            ],
            'meta_title' => [
                'en' => $validated['meta_title_en'] ?? '',
                'fr' => $validated['meta_title_fr'] ?? '',
            ],
            'meta_description' => [
                'en' => $validated['meta_description_en'] ?? '',
                'fr' => $validated['meta_description_fr'] ?? '',
            ],
            'meta_keywords' => [
                'en' => $validated['meta_keywords_en'] ?? '',
                'fr' => $validated['meta_keywords_fr'] ?? '',
            ],
            'featured_image' => $validated['featured_image'] ?? null,
            'is_published' => $validated['is_published'] ?? true,
            'is_featured' => $validated['is_featured'] ?? false,
            'sort_order' => $validated['sort_order'] ?? 0,
            'published_at' => $validated['published_at'] ?? now(),
        ];

        $page->update($pageData);

        return redirect()->route('admin.pages.show', $page)
            ->with('success', 'Page updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Page $page): RedirectResponse
    {
        $page->delete();

        return redirect()->route('admin.pages.index')
            ->with('success', 'Page deleted successfully.');
    }
}

<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Media;
use Illuminate\Http\Request;
use Illuminate\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Storage;

class MediaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request): View
    {
        $query = Media::query();

        // Search functionality
        if ($request->filled('search')) {
            $search = $request->get('search');
            $query->where(function ($q) use ($search) {
                $q->where('filename', 'like', "%{$search}%")
                  ->orWhere('mime_type', 'like', "%{$search}%")
                  ->orWhereRaw("JSON_EXTRACT(alt_text, '$.en') LIKE ?", ["%{$search}%"])
                  ->orWhereRaw("JSON_EXTRACT(alt_text, '$.fr') LIKE ?", ["%{$search}%"]);
            });
        }

        // Type filter
        if ($request->filled('type') && $request->get('type') !== 'all') {
            $query->where('type', $request->get('type'));
        }

        // MIME type filter
        if ($request->filled('mime_type') && $request->get('mime_type') !== 'all') {
            $mimeType = $request->get('mime_type');
            if ($mimeType === 'image') {
                $query->where('mime_type', 'like', 'image/%');
            } elseif ($mimeType === 'document') {
                $query->whereIn('mime_type', [
                    'application/pdf',
                    'application/msword',
                    'application/vnd.openxmlformats-officedocument.wordprocessingml.document',
                    'application/vnd.ms-excel',
                    'application/vnd.openxmlformats-officedocument.spreadsheetml.sheet',
                ]);
            }
        }

        // Sorting
        $sortBy = $request->get('sort_by', 'created_at');
        $sortDirection = $request->get('sort_direction', 'desc');

        $allowedSorts = ['created_at', 'filename', 'size', 'mime_type'];
        if (in_array($sortBy, $allowedSorts)) {
            $query->orderBy($sortBy, $sortDirection);
        }

        $media = $query->paginate(24)->withQueryString(); // Grid layout, more items per page

        // Get available types
        $types = Media::distinct()->pluck('type')->filter()->sort();

        return view('admin.media.index', compact('media', 'types'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(): View
    {
        return view('admin.media.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request): RedirectResponse
    {
        $validated = $request->validate([
            'file' => 'required|file|max:10240', // 10MB max
            'alt_text_en' => 'nullable|string|max:255',
            'alt_text_fr' => 'nullable|string|max:255',
            'caption_en' => 'nullable|string|max:255',
            'caption_fr' => 'nullable|string|max:255',
            'type' => 'required|string|in:image,document,video,other',
            'is_public' => 'boolean',
        ]);

        $file = $request->file('file');
        $filename = $file->getClientOriginalName();
        $path = $file->store('media', 'public');

        $media = Media::create([
            'filename' => $filename,
            'path' => $path,
            'disk' => 'public',
            'mime_type' => $file->getMimeType(),
            'size' => $file->getSize(),
            'alt_text' => [
                'en' => $validated['alt_text_en'] ?? '',
                'fr' => $validated['alt_text_fr'] ?? '',
            ],
            'caption' => [
                'en' => $validated['caption_en'] ?? '',
                'fr' => $validated['caption_fr'] ?? '',
            ],
            'type' => $validated['type'],
            'is_public' => $validated['is_public'] ?? true,
        ]);

        return redirect()->route('admin.media.index')
            ->with('success', 'Media uploaded successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Media $media): View
    {
        return view('admin.media.show', compact('media'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Media $media): View
    {
        return view('admin.media.edit', compact('media'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Media $media): RedirectResponse
    {
        $validated = $request->validate([
            'alt_text_en' => 'nullable|string|max:255',
            'alt_text_fr' => 'nullable|string|max:255',
            'caption_en' => 'nullable|string|max:255',
            'caption_fr' => 'nullable|string|max:255',
            'type' => 'required|string|in:image,document,video,other',
            'is_public' => 'boolean',
        ]);

        $media->update([
            'alt_text' => [
                'en' => $validated['alt_text_en'] ?? '',
                'fr' => $validated['alt_text_fr'] ?? '',
            ],
            'caption' => [
                'en' => $validated['caption_en'] ?? '',
                'fr' => $validated['caption_fr'] ?? '',
            ],
            'type' => $validated['type'],
            'is_public' => $validated['is_public'] ?? true,
        ]);

        return redirect()->route('admin.media.show', $media)
            ->with('success', 'Media updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Media $media): RedirectResponse
    {
        // Delete the file from storage
        Storage::disk($media->disk)->delete($media->path);

        // Delete the database record
        $media->delete();

        return redirect()->route('admin.media.index')
            ->with('success', 'Media deleted successfully.');
    }
}

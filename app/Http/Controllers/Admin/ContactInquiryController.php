<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\ContactInquiry;
use Illuminate\Http\Request;
use Illuminate\View\View;
use Illuminate\Http\RedirectResponse;

class ContactInquiryController extends Controller
{
    /**
     * Display a listing of the resource with filtering, sorting, and searching.
     */
    public function index(Request $request): View
    {
        $query = ContactInquiry::query();

        // Search functionality
        if ($request->filled('search')) {
            $search = $request->get('search');
            $query->where(function ($q) use ($search) {
                $q->where('name', 'like', "%{$search}%")
                  ->orWhere('email', 'like', "%{$search}%")
                  ->orWhere('reference', 'like', "%{$search}%")
                  ->orWhere('message', 'like', "%{$search}%")
                  ->orWhere('company', 'like', "%{$search}%");
            });
        }

        // Status filter
        if ($request->filled('status') && $request->get('status') !== 'all') {
            $query->where('status', $request->get('status'));
        }

        // Service filter
        if ($request->filled('service') && $request->get('service') !== 'all') {
            $query->where('service', $request->get('service'));
        }

        // Priority filter
        if ($request->filled('priority') && $request->get('priority') !== 'all') {
            $query->where('priority', $request->get('priority'));
        }

        // Date range filter
        if ($request->filled('date_from')) {
            $query->whereDate('created_at', '>=', $request->get('date_from'));
        }
        if ($request->filled('date_to')) {
            $query->whereDate('created_at', '<=', $request->get('date_to'));
        }

        // Sorting
        $sortBy = $request->get('sort_by', 'created_at');
        $sortDirection = $request->get('sort_direction', 'desc');

        $allowedSorts = ['created_at', 'name', 'email', 'status', 'priority', 'reference'];
        if (in_array($sortBy, $allowedSorts)) {
            $query->orderBy($sortBy, $sortDirection);
        }

        // Pagination
        $inquiries = $query->paginate(15)->withQueryString();

        // Get filter options
        $statuses = ContactInquiry::distinct()->pluck('status')->filter()->sort();
        $services = ContactInquiry::distinct()->pluck('service')->filter()->sort();
        $priorities = ContactInquiry::distinct()->pluck('priority')->filter()->sort();

        return view('admin.contact-inquiries.index', compact(
            'inquiries',
            'statuses',
            'services',
            'priorities'
        ));
    }

    /**
     * Display the specified resource.
     */
    public function show(ContactInquiry $contactInquiry): View
    {
        return view('admin.contact-inquiries.show', compact('contactInquiry'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(ContactInquiry $contactInquiry): View
    {
        return view('admin.contact-inquiries.edit', compact('contactInquiry'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, ContactInquiry $contactInquiry): RedirectResponse
    {
        $validated = $request->validate([
            'status' => 'required|in:new,in_progress,responded,closed',
            'priority' => 'required|in:low,medium,high,urgent',
            'notes' => 'nullable|string',
        ]);

        $contactInquiry->update($validated);

        return redirect()->route('admin.contact-inquiries.show', $contactInquiry)
            ->with('success', 'Contact inquiry updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(ContactInquiry $contactInquiry): RedirectResponse
    {
        $contactInquiry->delete();

        return redirect()->route('admin.contact-inquiries.index')
            ->with('success', 'Contact inquiry deleted successfully.');
    }
}

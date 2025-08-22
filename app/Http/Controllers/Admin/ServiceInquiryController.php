<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\ServiceInquiry;
use Illuminate\Http\Request;
use Illuminate\View\View;
use Illuminate\Http\RedirectResponse;

class ServiceInquiryController extends Controller
{
    /**
     * Display a listing of the resource with filtering, sorting, and searching.
     */
    public function index(Request $request): View
    {
        $query = ServiceInquiry::query();

        // Search functionality
        if ($request->filled('search')) {
            $search = $request->get('search');
            $query->where(function ($q) use ($search) {
                $q->where('name', 'like', "%{$search}%")
                  ->orWhere('email', 'like', "%{$search}%")
                  ->orWhere('reference', 'like', "%{$search}%")
                  ->orWhere('message', 'like', "%{$search}%")
                  ->orWhere('company', 'like', "%{$search}%")
                  ->orWhere('service_type', 'like', "%{$search}%");
            });
        }

        // Status filter
        if ($request->filled('status') && $request->get('status') !== 'all') {
            $query->where('status', $request->get('status'));
        }

        // Service type filter
        if ($request->filled('service_type') && $request->get('service_type') !== 'all') {
            $query->where('service_type', $request->get('service_type'));
        }

        // Priority filter
        if ($request->filled('priority') && $request->get('priority') !== 'all') {
            $query->where('priority', $request->get('priority'));
        }

        // Estimated value range filter
        if ($request->filled('min_value')) {
            $query->where('estimated_value', '>=', $request->get('min_value'));
        }
        if ($request->filled('max_value')) {
            $query->where('estimated_value', '<=', $request->get('max_value'));
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

        $allowedSorts = ['created_at', 'name', 'email', 'status', 'priority', 'reference', 'service_type', 'estimated_value'];
        if (in_array($sortBy, $allowedSorts)) {
            $query->orderBy($sortBy, $sortDirection);
        }

        // Pagination
        $inquiries = $query->paginate(15)->withQueryString();

        // Get filter options
        $statuses = ServiceInquiry::distinct()->pluck('status')->filter()->sort();
        $serviceTypes = ServiceInquiry::distinct()->pluck('service_type')->filter()->sort();
        $priorities = ServiceInquiry::distinct()->pluck('priority')->filter()->sort();

        return view('admin.service-inquiries.index', compact(
            'inquiries',
            'statuses',
            'serviceTypes',
            'priorities'
        ));
    }

    /**
     * Display the specified resource.
     */
    public function show(ServiceInquiry $serviceInquiry): View
    {
        return view('admin.service-inquiries.show', compact('serviceInquiry'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(ServiceInquiry $serviceInquiry): View
    {
        return view('admin.service-inquiries.edit', compact('serviceInquiry'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, ServiceInquiry $serviceInquiry): RedirectResponse
    {
        $validated = $request->validate([
            'status' => 'required|in:new,in_progress,quoted,accepted,completed,cancelled',
            'priority' => 'required|in:low,medium,high,urgent',
            'estimated_value' => 'nullable|numeric|min:0',
            'notes' => 'nullable|string',
        ]);

        $serviceInquiry->update($validated);

        return redirect()->route('admin.service-inquiries.show', $serviceInquiry)
            ->with('success', 'Service inquiry updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(ServiceInquiry $serviceInquiry): RedirectResponse
    {
        $serviceInquiry->delete();

        return redirect()->route('admin.service-inquiries.index')
            ->with('success', 'Service inquiry deleted successfully.');
    }
}

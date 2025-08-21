<?php

namespace App\Http\Controllers;

use App\Models\ContactInquiry;
use App\Models\ServiceInquiry;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\View\View;

class DashboardController extends Controller
{
    /**
     * Display the admin dashboard
     */
    public function index(Request $request): View
    {
        $user = $request->user();

        // Get dashboard statistics
        $stats = [
            'total_contact_inquiries' => ContactInquiry::count(),
            'total_service_inquiries' => ServiceInquiry::count(),
            'new_contact_inquiries' => ContactInquiry::where('status', 'new')->count(),
            'new_service_inquiries' => ServiceInquiry::where('status', 'new')->count(),
            'total_users' => User::count(),
            'admin_users' => User::where('role', 'admin')->count(),
            'staff_users' => User::where('role', 'staff')->count(),
        ];

        // Get recent inquiries
        $recentContactInquiries = ContactInquiry::with([])
            ->orderBy('created_at', 'desc')
            ->limit(5)
            ->get();

        $recentServiceInquiries = ServiceInquiry::with([])
            ->orderBy('created_at', 'desc')
            ->limit(5)
            ->get();

        return view('admin.dashboard', compact(
            'user',
            'stats',
            'recentContactInquiries',
            'recentServiceInquiries'
        ));
    }
}

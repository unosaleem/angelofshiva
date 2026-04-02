<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Admin;
use App\Models\User;
use App\Models\AuditLog;
use Carbon\Carbon;

class DashboardController extends Controller
{


    public function index()
    {
        $usersByMonth = \App\Models\User::selectRaw('COUNT(*) as count, MONTH(created_at) as month')
            ->whereYear('created_at', Carbon::now()->year)
            ->groupBy('month')
            ->pluck('count','month');

        return view('admin.dashboard', [
            'totalAdmins' => \App\Models\Admin::count(),
            'totalUsers'  => \App\Models\User::count(),
            'totalLogs'   => \App\Models\AuditLog::count(),
            'usersChart'  => $usersByMonth,
            'latestLogs' => \App\Models\AuditLog::latest()->take(5)->get(),
        ]);
    }
}

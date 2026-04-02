<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\AuditLog;
use App\Models\Admin;

class AuditController extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth:admin']);
    }

    public function index(Request $request)
    {
        $query = AuditLog::with('admin'); // eager loading

        // Filter by Admin
        if ($request->filled('admin_id')) {
            $query->where('admin_id', $request->admin_id);
        }

        // Filter by Model Type
        if ($request->filled('model_type')) {
            $query->where('model_type', $request->model_type);
        }

        // Filter by Event Type (created, updated, deleted)
        if ($request->filled('event_type')) {
            $query->where('event_type', $request->event_type);
        }

        // Date Range Filter
        if ($request->filled('from')) {
            $query->whereDate('created_at', '>=', $request->from);
        }

        if ($request->filled('to')) {
            $query->whereDate('created_at', '<=', $request->to);
        }

        $logs = $query->latest()->paginate(20)->withQueryString();

        return view('admin.logs.index', [
            'logs'   => $logs,
            'admins' => Admin::all(),
        ]);
    }
}

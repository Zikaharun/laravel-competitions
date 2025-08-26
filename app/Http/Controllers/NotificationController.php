<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreNotificationRequest;
use App\Models\Notification;
use App\Services\Impl\NotificationServiceImpl;
use App\Services\NotificationServices;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class NotificationController extends Controller
{
    private NotificationServiceImpl $notificationServices;
    //
    public function __construct(NotificationServiceImpl $notificationServices)
    {
        $this->middleware(['auth', 'role:admin']);
        $this->notificationServices = $notificationServices;
    }

    public function index()
    {
        $notifications = Notification::withCount('recipients')
            ->latest()
            ->paginate(10);

        return view('admin.notifications.index', compact('notifications'));
    }

    public function create()
    {
        return view('admin.notifications.create');
    }

    public function store(StoreNotificationRequest $request)
    {
        try {
            $this->notificationServices->createAndBoradcast($request->validated());
            return redirect()->route('notifications.index')
                ->with('success', 'Notification created and broadcasted successfully!');
        } catch (\Throwable $e) {
            Log::error('Create notification failed', ['error' => $e->getMessage()]);
            return back()->withInput()->with('error', 'Gagal membuat notifikasi.');
        }
    }

    
}

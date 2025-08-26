<?php

namespace App\Http\Controllers;

use App\Repositories\Impl\NotificationRepositoryImpl;
use App\Repositories\NotificationRepository;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class NotificationUserController extends Controller
{
    //
    protected NotificationRepositoryImpl $notificationRepository;

    public function __construct(NotificationRepositoryImpl $notificationRepository)
    {
        $this->notificationRepository = $notificationRepository;
    }

    public function index()
    {
        $userId = Auth::id();
        $notifications = $this->notificationRepository->getByUser($userId);

        return view('users.notifications.index', compact('notifications'));
    }

    public function show($id)
    {
        $userId = Auth::id();
        $notification = $this->notificationRepository->findByIdAndUser($id, $userId);

        if (!$notification) {
            abort(404);
        }

        // tandai sebagai dibaca
        $this->notificationRepository->markAsRead($id, $userId);

        return view('users.notifications.show', compact('notification'));
    }
}

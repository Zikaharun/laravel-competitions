<?php 

namespace App\Services\Impl;

use App\Events\NotificationCreated;
use App\Repositories\NotificationRepository;
use App\Services\NotificationServices;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;

class NotificationServiceImpl implements NotificationServices
{
    private NotificationRepository $notificationRepository;

    public function __construct(NotificationRepository $notificationRepository)
    {
        $this->notificationRepository = $notificationRepository;
    }
    public function createAndBoradcast(array $payload)
    {
                $payload['sent_by'] = Auth::id();
        $payload['channels'] = $payload['channels'] ?? ['email'];

        Log::info('Creating notification', ['payload' => $payload]);

        $notification = $this->notificationRepository->create($payload);

        $recipients = $this->notificationRepository->getAllNonAdminUsers();
        $this->notificationRepository->attachRecipients($notification, $recipients);

        // Fire event (handled by queued listener)
        event(new NotificationCreated($notification));

        Log::info('Notification created & event dispatched', [
            'notification_id' => $notification->id,
            'recipients_count' => $recipients->count(),
        ]);

        return $notification;
    
    }

    public function getByUser($userId)
    {
         return $this->notificationRepository->getByUser($userId);       

    }

    public function findByIdAndUser($id, $userId)
    {
        return $this->notificationRepository->findByIdAndUser($id, $userId);
    }

    public function markAsRead($id, $userId)
    {
        return $this->notificationRepository->markAsRead($id, $userId);
    }
}
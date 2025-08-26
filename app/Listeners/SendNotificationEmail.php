<?php

namespace App\Listeners;

use App\Events\NotificationCreated;
use App\Mail\UserNotificationMail;
use App\Models\Notification;
use App\Repositories\NotificationRepository;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Mail;

class SendNotificationEmail implements ShouldQueue
{
    /**
     * Create the event listener.
     */

    public $timeout = 120;

    private NotificationRepository $notificationRepository;
    public function __construct(NotificationRepository $notificationRepository)
    {
        //
        $this->notificationRepository = $notificationRepository;
    }

    /**
     * Handle the event.
     */
    public function handle(NotificationCreated  $event): void
    {
        //
        $notification = $event->notification;
        $users = $notification->recipients()->get();

        Log::info('Sending notification emails', [
            'notification_id' => $notification->id,
            'recipients' => $users->pluck('id')->all(),
        ]);

        foreach ($users as $user) {
            try {
                Mail::to($user->email)->queue(new UserNotificationMail($notification));
                $this->notificationRepository->markEmailed($notification, $user->id);
            } catch (\Throwable $e) {
                Log::error('Failed sending notification email', [
                    'notification_id' => $notification->id,
                    'user_id' => $user->id,
                    'error' => $e->getMessage(),
                ]);
            }

            $this->notificationRepository->setSentAt($notification);
        }


    }
}

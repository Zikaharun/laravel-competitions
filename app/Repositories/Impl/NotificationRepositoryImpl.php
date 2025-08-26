<?php

namespace App\Repositories\Impl;

use App\Models\User;
use App\Repositories\NotificationRepository;
use Illuminate\Support\Collection;

use App\Models\Notification;
use Illuminate\Support\Facades\DB;

class NotificationRepositoryImpl implements NotificationRepository
{
    public function create(array $data): Notification
    {
        return Notification::create($data);
    }

    /** @return \Illuminate\Support\Collection<int,User> */
    public function getAllNonAdminUsers(): Collection
    {
        return User::query()
            ->where('role', '!=', 'admin')
            ->get();
    }

    public function attachRecipients(Notification $notification, Collection $users): void
    {
        $pivotData = $users->mapWithKeys(fn($u) => [
            $u->id => ['emailed_at' => null, 'read_at' => null]
        ])->toArray();

        $notification->recipients()->syncWithoutDetaching($pivotData);
    }

    public function markEmailed(Notification $notification, int $userId): void
    {
        $notification->recipients()->updateExistingPivot($userId, [
            'emailed_at' => now(),
        ]);
    }

    public function markRead(Notification $notification, int $userId): void
    {
        $notification->recipients()->updateExistingPivot($userId, [
            'read_at' => now(),
        ]);
    }

    public function setSentAt(Notification $notification): void
    {
        if (!$notification->sent_at) {
            $notification->update(['sent_at' => now()]);
        }
    }

        public function getByUser($userId)
    {
        return Notification::whereHas('users', function ($q) use ($userId) {
            $q->where('users.id', $userId);
        })
        ->orderBy('created_at', 'desc')
        ->get();
    }

    public function findByIdAndUser($id, $userId)
    {
        return Notification::where('id', $id)
            ->whereHas('users', function ($q) use ($userId) {
                $q->where('users.id', $userId);
            })
            ->first();
    }

    public function markAsRead($id, $userId)
    {
        DB::table('notification_users')
            ->where('notification_id', $id)
            ->where('user_id', $userId)
            ->update(['read_at' => now()]);
    }
}
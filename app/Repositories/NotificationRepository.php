<?php 

namespace App\Repositories;

use Illuminate\Support\Collection;

interface NotificationRepository
{
    public function create(array $data);
    public function getAllNonAdminUsers();
    public function AttachRecipients(\App\Models\Notification $notification, Collection $users);
    public function markEmailed(\App\Models\Notification $notification, int $userId);
    public function markRead(\App\Models\Notification $notification, int $userId);
    public function setSentAt(\App\Models\Notification $notification);

    public function getByUser($userId);

    public function findByIdAndUser($id, $userId);

    public function markAsRead($id, $userId);
    
}
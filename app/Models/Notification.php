<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Notification extends Model

{
    use HasFactory, HasUuids;
    protected $fillable = [
        'sent_by', 'title', 'message', 'url', 'scheduled_at', 'sent_at', 'channels'
    ];

    protected $casts = [
        'scheduled_at' => 'datetime',
        'sent_at'      => 'datetime',
        'channels'     => 'array',
    ];

    public function recipients(): BelongsToMany
    {
        return $this->belongsToMany(User::class, 'notification_users', 'notification_id', 'user_id')
            ->withPivot(['emailed_at', 'read_at'])
            ->withTimestamps();
    }

    public function sender()
    {
        return $this->belongsTo(User::class, 'sent_by');
    }

    public function users()
{
    return $this->belongsToMany(User::class, 'notification_users', 'notification_id', 'user_id')
                ->withPivot(['emailed_at', 'read_at'])
                ->withTimestamps();
}
}

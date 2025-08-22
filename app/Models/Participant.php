<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Participant extends Model
{
    use HasFactory, HasUuids;

    public $fillable = [
        'name',
        'rt',
        'ranking'
    ];


    public function division()
    {
        return $this->belongsToMany(CompetitionDivision::class, 'competition_division_participant');
    }
}

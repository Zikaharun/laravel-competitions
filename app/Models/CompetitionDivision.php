<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CompetitionDivision extends Model
{
    use HasFactory,HasUuids;

    protected $table = 'competition_divisions';

    protected $fillable = ['user_id', 'competition_id'];

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }

    public function competition()
    {
        return $this->belongsTo(Competition::class,'competition_id', 'id');
    }

    public function participants()
    {
        return $this->belongsToMany(Participant::class, 'competition_division_participant');
    }

    
}

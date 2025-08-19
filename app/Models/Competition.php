<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Competition extends Model
{
    use HasFactory, HasUuids;

    protected $table = 'competitions';
    protected $primaryKey = 'id';
    protected $keyType = 'string';
    public $incrementing = false;
    public $timestamps = true;

    protected $fillable = [
        'name',
        'description'
    ];

    public function divisions()
    {
        return $this->hasOne(CompetitionDivision::class, 'competition_id', 'id');
    }
}

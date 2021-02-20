<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Homeless extends Model
{
    use HasFactory;

    protected $table = 'homeless_2019';
    public $timestamps = false;
    protected $fillable = [
        'state_id',
        'homeless_pop'
    ];

    public function state()
    {
        // return $this->hasOne('App\Models\State', 'id', 'state_id');
        return $this->belongsTo(State::class, 'state_id', 'id');
    }
}

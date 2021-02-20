<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Snap extends Model
{
    use HasFactory;

    protected $table = 'snaps';
    public $timestamps = false;
    protected $fillable = [
        'id', 
        'state_id',
        'ppl_snap_sept_2019',
        'ppl_snap_sept_2020'
    ];

    public function state()
    {
        // return $this->hasOne('App\Models\State', 'id', 'state_id');
        return $this->belongsTo(State::class, 'id', 'id');
    }
}

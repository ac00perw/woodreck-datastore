<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class StudentLoans extends Model
{
    use HasFactory;
    protected $table = 'student_loans_2019';

    public function state()
    {
        // return $this->hasOne('App\Models\State', 'id', 'state_id');
        return $this->belongsTo(State::class, 'id', 'id');
    }
}

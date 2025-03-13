<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AdvisingMeeting extends Model
{
    use HasFactory;
     protected $fillable = [
        'meeting_datetime',
        'notes',
        'user_id'

    ];
    

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}

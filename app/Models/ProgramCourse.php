<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProgramCourse extends Model
{
    use HasFactory;
    protected $fillable = [
        "cid",'pid'
    ];
    public $timestamps = false;
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class StudentsCourses extends Model
{
    use HasFactory;
     protected $fillable = [
        "sid",'cid'
    ];
    public $timestamps = false;
}
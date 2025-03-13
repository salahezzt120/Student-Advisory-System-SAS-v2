<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;


class Course extends Model
{
    use HasFactory;
    protected $primaryKey = 'id';
    protected $keyType = 'string';
        protected $fillable = [
        'cname',
        'code'
    ];
    public function cefforts(): HasMany
    {
        return $this->hasMany(CourseEffort::class,'cid');
    }
    public function cprogram()
    {
        return $this->belongsToMany(Program::class ,"program_courses","cid","pid");
    }
    // Course.php

public function courseSelections()
{
    return $this->hasMany(CourseSelection::class, 'course_id');
}

}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;



class students extends Model
{
    use HasFactory;
    protected $fillable = [
        'user_Id',
        'AIUId',
        'gpa',
        'status'

    ];

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class,'user_Id');
    }
// Student.php

public function courseSelections()
{
    return $this->hasMany(CourseSelection::class, 'student_id');
}


    


}

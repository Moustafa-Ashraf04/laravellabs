<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Student extends Model
{
    use HasFactory;
    // we can name the table here if it isn't students
    // protected $table = "studentslist";

    // take only these values and ignore the rest in the request 
    protected $fillable = ['IDno', 'name', 'age', 'user_id'];
    use SoftDeletes;

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}

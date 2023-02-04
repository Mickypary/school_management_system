<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AssignSubject extends Model
{
    use HasFactory;

    public function student_class($value='')
    {
        return $this->belongsTo(StudentClass::class, 'class_id', 'id');
    }

    public function subject($value='')
    {
        return $this->belongsTo(SchoolSubject::class, 'subject_id', 'id');
    }
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    use HasFactory;

    protected $fillable = ['parent_id', 'name', 'gender', 'birth_date', 'birth_place', 'status', 'stage'];

    public function parent()
    {
        return $this->belongsTo(ParentModel::class, 'parent_id');
    }

    public function registrations()
    {
        return $this->belongsToMany(Registration::class, 'student_registrations');
    }

    public function studentRegistration()
    {
        return $this->hasOne(StudentRegistration::class, 'student_id');
    }
}

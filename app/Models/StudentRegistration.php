<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class StudentRegistration extends Model
{
    use HasFactory;

    protected $fillable = ['registration_id', 'student_id', 'registration_code'];

    public static function boot()
    {
        parent::boot();

        static::creating(function ($model) {
            $model->registration_code = $model->generateRegistrationCode();
        });
    }

    public function generateRegistrationCode()
    {
        return str_pad(mt_rand(1, 9999), 4, '0', STR_PAD_LEFT);
    }

    public function student()
    {
        return $this->belongsTo(Student::class);
    }

    public function registration()
    {
        return $this->hashOne(Registration::class, 'registration_id');
    }
}

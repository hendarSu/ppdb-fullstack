<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Registration extends Model
{
    use HasFactory;

    protected $fillable = ['parent_id', 'status', 'amount', 'batch_id'];

    public function parent()
    {
        return $this->belongsTo(ParentModel::class);
    }

    public function students()
    {
        return $this->belongsToMany(Student::class, 'student_registrations');
    }

    public function payments()
    {
        return $this->hasMany(Payment::class);
    }

    public function batch()
    {
        return $this->belongsTo(Batch::class);
    }
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ParentModel extends Model
{
    use HasFactory;

    // Add table name
    protected $table = 'parents';
    protected $fillable = ['nik', 'name', 'email', 'phone', 'address'];

    public function students()
    {
        return $this->hasMany(Student::class);
    }
}

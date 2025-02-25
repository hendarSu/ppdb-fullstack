<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Menu extends Model
{
    use HasFactory;

    // Define any fillable fields if necessary
    protected $fillable = ['name', 'description', 'price', 'title', 'url', 'icon', 'parent_id', 'is_parent'];
}

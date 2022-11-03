<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Course extends Model
{
    use HasFactory;
    protected $guarded = ["id"];

    public function level()
    {
        return $this->belongsTo(Level::class, 'level_id');
    }

    public function materials()
    {
        return $this->hasMany(Material::class, 'course_id');
    }
}

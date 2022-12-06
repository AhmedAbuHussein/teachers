<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

class Course extends Model
{
    use HasFactory;
    protected $guarded = ["id"];
    protected $appends = ['avatar'];

    public function getAvatarAttribute()
    {
        return $this->image ? Storage::url($this->image) : asset('images/favicon.png');
    }
    public function level()
    {
        return $this->belongsTo(Level::class, 'level_id');
    }

    public function materials()
    {
        return $this->hasMany(Material::class, 'course_id');
    }

    public function teacher()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}

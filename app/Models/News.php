<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

class News extends Model
{
    use HasFactory;
    protected $guarded = ['id'];

    protected $appends = ['avatar'];

    public function getAvatarAttribute()
    {
        return $this->image1 ? Storage::url($this->image1) : asset('images/favicon.png');
    }

    public function category()
    {
        return $this->belongsTo(Category::class, 'category_id');
    }
}

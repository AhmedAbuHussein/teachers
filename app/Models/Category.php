<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

class Category extends Model
{
    use HasFactory;
    protected $guarded = ['id'];
    protected $appends = ['avatar'];

    public function getAvatarAttribute()
    {
        return $this->image ? Storage::url($this->image) : asset('images/favicon.png');
    }

    public function products()
    {
        return $this->hasMany(Product::class, 'category_id');
    }

}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use App\Models\AdImage;

class Advertisement extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'slug',
        'description',
        'price',
        'is_negotiable',
        'status',
        'user_id',
        'category_id',
        'location_id',
        'published_at',
    ];

    public function images(){
        return $this->hasMany(AdImage::class);
    }
    public function category(){
        return $this->belongsTo(Category::class);
    }
    public function location(){
        return $this->belongsTo(Location::class);
    }
    public function user(){
        return $this->belongsTo(User::class);
    }
}

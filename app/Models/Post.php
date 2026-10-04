<?php

namespace App\Models;

use App\Models\Traits\Filterable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use App\Models\User;

class Post extends Model
{
    protected $fillable = [
        'title',
        'image',
        'likes',
        'is_published',
    ];

    use HasFactory,Filterable;

    public function category(){
        return $this->belongsTo(Category::class);
    }

    public function tags() {
        return $this->belongsToMany(Tag::class);
    }

    public function users(){
        return $this->belongsTo(User::class);
    }

}

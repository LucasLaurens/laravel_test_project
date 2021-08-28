<?php

namespace App\Models;

use App\Scopes\VisibleScope;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Post extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'title',
        'description',
        'is_visible'
    ];

    // public function postFormat()
    // {
    //     return [
    //         'post_name'        => $this->title,
    //         'post_description' => $this->description
    //     ];
    // }

    /**
     * Local Scopes
     * Always scope prefix 
     * */ 
    // public function scopeVisible($query) 
    // {
    //     return $query->where('is_visible', 1);
    // }

    // public function scopeCategory($query) 
    // {
    //     return $query->where('category_id', 2);
    // }
    
    // public function scopeTitle($query) 
    // {
    //     return $query->where('title', 'sint');
    // }
   
    // public function scopeCanBeBought($query) 
    // {
    //     // do a series
    //     return $query->visible()->category();
    // }

    /**
     * The "booted" method of the model.
     * Global Scopes
     *
     * @return void
     */
    // protected static function booted()
    // {
    //     static::addGlobalScope(new VisibleScope);
    // }
}

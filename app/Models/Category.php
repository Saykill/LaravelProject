<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Category extends Model
{

    protected $fillable = [
        'parent_id',
        'title',
        'keywords',
        'description',
        'image',
        'status',
    ];

    public function parent()
    {
        return $this->belongsTo(Category::class, foreignKey: 'parent_id');
    }

    public function children()
    {
        return $this->hasMany(Category::class, foreignKey: 'parent_id');
    }

    public function getFullPathAttribute()
    {
        $titles = [];
        $current = $this;
        while ($current) {
            $titles[] = $current->title;

            if(!$current->parent_id || $current->parent_id==0) {
                break;
            }
            $current = $current->parent;
        }
        return implode('->', array_reverse($titles));
    }

    public function products(): HasMany
    {
        return $this->hasMany(Product::class);
    }
}

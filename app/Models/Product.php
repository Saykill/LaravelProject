<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Model;
class Product extends Model
{
    protected $fillable = [
        'category_id',
        'user_id',
        'title',
        'keywords',
        'description',
        'detail',
        'image',
        'price',
        'stock',
        'minstock',
        'discount',
        'status',
    ];
    /**
     * A product belongs to one category.
     */
    public function category()
    {
        return $this->belongsTo(Category::class);
    }
    /**
     * A product belongs to one user.
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}

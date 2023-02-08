<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Dish extends Model
{
    use HasFactory;
    protected $fillable = ["name", "slug", "restaurant_id", "category_id", "price", "description", "visible", "cover_image"];

    /**
     * The restaurant that belong to the dish
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function restaurants(): BelongsTo
    {
        return $this->BelongsTo(Restaurant::class);
    }

    /**
     * The category that belong to the dish
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function categories(): BelongsTo
    {
        return $this->BelongsTo(Category::class);
    }


    /**
     * The orders that belong to the dish
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function orders(): BelongsToMany
    {
        return $this->belongsToMany(Order::class);
    }
}

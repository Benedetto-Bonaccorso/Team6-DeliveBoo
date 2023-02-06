<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\hasMany;

class Category extends Model
{
    use HasFactory;

    protected $fillable = ["name", "slug"];

      /**
     * The category that belong to the Dishes
     *
     * @return \Illuminate\Database\Eloquent\Relations\hasMany
     */
    public function dishes(): hasMany
    {
        return $this->hasMany(Dish::class);
    }
}
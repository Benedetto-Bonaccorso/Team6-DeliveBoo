<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Relations\hasMany;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Restaurant extends Model
{
    use HasFactory;
    protected $fillable = ["name", "slug", "id_user", "phone_number", "piva", "address", "cover_image"];

    /**
     * The restaurant that belong to the Dishes
     *
     * @return \Illuminate\Database\Eloquent\Relations\hasMany
     */
    public function dishes(): hasMany
    {
        return $this->hasMany(Dish::class);
    }
}

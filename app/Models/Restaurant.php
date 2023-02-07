<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Relations\hasMany;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Restaurant extends Model
{
    use HasFactory;
    protected $fillable = ["name", "slug", "user_id", "phone_number", "piva", "address", "cover_image"];

    /**
     * The restaurant that belong to the Dishes
     *
     * @return \Illuminate\Database\Eloquent\Relations\hasMany
     */
    public function dishes(): hasMany
    {
        return $this->hasMany(Dish::class);
    }

    /**
     * The tipologies that belong to the restaurant
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function tipologies(): BelongsToMany
    {
        return $this->belongsToMany(Tipology::class);
    }


    /**
     * Get the user associated with the restaurant.
     */
    public function users(): HasOne
    {
        return $this->hasOne(User::class);
    }
}

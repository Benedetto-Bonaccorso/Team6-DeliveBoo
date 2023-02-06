<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Order extends Model
{

    use HasFactory;

    protected $fillable = ["name", "address","phone","total_payment","date_of_order"];

      /**
     * The dishes that belong to the order
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function dishes(): BelongsToMany
    {
        return $this->belongsToMany(Dish::class);
    }
}
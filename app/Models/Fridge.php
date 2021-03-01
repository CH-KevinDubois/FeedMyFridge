<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Fridge extends Model
{
    use HasFactory;

    protected $fillable = [
        'brand',
        'location',
        'freezer',
        'side',
        'number_racks_bulk',
        'max_capacity',
    ];

    /**
     * Return the number of products.
     *
     * @return int
     */
    public function count_products()
    {
        return $this->products()->count();
    }

    public function products()
    {
        return $this->hasMany(Product::class);
    }
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RatingProduct extends Model
{
    use HasFactory;
    protected $table = 'nn_rating_product';

    public function product()
    {
        return $this->belongsTo(Product::class);
    }
}

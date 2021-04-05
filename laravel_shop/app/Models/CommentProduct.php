<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CommentProduct extends Model
{
    use HasFactory;
    protected $table = 'nn_comment_product';

    public function product()
    {
        return $this->belongsTo(Product::class);
    }
}

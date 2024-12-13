<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Rating extends Model
{
    use HasFactory;

    protected $table = 'ratings';

    protected $fillable = ['book_id', 'rating'];

    public function books()
    {
        return $this->belongsTo(Book::class);
    }
}

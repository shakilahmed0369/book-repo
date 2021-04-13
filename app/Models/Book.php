<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
    use HasFactory;
    protected $fillable = [
        'book_name',
        'slag',
        'pdf',
        'book_cover',
        'featured'
    ];


    protected static function boot()
    {
        parent::boot();
        static::saving(function ($model) {
            $model->slug = str_replace(' ', '-', $model->book_name);
        });
    }
    
}

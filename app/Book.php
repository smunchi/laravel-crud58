<?php

namespace App;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
    protected $fillable = ['name', 'isbn_no', 'price', 'description'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function scopeActive(Builder $builder)
    {
        return $builder->where('active', 1);
    }

    //------------- Accessors ----------------------
    public function getNameAttribute($value)
    {
        return ucfirst($value);
    }
}

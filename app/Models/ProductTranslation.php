<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ProductTranslation extends Model
{
    protected $fillable = ['locale', 'name', 'description'];
    public $timestamps = false;
}

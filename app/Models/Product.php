<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $fillable = ['sku'];

    public function translations()
    {
        return $this->hasMany(ProductTranslation::class);
    }

    public function getTranslation($attribute, $locale)
    {
        return $this->translations()->where('locale', $locale)->value($attribute);

    }


}

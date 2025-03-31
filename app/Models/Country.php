<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Country extends Model
{
    protected $table = 'country';
    public function cities()
    {
        return $this->hasManyThrough(City::class, County::class);
    }
    public function counties()
    {
        return $this->hasMany(County::class);
    }

}

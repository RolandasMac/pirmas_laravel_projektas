<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Library extends Model
{
    use HasFactory;
    use SoftDeletes;

    // Nurodo, kurią lentelę šis modelis naudoja (nebūtina, jei pavadinimas atitinka Laravel konvenciją)
    protected $table = 'library';

    // Leisti masinį priskyrimą šiems stulpeliams
    // protected $fillable = ['title', 'description', 'author', 'year'];

    protected $guarded = ['title', 'description', 'author', 'year'];

    public function scopeId($query)
    {
        return $query->where('id', 10);
    }
    public function scopeId2($query, $id)
    {
        return $query->where('id', $id);
    }
}

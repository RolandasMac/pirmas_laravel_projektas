<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Crud extends Model
{
    use HasFactory;
    use SoftDeletes;
    // Nurodo, kurią lentelę šis modelis naudoja (nebūtina, jei pavadinimas atitinka Laravel konvenciją)
    protected $table = 'cruds';

    // Leisti masinį priskyrimą šiems stulpeliams
    // protected $fillable = ['title', 'description', 'author', 'year'];

    protected $guarded = ['firstName', 'lastName', 'birthDate', 'phone', 'email', 'bankAccount'];

}

<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'description',
        'price',
        'user_id',
    ];
// belongsTo santykis: Eloquent santykis belongsTo naudojamas, kai norime nurodyti, kad šiame modelyje esantis įrašas priklauso kitam modeliui. Šiuo atveju, kiekvienas produktas priklauso vartotojui. Product modelis turi lauką user_id, kuris nurodo, kuris vartotojas yra susijęs su šiuo produktu. Tai yra užsienio raktas, kuris susieja Product modelį su User modeliu. Funkcija user() su belongsTo(User::class) nurodo, kad šis produktas turi priklausyti vienam vartotojui (tai yra, jis priklauso tam vartotojui, kurio id sutampa su product.user_id).
    public function user()
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }
}

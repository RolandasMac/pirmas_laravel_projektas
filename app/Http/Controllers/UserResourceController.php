<?php
namespace App\Http\Controllers;

use App\Models\User; // Nepamirškite importuoti modelio
use Illuminate\Http\Request;

class UserResourceController extends Controller
{
    public function index(Request $request)
    {
        $users       = User::query(); // Sukuria naują query objektą
        $queryName   = $request->get("name");
        $queryLimit  = $request->get("limit");
        $queryOrder  = $request->get("orderby");
        $queryOffset = $request->get("offset");
        // $users->all()
        // $methods = get_class_methods(User::class);
        // dd($methods); // Išveda metodų sąrašą į Laravel Debug ekraną
        // $reflector = new ReflectionClass(User::class);
        // $staticMethods = array_filter(
        //     $reflector->getMethods(),
        //     fn($method) => $method->isStatic()
        // );
        // dd($staticMethods);
        // dd(User::query());
        // Grąžinti duomenis, pvz., JSON formatu
        // dd(get_class_methods($users));

        // Patikriname ir pridedame sąlygas tik tada, kai parametrai perduoti
        if ($queryName) {
            $users->where("name", "LIKE", "%{$queryName}%");
        }

        if ($queryOrder) {
            $users->orderBy('id', $queryOrder); // Čia galite pasirinkti kitą lauką, pagal kurį norite rūšiuoti
        } else {
            $users->orderBy('id', 'asc');
        }

        if ($queryLimit) {
            $users->limit($queryLimit);
        } else {
            $users->limit(10);
        }

        if ($queryOffset) {
            $users->offset($queryOffset);
        } else {
            $users->offset(0);
        }

        // Skaičiuojame visus vartotojus pagal pasirinktus filtrus
        $skaicius = $users->count();

        // Gauname vartotojų duomenis pagal filtrus
        $vardas = $users->get();

        // Grąžiname duomenis JSON formatu
        $result = [
            'total' => $skaicius,
            'data'  => $vardas,
        ];

        return response()->json($result, 200);

    }
}

<?php
namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Role;
use App\Models\User;
use Request;

// Nepamirškite importuoti modelio

class UserResourceController extends Controller
{
    public function index(Request $request)
    {
        // dd("Gaidys");
        // $users = User::query(); // Sukuria naują query objektą
        // $queryName   = $request->get("name");
        // $queryLimit  = $request->get("limit");
        // $queryOrder  = $request->get("orderby");
        // $queryOffset = $request->get("offset");
        // $users->all()
        // $methods = get_class_methods(User::class);
        // dd($methods); // Išveda metodų sąrašą į Laravel Debug ekraną
        // $reflector = new ReflectionClass(User::class);
        // $staticMethods = array_filter(
        //     $reflector->getMethods(),
        //     fn($method) => $method->isStatic()
        // );

        // Grąžinti duomenis, pvz., JSON formatu
        // dd(get_class_methods($users));

        // Patikriname ir pridedame sąlygas tik tada, kai parametrai perduoti
        // if ($queryName) {
        //     $users->where("name", "LIKE", "%{$queryName}%");
        // }

        // if ($queryOrder) {
        //     $users->orderBy('id', $queryOrder); // Čia galite pasirinkti kitą lauką, pagal kurį norite rūšiuoti
        // } else {
        //     $users->orderBy('id', 'asc');
        // }

        // if ($queryLimit) {
        //     $users->limit($queryLimit);
        // } else {
        //     $users->limit(10);
        // }

        // if ($queryOffset) {
        //     $users->offset($queryOffset);
        // } else {
        //     $users->offset(0);
        // }

        // // Skaičiuojame visus vartotojus pagal pasirinktus filtrus
        // $skaicius = $users->count();

        // // Gauname vartotojų duomenis pagal filtrus
        // $vardas = $users->get();

        // // Grąžiname duomenis JSON formatu
        // $result = [
        //     'total' => $skaicius,
        //     'data'  => $vardas,
        // ];
        $users = User::all();
        // dd($users);
        // return response()->json($users, 200);//galimas toks atsakymas
        return view("user", compact("users"));

    }
    public function getOrders()
    {
        //Query Builder
        // $products = DB::table('users')
        //     ->join('products', 'users.id', '=', 'products.user_id')
        //     ->select(
        //         'users.id as user_id',
        //         'users.name',
        //         'users.surname',
        //         'users.email',
        //         'products.id as product_id',
        //         'products.title',
        //         'products.description',
        //         'products.price'
        //     )
        //     ->get();

        //LeftJoin
        // $products = DB::table('users')
        //     ->leftJoin('products', 'users.id', '=', 'products.user_id')
        //     ->select(
        //         'users.id as user_id',
        //         'users.name',
        //         'users.surname',
        //         'users.email',
        //         'products.id as product_id',
        //         'products.title',
        //         'products.description',
        //         'products.price'
        //     )
        //     ->get();

        //RightJoin
        // $products = DB::table('users')
        //     ->rightJoin('products', 'users.id', '=', 'products.user_id')
        //     ->select(
        //         'users.id as user_id',
        //         'users.name',
        //         'users.surname',
        //         'users.email',
        //         'products.id as product_id',
        //         'products.title',
        //         'products.description',
        //         'products.price'
        //     )
        //     ->get();

        //Eloquent: užklausa  grąžina šiek tiek kitokį objektą negu prieš tai, todėl skiriasi view šablonas

        $products1 = User::with('product')->get();
        $products2 = Product::with('user')->get();
        $products3 = User::with('products')->get();
        return view('orders', compact('products1', 'products2', 'products3'));

    }
    public function roles()
    {
        // $user = User::find(2);
        // $role = Role::find(1);

        // $user->roles()->attach($role->id, ['created_at' => now(), 'updated_at' => now()]);
        // $user->roles()->attach([1, 2, 3]);
        // $user->roles()->sync([1, 2]);
        // $user->roles()->sync([$role->id => ['created_at' => now(), 'updated_at' => now()]]);
        // $user->roles()->detach(2);

        // Duomenų gavimas

        // $user = User::find(1);
        //-----------
        // $users = User::all();
        // $roles = Role::all();//Veikia tik į vieną pusę. Norint, kad paimtų users reikia papildomos eilutės arba sekančio kodo
        // $roles->load('users');
        //-------Sekantis kodas. Veikia su abiem: user ir roles
        $users = User::with('roles')->get();
        $roles = Role::with('users')->get();
        return view('roles', compact('users', 'roles'));
    }
}

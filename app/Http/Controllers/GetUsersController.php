<?php
namespace App\Http\Controllers;

use App\Models\Library;
use Illuminate\Http\Request;

class GetUsersController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //CRUD ****************Query Builder:**********************

        // Insert new data to DB
        // DB::table("users")->insert([
        //     "name"       => "Aurelija",
        //     "surname"    => "Babaužienė",
        //     "email"      => "aurelija@lt.lt",
        //     "password"   => bcrypt("aurelija"),
        //     'created_at' => now(), //reikia pridėti tuos laukus nes šis metodas automatiškai jų neįterpia
        //     'updated_at' => now(),

        // ]);
        // return view('user');

        // Get data from DB
        // $users = DB::table("users")->where('name', 'Aurelija')->get();
        // return $users;

        // Update data in DB
        // DB::table("users")->where('id', 1)->update([
        //     'name'  => 'Aurelija',
        //     'email' => 'gaidys@gaidys.com',
        // ]);
        // return view("user");

        // Delete data from DB
        // $data = DB::table("users")->where('id', 1003)->delete(); // grąžina skaičių ištrintų duomenų
        // return $data;
        // return view('user');

        // Get data, only one column
        // $data = DB::table("users")->select('name')->get();

        // $data = DB::table("users")->pluck('name', 'id')->toArray(); //galima gauti array su key data kur key yra id

        // dd($data);

        // $users = DB::table("users")->get();
        // $books = DB::table("library")->count();

        // $books = DB::table("library")->max('price');

        // $books = DB::table("library")->min('price');

        // $books = DB::table("library")->sum('price');

        // $books = DB::table("library")->avg('price');

        // $books = DB::table("library")->max('price');

        // return $books;

        // return view("user", ['data' => $users]);

        // create data with Eloquent*******************Eloquent ORM:*******************************

        //Save data

        // $data           = new User();
        // $data->name     = "Aurelija";
        // $data->surname  = "Gaidienė";
        // $data->email    = "aurelija@lt.lt";
        // $data->password = bcrypt("aurelija");
        // $data->save();

        // $data              = new Library();
        // $data->title       = "Gaidelis auksaskiauterėlis";
        // $data->description = "Apie gaidį";
        // $data->author      = "Aurelija";
        // $data->year        = "2010";
        // $data->price       = 20.29;
        // $data->save();

        // Get all data
        // $data = Library::all();

        // $data = Library::where('id', 10)->first();

        // $data              = Library::find(10); // pagal id
        // $data->title       = "sakmė apie gaidį";
        // $data->description = "Apie gaidį";
        // $data->save();

        // Delet row
        // $data = Library::find(13);
        // if ($data) {
        //     $data->delete();
        // } else {
        //     $data = "Gaidys neegzistuoja";
        // }

        // $data = Library::findOrFail(12); //duoda 404 jeigu neranda
        // $data->delete();

        // Library::create([
        //     'title'       => 'Gaidžio giesmė',
        //     'description' => 'Apie gaidį',
        //     'author'      => 'Aurelija',
        //     'price'       => 5.50,
        //     'year'        => 2015,

        // ]);

        // Library::insert([
        //     'title'       => 'Gaidžio giesmė2',
        //     'description' => 'Apie gaidį2',
        //     'author'      => 'Aurelija2',
        //     'price'       => 5.50,
        //     'year'        => 2025,

        // ]);

        // *******************************************

        // $data = Library::where("id", '>', 5)->first();

        // $data = Library::where("id", '>', 5)->get();

        // $data = Library::where("id", '>', 5)->where("price", '>', 10)->get();

        // $data = Library::where(['id' => 10, 'price' => 5])->get();

        // $data = Library::where(['id' => 10])->where('price', '>', 4)->get();

        // $data = Library::where('author', 'LIKE', '%aur%')->orderBy('id', 'desc')->paginate(100);

        // $data = Library::where('author', 'LIKE', '%aur%')->orWhere('id', '>', 5)->orderBy('id', 'desc')->paginate(100);

        // $data = Library::whereIn('id', [1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12])->get();

        // $data = Library::whereBetween('id', [1, 5])->get();

        // Query scope

        // $data = Library::id()->get();//pagal scopeId
        // $data = Library::id2(15)->get(); //pagal scopeId2

        // *****Soft delete***

        // $data = Library::find(14)->delete();//soft delete

        // $data = Library::all();//nėra ištrinto

        // $data = Library::withTrashed()->find(14);//randa ir ištrintus
        // $data = Library::withTrashed()->get(); //randa ir ištrintus

        // Restore deleted data

        $data = Library::withTrashed()->find(15)->restore(); //randa ir ištrintus find() ir atkuria;

        // $data = Library::find(14)->delete(); //Ištrina soft;
        // $data = Library::withTrashed()->find(14)->forceDelete(); //Ištrina hard

        return $data;
        //
        //return view('user');
        // return view("");
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}

<?php
namespace App\Http\Controllers;

use App\Models\Crud;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File as HandleFile;
use Illuminate\Support\Facades\Storage;

// class CrudController extends Controller implements HasMiddleware
class CrudController extends Controller
{
    //Su Middleware
    // public static function middleware()
    // {
    //     return [new Middleware(CheckUserRoleMiddleware::class)];
    // }

    //Kitas būdas
    // public function __construct()
    // {
    //     $this->middleware(CheckUserRoleMiddleware::class);
    // }

    //Kai kuriems class metodams
    // public function __construct()
    // {
    //     $this->middleware(CheckUserRoleMiddleware::class)->only(['store', 'update']);
    // }

    //visiems class metodams išskyrus
    // public function __construct()
    // {
    //     $this->middleware(CheckUserRoleMiddleware::class)->except(['index']);
    // }

    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        // if ($request->has("search")) {
        //     $search = $request->get("search");
        //     $cruds  = Crud::where("firstName", "like", "%$search%")->get();
        //     dd($cruds);
        // }
        $cruds = Crud::when($request->has('search'), function ($query) use ($request) {
            $query->where('firstName', 'like', "%$request->search%")
                ->orWhere('lastName', 'like', "%$request->search%")
                ->orWhere("email", "like", "%$request->search%")
                ->orWhere("phone", "like", "%$request->search%")->get();

        })->get();

        // dd($cruds);
        return view("crud.crud_view", ["cruds" => $cruds]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view("crud.crud_create");
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // $input = $request->all();
        // dd($input);

        $request->validate([
            'image' => ['required', 'image', 'max:5000'],
        ],
            [
                'image.required' => 'Failas yra privalomas',
                'image.image'    => 'Failas turi būti jpg, jpeg, ar png',
                'image.max'      => 'Failo dydis negali viršyti 5 MB.',
            ],
        );

        $file = $request->file("image")->store('/', 'dir_public');

        // dd($request->file('image'));
        $crudStore              = new Crud();
        $crudStore->file_path   = $file;
        $crudStore->firstName   = $request->input('firstName');
        $crudStore->lastName    = $request->input('lastName');
        $crudStore->email       = $request->input('email');
        $crudStore->phone       = $request->input('phone');
        $crudStore->bankAccount = $request->input('bankAccount');
        $crudStore->birthDate   = $request->input('birthDate');

        $crudStore->save();
        return redirect()->route('crud.index')->with('success', 'Įrašas išsaugotas sėkmingai!');

    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        return view("crud.crud_show", ["crud" => Crud::find($id)]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        // dd($id);
        return view("crud.crud_update", ["crud" => Crud::find($id)]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        // 1. Suraskime esamą įrašą pagal ID
        $crudStore = Crud::findOrFail($id);

        // 2. Galite pridėti validaciją
        $request->validate([
            'firstName'   => 'required|string|max:255',
            'lastName'    => 'required|string|max:255',
            'email'       => 'required|email|max:255',
            'phone'       => 'nullable|string|max:15',
            'bankAccount' => 'nullable|string|max:255',
            'birthDate'   => 'nullable|date',
        ]);

        // 3. Atnaujinkime laukus
        $crudStore->firstName   = $request->input('firstName');
        $crudStore->lastName    = $request->input('lastName');
        $crudStore->email       = $request->input('email');
        $crudStore->phone       = $request->input('phone');
        $crudStore->bankAccount = $request->input('bankAccount');
        $crudStore->birthDate   = $request->input('birthDate');

        // 4. Jeigu yra failas, jį išsaugome
        if ($request->hasFile('image')) {
            $file = $request->file("image")->store('/', 'dir_public'); // Įkeliamas failas
            HandleFile::delete(public_path('uploads/' . $crudStore->file_path));
            $crudStore->file_path = $file;
        }

        // 5. Išsaugome pakeitimus
        $crudStore->save();

        // 6. Nukreipiame į sąrašą su pranešimu
        return redirect()->route('crud.index')->with('success', 'Įrašas sėkmingai atnaujintas!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        Crud::find($id)->delete(); //soft delete
                                   // dd(vars: $id);
        return redirect()->route('crud.index')->with('success', 'Įrašas sėkmingai ištrintas!');
    }
    public function trash()
    {
        $cruds = Crud::onlyTrashed()->get(); //get soft deleted
        return view("crud.crud_trash", ["cruds" => $cruds])->with('success', 'Įrašas sėkmingai ištrintas!');

    }
    public function restore(Request $request)
    {
        $request->validate([
            'id' => 'required|integer|exists:cruds,id',
        ]);

        $crud = Crud::withTrashed()->findOrFail($request->id);
        $crud->restore();
        $cruds = Crud::onlyTrashed()->get();                          //get soft deleted
        session()->flash('success', 'Įrašas sėkmingai atkurtas!'); //Kai darome return view reikia taip pranešimus kurti
        return view("crud.crud_trash", ["cruds" => $cruds])->with('success', 'Įrašas sėkmingai atkurtas!');

    }
    public function delete(Request $request)
    {

        $request->validate([
            'id' => 'required|integer|exists:cruds,id',
        ]);

        $crud = Crud::onlyTrashed()->findOrFail($request->id);
        // dd(vars: $crud);

        if (Storage::disk('dir_public')->exists($crud->file_path)) {

            HandleFile::delete(public_path('uploads/' . $crud->file_path));
        }
        $crud->forceDelete();                                                 //Ištrina hard
        $cruds = Crud::onlyTrashed()->get();                                  //get soft deleted
        session()->flash('success', 'Įrašas sėkmingai visam ištrintas!'); //Kai darome return view reikia taip pranešimus kurti
        return view("crud.crud_trash", ["cruds" => $cruds]);

    }
}

<?php
namespace App\Http\Controllers;

use App\Http\Requests\ContactStoreRequest;
use App\Models\Contact;
use Illuminate\Http\Request;

class GetContactsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view("contacts");
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
    public function store(ContactStoreRequest $request)
    {
        // $request->validate([
        //     'name'    => 'required|string|max:5',
        //     'email'   => 'required|email',
        //     'phone'   => 'required|string',
        //     'message' => 'required|string',
        // ],
        //     [
        //         'name.required' => 'Vardo laukelis yra privalomas',
        //         'name.max'      => 'Maksimalus ilgis yra 5 simboliai',
        //     ]

        // ); // Validacijos gali būti iškeltos į Request clasę

        // Išsaugok duomenis (pritaikyk pagal savo duomenų bazės modelį)

        //Vienas būdas išsaugoti************
        // \App\Models\Contact::create([
        //     'name'    => $request->name,
        //     'email'   => $request->email,
        //     'phone'   => $request->phone,
        //     'message' => $request->message,
        // ]);

        //Kitas būdas išsaugoti
        // $contact          = new Contact();
        // $contact->name    = $request->name;
        // $contact->email   = $request->email;
        // $contact->phone   = $request->phone;
        // $contact->message = $request->message;
        // $contact->save();

        //Išsaugo tik validuotus duomenis, bet tada reikia modelyje nustatyti protected $fillable = ['name', 'email', 'phone', 'message']; ir protected $guarded = [];
        Contact::create($request->validated());
        // Nukreipimas atgal su pranešimu
        return redirect()->route('contacts.index')->with('success', 'Žinutė sėkmingai išsiųsta!');
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

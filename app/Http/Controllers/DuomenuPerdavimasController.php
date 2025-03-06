<?php
namespace App\Http\Controllers;

use App\Models\Library;
use Illuminate\Http\Request;

class DuomenuPerdavimasController extends Controller
{

    public function index(Request $request)
    {
        $books = Library::query(); // Sukuria naują query objektą
                                   // $books->where('title', '')
                                   //     ->orderBy('created_at', 'desc')
                                   //     ->get();
                                   // $books = Library::all(); // Sukuria naują query objektą
                                   // dd($books);
        $result      = $books->get();
        $kintamasis1 = "Labas";
        $kintamasis2 = "Viskas yra gerai";
        return View('bandymai.duomenu_perdavimas', ['kintamasis1' => $kintamasis1, 'kintamasis2' => $kintamasis2, 'kintamasis3' => $result]);

    }
}

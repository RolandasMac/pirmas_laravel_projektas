<?php
namespace App\Http\Controllers;

class HomeController extends Controller
{
    public function index()
    {
        $kintamasis = "duomenysiscontroller";
        return view("gaidys", compact("kintamasis"));
    }
    public function home()
    {
        return view("home");
    }
}

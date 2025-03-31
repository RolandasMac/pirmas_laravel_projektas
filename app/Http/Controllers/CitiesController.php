<?php
namespace App\Http\Controllers;

use App\Models\Country;
use Illuminate\Http\Request;

class CitiesController extends Controller
{
    public function index(Request $request)
    {
        // $cities    = City::all();
        // $counties  = County::all();
        $countries = Country::all();

        return view("cities", compact("countries"));
    }
}

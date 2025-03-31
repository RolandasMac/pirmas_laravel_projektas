<?php
namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Support\Facades\Gate;

class ProductsController extends Controller
{
    public function index()
    {
        $products = Product::all();
        // $products = Product::where("user_id", Auth::user()->id)->orderBy("id", "desc")->paginate(10);

        // dd($products);
        return view('products', compact('products'));
    }
    public function showone(string $id)
    // public function showone(Request $request)
    {
        // dd($request->input('id'));
        // dd($id);
        $product = Product::findOrFail($id);
                                                  // dd($product);
        if (! Gate::allows('showone', $product)) { //kai ne per policy o per provider reikia pavadinimą kitą iš providerio: "show-product"
            abort(403);
        }
        // dd($product);
        return view('product', compact('product'));
    }
}

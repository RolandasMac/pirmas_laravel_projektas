<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SingleActionController extends Controller
{
    /**
     * Handle the incoming request.
     */
    // __invoke() yra specialus magiškas metodas PHP kalboje. Laravel'e šis metodas leidžia sukurti vieno veiksmo (Single Action) kontrolerius. Tai naudinga, kai kontroleris turi atlikti tik vieną užduotį (pvz., rodyti puslapį, apdoroti formą ir pan.).
    public function __invoke(Request $request)
    {
        return "This is Single action Controller";
    }
}

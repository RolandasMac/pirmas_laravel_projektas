<?php
namespace App\Http\Controllers;

use App\Models\File;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File as HandleFile;
use Illuminate\Support\Facades\Storage;

class FileUploadController extends Controller
{
    public function index()
    {
        $files = File::all();
        // dd($files);
        return view("fileUpload", ['files' => $files]);
    }

    public function store(Request $request)
    {
        $request->validate([
            'file' => ['required', 'image', 'max:5000'],
        ],
            [
                'file.required' => 'Failas yra privalomas',
                'file.image'    => 'Failas turi būti jpg, jpeg, ar png',
                'file.max'      => 'Failo dydis negali viršyti 5 MB.',
            ],
        );
        //Abu metodai tinka!!!
        // $file = Storage::disk('local')->put('/uploads', $request->file('file'));
        // $file = $request->file("file")->store('/uploads', 'local');
        $file = $request->file("file")->store('/', 'dir_public');

        // $file1   = $request->file('file');
        // $methods = get_class_methods($file1);
        // dd($methods);
        //http://localhost:8000/storage/uploads/69zVpNmBcES8LI0QuHbVUPrXyvg2toJauwPyGSvl.jpg

        $fileStore            = new File();
        $fileStore->file_path = $file;
        $fileStore->save();
        $files = File::all();
        // dd($files);
        // return view("fileUpload", ['files' => $files]);
        return redirect()->route('file.index')->with('success', 'Failas įkeltas sėkmingai!');
    }
    public function download($file_path)
    {
        if (! Storage::disk('dir_public')->exists($file_path)) {
            abort(404, 'Failas nerastas.');
        }
        return Storage::disk('dir_public')->download(($file_path));
        dd($file);
        return view("fileUpload", ['files' => $files]);
    }
    public function delete($file_path)
    {
        // dd($file_path);
        if (! Storage::disk('dir_public')->exists($file_path)) {
            $files = File::all();

            return view("fileUpload", ['files' => $files]);
        }
        $file = File::where('file_path', $file_path)->first();
        $file->delete();
        HandleFile::delete(public_path('uploads/' . $file_path));
        // Storage::disk('dir_public')->delete($file_path);
        $files = File::all();
        // dd($files);
        session()->flash('success', 'Failas ištrintas sėkmingai!');
        return view("fileUpload", ['files' => $files]);
    }
}

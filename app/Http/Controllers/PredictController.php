<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ImageController extends Controller
{
    public function index()
    {
        return view('dogsbreeds');
    }

    public function upload(Request $request)
    {
        // Validate the uploaded file
        $request->validate([
            'image' => 'required|image|max:2048'
        ]);

        // Get the uploaded file and store it in a file storage service
        $file = $request->file('image');
        $path = $file->store('images');

        // Return a response containing the URL of the stored image file
        $url = Storage::url($path);
        return response()->json(['url' => $url]);
    }

}

<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\File;

class HomeController extends Controller
{
    public function index()
    {
        // Fetch all image files from the public/images/destinations directory
        $imageFiles = File::files(public_path('images/destinations'));

        // Extract the relative paths to use in the Blade template
        $images = array_map(function ($file) {
            return 'images/destinations/' . $file->getFilename();
        }, $imageFiles);

        return view('welcome', compact('images'));
    }
}

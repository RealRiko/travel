<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Auth;
use App\Models\Destination;

class HomeController extends Controller
{
    // For the welcome page
    public function index()
    {
        $imageFiles = File::files(public_path('images/destinations'));

        $images = array_map(function ($file) {
            return 'images/destinations/' . $file->getFilename();
        }, $imageFiles);

        return view('welcome', compact('images'));
    }

    // For the user dashboard
    public function dashboard()
    {
        $user = Auth::user();

        $likedDestinations = $user->likes()
            ->where('likeable_type', Destination::class)
            ->where('value', 1)
            ->with('likeable')
            ->get()
            ->pluck('likeable');

        return view('dashboard', compact('likedDestinations'));
    }
}
<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Auth;
use App\Models\Destination;

class HomeController extends Controller
{
    // For the welcome page
    public function index()
    {
        $imageFiles = File::files(public_path('images/destinations'));

        $images = array_map(function ($file) {
            return 'images/destinations/' . $file->getFilename();
        }, $imageFiles);

        return view('welcome', compact('images'));
    }

    // For the user dashboard
    public function dashboard()
    {
        $user = Auth::user();

        $likedDestinations = $user->likes()
            ->where('likeable_type', Destination::class)
            ->where('value', 1)
            ->with('likeable')
            ->get()
            ->pluck('likeable');

        return view('dashboard', compact('likedDestinations'));
    }
}

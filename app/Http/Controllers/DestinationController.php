<?php
namespace App\Http\Controllers;

use App\Models\Destination;
use Illuminate\Http\Request;

class DestinationController extends Controller
{
    public function index()
    {
        $destinations = Destination::all(); // Fetch all destinations
        return view('destinations', compact('destinations')); // Pass data to the view
    }
}



<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Destination extends Model
{
    use HasFactory;

    // Optionally, you can define the table name if it's not 'destinations'
    // protected $table = 'destinations';

    // Define which columns are mass assignable
    protected $fillable = ['name', 'description', 'country', 'city', 'activity_type', 'image'];
}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Drill;

class Sort extends Controller
{
    public function show()
    {
        $deleted = Drill::where('name', 'Drill1')->delete();

        $drill = new Drill(); 
        $drill->name = "Drill1";
        $drill->description = "Drill description"; 
        $drill->save();

        foreach (Drill::all() as $drill) {
            echo $drill->name;
        }
        return view('sort', ['name' => 'Sorting']);
    }
}

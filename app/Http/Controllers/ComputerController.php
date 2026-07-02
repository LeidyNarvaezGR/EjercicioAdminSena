<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Computer;

class ComputerController extends Controller
{
     public function create(){

    return view('Computer.create');

     }

    public function store(Request $request)
{
    $computer = new Computer();
    $computer->number = $request->number;
    $computer->brand = $request->brand;
    $computer->save();

    return $computer;

     }
}

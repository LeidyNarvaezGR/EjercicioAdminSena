<?php

namespace App\Http\Controllers;


use App\Models\TrainingCenter;
use Illuminate\Http\Request;
class TrainingCentersController extends Controller
{
    public function index()
    {

    $trainingcenters = TrainingCenter::all();
      return response()->json($trainingcenters);
    }

    public function create()
    {
        return view('trainingcenters.create');
    }


    public function store(Request $request)
{
    $request->validate([
        'name' => 'required|string|max:255',
        'location' => 'required|string|max:255',
    ]);

    $trainingcenter = TrainingCenter::create($request->all());

    return response()->json($trainingcenter);
}


public function update(Request $request, TrainingCenter $trainingcenter)
{
    $request->validate([
        'name' => 'required|string|max:255',
        'location' => 'required|string|max:255',
    ]);

    $trainingcenter->update($request->all());

    return response()->json($trainingcenter);
}

    public function destroy(TrainingCenter $trainingcenter)
    {
        $trainingcenter->delete();
        return $trainingcenter;
    }

    public function show($id) 
    {
        $trainingcenter = TrainingCenter::findOrFail($id);
        return response()->json($trainingcenter);
    }
}

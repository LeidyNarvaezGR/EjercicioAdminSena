<?php

namespace App\Http\Controllers;

use App\Models\Area;
use Illuminate\Http\Request;

class AreaController extends Controller
{
    public function create() {
        return view('areas.create');
    }

    public function store(Request $request) {
        $area = new Area();
        $area->name = $request->name;
        $area->save();

        return $area;
    }
}

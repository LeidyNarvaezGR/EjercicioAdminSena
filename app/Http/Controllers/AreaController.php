<?php

namespace App\Http\Controllers;

use App\Models\Area;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class AreaController extends Controller
{
    public function webIndex()
    {
        $areas = Area::all();
        return view('areas.index', compact('areas'));
    }

    public function index()
    {
        return Area::all();
    }

    public function show(Area $area)
    {
        return response()->json($area, 200);
    }

    public function create()
    {
        return view('areas.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'imagen' => 'nullable|image|mimes:jpg,jpeg,png,webp|max:5120',
        ]);

        $imagenUrl = null;
        $publicId = null;

        if ($request->hasFile('imagen')) {
            $file = $request->file('imagen');

            $cloudName = config('services.cloudinary.cloud_name');
            $apiKey = config('services.cloudinary.api_key');
            $apiSecret = config('services.cloudinary.api_secret');

            $timestamp = time();
            $toSign = "folder=areas&timestamp={$timestamp}";
            $signature = hash('sha1', $toSign . $apiSecret);

            $response = Http::attach('file', file_get_contents($file->getRealPath()), $file->getClientOriginalName())
                ->post("https://api.cloudinary.com/v1_1/{$cloudName}/image/upload", [
                    'api_key' => $apiKey,
                    'timestamp' => $timestamp,
                    'signature' => $signature,
                    'folder' => 'areas',
                ]);

            if (!$response->successful()) {
                return back()->withErrors(['imagen' => 'Error al subir la imagen a Cloudinary']);
            }

            $data = $response->json();
            $imagenUrl = $data['secure_url'] ?? null;
            $publicId = $data['public_id'] ?? null;
        }

        $area = Area::create([
            'name' => $request->name,
            'imagen_url' => $imagenUrl,
            'imagen_public_id' => $publicId,
        ]);

        return redirect()->route('areas.index')->with('success', 'Área creada correctamente');
    }

    public function edit(Area $area)
    {
        return view('areas.edit', compact('area'));
    }

    public function update(Request $request, Area $area)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'imagen' => 'nullable|image|mimes:jpg,jpeg,png,webp|max:5120',
        ]);

        $area->name = $request->name;

        if ($request->hasFile('imagen')) {
            $file = $request->file('imagen');

            $cloudName = config('services.cloudinary.cloud_name');
            $apiKey = config('services.cloudinary.api_key');
            $apiSecret = config('services.cloudinary.api_secret');

            $timestamp = time();
            $toSign = "folder=areas&timestamp={$timestamp}";
            $signature = hash('sha1', $toSign . $apiSecret);

            $response = Http::attach('file', file_get_contents($file->getRealPath()), $file->getClientOriginalName())
                ->post("https://api.cloudinary.com/v1_1/{$cloudName}/image/upload", [
                    'api_key' => $apiKey,
                    'timestamp' => $timestamp,
                    'signature' => $signature,
                    'folder' => 'areas',
                ]);

            if (!$response->successful()) {
                return back()->withErrors(['imagen' => 'Error al subir la imagen a Cloudinary']);
            }

            $data = $response->json();
            $area->imagen_url = $data['secure_url'] ?? null;
            $area->imagen_public_id = $data['public_id'] ?? null;
        }

        $area->save();

        return redirect()->route('areas.index')->with('success', 'Área actualizada correctamente');
    }

    public function destroy(Area $area)
    {
        $area->delete();

        return redirect()->route('areas.index')->with('success', 'Área eliminada correctamente');
    }
}

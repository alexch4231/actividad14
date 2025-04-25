<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class FileController extends Controller
{
    public function upload(Request $request)
    {
        $request->validate([
            'archivo' => 'required|file'
        ]);

        $archivo = $request->file('archivo');
        $nombreOriginal = $archivo->getClientOriginalName();
        $path = $archivo->storeAs('imagenes', $nombreOriginal);

        return redirect('/form')->with('download_path', $path);
    }

    public function download(Request $request)
    {
        $path = $request->query('path');

        if (!$path) {
            return response('Ruta de archivo no especificada', 400);
        }

        if (!Storage::exists($path)) {
            return response('Archivo no encontrado', 404);
        }

        return Storage::download($path);
    }

    public function list()
    {
        $archivos = Storage::files('imagenes');
        return view('form', ['archivos' => $archivos]);
    }
}
  
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Subida y descarga de archivos</title>
</head>
<body>
    <h1>Subir archivo</h1>

    <form action="{{ route('upload') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <input type="file" name="archivo" required>
        <button type="submit">Subir</button>
    </form>

    @if(session('download_path'))
        <p><strong>Archivo subido:</strong> <a href="{{ route('download', ['path' => session('download_path')]) }}">Descargar archivo</a></p>
    @endif

    <hr>

    
    <hr>

    <h2>Archivos disponibles</h2>
    @if(!empty($archivos))
        <ul>
            @foreach($archivos as $archivo)
                <li>
                    {{ basename($archivo) }} - 
                    <a href="{{ route('download', ['path' => $archivo]) }}">Descargar</a>
                </li>
            @endforeach
        </ul>
    @else
        <p>No hay archivos disponibles.</p>
    @endif
</body>
</html>

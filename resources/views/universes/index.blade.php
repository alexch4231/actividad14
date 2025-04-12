@extends('layouts.main')

@section('content')
    <h1>Universes</h1>
    <hr>
        <a href="{{ route('universes.create') }}">Create universe</a>
    <hr>

    <table>
        <thead>
            <tr>
                <th>Id</th>
                <th>Name</th>
            </tr>
        </thead>

        <tbody>
            @foreach($universes as $item)
            <tr>
                <td>{{$item->id}}</td>
                <td>{{$item->name}}</td>
                <td>
                    <a href="{{ route('universes.show', $item->id) }}">Show</a>
                    <a href="{{ route('universes.edit', $item->id) }}">Edit</a>

                    <form action="{{ route('universes.destroy', $item->id) }}" method="post">
                        @csrf 
                        @method('delete')
                        <input type="submit" value="Delete" onclick="return confirm('Are you sure? All superheroes with this UNIVERSE will be deleted.')">
                    </form>
                </td>
            </tr>
            @endforeach
            
        </tbody>
    </table>
    
@endsection
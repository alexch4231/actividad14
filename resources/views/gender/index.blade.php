@extends('layouts.main')

@section('content')
    <h1>Gender</h1>

    <hr>
        <a href="{{ route('genders.create') }}">Create gender</a>
    <hr>

    <table>
        <thead>
            <tr>
                <th>Id</th>
                <th>Name</th>
            </tr>
        </thead>

        <tbody>
            @foreach($genders as $item)
            <tr>
                <td>{{$item->id}}</td>
                <td>{{$item->name}}</td>
                <td>
                    <a href="{{ route('genders.show', $item->id) }}">Show</a>
                    <a href="{{ route('genders.edit', $item->id) }}">Edit</a>
                    
                    <form action="{{ route('genders.destroy', $item->id) }}" method="post">
                        @csrf 
                        @method('delete')
                        <input type="submit" value="Delete" onclick="return confirm('Are you sure? All superheroes with this GENDER will be deleted.')">
                    </form>

                </td>
            </tr>
            @endforeach
            
        </tbody>
    </table>
@endsection
@extends('layouts.main')

@section('content')
    <h1>Edit superheroe</h1>

    <form action="{{ route('superheroes.update',$superheroes->id) }}" method="post">
        <!-- genera un token unico -->
        @csrf
        @method('patch')

        <label for="#">Gender</label>
        <select name="gender_id">
            @foreach($genders as $gender)
                <option value="{{ $gender->id }}"
                @if ($gender->id == $superheroes->gender_id)
                    selected
                @endif
                
                >{{$gender->name}}</option>
            @endforeach
            
        </select>

        <br><br>

        <label for="#">Universe</label>
        <select name="universe_id">
            @foreach($universes as $universe)
                <option value="{{ $universe->id }}"
                @if ($universe->id == $superheroes->universe_id)
                    selected
                @endif
                
                >{{$universe->name}}</option>
            @endforeach
            
        </select>

        <label for="">Name</label>
        <input type="text" name="name" value="{{ $superheroes->name }}">
        <br> 
        <label for="">Real Name</label>
        <input type="text" name="realName" value="{{ $superheroes->realName }}">
        <br>
        <label for="">Picture</label>
        <input type="text" name="Picture" value="{{ $superheroes->Picture }}">
        <br><br> 
        <input type="submit" value="Edit">
    </form>
@endsection
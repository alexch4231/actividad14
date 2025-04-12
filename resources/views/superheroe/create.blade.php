@extends('layouts.main')
@section('content')
    <h1>Create superheroe</h1>
    <hr>
        <a href="{{ route('superheroes.index') }}">Return to index</a>
    <hr>

    <form action="{{ route('superheroes.store') }}" method="post">
        <!-- genera un token unico -->
        @csrf
         
        <label for="#">Gender</label>
        <select name="gender_id">
            @foreach($genders as $gender)
                <option value="{{ $gender->id }}">{{$gender->name}}</option>
            @endforeach
            
        </select>

        <br><br>

        <label for="#">Universe</label>
        <select name="universe_id">
            @foreach($universes as $universe)
                <option value="{{ $universe->id }}">{{$universe->name}}</option>
            @endforeach
            
        </select>

        <label for="">Name</label>
        <input type="text" name="name">
        <br> 
        <label for="">Real Name</label>
        <input type="text" name="realName">
        <br>
        <label for="">Picture</label>
        <input type="text" name="Picture">
        <br><br> 
        <input type="submit" value="Create Superheroe">
    </form>
@endsection
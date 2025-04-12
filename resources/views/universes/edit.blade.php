@extends('layouts.main')

@section('content')
    <h1>Edit universes</h1>

    <form action="{{ route('universes.update',$universes->id) }}" method="post">
        <!-- genera un token unico -->
        @csrf
        @method('patch')

      
        <label for="">Name</label>
        <input type="text" name="name" value="{{ $universes->name }}">
        <br> 
       
        <input type="submit" value="Edit universe">
    </form>
@endsection
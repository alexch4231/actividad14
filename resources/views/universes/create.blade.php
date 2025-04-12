@extends('layouts.main')

@section('content')
    <h1>Create universe</h1>
    <hr>
        <a href="{{ route('universes.index') }}">Return to index</a>
    <hr>

    <form action="{{ route('universes.store') }}" method="post">
        <!-- genera un token unico -->
        @csrf
         
        <label for="">Name</label>
        <input type="text" name="name">

        <input type="submit" value="Create Universe">
    </form>
@endsection
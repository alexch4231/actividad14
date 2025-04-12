@extends('layouts.main')

@section('content')
    <h1>Edit gender</h1>

    <form action="{{ route('genders.update',$genders->id) }}" method="post">
        <!-- genera un token unico -->
        @csrf
        @method('patch')

      
        <label for="">Name</label>
        <input type="text" name="name" value="{{ $genders->name }}">
        <br> 
       
        <input type="submit" value="Edit gender">
    </form>
@endsection
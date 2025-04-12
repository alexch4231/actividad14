@extends('layouts.main')

@section('content')
    <h1>Universe</h1>

    <table>
        <thead>
            <tr>
                <th>Id</th>
                <th>Name</th>
            </tr>
        </thead>

        <tbody>
            <tr>
                <td>{{$universes->id}}</td>
                <td>{{$universes->name}}</td>
            </tr>
        </tbody>
    </table>
@endsection
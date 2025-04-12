@extends('layouts.main')

@section('content')
    <h1>Gender</h1>

    <table>
        <thead>
            <tr>
                <th>Id</th>
                <th>Name</th>
            </tr>
        </thead>

        <tbody>
            <tr>
                <td>{{$genders->id}}</td>
                <td>{{$genders->name}}</td>
            </tr>
        </tbody>
    </table>
@endsection
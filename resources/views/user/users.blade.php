@extends('master')
@section('title','Anasayfa')
@section('content')
<div class="container">
    <h2>Striped Rows</h2>
    <p>The .table-striped class adds zebra-stripes to a table:</p>
    <table class="table table-striped">
        <thead>
        <tr>
            <th>ID</th>
            <th>İsim</th>
            <th>Soyisim</th>
        </tr>
        </thead>
        <tbody>
        @foreach($users as $user)
            <tr>
                <td>{{$user->id}}</td>
                <td>{{$user->name}}</td>
                <td>{{$user->surname}}</td>
            </tr>
        @endforeach
        </tbody>
    </table>
</div>
@endsection

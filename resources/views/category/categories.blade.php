@extends('master')
@section('title','Anasayfa')
@section('content')
    <div class="container">
        <a href="{{route('category.store')}}">
            <button class="btn btn-success">Kategori Ekle</button>
        </a>
        <table class="table table-striped">
            <thead>
            <tr>
                <th>ID</th>
                <th>Kategori Adı</th>
                <th>Üst Kategori ID</th>
                <th></th>
            </tr>
            </thead>
            <tbody>
            @foreach($categories as $category)
                <tr>
                    <td>{{$category->id}}</td>
                    <td>{{$category->name}}</td>
                    <td>{{$category->top_category}}</td>
                    <td>
                        <a href="{{route('category.update',$category->id)}}"><button class="btn btn-primary btn-sm">Düzenle</button></a>
                        <a href="{{route('category.delete',$category->id)}}"><button class="btn btn-danger btn-sm">Sil</button></a>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
@endsection

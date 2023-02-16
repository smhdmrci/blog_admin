@extends('master')
@section('title','Anasayfa')
@section('content')
    <div class="container">
        <a href="{{route('blog.store')}}">
            <button class="btn btn-success">Blog Ekle</button>
        </a>
        <table class="table table-striped">
            <thead>
            <tr>
                <th>ID</th>
                <th>Blog Adı</th>
                <th>Blog Başlığı</th>
                <th>Blog Resimi</th>
                <th>Blog Kategori</th>
                <th>Blog Yazarı</th>
                <th></th>
            </tr>
            </thead>
            <tbody>
            @foreach($blogs as $blog)
                <tr>
                    <td>{{$blog->id}}</td>
                    <td>{{$blog->name}}</td>
                    <td>{{$blog->title}}</td>
                    <td>{{$blog->image}}</td>
                    <td>{{$blog->categories}}</td>
                    <td>{{$blog->writer}}</td>
                    <td>
                        <a href="{{route('blog.update',$blog->id)}}"><button class="btn btn-primary btn-sm">Düzenle</button></a>
                        <a href="{{route('blog.delete',$blog->id)}}"><button class="btn btn-danger btn-sm">Sil</button></a>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
@endsection

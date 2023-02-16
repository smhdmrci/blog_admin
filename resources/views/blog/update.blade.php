@extends('master')
@section('title','Anasayfa')
@section('content')
    <form action="{{route('blog.update',$blog->id)}}" enctype="multipart/form-data" method="POST" class="container">
        @csrf
        <div class="form-group row">
            <label for="name" class="col-sm-2 col-form-label">Blog Adı</label>
            <div class="col-sm-10">
                <input value="{{$blog->name}}" type="text" name="name" class="form-control" id="name" placeholder="Blog Adı" required>
            </div>
        </div>
        <div class="form-group row">
            <label for="title" class="col-sm-2 col-form-label">Başlık</label>
            <div class="col-sm-10">
                <input value="{{$blog->title}}" type="text" name="title" class="form-control" id="title" placeholder="Başlık" required>
            </div>
        </div>
        <div class="form-group row">
            <label for="desc" class="col-sm-2 col-form-label">Blog İçerik</label>
            <div class="col-sm-10">
            <textarea name="desc" class="form-control" id="desc" placeholder="Blog İçerik" required>
                {{$blog->desc}}
            </textarea>
            </div>
        </div>

        <div class="form-group row">
            <label for="title" class="col-sm-2 col-form-label">Kategori</label>

            <div class="form-check">
                @foreach($categories as $category)
                    @if(in_array($category->id,$selected_categories))
                        <input class="form-check-input" type="checkbox" name="categories[]" value="{{$category->id}}"
                               id="flexCheckDefault{{$category->id}}" checked>
                        <label class="form-check-label" for="flexCheckDefault{{$category->id}}">
                            {{$category->name}}
                        </label>
                    @else
                        <input class="form-check-input" type="checkbox" name="categories[]" value="{{$category->id}}"
                               id="flexCheckDefault{{$category->id}}">
                        <label class="form-check-label" for="flexCheckDefault{{$category->id}}">
                            {{$category->name}}
                        </label>
                    @endif

                @endforeach
            </div>
        </div>
        <div class="form-group row">
            <label for="image" class="col-sm-2 col-form-label">Blog Resim</label>
            <div class="col-sm-10">
                <input value="{{$blog->image}}" type="file" name="image" class="form-control" id="image" placeholder="Resim Seç" required>
            </div>
        </div>
        <div class="form-group row">
            <label for="writer" class="col-sm-2 col-form-label">Yazar</label>
            <div class="col-sm-10">
                <input value="{{$blog->writer}}" type="text" name="writer" class="form-control" id="writer" placeholder="Yazar Adı Soyadı" required>
            </div>
        </div>
        <div class="form-group row">
            <div class="col-sm-10">
                <button type="submit" class="btn btn-primary">Kaydet</button>
            </div>
        </div>
    </form>
@endsection


@extends('master')
@section('title','Anasayfa')
@section('content')
    <form action="{{route('category.update',$category->id)}}" method="POST" class="container">
        @csrf
        <div class="form-group row">
            <label for="catName" class="col-sm-2 col-form-label">Kategori Adı</label>
            <div class="col-sm-10">
                <input value="{{$category->name}}" type="text" name="name" class="form-control" id="catName" placeholder="Kategori Adı" required>
            </div>
        </div>
        <div class="form-group row">
            <label for="topCat" class="col-sm-2 col-form-label">Üst Kategori</label>
            <div class="col-sm-10">
                <select id="topCat" class="form-control" name="top_category">
                    <option value="">Boş</option>
                    @foreach($categories as $cat)
                        @if($cat->id == $category->top_category)
                            <option value="{{$cat->top_category}}" selected>{{$cat->name}}</option>
                        @elseif($cat->id == $category->id)
                            <option value="{{$cat->id}}" disabled>{{$cat->name}}</option>
                        @else
                            <option value="{{$cat->id}}">{{$cat->name}}</option>
                        @endif

                    @endforeach

                </select>
            </div>

        </div>
        <div class="form-group row">
            <div class="col-sm-10">
                <button type="submit" class="btn btn-primary">Kaydet</button>
            </div>
        </div>
    </form>
@endsection

@extends('layouts.admin')

@section('content')
<!-- Basic Card Example -->
<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">
            {{$post->translate('title')}} - tahrirlash
        </h6>
    </div>
    <div class="card-body">
        @include('admin.alerts.main')
        <form method="POST" enctype="multipart/form-data" action="{{ route('admin.posts.update', $post->id) }}">
            @csrf
            @method('PUT')
            <ul class="nav nav-tabs" id="myTab" role="tablist">
                <li class="nav-item">
                  <a class="nav-link active" id="home-tab" data-toggle="tab" href="#home" role="tab" aria-controls="home" aria-selected="true">O'zbekcha</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" id="profile-tab" data-toggle="tab" href="#profile" role="tab" aria-controls="profile" aria-selected="false">Русский</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" id="contact-tab" data-toggle="tab" href="#contact" role="tab" aria-controls="contact" aria-selected="false">English</a>
                </li>
              </ul>
              <div class="tab-content" id="myTabContent">
                <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
                    <div class="form-group">
                        <label for="">Sarlavha</label>
                        <input value="{{$post->title_uz}}" class="form-control" name="title_uz" type="text">
                    </div>
                    <div class="form-group">
                        <label for="">Qisqacha</label>
                        <input value="{{$post->short_uz}}" class="form-control" name="short_uz" type="text">
                    </div>
                    <div class="form-group">
                        <label for="">Maqola</label>
                        <textarea name="content_uz" id="" class="form-control" cols="30" rows="10">{{$post->content_uz}}</textarea>
                    </div>
                </div>
                <div class="tab-pane fade" id="profile" role="tabpanel" aria-labelledby="profile-tab">
                    <div class="form-group">
                        <label for="">Название</label>
                        <input value="{{$post->title_ru}}" class="form-control" name="title_ru" type="text">
                    </div>
                    <div class="form-group">
                        <label for="">Короткий</label>
                        <input value="{{$post->short_ru}}" class="form-control" name="short_ru" type="text">
                    </div>
                    <div class="form-group">
                        <label for="">Полный</label>
                        <textarea name="content_ru" id="" class="form-control" cols="30" rows="10">{{$post->content_ru}}</textarea>
                    </div>
                </div>
                <div class="tab-pane fade" id="contact" role="tabpanel" aria-labelledby="contact-tab">
                    <div class="form-group">
                        <label for="">Title</label>
                        <input value="{{$post->title_en}}" class="form-control" name="title_en" type="text">
                    </div>
                    <div class="form-group">
                        <label for="">Short description</label>
                        <input value="{{$post->short_en}}" class="form-control" name="short_en" type="text">
                    </div>
                    <div class="form-group">
                        <label for="">Body of article</label>
                        <textarea name="content_en" id="" class="form-control" cols="30" rows="10">{{$post->content_en}}</textarea>
                    </div>
                </div>
              </div>
            <div class="form-group">
                <label for="">Turkum</label>
                <select class="form-control" name="id_cat" id="">
                    @foreach ($category_list as $item)
                        <option value="{{$item->id}}"
                            @if($item->id == $post->id_cat) selected @endif >
                            {{$item->name}}
                        </option>
                    @endforeach
                </select>
            </div>
            <div class="form-group">
                <label for="">Rasm</label>
                <input class="form-control" name="picture" type="file">
            </div>
            <div class="form-group">
                <img src="/storage/{{$post->thumb}}" width="200px" class="img img-thumbnail" alt="">
            </div>
            <button type="submit" class="btn btn-success">Saqlash</button>
        </form>
    </div>
</div>
@endsection
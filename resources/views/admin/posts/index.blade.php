@extends('layouts.admin')

@section('content')
<!-- Basic Card Example -->
<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">
            Maqolalar
            <a class="btn btn-sm btn-primary float-right" href="{{route('admin.posts.create')}}">Yaratish</a>
        </h6>
    </div>
    <div class="card-body">
        @include('admin.alerts.main')
        <table class="table table-bordered">
            <thead>
                <th width="100px">Rasm</th>
                <th>Sarlavha</th>
                <th width="280px">Amallar</th>
            </thead>
            <tbody>
                @foreach($posts as $post)
                <tr>
                    <td>
                        <img class="img img-thumbnail" width="80px" src="{{ '/storage/'.$post->thumb }}" alt="{{ $post->title }}">
                    </td>
                    <td>{{$post->translate('title')}}</td>
                    <td>
                        <div class="btn-group" role="group" aria-label="Button group with nested dropdown">
                            <a target="_blank" href="{{route('news.more', $post->id)}}" class="btn btn-primary">
                                <i class="fa fa-eye"></i> Ko'rish
                            </a>
                            <div class="btn-group" role="group">
                              <button id="btnGroupDrop1" type="button" class="btn btn-danger dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                              </button>
                              <div class="dropdown-menu" aria-labelledby="btnGroupDrop1">
                                <a class="dropdown-item" href="{{route('admin.posts.edit', $post->id)}}"><i class="fa fa-edit"></i> Tahrirlash</a>
                                <form method="POST" action="{{route('admin.posts.destroy', $post->id)}}">
                                    @csrf
                                    @method('DELETE')
                                    <button class="dropdown-item" type="submit"><i class="fa fa-trash"></i> O'chirish</button>
                                </form> 
                              </div>
                            </div>
                        </div>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
        {{$posts->links()}}
    </div>
</div>
@endsection
@extends('layouts.admin')

@section('content')
<!-- Basic Card Example -->
<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">
            {{$post->title}} - ko'rish
        </h6>
    </div>
    <div class="card-body">
        <h3>{{$post->title}}</h3>
        <b>Qisqacha: </b>
        <p>
            {{$post->short}}
        </p>
        <b>Batafsil: </b>
        <p>
            {{$post->content}}
        </p>
        {{$post->created_at->format('H:i d/m/Y')}} <br>
        {{$post->updated_at->format('H:i d/m/Y')}}
    </div>
</div>
@endsection
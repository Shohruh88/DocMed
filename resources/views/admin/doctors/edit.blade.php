@extends('layouts.admin')

@section('content')
<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">
            Doktorni tahrirlash
        </h6>
    </div>
    <div class="card-body">
        @include('admin.alerts.main')
        <form method="POST" enctype="multipart/form-data" action="{{ route('admin.doctors.update', $doctor->id) }}">
            @csrf
            @method('PUT')
            <div class="form-group">
                <label for="">To'liq ismi <span class="text-danger">*</span></label>
                <input value="{{old('full_name', $doctor->full_name)}}" class="form-control" name="full_name" required type="text">
            </div>
            <div class="form-group">
                <label for="">Mutaxassisligi <span class="text-danger">*</span></label>
                <input value="{{old('special', $doctor->special)}}" class="form-control" name="special" required type="text">
            </div>
            <div class="form-group">
                <label for="">Rasm</label>
                <input class="form-control" name="picture" type="file">
            </div>
            <div class="form-group">
                <img class="img img-thumbnail" src="{{asset('storage/'.$doctor->picture)}}" alt="{{$doctor->full_name}}">
            </div>
            <div class="form-group">
                <label for="">Ish boshlagan sana <span class="text-danger">*</span></label>
                <input value="{{old('start_date', $doctor->start_date)}}" class="form-control" name="start_date" required type="date">
            </div>
            <button type="submit" class="btn btn-success">Saqlash</button>
        </form>
    </div>
</div>
@endsection
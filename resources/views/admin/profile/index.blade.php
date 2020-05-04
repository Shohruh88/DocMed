@extends('layouts.admin')

@section('content')
<div class="row">
    <div class="col-lg-8">
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">
                    Profilni tahrirlash
                </h6>
            </div>
            <div class="card-body">
                @include('admin.alerts.main')
                <form method="POST" action="{{route('admin.profile.update')}}">
                    @csrf
                    @method('PUT')
                    <div class="form-group">
                        <label for="name">Ism <span class="text-danger">*</span></label>
                        <input name="name" id="name" value="{{old('name', $user->name)}}" required type="text" class="form-control">
                    </div> 
                    <div class="form-group">
                        <label for="email">E-Manzil <span class="text-danger">*</span></label>
                        <input name="email" id="email" value="{{old('email', $user->email)}}" required type="email" class="form-control">
                    </div> 
                    <button type="submit" class="btn btn-primary">Saqlash</button>
                </form>
            </div>
        </div>
    </div>
    <div class="col-lg-4">
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">
                    Parolni tahrirlash
                </h6>
            </div>
            <div class="card-body">
                <form method="POST" action="{{route('admin.profile.password')}}">
                    @csrf
                    @method('PUT')
                    <div class="form-group">
                        <label for="password">Yangi parol <span class="text-danger">*</span></label>
                        <input name="password" id="name" required type="password" class="form-control">
                    </div> 
                    <div class="form-group">
                        <label for="password_confirmation">Yangi parolni tasdiqlash <span class="text-danger">*</span></label>
                        <input name="password_confirmation" id="password_confirmation" required type="password" class="form-control">
                    </div> 
                    <button type="submit" class="btn btn-danger btn-block">O'zgartirish</button>
                </form>
            </div>
        </div>
    </div>
</div>

@endsection
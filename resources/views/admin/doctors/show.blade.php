@extends('layouts.admin')

@section('content')
<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">
            Xabarni o'qish
        </h6>
    </div>
    <div class="card-body">
        <table class="table table-striped">
            <tr>
                <td class="font-weight-bold">To'liq ismi</td>
                <td>{{$doctor->full_name}}</td>
            </tr>
            <tr>
                <td class="font-weight-bold">Mutaxassisligi</td>
                <td>{{$doctor->special}}</td>
            </tr>
            <tr>
                <td class="font-weight-bold">Rasm</td>
                <td><img class="img img-thumbnail" src="{{asset('storage/'.$doctor->picture)}}" alt="{{$doctor->full_name}}"></td>
            </tr>
            <tr>
                <td class="font-weight-bold">Ish boshlagan sanasi</td>
                <td>{{$doctor->start_date->format('d/m/Y')}}</td>
            </tr>
        </table>
    </div>
</div>
@endsection
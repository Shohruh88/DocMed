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
                <td>{{$item->name}}</td>
            </tr>
            <tr>
                <td class="font-weight-bold">E-Manzil</td>
                <td>{{$item->email}}</td>
            </tr>
            <tr>
                <td class="font-weight-bold">Mavzu</td>
                <td>{{$item->subject}}</td>
            </tr>
            <tr>
                <td class="font-weight-bold">Xabar</td>
                <td>{!! nl2br($item->message) !!}</td>
            </tr>
            <tr>
                <td class="font-weight-bold">Sana</td>
                <td>{{$item->created_at->format('H:i d/m/Y')}}</td>
            </tr>
        </table>
    </div>
</div>
@endsection
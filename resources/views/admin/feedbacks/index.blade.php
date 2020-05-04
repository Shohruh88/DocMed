@extends('layouts.admin')

@section('content')
<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">
            Xabarlar
        </h6>
    </div>
    <div class="card-body">
        @include('admin.alerts.main')
        <table class="table table-bordered">
            <thead>
                <th>To'liq nomi</th>
                <th>Mavzu</th>
                <th>Vaqti</th>
                <th>Holat</th>
                <th width="180px">Amallar</th>
            </thead>
            <tbody>
                @foreach($items as $item)
                <tr>
                    <td>{{$item->name}}</td>
                    <td>{{$item->subject}}</td>
                    <td>{{$item->created_at->format('H:i d/m/Y')}}</td>
                    <td>{{$item->status ? 'O`qilgan' : 'O`qilmagan'}}</td>
                    <td>
                        <div class="btn-group" role="group" aria-label="Button group with nested dropdown">
                            <a href="{{route('admin.feedbacks.show', $item->id)}}" class="btn btn-primary">
                                <i class="fa fa-eye"></i> Ko'rish
                            </a>
                            <div class="btn-group" role="group">
                              <button id="btnGroupDrop1" type="button" class="btn btn-danger dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                              </button>
                              <div class="dropdown-menu" aria-labelledby="btnGroupDrop1">
                                <form method="POST" action="{{route('admin.feedbacks.delete', $item->id)}}">
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
        {{$links}}
    </div>
</div>
@endsection
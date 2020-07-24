@extends('layouts.home')

@section('content')
<div class="d-flex flex-wrap justify-content-between">
    <div> <button type="button" class="btn btn-shadow btn-wide btn-primary"> <span class="btn-icon-wrapper pr-2 opacity-7"> <i class="fa fa-plus fa-w-20"></i> </span> New thread </button> </div>
    <div class="col-12 col-md-3 p-0 mb-3"> <input type="text" class="form-control" placeholder="Search..."> </div>
</div>
<div class="card mb-3">
    <table class="table">
        <thead class="thead-light">
            <tr>
                <th>Pertanyaan</th>
                <th>Balasan</th>
                <th>Terakhir Dibalas</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($question as $q)
            <tr>
                <td>
                    <div class="">
                        <a href="{{ route('detail', ['question_id' => $q->question_id]) }}" class="text-big" data-abc="true">{{ $q->question_title }}</a>
                        <div class="text-muted small mt-1">{{ $q->updated_at }} &nbsp;·&nbsp; <a href="javascript:void(0)" class="text-muted" data-abc="true">{{ $q->name }}</a></div>
                    </div>
                </td>
                <td>
                    {{ $q->jumlah }}
                </td>
                <td>
                    @if ($q->last_reply)
                        {{ $q->last_reply->updated_at }}
                    @else
                        -
                    @endif
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
<nav>
    <ul class="pagination mb-5">
        <li class="page-item disabled"><a class="page-link" href="javascript:void(0)" data-abc="true">«</a></li>
        <li class="page-item active"><a class="page-link" href="javascript:void(0)" data-abc="true">1</a></li>
        <li class="page-item"><a class="page-link" href="javascript:void(0)" data-abc="true">2</a></li>
        <li class="page-item"><a class="page-link" href="javascript:void(0)" data-abc="true">3</a></li>
        <li class="page-item"><a class="page-link" href="javascript:void(0)" data-abc="true">»</a></li>
    </ul>
</nav>
@endsection
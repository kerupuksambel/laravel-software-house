@extends('layouts.home')

@section('content')
<div class="d-flex flex-wrap justify-content-between">
    <div class="col-12 p-0 mb-3">
        <form action="{{ route('search') }}" method="GET" class="row">
            <div class="col-md-10 mb-3">
                <input type="text" class="form-control" name="q" placeholder="Cari..." value="{{ $term }}">
            </div>
            <div class="col-md-2">
                <button type="submit" class="btn btn-primary w-100">
                    <i class="fa fas fa-search"></i>
                </button>
            </div>
        </form>
    </div>
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
<div class="row mt-3">
<div class="col-md-6">
    {{ $question->links() }}
</div>
</div>
@endsection
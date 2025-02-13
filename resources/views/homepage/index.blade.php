@extends('layouts.home')

@section('content')
<div class="d-flex flex-wrap justify-content-between">
    <div>
        <a role="button" href="{{ route('question.create') }}" class="btn btn-shadow btn-wide btn-primary">
            <span class="btn-icon-wrapper pr-2 opacity-7">
                <i class="fa fa-plus fa-w-20"></i>
            </span> Pertanyaan Baru
        </a>
    </div>
    <div class="col-12 col-md-3 p-0 mb-3">
        <form action="{{ route('search') }}" method="GET">
            <input type="text" class="form-control" name="q" placeholder="Cari...">
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
<div class="col-md-6 row">
    <div class="col-md-3">
        <b>Urutkan berdasarkan... </b>
    </div>
    <select id="sort" class="form-control col-md-9">
        <option value="name" @if($method == 'name') selected @endif>Judul Pertanyaan</option>
        <option value="date" @if($method == 'date') selected @endif>Tanggal Pertanyaan</option>
    </select>
</div>
</div>
@endsection

@section('js')
    <script>
        $(document).ready(function(){
            $("#sort").change(function(){
                var sel = $(this).children("option:selected").val();
                if(sel == 'name'){
                    window.location = "?sort=name"
                }else if(sel == 'date'){
                    window.location = "?sort=date"
                }
            });


        })
    </script>
@endsection
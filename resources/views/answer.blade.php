@extends('layouts.master')

@section('content')

<div class="container">
    <div class="card">
        <div class="card-header">
            Jawaban Anda
        </div>
        <div class="card-body">
            <a href="/answer/create" class="btn btn-primary">Input Jawaban Baru</a>
            <br />
            <br />
            <table class="table table-bordered table-hover table-striped">
                <thead>
                    <tr>
                        <th>Pertanyaan</th>
                        <th>Jawaban</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($answer as $p)
                    <tr>
                        <td></td>
                        <td>
                            <a href="{{ route('detail', ['question_id', $p->question_id]) }}">
                                {{ $p->question_title }}
                            </a>
                        </td>
                        <td>{{ $p->answer_description }}</td>
                        <td>
                            <a href="/answer/edit/{{ $p->answer_id }}" class="btn btn-primary">Edit</a>
                            <a href="/answer/destroy/{{ $p->answer_id }}" class="btn btn-danger">Hapus</a>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection
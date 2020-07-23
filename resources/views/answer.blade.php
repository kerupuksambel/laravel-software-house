@extends('layouts.app')

@section('content')

<div class="container">
    <div class="card mt-5">
        <div class="card-header text-center">
            CRUD Data Jawaban 
        </div>
        <div class="card-body">
            <a href="/answer/create" class="btn btn-primary">Input Jawaban Baru</a>
            <br />
            <br />
            <table class="table table-bordered table-hover table-striped">
                <thead>
                    <tr>
                        <th>Judul</th>
                        <th>Deskripsi</th>
                        <th>OPSI</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($answer as $p)
                    <tr>
                        <td>{{ $p->answer_title }}</td>
                        <td>{{ $p->answer_description }}</td>
                        <td>
                            <a href="/answer/edit/{{ $p->answer_id }}" class="btn btn-warning">Edit</a>
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
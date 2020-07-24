@extends('layouts.master')

@section('content')
<div class="container">
    <div class="card mt-5">
        <div class="card-header text-center">
            Daftar Pertanyaan
        </div>
        <div class="card-body">
            <a href="/question/create" class="btn btn-primary">Tambah Pertanyaan Baru</a>
            <br />
            <br />
            <table class="table table-bordered table-hover table-striped">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Title</th>
                        <th>Description</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($question as $p)
                    <tr>
                        <td>{{ $p->question_id }}</td>
                        <td>{{ $p->question_title }}</td>
                        <td>{{ $p->question_description }}</td>
                        <td>
                            <a href="/question/edit/{{ $p->question_id }}" class="btn btn-primary">Edit</a>
                            <a href="/question/destroy/{{ $p->question_id }}" class="btn btn-danger">Delete</a>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection
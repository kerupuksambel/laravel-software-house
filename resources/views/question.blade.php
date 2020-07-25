@extends('layouts.master')

@section('content')
<div class="container">
    <div class="card">
        <div class="card-header text-center">
            Pertanyaan Anda
        </div>
        <div class="card-body">
            <div class="row pb-3">
                <div class="col-md-6">
                    <a href="/question/create" class="btn btn-primary">Tambah Pertanyaan Baru</a>
                    <a href="/question/sortbyupdated" class="btn btn-secondary">Sort by Date</a>
                </div>
                <div class="col-md-6">
                    <form action="{{ route('question.search') }}" class="pull-right" method="GET">
                        <div class="row">
                            <input type="text" name="search" placeholder="Search" class="form-control col-md-9" value="{{ request('search') }}">
                            <input type="submit" value="Search" class="btn btn-primary ml-3">
                        </div>
                    </form>
                </div>
            </div>
            <table class="table table-bordered table-hover table-striped">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Judul</th>
                        <th>Deskripsi</th>
                        <th>Aksi</th>
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
            <div class="mt-3">
                {{ $question->links() }}
            </div>
        </div>
    </div>
</div>
@endsection
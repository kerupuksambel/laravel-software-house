@extends('layouts.app')

@section('content')
<p>halo ini daftar pertanyaan</p>
<div class="container">
    <div class="card mt-5">
        <div class="card-header text-center">
            List of Questions
        </div>
        <div class="card-body">
            <a href="/question/create" class="btn btn-primary">Add New Question!</a>
            <br />
            <br />
            <table class="table table-bordered table-hover table-striped">
                <thead>
                    <tr>
                        <th>User ID</th>
                        <th>ID</th>
                        <th>Title</th>
                        <th>Description</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($question as $p)
                    <tr>
                        <td>{{ $user }}</td>
                        <td>{{ $p->question_id }}</td>
                        <td>{{ $p->question_title }}</td>
                        <td>{{ $p->question_description }}</td>
                        <td>
                            <a href="/question/edit/{{ $p->question_id }}" class="btn btn-warning">Edit</a>
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
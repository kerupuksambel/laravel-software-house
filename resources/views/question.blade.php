@extends('layouts.app')

@section('content')
<p>halo ini daftar pertanyaan</p>
<div class="container">
    <div class="card mt-5">
        <div class="card-header text-center">
            List of Questions
        </div>
        <div class="card-body">
            <form action="/question/search" method="GET">
                <input type="text" name="search" placeholder="Search question ..." value="{{ request('search') }}">
                <input type="submit" value="SEARCH">
            </form>
            <br><br><br>
            <a href="/question/create" class="btn btn-primary">Add New Question!</a>
            <br />
            <br />
            <!-- <table class="table table-bordered table-hover table-striped"> -->
            <!-- <thead>
                    <tr>
                        <th>User ID</th>
                        <th>ID</th>
                        <th>Title</th>
                        <th>Description</th>
                        <th>Action</th>
                    </tr>
                </thead> -->
            <!-- <tbody> -->
            @foreach($question as $p)
            <!-- <tr>
                <td>{{ $user }}</td>
                <td>{{ $p->question_id }}</td>
                <td>{{ $p->question_title }}</td>
                <td>{{ $p->question_description }}</td>
                <td>
                    <a href="/question/edit/{{ $p->question_id }}" class="btn btn-warning">Edit</a>
                    <a href="/question/destroy/{{ $p->question_id }}" class="btn btn-danger">Delete</a>
                </td>
            </tr> -->
            <div>
                <h2 style="font-family:Cambria, Cochin, Georgia, Times, 'Times New Roman', serif">{{ $p->question_title }}</h2>
                User ID : {{ $user }} | Question ID : {{ $p->question_id }}
                <br>
                <div style="font-size:smaller;">Created at : {{ $p->created_at }} | Updated at : {{ $p->updated_at }}
                    <br>
                    <a href="/question/edit/{{ $p->question_id }}" class="btn btn-sm btn-warning">Edit</a>
                    <a href="/question/destroy/{{ $p->question_id }}" class="btn btn-sm btn-danger">Delete</a>
                </div>

                <br>
                <div style="font-size: larger;">{{ $p->question_description }}</div>
                <hr>
            </div>
            @endforeach
            <br />
            Halaman : {{ $question->currentPage() }} <br />
            Jumlah Data : {{ $question->total() }} <br />
            Data Per Halaman : {{ $question->perPage() }} <br />


            {{ $question->links() }}
            </tbody>
            </table>
        </div>
    </div>
</div>
@endsection
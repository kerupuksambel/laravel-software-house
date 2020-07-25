@extends('layouts.master')

@section('content')
<div class="container">
    <div class="card">
        <div class="card-header text-center">
            Jawaban Anda
        </div>
        <div class="card-body">
            <div class="row pb-3">
                <div class="col-md-6">
                    <a href="/answer/sortbyupdated" class="btn btn-secondary">Sort by Date</a>
                </div>
                <div class="col-md-6">
                    <form action="{{ route('answer.search') }}" class="pull-right" method="GET">
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
                        <th>Pertanyaan</th>
                        <th>Jawaban</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($answer as $p)
                    <tr>
                        <td>
                            <a href="{{ route('detail', ['question_id' => $p->question_id]) }}">
                                {{ $p->question_title }}
                            </a>
                        </td>
                        <td>{{ $p->answer_description }}</td>
                        <td>
                            <a href="/answer/edit/{{ $p->answer_id }}" class="btn btn-primary">Edit</a>
                            <a href="/answer/destroy/{{ $p->answer_id }}" class="btn btn-danger">Delete</a>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
            <div class="mt-3">
                {{ $answer->links() }}
            </div>
        </div>
    </div>
</div>
@endsection
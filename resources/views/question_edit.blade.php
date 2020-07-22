@extends('layouts.app')

@section('content')
<div class="container">
    <div class="card mt-5">
        <div class="card-header text-center">
            Edit Question
        </div>
        <div class="card-body">
            <a href="/question" class="btn btn-primary">Kembali</a>
            <br />
            <br />


            <form method="post" action="/question/update/{{ $question->question_id }}">

                {{ csrf_field() }}
                {{ method_field('PUT') }}

                <div class="form-group">
                    <label>Judul Pertanyaan</label>
                    <input type="text" name="question_title" class="form-control" placeholder="Judul pertanyaan ..." value=" {{ $question->question_title }}">

                    @if($errors->has('question_title'))
                    <div class="text-danger">
                        {{ $errors->first('question_title')}}
                    </div>
                    @endif

                </div>

                <div class="form-group">
                    <label>Deskripsi Pertanyaan</label>
                    <textarea name="question_description" class="form-control" placeholder="Deskripsi Pertanyaan .."> {{ $question->question_description }} </textarea>

                    @if($errors->has('question_description'))
                    <div class="text-danger">
                        {{ $errors->first('question_description')}}
                    </div>
                    @endif

                </div>

                <div class="form-group">
                    <input type="submit" class="btn btn-success" value="Simpan">
                </div>

            </form>

        </div>
    </div>
</div>
@endsection
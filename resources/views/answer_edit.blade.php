@extends('layouts.app')

@section('content')
<div class="container">
    <div class="card mt-5">
        <div class="card-header text-center">
            CRUD Jawaban - <strong>EDIT DATA</strong> 
        </div>
        <div class="card-body">
            <a href="/answer" class="btn btn-primary">Kembali</a>
            <br />
            <br />


            <form method="post" action="/answer/update/{{ $answer->answer_id }}">

                {{ csrf_field() }}
                {{ method_field('PUT') }}

                <div class="form-group">
                    <label>Judul Pertanyaan</label>
                    <input type="text" name="answer_title" class="form-control" placeholder="Judul pertanyaan ..." value=" {{ $answer->answer_title }}">

                    @if($errors->has('answer_title'))
                    <div class="text-danger">
                        {{ $errors->first('answer_title')}}
                    </div>
                    @endif

                </div>

                <div class="form-group">
                    <label>Deskripsi Jawaban</label>
                    <textarea name="answer_description" class="form-control" placeholder="Deskripsi Jawaban .."> {{ $answer->answer_description }} </textarea>

                    @if($errors->has('answer_description'))
                    <div class="text-danger">
                        {{ $errors->first('answer_description')}}
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
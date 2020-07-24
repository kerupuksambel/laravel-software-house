@extends('layouts.master')

@section('content')
<div class="container">
    <div class="card">
        <div class="card-header">
            Tambah Pertanyaan
        </div>
        <div class="card-body">
            <form method="post" action="/question/store">

                {{ csrf_field() }}

                <div class="form-group">
                    <label>Judul Pertanyaan</label>
                    <input type="text" name="question_title" class="form-control" placeholder="Judul Pertanyaan" value="">

                    @if($errors->has('question_title'))
                    <div class="text-danger">
                        {{ $errors->first('question_title')}}
                    </div>
                    @endif

                </div>

                <div class="form-group">
                    <label>Deskripsi Pertanyaan</label>
                    <textarea name="question_description" class="form-control" placeholder="Deskripsi Pertanyaan"></textarea>

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
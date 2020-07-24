@extends('layouts.master')

@section('content')
<div class="container">
    <div class="card">
        <div class="card-header">
            Tambah Jawaban
        </div>
        <div class="card-body">
            <form method="post" action="/answer/store">

                {{ csrf_field() }}

                <div class="form-group">
                    <label>Judul Jawaban</label>
                    <input type="text" name="answer_title" class="form-control" placeholder="Judul Jawaban" value="">

                    @if($errors->has('answer_title'))
                    <div class="text-danger">
                        {{ $errors->first('answer_title')}}
                    </div>
                    @endif

                </div>

                <div class="form-group">
                    <label>Deskripsi Jawaban</label>
                    <textarea name="answer_description" class="form-control" placeholder="Deskripsi Jawaban"></textarea>

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
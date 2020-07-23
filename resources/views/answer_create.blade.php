@extends('layouts.app')

@section('content')
<p>Halo ini form Jawaban</p>

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <h1>Buat Pertanyaan</h1>

            <div class="card">
                <div class="card-body">
                    <form action="/answer/store" method="POST">
                        {{csrf_field()}}

                        <div class="form-group">
                            <label>Judul</label>
                            <input type="text" class="form-control" name="answer_title">
                        </div>

                        <div class="form-group">
                            <label class="col-form-label">Keterangan</label>
                            <textarea class="ckeditor" id="answer_description" name="answer_description"></textarea>
                        </div>

                        <button type="submit" class="btn btn-primary">Submit</button>
                        <a class="btn btn-outline-primary" href="/answer">Kembali</a>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
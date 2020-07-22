@extends('layouts.app')

@section('content')
<p>halo ini daftar pertanyaan</p>
<div class="container">
    <div class="card mt-5">
        <div class="card-header text-center">
            CRUD Data Pegawai - <a href="https://www.malasngoding.com/category/laravel" target="_blank">www.malasngoding.com</a>
        </div>
        <div class="card-body">
            <a href="/question/create" class="btn btn-primary">Input Pegawai Baru</a>
            <br />
            <br />
            <table class="table table-bordered table-hover table-striped">
                <thead>
                    <tr>
                        <th>Nama</th>
                        <th>Alamat</th>
                        <th>OPSI</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($question as $p)
                    <tr>
                        <td>{{ $p->question_title }}</td>
                        <td>{{ $p->question_description }}</td>
                        <td>
                            <a href="/question/edit/{{ $p->question_id }}" class="btn btn-warning">Edit</a>
                            <a href="#" class="btn btn-danger">Hapus</a>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection
@extends('layouts.home')

@section('content')
    <div class="card mb-3">
        <div class="card-body">
            <h5 class="card-title">{{ $question->question_title }}</h5>
            <h6 class="card-subtitle mb-2 text-muted">{{ $question->name }}</h6>
            <p class="card-text">{{ $question->question_description }}</p>
            <div class="mb-3">
                <div class="text-muted">Posted at {{ $question->updated_at }}</div>
            </div>
            @if (auth()->user() && auth()->user()->id == $question->id)
                <a href="#" class="card-link">Edit</a>
                <a href="#" class="card-link">Delete</a>            
            @endif
          </div>        
    </div>
    @foreach ($answers as $answer)
        <div class="card mb-3">
            <div class="card-body">
                <h5 class="card-title">{{ $answer->answer_title }}</h5>
                <h6 class="card-subtitle mb-2 text-muted">{{ $answer->name }}</h6>
                <p class="card-text">{{ $answer->answer_description }}</p>
                <div class="mb-3">
                    <div class="text-muted">Posted at {{ $answer->updated_at }}</div>
                </div>
                @if (auth()->user() && auth()->user()->id == $answer->id)
                    <a href="#" class="card-link">Edit</a>
                    <a href="#" class="card-link">Delete</a>            
                @endif
              </div>        
        </div>
    @endforeach
    <a href="{{ route('answer.create', ['question_id' => $question->question_id]) }}" role="button" class="btn btn-primary">Tambah Jawaban</a>
@endsection
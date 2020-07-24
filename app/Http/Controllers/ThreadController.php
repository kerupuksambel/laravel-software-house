<?php

namespace App\Http\Controllers;

use App\Models\Question;
use App\Models\Answer;
use Illuminate\Http\Request;

class ThreadController extends Controller
{
    public function index()
    {
        $question = Question::join('users', 'users.id', 'question.user_id')
        ->selectRaw('question.*, users.name')
        ->get();

        foreach ($question as $key => $q) {
            $query = Answer::where('question_id', $q->question_id);
            $q->jumlah = $query->count();
            if($q->jumlah > 0){
                $q->last_reply = $query->orderBy('created_at', 'desc')->first();
            }
        }

        return view('homepage.index', compact('question'));
    }

    public function detail($question_id)
    {
        $question = Question::where('question_id', $question_id)
        ->join('users', 'users.id', 'question.user_id')
        ->selectRaw('question.*, users.name, users.id')
        ->firstOrFail();
        $answers = Answer::where('question_id', $question_id)
        ->join('users', 'users.id', 'answer.user_id')
        ->selectRaw('answer.*, users.name, users.id')
        ->get();

        return view('homepage.detail', compact('question', 'answers'));
    }
}

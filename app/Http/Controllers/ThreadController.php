<?php

namespace App\Http\Controllers;

use App\Models\Question;
use App\Models\Answer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;

class ThreadController extends Controller
{
    public function index(Request $request)
    {
        if($request->sort == 'name'){
            $question = Question::join('users', 'users.id', 'question.user_id')
            ->selectRaw('question.*, users.name')
            ->orderBy('question.question_title', 'asc')
            ->paginate(3);
        }else{
            $question = Question::join('users', 'users.id', 'question.user_id')
            ->selectRaw('question.*, users.name')
            ->orderBy('question.updated_at', 'desc')
            ->paginate(3);
        }
        foreach ($question as $key => $q) {
            $query = Answer::where('question_id', $q->question_id);
            $q->jumlah = $query->count();
            if($q->jumlah > 0){
                $q->last_reply = $query->orderBy('created_at', 'desc')->first();
            }
        }

        $method = $request->sort;
        $question = $question->appends(Input::except('page'));

        return view('homepage.index', compact('question', 'method'));
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

    public function search(Request $request)
    {
        if(!is_null($request->q)){
            $term = $request->q;
            $question = Question::join('users', 'users.id', 'question.user_id')
            ->where('question.question_title', 'LIKE', '%'.$term.'%')
            ->selectRaw('question.*, users.name')
            ->orderBy('question.updated_at', 'desc')
            ->paginate(3);

            foreach ($question as $key => $q) {
                $query = Answer::where('question_id', $q->question_id);
                $q->jumlah = $query->count();
                if($q->jumlah > 0){
                    $q->last_reply = $query->orderBy('created_at', 'desc')->first();
                }
            }

            return view('homepage.search', compact('question', 'term'));
        }else{
            return redirect()->route('/');
        }
    }
}

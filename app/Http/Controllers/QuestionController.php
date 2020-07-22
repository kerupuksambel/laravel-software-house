<?php

namespace App\Http\Controllers;

use App\Models\Question;
use Illuminate\Http\Request;

class QuestionController extends Controller
{
    //
    public function index()
    {
        $question = Question::all();
        return view('question', ['question' => $question]);
    }

    public function create()
    {
        return view('question_create');
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'question_title' => 'required',
            'question_description' => 'required'
        ]);

        Question::create([
            'question_id' => 1,
            'user_id' => 1,
            'question_title' => $request->question_title,
            'question_description' => $request->question_description
        ]);
        return redirect('/question');
    }

    public function edit($id)
    {
        $question = Question::find($id);
        return view('question_edit', ['question' => $question]);
    }
}

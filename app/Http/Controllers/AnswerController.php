<?php

namespace App\Http\Controllers;

use App\Models\Answer;
use Illuminate\Http\Request;

class AnswerController extends Controller
{
    //
    public function index()
    {
        $answer = Answer::where('answer.user_id', auth()->user()->id)
        ->join('question', 'question.question_id', 'answer.question_id')
        ->get();
        return view('answer', ['answer' => $answer]);
    }

    public function create($question_id)
    {
        return view('answer_create', compact('question_id'));
    }

    public function store(Request $request, $question_id)
    {
        $this->validate($request, [
            'answer_title' => 'required',
            'answer_description' => 'required'
        ]);

        Answer::create([
            'question_id' => $question_id,
            'user_id' => auth()->user()->id,
            'answer_title' => $request->answer_title,
            'answer_description' => $request->answer_description
        ]);
        return redirect('/answer');
    }

    public function edit($id)
    {
        $answer = Answer::find($id);
        return view('answer_edit', ['answer' => $answer]);
    }

    public function update($id, Request $request)
    {
        $this->validate($request, [
            'answer_title' => 'required',
            'answer_description' => 'required'
        ]);

        $answer = Answer::find($id);
        $answer->answer_title = $request->answer_title;
        $answer->answer_description = $request->answer_description;
        $answer->save();
        return redirect('/answer');
    }

    public function destroy($id)
    {
        $answer = Answer::find($id);
        $answer->delete();
        return redirect('/answer');
    }
}

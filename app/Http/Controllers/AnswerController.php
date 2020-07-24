<?php

namespace App\Http\Controllers;

use App\Models\Answer;
use Illuminate\Http\Request;

class AnswerController extends Controller
{
    //
    public function index()
    {
        $answer = Answer::all();
        return view('answer', ['answer' => $answer]);
    }

    public function create()
    {
        return view('answer_create');
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'answer_title' => 'required',
            'answer_description' => 'required'
        ]);

        Answer::create([
            'answer_id' => 1,
            'question_id' => 1,
            'user_id' => 1,
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

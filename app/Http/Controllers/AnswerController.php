<?php

namespace App\Http\Controllers;

use App\Models\Answer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AnswerController extends Controller
{
    public function index()
    {

       
        $answer = Answer::all();
        $answer = Answer::orderBy('updated_at', 'desc')->paginate(2);

        $answer = Answer::where('answer.user_id', auth()->user()->id)
        ->join('question', 'question.question_id', 'answer.question_id')
        ->get();

        return view('answer', ['answer' => $answer]);
    }

    public function search(Request $request)
    {
        
        $search = $request->search;

        $answer = Answer::where('answer_title', 'LIKE', '%' . $search . '%')
            ->orWhere('answer_description', 'LIKE', '%' . $search . '%')
            ->orderBy('updated_at', 'desc')
            ->paginate(2);

        return view('answer', ['answer' => $answer]);
    }
    public function create()
    {
        return view('answer_create');
    }

    public function store(Request $request, $id)
    {
        $this->validate($request, [
            'answer_title' => 'required',
            'answer_description' => 'required'
        ]);

        Answer::create([

            'answer_id' => 1,
            'answer_id' => 1,
            'user_id' => 1,

            'question_id' => $id,
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

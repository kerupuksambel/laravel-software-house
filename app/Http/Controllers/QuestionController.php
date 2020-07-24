<?php

namespace App\Http\Controllers;

use App\Models\Question;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Auth;

class QuestionController extends Controller
{
    //
    public function index()
    {
        $user = Auth::user()->id;
        $question = Question::orderBy('updated_at', 'desc')->paginate(2);
        return view('question', ['question' => $question, 'user' => $user]);
    }

    public function search(Request $request)
    {
        $user = Auth::user()->id;
        $search = $request->search;

        $question = Question::where('question_title', 'LIKE', '%' . $search . '%')
            ->orWhere('question_description', 'LIKE', '%' . $search . '%')
            ->orderBy('updated_at', 'desc')
            ->paginate(2);
//         $user = Auth::user()->id;
//         $question = Question::where('id', $user);

        return view('question', ['question' => $question, 'user' => $user]);
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
            'user_id' => auth()->user()->id,
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

    public function update($id, Request $request)
    {
        $this->validate($request, [
            'question_title' => 'required',
            'question_description' => 'required'
        ]);

        $question = Question::find($id);
        $question->question_title = $request->question_title;
        $question->question_description = $request->question_description;
        $question->save();
        return redirect('/question');
    }

    public function destroy($id)
    {
        $question = Question::find($id);
        $question->delete();
        return redirect('/question');
    }
}

<?php

namespace App\Http\Controllers;

use App\Models\Question;
use Illuminate\Http\Request;

class ThreadController extends Controller
{
    public function index()
    {
        $question = Question::all();
        return view('layouts.home', compact('question'));
    }
}

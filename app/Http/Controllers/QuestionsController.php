<?php

namespace App\Http\Controllers;

use App\Models\Question;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class questionsController extends Controller
{
    public function index()
    {
        $questions = Question::all();

        return view('questions.index', ['questions' => $questions]);
    }

    public function create()
    {
        return view('questions.create');
    }

    public function store()
    {
        request()->validate([
            'title' => 'required',
            'content' => 'required',
        ]);

        Question::create([
            'title' => request('title'),
            'content' => request('content')
        ]);

        return redirect('/questions');
    }

    public function edit(Question $question)
    {
        return view('questions.edit', ['question' => $question]);
    }

    public function update(Question $question)
    {
        request()->validate([
            'title' => 'required',
            'content' => 'required',
        ]);

        $question->update([
            'title' => request('title'),
            'content' => request('content'),
        ]);

        return redirect('/questions');
    }

    public function destroy(Question $question)
    {
        $question->delete();

        return redirect('/questions');
    }
}

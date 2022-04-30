<?php

namespace App\Http\Controllers;
use App\Models\Answerlookup;
use Illuminate\Http\Request;

class AnswersLookupApiController extends Controller
{
    public function index()
    {
        return Answerlookup::all();
    }

    public function store()
    {
        request()->validate([

            'content' => 'required',
        ]);

        return Answerlookup::create([

            'content' => request('content'),
        ]);
    }

    public function update(Answerlookup $question)
    {
        request()->validate([

            'content' => 'required',
        ]);

        $success = $question->update([

            'content' => request('content'),
        ]);

        return [
            'success' => $success
        ];
    }

    public function destroy(Answerlookup $question)
    {
        $success = $question->delete();

        return [
            'success' => $success
        ];
    }
}

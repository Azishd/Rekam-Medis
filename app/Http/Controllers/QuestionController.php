<?php

namespace App\Http\Controllers;

use App\Models\Question;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class QuestionController extends Controller
{
    public function index()
    {
        $questions = Question::paginate(10);
        return view('question.index', compact('questions'));
    }

    public function create()
    {
        return view('question.create');
    }

    public function store(Request $request)
    {
        $request->validate(
            [
                'description' => 'required',
                'type' => 'required'
            ],
            [
                'description.required' => 'Description can\'t be empty!',
                'type.required' => 'Question type can\'t be empty!'
            ]
        );

        Question::create([
            'description' => $request->description,
            'type' => $request->type,
            'admin_id' => Auth::guard('admins')->user()->id
        ]);

        return redirect('question');
    }

    public function destroy(Request $request)
    {
        Question::findOrFail($request->id)->delete();
        return redirect('question');
    }
}

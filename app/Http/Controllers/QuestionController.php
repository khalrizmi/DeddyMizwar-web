<?php

namespace App\Http\Controllers;

use App\Question;
use Illuminate\Http\Request;
use App\Transformers\QuestionTransformer;

class QuestionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Question  $question
     * @return \Illuminate\Http\Response
     */
    public function show(Question $question)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Question  $question
     * @return \Illuminate\Http\Response
     */
    public function edit(Question $question)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Question  $question
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Question $question)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Question  $question
     * @return \Illuminate\Http\Response
     */
    public function destroy(Question $question)
    {
        //
    }

    /**
     * 
     *
     *  API
     * 
     */

    public function all(Question $question)
    {

        $questions = $question->all();

        $response = [];

        foreach ($questions as $key => $question) {
            array_push($response, [
                'id' => $question->id,
                'question' => $question->question,
                'answers' => $question->answers
            ]);
        }

        return response()->json(['data' => $response]);
    }

    public function send(Request $request, Question $question)
    {
        $question = $question->create([
            'from' => Auth::user()->id,
            'to'   => 1,
            'question' => $request->question,
        ]);

        $response = $question;

        return response()->json($response, 201);
    }

}

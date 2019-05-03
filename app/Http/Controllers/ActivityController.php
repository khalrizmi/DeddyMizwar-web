<?php

namespace App\Http\Controllers;

use App\Activity;
use Illuminate\Http\Request;
use App\Transformers\ActivityTransformer;

class ActivityController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $activities = Activity::all();
        return view('activity.index', compact('activities'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('activity.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        /* Image */
            $image = $request->file('image');
            $image_name = time().".".$image->getClientOriginalExtension();
            $folder = public_path('images/activity/');
            $image->move($folder,$image_name);

        Activity::create([
            'image' => $image_name,
            'title' => $request->title,
            'description' => $request->description,
            'date' => $request->date
        ]);

        return redirect()->route('activity.index')->with('message', 'Successfully added banner');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Activity  $activity
     * @return \Illuminate\Http\Response
     */
    public function show(Activity $activity)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Activity  $activity
     * @return \Illuminate\Http\Response
     */
    public function edit(Activity $activity)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Activity  $activity
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Activity $activity)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Activity  $activity
     * @return \Illuminate\Http\Response
     */
    public function destroy(Activity $activity)
    {
        //
    }


    /**
     * 
     *
     *  API
     * 
     */

    public function all(Activity $activity)
    {
        $activities = $activity->all();

        return fractal()
                    ->collection($activities)
                    ->transformWith(new ActivityTransformer)
                    ->toArray();
    }

    public function detail(Activity $activity, $id)
    {
        $activity = $activity->find($id);

        $detail = [
                'title' => $activity->title,
                'date'  => $activity->date,
                'description' => $activity->description,
                'image' => url("/images/activity/{$activity->image}"),
        ];

        return response()->json(['detail' => $detail]);

    }
}

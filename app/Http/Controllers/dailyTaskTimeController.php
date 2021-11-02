<?php

namespace App\Http\Controllers;

use App\Models\dailyTaskTime;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class dailyTaskTimeController extends Controller
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
        $validator = Validator::make($request->all(), [

            'start_time' => 'required',
            'end_time' => 'required',
        ]);

        if ($validator->fails()) {
            return response()->json([

                'status' => 400,
                'errors' => $validator->messages(),



            ]);
        } else {

            $timeData = new dailyTaskTime();
            $timeData->daily_task_id = $request->input('task_id');
            $timeData->start_time = $request->input('start_time');
            $timeData->end_time = $request->input('end_time');
            $timeData->save();


            return response()->json([

                'status' => 200,
                'message' => 'Time Data Saved Succesfully',



            ]);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request, $id)
    {
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $deleteTime = dailyTaskTime::find($id);
        $deleteTime->delete();

        return response()->json([

            'status' => 200,
            'message' => 'Time Data Deleted Succesfully',

        ]);
    }
    public function GetTime(Request $request, $id)
    {

        $timeList = dailyTaskTime::where('daily_task_id', $id)->get();
        return response()->json([

            'timeList' => $timeList,
        ]);
    }
}

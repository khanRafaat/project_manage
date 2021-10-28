<?php

namespace App\Http\Controllers;

use App\Models\dailyTask;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpKernel\DataCollector\AjaxDataCollector;

class DailyTaskController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if ($request->day) {
            if ($request->day == 'today') {

                $TaskList = dailyTask::where('date', '=', Carbon::today())->get();
            } else {

                $TaskList = dailyTask::where('date', '=', Carbon::yesterday())->get();
            }
        } else {

            $TaskList = dailyTask::latest()->paginate(10);
        }

        $adminTaskArray = array();

        foreach ($TaskList as $Task) {

            $adminTaskArray[$Task->id] = $Task;
        }



        return view('admin.task.view', compact('TaskList', 'adminTaskArray'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        $users = User::get();
        return view('admin.task.create', compact('users'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'reporter' => ['required'],
            'assignee' => ['required'],
            'assigned_work' => ['required'],
        ]);

        $task = new dailyTask;
        $task->assigned_work = $request->assigned_work;
        $task->reporter = $request->reporter;
        $task->assignee = $request->assignee;
        $task->date = Carbon::parse($request->input('date'));
        $task->assigned = Auth::user()->id;
        $task->save();



        $notification = array(
            'message' => 'Task Saved Succesfully',
            'alert-type' => 'success'
        );
        return Redirect()->back()->with($notification);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\dailyTask  $dailyTask
     * @return \Illuminate\Http\Response
     */
    public function show(dailyTask $dailyTask)
    {
        
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\dailyTask  $dailyTask
     * @return \Illuminate\Http\Response
     */
    public function edit(dailyTask $dailyTask)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\dailyTask  $dailyTask
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $updateTask = dailyTask::find($id);
        $updateTask->assigned_work = $request->assigned_work;
        $updateTask->done_work = $request->done_work;
        $updateTask->pf_reporter = $request->pfreporter;
        $updateTask->update();

        $notification = array(
            'message' => 'Task Updated Succesfully',
            'alert-type' => 'success'
        );
        return Redirect()->back()->with($notification);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\dailyTask  $dailyTask
     * @return \Illuminate\Http\Response
     */
    public function destroy(dailyTask $dailyTask)
    {
        //
    }

    
}

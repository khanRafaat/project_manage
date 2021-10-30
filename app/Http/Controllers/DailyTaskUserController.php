<?php

namespace App\Http\Controllers;

use App\Models\dailyTask;
use App\Models\dailyTaskUser;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Spatie\Permission\Models\Role;

class DailyTaskUserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if ($request->day) {

            if ($request->day == 'yesterday') {
                $AssignTask = User::find(Auth::id())->AssigneeTask()->where('date', '=', Carbon::yesterday())->get();


            } else if ($request->day == 'all') {


                $AssignTask = User::find(Auth::id())->AssigneeTask;

                 }
        } else {


         $AssignTask = User::find(Auth::id())->AssigneeTask()->where('date', '=', Carbon::today())->get();


           }


        $AssigneeTaskArray = array();
        foreach ($AssignTask as $task) {
        $AssigneeTaskArray[$task->id] = $task;
        }


        return view('assignee.task.index', compact('AssignTask', 'AssigneeTaskArray'));

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
       
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\dailyTaskUser  $dailyTaskUser
     * @return \Illuminate\Http\Response
     */
    public function show(dailyTaskUser $dailyTaskUser)
    {
      
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\dailyTaskUser  $dailyTaskUser
     * @return \Illuminate\Http\Response
     */
    public function edit(dailyTaskUser $dailyTaskUser)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\dailyTaskUser  $dailyTaskUser
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $updateTask = dailyTask::find($id);
        $updateTask->done_work = $request->done_work;
        $updateTask->pf_assignee = $request->pf_assignee;
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
     * @param  \App\Models\dailyTaskUser  $dailyTaskUser
     * @return \Illuminate\Http\Response
     */
    public function destroy(dailyTaskUser $dailyTaskUser)
    {
        //
    }


    public function UserInfo(){
      

    $users = User::all();  
    $roles = Role::all();
    $dutyTime = dailyTaskUser::all();
    

    $userInfoArray = array();
    foreach($users as $user){
        $user->duty_time= $user->DailyTaskTime()->first();
        $user->role_id= $user->getRoleId()->first();
         
        $userInfoArray[$user->id]=$user;
    }
    //  return   User::find(1)->DailyTaskTime;
   // return $users;

     return view('admin.users.index',compact('users','userInfoArray','roles','dutyTime'));
    
    
        }
    public function logout()
    {
        Auth::logout();
        return redirect()->Route('login');
    }
}

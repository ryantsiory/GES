<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Task;
use App\Models\Project;
use App\Models\Notification;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TasksController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

            $user_id = auth()->user()->id;

            $user = User::find($user_id);

            $tasks = Task::where("user_id", $user_id)->get();

            foreach ($tasks as $task){
                if ($task->completed == 100){
                    $task->update([
                        'status' => 1
                    ]);
                }
            }

        return view('mytasks.index', compact('user', 'tasks'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $users = User::all();
        $projects = Project::all();

        return view('tasks.create', compact('users', 'projects'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $request->validate([
            'user' =>  'required',
            'project' =>  'required',
            'title' => 'required|min:5',
            'description' => 'required|min:10',
        ]);

        $user_id =  $request->user;
        $project_id =  $request->project;
        $title = $request->title;
        $description =  $request->description;
        $date_start =  $request->date_start;
        $date_echeance =  $request->date_echeance;


        Task::create([
            'user_id' => $user_id,
            'project_id' => $project_id,
            'title' => $title,
            'description' => $description,
            'status' => 0,
            'completed' => 0,
            'date_start' => $date_start,
            'date_echeance' => $date_echeance,
        ]);

        session()->flash('success');

        return redirect()->route('projects.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        // $personnel = User::find($id);
        // $info = Information::where('user_id', $id);

        // return view('personnels.show', compact('personnel', 'info'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $task = Task::find($id);

        return view('tasks.edit', compact('task'));
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
        $task = Task::find($id);

        $title =  $request->title;
        $description =  $request->description;

        $task->update(['title' => $title, 'description' => $description]);

        return redirect()->route('projects.show', $task->project_id);
    }



       /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function updateTaskCompleted(Request $request, $id)
    {
        $task = Task::find($id);

        $completed =  $request->task_completed;

        $task->update(['completed' => $completed]);

        return redirect()->route('mytasks.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Task::find($id)->delete();
        return redirect()->route('projects.index');
    }


}

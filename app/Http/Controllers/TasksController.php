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

        return view('mytask.index', compact('user', 'tasks'));
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

        $user_id =  $request->nom;
        $project_id =  $request->project;
        $title = $request->title;
        $description =  $request->description;


        Task::create([
            'user_id' => $user_id,
            'project' => $project_id,
            'description' => $description,
            'title' => $title,
            'status' => 0,
            'completed' => 0,
            'date_start' => null,
            'date_end' => null,
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
    //     $personnel = Personnel::find($id);
    //     $postes = Poste::all();

    //     return view('personnels.edit', compact('personnel', 'postes'));
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
        // $personnel = Personnel::find($id);

        // $nom =  $request->nom;
        // $poste =  $request->poste;

        // $personnel->update(['nom' => $nom, 'poste_id' => $poste]);

        // return redirect()->route('personnels.index');
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

        return redirect()->route('mytask.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        // Personnel::find($id)->delete();
        // return redirect()->route('personnels.index');
    }



    //create notif
    public function createNotification(Request $request)
    {

            // createNotification(Request $request)
                $user_executor_id = Auth::guard('api')->user()->id;
                $user_executor_id=User::where(['id'=> $user_executor_id])->with('info')->get();
                $users_owner_id = [];

                if (!empty($users)) {
                    foreach ($users_owner_id as $users_owner){
                        $dataNotif = [
                            'subject' => "Une tâche vous a été assignée",
                            'text' => "Une nouvelle tâche vous a été assignée par "+$user_executor_id->email,
                            'user_id' => $users_owner_id,
                            'seen' => 0,
                            'object' => null,
                            'created_at' => now(),
                            'updated_at'=> now()->addMinutes(30),
                            'deleted_at' => now()->addDay(30),
                        ];
                        $notification = Notification::create($dataNotif);
                    }
                }


    }
}

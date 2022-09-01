<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Task;
use App\Models\Poste;
use App\Models\Project;
use App\Models\Client;
use Illuminate\Http\Request;

class ProjectsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

            $projects = Project::orderBy('id')->paginate(4);

        return view('projects.index', compact('projects'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $postes = Poste::all();

        return view('personnels.create', compact('postes'));
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
            'title' =>  'required',
            'description' =>  'required',
            'client' =>'required',

        ]);

        $title =  $request->title;
        $description =  $request->description;
        $client_id =  $request->client;


        User::create([
            'title' => $title,
            'description' => $description,
            'client_id' => $client_id,
        ]);

        session()->flash('success');

        return redirect()->route('personnels.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $project = Project::find($id);

        $users =  User::all();;

        $tasks= Task::where("project_id",$id)->get();
        $count =Task::where("project_id",$id)->count();
        $completed_number=0;
        foreach ($tasks as $task){
            $completed_number= $completed_number+$task->completed ;
        }
        $completed_number = round($completed_number/$count);



        return view('projects.show', compact('project', 'users', 'completed_number', 'tasks'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $project = Project::find($id);

        $clients = Client::all();


        return view('projects.edit', compact('project', 'clients'));
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
        $project = Project::find($id);

        $title =  $request->title;
        $description =  $request->description;
        $client_id =  $request->client;

        $project->update([
            'title' => $title,
            'description' => $description,
            'client_id' => $client_id
        ]);

        return redirect()->route('projects.index');
    }



       /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function updateTaskAssignTo(Request $request, $id)
    {
        $task = Task::find($id);

        $user_id =  $request->assign_to;

        $task->update(['user_id' => $user_id]);

        $project_id= $task->project_id;

        $this->createNotification(
            "Tâche",
            "Une nouvelle tâche vous a été assignée par ".auth()->user()->email,
            $id,
            $user_id
);

        return redirect('projects/'.$project_id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Project::find($id)->delete();
        return redirect()->route('projects.index');
    }
}

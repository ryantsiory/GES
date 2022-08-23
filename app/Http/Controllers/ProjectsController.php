<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Task;
use App\Models\Poste;
use App\Models\User;
use App\Models\Project;
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
            'nom' =>  'required',
            'poste' =>  'required'
             //['required', 'email']
        ]);

        $nom =  $request->nom;
        $poste =  $request->poste;


        Personnel::create([
            'nom' => $nom,
            'poste_id' => $poste,
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


        return view('projects.show', compact('project', 'users'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    // public function edit($id)
    // {
    //     $personnel = Personnel::find($id);
    //     $postes = Poste::all();

    //     return view('personnels.edit', compact('personnel', 'postes'));
    // }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    // public function update(Request $request, $id)
    // {
    //     $personnel = Personnel::find($id);

    //     $nom =  $request->nom;
    //     $poste =  $request->poste;

    //     $personnel->update(['nom' => $nom, 'poste_id' => $poste]);

    //     return redirect()->route('personnels.index');
    // }



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

        return redirect('projects/'.$project_id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    // public function destroy($id)
    // {
    //     Personnel::find($id)->delete();
    //     return redirect()->route('personnels.index');
    // }
}

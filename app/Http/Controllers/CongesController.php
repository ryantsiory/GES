<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Conge;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CongesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $conges = Conge::orderBy('id')->paginate(4);

        return view('conges.index', compact('conges'));
    }


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function toValide()
    {



        $conges = Conge::where('status',0)->orderBy('id')->paginate(4);
        $createNotif = new Controller;

        $createNotif->createNotification();

        return view('conges.validate', compact('conges'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $users = User::all();

        return view('conges.create', compact('users'));
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
            'nom' =>  'required|min:5',
            'motif' =>  'required|min:5',
            'user' =>  'required',
            'depart_date' =>  'required|date|after:now',
            'retour_date' =>  'required|date|after:depart_date'
        ]);

        $nom =  $request->nom;
        $motif =  $request->motif;
        $user_id =  $request->user;
        $depart_date =  $request->depart_date;
        $retour_date =  $request->retour_date;


        Conge::create([
            'nom' => $nom,
            'motif' => $motif,
            'user_id' => $user_id,
            'status' => 0,
            'depart_date' => $depart_date,
            'retour_date' => $retour_date,
        ]);

        session()->flash('success');

        return redirect()->route('conges.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $conge = Conge::find($id);

        $user_id = $conge->user_id;

        $user = User::find($user_id);

        return view('conges.show', compact('conge', 'user'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $conge = Conge::find($id);

        return view('conges.edit', compact('conge'));
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
        $conge = Conge::find($id);

        $nom =  $request->nom;
        $motif =  $request->motif;
        $depart_date =  $request->depart_date;
        $retour_date =  $request->retour_date;

        $conge->update([
            'nom' => $nom,
            'motif' => $motif,
            'depart_date' => $depart_date,
            'retour_date' => $retour_date,
        ]);

        return redirect()->route('conges.index');
    }





    /**
     * Update the specified resource in storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function toAccept(Request $request, $id)
    {
        $conge = Conge::find($id);

        $conge->update(['status' => 1, 'answered_at' =>now()]);

        return redirect()->route('conges.index');
    }


    /**
     * Update the specified resource in storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function toReject(Request $request, $id)
    {
        $conge = Conge::find($id);

        $conge->update(['status' => -1, 'answered_at' =>now()]);

        return redirect()->route('conges.index');
    }









    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Conge::find($id)->delete();
        return redirect()->route('conges.index');
    }







}

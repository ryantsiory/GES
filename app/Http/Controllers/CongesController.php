<?php

namespace App\Http\Controllers;

use App\Models\Personnel;
use App\Models\Conge;
use Illuminate\Http\Request;

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
        $conges = Conge::where('status', 0)->orderBy('id')->paginate(4);

        return view('conges.validate', compact('conges'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $personnels = Personnel::all();

        return view('conges.create', compact('personnels'));
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
            'personnel' =>  'required',
            'depart_date' =>  'required|date|after:now',
            'retour_date' =>  'required|date|after:depart_date'
        ]);

        $nom =  $request->nom;
        $motif =  $request->motif;
        $personnel_id =  $request->personnel;
        $depart_date =  $request->depart_date;
        $retour_date =  $request->retour_date;


        Conge::create([
            'nom' => $nom,
            'motif' => $motif,
            'personnel_id' => $personnel_id,
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
        // $conge = Conge::find($id);

        // $personnel_id = $conge->personnel_id;

        // $personnel = Personnel::find($personnel_id);

        // return view('conges.show', compact('conge', 'personnel'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $personnel = Conge::find($id);
        $postes = Conge::all();

        return view('personnels.edit', compact('personnel', 'postes'));
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
        $personnel = Conge::find($id);

        $nom =  $request->nom;
        $poste =  $request->poste;

        $personnel->update(['nom' => $nom, 'poste_id' => $poste]);

        return redirect()->route('personnels.index');
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
        return redirect()->route('personnels.index');
    }
}

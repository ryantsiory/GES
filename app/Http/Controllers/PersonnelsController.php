<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Poste;
use App\Models\Information;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class PersonnelsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $personnels = User::orderBy('id')->paginate(4);

        return view('personnels.index', compact('personnels'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $postes = Poste::all();

        $personnels = User::all();

        return view('personnels.create', compact('personnels','postes'));
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
            'name' => ['required', 'string', 'max:255'],
            'lastname' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
            'poste' => ['required'],
            'avatar' => ['sometimes', 'image', 'mimes:jpeg,png,jpg,gif,svg', 'max:2048'],
        ]);


        User::create([
            'name' => $request->name,
            'lastname' => $request->lastname,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'poste_id' => $request->poste,
            'avatar' => 'default-avatar-profile.png'
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
        $personnel = User::find($id);
        $info = Information::where('user_id', $id);

        return view('personnels.show', compact('personnel', 'info'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $personnel = User::find($id);
        $postes = Poste::all();

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
        $personnel = User::find($id);

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
        User::find($id)->delete();
        return redirect()->route('personnels.index');
    }
}

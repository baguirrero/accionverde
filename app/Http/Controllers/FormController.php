<?php

namespace App\Http\Controllers;

use App\Models\BirthPlace;
use App\Models\Employment;
use App\Models\HomePlace;
use App\Models\Identity;
use App\Models\Instruction;
use App\Models\MaritalStatus;
use App\Models\Person;
use App\Models\Profession;
use App\Models\Son;
use Carbon\Carbon;
use Illuminate\Http\Request;

class FormController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('person.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $fechaactual = Carbon::now('America/Lima')->format('Y-m-d');
        $birthplaces = BirthPlace::pluck('name', 'id');
        $employments = Employment::pluck('name', 'id');
        $homeplaces = HomePlace::pluck('name', 'id');
        $identities = Identity::pluck('name', 'id');
        $instructions = Instruction::pluck('name', 'id');
        $maritalstatus = MaritalStatus::pluck('name', 'id');
        $profesions = Profession::pluck('name', 'id');
        $sons = Son::pluck('name', 'id');

        return view('person.create', compact('birthplaces', 'employments', 'homeplaces', 'identities','instructions', 'maritalstatus', 'profesions', 'sons', 'fechaactual'));
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
            'names' => 'required',
            'dni' => 'required',
            'ape_pater' => 'required',
            'ape_mater' => 'required',
            'identity_id' => 'required',
            'fecha_naci' => 'required',
            'maritalstatus_id' => 'required',
            'birthplace_id' => 'required',
            'homeplace_id' => 'required',
            'nacionalidad' => 'required',
            'email' => 'required|email',
            'phone' => 'required',
            'profession_id' => 'required',
            'instruction_id' => 'required',
            'employment_id' => 'required',
            'son_id' => 'required'
        ]);

        $person = Person::create($request->all());

        return redirect()->route('register.create')->with('add', 'ok');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
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
        //
    }
}

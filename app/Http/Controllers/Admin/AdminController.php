<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\BirthPlace;
use App\Models\Employment;
use App\Models\HomePlace;
use App\Models\Identity;
use App\Models\Instruction;
use App\Models\MaritalStatus;
use App\Models\Person;
use App\Models\Profession;
use App\Models\Son;
use App\Models\User;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.index');
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
        //
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
    public function edit(Person $person)
    {
        // $this->authorize('dicatated', $person);

        $birthplaces = BirthPlace::pluck('name', 'id');
        $employments = Employment::pluck('name', 'id');
        $homeplaces = HomePlace::pluck('name', 'id');
        $identities = Identity::pluck('name', 'id');
        $instructions = Instruction::pluck('name', 'id');
        $maritalstatus = MaritalStatus::pluck('name', 'id');
        $profesions = Profession::pluck('name', 'id');
        $sons = Son::pluck('name', 'id');

        return view('admin.edit', compact('birthplaces', 'employments', 'homeplaces', 'identities','instructions', 'maritalstatus', 'profesions', 'sons', 'person'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Person $person)
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
            'email' => 'required',
            'phone' => 'required',
            'profession_id' => 'required',
            'instruction_id' => 'required',
            'employment_id' => 'required',
            'son_id' => 'required'
        ]);

        $person->update($request->all());

        return redirect()->route('persons.edit', $person)->with('update', 'ok');
    }

    public function lawyer(Person $person){

        $birthplaces = BirthPlace::pluck('name', 'id');
        $employments = Employment::pluck('name', 'id');
        $homeplaces = HomePlace::pluck('name', 'id');
        $identities = Identity::pluck('name', 'id');
        $instructions = Instruction::pluck('name', 'id');
        $maritalstatus = MaritalStatus::pluck('name', 'id');
        $profesions = Profession::pluck('name', 'id');
        // $users = User::pluck('name', 'id');
        $users = User::whereHas("roles", function($q){ $q->where("name", "Abogado"); })->pluck('name', 'id');
        $sons = Son::pluck('name', 'id');
        

        return view('admin.assing', compact('users','birthplaces', 'employments', 'homeplaces', 'identities','instructions', 'maritalstatus', 'profesions', 'sons', 'person'));
    }

    public function assing(Request $request, Person $person){

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
            'email' => 'required',
            'phone' => 'required',
            'profession_id' => 'required',
            'instruction_id' => 'required',
            'employment_id' => 'required',
            'son_id' => 'required'
        ]);

        $person->update($request->all());

        // $user = User::pluck('id');

        // if ($request->user_id == $user) {

        //     return redirect()->route('persons.index');
        // }

        $person->status = 2;
        $person->save();

        return redirect()->route('persons.edit', $person)->with('asing', 'ok');
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

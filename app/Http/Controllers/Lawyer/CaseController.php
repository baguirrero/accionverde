<?php

namespace App\Http\Controllers\Lawyer;

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
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Mail\ProgresCase;
use App\Mail\CloseCase;
use App\Mail\EncuestMail;
use Carbon\Carbon;

class CaseController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('lawyer.index');
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
    public function show(Person $person)
    {
       
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Person $case)
    {
        $birthplaces = BirthPlace::pluck('name', 'id');
        $employments = Employment::pluck('name', 'id');
        $homeplaces = HomePlace::pluck('name', 'id');
        $identities = Identity::pluck('name', 'id');
        $instructions = Instruction::pluck('name', 'id');
        $maritalstatus = MaritalStatus::pluck('name', 'id');
        $profesions = Profession::pluck('name', 'id');
        $sons = Son::pluck('name', 'id');

        return view('lawyer.edit', compact('birthplaces', 'employments', 'homeplaces', 'identities','instructions', 'maritalstatus', 'profesions', 'sons', 'case'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Person $case)
    {
        // $request->validate([
        //     'names' => 'required',
        //     'dni' => 'required|unique:people,dni,' . $person->id,
        //     'ape_pater' => 'required',
        //     'ape_mater' => 'required',
        //     'identity_id' => 'required',
        //     'social_name' => 'required',
        //     'fecha_naci' => 'required',
        //     'maritalstatus_id' => 'required',
        //     'birthplace_id' => 'required',
        //     'homeplace_id' => 'required',
        //     'nacionalidad' => 'required',
        //     'email' => 'required',
        //     'phone' => 'required',
        //     'profession_id' => 'required',
        //     'instruction_id' => 'required',
        //     'employment_id' => 'required',
        //     'son_id' => 'required'
        // ]);

        // $person->update($request->all());

    }

    public function status(Person $case){
        $fecha_atend = Carbon::now('America/Lima')->format('Y-m-d');
        $hora_actual = Carbon::now('America/Lima')->format('H:i:s');
        $case->status = 3;
        $case->time_progres=  $hora_actual;
        $case->date_atend = $fecha_atend;
        $case->save();

         $mail = new ProgresCase($case);

        Mail::to('admin@accionporigualdad.com')->send($mail);

        return redirect()->route('cases.edit', $case)->with('proces', 'ok');
    }

    public function close(Person $case){
        $fecha_close = Carbon::now('America/Lima')->format('Y-m-d');
        $hora_final = Carbon::now('America/Lima')->format('H:i:s');
        $case->status = 4;
        $case->time_close = $hora_final;
        $case->date_close = $fecha_close;
        $case->save();

        $mail = new CloseCase($case);
        $mailEncuest = new EncuestMail($case);

        Mail::to('admin@accionporigualdad.com')->send($mail);

        Mail::to($case->email)->send($mailEncuest);

        return redirect()->route('cases.edit', $case)->with('close', 'ok');
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

<?php

namespace App\Http\Controllers\Admin;

use App\Exports\CasoEducacion;
use App\Exports\CasoEmpleabi;
use App\Exports\CasoMes;
use App\Exports\CasoResidencia;
use App\Exports\CasoSemana;
use App\Http\Controllers\Controller;
use App\Models\Employment;
use App\Models\HomePlace;
use App\Models\Instruction;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use PDF;
use Illuminate\Support\Facades\App;
use App\Models\Person;

class ReportController extends Controller
{
    //
    public function index(){

        $empleo = Employment::pluck('name', 'id');
        $home = HomePlace::pluck('name', 'id');
        $instruc = Instruction::pluck('name', 'id');

        return view('admin.reports.index', compact('empleo', 'home', 'instruc'));
    }

    public function age(){
        return view('admin.reports.age');
    }

    public function timeconsult(){
        return view('admin.reports.t-consult');
    }

    public function mes(Request $request){

        // $rmes = DB::select('CALL obtenerCasosIngresadosxMes(?)', array($request->id_mes));

        // $rmeses = DB::select('CALL datosCasosPorMes(?)', array($request->id_mes));

        // $pdf = PDF::loadView('pdf.mes', compact('rmes', 'rmeses', 'request'));

        // return $pdf->stream();
        return (new CasoMes($request->id_mes))->download();
    }

    public function semana(Request $request){
        
        // $rsemana = DB::select('CALL obtenerCasosPorSemana(?,?)', array($request->fech_1,$request->fech_2));

        // $rsemanas = DB::select('CALL datosCasosPorSemana(?,?)', array($request->fech_1,$request->fech_2));

        // $pdf = PDF::loadView('pdf.semana', compact('rsemana', 'rsemanas', 'request'));

        // return $pdf->stream();

        return (new CasoSemana($request->fech_1, $request->fech_2))->download();
    }

    public function niveled(Request $request){
        // $rniveles = DB::select('CALL obtenerPorNivelEducativo(?)', array($request->id_insttruct));

        // view()->share('pdf.educacion',$rniveles);

        // $pdf = PDF::loadView('pdf.educacion', ['rniveles' => $rniveles]);

        // return $pdf->stream();
        return (new CasoEducacion($request->id_insttruct))->download();

    }

    public function residencia(Request $request){

        // $residencia = DB::select('CALL obtenerPorLugaresResidencia(?)', array($request->id_home));

        // view()->share('pdf.residencia',$residencia);

        // $pdf = PDF::loadView('pdf.residencia', ['residencia' => $residencia]);

        // return $pdf->stream();
        return (new CasoResidencia($request->id_home))->download();

    }

    public function empleab(Request $request){

        // $empleos = DB::select('CALL obtenerPorEmpleabilidad(?)', array($request->id_emp));
        
        // view()->share('pdf.empleabi',$empleos);

        // $pdf = PDF::loadView('pdf.empleabi', ['empleos' => $empleos]);

        // return $pdf->stream();
        return (new CasoEmpleabi($request->id_emp))->download();

    }

    public function años(Request $request){

        $cases_edad= DB::select('call obtenerEdadesCasos');

        view()->share('pdf.edad',$cases_edad);

        $pdf = PDF::loadView('pdf.edad', ['cases_edad' => $cases_edad]);

        return $pdf->stream();
    }

    public function tiempo(Request $request){

        $cases_tiempo = DB::select('call obtenerTiempoAtencionConsulta');

        view()->share('pdf.tiempo',$cases_tiempo);

        $pdf = PDF::loadView('pdf.tiempo', ['cases_tiempo' => $cases_tiempo]);

        return $pdf->stream();
    }
    
    public function all(){
        
        $persons = Person::all();

        view()->share('pdf.registro',$persons);

        $pdf = PDF::loadView('pdf.registro', ['persons' => $persons]);

        return $pdf->setPaper('a4', 'landscape')->stream('pdf.registro');
    }
}

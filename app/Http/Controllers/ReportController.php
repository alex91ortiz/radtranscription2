<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use App\Result;
use App\Typeexam;
use DB;
use PDF;
use Maatwebsite\Excel\Facades\Excel;
class ReportController extends Controller {


	/**
	 * Create a new controller instance.
	 *
	 * @return void
	 */
	public function __construct()
	{
		$this->middleware('auth');
	}

	public function meses(){
		return  $meses = array( 
					array('id' => "01",'mes'=>'Enero' ),
					array('id' => "02",'mes'=>'Febrero' ),
					array('id' => "03",'mes'=>'Marzo' ),
					array('id' => "04",'mes'=>'Abril' ),
					array('id' => "05",'mes'=>'Mayo' ),
					array('id' => "06",'mes'=>'Junio' ),
					array('id' => "07",'mes'=>'Julio' ),
					array('id' => "08",'mes'=>'Agosto' ),
					array('id' => "09",'mes'=>'Septiembre' ),
					array('id' => "10",'mes'=>'Octubre' ),
					array('id' => "11",'mes'=>'Noviembre' ),
					array('id' => "12",'mes'=>'Diciembre' )
				);
	}
	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		//
		return view('report.index',["typeexam"=>Typeexam::all()]);
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		//
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store(Request $request)
	{
		//
		
		$date = $request->input("fecha");
		$fecini = $request->input("fecini");
		$type = $request->input("type");
		$typeexam_id1 = $request->input("typeexam_id1");
		$typeexam_id2 = $request->input("typeexam_id2");
		
		
		if($type=="1"){
			$rresult = $this->reportMonth($date,$fecini,$typeexam_id1);
			return view("report.mes",["result"=>$rresult,"fecfin"=>$date,"fecini"=>$fecini]);
		}else{
			$rresult = $this->reportDay($date,$typeexam_id2);
			return view("report.dias",["result"=>$rresult,"fecini"=>$date]);
		}

	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show(Request $request,$id)
	{
		//
		$date = $request->input("fecha");
		$fecini = $request->input("fecini");
		$type = $request->input("type");
		$format = $request->input("format"); 
		$typeexam_id1 = $request->input("typeexam_id1");
		$typeexam_id2 = $request->input("typeexam_id2");

		if($type=="1"){
			$rresult = $this->reportMonth($date,$fecini,$typeexam_id1);
			
			if($format=="PDF"){
				$pdf = PDF::loadView('report.repmes', ["result"=>$rresult,"fecini"=>$fecini,"fecfin"=>$date]);
				$pdf->save(base_path().'/public/tempexportm.pdf')->stream('reporte_mes.pdf');
				return url('/tempexportm.pdf');
			}

			if($format=="EXCEL"){
				Excel::create("reporte_mes_".date("y-m-d"),function($excel) use ($rresult){
					$excel->sheet("mes",function($sheet) use ($rresult){
						$sheet->fromArray($rresult["source"]);
					});
				})->store('xlsx',base_path().'/public/');
				return url("reporte_mes_".date("y-m-d").".xlsx");
			}

			
		}else{
			$rresult = $this->reportDay($fecini,$typeexam_id2);


			if($format=="EXCEL"){
				Excel::create("reporte_dia_".date("y-m-d"),function($excel) use ($rresult){
					$excel->sheet("mes",function($sheet) use ($rresult){
						$sheet->fromArray($rresult["source"] );
					});
				})->store('xlsx',base_path().'/public/');
				return url("reporte_dia_".date("y-m-d").".xlsx");
			}
			if($format=="PDF"){
				$pdf = PDF::loadView('report.repdias', ["result"=>$rresult,"fecini"=>$fecini]);
				$pdf->save(base_path().'/public/tempexportd.pdf')->stream('reporte_dia.pdf');
				return url('/tempexportd.pdf');
			}
		}
		return null;
	}

	/**
	 * Show the form for editing the specified resource.
	 *	
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		//

	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		//
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		//
	}

	public function reportDay($date,$typeexam_id){
		$result = Result::select(
						'updates',
						'dni',
						DB::raw('firstname as lastname'),
						DB::raw('lastname as firstname'),
						'value',
						'comparative',
						'exam',
						'entitie_id'
					)
					->join("formalities","formalities.id","=","results.formalitie_id")
					->where('results.typeexam_id',$typeexam_id)
					->where("updates","=",$date)->get();
		$rresult= array();
		$total=0;
		$quantity=0;
		$rresult["source"]=array();

		foreach ($result as $value) {
			$qty=(($value->comparative)?2:1);
			$total+=$value->value;
			$quantity+=$qty;
		}
		$rresult['source']=$result;
		$rresult['total']=$total;
		$rresult['quantity']=$quantity;
		//dd($rresult);
		return $rresult;
	}


	public function reportMonth($date,$fecini,$typeexam_id){
		$result = Result::join("formalities","formalities.id","=","results.formalitie_id")
					->where('results.typeexam_id',$typeexam_id)
					->whereBetween("updates",[$fecini,$date])->get();
		$rresult= array();
		$total=0;
		$quantity=0;
		$rresult["source"]=array();
		foreach ($result as $value) {
			if($value->updates!=""){
				$rresult["source"][$value->updates]["date"]=$value->formalitie->updates;

				$qty=(($value->comparative)?2:1);


				if(!isset($rresult["source"][$value->updates]["quantity"])){
					$rresult["source"][$value->updates]["quantity"]=$qty;
				}else{
					$rresult["source"][$value->updates]["quantity"]+=$qty;	
				}
				if(!isset($rresult["source"][$value->updates]["value"])){
					$rresult["source"][$value->updates]["value"]=$value->value;
				}else{
					$rresult["source"][$value->updates]["value"]+=$value->value;
				}
				$total+=$value->value;
				$quantity++;
			}
		}
		$rresult['total']=$total;
		$rresult['quantity']=$quantity;
		
		return $rresult;
	}


}
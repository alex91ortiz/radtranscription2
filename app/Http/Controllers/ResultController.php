<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use App\Result;
use App\Exam;
use App\Specialist;
use App\Entitie;
use App\Typeexam;
use App\Formalities;
use Auth;
use PDF;
use DB;
use Storage;

class ResultController extends Controller {
	/**
	 * Create a new controller instance.
	 *
	 * @return void
	 */
	public function __construct()
	{
		$this->middleware('auth');
	}
	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index(Request $request)
	{
		//
		$formalitie_id = $request->input("formalitie_id");
		//$results = Result::all();
		
		return view('results.index',["formalitie_id"=>$formalitie_id]);
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create(Request $request)
	{
		//
		$formalitie_id = $request->input("formalitie_id");
		$results = new Result();
		$exams = Exam::all();
		$results->formalitie_id = $formalitie_id;
		$specialist = Specialist::all();
		$entitie = Entitie::all();
		if(Auth::user()->clients!="")
			$typeexam = Typeexam::where("entitie_id",Auth::user()->clients)->get();
		else
			$typeexam = Typeexam::all();
		$formalitie = Formalities::find($formalitie_id);
		return view('results.save',["results"=>$results,"exams"=>$exams,
				"specialist"=>$specialist,"entitie"=>$entitie,"typeexam"=>$typeexam,'formalitie'=>$formalitie,'action'=>'create']);
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store(Request $request)
	{
		//
		$value =0;
		$comparative =false;
		
		
		$results = new Result();
		$results->code="A";
		$results->date=date("Y-m-d");
		$results->diagnostic=$request->input("diagnostic");
		$results->findings=$request->input("findings");
		$results->oneoption=$request->input("oneoption");
		$results->secondoption=$request->input("secondoption");
		$results->user_id=Auth::user()->id;
		$results->exam=$request->input("exam");
		$results->companie_id=Auth::user()->companie_id;
		$results->specialist_id=$request->input("specialist_id");
		$results->formalitie_id=intval($request->input("formalitie_id"));
		$results->entitie_id=intval($request->input("entitie_id"));
		$results->typeexam_id=intval($request->input("typeexam_id"));
		$typeexam=Typeexam::find(intval($request->input("typeexam_id")));
		if($request->input("comparative")=="true"){
			$value = intval($typeexam->value) * 2;
			$comparative =true;
		}else{
			$value = $typeexam->value;
		}
		$results->value=$value;
		$results->comparative=$comparative;
		$results->save();
		
		//$formalitie = Formalitie::find($request->input("formalitie_id"));
		/*$results->findings = str_replace('<p>', '<p ALIGN="justify">', $results->findings);
    	$results->oneoption = str_replace('<p>', '<p ALIGN="justify">', $results->oneoption);
    	$results->secondoption = str_replace('<p>', '<p ALIGN="justify">', $results->secondoption);
    	$data = array("results"=>$results);
    	$pdf = PDF::loadView('results.certificate', $data);*/
		//$path ='C://PDF/'.$results->formalitie->update.'/';
		//$path ='/home/administrador/comp_'.Auth::user()->companie_id.'/'.$results->formalitie->updates.'/';
		/*$public_path = public_path();
 		$url = $public_path.'/storage/comp_'.Auth::user()->companie_id.'/'.$results->formalitie->updates.'/';
 		var_dump($url);die();
    	$path =$url;
    	if(!is_dir($path)){
    		//mkdir($path);
    		\File::makeDirectory($path, 0777);
    	}*/
    	//$pdf->save($path.$results->formalitie->dni.'_'.$results->formalitie->firstname."_".$results->formalitie->lastname."_".$results->exam.'.pdf')->stream('download.pdf');
    	/*Storage::disk('local')->put($results->formalitie->dni.'_'.$results->formalitie->firstname."_".$results->formalitie->lastname."_".$results->exam.'.pdf',$pdf->output());

		$public_path = public_path();
		$url = $public_path.'/storage/'.$results->formalitie->dni.'_'.$results->formalitie->firstname."_".$results->formalitie->lastname."_".$results->exam.'.pdf';*/

		//$formalities = Formalities::all();
		return response()->json(["data"=>$results->id]);
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		//
		$results = Result::find($id);
		return view('results.show',["results"=>$results]);
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
		$results = Result::find($id);
		$exams = exam::all();
		$specialist = Specialist::all();
		$entitie = Entitie::all();
		if(Auth::user()->clients!="")
			$typeexam = Typeexam::where("entitie_id",Auth::user()->clients)->get();
		else
			$typeexam = Typeexam::all();
		$formalitie = Formalities::find($results->formalitie_id);
		return view('results.save',["results"=>$results,"exams"=>$exams,"specialist"=>$specialist,'formalitie'=>$formalitie,"entitie"=>$entitie,"typeexam"=>$typeexam,'action'=>'update']);
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update(Request $request,$id)
	{
		$value =0;
		$comparative =false;
		//
		$results = Result::find($id);

		$results->diagnostic=$request->input("diagnostic");
		$results->findings=$request->input("findings");
		$results->oneoption=$request->input("oneoption");
		$results->secondoption=$request->input("secondoption");
		$results->user_id=Auth::user()->id;
		$results->exam=$request->input("exam");
		$results->specialist_id=$request->input("specialist_id");
		$results->entitie_id=intval($request->input("entitie_id"));
		$results->typeexam_id=intval($request->input("typeexam_id"));
		$typeexam=Typeexam::find(intval($request->input("typeexam_id")));
		if($request->input("comparative")){
			$value = intval($typeexam->value) * 2;
			$comparative =true;
		}else{
			$value = $typeexam->value;
		}
		$results->value=$value;
		$results->comparative=$comparative;
		$results->save();
		$results = Result::where("companie_id",Auth::user()->companie_id)
		->where(DB::raw("DATE_FORMAT(date,'%Y')"),date("Y"))
		->get();
		return view('results.list',["results"=>$results]);
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
		$results = Result::find($id);
		$results->delete();
		$results = Result::where("companie_id",Auth::user()->companie_id)
		->where(DB::raw("DATE_FORMAT(date,'%Y')"),date("Y"))
		->get();
		return view('results.list',["results"=>$results]);
	}

    public function certificate($id){

    	$results = Result::find($id);

    	$results->findings = str_replace('<p>', '<p ALIGN="justify">', $results->findings);
    	$results->oneoption = str_replace('<p>', '<p ALIGN="justify">', $results->oneoption);
    	$results->secondoption = str_replace('<p>', '<p ALIGN="justify">', $results->secondoption);
    	$data = array("results"=>$results);
    	
    	$pdf = PDF::loadView('results.certificate', $data);
    	return $pdf->download($results->formalitie->dni.'_'.$results->formalitie->firstname."_".$results->formalitie->lastname."_".$results->exam.'.pdf');
		//return $pdf->download($results->formalitie->dni.'_'.date("Y-m-d").'.pdf');
    	//return view('results.certificate',["results"=>$results]);
    }

	public function toJson(){
		$results = null;
		if(Auth::user()->role==3){
			$results = Result::where("entitie_id",Auth::user()->clients)
			->whereYear('date',"=",date("Y"))
			->whereMonth('date','>=',(date("m")-1))
			->orderBy("date","DESC")
			->get();
		}else{
			$results = Result::where("companie_id",Auth::user()->companie_id)
			->whereYear('date',"=",date("Y"))
			->whereMonth('date','>=',(date("m")-1))
			->orderBy("date","DESC")
			->get();
			
		}
		
		$resultsArray = array();
		foreach ($results as $key => $value) {
		    
			$resultsArray[$key][]=$value->id;
			$resultsArray[$key][]=$value->date;
			$formalitie = Formalities::find($value->formalitie_id);
			$resultsArray[$key][]=($formalitie) ? $formalitie->dni : "";
			$resultsArray[$key][]=($formalitie) ? $formalitie->firstname : "";
			$resultsArray[$key][]=($formalitie) ? $formalitie->lastname : "";
			$resultsArray[$key][]=$value->exam;
			$resultsArray[$key][]=Auth::user()->role;
			
		}
    	return response()->json(["data"=>$resultsArray]);
    }

 
}
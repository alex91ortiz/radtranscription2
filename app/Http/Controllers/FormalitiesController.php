<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use App\Formalities;
use App\Result;
use App\Exam;
use App\Specialist;
use App\Entitie;
use App\Typeexam;
use App\Imports\FormalitiesImport;
use PDF;
use Auth;
use Storage;
use Maatwebsite\Excel\Facades\Excel;
class FormalitiesController  extends Controller {
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
	public function index()
	{
		//
		$formalities = Formalities::where('terminated_at',false)->orderBy("updates","ASC")->orderBy("time","ASC")->get();
		return view('formalities.index',["formalities"=>$formalities]);
		
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		//
		$formalities = new Formalities();
		$results = new Result();
		$exams = Exam::all();
		$specialist = Specialist::all();
		$entitie = Entitie::all();
		$typeexam = Typeexam::all();
		return view('formalities.save',["formalities"=>$formalities,"results"=>$results,"exams"=>$exams,
				"specialist"=>$specialist,"entitie"=>$entitie,"typeexam"=>$typeexam,'action'=>'create']);
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store(Request $request)
	{
		//

		$formalitie_id=0;
		$formalities = new Formalities();
		$formalities->firstname= $request->input("firstname");
		$formalities->lastname= $request->input("lastname");
		$formalities->dni= $request->input("dni");
		$formalities->gender= $request->input("gender");
		//$formalities->date= );
		$formalities->companie_id=Auth::user()->companie_id;
		$formalities->updates =$request->input("date");
		$formalities->time =date("H:i:s");
		$formalities->save();
		$url="";
		if($formalities->save()){
			$exam = $request->input("exam");

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
			$results->exam=$exam;
			$results->companie_id=Auth::user()->companie_id;
			$results->specialist_id=$request->input("specialist_id");
			$results->formalitie_id=$formalities->id;
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

			$results->findings = str_replace('<p>', '<p ALIGN="justify">', $results->findings);
	    	$results->oneoption = str_replace('<p>', '<p ALIGN="justify">', $results->oneoption);
	    	$results->secondoption = str_replace('<p>', '<p ALIGN="justify">', $results->secondoption);
			$formalitie_id=$results->id;
	    	$data = array("results"=>$results);
	    	$pdf = PDF::loadView('results.certificate', $data);

	    	//$path ='C://PDF/'.$formalities->update.'/';
	    	/*$public_path = public_path();
     		$url = $public_path.'/storage/comp_'.Auth::user()->companie_id.'/'.$formalities->updates.'/';
	    	$path =$url;

	    	if(!is_dir($path)){
	    		//mkdir($path);
	    		\File::makeDirectory($path, 0777);
	    	}*/
	    	//$pdf->save($path.$formalities->dni.'_'.$formalities->firstname."_".$formalities->lastname."_".$results->exam.'.pdf')->stream('download.pdf');
	    	//$pdf->save($path.$formalities->dni.'_'.$formalities->firstname."_".$formalities->lastname."_".$results->exam.'.pdf')->stream('download.pdf');

		    /*Storage::disk('local')->put($formalities->dni.'_'.$formalities->firstname."_".$formalities->lastname."_".$exam.'.pdf',$pdf->output());

			$public_path = public_path();
			$url = 'storage/'.$formalities->dni.'_'.$formalities->firstname."_".$formalities->lastname."_".$exam.'.pdf';*/

		}

		$formalities = Formalities::where('terminated_at',false)->orderBy("updates","ASC")->orderBy("time","ASC")->get();
		$views = view('formalities.list',["formalities"=>$formalities])->render();
		return response()->json(["view"=>$views,"data"=>$formalitie_id]);
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
		$formalities = Formalities::find($id);
		return view('formalities.show',["formalities"=>$formalities]);
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
		$formalities = Formalities::find($id);
		
		return view('formalities.save',["formalities"=>$formalities,'action'=>'update']);
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update(Request $request,$id)
	{
		//
		$formalities = Formalities::find($id);
		$formalities->firstname= $request->input("firstname");
		$formalities->lastname= $request->input("lastname");
		$formalities->dni= $request->input("dni");
		$formalities->gender= $request->input("gender");
		$formalities->date= $request->input("date");
		$formalities->companie_id=Auth::user()->companie_id;
		$formalities->save();
		$formalities = Formalities::where('terminated_at',false)->orderBy("updates","ASC")->get();
		return view('formalities.list',["formalities"=>$formalities]);
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
		$formalities = Formalities::find($id);
		$formalities->delete();
		$formalities = Formalities::where('terminated_at',false)->orderBy("updates","ASC")->get();
		return view('formalities.list',["formalities"=>$formalities]);
	}
   	/**
	 * Show the form for uploa file.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function importshow()
	{
		//
		$entitie = Entitie::all();
		return view('formalities.upload', ["entitie"=>$entitie]);
	}
	/**
	 * uploa file from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
   	public function import(Request $request)
    {
		//var_dump($request->file('file'));die()
		if ($request->file('file')){

			$formalities = Formalities::join('results','results.formalitie_id','=','formalities.id')
									->where('terminated_at',false)->get();
			foreach ($formalities as $key => $value) {
				//$value->update(['terminated'=>true]);
				$formalitiesu = Formalities::find($value->formalitie_id);
				$formalitiesu->terminated_at=true;
				$formalitiesu->save();
			}

			$filename =  'tempimport.xlsx';

			$request->file('file')->move(base_path() . '/public/', $filename);
			
			$array =Excel::toArray(new FormalitiesImport, base_path().'/public/'.$filename);			
			$entitie = Entitie::find($request->input('entitie_id'));
			$fields = $entitie->fields;

			foreach ($array[0] as $key => $book) {
				if($key>0){
					if($fields == null){
						
						try {
							$name = explode(",", $book[0]);
							
							if(count($name)>0){
								$dni = $book[1];//tr_replace("$", "", $book->documento);
								
								$formalities = new Formalities();
								$formalities->firstname= $name[0];
								$formalities->lastname= $name[1];
								$formalities->dni= $book[1];
								$formalities->gender= $book[3];
								$formalities->date= $book[2];
								$formalities->companie_id=Auth::user()->companie_id;
								
								$date=date_create($book[4]);
								$formalities->updates =date_format($date,'Y-m-d');
								
								$time=date_create($book[5]);
								$formalities->time=date_format($time,'H:i:s');
								
								

								if(!Formalities::where('updates','=',$formalities->updates)->where('dni','LIKE','%'.$dni.'%')->first()){
									$formalities->save();	
								}
								
							}	
						} catch (\Exception $e) {
							continue;
						}
					}else{
						try {
								
								$dni = "";
								$formalities = new Formalities();
								foreach ($fields->get() as  $field) {
									
									switch($field->name) {
										case 'Cedula':
											$dni = $book[$field->position-1];
											$formalities->dni= $book[$field->position-1];
											break;
										case 'Nombres':
											$formalities->firstname= $book[$field->position-1];
											break;
										case 'Apellidos':
											$formalities->lastname= $book[$field->position-1];		
											break;
										case 'Genero':
											$formalities->gender= $book[$field->position-1];			
											break;
										case 'Nacimiento':
											$formalities->date= $book[$field->position-1];		
											break;
										case 'Fecha':				
											$date=date_create($book[$field->position-1]);
											$formalities->updates =date_format($date,'Y-m-d');		
											break;
										case 'Hora':						
											$time=date_create($book[$field->position-1]);
											$formalities->time=date_format($time,'H:i:s');	
											break;
										default:
										break;
											
									}

								}
								$formalities->companie_id=Auth::user()->companie_id;

								if(!Formalities::where('updates','=',$formalities->updates)->where('dni','LIKE','%'.$dni.'%')->first()){
									$formalities->save();	
								}
						
						} catch (\Exception $e) {
							continue;
						}	
					}
				}
			}
			
		}
		$formalities = Formalities::where('terminated_at',false)->orderBy("updates","ASC")->orderBy("time","ASC")->get();
		return view('formalities.list',["formalities"=>$formalities]);
	}

	public function toJson(){
    	$formalities = Formalities::where('terminated_at',false)->orderBy("updates","ASC")->get();
    	return response()->json(["formalities"=>$formalities]);
    }

}

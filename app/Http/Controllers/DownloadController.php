<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use App\Result;
use DB;
use PDF;
use Auth;
use Storage;
use ZipArchive;
use Maatwebsite\Excel\Facades\Excel;

class DownloadController extends Controller {


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
		return view('download.index',["meses"=>$this->meses()]);
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function pregeneratezip(Request $request)
	{
		$date = $request->input("fecfinm");
		$fecini = $request->input("fecini");

		$results = Result::join("formalities","formalities.id","=","results.formalitie_id")
					->whereBetween("formalities.updates",[$fecini,$date])
					->where("entitie_id",Auth::user()->clients)
					->get();

		$cresult = $results->count()/300;
		$ini=0;
		$fin=300;
		$arrConsult = array();
		for ($i=0; $i < $cresult; $i++) { 
			
			$arrConsult[]=array("ini"=>$ini,"fin"=>$fin);
			
			$ini=$fin;
			$fin+=300;
		}
		return view('download.save',["reportzip"=>$arrConsult,"fecini"=>$fecini,"fecfinm"=>$date]);
		

	}

	/**
	 * Store a newly created resource in storage.
	 
	 * @return Response
	 */
	public function generatezip(Request $request)
	{
		//
		
		$date = $request->input("fecfinm");
		$fecini = $request->input("fecini");
		$ini = $request->input("ini");
		$fin = $request->input("fin");

		$results = Result::join("formalities","formalities.id","=","results.formalitie_id")
		            ->join("specialists","specialists.id","=","results.specialist_id")
					->whereBetween("formalities.updates",[$fecini,$date])
					->where("entitie_id",Auth::user()->clients)
					->offset($ini)
					->limit(300)
					->get()->toArray();

		

		//$resultfin = $results->paginate(70, ['*'],'page',3)->items();
		
		
		// creamos lista de archivos a convertir 

		$files1 = glob(storage_path("storage/temp/*.pdf"));
		
		foreach($files1 as $file){
		    if(is_file($file))
		    unlink($file); //elimino el fichero
		}
		if(count($results)>0){

			$sleep=0;
			foreach ($results as $key => $result) {
				$result["findings"] = str_replace('<p>', '<p ALIGN="justify">', $result["findings"]);
		    	$result["oneoption"] = str_replace('<p>', '<p ALIGN="justify">', $result["oneoption"]);
		    	$result["secondoption"] = str_replace('<p>', '<p ALIGN="justify">', $result["secondoption"]);
		    	$data = array("results"=>$result);
		    	$pdf = PDF::loadView('results.certificate2', $data);

		    	Storage::disk('local')->put($result["dni"].'_'.$result["firstname"]."_".$result["lastname"]."_".$result["exam"].'.pdf',$pdf->output());

		    	/*if($sleep==70){
		    		
					sleep(10);		    		
		    		$sleep=0;
		    	}*/

		    	$sleep++;
			}
			
			$files = glob(storage_path("storage/temp/*.pdf"));

			if(count($files)>0){			
				// definimos el nombre dl zip y creamos una instancia
				$archiveFile = storage_path('storage/temp/'.date("Y-m-d").date("H:i:s").'-'.$ini.'-'.$fin.'.zip');
				$archive = new ZipArchive();

				
				//chequear si el archivo deberia ser creado

				if($archive->open($archiveFile, ZipArchive::CREATE | ZipArchive::OVERWRITE)){
					// recorer los archivos y agregarlos al archivo zip

					foreach ($files as $file) {
						if($archive->addFile($file,basename($file))){
							// hace algunas cosas aqui y agrega el archivo con exito
							continue;
						}else{
							throw new Exception("file no pudo ser agredado al archivo zip".$archive->getStatusString(), 1);
						}
					}

					// cerramos el archivador
					if($archive->close()){
						return response()->download($archiveFile, basename($archiveFile))->deleteFileAfterSend(true);
					}else{
						throw new Exception("No se pudo cerrar el archivo ".$archive->getStatusString(), 1);
						
					}
				}else{
					throw new Exception("zip file could not be created: ".$archive->getStatusString(), 1);
				}
			}else{
				return redirect()->back();
			}
		}

	}

}
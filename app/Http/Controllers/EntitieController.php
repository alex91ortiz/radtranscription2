<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use App\Entitie;
use App\Field;
use Auth;
class EntitieController extends Controller {

	/**
	 * Create a new controller instance.
	 *
	 * @return void
	 */
	public function __construct()
	{
		$this->middleware('auth');
		$this->middleware('user');
	}
	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		//
		$entitie = Entitie::all();
		return view('entitie.index',["entitie"=>$entitie]);
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		//
		$entitie = new Entitie();
		return view('entitie.save',["entitie"=>$entitie,'action'=>'create']);
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store(Request $request)
	{
		//
		$entitie = new Entitie();
		$entitie->name= $request->input("name");
		
		$entitie->companie_id=Auth::user()->companie_id;
		$entitie->save();
		foreach ($request->input("names") as $key => $value) {
			$field = new Field();
			$field->name = $value;
			$field->entitie_id = $entitie->id;
			$field->position = $request->input("positions")[$key];
			$field->save();
		}
		$entitie = Entitie::all();
		return view('entitie.list',["entitie"=>$entitie]);
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
		$entitie = Entitie::find($id);
		return view('entitie.show',["entitie"=>$entitie]);
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
		$entitie = Entitie::find($id);
		return view('entitie.save',["entitie"=>$entitie,'action'=>'update']);
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
		$entitie = Entitie::find($id);
		$entitie->name= $request->input("name");
		$entitie->save();
		if($entitie->fields){
			foreach ($entitie->fields->get() as $value) {
				$value->delete();
			}
		}
		
		foreach ($request->input("names") as $key => $value) {
			$field = new Field();
			$field->name = $value;
			$field->entitie_id = $entitie->id;
			$field->position = $request->input("positions")[$key];
			$field->save();
		}
		$entitie = Entitie::all();
		return view('entitie.list',["entitie"=>$entitie]);
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
		$entitie = Entitie::find($id);
		$entitie->delete();
		$entitie = Entitie::all();
		return view('entitie.list',["entitie"=>$entitie]);
	}

}

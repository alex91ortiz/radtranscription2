<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use App\Typeexam;
use App\Entitie;
use Auth;
class TypeExamController extends Controller {
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
		$typeexam = Typeexam::all();
		return view('typeexam.index',["typeexam"=>$typeexam]);
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		//
		$typeexam = new Typeexam();
		$entitie = Entitie::all();
		return view('typeexam.save',["typeexam"=>$typeexam,"entitie"=>$entitie,'action'=>'create']);
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store(Request $request)
	{
		//
		$typeexam = new Typeexam();
		$typeexam->name= $request->input("name");
		$typeexam->value= $request->input("value");
		$typeexam->entitie_id= $request->input("entitie_id");
		$typeexam->companie_id=Auth::user()->companie_id;
		$typeexam->save();
		$typeexam = Typeexam::all();
		return view('typeexam.list',["typeexam"=>$typeexam]);
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
		$typeexam = Typeexam::find($id);
		return view('typeexam.show',["typeexam"=>$typeexam]);
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
		$typeexam = Typeexam::find($id);
		$entitie = Entitie::all();
		return view('typeexam.save',["typeexam"=>$typeexam,"entitie"=>$entitie,'action'=>'update']);
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
		$typeexam = Typeexam::find($id);
		$typeexam->name= $request->input("name");
		$typeexam->entitie_id= $request->input("entitie_id");
		$typeexam->value= $request->input("value");
		$typeexam->save();
		$typeexam = Typeexam::all();
		return view('typeexam.list',["typeexam"=>$typeexam]);
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
		$typeexam = Typeexam::find($id);
		$typeexam->delete();
		$typeexam = Typeexam::all();
		return view('typeexam.list',["typeexam"=>$typeexam]);
	}

	/**
	 * get the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function find($id)
	{
		//
		$typeexam = Typeexam::where("entitie_id",$id)->get();
		return Response()->json(["typeexam"=>$typeexam]);
	}
}

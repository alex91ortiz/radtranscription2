<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use App\Exam;
use Auth;
class ExamController extends Controller {

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
		$exams = Exam::all();
		return view('exams.index',["exams"=>$exams]);
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		//
		$exams = new Exam();
		return view('exams.save',["exams"=>$exams,'action'=>'create']);
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store(Request $request)
	{
		//
		$exams = new Exam();
		$exams->name= $request->input("name");
		$exams->description= $request->input("description");
		$exams->diagnostic=$request->input("diagnostic");
		$exams->oneoption= $request->input("oneoption");
		$exams->secondoption= $request->input("secondoption");
		$exams->companie_id=Auth::user()->companie_id;
		$exams->save();
		$exams = Exam::all();
		return view('exams.list',["exams"=>$exams]);
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
		$exams = Exam::find($id);
		return view('exams.show',["exams"=>$exams]);
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
		$exams = Exam::find($id);
		return view('exams.save',["exams"=>$exams,'action'=>'update']);
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
		$exams = Exam::find($id);
		$exams->name= $request->input("name");
		$exams->description= $request->input("description");
		$exams->diagnostic=$request->input("diagnostic");
		$exams->oneoption= $request->input("oneoption");
		$exams->secondoption= $request->input("secondoption");
		$exams->companie_id=Auth::user()->companie_id;
		$exams->save();
		$exams = Exam::all();
		return view('exams.list',["exams"=>$exams]);
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
		$exams = Exam::find($id);
		$exams->delete();
		$exams = Exam::all();
		return view('exams.list',["exams"=>$exams]);
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
		$exams = Exam::find($id);
		return Response()->json(["exams"=>$exams]);
	}

	public function toJson(){
    	$exams = Exam::all();
    	return response()->json(["exams"=>$exams]);
    }

}

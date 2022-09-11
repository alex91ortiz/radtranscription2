<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use App\Specialist;
use Auth;
class SpecialistController extends Controller {
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
		$specialist = Specialist::all();
		return view('specialist.index',["specialist"=>$specialist]);
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		//
		$specialist = new Specialist();
		return view('specialist.save',["specialist"=>$specialist,'action'=>'create']);
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store(Request $request)
	{
		//

		$specialist = new Specialist();
		$specialist->name= $request->input("name");
		$specialist->specialty= $request->input("specialty");
		$specialist->rm= $request->input("rm");
		$specialist->companie_id=Auth::user()->companie_id;
		$specialist->save();
		$specialist = Specialist::all();
		return view('specialist.list',["specialist"=>$specialist]);
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
		$specialist = Specialist::find($id);
		return view('specialist.show',["specialist"=>$specialist]);
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
		$specialist = Specialist::find($id);
		return view('specialist.save',["specialist"=>$specialist,'action'=>'update']);
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
		$specialist = Specialist::find($id);
		$specialist->name= $request->input("name");
		$specialist->specialty= $request->input("specialty");
		$specialist->rm= $request->input("rm");
		$specialist->companie_id=Auth::user()->companie_id;
		$specialist->save();
		$specialist = Specialist::all();
		return view('specialist.list',["specialist"=>$specialist]);
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
		$specialist = Specialist::find($id);
		$specialist->delete();
		$specialist = Specialist::all();
		return view('specialist.list',["specialist"=>$specialist]);
	}

	/**
	 * Show the form for uploa file.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function uploadshow($id)
	{
		//
		$specialist = Specialist::find($id);
		
		return view('specialist.upload',["specialist"=>$specialist]);
	}
	/**
	 * uploa file from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function upload(Request $request,$id)
	{
		//
		$specialist = Specialist::find($id);
		$file = $request->file("firma");
		$imagedata = file_get_contents($file);
        $base64 = base64_encode($imagedata);
        $specialist->firma=$base64;
        $specialist->save();
		//dd($base64);
		$specialist = Specialist::all();
		return view('specialist.list',["specialist"=>$specialist]);
	}
}

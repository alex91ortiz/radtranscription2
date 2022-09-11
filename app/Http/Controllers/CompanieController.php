<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use App\Companie;

class CompanieController extends Controller {

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
		$companie = Companie::all();
		return view('companie.index',["companie"=>$companie]);
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		//
		$companie = new Companie();
		return view('companie.save',["companie"=>$companie,'action'=>'create']);
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store(Request $request)
	{
		//
		$companie = new Companie();
		$companie->description= $request->input("description");
		$companie->save();
		$companie = Companie::all();
		return view('companie.list',["companie"=>$companie]);
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
		$companie = Companie::find($id);
		return view('companie.show',["companie"=>$companie]);
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
		$companie = Companie::find($id);
		return view('companie.save',["companie"=>$companie,'action'=>'update']);
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
		$companie = Companie::find($id);
		$companie->description= $request->input("description");
		$companie->save();
		$companie = Companie::all();
		return view('companie.list',["companie"=>$companie]);
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
		$companie = Companie::find($id);
		$companie->delete();
		$companie = Companie::all();
		return view('companie.list',["companie"=>$companie]);
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
		$companie = Companie::find($id);
		
		return view('companie.upload',["companie"=>$companie]);
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
		$companie = Companie::find($id);
		$file = $request->file("logo");
		$imagedata = file_get_contents($file);
        $base64 = base64_encode($imagedata);
        $companie->logo=$base64;
        $companie->save();
		//dd($base64);
		$companie = Companie::all();
		return view('companie.list',["companie"=>$companie]);
	}
}

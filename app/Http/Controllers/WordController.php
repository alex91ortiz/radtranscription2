<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use App\Word;
class WordController extends Controller {

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
		$word = Word::all();
		return view('word.index',["word"=>$word]);
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		//
		$word = new Word();
		return view('word.save',["word"=>$word,'action'=>'create']);
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store(Request $request)
	{
		//
		$word = new Word();
		$word->name= $request->input("name");
		$word->description= $request->input("description");
		$word->save();
		$word = Word::all();
		return view('word.list',["word"=>$word]);
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
		$word = Word::find($id);
		return view('word.show',["word"=>$word]);
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
		$word = Word::find($id);
		return view('word.save',["word"=>$word,'action'=>'update']);
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
		$word = Word::find($id);
		$word->name= $request->input("name");
		$word->description= $request->input("description");
		$word->save();
		$word = Word::all();
		return view('word.list',["word"=>$word]);
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
		$word = Word::find($id);
		$word->delete();
		$word = Word::all();
		return view('word.list',["word"=>$word]);
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
		$word = Word::where("name","=",$id)->first();
		return Response()->json(["word"=>$word]);
	}
}

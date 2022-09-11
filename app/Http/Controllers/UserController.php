<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use App\User;
use App\Companie;
use App\Entitie;
use Auth;

class UserController extends Controller {
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
		$users = User::all();
		return view('users.index',["users"=>$users]);
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		//
		$users = new User();
		$companies = Companie::all();
		$entities = Entitie::all();
		return view('users.save',["users"=>$users,"companies"=>$companies,"entities"=>$entities,'action'=>'create']);
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store(Request $request)
	{
		//
		
		$users = new User();
		$users->name= $request->input("name");
		$users->email= $request->input("email");
		$users->password= bcrypt($request->input("password"));
		$users->changes= true;
		$users->companie_id= $request->input("companie_id");
		$users->role= $request->input("role");
		$users->clients= $request->input("entitie_id");
		$users->save();
		$users = User::all();
		return view('users.list',["users"=>$users]);
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
		$users = User::find($id);
		return view('users.show',["users"=>$users]);
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
		$users = User::find($id);
		$companies = Companie::all();
		$entities = Entitie::all();
		return view('users.save',["users"=>$users,"companies"=>$companies,"entities"=>$entities,'action'=>'update']);
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

		$users = User::find($id);
		$users->name= $request->input("name");
		$users->email= $request->input("email");
		if($request->input("password")!="")
			$users->password= bcrypt($request->input("password"));
		$users->companie_id= $request->input("companie_id");
		$users->role= $request->input("role");
		$users->clients= $request->input("entitie_id");
		$users->save();
		$users = User::all();
		return view('users.list',["users"=>$users]);
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
		$users = User::find($id);
		$users->delete();
		$users = User::all();
		return view('users.list',["users"=>$users]);
	}

	/**
	 * Update a client favorite the specified resource in storage.
	 *
	 * @return Response
	 */
	public function clientFavorite(Request $request,$id)
	{
		//
		$clients = $request->input("id");
		$users = User::find($id);
		$users->clients = $clients;
		$users->save();
		return Response()->json(["update"=>true]);
	}
}


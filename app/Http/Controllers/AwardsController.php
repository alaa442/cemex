<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

//use Illuminate\Http\Request;
use App\Award;
use DB;
use Request;

class AwardsController extends Controller {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
	    $awards=Award::all();
		
	
		return view('awards.index',compact('awards'));
		
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		return view('awards.create');
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		$award = new Award;
		$award->Name=Request::get('Name');
		$award->save();
		return redirect('/awards');

	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($Awards_Id)

	{


		 $award=Award::findOrFail($Awards_Id);
		//$award=DB::table('awards')->where('Awards_Id',$Awards_Id)->first();
		return view('awards.show',compact('award'));
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($Awards_Id)
	{

		$award=DB::table('awards')->where('Awards_Id',$Awards_Id)->first();
		return view('awards.edit',compact('award'));
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($Awards_Id)
	{
		$award = Award ::where('Awards_Id',$Awards_Id)->first();
		$award->Name=Request::get('Name');
		$award->save();
		return redirect('/awards/'.$Awards_Id.'/edit');
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($Awards_Id)
	{
		$award = Award ::where('Awards_Id',$Awards_Id)->first();
		$award->delete();
		return redirect('/awards');
	}

}

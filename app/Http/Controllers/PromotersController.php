<?php

namespace App\Http\Controllers;



use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Promoter;
use Request;

class PromotersController extends Controller
{
    /**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
	    $promoters=Promoter::all();		
	    	
		return view('promoters.index',compact('promoters'));
		
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		return view('promoters.create');
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		$promoters= new Promoter;
		$promoters->Pormoter_Name =Request::get('Pormoter_Name');
		$promoters->TelephonNo =Request::get('TelephonNo');
		$promoters->User_Name =Request::get('User_Name');
		$promoters->Password =Request::get('Password');
		$promoters->Instegram_Account =Request::get('Instegram_Account');
		$promoters->Facebook_Account =Request::get('Facebook_Account');
		$promoters->Email =Request::get('Email');
		$promoters->City =Request::get('City');
		$promoters->Government =Request::get('Government');
		$promoters->save();
		return redirect('/promoters');
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($Pormoter_Id)
	{   $promoters=Promoter::findOrFail($Pormoter_Id);
	
		return view('promoters.show',compact('promoters'));

	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{  $promoters=Promoter::find($id);
		return view('promoters.edit',compact('promoters'));
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		$promoters=Promoter::find($id);
		$promoters->Pormoter_Name =Request::get('Pormoter_Name');
		$promoters->TelephonNo =Request::get('TelephonNo');
		$promoters->User_Name =Request::get('User_Name');
		$promoters->Password =Request::get('Password');
		$promoters->Instegram_Account =Request::get('Instegram_Account');
		$promoters->Facebook_Account =Request::get('Facebook_Account');
		$promoters->Email =Request::get('Email');
		$promoters->City =Request::get('City');
		$promoters->Government =Request::get('Government');
		$promoters->save();
		return redirect('/promoters');
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		 $promoters=Promoter::find($id);
		$promoters->delete();
		return redirect('/promoters');
	}
}
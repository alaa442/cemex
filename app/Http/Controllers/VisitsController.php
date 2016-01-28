<?php

namespace App\Http\Controllers;



use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Visit;
use App\Promoter;
use App\Contractor;
use Request;

class VisitsController extends Controller
{
	
	
	public function index()
	{
	    $visits=Visit::all();
		
		return view('visits.index',compact('visits'));
		
	}
  
	public function create()
	{ 
	$promoters = Promoter::all();
	 $contractors=Contractor ::all();

	
		return view('visits.create',compact('contractors','promoters'));
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{  
		$input = request()->all();
		$visits= new Visit;
		$visits->Adress=Request::get('Adress');
		$visits->Backcheck =Request::get('Backcheck');
		$visits->Comments =Request::get('Comments');
		$data['visits'] = Visit::get()->lists('Cement_Type');
		$visits->Date_Visit_Call=Request::get('Date_Visit_Call');
		$visits->Government =Request::get('Government');
		$visits->GPS =Request::get('GPS');
		$visits->OrderNo =Request::get('OrderNo');
		$visits->Points =Request::get('Points');
		$data['visits'] = Visit::get()->lists('Project_Type');
		$visits->Call_Reason =Request::get('Call_Reason');
		$visits->Visit_Reason =Request::get('Visit_Reason');
		$visits->Project_Current_State =Request::get('Project_Current_State');
		$visits->CV_Comments =Request::get('CV_Comments');
		$visits->Contractor_Id = $input['Contractor_Id'];
		$visits->Pormoter_Id = $input['Pormoter_Id'];
		$visits->save();
		return redirect('/visits');

	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($Visits_id)
	{  
		$visits=Visit::findOrFail($Visits_id);
		//var_dump($visits);
		
	
		return view('visits.show')->with('visits', $visits);

	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{ 
		$visits=Visit::find($id);
		$promoters = Promoter::all();
	   $contractors= Contractor::all();
	return view('visits.edit',compact('visits','contractors','promoters'));
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{   
$input = request()->all();
		$visits= Visit::find($id);
		$visits->Adress=Request::get('Adress');
		$visits->Backcheck =Request::get('Backcheck');
		$visits->Comments =Request::get('Comments');
		$visits->Cement_Type =Request::get('Cement_Type');
		$visits->Date_Visit_Call=Request::get('Date_Visit_Call');
		$visits->Government =Request::get('Government');
		$visits->GPS =Request::get('GPS');
		$visits->OrderNo =Request::get('OrderNo');
		$visits->Project_Current_State =Request::get('Project_Current_State');
		$visits->Points =Request::get('Points');
		$data['visits'] = Visit::get()->lists('Project_Type');
		$visits->Call_Reason =Request::get('Call_Reason');
		$visits->Visit_Reason =Request::get('Visit_Reason');
		$visits->CV_Comments =Request::get('CV_Comments');
	    $visits->Contractor_Id = $input['Contractor_Id'];
		$visits->Pormoter_Id = $input['Pormoter_Id'];
		$visits->save();
		return redirect('/visits'); 
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		 $visits=Visit::find($id);
		$visits->delete();
		return redirect('/visits');
	}
}
<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Pagination\Paginator;

//use Illuminate\Http\Request;

use App\Competition;
use App\Award;
use DB;
use Request;

class CompetitionsController extends Controller {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		 $competitions=Competition::Paginate(10);
	
		return view('competitions.index',compact('competitions'));
		
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		$awards= Award ::lists('Name','Awards_Id');
		return view('competitions.create',compact('awards'));
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
        $competition= New Competition ;
		$competition->Name=Request::get('Name');
		$competition->Period=Request::get('Period');
		$competition->Start_Date=Request::get('Start_Date');
		$competition->Code=uniqid("Comp");
		//$competition->Code = strtoupper(str_random(10));

		$competition->save();
		
           
           $array=Request::get('Total_Amount');
        

          $i=0;
                    // dd($array->$key);
                    
        foreach (Request::get('awards') as $awardId) {

		             $total_amount=$array[$i];               
			         $award = Award ::find($awardId);
                     $competition->awards()->attach($award,['Total_Amount'=>$total_amount]);
                     $i++;
        	}
		return redirect('/competitions');
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($Competitions_Id)
	{
		 $competition=Competition ::findOrFail($Competitions_Id);
		
		return view('competitions.show',compact('competition'));
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($Competitions_Id)
	{
		//dd($Competitions_Id);
		$awards= Award ::lists('Name','Awards_Id');
		$competition=Competition ::where('Competitions_Id',$Competitions_Id)->first();
		
		return view('competitions.edit',compact('competition','awards'));
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($Competitions_Id)
	{
		
		$competition = Competition ::where('Competitions_Id',$Competitions_Id)->first();
	    $competition->Name=Request::get('Name');
		$competition->Period=Request::get('Period');
		$competition->Start_Date=Request::get('Start_Date');
		$competition->save();
        $competition->awards()->detach();
        $array=Request::get('Total_Amount');

         $i=0;         
        foreach (Request::get('awards') as $awardId) {

		             $total_amount=$array[$i];               
			         $award = Award ::find($awardId);
                     $competition->awards()->attach($award,['Total_Amount'=>$total_amount]);
                     $i++;
        	}
		return redirect('/competitions/'.$Competitions_Id.'/edit');
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($Competitions_Id)
	{
		$competition = Competition ::where('Competitions_Id',$Competitions_Id)->first();
		$competition->delete();
		return redirect('/competitions');
	}

}

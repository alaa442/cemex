<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Pagination\Paginator;


//use Illuminate\Http\Request;
use App\Competition;
use App\Award;
use App\Present;
use App\Contractor;
use DB;
use Request;

class PresentsController extends Controller {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response 
	 */
	public function index()
	{
		 $present= Present ::Paginate(10);


		 return view('presents.index',compact('present'));
		
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
	  $awards= Award ::lists('Name','Awards_Id');
	  $contractor=Contractor ::lists('Name','Contractor_Id');
	  $competition=Competition ::lists('Code','Competitions_Id');
		return view('presents.create',compact('awards','contractor','competition'));
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		$present= New Present ;
		$present->Ranking=Request::get('Ranking');
		$present->Delivery_Date=Request::get('Delivery_Date');
		$present->competition_id=Request::get('competition');
		$present->contractor_id=Request::get('contractor');
	

		$present->save();
		
           $array=Request::get('Amount');
        

          $i=0;
                    // dd($array->$key);
                    
        foreach (Request::get('awards') as $awardId) {

		             $total_amount=$array[$i];               
			         $award = Award ::find($awardId);
                     $present->getwards()->attach($award,['Amount'=>$total_amount]);
                     $i++;
        	}
		return redirect('/presents');
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($Presents_Id)
	{
		 $present=Present ::findOrFail($Presents_Id);
		
		return view('presents.show',compact('present'));
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($Presents_Id)
	{
		$awards= Award ::lists('Name','Awards_Id');
		$contractor=Contractor ::lists('Name','Contractor_Id');
	    $competition=Competition ::lists('Code','Competitions_Id');
		$present=Present ::where('Presents_Id',$Presents_Id)->first();
		
		return view('presents.edit',compact('present','awards','contractor','competition'));
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($Presents_Id)
	{
		$present = Present ::where('Presents_Id',$Presents_Id)->first();
	    $present->Ranking=Request::get('Ranking');
		$present->Delivery_Date=Request::get('Delivery_Date');
		$present->competition_id=Request::get('competition');
		$present->contractor_id=Request::get('contractor');
		$present->save();
        $present->getwards()->detach();
        $array=Request::get('Amount');
print_r($array);
         $i=0;         
        foreach (Request::get('awards') as $awardId) {

		             $total_amount=$array[$i];               
			         $award = Award ::find($awardId);
                     $present->getwards()->attach($award,['Amount'=>$total_amount]);
                     $i++;
        	}
		return redirect('/presents/'.$Presents_Id.'/edit');
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($Presents_Id)
	{
		$present = Present ::where('Presents_Id',$Presents_Id)->first();
		$present->delete();
		return redirect('/presents');
	}

}

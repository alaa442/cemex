<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Review;
use App\Contractor;
use Request;



class ReviewsController extends Controller
{
    public function index()
    {
    	$reviews = Review::all();
    	return view('reviews.index',compact('reviews'));
    }

    public function show($id)
    {
        $review = Review::find($id);
        return view('reviews.show',compact('review'));
    }

    public function create()
    {    
        $contractors = Contractor::all();   
        return view('reviews.create',compact('contractors'));
    }

    public function store()
    {
        $input = request()->all();

        $review = new Review;
        $review->GPS = Request::get('GPS');
        $review->Project_NO = Request::get('project_no');
        $review->Cement_Consuption = Request::get('cement_consuption');       
        $review->Cement_Bricks = Request::get('cement_bricks');
        $review->Steel_Consumption = Request::get('steel_consumption');        
        $review->Wood_Meters = Request::get('wood_meters');       
        $review->Wood_Consumption = Request::get('wood_consumption');
        $review->No_Of_Mixers = Request::get('no_of_mixers');
        $review->Capital = Request::get('capital');
        $review->Credit_Debit = Request::get('credit_debit');       
        $review->Sub_Contractor = Request::get('sub_contractor');
        $review->Class = Request::get('class');

        $review->Contractor_Id = $input['contractor_id'];
        //dd(request()->all());
        
        $review->save();
        return redirect('/reviews');
    }

    public function edit($id)
    { 
        $contractors = Contractor::all();
        $review = Review::find($id);       
        return view('reviews.edit',compact('review','contractors') );
    }

    public function update($id)
    {
        $input = request()->all();

        $review = Review::find($id);
        $review->Contractor_Id = Request::get('GPS');
        $review->GPS = Request::get('GPS');
        $review->Project_NO = Request::get('project_no');
        $review->Cement_Consuption = Request::get('cement_consuption');       
        $review->Cement_Bricks = Request::get('cement_bricks');
        $review->Steel_Consumption = Request::get('steel_consumption');        
        $review->Wood_Meters = Request::get('wood_meters');       
        $review->Wood_Consumption = Request::get('wood_consumption');
        $review->No_Of_Mixers = Request::get('no_of_mixers');
        $review->Capital = Request::get('capital');
        $review->Credit_Debit = Request::get('credit_debit');       
        $review->Sub_Contractor = Request::get('sub_contractor');
        $review->Class = Request::get('class');     
        
        $review->Contractor_Id = $input['contractor_id'];

        // dd(request()->all());

        $review->save();
        return redirect('/reviews');
    }

    public function destroy($id)
    {
        $review = Review::find($id);
        $review->delete();
        return redirect('/reviews');
    }


}

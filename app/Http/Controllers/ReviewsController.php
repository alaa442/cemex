<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Review;
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
        $review = Contractor::find($id)->review;

    	//$review = Review::findOrFail($id);
        return view('reviews.show',compact('review'));
    }

    public function create()
    {
        return view('reviews.create');
    }

    public function store()
    {
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

        $review->save();
        return redirect('/reviews');
    }

    public function edit($id)
    { 
        $review = Review::find($id);
        return view('reviews.edit',compact('review'));
    }

    public function update($id)
    {
        $review = Review::find($id);
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

<?php

namespace App\Http\Controllers;

//use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Contractor;
use App\Promoter;
use Request;

class ContractorsController extends Controller
{
    public function index()
    {
    	
       // $contractors = Contractor::with('promoter')->get();
       // return view('contractors.index',compact('contractors'));
       //$contractors = Contractor::find(1)->promoter->Name;

        $contractors = Contractor::all();
        return view('contractors.index',compact('contractors'));
    }

    public function create()
    {
    	return view('contractors.create');
    }

    public function store()
    {
        $contractor = new Contractor;
        $contractor->Name = Request::get('name');
        $contractor->Goverment = Request::get('goverment');
        $contractor->City = Request::get('city');
        $contractor->Address = Request::get('address');
        $contractor->Education = Request::get('education');
        $contractor->Facebook_Account = Request::get('facebook');
        $contractor->Computer = Request::get('computer');
        $contractor->Email = Request::get('mail');
        $contractor->Birthday = Request::get('birthday');
        $contractor->Tele1 = Request::get('tele1');
        $contractor->Tele2 = Request::get('tele2');
        $contractor->Job = Request::get('job');
        $contractor->Intership_No = Request::get('intership_no');
        $contractor->Seller1 = Request::get('seller1'); 
        $contractor->Seller2 = Request::get('seller2');
        $contractor->Seller3 = Request::get('seller3');
        $contractor->Seller4 = Request::get('seller4');
        $contractor->Pormoter_Id = Request::get('pormoter_id');
        $contractor->Phone_Type = Request::get('phone_type');
        $contractor->Nickname = Request::get('nickname');

        $contractor->save();
        return redirect('/contractors');
    }

    public function show($id)
    {
    	$contractor = Contractor::findOrFail($id);
        return view('contractors.show',compact('contractor'));
    }

    public function edit($id)
    { 
        $contractor = Contractor::find($id);
    	return view('contractors.edit',compact('contractor'));
    }

    public function update($id)
    {
        $contractor = Contractor::find($id);
        $contractor->Name = Request::get('name');
        $contractor->Goverment = Request::get('goverment');
        $contractor->City = Request::get('city');
        $contractor->Address = Request::get('address');
        $contractor->Education = Request::get('education');
        $contractor->Facebook_Account = Request::get('facebook');
        $contractor->Computer = Request::get('computer');
        $contractor->Email = Request::get('mail');
        $contractor->Birthday = Request::get('birthday');
        $contractor->Tele1 = Request::get('tele1');
        $contractor->Tele2 = Request::get('tele2');
        $contractor->Job = Request::get('job');
        $contractor->Intership_No = Request::get('intership_no');
        $contractor->Seller1 = Request::get('seller1'); 
        $contractor->Seller2 = Request::get('seller2');
        $contractor->Seller3 = Request::get('seller3');
        $contractor->Seller4 = Request::get('seller4');
        $contractor->Pormoter_Id = Request::get('pormoter_id');
        $contractor->Phone_Type = Request::get('phone_type');
        $contractor->Nickname = Request::get('nickname');

        $contractor->save();
        return redirect('/contractors');
    }

    public function destroy($id)
    {
        $contractor = Contractor::find($id);
        $contractor->delete();
        return redirect('/contractors');
    }


}
 
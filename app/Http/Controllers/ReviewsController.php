<?php

namespace App\Http\Controllers;
use App\Promoter;
use App\Http\Controllers\Controller;
use App\Review;
use App\Contractor;
use App\Http\Requests;
use Input;
use Validator;
use Request;
use DB;
use Excel;

class ReviewsController extends Controller
{
    public function index()
    {       
            $reviews = Review::all();
            return view('reviews.index',compact('reviews'));      
    }

    public function importreview(){

        $importbtn= Request::get('submit'); 
        if(isset($importbtn))
        { 
            $filename = Input::file('file')->getClientOriginalName();
            $Dpath = base_path();
            $upload_success =Input::file('file')->move( $Dpath, $filename);
        
        Excel::load($upload_success, function($reader)
            {       
                // $results = $reader->get()->first();
                $results = $reader->get()->toArray(); 
                 // dd($results);
                foreach ($results[0] as $data)
                {
                $contractor =new Contractor();
                $review = new Review();
                $contractor->Name = $data['name'];
                $contractor->Goverment = $data['government'];
                $contractor->City = $data['city'];
                $contractor->Address = $data['address'];
                $contractor->Education = $data['education'];
                $contractor->Facebook_Account = $data['facebook'];
                $contractor->Computer = $data['computer'];
                $contractor->Email = $data['mail'];
                $contractor->Birthday =$data['birthday'];
                $contractor->Tele1 = $data['mobile1'];
                $contractor->Tele2 =$data['mobile2'];
                $contractor->Job = $data['job'];
                $contractor->Code=uniqid('Cont');
                $contractor->Phone_Type = $data['phone_type'];
                $contractor->Nickname =$data['nick_name'];
                $contractor->Religion=$data['religion'];
                $contractor->Class=$data['class'];
                $contractor->Home_Phone= $data['home_phone'];
    if(isset($data['code'])){
        $Pormoter_Id= Promoter::where('Code',$data['code'])->pluck('Pormoter_Id')->first();
        $contractor->Pormoter_Id =$Pormoter_Id;
        // dd($contractor->Pormoter_Id);
    }
    $contractor->save();

    if(isset($data['mobile1'])){
        $Contractor_Id= Contractor::where('Tele1',$contractor->Tele1)
                            ->pluck('Contractor_Id')->first();
        $review->Contractor_Id = $Contractor_Id;
        //dd($review->Contractor_Id);
    } 

            $review->Long = $data['long'];
            $review->Lat = $data['lat'];
            $review->Project_NO = $data['project_no'];
            $review->Portland_Cement = $data['portland_cement'];
            $review->Resisted_Cement = $data['resisted_cement'];
            $review->Eng_Cement = $data['eng_cement'];
            $review->Saed_Cement = $data['saed_cement'];
            $review->Fanar_Cement = $data['fanar_cement'];
            $review->Workers =$data['workers'];
            $review->Cement_Consuption = $data['cement_consuption'];
            $review->Cement_Bricks =$data['cement_bricks'];
            $review->Steel_Consumption = $data['steel_consumption'];
            $review->Has_Wood = $data['has_wood'];
            $review->Wood_Meters =$data['wood_meters'];
            $review->Has_Mixers=$data['has_mixers'];
            $review->No_Of_Mixers= $data['no_of_mixers'];
            $review->Capital = $data['capital'];
            $review->Credit_Debit = $data['credit_debit'];
            $review->Has_Sub_Contractor =$data['has_sub_contractor'];
            $review->Seller1 =$data['seller1'];
            $review->Seller2 =$data['seller2'];
            $review->Seller3 =$data['seller3'];
            $review->Seller4 =$data['seller4'];
            $review->Status=$data['status'];
            $review->Call_Status= $data['call_status'];
            $review->Area=$data['area'];
            $review->Cont_Type= $data['cont_type'];
            
            $review->save();
        }
});

    return redirect('/reviews');           
    } 

}

     public function exportreview()
    {
        $exportbtn=Request::get('export');
        if(isset($exportbtn))
        {    
        Excel::create('reviewfile', function($excel)
        {
            $excel->sheet('sheetname',function($sheet)
            {  

            $sheet->appendRow(1, array(
            'STATUS','Call Status','Cons/Comp','المهنة','AREA','Gov','District','اللقب','الاسم رباعي','Education','اسم الشهرة','الديانة','موبايل (1)','موبايل (2)'
                ,'رقم تليفون ارضي','العنوان بالتفصيل','Long','Lat','البريد الالكتروني','Facebook','هل يمتلك هاتف ذكي','أسمنت أسيوط العادى','أسمنت المقاوم','أسمنت المهندس','أسمنت الصعيد','أسمنت الفنار','هل يمتلك كومبيوتر','تاريخ الميلاد','اسم تاجر الاسمنت (1)','اسم تاجر الاسمنت (2)','اسم تاجر الاسمنت (3)','اسم تاجر الاسمنت (4)','اسم المندوب','Avg. Sites/Month','Cement Consumption','Cement Bricks','Avg. Wood Consumption','Avg. Steel Consumption','Workers','Wood','Wood - Meters','Concrete Mixer','No. Of Mixers','Capital','Credit - Debit','Sub-Contractor','Class')); 
                
            $data=[];
            $contractors=Contractor::all();
            $reviews =Review::all();
            // dd($contractors);
            
        foreach ($reviews as $review)
        {
            array_push($data,array(

                $review->Status,
                $review->Call_Status,
                $review->Cont_Type,
                $review->getcontractor->Job,

                $review->Area,
                $review->getcontractor->Goverment,
                $review->getcontractor->City,
                $review->getcontractor->Fame, 
                $review->getcontractor->Name,                                             
                
                $review->getcontractor->Education,
                $review->getcontractor->Nickname ,
                $review->getcontractor->Religion,
                $review->getcontractor->Tele1,
                $review->getcontractor->Tele2 ,
                $review->getcontractor->Home_Phone,
                $review->getcontractor->Address,
                $review->Long,
                $review->Lat,

                $review->getcontractor->Email,
                $review->getcontractor->Has_Facebook, 
                $review->getcontractor->Phone_Type,

                $review->Portland_Cement,
                $review->Resisted_Cement,
                $review->Eng_Cement,
                $review->Saed_Cement,
                $review->Fanar_Cement,

                $review->getcontractor->Computer,               
                $review->getcontractor->Birthday, 

                $review->Seller1, 
                $review->Seller2,
                $review->Seller3, 
                $review->Seller4,

                $review->getcontractor->getpromoter->Pormoter_Name,  
                $review->Project_NO,

                $review->Cement_Consuption,
                $review->Cement_Bricks, 
                $review->Wood_Consumption,           
                $review->Steel_Consumption,

                $review->Workers,
                $review->Has_Wood,
                $review->Wood_Meters,

                $review->Has_Mixers,               
                $review->No_Of_Mixers,

                $review->Capital,  
                $review->Credit_Debit,
                $review->Has_Sub_Contractor,

                $review->getcontractor->Class,                                      
                
            ));
        }
    $sheet->fromArray($data, null, 'A2', false, false);
    }); })->download('xls');
    return redirect('/reviews');  
    }
             

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
        $inputs = Input :: all();  
        $rules = array(
                'credit_debit'      => array('alpha'),
                'sub_contractor'    => array('alpha'),
                'GPS'               => array('alpha_num'),
                'project_no'        => array('Integer'),
                'cement_consuption' => array('Integer'),
                'cement_bricks'     => array('Integer'),
                'steel_consumption' => array('Integer'),
                'portland_cement'   => array('Integer'),
                'resisted_cement'   => array('Integer'),
                'eng_cement'        => array('Integer'),
                'saed_cement'       => array('Integer'),
                'fanar_cement'      => array('Integer'),
                'workers'           => array('Integer'),
                'wood_meters'       => array('Integer'),
                'wood_consumption'  => array('Integer'),
                'no_of_mixers'      => array('Integer'),
                'capital'           => array('Integer'),
                'seller1'           => array('regex:/^[\pL\s]+$/u'),
                'seller2'           => array('regex:/^[\pL\s]+$/u'),
                'seller3'           => array('regex:/^[\pL\s]+$/u'),
                'seller4'           => array('regex:/^[\pL\s]+$/u'),
                'status'            => array('regex:/^[\pL\s]+$/u'),
                'call_status'       => array('regex:/^[\pL\s]+$/u'),
                'area'              => array('regex:/^[\pL\s]+$/u'),
                'cont_type'         => array('regex:/^[\pL\s]+$/u')
                   
        );

         $messages = array(
                'Integer' => 'برجاء ادخال الارقام صحيحة',
                'alpha'=> 'الرجاء لدخال حروف فقط',
                'seller1.regex'    =>'أدخل الحروف صحيحة',
                'seller2.regex'=>'أدخل الحروف صحيحة',
                'seller3.regex'    =>'أدخل الحروف صحيحة',
                'seller4.regex'=>'أدخل الحروف صحيحة',
                'status.regex'    =>'أدخل الحروف صحيحة',
                'call_status.regex'=>'أدخل الحروف صحيحة',
                'area.regex'    =>'أدخل الحروف صحيحة',
                'cont_type.regex'=>'أدخل الحروف صحيحة',
    );

    $validator = Validator::make(Input::all(), $rules,$messages);
        if ($validator->fails()) {
            return redirect('reviews/create')
                    ->withErrors($validator)->withInput();
        }
        else {
            $review = new Review;
            $review->Long = Request::get('long');
            $review->Lat = Request::get('lat');
            $review->Project_NO = Request::get('project_no');
            $review->Cement_Consuption = Request::get('cement_consuption');       
            $review->Cement_Bricks = Request::get('cement_bricks');
            $review->Steel_Consumption = Request::get('steel_consumption'); 

            $review->Has_Mixers = Request::get('has_mixers');
            $review->Has_Wood = Request::get('has_wood');

            $review->Has_Sub_Contractor = Request::get('has_sub_contractor');

            $review->Sub_Contractor1 = Request::get('sub_contractor1');
            $review->Sub_Contractor2 = Request::get('sub_contractor2');

            $review->Wood_Meters = Request::get('wood_meters');       
            $review->Wood_Consumption = Request::get('wood_consumption');
            $review->No_Of_Mixers = Request::get('no_of_mixers');
            $review->Capital = Request::get('capital');
            $review->Credit_Debit = Request::get('credit_debit');       
            $review->Workers = Request::get('workers');
            $review->Portland_Cement = Request::get('portland_cement');
            $review->Resisted_Cement = Request::get('resisted_cement');
            $review->Eng_Cement = Request::get('eng_cement');
            $review->Saed_Cement = Request::get('saed_cement');       
            $review->Fanar_Cement = Request::get('fanar_cement');
            $review->Contractor_Id = $inputs['contractor_id'];  

            $review->Seller1 = Request::get('seller1'); 
            $review->Seller2 = Request::get('seller2');
            $review->Seller3 = Request::get('seller3');
            $review->Seller4 = Request::get('seller4');
            $review->Status = Request::get('status');
            $review->Call_Status = Request::get('call_status');
            $review->Area = Request::get('area');
            $review->Cont_Type=Request::get('cont_type');

            $review->save();
            return redirect('/reviews');
    }
}
    public function edit($id)
    { 
            // dd('hello edit');
            $contractors = Contractor::all();
            $review = Review::find($id); 
            return view('reviews.edit',compact('contractors','review'));      
    }

    public function update($id)
    {
        $inputs = Input :: all();  
        $review = Review::find($id);   
        $rules = array(
                'credit_debit'      => array('alpha'),
                'sub_contractor'    => array('alpha'),
                'GPS'               => array('alpha_num'),
                'project_no'        => array('Integer'),
                'cement_consuption' => array('Integer'),
                'cement_bricks'     => array('Integer'),
                'steel_consumption' => array('Integer'),
                'portland_cement'   => array('Integer'),
                'resisted_cement'   => array('Integer'),
                'eng_cement'        => array('Integer'),
                'saed_cement'       => array('Integer'),
                'fanar_cement'      => array('Integer'),
                'workers'           => array('Integer'),
                'wood_meters'       => array('Integer'),
                'wood_consumption'  => array('Integer'),
                'no_of_mixers'      => array('Integer'),
                'capital'           => array('Integer'), 
                'seller1'           => array('regex:/^[\pL\s]+$/u'),
                'seller2'           => array('regex:/^[\pL\s]+$/u'),
                'seller3'           => array('regex:/^[\pL\s]+$/u'),
                'seller4'           => array('regex:/^[\pL\s]+$/u'),

                'status'        => array('regex:/^[\pL\s]+$/u'),
                'call_status'   => array('regex:/^[\pL\s]+$/u'),
                'area'          => array('regex:/^[\pL\s]+$/u'),
                'cont_type'     => array('regex:/^[\pL\s]+$/u')
          
        );


         $messages = array(
                'Integer'       => 'برجاء ادخال الارقام صحيحة',
                'alpha'         => 'الرجاء ادخال الحروف',
                'seller1.regex' =>'أدخل الحروف صحيحة',
                'seller2.regex' =>'أدخل الحروف صحيحة',
                'seller3.regex' =>'أدخل الحروف صحيحة',
                'seller4.regex' =>'أدخل الحروف صحيحة',

                'status.regex'      =>'أدخل الحروف صحيحة',
                'call_status.regex' =>'أدخل الحروف صحيحة',
                'area.regex'        =>'أدخل الحروف صحيحة',
                'cont_type.regex'   =>'أدخل الحروف صحيحة',
    );

        $validation = Validator::make($inputs, $rules, $messages);   
        if ($validation->fails()) {          
            $errors = $validation->errors()->all();
            return redirect('reviews/'.$review->Review_Id.'/edit')
                    ->withErrors($validation)->withInput();
        }


        else {
                $input = request()->all();
                $review = Review::find($id);
// dd($review);
                $review->Long = Request::get('long');
                $review->Lat = Request::get('lat');
                $review->Has_Mixers = Request::get('has_mixers');
                $review->Has_Sub_Contractor = Request::get('has_sub_contractor');

                $review->Sub_Contractor1 = Request::get('sub_contractor1');
                $review->Sub_Contractor2 = Request::get('sub_contractor2');

                $review->Project_NO = Request::get('project_no');
                $review->Cement_Consuption = Request::get('cement_consuption');       
                $review->Cement_Bricks = Request::get('cement_bricks');
                $review->Steel_Consumption = Request::get('steel_consumption');        
                $review->Wood_Meters = Request::get('wood_meters'); 
                $review->Workers = Request::get('workers'); 
                $review->Wood_Consumption = Request::get('wood_consumption');
                $review->No_Of_Mixers = Request::get('no_of_mixers');
                $review->Capital = Request::get('capital');
                $review->Credit_Debit = Request::get('credit_debit');       

                $review->Portland_Cement = Request::get('portland_cement');
                $review->Resisted_Cement = Request::get('resisted_cement');
                $review->Eng_Cement = Request::get('eng_cement');
                $review->Saed_Cement = Request::get('saed_cement');       
                $review->Fanar_Cement = Request::get('fanar_cement');           
                $review->Contractor_Id = $input['contractor_id'];

                $review->Seller1 = Request::get('seller1'); 
                $review->Seller2 = Request::get('seller2');
                $review->Seller3 = Request::get('seller3');
                $review->Seller4 = Request::get('seller4');
                $review->Status = Request::get('status');
                $review->Call_Status = Request::get('call_status');
                $review->Area = Request::get('area');
                $review->Cont_Type=Request::get('cont_type');

                // dd(request()->all());
                // dd($review->Sub_Contractor1);
                $review->save();
                return redirect('/reviews');
            }

    }

    public function destroy($id)
    {
        $review = Review::find($id);
        $review->delete();
        return redirect('/reviews');
    }


}

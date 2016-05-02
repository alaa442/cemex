<?php
namespace App\Http\Controllers;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Contractor;
use App\Promoter;
use Request;
use Excel;
use Input;
use File;
use App\Review;
use Validator;
use DB;
use Illuminate\Support\Facades\Response;

class ContractorsController extends Controller
{
    public function PromoterByGov($gov){
         // dd($gov);
        $promoters=Promoter::where('Government','=',$gov) ->get();
        $options = array();
        foreach ($promoters as $promoter) {
            $options += array($promoter->Pormoter_Id => $promoter->Pormoter_Name);
        }
        return Response::json($options);
    }
    public function EditPromoterByGov($id,$gov){
         // dd($gov);
        $promoters=Promoter::where('Government','=',$gov) ->get();
        $options = array();
        foreach ($promoters as $promoter) {
            $options += array($promoter->Pormoter_Id => $promoter->Pormoter_Name);
        }
        return Response::json($options);
    }

    public function index()
    {
        $cities =  Contractor::lists('City', 'Contractor_Id');
        $id = 1;
        $contractor_cement = 0 ;
        $contractors = Contractor::all();

return view('contractors.index',compact('contractors','cities','contractor_cement'));
    }

    public function create()
    {
            $promoters = Promoter::all();
            $govs = DB::table('promoters')->select('Government as gov_name')
                                          ->groupBy('Government')->get();
            // dd($govs[0]->gov_name);
            return view('contractors.create',compact('promoters','govs'));        
    }

    public function importcontractor()
    {
    	// dd("ok");
        $contractors = Contractor::all();
        $importbtn= Request::get('submit'); 
         if(isset($importbtn))
        { 
            $filename = Input::file('file')->getClientOriginalName();
            // dd($filename);
            $Dpath = base_path();
            $upload_success =Input::file('file')->move( $Dpath, $filename);
        
        Excel::load($upload_success, function($reader)
            {       
                // $results = $reader->get()->first();
                $results = $reader->get()->toArray(); 
                foreach ($results[0] as $data)
                {

                $contractor =new Contractor();
                $contractor->Name = $data['name'];
                $contractor->Goverment = $data['goverment'];
                $contractor->City = $data['city'];
                $contractor->Address = $data['address'];
                $contractor->Education = $data['education'];
                $contractor->Class = $data['class'];
             $contractor->Facebook_Account = $data['facebook_account'];
             $contractor->Computer = $data['computer'];
             $contractor->Email = $data['email'];
             $contractor->Birthday =$data['birthday'];
             $contractor->Tele1 = $data['tele1'];
             $contractor->Tele2 =$data['tele2'];
             $contractor->Job = $data['job'];
             $contractor->Code=uniqid('Cont');
             $contractor->Phone_Type = $data['phone_type'];
             $contractor->Nickname =$data['nickname'];
             $contractor->Religion=$data['religion'];
             $contractor->Home_Phone= $data['home_phone'];
        if(isset($data['code'])){
            $Pormoter_Id= Promoter::where('Code',$data['code'])->pluck('Pormoter_Id')->first();
            $contractor->Pormoter_Id =$Pormoter_Id;
        }
        if(isset($data['tele1'])){
$Contractor_Id= Contractor::where('Tele1',$data['tele1'])->pluck('Contractor_Id')->first();}
$contractor->save();
        }
        });

            return redirect('/contractors');           
        } 
        
    } 


    public function expotcontractor()
    {
        $exportbtn=Request::get('export');
        if(isset($exportbtn))
        {    
        Excel::create('contractorfile', function($excel)
        {
            $excel->sheet('sheetname',function($sheet)
            {        
      $sheet->appendRow(1, array(
            'اسم المقاول','المركز','اللقب','المهنة','المحافظة','التعليم','اسم الشهرة ','الديانة ','تليفون 1','تليفون 2','التليفون الارضي ','العنوان','البريد الاليكتروني','هل يمتلك حساب فيسبوك','اسم حساب الفيسبوك',' نوع الهاتف','الكمبيوتر ','تاريخ الميلاد','اسم المندوب','الفئة','الكود'));
                $data=[];

                $contractors=Contractor::all();
                $review =Review::all();

          foreach ($contractors as $contractor)
           {
            array_push($data,array(
                $contractor->Name,
                $contractor->City,
                $contractor->Fame,
                $contractor->Job,
                $contractor->Goverment,
                $contractor->Education,
                $contractor->Nickname ,
                $contractor->Religion,
                $contractor->Tele1,
                $contractor->Tele2 ,
                $contractor->Home_Phone,
                $contractor->Address,
                $contractor->Email,
                $contractor->Has_Facebook,                               
                $contractor->Facebook_Account,
                $contractor->Phone_Type,
                $contractor->Computer,               
                $contractor->Birthday,           
                $contractor->getpromoter->Pormoter_Name,               
                $contractor->Class, 
                $contractor->Code,                                      
             ));        
        }  
    $sheet->fromArray($data, null, 'A2', false, false);
    }); })->download('xls');
    
    }
}

    public function store()
    {
    $inputs = Input :: all();
    $messages = array(
        'name.regex'    =>'الرجاء ادخالا الاسم صحيح',
        'goverment.regex' =>'أدخل الحروف صحيحة',
        'city.regex'    =>'أدخل الحروف صحيحة',
        'address.regex' =>'أدخل الحروف صحيحة',
        'required'      => 'برجاء ادخال البيانات',
        'unique'        => 'هذه القيم موجودة بالفعل',
        'email'         =>'ادخل الايميل بطريقة صحيحة',
        'tele1.regex'   =>'أدخل رقم التليفون صحيح',
        'tele2.regex'   =>'أدخل رقم التليفون صحيح',
        'home_phone.regex'=>'أدخل رقم التليفون صحيح',
        'alpha'         => 'أدخل حروف فقط',
        'pormoter_id.required' =>'الرجاء ادخال اسم المندوب',
        'nickname.regex'=>'أدخل الحروف صحيحة',
        'religion.regex'=>'أدخل الحروف صحيحة',
        'fame.regex'    =>'أدخل الحروف صحيحة',
        'tele2.different'=> 'هذه القيمه مكرره',
        'tele1.different'=> 'هذه القيمه مكرره',
        'home_phone.different'=> 'هذه القيمه مكرره',
        'job.regex'=>'أدخل الحروف صحيحة',

    );

    $rules = array(
        'name'      => array('regex:/^(?:[\p{L}\p{Mn}\p{Pd}\'                               \x{2019}]+(?:$|\s+)){2,}/u','required'),
        'goverment' => array('regex:/^[\pL\s]+$/u'),
        'city'      => array('regex:/^[\pL\s]+$/u'),
        'address'   => array('regex:/^[\pL\s]+$/u'),
        'mail'      => array('email','unique:contractors,Email'),
        'birthday'  => array(
                    'regex:/^[0-9]{4}-(0[1-9]|1[0-2])-(0[1-9]|[1-2][0-9]|3[0-1])$/'),
        'tele1' => array('required',
                         'regex:/^[0-9]{10,11}$/',
                         'unique:contractors',
                         'different:tele2',
                         'different:home_phone'),
        'tele2' => array('regex:/^[0-9]{10,11}$/',
                         'unique:contractors',
                         'different:Tele1',
                         'different:home_phone'
                         ),
        'home_phone'=>array(
                            'regex:/^[0-9]{9,11}$/',
                            'unique:contractors',
                            'different:tele2',
                            'different:tele1'
                            ),  
        'pormoter_id' => array('required'),
        'job'       => array('regex:/^[\pL\s]+$/u'),
        'nickname'  => array('regex:/^[\pL\s]+$/u'),
        'religion'  => array('regex:/^[\pL\s]+$/u'),
        'fame'      => array('regex:/^[\pL\s]+$/u')
     );

$validator = Validator::make(Input::all(), $rules,$messages);
    if ($validator->fails()) {
        return redirect('/contractors/create')
                        ->withErrors($validator)->withInput();
    }
        
    else {   
            $contractor = new Contractor;
            $contractor->Name = Request::get('name');
            $contractor->Goverment = Request::get('goverment');
            $contractor->City = Request::get('city');
            $contractor->Address = Request::get('address');
            $contractor->Education = Request::get('education');
            $contractor->Facebook_Account = Request::get('facebook');
            $contractor->Computer = Request::get('computer');            
            $contractor->Has_Facebook = Request::get('has_facebook');
            $contractor->Email = Request::get('mail');
            $contractor->Birthday = Request::get('birthday');
            $contractor->Tele1 = Request::get('tele1');
            $contractor->Tele2 = Request::get('tele2');
            $contractor->Job = Request::get('job');
            $contractor->Class = Request::get('class');            
            $contractor->Pormoter_Id = Request::get('pormoter_id');
            $contractor->Phone_Type = Request::get('phone_type');
            $contractor->Nickname = Request::get('nickname');
            $contractor->Religion=Request::get('religion');
            $contractor->Home_Phone=Request::get('home_phone');
            $contractor->Fame=Request::get('fame');
            $contractor->Code=uniqid('Cont');
            $contractor->save();
            return redirect('/contractors');          
        }
}
    public function show($id)
    {
            $contractor = Contractor::findOrFail($id);
            return view('contractors.show',compact('contractor'));
        
    }

    public function edit($id)
    { 
            $promoters = Promoter::all();
            $contractor = Contractor::find($id);
            $govs = DB::table('promoters')->select('Government as gov_name')
                                          ->groupBy('Government')->get();
            return view('contractors.edit',compact('contractor','promoters','govs'));
        
    }

    public function update($id)
    {
        $inputs = Input :: all();
        $contractor = Contractor::find($id);

        $rules = array(
        'name'      => array('regex:/^(?:[\p{L}\p{Mn}\p{Pd}\'                               \x{2019}]+(?:$|\s+)){2,}/u','required'),
        'goverment' => array('regex:/^[\pL\s]+$/u'),
        'city'      => array('regex:/^[\pL\s]+$/u'),
        'address'   => array('regex:/^[\pL\s]+$/u'),
        'mail'      => array('email'),
        'birthday'  => array(
                    'regex:/^[0-9]{4}-(0[1-9]|1[0-2])-(0[1-9]|[1-2][0-9]|3[0-1])$/'),
    'tele1' => array('required',
                         'regex:/^[0-9]{11}$/'),
    'tele2' => array('regex:/^[0-9]{11}$/','different:Tele1','different:home_phone'),
'home_phone'=>array('regex:/^[0-9]{9,11}$/','different:tele2','different:tele1'),  
        'pormoter_id' => array('required'),
        'job'       => array('regex:/^[\pL\s]+$/u'),
        'nickname'  => array('regex:/^[\pL\s]+$/u'),
        'religion'  => array('regex:/^[\pL\s]+$/u'),
        'fame'      => array('regex:/^[\pL\s]+$/u')
        );
        
         $messages = array(
            'name.regex' =>'الرجاء ادخالا الاسم صحيح',
            'goverment.regex' =>'أدخل الحروف صحيحة',
            'city.regex' =>'أدخل الحروف صحيحة',
            'address.regex' =>'أدخل الحروف صحيحة',
            'required'      => 'برجاء ادخال البيانات',
            'unique'        => 'هذه القيم موجودة بالفعل',
            'email'         =>'ادخل الايميل بطريقة صحيحة',
            'tele1.regex'   =>'أدخل رقم التليفون صحيح',
            'tele2.regex'   =>'أدخل رقم التليفون صحيح',
            'home_phone.regex'=>'أدخل رقم التليفون صحيح',
            'alpha'         => 'أدخل حروف فقط',
            'job.regex'     =>'أدخل الحروف صحيحة',
            'pormoter_id.required' =>'الرجاء ادخال اسم المندوب',
            'nickname.regex'=>'أدخل الحروف صحيحة',
            'religion.regex'=>'أدخل الحروف صحيحة',
            'fame.regex'    =>'أدخل الحروف صحيحة',
            'tele2.different'=> 'هذه القيمه مكرره',
            'home_phone.different'=> 'هذه القيمه مكرره',
        );

        

        $validation = Validator::make($inputs,$rules,$messages);
        if ($validation->fails()) {    
            return redirect('contractors/'.$contractor->Contractor_Id.'/edit')
                        ->withErrors($validation)
                        ->withInput();
        }
        
        else {
            $contractor = Contractor::find($id);
            $contractor->Name = Request::get('name');
            $contractor->Goverment = Request::get('goverment');
            $contractor->City = Request::get('city');
            $contractor->Address = Request::get('address');
            $contractor->Education = Request::get('education');           
            $contractor->Has_Facebook = Request::get('has_facebook');
            $contractor->Facebook_Account = Request::get('facebook');
            $contractor->Computer = Request::get('computer');
            $contractor->Email = Request::get('mail');
            $contractor->Birthday = Request::get('birthday');
            $contractor->Tele1 = Request::get('tele1');
            $contractor->Tele2 = Request::get('tele2');
            $contractor->Job = Request::get('job');
            $contractor->Class = Request::get('class');
            $contractor->Pormoter_Id = Request::get('pormoter_id');
            $contractor->Phone_Type = Request::get('phone_type');
            $contractor->Nickname = Request::get('nickname');
            $contractor->Religion=Request::get('religion');
            $contractor->Home_Phone=Request::get('home_phone');
            $contractor->Fame=Request::get('fame');

            $contractor->save();
            return redirect('/contractors');
        }

    }

    public function destroy($id)
    {
        $contractor = Contractor::find($id);
        $contractor->delete();
        return redirect('/contractors');
    }


}
 

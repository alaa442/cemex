<?php
namespace App\Http\Controllers;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Promoter;
use Request;
use Excel;
use Input;
use File;
use Validator;
use DB;
use Symfony\Component\Debug\Exception\FatalThrowableError;
use Datatables;
use Illuminate\View\Middleware\ErrorBinder;
use Exception;


class PromotersController extends Controller
{
    /**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index(Request $request)
	{
try {
  $promoters = Promoter::all();


	return view('promoters.index',compact('promoters'));
}
	catch(Exception $e)	
	{
		return redirect('/');
	}
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
public function store(Request $request)
 {  


       $rules = array(
         'Pormoter_Name' => array('required','regex:/^(?:[\p{L}\p{Mn}\p{Pd}\'\x{2019}]+(?:$|\s+)){2,}/u'),
        'TelephonNo' => array('required','regex:/^[0-9]*$/','between:7,11','unique:promoters,TelephonNo'),
        'Email' => array('required','email','unique:promoters,Email'),
        'User_Name' => array('required','unique:promoters,User_Name'),
        'Password' => array('required','unique:promoters,Password'),
        'Start_Date'=>array('date'),
        'Salary'=>array('regex:/^(.*[^0-9]|)(1000|[1-9]\d{0,2})([^0-9].*|)$/'),
       'Experince'=>array('regex:/^(.*[^0-9]|)(1000|[1-9]\d{0,2})([^0-9].*|)$/'),
        'City'=>array('alpha','regex:/^(?:[\p{L}\p{Mn}\p{Pd}\'\x{2019}]+(?:$|\s+))/u'),
         'Government'=>array('alpha','regex:/^(?:[\p{L}\p{Mn}\p{Pd}\'\x{2019}]+(?:$|\s+))/u')

     );

       	$messages = array(
    'required' => 'برجاء ادخال البيانات',
    'unique'=> 'هذه القيم موجودة',
    'digits_between'=>'ادخل الرقم الصحيح',
    'email'=>'ادخل الايميل بطريقة صحيحة',
    'string'=>'ادخل القيم الصحيحة بدون أرقام',
    'between'=>'ادخل الرقم الصحيح',
    'integer'=>'ادخل ارقام فقط',
   'digits'=>'ادخل ارقام فقط',
      'min'=>'ادخل قيم صحيحة',
    //'max'=>'ادخلf قيم صحيحة',
     'numeric'=>'ادخل ارقام فقط',
     'regex'=>'ادخل حروف فقط',
     'TelephonNo.regex'=>'أدخل ارقام فقط',
     'Experince.regex'=>'أدخل ارقام فقط',
       'Salary.regex'=>'ادخل ارقام فقط',
        'Start_Date'=>'دخل تاريخ فقط',
     'alpha'=> 'أدخل حروف فقط'
);
$validator = Validator::make(Input::all(),$rules,$messages);
if ($validator->fails()) {
	// $messages = $validator->messages();
	// return $messages;
	 return redirect('/promoters/create')->withErrors($validator)->withInput();
}

       	else
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
		$promoters->Code=uniqid('Pro');
	    $promoters->Experince=Request::get('Experince');
	      $promoters->Start_Date=Request::get('Start_Date');
          $promoters->Salary=Request::get('Salary');

		$promoters->save();


     return redirect('/promoters'); 
		
	}
}


	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($Pormoter_Id)
	{  
	try
	{ $promoters=Promoter::findOrFail($Pormoter_Id);
	
		return view('promoters.show',compact('promoters'));
	}
	catch(Exception $e)
{  return redirect('/promoters'); }


	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)

	{  
		try
		{
			$promoters=Promoter::find($id);
		    return view('promoters.edit',compact('promoters'));
	}
	catch(Exception $e)
	{
		return redirect('/promoters');

	}
}
	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($Pormoter_Id)

	{ 
		try
		{
	 
		$promoters=Promoter::find($Pormoter_Id);
	

		$rules =array(
	//$promoters = $this->route('promoters');
			//'Pormoter_Id' => array('required','unique:promoters,Pormoter_Id'),
         'Pormoter_Name' => array('required','regex:/^(?:[\p{L}\p{Mn}\p{Pd}\'\x{2019}]+(?:$|\s+)){2,}/u'),
        'TelephonNo' => 'required|regex:/^[0-9]*$/|between:7,11|unique:promoters,TelephonNo,'.$promoters->Pormoter_Id.',Pormoter_Id',
        'Email' => 'required|email|unique:promoters,email,'.$promoters->Pormoter_Id.',Pormoter_Id',
        'User_Name' => array('required'),
        'Password' => array('required'),
        'Experince'=>('regex:/^(.*[^0-9]|)(1000|[1-9]\d{0,2})([^0-9].*|)$/'),
         'Salary'=>array('regex:/^(.*[^0-9]|)(1000|[1-9]\d{0,2})([^0-9].*|)$/'),
        'Start_Date'=>array('date'),
        'City'=>array('alpha','regex:/^(?:[\p{L}\p{Mn}\p{Pd}\'\x{2019}]+(?:$|\s+))/u'),
         'Government'=>array('alpha','regex:/^(?:[\p{L}\p{Mn}\p{Pd}\'\x{2019}]+(?:$|\s+))/u')

     );

       	$messages = array(
    'required' => 'برجاء ادخال البيانات',
    'unique'=> 'هذه القيم موجودة',
    'digits_between'=>'ادخل الرقم الصحيح',
    'email'=>'ادخل الايميل بطريقة صحيحة',
    'string'=>'ادخل القيم الصحيحة بدون أرقام',
    'between'=>'ادخل الرقم الصحيح',
    'integer'=>'ادخل ارقام فقط',
   'digits'=>'ادخل ارقام فقط',
      'min'=>'ادخل قيم صحيحة',
    //'max'=>'ادخلf قيم صحيحة',
     'numeric'=>'ادخل ارقام فقط',
     'regex'=>'ادخل حروف فقط',
     'TelephonNo.regex'=>'أدخل ارقام فقط',
     'Experince.regex'=>'أدخل ارقام فقط',
      'Salary.regex'=>'أدخل ارقام فقط',
      'date'=>'أدخل تاريخ',
     'alpha'=> 'أدخل حروف فقط'
);
  $validator = Validator::make(Input::all(),$rules,$messages);
if ($validator->fails()) {

	 return redirect('/promoters/'.$Pormoter_Id.'/edit')->withErrors($validator)->withInput();
}


	
		$promoters->Pormoter_Name =Request::get('Pormoter_Name');
		$promoters->TelephonNo =Request::get('TelephonNo');
		$promoters->User_Name =Request::get('User_Name');
		$promoters->Password =Request::get('Password');
		$promoters->Instegram_Account =Request::get('Instegram_Account');
		$promoters->Facebook_Account =Request::get('Facebook_Account');
		$promoters->Email =Request::get('Email');
		$promoters->City =Request::get('City');
		$promoters->Government =Request::get('Government');
		$promoters->Code=Request::get('Code');
	    $promoters->Experince=Request::get('Experince');
	    $promoters->Start_Date=Request::get('Start_Date');
	    $promoters->Salary=Request::get('Salary');
		$promoters->save();
		return redirect('/promoters');

}
catch (Exception $e)
{
	
	return redirect('/promoters');

}
}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		try
		{ $promoters=Promoter::find($id);
		$promoters->delete();
		return redirect('/promoters');
	}
	catch(Exception $e)
	{
			return redirect('/promoters');

	}
		
	}
	public function importpromoters()
	{

		$temp= Request::get('submit'); 
   		if(isset($temp))
 		{ 
   			$filename = Input::file('file')->getClientOriginalName();
     		$Dpath = base_path();
     		$upload_success =Input::file('file')->move( $Dpath, $filename);
       Excel::load($upload_success, function($reader)
       {   
    	$results = $reader->get()->toArray();
    	// dd($results);
       	foreach ($results[0] as $data)
        {
        	// dd($data);
	        $promoters =new Promoter();
	        $promoters->Pormoter_Name =$data['pormoter_name'];
			$promoters->TelephonNo =$data['telephonno'];
			$promoters->User_Name =$data['user_name'];
			$promoters->Password =$data['password'];
			$promoters->Instegram_Account =$data['instegram_account'];
			$promoters->Facebook_Account =$data['facebook_account'];
			$promoters->Email =$data['email'];
			$promoters->City =$data['city'];
			$promoters->Code=uniqid('Pro');
		    $promoters->Experince=$data['experince'];
			$promoters->Government =$data['government'];
			$promoters->Start_Date =$data['start_date'];
			$promoters->Salary =$data['salary'];
		    $promoters->save();
        }  
    	});
	}
	return redirect('/promoters'); 
   
}
public function exportpromoters()
{
	try {

  $exportbtn= Request::get('export'); 

   	if(isset($exportbtn))
   	{ 
   	
   		Excel::create('promoterfile', function($excel)
   		 { 

   			$excel->sheet('sheetname',function($sheet)
   			{        

   				$sheet->appendRow(1, array(
                'أسم المندوب', 'رقم التليفون','المحافظة','المركز','البريد الاكترونى	','حساب الفيسبوك','حساب الانستجرام	','أسم النستخدم	','الرقم السرى','الكود','عدد سنين الخبرة'
));
   				$data=[];

  $promoters=Promoter::all();

  foreach ($promoters as $promoter) {

  	array_push($data,array(

  		$promoter->Pormoter_Name,
  		$promoter->TelephonNo,
  		$promoter->Government,
  		$promoter->City,
  		$promoter->Email,
  		$promoter->Facebook_Account,
  		$promoter->Instegram_Account,
  		$promoter->User_Name,
  	    $promoter->Password,
  	    $promoter->Code,
	    $promoter->Experince,
	    $promoter->Start_Date,
	     $promoter->Salary,

  		
  	
 
  		

  		));
  	

  	
  	}	
  $sheet->fromArray($data, null, 'A2', false, false);
});
})->download('xls');
   	}
}
     	catch(Exception $e)
{
	 return redirect('/promoters'); 
} 
}


 
   
}

?>
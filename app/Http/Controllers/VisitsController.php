<?php

namespace App\Http\Controllers;



use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Visit;
use App\Promoter;
use App\Contractor;
use Request;
use Excel;
use Input;
use File;
use Validator;
use DB;
use Exception;
use Response;
use Carbon;
use Session;
use Flash;


class VisitsController extends Controller
{
	

	public function index()
	{
	   
	    $visits = Visit::all();
		
		return view('visits.index',compact('visits'));
		
}

	
  
	public function create()
	{ 
		//try
		//{
	$promoters = Promoter::all();
	 $contractors=Contractor::all();

	
		return view('visits.create',compact('contractors','promoters'));
	//}
//catch (Exception $e)
//{ return redirect('/visits');
//}
}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{ 
		
	 $input = request()->all();
    $rules = array(
    	//'Pormoter_Id' => 'required|exists:promoters,Pormoter_Id'.$input['Pormoter_Id'],
  //  'Contractor_Id' => 'required|exists:promoters,Pormoter_Id,Contractor_Id,'.$input['Contractor_Id'],

         'Date_Visit_Call' => array('required','date'),
        'OrderNo' => array('regex:/^(.*[^0-9]|)(1000|[1-9]\d{0,2})([^0-9].*|)$/'),
         'Points'=>array('regex:/^(.*[^0-9]|)(1000|[1-9]\d{0,2})([^0-9].*|)$/'),
       'Cement_Quantity' => array('regex:/^(.*[^0-9]|)(1000|[1-9]\d{0,2})([^0-9].*|)$/','min:0'),
        'Pormoter_Id'   => array('required','not_in:0'),
        'Contractor_Id'   => array('required','not_in:0'),
        'Government'  => array('not_in:0')
     //  'Cement_Type' => "required|in:أسمنت الفهد,أسمنت الفهد 2,أسمنت الصعيدى,أسمت العادى,أسمنت المهندس,سمنت الفنار,أسمنت المهندس,أسمنت الفنار,أسمنت المقاوم,الجبس,لا يوجد",
         //'Government'=>array('alpha','regex:/^(?:[\p{L}\p{Mn}\p{Pd}\'\x{2019}]+(?:$|\s+))/u')

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
     'OrderNo.regex'=>'أدخل ارقام فقط',
     'Points.regex'=>'أدخل ارقام فقط',
     'Cement_Quantity.regex'=>'أدخل ارقام فقط',
     'Government.regex'=>'أدخل حروف فقط',
     'date'=>'أدخل تاريخ ',
     'alpha'=> 'أدخل حروف فقط',
     'not_in'=>'أختار قيمة',
     'in'=>'أختار قيمة'

);
$validator = Validator::make(Input::all(),$rules,$messages);
if ($validator->fails()) {
	// $messages = $validator->messages();
	// return $messages;
	 return redirect('/visits/create')->withErrors($validator)->withInput();
}

       	else

       	{  



        
	

     	 $Pormoter_Id=$input['Pormoter_Id'];
        $Contractor_Id=$input['Contractor_Id'];
		$Date_Visit_Call=$input['Date_Visit_Call'];
          $Visit_Reason=$input['Visit_Reason'];
		
       $tdt = Carbon::now()->startOfMonth()->format('Y-m-d');
     $fdt = Carbon::now()->format('Y-m-d');
     $range=array($tdt, $fdt);



             $results = DB::table('visits')
             ->select( DB::raw('count(*) as total'))
             ->where('Pormoter_Id','=',$Pormoter_Id)
            ->where('Visit_Reason','=',$Visit_Reason)
            ->where('Contractor_Id','=',$Contractor_Id)
            ->whereBetween('Date_Visit_Call',$range)
             //->groupBy('Visit_Reason')
             ->lists('total');
     // dd($results);
        $count=$results[0];
             //dd($count);
		if($count<3 && $Visit_Reason=="تسويق" && $count>=0) 
		{
		
		$visits= new Visit;
		
		$visits->Adress=Request::get('Adress');
		$visits->Backcheck =Request::get('Backcheck');
		$visits->Comments =Request::get('Comments');
		$visits->Cement_Type = Request::get('Cement_Type');
		$visits->Date_Visit_Call=Request::get('Date_Visit_Call');
		$visits->Government =Request::get('Government');
		$visits->GPS =Request::get('GPS');
		$visits->OrderNo =Request::get('OrderNo');
		$visits->Cement_Quantity =Request::get('Cement_Quantity');
		$visits->Points =Request::get('Points');
		$visits->Project_Type =Request::get ('Project_Type');
		$visits->Call_Reason =Request::get('Call_Reason');
		$visits->Visit_Reason =Request::get('Visit_Reason');
		$visits->Project_Current_State =Request::get('Project_Current_State');
		$visits->CV_Comments =Request::get('CV_Comments');
		$visits->Contractor_Id = $input['Contractor_Id'];
		$visits->Pormoter_Id = $input['Pormoter_Id'];
         $visits->save();
             	return redirect('/visits');
             }


     elseif( $Visit_Reason=="مبيعات"||$Visit_Reason=="أخرى")
             	{
            $visits= new Visit;
		
		$visits->Adress=Request::get('Adress');
		$visits->Backcheck =Request::get('Backcheck');
		$visits->Comments =Request::get('Comments');
		$visits->Cement_Type = Request::get('Cement_Type');
		$visits->Date_Visit_Call=Request::get('Date_Visit_Call');
		$visits->Government =Request::get('Government');
		$visits->GPS =Request::get('GPS');
		$visits->OrderNo =Request::get('OrderNo');
		$visits->Cement_Quantity =Request::get('Cement_Quantity');
		$visits->Points =Request::get('Points');
		$visits->Project_Type =Request::get ('Project_Type');
		$visits->Call_Reason =Request::get('Call_Reason');
		$visits->Visit_Reason =Request::get('Visit_Reason');
		$visits->Project_Current_State =Request::get('Project_Current_State');
		$visits->CV_Comments =Request::get('CV_Comments');
		$visits->Contractor_Id = $input['Contractor_Id'];
		$visits->Pormoter_Id = $input['Pormoter_Id'];
         $visits->save();
         return redirect('/visits');
             	}
             	else
             	{
          
             		return redirect('/error');
             	}

	
}
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
	
		return view('visits.show')->with('visits', $visits);

}
//catch (Exception $e)
//{ return redirect('/visits');
//}
	//}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)

	{
	
 $visits=Visit::find($id);
	

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
  $rules = array(

		 'Date_Visit_Call' => array('date'),
        'OrderNo' => array('regex:/^(.*[^0-9]|)(1000|[1-9]\d{0,2})([^0-9].*|)$/'),
        'Pormoter_Id'   => array('required','not_in:0'),
        'Contractor_Id'   => array('required','not_in:0'),
        'Government'  => array('not_in:أختر محافظة'),
      
       'Cement_Quantity' =>array('regex:/^(.*[^0-9]|)(1000|[1-9]\d{0,2})([^0-9].*|)$/'),
       'Points'=>array('regex:/^(.*[^0-9]|)(1000|[1-9]\d{0,2})([^0-9].*|)$/'),
     //'Cement_Type' => "required|in:أسمنت الفهد,أسمنت الفهد 2,أسمنت الصعيدى,أسمت العادى,أسمنت المهندس,سمنت الفنار,أسمنت المهندس,أسمنت الفنار,أسمنت المقاوم,الجبس,لا يوجد",
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
     'OrderNo.regex'=>'أدخل ارقام فقط',
     'Points.regex'=>'أدخل ارقام فقط',
     'Cement_Quantity.regex'=>'أدخل ارقام فقط',
     'date'=>'أدخل تاريخ ',
     'alpha'=> 'أدخل حروف فقط',
     'in'=>'أختار قيمة'
);
  $validator = Validator::make(Input::all(),$rules,$messages);
if ($validator->fails()) {

	 return redirect('/visits/'.$id.'/edit')->withErrors($validator)->withInput();
}


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
		$visits->Project_Type =Request::get ('Project_Type');
		$visits->Call_Reason =Request::get('Call_Reason');
		$visits->Visit_Reason =Request::get('Visit_Reason');
		$visits->Cement_Quantity =Request::get('Cement_Quantity');
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

public function importvisit()
{
	
	$temp= Request::get('submit'); 


if(isset($temp))

 { 


   $filename = Input::file('file')->getClientOriginalName();
     echo "$filename";

     $Dpath = base_path();


     $upload_success =Input::file('file')->move( $Dpath, $filename);
      echo" $upload_success";
       Excel::load($upload_success, function($reader)
       {   
       
       	    $results = $reader->get()->all();
      	    $line0 = $results[0];

//$headers = $line0->keys();
//echo dd($headers);
//var_dump($results);

       foreach ($results as $data)
        {
        var_dump($data);
        $visits =new Visit();
        $visits->Month =$data['month'];
		$visits->Date_Visit_Call =$data['date_visit_call'];
		$visits->Seller_Name =$data['seller_name'];
		$id= Contractor::where('Tele1',$data['tele1'])->pluck('Contractor_Id')->first();
        $visits->Contractor_Id =$id;
		$visits->Government =$data['government'];
		$visits->City =$data['city'];
		$visits->Project_Type =$data['project_type'];
		$visits->Adress =$data['adress'];
		$visits->GPS =$data['gps'];
		$visits->Visit_Reason =$data['visit_reason'];
		$visits->Call_Reason =$data['call_reason'];
		$visits->Project_Current_State=$data['project_current_state'];
	    $visits->Cement_Type=$data['cement_type'];
		$visits->Cement_Quantity =$data['cement_quantity'];
		$visits->Points =$data['points'];
		$visits->Backcheck =$data['backcheck'];
		$Pormoter_Id= Contractor::where('Contractor_Id',$id)->pluck('Pormoter_Id')->first();
		$visits->Pormoter_Id =$Pormoter_Id;
	    $visits->save();
        }
    });
}
        	return redirect('/visits');

   }



 public function exportvisit()
        {


try {

  $exportbtn=Request::get('export');

  if(isset($exportbtn))
   	{ 
   	
   		Excel::create('visitsfile', function($excel)
   		 {
   			$excel->sheet('sheetname',function($sheet)
   			{        

   				$sheet->appendRow(1, array('الشهر','تاريخ','أسم التاجر','الماتبعات اليومية','الملاحظات','نوع الاسمن','المركز','المحافظة'
                ,'GPS','نوع المقاول','أسم المندوب','رقم التليفون','رقم العضوية'
));
   				$data=[];

  $visits=Visit::all();

  foreach ($visits as $visit) {

  	array_push($data,array(
        $visit->Month ,
		$visit->Date_Visit_Call ,
		$visit->Seller_Name ,
  		$visit->Adress,
		$visit->Backcheck ,
		$visit->Comments,
		$visit->Cement_Type ,
		$visit->City,
		$visit->Government ,
		$visit->GPS ,
		$visit->OrderNo ,
		$visit->Cement_Quantity ,
		$visit->Points ,
		$visit->Project_Type ,
		$visit->Call_Reason ,
		$visit->Visit_Reason ,
		$visit->Project_Current_State ,
		$visit->CV_Comments,
  		$visit->getusername->Pormoter_Name,
         $visit->getcontractorproject->Name,
        $visit->getcontractorproject->Tele1,
        $visit->getcontractorproject->Phone,
       $visit->getcontractorproject->Intership_No,

  		));
  	

  	
  	}	
  $sheet->fromArray($data, null, 'A2', false, false);
});
})->download('xls');
   	}
        }
        catch (Exception $e)
{ return redirect('/visits');
}
}
public function promotersDropDownData($id)
    {
       
        $promoters=Promoter::where('Government','=',$id) ->get();

        $options = array();
      foreach ($promoters as $promoter) {
      $options += array($promoter->Pormoter_Id => $promoter->Pormoter_Name);
        }
     
        return Response::json($options);
    }
    public function contractorsDropDownData($id)
    {
       
        $contractors=Contractor::where('Pormoter_Id','=',$id) ->get();

        $options = array();
      foreach ($contractors as $contractor) {
      $options += array($contractor->Contractor_Id => $contractor->Name);
        }
     
        return Response::json($options);
    }
  
     
  
}
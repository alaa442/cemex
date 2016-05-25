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
use App\ReviewReport;
use Redirect;

class ReviewsController extends Controller
{
    public function index()
    {       
        $reviews = Review::all();
        return view('reviews.index',compact('reviews'));      
    }
    public function ReviewReport(){
        // dd('7aacad625bc364d');
        return view('reviews.report');
    }
    public function ReportResult(){
        $inputs=Input::all();
        // dd($inputs);
        $reviews=Review::where('Status','=',Request::get('status')) 
                        ->where('Call_Status','=',Request::get('call_status'))
                        ->get();
        // dd($reviews);
        ReviewReport::truncate();
        foreach ($reviews as $review) { 
            $ReportReview = new ReviewReport;                                     
            $ReportReview->Long = $review->Long;
            $ReportReview->Lat = $review->Lat;
            $ReportReview->Project_NO = $review->Project_NO;
            $ReportReview->Cement_Consuption = $review->Cement_Consuption;       
            $ReportReview->Cement_Bricks = $review->Cement_Bricks;
            $ReportReview->Steel_Consumption = $review->Steel_Consumption; 
            $ReportReview->Has_Mixers = $review->Has_Mixers;
            $ReportReview->Has_Wood = $review->Has_Wood;
            $ReportReview->Has_Sub_Contractor = $review->Has_Sub_Contractor;
            $ReportReview->Sub_Contractor1 = $review->Sub_Contractor1;
            $ReportReview->Sub_Contractor2 = $review->Sub_Contractor2;
            $ReportReview->Wood_Meters = $review->Wood_Meters;       
            $ReportReview->Wood_Consumption = $review->Wood_Consumption;
            $ReportReview->No_Of_Mixers = $review->No_Of_Mixers;
            $ReportReview->Capital = $review->Capital;
            $ReportReview->Credit_Debit = $review->Credit_Debit;       
            $ReportReview->Workers = $review->Workers;
            $ReportReview->Portland_Cement = $review->Portland_Cement;
            $ReportReview->Resisted_Cement = $review->Resisted_Cement;
            $ReportReview->Eng_Cement = $review->Eng_Cement;
            $ReportReview->Saed_Cement = $review->Saed_Cement;       
            $ReportReview->Fanar_Cement = $review->Fanar_Cement;
            $ReportReview->Contractor_Id = $review->Contractor_Id;  
            $ReportReview->Seller1 = $review->Seller1; 
            $ReportReview->Seller2 = $review->Seller2;
            $ReportReview->Seller3 = $review->Seller3;
            $ReportReview->Seller4 = $review->Seller4;
            $ReportReview->Status = $review->Status;
            $ReportReview->Call_Status = $review->Call_Status;
            $ReportReview->Area = $review->Area;
            $ReportReview->Cont_Type=$review->Cont_Type;

            $ReportReview->save();
        }

        return view('reviews.results', compact('reviews'));
    }

    public function ExportFilterReview(){
        $exportbtn=Request::get('export');
        if(isset($exportbtn))
        {    
        Excel::create('Review Report', function($excel)
        {
            $excel->sheet('sheetname',function($sheet)
            {  

            $sheet->appendRow(1, array(
            'STATUS','Call Status','Cons/Comp','المهنة','AREA','Gov','District','اللقب','الاسم رباعي','Education','اسم الشهرة','الديانة','موبايل (1)','موبايل (2)'
                ,'رقم تليفون ارضي','العنوان بالتفصيل','Long','Lat','البريد الالكتروني','Facebook','هل يمتلك هاتف ذكي','أسمنت أسيوط العادى','أسمنت المقاوم','أسمنت المهندس','أسمنت الصعيد','أسمنت الفنار','هل يمتلك كومبيوتر','تاريخ الميلاد','اسم تاجر الاسمنت (1)','اسم تاجر الاسمنت (2)','اسم تاجر الاسمنت (3)','اسم تاجر الاسمنت (4)','اسم المندوب','Avg. Sites/Month','Cement Consumption','Cement Bricks','Avg. Wood Consumption','Avg. Steel Consumption','Workers','Wood','Wood - Meters','Concrete Mixer','No. Of Mixers','Capital','Credit - Debit','Sub-Contractor','Class')); 
                
            $data=[];
            $contractors=Contractor::all();
            $reviews =ReviewReport::all();
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

    }
}

    public function TypesCharts(){
        // dd('TypesCharts');
        $reviews = Review::all();
        $CementReviews = array();
        for ($i=0; $i < count($reviews); $i++) { 
            $CementReviews[$i]['Portland_Cement']= $reviews[$i]['Portland_Cement'];
            $CementReviews[$i]['Eng_Cement']= $reviews[$i]['Eng_Cement'];
            $CementReviews[$i]['Saed_Cement']= $reviews[$i]['Saed_Cement'];
            $CementReviews[$i]['Resisted_Cement']= $reviews[$i]['Resisted_Cement'];
            $CementReviews[$i]['Fanar_Cement']= $reviews[$i]['Fanar_Cement'];
        }       
        // dd($reviews,$CementReviews);

        $TestType0 = array();
        $Type1 = array('Portland_Cement'=>0,'Eng_Cement'=>0,'Saed_Cement'=>0,'Resisted_Cement'=>0,'Fanar_Cement'=>0);
        $TestType1 = array();

        $Type2 = array('Portland_Cement'=>0,'Eng_Cement'=>0,'Saed_Cement'=>0,'Resisted_Cement'=>0,'Fanar_Cement'=>0);
        $TestType2 = array();

        $Type3 = array('Portland_Cement'=>0,'Eng_Cement'=>0,'Saed_Cement'=>0,'Resisted_Cement'=>0,'Fanar_Cement'=>0);
        $TestType3 = array();

        $Type4 = array('Portland_Cement'=>0,'Eng_Cement'=>0,'Saed_Cement'=>0,'Resisted_Cement'=>0,'Fanar_Cement'=>0);
        $TestType4 = array();

        $Type5 = array('Portland_Cement'=>0,'Eng_Cement'=>0,'Saed_Cement'=>0,'Resisted_Cement'=>0,'Fanar_Cement'=>0);
        $TestType5 = array();
$index1 = 0;
$index2 = 0;
$index3 = 0;
$index4 = 0;
$index5 = 0;
    for ($i=0; $i < count($CementReviews); $i++) { 
        if (count(array_filter($CementReviews[$i])) == 4) { //one null value
            $TestType1[$index1] = $CementReviews[$i];
            $index1+=1;
        }
        else if (count(array_filter($CementReviews[$i])) == 3) { //two null value
            $TestType2[$index2] = $CementReviews[$i];
            $index2+=1;
        }
        else if (count(array_filter($CementReviews[$i])) == 2) { //three null value
            $TestType3[$index3] = $CementReviews[$i];
            $index3+=1;
        }
        else if (count(array_filter($CementReviews[$i])) == 1) { //four null value
            $TestType4[$index4] = $CementReviews[$i];
            $index4+=1;
        }
        else if (count(array_filter($CementReviews[$i])) == 5) { //no null value
            $TestType5[$index5] = $CementReviews[$i];
            $index5+=1;
        }
    }
    // dd($TestType1,$TestType2,$TestType3,$TestType4,$TestType5);

    //full Type1 array count of two null values
        for ($i=0; $i < count($TestType1) ; $i++) { 
            if ($TestType1[$i]['Portland_Cement'] != null){
                $Type1['Portland_Cement'] +=1;
            }
            if($TestType1[$i]['Eng_Cement'] != null){
                $Type1['Eng_Cement'] +=1;
            }
            if ($TestType1[$i]['Saed_Cement'] != null) {
                $Type1['Saed_Cement'] +=1;
               
            }
            if ($TestType1[$i]['Resisted_Cement'] != null){
                $Type1['Resisted_Cement'] +=1;
            }
            if ($TestType1[$i]['Fanar_Cement'] != null){
                $Type1['Fanar_Cement'] +=1;
            }
        }
    // dd($TestType1, $Type1);

    //full Type2 array count of two null values
        for ($i=0; $i < count($TestType2) ; $i++) { 
            if ($TestType2[$i]['Portland_Cement'] != null){
                $Type2['Portland_Cement'] +=1;
            }
            if($TestType2[$i]['Eng_Cement'] != null){
                $Type2['Eng_Cement'] +=1;
            }
            if ($TestType2[$i]['Saed_Cement'] != null) {
                $Type2['Saed_Cement'] +=1;
               
            }
            if ($TestType2[$i]['Resisted_Cement'] != null){
                $Type2['Resisted_Cement'] +=1;
            }
            if ($TestType2[$i]['Fanar_Cement'] != null){
                $Type2['Fanar_Cement'] +=1;
            }
        }
    // dd($TestType2, $Type2);

    //full Type3 array count of two null values
        for ($i=0; $i < count($TestType3) ; $i++) { 
            if ($TestType3[$i]['Portland_Cement'] != null){
                $Type3['Portland_Cement'] +=1;
            }
            if($TestType3[$i]['Eng_Cement'] != null){
                $Type3['Eng_Cement'] +=1;
            }
            if ($TestType3[$i]['Saed_Cement'] != null) {
                $Type3['Saed_Cement'] +=1;
               
            }
            if ($TestType3[$i]['Resisted_Cement'] != null){
                $Type3['Resisted_Cement'] +=1;
            }
            if ($TestType3[$i]['Fanar_Cement'] != null){
                $Type3['Fanar_Cement'] +=1;
            }
        }
    // dd($TestType3, $Type3);

    //full Type4 array count of two null values
         for ($i=0; $i < count($TestType4) ; $i++) { 
            if ($TestType4[$i]['Portland_Cement'] != null){
                $Type4['Portland_Cement'] +=1;
            }
            if($TestType4[$i]['Eng_Cement'] != null){
                $Type4['Eng_Cement'] +=1;
            }
            if ($TestType4[$i]['Saed_Cement'] != null) {
                $Type4['Saed_Cement'] +=1;
               
            }
            if ($TestType4[$i]['Resisted_Cement'] != null){
                $Type4['Resisted_Cement'] +=1;
            }
            if ($TestType4[$i]['Fanar_Cement'] != null){
                $Type4['Fanar_Cement'] +=1;
            }
        }
        // dd($TestType4, $Type4);

        //full Type5 array count of two null values
         for ($i=0; $i < count($TestType5) ; $i++) { 
            if ($TestType5[$i]['Portland_Cement'] != null){
                $Type5['Portland_Cement'] +=1;
            }
            if($TestType5[$i]['Eng_Cement'] != null){
                $Type5['Eng_Cement'] +=1;
            }
            if ($TestType5[$i]['Saed_Cement'] != null) {
                $Type5['Saed_Cement'] +=1;
               
            }
            if ($TestType5[$i]['Resisted_Cement'] != null){
                $Type5['Resisted_Cement'] +=1;
            }
            if ($TestType5[$i]['Fanar_Cement'] != null){
                $Type5['Fanar_Cement'] +=1;
            }
        }
        // dd($TestType5, $Type5);
        // dd($Type1,$Type2,$Type3,$Type4,$Type5);
        $stocksTable = \Lava::DataTable();
        $stocksTable->addStringColumn('Type');
        $stocksTable->addNumberColumn('Portland');
        $stocksTable->addNumberColumn('Eng');
        $stocksTable->addNumberColumn('Saed');
        $stocksTable->addNumberColumn('Resisted');
        $stocksTable->addNumberColumn('Fanar');

        $rowData=array();
        $a=array();

        array_push($rowData, 'Type1');
        array_push($rowData, $Type1['Portland_Cement'], $Type1['Eng_Cement'],$Type1['Saed_Cement'],
                             $Type1['Resisted_Cement'], $Type1['Fanar_Cement']);
        $stocksTable->addRow($rowData);
        $rowData=array();

        array_push($rowData, 'Type2');
        array_push($rowData, $Type2['Portland_Cement'], $Type2['Eng_Cement'],$Type2['Saed_Cement'],
                             $Type2['Resisted_Cement'], $Type2['Fanar_Cement']);
        $stocksTable->addRow($rowData);
        $rowData=array();

        array_push($rowData, 'Type3');
        array_push($rowData, $Type3['Portland_Cement'], $Type3['Eng_Cement'],$Type3['Saed_Cement'],
                             $Type3['Resisted_Cement'], $Type3['Fanar_Cement']);
        $stocksTable->addRow($rowData);
        $rowData=array();

        array_push($rowData, 'Type4');
        array_push($rowData, $Type4['Portland_Cement'], $Type4['Eng_Cement'],$Type4['Saed_Cement'],
                             $Type4['Resisted_Cement'], $Type4['Fanar_Cement']);
        $stocksTable->addRow($rowData);
        $rowData=array();

        array_push($rowData, 'Type5');
        array_push($rowData, $Type5['Portland_Cement'], $Type5['Eng_Cement'],$Type5['Saed_Cement'],
                             $Type5['Resisted_Cement'], $Type5['Fanar_Cement']);
        $stocksTable->addRow($rowData);
        $rowData=array();
 
// dd($stocksTable);
        $chart = \Lava::ColumnChart('MyStocks', $stocksTable,[
                'titleTextStyle' => [
                    'color'    => '#eb6b2c',
                    'fontSize' => 14,
                     
        ]]);


        //second chart
        $Quantity = array('Portland_Cement'=>0,'Eng_Cement'=>0,'Saed_Cement'=>0,'Resisted_Cement'=>0,'Fanar_Cement'=>0);
        for ($i=0; $i < count($CementReviews) ; $i++) { 
            if ($CementReviews[$i]['Portland_Cement'] != null){
                $Quantity['Portland_Cement'] +=1;
            }
            if($CementReviews[$i]['Eng_Cement'] != null){
                $Quantity['Eng_Cement'] +=1;
            }
            if ($CementReviews[$i]['Saed_Cement'] != null) {
                $Quantity['Saed_Cement'] +=1;
               
            }
            if ($CementReviews[$i]['Resisted_Cement'] != null){
                $Quantity['Resisted_Cement'] +=1;
            }
            if ($CementReviews[$i]['Fanar_Cement'] != null){
                $Quantity['Fanar_Cement'] +=1;
            }
        }


        $stocksTable1 = \Lava::DataTable();
        $stocksTable1->addStringColumn('Cement Type');
        $stocksTable1->addNumberColumn('Cement Quantity');

        $rowData1=array();
        array_push($rowData1, 'Portland_Cement');
        array_push($rowData1, $Quantity['Portland_Cement']);
        $stocksTable1->addRow($rowData1);

        $rowData1=array();
        array_push($rowData1, 'Eng_Cement');
        array_push($rowData1, $Quantity['Eng_Cement']);
        $stocksTable1->addRow($rowData1);

        $rowData1=array();
        array_push($rowData1, 'Saed_Cement');
        array_push($rowData1, $Quantity['Saed_Cement']);
        $stocksTable1->addRow($rowData1);

        $rowData1=array();
        array_push($rowData1, 'Resisted_Cement');
        array_push($rowData1, $Quantity['Resisted_Cement']);
        $stocksTable1->addRow($rowData1);

        $rowData1=array();
        array_push($rowData1, 'Fanar_Cement');
        array_push($rowData1, $Quantity['Fanar_Cement']);
        $stocksTable1->addRow($rowData1);

         $chart = \Lava::ColumnChart('MyStocks1', $stocksTable1,[
                'titleTextStyle' => [
                    'color'    => '#eb6b2c',
                    'fontSize' => 14,                    
        ]]);

        return view('reviews.CementCharts', compact('reviews'));
    }


    public function QuqntityCharts(){
        $reviews = Review::all();
        $CementReviews = array();
        for ($i=0; $i < count($reviews); $i++) { 
            $CementReviews[$i]['Portland_Cement']= $reviews[$i]['Portland_Cement'];
            $CementReviews[$i]['Eng_Cement']= $reviews[$i]['Eng_Cement'];
            $CementReviews[$i]['Saed_Cement']= $reviews[$i]['Saed_Cement'];
            $CementReviews[$i]['Resisted_Cement']= $reviews[$i]['Resisted_Cement'];
            $CementReviews[$i]['Fanar_Cement']= $reviews[$i]['Fanar_Cement'];
        } 
        $Quantity = array('Portland_Cement'=>0,'Eng_Cement'=>0,'Saed_Cement'=>0,'Resisted_Cement'=>0,'Fanar_Cement'=>0);
        for ($i=0; $i < count($CementReviews) ; $i++) { 
            if ($CementReviews[$i]['Portland_Cement'] != null){
                $Quantity['Portland_Cement'] +=1;
            }
            if($CementReviews[$i]['Eng_Cement'] != null){
                $Quantity['Eng_Cement'] +=1;
            }
            if ($CementReviews[$i]['Saed_Cement'] != null) {
                $Quantity['Saed_Cement'] +=1;
               
            }
            if ($CementReviews[$i]['Resisted_Cement'] != null){
                $Quantity['Resisted_Cement'] +=1;
            }
            if ($CementReviews[$i]['Fanar_Cement'] != null){
                $Quantity['Fanar_Cement'] +=1;
            }
        }
        // dd($CementReviews, $Quantity);
        $stocksTable = \Lava::DataTable();
        $stocksTable->addStringColumn('Cement Type');
        $stocksTable->addNumberColumn('Cement Quantity');

        $rowData=array();
        array_push($rowData, 'Portland_Cement');
        array_push($rowData, $Quantity['Portland_Cement']);
        $stocksTable->addRow($rowData);

        $rowData=array();
        array_push($rowData, 'Eng_Cement');
        array_push($rowData, $Quantity['Eng_Cement']);
        $stocksTable->addRow($rowData);

        $rowData=array();
        array_push($rowData, 'Saed_Cement');
        array_push($rowData, $Quantity['Saed_Cement']);
        $stocksTable->addRow($rowData);

        $rowData=array();
        array_push($rowData, 'Resisted_Cement');
        array_push($rowData, $Quantity['Resisted_Cement']);
        $stocksTable->addRow($rowData);


        $rowData=array();
        array_push($rowData, 'Fanar_Cement');
        array_push($rowData, $Quantity['Fanar_Cement']);
        $stocksTable->addRow($rowData);

         $chart = \Lava::ColumnChart('MyStocks', $stocksTable,[
                'titleTextStyle' => [
                    'color'    => '#eb6b2c',
                    'fontSize' => 14,
                     
        ]]);
         // dd($stocksTable);
        return view('reviews.QuantityCharts');
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
                $old_contractors = Contractor::all();
                $contractor =new Contractor();
                $contractor->Tele1 = $data['mobile1'];
                $Contractor_Id= Contractor::where('Tele1',$contractor->Tele1)
                                            ->pluck('Contractor_Id')->first();
                $old_contractors_tele = array();
                for ($i=0; $i < count($old_contractors) ; $i++) { 
                    $old_contractors_tele[$Contractor_Id] = $old_contractors[$i]->Tele1;
                    // $old_contractors_tele[$i]['Tele1'] = $old_contractors[$i]->Tele1;
                    // $old_contractors_tele[$i]['id'] = $old_contractors[$i]->Contractor_Id;
                }         
                // dd($old_contractors_tele, $contractor->Tele1);
                $key = array_search( $contractor->Tele1 , $old_contractors_tele) ;
                // dd( 'key:  ' ,$key);

    // for ($i=0; $i < count($old_contractors) ; $i++) { 
        // echo $i;
        
        if ($key) {
        // if ($contractor->Tele1 == $old_contractors_tele[$i]['Tele1']) { //contractor exists
                echo 'existtttttt';
            // $id = $old_contractors_tele[$key]['id'];
            $contractor = Contractor::find($Contractor_Id);
            $contractor->Name = $data['name'];
            $contractor->Goverment = $data['government'];
            $contractor->City = $data['city'];
            $contractor->Address = $data['address'];
            $contractor->Education = $data['education'];
            $contractor->Facebook_Account = $data['facebook'];
            $contractor->Computer = $data['computer'];
            $contractor->Email = $data['mail'];
            $contractor->Birthday =$data['birthday'];
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
        }  
            $contractor->save(); //update contractor

            if ($contractor->getreview) {  //if review exists
     // dd('has review', $contractor->Contractor_Id, $contractor->getreview->Review_Id);
                $review_id = $contractor->getreview->Review_Id;
                $review = Review::find($review_id);
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
            }  //end if review exists
            // else if(! $contractor->getreview) {   //else review doesn't exist
            //     $review = new Review;
            //     if(isset($data['mobile1'])){
            //         $Contractor_Id= Contractor::where('Tele1',$contractor->Tele1)
            //                         ->pluck('Contractor_Id')->first();
            //         $review->Contractor_Id = $Contractor_Id;
            //         //dd($review->Contractor_Id);
            //     } 
            //     $review->Long = $data['long'];
            //     $review->Lat = $data['lat'];
            //     $review->Project_NO = $data['project_no'];
            //     $review->Portland_Cement = $data['portland_cement'];
            //     $review->Resisted_Cement = $data['resisted_cement'];
            //     $review->Eng_Cement = $data['eng_cement'];
            //     $review->Saed_Cement = $data['saed_cement'];
            //     $review->Fanar_Cement = $data['fanar_cement'];
            //     $review->Workers =$data['workers'];
            //     $review->Cement_Consuption = $data['cement_consuption'];
            //     $review->Cement_Bricks =$data['cement_bricks'];
            //     $review->Steel_Consumption = $data['steel_consumption'];
            //     $review->Has_Wood = $data['has_wood'];
            //     $review->Wood_Meters =$data['wood_meters'];
            //     $review->Has_Mixers=$data['has_mixers'];
            //     $review->No_Of_Mixers= $data['no_of_mixers'];
            //     $review->Capital = $data['capital'];
            //     $review->Credit_Debit = $data['credit_debit'];
            //     $review->Has_Sub_Contractor =$data['has_sub_contractor'];
            //     $review->Seller1 =$data['seller1'];
            //     $review->Seller2 =$data['seller2'];
            //     $review->Seller3 =$data['seller3'];
            //     $review->Seller4 =$data['seller4'];
            //     $review->Status=$data['status'];
            //     $review->Call_Status= $data['call_status'];
            //     $review->Area=$data['area'];
            //     $review->Cont_Type= $data['cont_type']; 
            //     $review->save();
            // }

        } //end if contractor exists
    //     if(! $key){ //else contractor dosent exist
    //          echo 'NoooootExisttttttt';
    //         //save new contractor
    //         $newcontractor =new Contractor();
    //         $newcontractor->Name = $data['name'];
    //         $newcontractor->Goverment = $data['government'];
    //         $newcontractor->City = $data['city'];
    //         $newcontractor->Address = $data['address'];
    //         $newcontractor->Education = $data['education'];
    //         $newcontractor->Facebook_Account = $data['facebook'];
    //         $newcontractor->Computer = $data['computer'];
    //         $newcontractor->Email = $data['mail'];
    //         $newcontractor->Birthday =$data['birthday'];
    //         $newcontractor->Tele1 = $data['mobile1'];
    //         $newcontractor->Tele2 =$data['mobile2'];
    //         $newcontractor->Job = $data['job'];
    //         $newcontractor->Code=uniqid('Cont');
    //         $newcontractor->Phone_Type = $data['phone_type'];
    //         $newcontractor->Nickname =$data['nick_name'];
    //         $newcontractor->Religion=$data['religion'];
    //         $newcontractor->Class=$data['class'];
    //         $newcontractor->Home_Phone= $data['home_phone'];
    // if(isset($data['code'])){
    //     $Pormoter_Id= Promoter::where('Code',$data['code'])->pluck('Pormoter_Id')->first();
    //     $newcontractor->Pormoter_Id =$Pormoter_Id;
    // }
    //         $newcontractor->save();

    //         //save new contractor review
    //         $review = new Review;
    //             if(isset($data['mobile1'])){
    //                 $Contractor_Id= Contractor::where('Tele1',$contractor->Tele1)
    //                                 ->pluck('Contractor_Id')->first();
    //                 $review->Contractor_Id = $Contractor_Id;
    //                 //dd($review->Contractor_Id);
    //             } 
    //             $review->Long = $data['long'];
    //             $review->Lat = $data['lat'];
    //             $review->Project_NO = $data['project_no'];
    //             $review->Portland_Cement = $data['portland_cement'];
    //             $review->Resisted_Cement = $data['resisted_cement'];
    //             $review->Eng_Cement = $data['eng_cement'];
    //             $review->Saed_Cement = $data['saed_cement'];
    //             $review->Fanar_Cement = $data['fanar_cement'];
    //             $review->Workers =$data['workers'];
    //             $review->Cement_Consuption = $data['cement_consuption'];
    //             $review->Cement_Bricks =$data['cement_bricks'];
    //             $review->Steel_Consumption = $data['steel_consumption'];
    //             $review->Has_Wood = $data['has_wood'];
    //             $review->Wood_Meters =$data['wood_meters'];
    //             $review->Has_Mixers=$data['has_mixers'];
    //             $review->No_Of_Mixers= $data['no_of_mixers'];
    //             $review->Capital = $data['capital'];
    //             $review->Credit_Debit = $data['credit_debit'];
    //             $review->Has_Sub_Contractor =$data['has_sub_contractor'];
    //             $review->Seller1 =$data['seller1'];
    //             $review->Seller2 =$data['seller2'];
    //             $review->Seller3 =$data['seller3'];
    //             $review->Seller4 =$data['seller4'];
    //             $review->Status=$data['status'];
    //             $review->Call_Status= $data['call_status'];
    //             $review->Area=$data['area'];
    //             $review->Cont_Type= $data['cont_type']; 
    //             $review->save();

    //     }//end else contractor dosent exist
    // } //end foreach old contractors

    }//end foreach
        
    });  //end excel

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

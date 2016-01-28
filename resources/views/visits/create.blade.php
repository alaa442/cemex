@extends('master')

@section('content')
{!!Form::open(['route' => 'visits.store','method' => 'post'])!!}
رقم المسلسل 
<select id="Pormoter_Id" name="Pormoter_Id">
  @foreach($promoters as $promoter)
  <option value ="{{$promoter ->Pormoter_Id}}">{{$promoter ->Pormoter_Name}} </option>
    @endforeach
</select><br/>

رقم المقاول:
<select id="Contractor_Id" name="Contractor_Id">
  @foreach($contractors as $contractor)
  <option value ="{{$contractor ->Contractor_Id}}">{{$contractor ->Name}} </option>
    @endforeach
</select><br/>

المحافظة:
    <input type="text" name=" Government" ><br>

العنوان:
    <input type="text" name="Adress"><br>

GPS
    <input type="text" name=" GPS" ><br>
 
متابعات يومية:<br>
{!!Form::select('Backcheck', array('نعم' => 'نعم', 'لا' => 'لا','متكرر' => 'متكرر','رقم خطأ' => 'رقم خطأ','خطأ' => 'خطأ','أخرى' =>'أخرى'));!!}  

Comments
  <input type="text" name=" Comments" ><br>

Cement_Type
{!!Form::select('Cement_Type', array('أسمنت الفهد' => 'أسمنت الفهد', 'أسمنت الفهد 2' => 'أسمنت الفهد 2','أسمنت الصعيدى' => 'أسمنت الصعيدى','أسمت العادى' => 'أسمت العادى','أسمنت المهندس' => 'أسمنت المهندس','سمنت الفنار ' =>'سمنت الفنار ','أسمنت المقاوم' =>'أسمنت المقاوم','الجبس' =>'الجبس'));!!} </br> 

Date_Visit_Call
  <input type="date" name=" Date_Visit_Call" ><br><br> 
    
    
       OrderNo
        <input type="OrderNo" name=" OrderNo" ><br><br>
        Points
        <input type="text" name=" Points" ><br><br>
        Project_Type
<br>{!!Form::select('Cement_Type', array('تجارى' => 'تجارى', 'سكنى' => 'سكنى','سكنى تجارى' => 'سكنى تجارى','بنية تحتية' => 'بنية تحتية','مشاريع أخرى' => 'مشاريع أخرى'));!!} </br> 
Call_Reason
<br>{!!Form::select('Call_Reason', array('تسويق' => 'تسويق', 'أخرى' => 'اخرى'));!!} </br>          

Visit_Reason
<br>{!!Form::select('Visit_Reason', array('تسويق' => 'تسويق', 'مبيعات' => 'مبيعات','أخرى' => 'اخرى'));!!} </br>          
 CV_Comments <input type="text" name=" CV_Comments" ><br><br>
              <input type="submit" value="الحفظ">
  <script>  jQuery("#Backcheck").change(function() {
  
jQuery(document).ready(function() {
        if (jQuery(this).val() === 'أخرى'){ 
            jQuery('input[name=Comments]').show();   
        } else {
            jQuery('input[name=Comments]').hide(); 
        }
    });
});

 </script>
@stop
@extends('master')

@section('content')
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap-theme.min.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>

    
{!!Form::open(['route' =>[ 'visits.update',$visits->Visits_id],'method' => 'put'])!!}
المناديب 
<select id="Pormoter_Id" name="Pormoter_Id">
  @foreach($promoters as $promoter)
  <option value ="{{$promoter ->Pormoter_Id}}">{{$promoter ->Pormoter_Name}} </option>
    @endforeach
  </select>
  المقاول
  <select id="Contractor_Id" name="Contractor_Id">
  @foreach($contractors as $contractor)
  <option value ="{{$contractor ->Contractor_Id}}">{{$contractor ->Name}} </option>
    @endforeach
  </select>

       المحافظة<br>
      <input type="text" name=" Government" value="{{$visits->Government}}"><br><br>
      لمتابعة اليومية<br>
<br>{!!Form::select('Backcheck', array('نعم' => 'نعم', 'لا' => 'لا','متكرر' => 'متكرر','رقم خطأ' => 'رقم خطأ','خطأ' => 'خطأ','أخرى' =>'أخرى'));!!}  
      العنون<br>
  <input type="text" name="Adress" value="{{$visits->Adress}}"><br>
 
تعليقات عن المتابعة اليومية
  <input type="text" name=" Comments" value="{{$visits->Comments}}" ><br><br>
  نوع الاسمنت
<br>{!!Form::select('Cement_Type', array('أسمنت الفهد' => 'أسمنت الفهد', 'أسمنت الفهد 2' => 'أسمنت الفهد 2','أسمنت الصعيدى' => 'أسمنت الصعيدى','أسمت العادى' => 'أسمت العادى','أسمنت المهندس' => 'أسمنت المهندس','سمنت الفنار ' =>'سمنت الفنار ','أسمنت المقاوم' =>'أسمنت المقاوم','الجبس' =>'الجبس'));!!} </br> 

تاريخ الزيارة أو المكالمة
     <input type="date" name=" Date_Visit_Call" value="{{$visits->Date_Visit_Call}}"><br><br> 
     الحالة الحاية لمشروه
        <input type="text" name=" Project_Current_State" value="{{$visits->Project_Current_State}}"><br><br>
     GPS
        <input type="text" name=" GPS" value="{{$visits->GPS}}"><br><br>
       رقم الازردار
        <input type="OrderNo" name=" OrderNo" value="{{$visits->OrderNo}}" ><br><br>
        النقاط
        <input type="text" name=" Points" value="{{$visits->Points}}" ><br><br>
        نوع المشروع
<br>{!!Form::select('Project_Type', array('تجارى' => 'تجارى', 'سكنى' => 'سكنى','سكنى تجارى' => 'سكنى تجارى','بنية تحتية' => 'بنية تحتية','مشاريع أخرى' => 'مشاريع أخرى'));!!} </br> 
سبب المكالمة
<br>{!!Form::select('Call_Reason', array('تسويق' => 'تسويق', 'أخرى' => 'اخرى'));!!} </br>          

سبب لزيارة
<br>{!!Form::select('Visit_Reason', array('تسويق' => 'تسويق', 'مبيعات' => 'مبيعات','أخرى' => 'اخرى'));!!} </br>          
 تعليقات عن الزيارة او المكالمة <input type="text" name=" CV_Comments" value="{{$visits->CV_Comments}}"><br><br>
              <input type="submit" value="الحفظ">
  <script>  jQuery("#Backcheck").change(function() {
  

 </script>
@stop
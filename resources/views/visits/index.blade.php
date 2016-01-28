
@extends('master')

@section('content')
      <td><a href="/visits/create">
        أضافة </a></td>
  <table class="table" border="2">
    <tr>
    <td>Visits_id</td>
    <td>تعليقات عن المتابعات</td>
    <td>المتابعات اليومية</td>
      <td>المحافظة</td>
    <td>عنوان</td> 
    <td>نوع المشروع</td>
    <td>أنواع الاسمنت</td>

     <td>تاريخ الزيارة أو المكالمة</td>
   
      <td>GPS</td>
  
 
   <td> رقم الاوردار</td>
   <td>النقاط</td>
   <td>سبب المكالمة</td>
   <td>سبب الزيارة</td>
    <td>تعليقات عن الزيارة أو المكالمة</td>
    <td>حالة الحالية لمشروع</td>
    <td>كمية الاسمنت لمستخدمة</td>
 <td>تعليقات حول نوع المشروع</td>
    <td></td>



  </tr>
  <tbody>


    @foreach($visits as $visit)
    <tr>
    <td> {{$visit->Visits_id}}</td>
    <td>{{$visit->Comments}}</td>
     <td>{{$visit->Backcheck}}</td>
    <td>{{$visit->Government}}</td> 
     <td>{{$visit->Adress}}</td>
    <td>{{$visit->Project_Type}}</td> 
    <td>{{$visit->Cement_Type}}</td>
    <td>{{$visit->Date_Visit_Call}}</td>
    <td>{{$visit->GPS }}</td>
    <td>{{$visit->OrderNo }}</td>
    <td>{{$visit->Points }}</td>
    <td>{{$visit->Call_Reason}}</td> 
    <td>{{$visit->Visit_Reason}}</td>
    <td>{{$visit->CV_Comments}}</td>
    <td>{{$visit->Project_Current_State}}</td>
    <td>{{$visit->Cement_Quantity}}</td>
    <td>{{$visit->Project_Type_Comments}}</td>
    <td><a href="/visits/{{$visit->Visits_id}}">
      	أظهار </a></td>
        <td><a href="/visits/destroy/{{$visit->Visits_id}}">
        حذف </a></td>
           <td><a href="/visits/{{$visit->Visits_id}}/edit">
        تعديل </a></td></tb>
   


  </tr>
@endforeach
</tbody>
  </table>
</div>
@stop




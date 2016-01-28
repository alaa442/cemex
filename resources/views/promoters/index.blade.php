
@extends('master')

@section('content')
    <td><a href="/promoters/create">
        أضافة </a></td>
  <table class="table" border="2">
    <tr>
    <td>ID</td>
    <td>أسم المندوب</td> 
    <td>رقم التليفون</td>
    <td>المحافظة</td>
    	<td>المركز</td>
    		<td>البريد الاكترونى</td>
    		<td>حساب الفيسبوك</td>
    		<td>حساب الانستجرام</td>
    			<td>أسم النستخدم</td>
    			<td>الرقم السرى</td>
    			<td></td>

  </tr>
  <tbody>


    @foreach($promoters as $promoter)
    <tr>
    <td> {{$promoter->Pormoter_Id}}</td>
    <td>{{$promoter->Pormoter_Name}}</td> 
    <td>{{$promoter->TelephonNo}}</td>
    <td>{{$promoter->Government}}</td>
    <td>{{$promoter->City}}</td>
    <td>{{$promoter->Email}}</td>
    <td>{{$promoter->Facebook_Account}}</td>
    <td>{{$promoter->Instegram_Account}}</td>
    <td>{{$promoter->User_Name}}</td>
    <td>{{$promoter->Password}}</td>
      <td><a href="/promoters/{{$promoter->Pormoter_Id}}">
      	عرض </a></td>
       <td><a href="/promoters/destroy/{{$promoter->Pormoter_Id}}">
        حذف </a></td>
         <td><a href="/promoters/{{$promoter->Pormoter_Id}}/edit">
        تعديل </a></td>
</td>







<td></tb>








  </tr>
@endforeach
</tbody>

  </table>
</div>

@stop




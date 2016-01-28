@extends('master')

@section('content')
{!!Form::open(['route' => 'promoters.store','method' => 'post'])!!}
  أسم المندوب<br>
  <input type="text" name="Pormoter_Name"><br>
 رقم التليفون<br>
  <input type="text" name="TelephonNo" ><br><br>
أسم المستخدم
  <input type="text" name=" User_Name" ><br><br>
  الرقم السرى
   <input type="text" name=" Password" ><br><br>
    حساب الانستجرام  
     <input type="text" name=" Instegram_Account" ><br><br> 
      حساب الفيسبوك
      <input type="text" name=" Facebook_Account" ><br><br>
        البريد الاكترونى 
        <input type="text" name=" Email" ><br><br>
         المركز
        <input type="text" name=" City" ><br><br>
        المحافظة
        <input type="text" name=" Government" ><br><br>
  <input type="submit" value="الحفظ">
{!!Form::close() !!}

@stop
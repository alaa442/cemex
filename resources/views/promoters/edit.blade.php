@extends('master')

@section('content')
{!!Form::open(['route' =>[ 'promoters.update',$promoters->Pormoter_Id],'method' => 'put'])!!}
  أسم المندوب<br>
  <input type="text" name="Pormoter_Name" value="{{$promoters->Pormoter_Name}}"><br>
 رقم التليفون<br>
  <input type="text" name="TelephonNo" value="{{$promoters->TelephonNo}}"><br><br>
  أسم المستخدم
  <input type="text" name=" User_Name" value="{{$promoters->User_Name}}"><br><br>
  الرقم السرى
   <input type="password" name=" Password" value="{{$promoters->Password}}"><br><br>
   حساب الانستجرام  
     <input type="text" name=" Instegram_Account" value="{{$promoters->Instegram_Account}}"><br><br> 
     حساب الفيسبوك  
      <input type="text" name=" Facebook_Account" value="{{$promoters->Facebook_Account}}"><br><br>
      البريد الاكترونى  
        <input type="text" name=" Email" value="{{$promoters->Email}}"><br><br>
        المركز
        <input type="text" name=" City" value="{{$promoters->City}}"><br><br>
        المحافظة
        <input type="text" name=" Government" value="{{$promoters->Government}}" ><br><br>
  <input type="submit" value="Submit">
{!!Form::close() !!}

@stop
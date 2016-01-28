@extends('master')

@section('content')
<br/>
<table border="2">
	<tr>
		<td>رقم المسلسل</td>
		<td>{{ $admin->Admin_Id}}</td>
	</tr>

	<tr>
		<td>أسم الادمن</td>
		<td>{{$admin->Admin_Name}}</td>
	</tr>

	<tr>
		<td>اسم المستخدم</td>
		<td>{{$admin->User_Name}}</td>
	</tr>

	<tr>
		<td>كلمة المرور</td>
		<td>{{$admin->Password}}</td>
	</tr>

	

</table>
	 
	

@stop


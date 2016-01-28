@extends('master')

@section('content')

<a href="admins/create">اضافة ادمن</a> <br/>

<div class="row">
	
	<table class="table">
	    <tr>
	    	<td>رقم المسلسل</td>
		    <td>اسم الادمن</td>
		    <td>اسم المستخدم</td> 
		    <td>البريد الاليكتروني</td> 
		    <td>كلمة المرور</td>

		    <td>ملحوظات</td>

	  	</tr>

	  	@foreach($admins as $admin)
		    <tr>
			    <td>{{$admin->Admin_Id}}</td>
			    <td>{{$admin->Admin_Name}}</td>
			    <td>{{$admin->User_Name}}</td>
			    <td>{{$admin->Mail}}</td>
				<td>{{$admin->Password}}</td>

		  		<td> 
			    	<a href="/admins/{{$admin->Admin_Id}}">عرض</a>	
			    	<a href="/admins/{{$admin->Admin_Id}}/edit">تعديل</a>		    	
			    	<a href="/admins/destroy/{{$admin->Admin_Id}}">حذف</a>		    				    
			    </td>

		  	</tr>
		@endforeach

  	</table>
</div>
@stop

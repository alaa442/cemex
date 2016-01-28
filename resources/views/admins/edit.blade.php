@extends('master')

@section('content')
	
	{!! Form::open(['route'=> ['admins.update',$admin->Admin_Id ], 'method' => 'put']) !!}
	
	<!-- <form> -->
		أسم الادمن: 
			<input type="text" name="admin_name" placeholder="admin name" value="{{$admin->Admin_Name}}" /><br/>
		اسم المستخدم:
			<input type="text" name="user_name" placeholder="user name" value="{{$admin->User_Name}}" /><br/>
		كلمة المرور:
			<input type="password" name="password" value="{{$admin->Password}}" /><br/>
	
		<input type="submit" value="حفظ">

	<!-- </form>	 -->
	{!! Form::close() !!} 
@stop

 
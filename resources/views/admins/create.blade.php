@extends('master')

@section('content')
	<br/>
	{!! Form::open(['route'=>'admins.store', 'method' => 'post']) !!}
	
	<!-- <form> -->
		أسم الادمن: 
			<input type="text" name="admin_name" placeholder="admin name"required/><br/>
		اسم المستخدم:
			<input type="text" name="user_name" placeholder="user name" required/><br/>
		كلمة المرور:
			<input type="password" name="password" required/><br/>
	
		<input type="submit" value="حفظ">

	<!-- </form>	 -->
	{!! Form::close() !!} 
@stop


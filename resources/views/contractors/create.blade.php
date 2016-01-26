@extends('master')

@section('content')
	<br/>
	{!! Form::open(['route'=>'contractors.store', 'method' => 'post']) !!}
	
	<!-- <form> -->
		أسم المقاول: 
			<input type="text" name="name" id="name" placeholder="Contractor name" autofocus required/><br/>
		المحافظة:
			<input type="text" name="goverment" id="goverment" placeholder="Contractor goverment" required/><br/>
		المدينة:
			<input type="text" name="city" id="city" placeholder="Contractor city" required/><br/>
		العنوان:
			<input type="text" name="address" id="address" placeholder="Contractor address" required/><br/>
		التعليم:
			<select id="education" name="education">
				<option value="no_education">No Education</option>
				<option value="low_education">Low Education</option>
				<option value="medium_education">Medium Education</option>
				<option value="high">High Education</option>
			</select><br/>
		حساب الفيسبوك:
			<input type="text" name="facebook" id="facebook" placeholder="Contractor facebook"/><br/>
		الكمبيوتر:
			<select id="computer" name="computer">
				<option value="yes">نعم</option>
				<option value="no">لا</option>
			</select><br/>
		البريد الاليكتروني:
			<input type="email" name="mail" id="facebook" placeholder="mail..xx..@yahoo|gmail..com" /><br/>
		تاريخ الميلاد:
			<input type="date" name="birthday" id="birthday" /><br/>
		تليفون 1:
			<input type="text" name="tele1" id="tele1" pattern="[0-9]{5}" /><br/>
		تليفون 2:
			<input type="text" name="tele2" id="tele2" pattern="[0-9]{5}" /><br/>
		الوظيفة:
			<input type="text" name="job" id="job" placeholder="Contractor job" /><br/>
		الفئة:
			<select id="intership_no" name="intership_no">
				<option value="0">0</option>
				<option value="1">1</option>
				<option value="2">2</option>
				<option value="3">3</option>
				<option value="4">4</option>
				<option value="5">5</option>
				<option value="6">6</option>
				<option value="7">7</option>
			</select><br/>
		تاجر الاسمنت 1:
			<input type="text" name="seller1" id="seller1" placeholder="Contractor seller 1" /><br/>
		تاجر الاسمنت 2:
			<input type="text" name="seller2" id="seller2" placeholder="Contractor seller 2" /><br/>
		تاجر الاسمنت 3:
			<input type="text" name="seller3" id="seller3" placeholder="Contractor seller 3"/><br/>
		تاجر الاسمنت 4:
			<input type="text" name="seller4" id="seller4" placeholder="Contractor seller 4" /><br/>
		رقم المقاول:
			<select id="pormoter_id" name="pormoter_id">
				<option value="1">1</option>
			</select><br/>
		هاتف ذكي:
			<select id="phone_type" name="phone_type">
				<option value="yes">نعم</option>
				<option value="no">لا</option>
			</select><br/>
		اسم الشهرة:
			<input type="text" name="nickname" id="nickname" placeholder="Contractor nickname" /><br/>
	
		<input type="submit" value="حفظ">

	<!-- </form>	 -->
	{!! Form::close() !!} 
@stop


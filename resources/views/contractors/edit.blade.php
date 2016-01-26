@extends('master')

@section('content')
	
	{!! Form::open(['route'=> ['contractors.update',$contractor->Contractor_Id ], 'method' => 'put']) !!}
	
	<!-- <form> -->
		Name: 
			<input type="text" name="name" value="{{$contractor->Name}}" /><br/>
		Goverment:
			<input type="text" name="goverment" value="{{$contractor->Goverment}}" /><br/>
		City:
			<input type="text" name="city" value="{{$contractor->City}}" /><br/>
		Address:
			<input type="text" name="address" value="{{$contractor->Address}}" /><br/>
		Education:			
			<select id="education" name="education" value="{{$contractor->Education}}">
				<option value="no_education">No Education</option>
				<option value="low_education">Low Education</option>
				<option value="medium_education">Medium Education</option>
				<option value="high">High Education</option>
			</select><br/>
		Facebook_Account:
			<input type="text" name="facebook" value="{{$contractor->Facebook_Account}}" /><br/>
		Computer:
			<select id="computer" name="computer" value="{{$contractor->Computer}}">
				<option value="yes">نعم</option>
				<option value="no">لا</option>
			</select><br/>
		Email:
			<input type="email" name="mail" value="{{$contractor->Email}}"/><br/>
		Birthday:
			<input type="date" name="birthday" value="{{$contractor->Birthday}}"/><br/>
		Tele1:
			<input type="text" name="tele1" value="{{$contractor->Tele1}}"/><br/>
		Tele2:
			<input type="text" name="tele2" value="{{$contractor->Tele2}}"/><br/>
		Job:
			<input type="text" name="job" value="{{$contractor->Job}}"/><br/>
		Intership_No:
			<select id="intership_no" name="intership_no" value="{{$contractor->Intership_No}}" >
				<option value="0">0</option>
				<option value="1">1</option>
				<option value="2">2</option>
				<option value="3">3</option>
				<option value="4">4</option>
				<option value="5">5</option>
				<option value="6">6</option>
				<option value="7">7</option>
			</select><br/>
		Seller1:
			<input type="text" name="seller1" value="{{$contractor->Seller1}}"/><br/>
		Seller2:
			<input type="text" name="seller2" value="{{$contractor->Seller2}}" /><br/>
		Seller3:
			<input type="text" name="seller3" value="{{$contractor->Seller3}}"/><br/>
		Seller4:
			<input type="text" name="seller4" value="{{$contractor->Seller4}}"/><br/>
		Pormoter_Id:
			<select id="pormoter_id" name="pormoter_id" value="{{$contractor->Pormoter_Id}}">
				<option value="1">1</option>
			</select><br/>
		Phone_Type:
			<select id="phone_type" name="phone_type" value="{{$contractor->Phone_Type}}">
				<option value="yes">نعم</option>
				<option value="no">لا</option>
			</select><br/>
		Nickname:
			<input type="text" name="nickname" value="{{$contractor->Nickname}}"/><br/>
	
		<input type="submit" value="حفظ">

	<!-- </form>	 -->
	{!! Form::close() !!} 
@stop

 
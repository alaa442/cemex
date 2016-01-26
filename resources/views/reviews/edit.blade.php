@extends('master')

@section('content')
	
	{!! Form::open(['route'=> ['reviews.update',$review->Review_Id], 'method' => 'put']) !!}
	
	<!-- <form> -->
		GPS: 
			<input type="text" name="GPS"  value="{{ $review->GPS }}" /><br/>
		عدد المواقع:
			<input type="number" name="project_no" value="{{ $review->Project_NO }}"/><br/>
		المستهلك من الاسمنت:
			<input type="number" name="cement_consuption" value="{{ $review->Cement_Consuption }}" /><br/>
		الطوب الاسمنتي:
			<input type="number" name="cement_bricks" value="{{ $review->Cement_Bricks }}"/><br/>
		المستهلك من الحديد:
			<input type="number" id="steel_consumption" name="steel_consumption" value="{{ $review->Steel_Consumption }}"/><br/>
		امتار الخشب:
			<input type="number" id="wood_meters" name="wood_meters" value="{{ $review->Wood_Meters }}"/><br/>
		الهالك من الخشب:
			<input type="number" name="wood_consumption" id="wood_consumption" value="{{ $review->Wood_Consumption }}"/><br/>
		عدد الخلاطات:
			<input type="number" name="no_of_mixers" id="no_of_mixers" value="{{ $review->No_Of_Mixers }}"/><br/>
		رأس المال:
			<input type="number" name="capital" id="capital" value="{{ $review->Capital }}"/><br/>
		ظريقة الدفع:
			<input type="text" name="credit_debit" id="credit_debit" value="{{ $review->Credit_Debit }}"/><br/>
		مقاولين الباطن:
			<input type="text" name="sub_contractor" id="sub_contractor" value="{{ $review->Sub_Contractor }}"/><br/>
		الفئة:
			<select id="class" name="class" value="{{ $review->Class }}">
				<option value="0">0</option>
				<option value="1">1</option>
				<option value="2">2</option>
				<option value="3">3</option>
				<option value="4">4</option>
				<option value="5">5</option>
				<option value="6">6</option>
				<option value="7">7</option>
			</select><br/>
		
		<input type="submit" value="حفظ">
	<!-- </form>	 -->
	{!! Form::close() !!} 
@stop

 
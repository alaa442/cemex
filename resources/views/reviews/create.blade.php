@extends('master')

@section('content')
	<br/>
	{!! Form::open(['route'=>'reviews.store', 'method' => 'post']) !!}
	
	<!-- <form> -->
		اسم المقاول:
		<select id="contractor_id" name="contractor_id">
				@foreach($contractors as $contractor)
					<option value=" {{ $contractor->Contractor_Id }} "> {{ $contractor->Name }} </option>
				@endforeach
		</select><br/>

		GPS: 
			<input type="text" name="GPS" placeholder="GPS" autofocus/><br/>
		عدد المواقع:
			<input type="number" name="project_no" placeholder="Project NO"/><br/>
		المستهلك من الاسمنت:
			<input type="number" name="cement_consuption" placeholder="Cement Consuption"/><br/>
		الطوب الاسمنتي:
			<input type="number" name="cement_bricks" placeholder="Cement_Bricks"/><br/>
		المستهلك من الحديد:
			<input type="number" id="steel_consumption" name="steel_consumption" /><br/>
		امتار الخشب:
			<input type="number" id="wood_meters" name="wood_meters" /><br/>
		الهالك من الخشب:
			<input type="number" name="wood_consumption" id="wood_consumption" placeholder="wood consumption" /><br/>
		عدد الخلاطات:
			<input type="number" name="no_of_mixers" id="no_of_mixers" /><br/>
		رأس المال:
			<input type="number" name="capital" id="capital" /><br/>
		ظريقة الدفع:
			<input type="text" name="credit_debit" id="credit_debit" /><br/>
		مقاولين الباطن:
			<input type="text" name="sub_contractor" id="sub_contractor" placeholder="sub_contractor" /><br/>
		الفئة:
			<select id="class" name="class">
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


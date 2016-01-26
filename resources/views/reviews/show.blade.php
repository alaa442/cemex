@extends('master')

@section('content')
<br/>
<table border="2">
	<tr>
		<td>رقم المسلسل</td>
		<td>{{$review->Review_Id}}</td>
	</tr>
	<tr>
		<td>GPS</td> 
		<td>{{$review->GPS}}</td>
	</tr>
	<tr>
		<td>عدد المواقع</td>
		<td>{{$review->Project_NO}}</td>
	</tr>
	<tr>
		<td>المستهلك من الاسمنت</td>
		<td>{{$review->Cement_Consuption}}</td>
	</tr>
	<tr>
		<td>المستهلك من الحديد</td>
		<td>{{$review->Cement_Bricks}}</td>
	</tr>
	<tr>
		<td>المستهلك من الحديد</td>
		<td>{{$review->Steel_Consumption}}</td>
	</tr>
	<tr>
		<td>العمال</td>
		<td>{{$review->Workers}}</td>
	</tr>
	<tr>
		<td>امتار الخشب</td>
		<td>{{$review->Wood_Meters}}</td>
	</tr>
	<tr>
		<td>الهالك من الخشب</td>
		<td>{{$review->Wood_Consumption}}</td>
	</tr>
	<tr>
		<td>عدد الخلاطات</td>
		<td>{{$review->No_Of_Mixers}}</td>
	</tr>
	<tr>
		<td>رأس المال</td>
		<td>{{$review->Capital}}</td>
	</tr>
	<tr>
		<td>ظريقة الدفع</td>
		<td>{{$review->Credit_Debit}}</td>
	</tr>
	<tr>
		<td>مقاولين الباطن</td>
		<td>{{$review->Sub_Contractor}}</td>
	</tr>
	<tr>
		<td>الفئة</td>
		<td>{{$review->Class}}</td>
	</tr>



</table>
@stop
@extends('master')

@section('content')
<br/>
<table border="2">
	<tr>
		<td>رقم المسلسل</td>
		<td>{{ $contractor->Contractor_Id}}</td>
	</tr>

	<tr>
		<td>أسم المقاول</td>
		<td>{{$contractor->Name}}</td>
	</tr>

	<tr>
		<td>المحافظة</td>
		<td>{{$contractor->Goverment}}</td>
	</tr>

	<tr>
		<td>المدينة</td>
		<td>{{$contractor->City}}</td>
	</tr>

	<tr>
		<td>العنوان</td>
		<td>{{$contractor->Address}}</td>
	</tr>	

	<tr>
		<td>التعليم</td>
		<td>{{$contractor->Education}}</td>
	</tr>

	<tr>
		<td>حساب الفيسبوك</td>
		<td>{{$contractor->Facebook_Account}}</td>
	</tr>		    
			    
	<tr>
		<td>الكمبيوتر</td>
		<td>{{$contractor->Computer}}</td>
	</tr>		    
			    
	<tr>
		<td>البريد الاليكتروني</td>
		<td>{{$contractor->Email}}</td>
	</tr>	

	<tr>
		<td>تاريخ الميلاد</td>
		<td>{{$contractor->Birthday}}</td>
	</tr>		    
	
	<tr>
		<td>تليفون 1</td>
		<td>{{$contractor->Tele1}}</td>
	</tr>		    
			    
	<tr>
		<td>تليفون 2</td>
		<td>{{$contractor->Tele2}}</td>
	</tr>

	<tr>
		<td>الوظيفة</td>
		<td>{{$contractor->Job}}</td>
	</tr>			    

	<tr>
		<td>نوع العضوية</td>
		<td>{{$contractor->Intership_No}}</td>
	</tr>	
			    
	<tr>
		<td>نوع العضوية</td>
		<td>{{$contractor->Seller1}}</td>
	</tr>

	<tr>
		<td>تاجر الاسمنت 1</td>
		<td>{{$contractor->Seller2}}</td>
	</tr>	

	<tr>
		<td>تاجر الاسمنت 2</td>
		<td>{{$contractor->Seller3}}</td>
	</tr>		     
		
	<tr>
		<td>تاجر الاسمنت 3</td>
		<td>{{$contractor->Seller4}}</td>
	</tr>	    
			    
	<tr>
		<td>تاجر الاسمنت 4</td>
		<td>{{ $contractor->Pormoter_Id}}</td>
	</tr>		    
			    
	<tr>
		<td>رقم الامندوب</td>
		<td>{{ $contractor->Phone_Type}}</td>
	</tr>		    
			    
	<tr>
		<td>اسم الشهرة</td>
		<td>{{ $contractor->Nickname}}</td>
	</tr>		    
			    	

</table>
	 
	

@stop


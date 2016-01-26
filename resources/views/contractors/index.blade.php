@extends('master')

@section('content')

<br/><br/>

<div class="row">
<a href="contractors/create">اضافة مقاول</a>

<br/>
	<table class="table">
	    <tr>
		    <td>رقم المسلسل</td>
		    <td>أسم المقاول</td> 
		    <td>المحافظة</td>
		    <td>المدينة</td>
		    <td>العنوان</td>
		    <td>التعليم</td>
		    <td>حساب الفيسبوك</td>
		    <td>الكمبيوتر</td>
		    <td>البريد الاليكتروني</td>
		    <td>تاريخ الميلاد</td>

		    <td>تليفون 1 </td>
		    <td>تليفون 2 </td> 
		    <td>الوظيفة</td>
		    <td>نوع العضوية</td>
		    <td>تاجر الاسمنت 1</td>
		    <td>تاجر الاسمنت 2</td>
		    <td>تاجر الاسمنت 3</td>
		    <td>تاجر الاسمنت 4</td>
		    <td>رقم الامندوب</td>
		    <td>نوع الهاتف</td>
		    <td>اسم الشهرة</td>

		    <td>ملحوظات</td>

		    <td> another</td>
	  	</tr>

	  	@foreach($contractors as $contractor)
		    <tr>
			    <td>{{$contractor->Contractor_Id}}</td>
			    <td>{{$contractor->Name}}</td> 
			    <td>{{$contractor->Goverment}}</td>
			    <td>{{$contractor->City}}</td>
			    <td>{{$contractor->Address}}</td>
			    <td>{{$contractor->Education}}</td>
			    <td>{{$contractor->Facebook_Account}}</td>
			    <td>{{$contractor->Computer}}</td>
			    <td>{{$contractor->Email}}</td>
			    <td>{{$contractor->Birthday}}</td>

			    <td>{{$contractor->Tele1}}</td>
			    <td>{{$contractor->Tele2}}</td> 
			    <td>{{$contractor->Job}}</td>
			    <td>{{$contractor->Intership_No}}</td>
			    <td>{{$contractor->Seller1}}</td>
			    <td>{{$contractor->Seller2}}</td>
			    <td>{{$contractor->Seller3}}</td>
			    <td>{{$contractor->Seller4}}</td>
			    <td>{{$contractor->Pormoter_Id}}</td>
			    <td>{{$contractor->Phone_Type}}</td>			    
			    <td>{{$contractor->Nickname}}</td>

			    <td> 
			    	<a href="/contractors/{{$contractor->Contractor_Id}}">عرض</a>	
			    	<a href="/contractors/{{$contractor->Contractor_Id}}/edit">تعديل</a>		    	
			    	<a href="/contractors/destroy/{{$contractor->Contractor_Id}}">حذف</a>		    				    
			    </td>

			    <td>
			    	{{ $contractor->review->GPS }}
			    </td>
		  	</tr>
		@endforeach

  	</table>
</div>
@stop

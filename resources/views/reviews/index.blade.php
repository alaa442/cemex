@extends('master')

@section('content')
<a href="/reviews/create">اضافة بيانات</a>	
	<br/>
	<table border="2">
	    <tr>
		    <td>رقم المسلسل</td>
		    <td>GPS</td> 
		    <td>عدد المواقع</td>
		    <td>المستهلك من الاسمنت</td>
		    <td>الطوب الاسمنتي</td>
		    <td>المستهلك من الحديد</td>
		    <td>العمال</td>
		    <td>امتار الخشب</td>
		    <td>الهالك من الخشب</td>
		    <td>عدد الخلاطات</td>
		    <td>رأس المال</td>
		    <td>ظريقة الدفع</td>
		    <td>مقاولين الباطن</td>
		    <td>الفئة</td>

		    <td>ملاحظات</td>

		    <td>contractor name</td>

	  	</tr>

	  	@foreach($reviews as $review)
		    <tr>
			    <td>{{$review->Review_Id}}</td>
			    <td>{{$review->GPS}}</td> 
			    <td>{{$review->Project_NO}}</td>
			    <td>{{$review->Cement_Consuption}}</td>
			    <td>{{$review->Cement_Bricks}}</td>
			    <td>{{$review->Steel_Consumption}}</td>
			    <td>{{$review->Workers}}</td>
			    <td>{{$review->Wood_Meters}}</td>
			    <td>{{$review->Wood_Consumption}}</td>
			    <td>{{$review->No_Of_Mixers}}</td>
			    <td>{{$review->Capital}}</td>
			    <td>{{$review->Credit_Debit}}</td>
			    <td>{{$review->Sub_Contractor}}</td>
			    <td>{{$review->Class}}</td>

			    <td> 
			    	<a href="/reviews/{{$review->Review_Id}}">عرض</a>
			    	<a href="/reviews/{{$review->Review_Id}}/edit">تعديل</a>		    	
			    	<a href="/reviews/destroy/{{$review->Review_Id}}">حذف</a>		   	
			    </td>

			    <td>
			    	{{$review->getcontractor->Name}}
			    </td>
		  	</tr>
		@endforeach

  	</table>

@stop

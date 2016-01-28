@extends('master')
@section('content')
 <a href="/competitions/create" class="btn btn-primary"style="margin-bottom: 20px;">أضافه مسابقه جديده</a>
<table class="table table-hover">
<theah>
  <tr>
	<th>ID </th>
	<th>كود</th>
	<th>الأسم </th>
	<th>المده</th>
	<th>تاريخ البدء</th>
	<th>الجوائز المحدده </th>

	<th>العمليات</th>
  </tr>
  </theah>
  <tbody>
 	
@foreach($competitions as $item)
<tr>

	<td> {{$item->Competitions_Id}}</td>
	<td> {{$item->Code}} </td>
	<td> {{$item->Name}} </td>
	<td> {{$item->Period}}</td>
	<td> {{$item->Start_Date}} </td>
	 <td> 
	@foreach($item->awards as $items)
		 <span>{{$items->pivot->Total_Amount}} {{$items->Name}} .</span>
         

		
    @endforeach
    </td>

	        <td>
             
              <a href="/competitions/{{$item->Competitions_Id}}" class="btn btn-info"> عرض  </a>
              <a href="/competitions/{{$item->Competitions_Id}}/edit" class="btn btn-success">تعديل</a>
              <a href="/competitions/destroy/{{$item->Competitions_Id}}" class="btn btn-danger">حذف </a>



	          </td>
</tr>
@endforeach


</tbody>

</table>




<?php echo $competitions->render(); ?>

@stop

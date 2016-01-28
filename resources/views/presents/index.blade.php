@extends('master')
@section('content')
 <a href="/presents/create"  class="btn btn-primary" style="margin-bottom: 20px;">أضافه هديه</a>
<table class="table table-hover" >
<theah>
  <tr>
	<th>ID </th>
	<th>أسم المقاول </th>
	<th>المسابقه</th>
	<th>تاريخ التسليم</th>
	<th>الترتيب </th>
	<th>المده</th>
	<th>تاريخ بدء المسابقه</th>
	<th>الجوائز </th>

	<th>العمليات</th>
  </tr>
  </theah>
  <tbody>
 	
@foreach($present as $item)
<tr>

	<td> {{$item->Presents_Id}}</td>
	<td>{{$item->getcontractors->Name}}</td>
	<td>{{$item->getcompetitions->Name}}</td>
	<td> {{$item->Delivery_Date}}</td>
	<td> {{$item->Ranking}} </td>
	<td>{{$item->getcompetitions->Period}}</td>
	<td>{{$item->getcompetitions->Start_Date}}</td>
    <td>
	@foreach($item->getwards as $items)
		 <span>{{$items->pivot->Amount}} {{$items->Name}} .</span>
         

		
    @endforeach
    </td>

	        <td>
             
              <a href="/presents/{{$item->Presents_Id}}" class="btn btn-info"> عرض  </a>
              <a href="/presents/{{$item->Presents_Id}}/edit" class="btn btn-success">تعديل</a>
              <a href="/presents/destroy/{{$item->Presents_Id}}" class="btn btn-danger">حذف </a>



	          </td>
</tr>
@endforeach


</tbody>

</table>




<?php echo $present->render(); ?>

@stop

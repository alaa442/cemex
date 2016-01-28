@extends('master')
@section('content')
<a href="/awards/create" class="btn btn-primary">أضافه جائزه </a>
<table class="table table-hover">
<theah>
  <tr>
	<th>ID </th>
	<th>أسم الجائزه </th>
	<th>العمليات</th>
  </tr>
  </theah>
  <tbody>
 	
@foreach($awards as $award)
<tr>
	<td> {{$award->Awards_Id}}</td>
	<td> {{$award->Name}} </td>
	        <td>
              <a href="/awards/{{$award->Awards_Id}}" class="btn btn-info"> عرض  </a>
              <a href="/awards/{{$award->Awards_Id}}/edit" class="btn btn-success">تعديل</a>

              <a href="/awards/destroy/{{$award->Awards_Id}}" class="btn btn-danger">حذف </a>



	          </td>
</tr>
@endforeach

</tbody>
</table>

@stop

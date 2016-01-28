
@extends('master')
@section('content')
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js"></script>
<link href="http://cdnjs.cloudflare.com/ajax/libs/select2/4.0.0/css/select2.min.css" rel="stylesheet" />
<script src="http://cdnjs.cloudflare.com/ajax/libs/select2/4.0.0/js/select2.min.js"></script>

{!! Form::open(['route'=>'presents.store','method'=>'post']) !!}
<legend>أضافه هديه</legend>
<table class=" table form-group">
  <tr>
    <td> <label for="inputName" class="control-label">أسم المقاول</label></td>
 <td>{!!Form::select('contractor', $contractor ,null,['class'=>'form-control','id' => 'prettify'])!!}</td>
</tr>
<tr>
 <td> <label for="inputName" class="control-label">الترتيب</label></td>
 <td><input type="number" name="Ranking" class="form-control" id="inputName" placeholder="Enter Ranking" required></td>
</tr>
 <tr>
    <td> <label for="inputName" class="control-label">كود المسابقه</label></td>
 <td>{!!Form::select('competition', $competition ,null,['class'=>'form-control','id' => 'prettify'])!!}</td>
</tr>
<tr>
    <td>  <label for="inputName" class="control-label">تاريخ التسليم</label></td>
 <td><input type="date" name="Delivery_Date" class="form-control"  placeholder="Enter Delivery Date" required></td>
</tr>
</table>
<table class="table table-bordered table-hover">
<thead>
<th> No</th>
<th>Aأسم الجائزه</th>
<th>الكميه</th>
<th> <input type="button" class="btn btn-primary add" value="+"></th>
</thead>
<tbody class="body">
  <th class="no">1</th>
  <td>{!!Form::select('awards[]', $awards ,null,['class'=>'form-control','id' => 'prettify'])!!}</td>
   <td><input type="number" name="Amount[]" class="form-control" id="inputName" placeholder="Enter Amount" required></td>
   <td><a href="#" class="btn btn-danger delete">حذف</a></td>

</tbody>
</table>
  <div class="form-group">
    <button type="submit" class="btn btn-primary">حفظ</button>
  </div>
	{!!Form::close()!!}

<script type="text/javascript">
$(function(){

 var i=1;

 $( ".add" ).on( "click", function() {

  var n=($('.body  tr').length-0)+1;
  var tr=' <tr><th class="no">'+n+'</th>'+
  '<td>{!!Form::select('awards[]', $awards ,null,['class'=>'form-control','id' => 'prettify'])!!}</td>'+
  '<td><input type="number" name="Amount[]" class="form-control" id="inputName" placeholder="Enter Amount" required></td>'+
  ' <td><a href="#" class="btn btn-danger delete">Delete</a></td></tr>';
$('.body').append(tr);
i++;

});
 $('.body').delegate('.delete','click',function(){
  $(this).parent().parent().remove();
 });

});
</script>


  @stop












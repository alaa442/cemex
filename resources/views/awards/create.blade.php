@extends('master')
@section('content')

{!! Form::open(['route'=>'awards.store','method'=>'post']) !!}
	<legend>أضافه جائزه</legend>
  <div class="form-group">
    <label for="inputName" class="control-label">الأسم</label>
    <input type="text" name="Name" class="form-control" id="inputName" placeholder="Enter Name" required>
  </div>
  <div class="form-group">
    <button type="submit" class="btn btn-primary">حفظ</button>
  </div>
	{!!Form::close()!!}


  @stop

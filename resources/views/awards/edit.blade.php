@extends('master')
@section('content')
{!! Form::open(['route'=>['awards.update',$award->Awards_Id],'method'=>'PUT']) !!}
	<legend>تعديل الجائزه</legend>
  <div class="form-group">
    <label for="inputName" class="control-label">الأسم</label>
    <input type="text" name="Name" class="form-control" value="{{$award->Name}}" required>
  </div>
  <div class="form-group">
    <button type="submit" class="btn btn-primary">حفظ</button>
  </div>
	{!!Form::close()!!}


  @stop
  

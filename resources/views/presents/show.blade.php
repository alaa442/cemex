@extends('master')
@section('content')

	
	
	<h2> {{$present->Name}} </h2>
	<h2> {{$present->getcontractors->Name}}</h2>
	<h2> {{$present->getcompetitions->Name}} </h2>
	<h2> {{$present->Delivery_Date}} </h2>
	<h2> {{$present->Ranking}} </h2>
	<td>{{$present->getcompetitions->Period}}</td>
	<td>{{$present->getcompetitions->Start_Date}}</td>
	<h2> {{$present->Name}} </h2>
	 @foreach($present->getwards as $item)
     <span><h2>{{$item->pivot->Amount}} {{$item->Name}} .</h2></span>
         

		
     @endforeach
	   
@stop

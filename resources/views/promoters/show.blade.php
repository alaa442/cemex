
@extends('master')

@section('content')
    Visits      @foreach ($promoters->getvisit as $visit)
        <li>{{$visit->Visits_id}}</li>
        <li>{{$visit-> Government}}</li>
      @endforeach

<br> 
  Contractors
   @foreach ($promoters->getcontractor as $contractor)
        <li>{{$contractor->	Name}}</li>
        <li>{{$contractor-> Contractor_Id}}</li>
      @endforeach



    


  
</div>
@stop




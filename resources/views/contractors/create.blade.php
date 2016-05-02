@extends('master')

@section('content')

<h4>اضافة مقاول جديد</h4>
<table class="table table-striped table-bordered table-hover">
{!! Form::open(['route'=>'contractors.store', 'method' => 'post']) !!}

<tr>
    <td> اسم المقاول</td>
    <td><input type="text" name="name" id="name"/> </td>
    <td><span type="hidden" class="label label-danger">{{ $errors->first('name') }}</span></td>
</tr>


<tr>
  <td>المحافظة</td>
  <td>
  <select id="goverment" name="goverment" class = "chosen-select chosen-rtl" >
    <option value=" "> اختر محافظة</option>
    @foreach($govs as $gov)
      <option value ="{{$gov->gov_name}}"> {{$gov->gov_name}} </option>
    @endforeach
  </select> 
  </td>
  <td><span class="label label-danger">{{ $errors->first('goverment') }}</span></td>
</tr>

<tr>
  <td>المركز</td>
  <td><input type="text" name="city" id="city" /></td>
  <td><span class="label label-danger">{{ $errors->first('city') }}</span></td>
</tr>

<tr>
  <td>العنوان</td>
  <td><input type="text" name="address" id="address" /></td>
  <td><span class="label label-danger">{{ $errors->first('address') }}</span></td>
</tr>
<tr>
  <td>تليفون 1</td>
  <td><input type="text" name="tele1" id="tele1"/></td>
  <td><span class="label label-danger" >{{ $errors->first('tele1') }}</span></td>
</tr>

<tr>
  <td>تليفون 2</td>
  <td><input type="text" name="tele2" id="tele2"/></td>
  <td><span class="label label-danger" >{{ $errors->first('tele2') }}</span></td>
</tr>
  
<tr> 
  <td>التليفون الارضي  </td>
  <td><input type="text" name="home_phone" id="home_phone"/></td>
  <td><span class="label label-danger" >{{ $errors->first('home_phone') }}</span></td>
</tr> 

<tr>
  <td>الوظيفة</td>
  <td><input type="text" name="job" id="job"/></td>
  <td><span class="label label-danger">{{ $errors->first('job') }}</span></td>
</tr>

<tr>
  <td> اللقب </td>
  <td><input type="text" name="fame" id="fame"/></td>
  <td><span class="label label-danger" id="fame_invalid">{{ $errors->first('fame') }}</span></td>
</tr>

<tr>
  <td>التعليم</td>
  <td>{!!Form::select('education', array(' '=>' ','No Education' => 'No Education', 'Low Education' => 'Low Education','Medium Education' => 'Medium Education','High Education' => 'High Education'));!!}  </td>
      <td><span type="hidden" class="label label-danger"></span></td>
</tr>

<tr>
  <td>اسم الشهرة</td> 
  <td><input type="text" name="nickname" id="nickname"/></td>
  <td><span class="label label-danger" id="nickname_invalid">{{ $errors->first('nickname') }}</span></td>
</tr>

<tr>
  <td>الديانة</td>  
  <td><input type="text" name="religion" id="religion"/></td>
  <td><span class="label label-danger" id="religion_invalid">{{ $errors->first('religion') }}</span></td>
</tr>

<tr>
  <td>البريد الاليكتروني</td>
  <td><input type="email" name="mail" id="mail"/></td>
  <td><span class="label label-danger">{{ $errors->first('mail') }}</span></td>
</tr>

<tr>  
 <td> هل يمتلك حساب فيسبوك</td>
  <td>
    {!!Form::select('has_facebook', array(' '=>' ','لا' => 'لا' ,'نعم' => 'نعم'));!!}</td>
  <td>
<span type="hidden" class="label label-danger">{{ $errors->first('has_facebook') }}</span>
  </td>
</tr>

<tr>
  <td>حساب الفيسبوك</td>
  <td><input type="text" name="facebook" id="facebook"/></td>
  <td><span type="hidden" class="label label-danger"></span></td>
</tr>

<tr>  
 <td> نوع الهاتف </td>
  <td>
    {!!Form::select('phone_type', array(' ' => ' ','حديث' => 'حديث' ,'قديم' => 'قديم'));!!}</td>
  <td>
  <span type="hidden" class="label label-danger">{{ $errors->first('phone_type') }}</span>
  </td>
</tr>

<tr>  
 <td> هل يمتلك كمبيوتر</td>
  <td>
    {!!Form::select('computer', array(' '=> ' ','لا' => 'لا' ,'نعم' => 'نعم'));!!}</td>
  <td>
<span type="hidden" class="label label-danger">{{ $errors->first('computer') }}</span>
  </td>
</tr>

<tr>
  <td>تاريخ الميلاد</td>
  <td><input type="date" name="birthday" id="birthday" /></td>
  <td><span class="label label-danger">{{ $errors->first('birthday') }}</span></td>
</tr>


<tr>
  <td>اسم المندوب</td>
  <td>
  <select id="pormoter_id" name="pormoter_id" class = "chosen-select chosen-rtl">
  <option value=""> اختر مندوب</option>
  
  </td>
  <td><span class="label label-danger">{{ $errors->first('pormoter_id') }}</span></td>
</tr>

<tr>
  <td>الفئة</td>
  <td>{!!Form::select('class', array('0' => '0', '1' => '1','2' => '2','3' => '3','4' => '4', '5' => '5','6' => '6','7' => '7'));!!}  </td>
    <td><span type="hidden" class="label label-danger">{{ $errors->first('class') }}</span></td>

</tr>



<tr>
  <td><input type="submit" value="حفظ" ></td>
      <td><span type="hidden" class="label label-danger"></span></td>

    <td><span type="hidden" class="label label-danger"></span></td>
</tr>  


 {!! Form::close() !!}
 </table> 

<script type="text/javascript">       
    $(document).ready(function() {                 
        $('#goverment')  .chosen({
              width: '100%',
              no_results_text: 'لا توجد نتيجة'
        });
        $('#pormoter_id').chosen({
            width: '100%',
            no_results_text: 'لا توجد نتيجة'
        });
        $("#goverment").change(function() {      
            $.getJSON("contractors/promoters/" + $("#goverment").val(), function(data) {
                console.log(data);
                var $promoters = $("#pormoter_id");
                $("#pormoter_id").chosen("destroy");
                $promoters.empty();
                $.each(data, function(key, value) {
                    $promoters.append('<option value="' + key +'">' + value + '</option>');
                });
            
              $('#pormoter_id').chosen({
                width: '100%',
                no_results_text: 'لا توجد نتيجة'
              });

              $("#pormoter_id").trigger("chosen:updated");
                  $("#pormoter_id").trigger("change");             
          });
                  
          $('#pormoter_id').chosen({
            width: '100%',
            no_results_text: 'لا توجد نتيجة'
          });

      });

    });
</script>


@stop


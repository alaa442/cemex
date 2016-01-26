<!DOCTYPE html>
<html dir="rtl" lang="ar">
<head>
    <meta charset="UTF-8">
    <title>لوحة التحكم</title>
    <html xmlns="http://www.w3.org/1999/xhtml" dir="rtl">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="//maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css" rel="stylesheet">

    <script src="/assets/js/jquery.min.js"></script>
	<script src="/assets/js/bootstrap.min.js"></script>

   

<link rel="stylesheet" type="text/css" href="/assets/css/bootstrap.min.css">
<link rel="stylesheet" type="text/css" href="/assets/css/bootstrap-horizon.css">
<link rel="stylesheet" type="text/css" href="/assets/css/rtl.css">

</head>

<body class="rtl">
	<div class="row row-horizon bar">
		لوحة التحكم
	</div>

	<div class="row">
		<div class="side_bar col-md-3" id="leftCol">
			<ul class="nav nav-stacked" id="sidebar">
			    <li><a href="/contractors">المقاولين</a></li>
			    <li><a href="/promoters">المناديب</a></li>
			    <li><a href="/presents">الهدايا</a></li>
			    <li><a href="/awards">جوائز المندوبين</a></li>
			    <li><a href="/reviews">مراجعة البيانات</a></li>
			    <li><a href="/visites">الزيارات</a></li>
			    <li><a href="/competions">المسابقات</a></li>
			</ul>
  		</div>

	  	<div class="col-md-9 content">
	  		<main>
	  			@yield('content')
	  		</main>
	  	</div>

	</div>

  	<div class="row footer">
		<p>حقوق النشر محفوظة</p>
  	</div>


</body>

</html>
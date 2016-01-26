<!DOCTYPE html>
<html>
    <head>
        <title>Database system</title>

        <link href="https://fonts.googleapis.com/css?family=Lato:100" rel="stylesheet" type="text/css">
        <html dir="rtl" lang="ar">

        <meta charset="UTF-8">
        <title>لوحة التحكم</title>
        <html xmlns="http://www.w3.org/1999/xhtml" dir="rtl">
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link href="//maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css" rel="stylesheet">

    <!-- hidden menu -->
<script type="text/javascript" src="/assets/js/ddaccordion.js"></script>

<script type="text/javascript">
ddaccordion.init({
    headerclass: "submenuheader", //Shared CSS class name of headers group
    contentclass: "submenu", //Shared CSS class name of contents group
    revealtype: "click", //Reveal content when user clicks or onmouseover the header? Valid value: "click", "clickgo", or "mouseover"
    mouseoverdelay: 200, //if revealtype="mouseover", set delay in milliseconds before header expands onMouseover
    collapseprev: true, //Collapse previous content (so only one open at any time)? true/false 
    defaultexpanded: [], //index of content(s) open by default [index1, index2, etc] [] denotes no content
    onemustopen: false, //Specify whether at least one header should be open always (so never all headers closed)
    animatedefault: false, //Should contents open by default be animated into view?
    persiststate: true, //persist state of opened contents within browser session?
    toggleclass: ["", ""], //Two CSS classes to be applied to the header when it's collapsed and expanded, respectively ["class1", "class2"]
    togglehtml: ["suffix", "<img src='images/plus.gif' class='statusicon' />", "<img src='images/minus.gif' class='statusicon' />"], //Additional HTML added to the header when it's collapsed and expanded, respectively  ["position", "html1", "html2"] (see docs)
    animatespeed: "fast", //speed of animation: integer in milliseconds (ie: 200), or keywords "fast", "normal", or "slow"
    oninit:function(headers, expandedindices){ //custom code to run when headers have initalized
        //do nothing
    },
    onopenclose:function(header, index, state, isuseractivated){ //custom code to run whenever a header is opened or closed
        //do nothing
    }
})
</script>

<!-- <script type="text/javascript" src="jconfirmaction.jquery.js"></script> -->
<script type="text/javascript">
    
    $(document).ready(function() {
        $('.ask').jConfirmAction();
    });
    
</script>

<link rel="stylesheet" type="text/css" href="/assets/css/bootstrap.min.css">
<link rel="stylesheet" type="text/css" href="/assets/css/rtl.css">


<style>
    html, body {
                height: 100%;
    }
    .content {
        text-align: center;
        display: inline-block;
    }

    .title {
        font-size: 60px;
    }
    .foot {
        margin-right: 5px;
    }
</style>
</head>

<body>
        <div class="row bar">
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

        <div class="content">
            <br/><br/><br/><br/><br/><br/><br/><br/><br/>
            <div class="title"> &nbsp; &nbsp; &nbsp;&nbsp; تجميع الداتا الخاصة بالمقاولين &nbsp; &nbsp; &nbsp;&nbsp;&nbsp;</div>
            <br/><br/><br/><br/><br/><br/><br/>
            <br/><br/><br/><br/><br/><br/><br/>
        </div>
        <div class="row">
            <p>حقوق النشر محفوظة</p>
        </div>

    <script src="/assets/js/jquery.min.js"></script>
    <script src="/assets/js/bootstrap.min.js"></script>

</body>

</html>

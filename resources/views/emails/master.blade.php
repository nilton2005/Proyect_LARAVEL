<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>

</head>
<body style="margin: 0px; padding:0px; background-color:#f1f1f1" >
    <div style="
       display:bocx;
       max-width:800px;
       margin:0px auto;
       width:60%;

        
        ">
<img src="{{url('/static/images/logoRec.png')}}" alt="Imagen logo"  style="width:100%; display:block;">

    <div style="
    background-color: #fff;
    padding:24px;
    ">
        @yield('content')
        {{--Marketing (publicidad)--}}
    </div>
    </div>
    
</body>
</html>
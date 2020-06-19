
<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>PDF MAIL</title>
   
</head>
<body>
  
    <style>
      
@page {
  size: A4;
}
            .content{
            color: black;
            width: 100%;
            border: 1px solid black;
            border-radius: 5px;1
            margin: 20px;
            font-family: 'Menlo';
        }
        .main{
           
            margin: auto;
        }
        h4{
           
        }
        .naslov{
            text-align: center;
            padding: 20px;
            border-radius: 20px;
            background-color: #eeeeee;
        }
        .p{
            opacity: 0.8;
        }
        .page-break{
            page-break-after: always;
        }
  .inline{
    clear:both; 
    position:relative;

  }
        .lapo{
          position:absolute; 
          left:0pt; width:192pt;
        }
        .rapo{
          margin-left:250pt;
        }
    </style>
    <div class="content">
        <div class="main">
<div class="naslov"><h2>YOUR DATA</h2>
</div>
<div class= "inline">
      <div class= "lapo">
        <h4 > Last name  : {{$lname }} </h4>
        <h4>First name   : {{$fname }} </h4>
        <h4>E- mail   : {{$email }}</h4>
    </div> 
    <div class= "rapo">
      <h4>record   : {{$record }}</h4>
      <h4>message : {{$message }}</h4>
    </div>
</div>

<div class="page-break"></div>

    <div class= "inline">
      <div class= "lapo">
        <h4>Signature  : </h4>
    </div> 
    {{-- <div class= "rapo">
      <h4>Date  : {{$date }}</h4>
    </div> --}}
</div>
</div>
</div>
</body>

</html>
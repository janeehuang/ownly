<!DOCTYPE html>
<html >
<head>
    <meta charset="UTF-8">
    <title>Simple HTML & CSS Login Form</title>




    <link rel="stylesheet" href="css/style.css">
    <style>
        body{
            font-family: 'Open Sans', sans-serif;
            background:#FFFFFF;
            margin: 0 auto 0 auto;
            width:100%;
            text-align:center;
            margin: 20px 0px 20px 0px;
        }

        p{
            font-size:12px;
            text-decoration: none;
            color:#ffffff;
        }

        h1{
            font-size:1.5em;
            color:#000000;

        }

        .box{
            background:white;
            width:300px;
            border-radius:10px;
            margin: 140px auto 0 auto;
            padding:0px 0px 70px 0px;
            border: #FFFFFF 4px solid;
        }

        .email{
            background:#ecf0f1;
            border: #ccc 1px solid;
            border-bottom: #ccc 2px solid;
            padding: 8px;
            width:250px;
            color:#000000;
            margin-top:10px;
            font-size:1em;
            border-radius:4px;
        }

        .password{
            border-radius:4px;
            background:#ecf0f1;
            border: #ccc 1px solid;
            padding: 8px;
            width:250px;
            font-size:1em;
        }

        .btn{
            background:#FF0000;
            width:268px;
            padding-top:5px;
            padding-bottom:5px;
            color:white;
            border-radius:4px;
            border: #FFFFFF 1px solid;

            margin-top:20px;
            margin-bottom:20px;
            float:left;
            margin-left:16px;
            font-weight:800;
            font-size: 15px;
        }

        .btn:hover{
            background:#FFFF00;
        }

        #btn2{
            float:left;
            background:#FF0000;
            width:125px;  padding-top:5px;
            padding-bottom:5px;
            color:white;
            border-radius:4px;
            border: #FFFFFF 1px solid;

            margin-top:20px;
            margin-bottom:20px;
            margin-left:10px;
            font-weight:800;
            font-size: 15px;;
        }

        #btn2:hover{
            background:#FFFF00;
        }
    </style>




</head>

<body>

<link href='http://fonts.googleapis.com/css?family=Open+Sans:700,600' rel='stylesheet' type='text/css'>

<form method="post" action="{{'login'}}">
    <div class="box">
        <h1>Sign Up</h1>
        <form action="" method="post">

            <input type="hidden" name="_token" value="{{ csrf_token() }}">

            <input type="text" name="name" placeholder="name"  class="email" />

            <input type="email" name="email" placeholder="email" class="email" />

            <input type="password" name="pwd" placeholder="password"  class="password" />

           <input type="submit" value="Join Now" class="btn btn-danger" name="join">

         <!-- End Btn -->
        </form>



    </div> <!-- End Box -->

</form>

<p>Forgot your password? <u style="color:#FFFFFF;">Click Here!</u></p>

<script src="//ajax.googleapis.com/ajax/libs/jquery/1.9.0/jquery.min.js" type="text/javascript"></script>

<script src="js/index.js"></script>




</body>
</html>

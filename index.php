<?php
include("connect.php");
if($_SERVER["REQUEST_METHOD"]=="POST"){
  $message=$_POST["message"];
  $stmt=$conn->prepare("INSERT INTO AnonymousTable(name) VALUES(?)");
  $stmt->bind_param("s",$message);
  if($stmt->execute()){
    $message="anonymous message sent successfully";
  }else{
    $message="anonymous message not sent try again";
  }
  
}

?> 


<!DOCTYPE html>

<html>
<head>
  <meta http-equiv="CONTENT-TYPE" content="text/html; charset=UTF-8">
<meta name="viewport" content="width=device-width,initial-scale=1.0"/>
  <title>Hello, World!</title>
</head>
<body>
  <style>
  body{
    background-color:#212121;
  }
  .form{
    display:grid;
    margin:0;
    justify-content:center;
    
  }
  input{
    margin-top:54px;
    padding:34px;
    color:#fff;
  }
  button{
    padding:4px;
    background-color:#03A9FA;
    border:1px solid #213133;
    border-radius:8px;
  }
  .div{
    background:#343A40;
    display:grid;
    margin:0;
    justify-content:center;
    height:320px;
    width:320px;
    border-radius:12px;
    position:relative;
    left:12px;
   
    top:134px;
  }
  </style>
<br><br>
<nav>
<a style="color:#000;" href="Admin.php">Admin panel</a>
</nav>
  <div class="div">
  <form class="form" action="Home.php" method="POST">
    <input type="text" name="message" placeholder="input anonymous message"><br><br>
    <button >Send </button>
  </form>
    <br><br><br>
  </div>
</body>
</html>

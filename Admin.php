<?php
session_start();
include("connect.php");
if(isset($_SESSION["ADMIN"])){
    header("location:messageView.php");
    exit;
}
if($_SERVER["REQUEST_METHOD"]=="POST"){
    $name=$_POST["pass"];
    $stmt=$conn->prepare("SELECT*FROM Admin WHERE name=?");
    $stmt->bind_param("s",$name);
    $stmt->execute();
$stmt->store_result();
    if($stmt->num_rows == 1){
$_SESSION["ADMIN"]=$name; 
        header("location:messageView.php");
        $succ=" login success
        ";
    }else{
        $succ="invalid user details"; 
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
      text-align:center;
      color:#fff;
  }
  .form{
    display:grid;
    margin:0;
    justify-content:center;
    
  }
  input{
    margin-top:54px;
    padding:24px;
    color:#fff;
  }
  button{
    padding:24px;
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
  <div class="div">

  <form class="form" action="Admin.php" method="POST">
      <h2> Admin login<h2>
      <h6><?php echo $succ ;?></h6>
    <input type="text" name="pass" placeholder="input anonymous message"><br><br>
    <button >Send </button>
  </form>
    <br><br><br>
  </div>
</body>
</html>

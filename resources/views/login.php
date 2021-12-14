<?php
session_start();
include 'dbconnect.php';
$alert = '';

if(isset($_SESSION['role'])){
	header("location:index.php");
}

if(isset($_POST['btn-daftar']))
{
 $email = mysqli_real_escape_string($conn,$_POST['email']);
 $password = mysqli_real_escape_string($conn,$_POST['password']);

 //cek apakah email sudah pernah digunakan
$lihat1 = mysqli_query($conn,"select * from user where useremail='$email'");
$lihat2 = mysqli_num_rows($lihat1);
 
if($lihat2 < 1){
    //email belum pernah digunakan
    $insert = mysqli_query($conn,"insert into user (useremail,userpassword) values ('$email','$password')");
        
        //eksekusi query
        if($insert){
            echo "<div class='alert alert-success'>Berhasil mendaftar, silakan login.</div>
            <meta http-equiv='refresh' content='2; url= signin.php'/>  ";
        } else {
            //daftar gagal
            echo "<div class='alert alert-warning'>Gagal mendaftar, silakan coba lagi.</div>
            <meta http-equiv='refresh' content='2'>";
        }

    }
 else
    {
    //jika email sudah pernah digunakan
    $alert = '<div class="alert alert-danger alert-dismissible fade show"><strong>Email sudah pernah digunakan</strong></div>';
    echo '<meta http-equiv="refresh" content="2">';
    }
 
};




?>


<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Sign In</title>
    <meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Lato">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<link rel="stylesheet" type="text/css" href="css/Style.css">
  <!-- Global site tag (gtag.js) - Google Analytics -->
	<script async src="https://www.googletagmanager.com/gtag/js?id=UA-144808195-1"></script>
	<script>
	  window.dataLayer = window.dataLayer || [];
	  function gtag(){dataLayer.push(arguments);}
	  gtag('js', new Date());

	  gtag('config', 'UA-144808195-1');
	</script>
    <script src="jquery.min.js"></script>
	<style>/* The Modal (background) */
.modal {
  display: none; /* Hidden by default */
  position: fixed; /* Stay in place */
  z-index: 1; /* Sit on top */
  left: 0;
  top: 0;
  width: 100%; /* Full width */
  height: 100%; /* Full height */
  overflow: auto; /* Enable scroll if needed */
  background-color: rgb(0,0,0); /* Fallback color */
  background-color: rgba(0,0,0,0.4); /* Black w/ opacity */
  padding-top: 60px;
}

/* Modal Content/Box */
.modal-content {
  background-color: #00CCFF;
  margin: 10px auto; /* 15% from the top and centered */
  border: 1px solid #888;
  width: 500px; /* Could be more or less, depending on screen size */
}

/* The Close Button */
.close {
  /* Position it in the top right corner outside of the modal */
  position: absolute;
  right: 25px;
  top: 0;
  color: #000;
  font-size: 35px;
  font-weight: bold;
}

/* Close button on hover */
.close:hover,
.close:focus {
  color: red;
  cursor: pointer;
}

/* Add Zoom Animation */
.animate {
  -webkit-animation: animatezoom 0.6s;
  animation: animatezoom 0.6s
}

@-webkit-keyframes animatezoom {
  from {-webkit-transform: scale(0)}
  to {-webkit-transform: scale(1)}
}

@keyframes animatezoom {
  from {transform: scale(0)}
  to {transform: scale(1)}
}
	</style>
	<link rel="icon" 
      type="image/png" 
      href="favicon.png">
  </head>
  <body style="background-color: #0066CC;">
  
  <div align="center">
			<div class="container">
					<div style="color:white">
					<label><?php echo $alert ?></label>
					</div>
					 <form class="modal-content animate" method="post">
            <div class="imgcontainer">

                <img src="logosma.png" alt="Avatar" class="avatar">
                <h1 style="text-align:center;color: white;">Register</h1>
              </div>

              <div class="container" style="text-align: initial;">
                <input type="email" class="form-control" placeholder="Email" name="email" autofocus required>
                </br>
                <input type="password" class="form-control" placeholder="Password" name="password" required style="margin-bottom: 20px;">
                  <button class="btn" type="submit" style="float:right; margin-right:34px; margin-top:26px; background-color: #cdb85d" name="btn-daftar">Register</button>
                  <a href="signin.php" onclick="document.getElementById('login').style.display='block'" style="text-decoration:none; margin-right:34px; margin-top:26px; color: white">Have Account?</a>
              </div>
            </form>
			
			<br \>
        </div></div>
       
     
	
	
  </body>
</html>


<?php 
session_start();

include("config.php");
ini_set("display_errors","on");

if($_SERVER["REQUEST_METHOD"] == "POST") 
{
// username and password sent from form 

$myusername = mysqli_real_escape_string($conn,$_POST['username']);
$mypassword = mysqli_real_escape_string($conn,$_POST['password']); 
$mypassword=md5($mypassword);

$sql = "SELECT * FROM admins WHERE username = '$myusername' and password = '$mypassword'";
$result = mysqli_query($conn,$sql);
$row = mysqli_fetch_array($result,MYSQLI_ASSOC); 
$count = mysqli_num_rows($result);

if($count == 1) 
{  
$_SESSION['login_user'] = $row['id']; 	 
date_default_timezone_set('Africa/Lagos');


		echo '<script type="text/javascript">window.location.replace("index.php");</script>'; 


}
else 
{ echo "<div class='alert'><span class='closebtn' onclick='this.parentElement.style.display='none';'>&times;</span>Your Username or Password is Invalid</div>"; 
}

}
?>

<!DOCTYPE html><html lang="en">
<head>


<title>Agile Bank | Administrator</title>

<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width,initial-scale=1"> 
<!-- END META SECTION -->

<!-- CSS INCLUDE -->
<link rel="stylesheet" href="css/styles2c70.css?v=1.0.3">
<link rel="icon" type="image/png" href="img/logo.jpg" />
<link rel="icon" href="img/logo.jpg" type="image/x-icon">	
<!-- EOF CSS INCLUDE -->
</head>




<style type="text/css">
/* The alert message box */
.alert {
padding: 20px;
background-color: #f44336; /* Red */
color: white; 
text-align: center;
z-index: 999;
position: absolute;
left: 5px;
bottom: 5px;
}

/* The close button */
.closebtn {
margin-left: 15px;
color: white;
font-weight: bold;
float: right;
font-size: 22px;
line-height: 20px;
cursor: pointer;
transition: 0.3s;
}

/* When moving the mouse over the close button */
.closebtn:hover {
color: black;
}
.alert {
opacity: 1;
transition: opacity 0.6s; /* 600ms to fade out */
}
</style>

<script>
// Get all elements with class="closebtn"
var close = document.getElementsByClassName("closebtn");
var i;

// Loop through all close buttons
for (i = 0; i < close.length; i++) {
// When someone clicks on a close button
close[i].onclick = function(){

// Get the parent of <span class="closebtn"> (<div class="alert">)
var div = this.parentElement;

// Set the opacity of div to 0 (transparent)
div.style.opacity = "0";

// Hide the div after 600ms (the same amount of milliseconds it takes to fade out)
setTimeout(function(){ div.style.display = "none"; }, 600);
}
}
</script>






<body>
<!-- PAGE WRAPPER -->
<div class="page">
<!-- PAGE CONTENT WRAPPER -->
<div class="page__content" id="page-content" style="background: #12326b">
<!-- PAGE LOGIN CONTAINER -->
<div class="important-container login-container">

<div class="content" style="align-items: center;"> 

<p class="caption text-left margin-bottom-30" style="text-align: center;">Welcome to Agile Bank Admin</p>
 
<form method="POST" action="" autocomplete="off">

<div class="form-group"><label>Username</label>
<input type="text" class="form-control" placeholder="Username"  name='username' id="username" required="" />
</div>

<div class="form-group margin-bottom-20">
<label>Password</label>
<input type="password" class="form-control" placeholder="Password" name='password' id="password" required="" autocomplete="new-password"></div>

<div class="form-group margin-bottom-30">
<div class="form-row">
<div class="col-6"> 
</div> 
</div></div>

<div class="form-group margin-bottom-30">
<div class="form-row">
<div class="col-2">

</div>
<div class="col-8">

<style>
.wrongLoginz{
margin-bottom:10px; padding:5px;  
color:red; 
font-size:small;				  
}
</style>

<input  type="submit" class="btn btn-success btn-block" id="sub" id="button" value="Login" />
<a id="log"></a>

</div>

</div>
</div>


</form>



<div class="divider"></div>

 

</div></div>

<!-- PAGE LOGIN CONTAINER -->
<!-- PAGE CONTENT CONTAINER -->
<div class="content d-none d-lg-block" id="content" style="background: url(img/bank2.png) no-repeat center center fixed">  
</div><!-- //END PAGE CONTENT CONTAINER -->
</div><!-- //END PAGE CONTENT -->
</div><!-- //END PAGE WRAPPER -->



<!-- IMPORTANT SCRIPTS -->
<script type="text/javascript" src="js/vendors/jquery/jquery.min.js"></script>
<script type="text/javascript" src="js/vendors/jquery/jquery-migrate.min.js"></script>
<script type="text/javascript" src="js/vendors/bootstrap/bootstrap.bundle.min.js"></script>
<script type="text/javascript" src="js/vendors/mcustomscrollbar/jquery.mCustomScrollbar.concat.min.js"></script>
<!-- END IMPORTANT SCRIPTS -->
<!-- TEMPLATE SCRIPTS -->
<script type="text/javascript" src="js/app.js"></script>
<script type="text/javascript" src="js/plugins.js"></script>
<script type="text/javascript" src="js/demo.js"></script>
<script type="text/javascript" src="js/settings.js"></script>
<!-- END TEMPLATE SCRIPTS -->
</body>

</html>
<?php   
session_start(); 

if (!isset($_SESSION['login_user'])){header ("Location:login.php");}
include("config.php"); 
ini_set("display_errors","on");
$ID = $_SESSION['login_user']; 
if($ID == "")
{header("location:login.php");}
  
?>

<!DOCTYPE html><html lang="en">

<head>
	<title>Agile Bank - Administrator</title>
	<!-- META SECTION -->
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width,initial-scale=1"> 


	<!-- END META SECTION -->
	<!-- CSS INCLUDE -->
	<link rel="stylesheet" href="css/styles2c70.css?v=1.0.3">
	<!-- EOF CSS INCLUDE -->
	<link rel="icon" type="image/png" href="favicon.ico" />
</head>

<body class="indent indent--rounded indent--shadowed" style="background: linear-gradient(to right,#000, 0, #16181d 100%); font-family: Comfortaa,Arial, Helvetica Neue,Helvetica,serif,sans-serif;">
	<!-- PAGE WRAPPER -->
<div class="page page--w-header page--w-container">
<!-- PAGE HEADER -->
<header class="page__header ">

<div class="logo-holder" style="border-radius: 100px;">
<a href="index.php" class="logo-text d-none d-lg-block" style="color: blue; font-weight: bold">
The Agile Bank
</a> 
<a href="index.php" class="logo-text d-lg-none">
<strong class="text-primary">M</strong><strong>W</strong></a>
</div>
 



<div class="box-fluid"></div>
 
</header>
<!-- //END PAGE HEADER -->

	<!-- PAGE CONTAINER -->

	<div class="page__container invert">
		<nav class="horizontal-navigation">
			<button class="btn btn-light btn--icon" data-action="horizontal-show">
				<span class="fa fa-bars"></span> Toggle navigation</button>

<ul>

<li class="title">Main</li>
<li class="openable">
<a href="index.php"><span class="icon li-home"></span> <span class="text">Dashboard</span></a>
</li>

<li class="openable">
<a href="activated.php"><span class="icon li-group-work"></span> <span class="text">Activated Accounts</span></a>
</li> 

<li class="openable">
<a href="inactive.php"><span class="icon li-group-work"></span> <span class="text">Inactive Accounts</span></a>
</li> 
<li class="openable">
<a href="setting.php"><span class="icon li-cog"></span> <span class="text">Setting</span></a>
</li> 
<li class="openable">
<a href="logout.php"><span class="icon li-cog"></span> <span class="text">Logout</span></a>
</li> 
</ul></nav></div>
<!-- //END PAGE CONTAINER -->
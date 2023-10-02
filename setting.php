<?php 
include("header.php");    

$result = $conn->query("SELECT * FROM admins where id = '{$_SESSION['login_user']}' ");
if($result->num_rows > 0)
{ 
    while($row = $result->fetch_assoc()) 
    {     
        $Username = $row['username'];
        $Password  = $row['password']; 
    }
}



 if($_SERVER["REQUEST_METHOD"] == "POST") 
   { 


      $myusername = mysqli_real_escape_string($conn,$_POST['username']);  
      $mypassword = md5(mysqli_real_escape_string($conn,$_POST['password'])); 
      $mypassword2 = md5(mysqli_real_escape_string($conn,$_POST['Password2'])); 

 

		if($mypassword == $mypassword2){
		    $sql = "UPDATE admins SET username='{$myusername}', password='{$mypassword}' WHERE id='{$ID}'";
	 	    if(mysqli_query($conn,$sql))
	 	    { 
	 	    	$ref = 'Account Updated Successfully';
	 	    	// echo "<script>window.location ='logout.php';</script>";
	        } 
        	else{
        		 echo "<div class='alert'><span class='closebtn' onclick='this.parentElement.style.display='none';'>&times;</span>** Error Updating ** </div>";  
        }
   		}
   		else{ echo "<div class='alert'><span class='closebtn' onclick='this.parentElement.style.display='none';'>&times;</span>Please Ensure that All Passwords Corresponds </div>"; 
   	}

   }


?>




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
 


<!-- PAGE CONTENT WRAPPER -->
<div class="page__content" id="page-content"> 



<div class="container">
 
<div class="card">

<div class="card-body">


	<h4 id="rw-fe-help">Security Setting</h4>
	<p class="subtitle margin-bottom-30">You can update your Password and Username</p>


<form method="POST" action="" > 
<b class="col-sm-8 col-form-label" style="color:green; text-align: center;"><?php echo $ref; ?></b>

<div class="form-group row">
<label class="col-sm-4 col-form-label">Username</label>
<div class="col-sm-8">
<input type="text" class="form-control" name='username' value="<?php echo $Username; ?>"  required=""/>
<small class="form-text">Change the Username used to Login</small>
</div></div>
  


<div class="form-group row">
<label class="col-sm-4 col-form-label">Enter Password</label>
<div class="col-sm-8">
<input type="Password" class="form-control" name='password'  required="">
<small class="form-text form-text--primary">Change the Password Used to Login</small>
</div></div>

 
<div class="form-group row">
<label class="col-sm-4 col-form-label">Repeat Password</label>
<div class="col-sm-8">
<input type="Password" class="form-control" name='Password2' required="">
<small class="form-text form-text--primary">Repeat the Password Change</small>
</div></div>


</div>
<button type="button" class="btn btn-secondary" data-toggle="modal" data-target="#invertExampleModal">Proceed</button> 

</div>
</div>

  


<div class="modal fade" id="invertExampleModal" tabindex="-1" role="dialog" aria-hidden="true">
<div class="modal-dialog" role="document">
<div class="modal-content invert">
<div class="modal-header">
<h5 class="modal-title">Confirmation</h5>
<button type="button" class="close" data-dismiss="modal" aria-label="Close">
<span aria-hidden="true">&times;</span>
</button></div>
<div class="modal-body">Please note that the new credentials would take effect and you would be Logged Out, and asked to Login again.
 </div>
<div class="modal-footer">
<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button> 
<input class="btn btn-primary" id="bbb" type="submit" name="bbb" value="Confirm"> 
</div></div></div></div>

</form>
 
<!-- //END PAGE CONTENT CONTAINER -->

</div><!-- //END PAGE CONTENT -->
</div><!-- //END PAGE WRAPPER -->

 <?php 
 include("footer.php"); 
?>

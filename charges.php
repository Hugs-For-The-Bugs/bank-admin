<?php 
include("header.php");
$res = $conn->query("SELECT sum(fee) AS total FROM transactions WHERE state='Successful'");
if($res->num_rows > 0)
{ 
    while($row = $res->fetch_assoc()) 
  {  
    $fee=$row['total'];
  }
}
?>

<!-- PAGE CONTENT WRAPPER -->
<div class="page__content page-aside--hidden" id="page-content">


<!-- PAGE CONTENT CONTAINER -->
<div class="content" id="content"> 
<!-- PAGE HEADING -->
<div class="page-heading">
<div class="page-heading__container">
<div class="icon"><span class="li-users2"></span></div>
<h1 class="title">User Management</h1>
<p class="caption">WELCOME TO ONE THE AGILE BANK - MY ACCOUNT </p>
</div>
<nav aria-label="breadcrumb" role="navigation">
<ol class="breadcrumb">
<li class="breadcrumb-item"><a href="index.php">Dashboard</a></li>
<li class="breadcrumb-item"><a href="#">Transaction Management</a></li> 
<li class="breadcrumb-item active">View Transaction Fees</li></ol>
</nav>
</div>
<!-- //END PAGE HEADING -->


<div class="container">
<div class="card">
<div class="card-body padding-top-50 padding-bottom-30">
<div class="row padding-top-50 padding-bottom-50">
<div class="col-12">
<div class="logo-holder logo-holder--xl logo-holder--wide">
<div class="logo-text d-none d-lg-block">
<strong class="text-primary">#</strong><strong> Admin Account </strong></div>
<div class="logo-text d-lg-none"><strong class="text-primary">#</strong><strong>RW</strong></div></div>
<h3 class=" text-center"><span class="text-primary">Total Revenue: </span>SEK <?php echo $fee; ?></h3>
<p class="subtitle text-center"><?php echo date('D d-M-Y'); ?></p>
</div></div></div>




<div class="card-body">
<div class="table-responsive">


  <table id="dt-example-colections" class="table  table-indent-rows" cellspacing="0" width="100%">
    <thead>
      <tr class="thead-dark" align="center">
        <th>S/N</th>
        <th>Sent From</th>
        <th>Sent To</th>
	<th>Amount</th>
        <th>Fee</th>
        <th>Date</th>
        <th>Status</th>
        
      </tr>
    </thead>
        
    <tbody class="table-hover">


 <?php

   
$user = 0;
$result = $conn->query("SELECT accounts.id, transactions.fee, transactions.transaction_datetime, accounts.first_name, accounts.surname, accounts.social_security_number, transactions.id, transactions.amount, transactions.state, transactions.amount, transactions.to_account_id FROM accounts INNER JOIN transactions WHERE accounts.id=transactions.from_account_id ");
if($result->num_rows > 0)
{ 

    while($row = $result->fetch_assoc())

  {  
    	$id = $row['to_account_id'];
    	$fullname= $row['first_name']. "  " .$row['surname'];
    	$amount=$row['amount'];
    	$state=$row['state'];
    	$social_security_number=$row['social_security_number'];
      $trans_date=$row['transaction_datetime'];
      $fee = $row['fee'];

$result2 = $conn->query("SELECT accounts.first_name, accounts.surname, accounts.social_security_number FROM accounts INNER JOIN transactions WHERE accounts.id='$id' ");
    	if($result2->num_rows > 0)
{ 

    while($row = $result2->fetch_assoc())

  {  
  	$to_user= $row['first_name']. "  " .$row['surname'];
    	$ssn=$row['social_security_number'];
    }
  }
    $user++;


      echo '<tr align="center"><td>';
      echo $user;
      echo '</td><td>';
      echo $fullname; 
      echo '</td><td>';
      echo $to_user; 
      echo '</td><td>';
      echo $amount; 
      echo '</td><td>';
      echo $fee;  
      echo '</td><td>'; 
      echo $trans_date; 
	if ($state == "Successful") { 
	   echo '<td><font color="green"><strong>'.$state.'</strong></font></td></tr>'; } 
	else{ echo '<td><font color="red"><strong>'.$state.'</strong></font></td></tr>';
}  
}
}

?>
  

        </tbody>
      </table>

 <script type="text/javascript">
 document.addEventListener("DOMContentLoaded", function () {
             app._loading.show($("#dt-ext-colections"),{spinner: true});
                 $("#dt-example-colections").DataTable({
                      dom: "Bfrtip",
                      buttons: [{
                            extend: 'collection',
                            text: 'Export',                                                
                            buttons: ["copy", "csv", "excel", "pdf", "print"]
                               }],
                           "initComplete": function(settings, json) {
                            setTimeout(function(){
                                 app._loading.hide($("#dt-ext-colections"));
                             },1000);
                               }
                               });
                       });</script>

  </div></div></div></div>


<!-- //END PAGE CONTENT CONTAINER -->
</div>

<!-- //END PAGE CONTENT -->
</div>

<!-- //END PAGE WRAPPER -->
<script type="text/javascript">

document.addEventListener("DOMContentLoaded", function () {
$(".rating").raty({readOnly: true});
});
</script>


<!-- THIS PAGE SCRIPTS ONLY -->
<script type="text/javascript" src="js/vendors/raty/jquery.raty.js">
</script>
<!-- //END THIS PAGE SCRIPTS ONLY -->

<!-- IMPORTANT SCRIPTS -->
<script type="text/javascript" src="js/vendors/jquery/jquery.min.js">
</script>
<script type="text/javascript" src="js/vendors/jquery/jquery-migrate.min.js">
</script>
<script type="text/javascript" src="js/vendors/bootstrap/bootstrap.bundle.min.js">
</script>
<script type="text/javascript" src="js/vendors/mcustomscrollbar/jquery.mCustomScrollbar.concat.min.js">
</script><!-- END IMPORTANT SCRIPTS -->
  <!-- THIS PAGE SCRIPTS ONLY -->
  <script type="text/javascript" src="js/vendors/datatables/datatables.min.js"></script><script type="text/javascript" src="js/vendors/datatables/extensions/dataTables.buttons.min.js"></script><script type="text/javascript" src="js/vendors/datatables/extensions/buttons.flash.min.js"></script><script type="text/javascript" src="../cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script><script type="text/javascript" src="../cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.32/pdfmake.min.js"></script><script type="text/javascript" src="../cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.32/vfs_fonts.js"></script><script type="text/javascript" src="js/vendors/datatables/extensions/buttons.html5.min.js"></script><script type="text/javascript" src="js/vendors/datatables/extensions/buttons.print.min.js"></script><script type="text/javascript" src="js/vendors/datatables/extensions/buttons.colVis.min.js"></script>
  <!-- //END THIS PAGE SCRIPTS ONLY -->

<!-- TEMPLATE SCRIPTS -->
<script type="text/javascript" src="js/app.js">
</script>
<script type="text/javascript" src="js/plugins.js">
</script>
<script type="text/javascript" src="js/demo.js">
</script>
<script type="text/javascript" src="js/settings.js">
</script>
<!-- END TEMPLATE SCRIPTS -->
</body> 

</html>
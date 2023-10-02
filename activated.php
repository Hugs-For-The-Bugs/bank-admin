<?php 
include("header.php");
?> 
<!-- PAGE CONTENT WRAPPER -->
<div class="page__content" id="page-content">
<!-- PAGE CONTENT CONTAINER -->
<div class="content" id="content">
<!-- PAGE HEADING -->
<div class="page-heading">
<div class="page-heading__container">
<h1 class="title">Dashboard</h1>
<p class="caption">WELCOME TO THE AGILE BANK - MY ACCOUNT</p>
</div>


<nav aria-label="breadcrumb" role="navigation">
  <ol class="breadcrumb">
    <li class="breadcrumb-item"><a href="index.php">AGILE BANK</a></li>
<li class="breadcrumb-item active">Dashboard</li>
</ol>
</nav>
</div>
<!-- //END PAGE HEADING -->

<div class="card">
<div class="widget invert widget--items-middle">
<div class="widget__icon_layer widget__icon_layer--right">
<span class="li-database-upload"></span>
</div>
<div class="widget__container">
<div class="widget__line">
<div class="widget__icon">
<span class="li-database-upload"></span></div>
<div class="widget__title">Activated Accounts</div>
<div class="widget__subtitle">Notification from all Activated Accounts</div>
</div>
<div class="widget__box">
<button class="btn btn-outline-secondary btn-sm">Refresh</button>
</div>
</div>
</div>



<div class="card-body">
<div class="table-responsive">


  <table id="dt-example-colections" class="table  table-indent-rows" cellspacing="0" width="100%">
    <thead>
      <tr class="thead-dark" align="center">
        <th>S/N</th>
        <th>Full Name</th>
        
        <th>Email</th>
<th>Phone</th>
        <th>Birthday</th> 
        <th>Social Security No</th>
        <th>Balance</th>
        
      </tr>
    </thead>
        
    <tbody class="table-hover">


 <?php   
   
$user = 0;
$result = $conn->query("SELECT * FROM accounts WHERE active='1' order by id desc");
if($result->num_rows > 0)
{ 
    while($row = $result->fetch_assoc())
  {  
    $user++;
    $fullname= $row['first_name']. "  " .$row['surname'];

      echo '<tr align="center"><td>';
      echo $user;
      echo '</td><td>';
      echo '<a href="details.php?htennek007='; echo $row['id']; echo'">'.$fullname.'</a>'; 
      echo '</td><td>';
      echo $row['email']; 
      echo '</td><td>';
      echo $row['phone']; 
      echo '</td><td>';
      echo $row['birthday'];  
      echo '</td><td>'; 
      echo $row['social_security_number']; 
       
      echo '<td>'.$row['balance'].'</td></tr>';
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
 

  <!-- IMPORTANT SCRIPTS -->
  <script type="text/javascript" src="js/vendors/jquery/jquery.min.js"></script>
  <script type="text/javascript" src="js/vendors/jquery/jquery-migrate.min.js"></script>
  <script type="text/javascript" src="js/vendors/bootstrap/bootstrap.bundle.min.js"></script>
  <script type="text/javascript" src="js/vendors/mcustomscrollbar/jquery.mCustomScrollbar.concat.min.js"></script>
  <!-- END IMPORTANT SCRIPTS -->

  <!-- THIS PAGE SCRIPTS ONLY -->
  <script type="text/javascript" src="js/vendors/datatables/datatables.min.js"></script><script type="text/javascript" src="js/vendors/datatables/extensions/dataTables.buttons.min.js"></script><script type="text/javascript" src="js/vendors/datatables/extensions/buttons.flash.min.js"></script><script type="text/javascript" src="../cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script><script type="text/javascript" src="../cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.32/pdfmake.min.js"></script><script type="text/javascript" src="../cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.32/vfs_fonts.js"></script><script type="text/javascript" src="js/vendors/datatables/extensions/buttons.html5.min.js"></script><script type="text/javascript" src="js/vendors/datatables/extensions/buttons.print.min.js"></script><script type="text/javascript" src="js/vendors/datatables/extensions/buttons.colVis.min.js"></script>
  <!-- //END THIS PAGE SCRIPTS ONLY -->

  <!-- TEMPLATE SCRIPTS -->
  <script type="text/javascript" src="js/app.js"></script>
  <script type="text/javascript" src="js/plugins.js"></script>
  <script type="text/javascript" src="js/demo.js"></script>
  <script type="text/javascript" src="js/settings.js"></script>
  <!-- END TEMPLATE SCRIPTS -->
</body>

</html>
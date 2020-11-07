<!DOCTYPE html>
<html lang="en">
<?php
	session_start();
	if(!isset($_SESSION["username"])){
	header("Location: login.php");
	exit(); }
	?>
<head>

  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">
	<meta content='width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no' name='viewport'>
		<meta name="apple-mobile-web-app-capable" content="yes"/>
  <title>Dashboard</title>

  <!-- Bootstrap core CSS -->
  <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="css/bootstrap.min.css" rel="stylesheet">

  <!-- Custom styles for this template -->
  <link href="css/simple-sidebar.css" rel="stylesheet">
  <link href="css/style.css" rel="stylesheet">
      <!-- font Awesome -->
    <link href="css/font-awesome.min.css" rel="stylesheet" type="text/css"/>
<style>
	select {
		width:20%;
  cursor: pointer;
  border-radius: 0;
  border: none;
  border-bottom: 2px solid #962d22;
  appearance: none;
  -webkit-appearance: none;
  -moz-appearance: none;
  padding: 3px;
  margin-bottom:30px;
}

.form-group{
	width:70%;
}
.input-group-addon{
	width:15%;
}
input{
	    margin: auto;
}
</style>
</head>

<body>

  <div class="d-flex" id="wrapper">

    <!-- Sidebar -->
    <div class="bg-light border-right" id="sidebar-wrapper">
      <div class="sidebar-heading">Zoho Desk API</div>
      <div class="list-group list-group-flush">
        <a href="index.php" class="list-group-item list-group-item-action bg-light">Dashboard</a>
      </div>
    </div>
    <!-- /#sidebar-wrapper -->

    <!-- Page Content -->
    <div id="page-content-wrapper">

      <nav class="navbar navbar-expand-lg navbar-light bg-light border-bottom">
        <button class="btn btn-primary" id="menu-toggle"><i class="fa fa-bars" aria-hidden="true"></i></button>
      </nav>

      <div class="container-fluid" style="background-color:white;padding:30px;">
	  <h3 style="margin-top:-18px;margin-bottom:30px;">Submit Ticket</h3>
	  <h5 style="margin-top:-18px;margin-bottom:10px;">Ticket Information</h5>
        <form action="" method="post" enctype="multipart/form-data">			
			 <div class="form-group">
                 <div class="input-group">
                    <span class="input-group-addon">Department:&nbsp;</span>
                       <select tabindex="4" class="form-control" id="department" name="department" required >
							<option value="dept1">Dept 1</option>
							<option value="dept2">Dept 2</option>
							<option value="dept3">Dept 3</option>
							<option value="dept4">Dept 4</option>
						</select>
                   </div>
             </div>
						
			<div class="form-group">
                 <div class="input-group">
                    <span class="input-group-addon">Category:&nbsp;</span>
                       <select tabindex="4" class="form-control" id="category" name="category" required>
						<option  value="cat1">Category 1</option>
						<option  value="cat2">Category 2</option>
						<option  value="cat3">Category 3</option>
						<option  value="cat4">Category 4</option>
					</select>
                   </div>
             </div>
			 
			 <div class="form-group">
                 <div class="input-group">
                    <span class="input-group-addon">Subject:&nbsp;</span>
                       <input type="text" name="subject" id="subject" placeHolder="Enter Subject." class="form-control" style=" margin: auto;"  required />
                   </div>
             </div>
			 
			 <div class="form-group">
                 <div class="input-group">
                    <span class="input-group-addon">Description:&nbsp;</span>
                       <textarea type="text" name="description" id="description" placeHolder="Enter Description." class="form-control" style=" margin: auto;"  required /></textarea>
                   </div>
             </div>
			 
			 <div class="form-group">
                 <div class="input-group">
                    <span class="input-group-addon">Priority:&nbsp;</span>
                       <select tabindex="4" class="form-control" id="priority" name="priority"  required>
						<option>High</option>
						<option>Medium</option>
						<option>Low</option>
					</select>
                   </div>
             </div>
				 <h5 style="margin-top:18px;margin-bottom:10px;">Contact Details</h5>	

			<div class="form-group">
                 <div class="input-group">
                    <span class="input-group-addon">Name:&nbsp;</span>
                       <input type="text" name="name" id="name" value="<?php echo $_SESSION['username'] ?>" class="form-control" style=" margin: auto;" readonly />
                   </div>
             </div>
			 
			 <div class="form-group">
                 <div class="input-group">
                    <span class="input-group-addon">Email:&nbsp;</span>
                       <input type="text" name="email" id="email" value="<?php echo $_SESSION['email'] ?>" class="form-control" style=" margin: auto;" readonly />
                   </div>
             </div>				 
						
			<button class="btn btn-success" type="button" value="submit" onclick="submitTicket();">Submit</button>
			</form>
      </div>
    </div>
    <!-- /#page-content-wrapper -->

  </div>
  <!-- /#wrapper -->

  <!-- Bootstrap core JavaScript -->
  <script src="vendor/jquery/jquery.min.js"></script>
  <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

  <!-- Menu Toggle Script -->
  <script>
    $("#menu-toggle").click(function(e) {
      e.preventDefault();
      $("#wrapper").toggleClass("toggled");
    });
	
	function submitTicket(){
		var department = $("#department").val();
		var category = $("#category").val();
		var subject = $("#subject").val();
		var description = $("#description").val();
		var priority = $("#department").val();
		var email = $("#email").val();
		var name = $("#name").val();
		
		 var mydata = {};
            mydata["department"] = department.toString();
            mydata["category"] = category.toString();
            mydata["subject"] = subject.toString();
            mydata["description"] = description.toString();
            mydata["priority"] = priority.toString();
            mydata["email"] = email.toString();
            mydata["name"] = name.toString();			
			
			var json_mydata = JSON.stringify(mydata);

            $.post("createTicket.php?",{json_string:json_mydata},
                function (result, status) {
					alert(result);
                }).fail(
                function (jqXHR, textStatus, errorThrown) {
                    alert("Filter Error: " + jqXHR.responseText);
                    $('#div_loading').fadeOut();
                });
	}
	
  </script>

</body>

</html>

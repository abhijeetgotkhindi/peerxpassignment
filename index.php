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

      <div class="container-fluid">
        <div class="col-md-6 col-xs-6 animated fadeInLeft">
							<!-- small box -->
							<div class="small-box bg-red-gradient" style="height:125px;">
								<div class="inner">
									<h3>
									List All Tickets</h3>
								</div>
								<div class="icon">
									<i class="fa fa-files-o"></i>
								</div>
								<a href="ticketDetails.php" class="small-box-footer"  style="top:28px;">
									<i class="fa fa-eye"></i> View Tickets"
								</a>
							</div>
						</div><!-- ./col -->
						<div class="col-md-6 col-xs-6 animated fadeInRight">
							<!-- small box -->
							<div class="small-box bg-aqua" style="height:125px;">
								<div class="inner">
									<h3>
									Create New Ticket
									</h3>
								</div>
								<div class="icon">
									<i class="fa fa-question-circle"></i>
								</div>
								<a href="create_ticket.php" class="small-box-footer"  style="top:28px;">
									<i class="fa fa-eye"></i> Click Here to Create New Ticket
								</a>
							</div>
						</div><!-- ./col -->
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
  </script>

</body>

</html>

<?php 
 include('server.php') ;

  if (!isset($_SESSION['username'])) {
  	$_SESSION['msg'] = "You must log in first";
  	header('location: login.php');
  }
  if (isset($_GET['logout'])) {
  	session_destroy();
  	unset($_SESSION['username']);
  	header("location: login.php");
  }
   
?>
<!DOCTYPE html>
<html>
<?php include('header.php'); ?>

<div class="header2">
	<h2>Home Page</h2>
</div>
<div class="content2">
  	<!-- notification message -->
  	<?php if (isset($_SESSION['success'])) : ?>
      <div class="error success" >
      	<h3>
          <?php 
          	echo $_SESSION['success']; 
          	unset($_SESSION['success']);
          ?>
      	</h3>
      </div>
  	<?php endif ?>

    <!-- logged in user information -->
    <?php  if (isset($_SESSION['username'])) { ?>

	<?php
 echo '<p>Sunteti intrat cu numele '.$_SESSION['username'].'</p>';
 ?>
 <p>Pentru aceste date detineti drepturi</p>

 <div class="container-fluid nopadding">
 <div class="row nopadding"> ';
	 <div class="col-md-6 w49">
		 <div class="tabbable" id="tabs-952945">
			 <ul class="nav nav-tabs">
				 <li class="nav-item">
					 <a class="nav-link active" href="#panel-757425" data-toggle="tab">3 - A</a>
				 </li>
				 <li class="nav-item">
					 <a class="nav-link" href="#tab2" data-toggle="tab">3 - B</a>
				 </li>
			 </ul>
			 <div class="tab-content">
				 <div class="tab-pane active" id="panel-757425">
				<?php include('3a.php') ; ?>
				 </div>
				 <div class="tab-pane" id="tab2">
				 <?php include('3b.php') ; ?>
				 </div>
			 </div>
		 </div>
	 </div> 
	 <div class="col-md-6">
		 <div class="tabbable" id="tabs-410630">
			 <ul class="nav nav-tabs">
				 <li class="nav-item">
					 <a class="nav-link active" href="#panel-927154" data-toggle="tab">4 - A</a>
				 </li>
				 <li class="nav-item">
					 <a class="nav-link" href="#tab4" data-toggle="tab">4 - B</a>
				 </li>
			 </ul>
			 <div class="tab-content">
				 <div class="tab-pane active" id="panel-927154">
				 <?php include('4a.php') ; ?>
				 </div>
				 <div class="tab-pane" id="tab4">
				 <?php include('4b.php') ; ?>
				 </div>
			 </div>
		 </div>
	 </div>
	 <div class="row marginleft48"> ';
	 <div class="col-md-12 ">
		 <div class="tabbable" id="tabs-922945">
			 <ul class="nav nav-tabs">
				 <li class="nav-item">
					 <a class="nav-link active" href="#panel-7574253" data-toggle="tab">5 - A</a>
				 </li>
				 <li class="nav-item">
					 <a class="nav-link" href="#tab5" data-toggle="tab">5 - B</a>
				 </li>
			 </ul>
			 <div class="tab-content">
				 <div class="tab-pane active" id="panel-7574253">
				<?php include('5a.php') ; ?>
				 </div>
				 <div class="tab-pane" id="tab5">
				 <?php include('5b.php') ; ?>
				 </div>
			 </div>
		 </div>
	 </div> 
	 <div class="col-md-12">
		 <div class="tabbable" id="tabs-419630">
			 <ul class="nav nav-tabs">
				 <li class="nav-item">
					 <a class="nav-link active" href="#panel-938154" data-toggle="tab">6 - A</a>
				 </li>
				 <li class="nav-item">
					 <a class="nav-link" href="#tab6" data-toggle="tab">6 - B</a>
				 </li>
			 </ul>
			 <div class="tab-content">
				 <div class="tab-pane active" id="panel-938154">
				 <?php include('6a.php') ; ?>
				 </div>
				 <div class="tab-pane" id="tab6">
				 <?php include('6b.php') ; ?>
				 </div>
			 </div>
		 </div>
	 </div>
 </div>
 

</div>
<?php
}
else
{
 echo '<p>Nu ati efectuat log in.</p>';
 echo '<p>Acces restrictionat.</p>';
}
echo '<a href="index.php">Revenire la pagina principala</a>';
?>

    	<p> <a href="index.php?logout='1'" style="color: red;">logout</a> </p>
    
</div>
		
</body>
</html>
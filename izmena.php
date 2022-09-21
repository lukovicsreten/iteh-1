<html>
	<head>
		<?php include "konekcija.php"?>
		<title>Košarkaški klub</title>
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
		<link rel="stylesheet" href="css.css">
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.4/jquery.min.js"></script>
		<?php 
	  	$sql = "SELECT *
	    	      FROM igraci";
	  	$q = $mysqli->query($sql);	 
    	$sql2 = "SELECT *
	    	       FROM klub";
    	$q2 = $mysqli->query($sql2);		

    	if (isset($_POST['submit'])){
	    	if(empty($_POST['reg']) || empty($_POST['klub'])){
			  	echo '<div class="alert alert-danger">Sva polja su obavezna!</div>';
		  	}
		  	else {
			  	$reg = $_POST['reg'];
			  	$klub = $_POST['klub'];
			  	$sql3 = "UPDATE igraci
			    	       SET klubid = '$klub'
					  	 		 WHERE id = '$reg'";
			  	if($q3 = $mysqli->query($sql3)){
				  	echo '<div class="alert alert-success">Igrač je uspešno promenio tim !</div>';
			  	}
			  	else {
				  	echo '<div class="alert alert-danger">Greška sa bazom !</div>';
			  	}
		  	}
	  	}
		?> 
	</head>
	<body>
		<nav class="navbar navbar-default">
  		<div class="container">
		    <div class="navbar-header">
      		<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
        		<span class="sr-only">Toggle navigation</span>
        		<span class="icon-bar"></span>
        		<span class="icon-bar"></span>
        		<span class="icon-bar"></span>
      		</button>
      		<a class="navbar-brand" href="index.php">Košarkaški klub</a>
    		</div>

    		<div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
      		<ul class="nav navbar-nav">
        		<li><a href="index.php">Pretraži </a></li>
        		<li ><a href="registracija.php">Dodaj igrača</a></li>
        		<li><a href="brisanje.php">Izbriši igrača</a></li>
        		<li class="active"><a href="izmena.php">Transfer igrača <span class="sr-only">(current)</span></a></li>   
     		  </ul>
    		</div>
  		</div>
		</nav>

		<div class="container">
			<div class="row">
				<div id="carousel-example-generic" class="carousel slide" data-ride="carousel">
			  	<ol class="carousel-indicators">
			    	<li data-target="#carousel-example-generic" data-slide-to="0" class="active"></li>
			    	<li data-target="#carousel-example-generic" data-slide-to="1"></li>
			    	<li data-target="#carousel-example-generic" data-slide-to="2"></li>
			  	</ol>

			  	<div class="carousel-inner" role="listbox">
			    	<div class="item active">
			      	<img src="img/slider2.jpg" alt="...">
			    	</div>
			   	  <div class="item">
			      	<img src="img/slider1.jpg" alt="...">
			    	</div>
			    	<div class="item">
			      	<img src="img/slider3.jpg" alt="...">
			    	</div>
			  	</div>

			  	<a class="left carousel-control" href="#carousel-example-generic" role="button" data-slide="prev">
			    	<span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
			    	<span class="sr-only">Previous</span>
			  	</a>
			  	<a class="right carousel-control" href="#carousel-example-generic" role="button" data-slide="next">
			    	<span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
			    	<span class="sr-only">Next</span>
			  	</a>
				</div>
			</div>
			<div class="row">
				<div class="col-lg-12 col-xs-12">
					<div class="page-header">
			  		<h1>Transferi <small>Prebacite igrača u drugi tim</small></h1>
					</div>
				</div>
			</div>
			<div class="row">
				<div class="col-lg-3 col-xs-12"></div>
				<div class="col-lg-6 col-xs-12">
					<p>Izaberite igrača i novi klub...</p>
          <div id="odgovor"></div>
					<form method="POST" action="izmena.php">
				 		<div class="form-group">
			    		<label for="exampleInputPassword1">Igrač</label>
			    		<select class="form-control" name="reg">
			    			<option value="">Izaberi igrača...</option>
			    			<?php  while($red = $q->fetch_object()){ ?>
			  					<option value="<?php echo $red->id ?>"><?php echo $red->igracime." ".$red->igracprezime ?></option>
			  				<?php } ?>
		    			</select>
		  			</div>
					  <div class="form-group">
					    <label for="exampleInputPassword1">Klub</label>
			    		<select class="form-control" name="klub">
			    			<option value="">Izaberi klub...</option>
			    			<?php while($red2 = $q2->fetch_object()){ ?>
			    				<option value="<?php echo $red2->klubid ?>"><?php echo $red2->klubime ?></option>
			    			<?php } ?>
			    		</select>
			  		</div>
			  		<button type="submit" name="submit" class="btn btn-primary">Izmeni</button>
		  		</form>
				</div>
				<div class="col-lg-3 col-xs-12"></div>
			</div>
			<div class="row">
				<div class="col-lg-12 col-xs-12">
					<hr>
						<div id="futer">
							Copyright 2022 by <a href="mailto:lukovicsreten@gmail.com?Subject=Poruka" target="_top">Sreten Lukovic</a>
						</div>
					<hr>
				</div>
			</div>
		</div>
		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
	</body>
</html>